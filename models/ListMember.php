<?php

namespace cinghie\mailchimp\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidConfigException;

use DrewM\MailChimp\MailChimp;

/**
 * This is the List model class.
 *
 * @property string     $id
 * @property string    	$list_id
 * @property string     $name
 * @property string     $email_address
 * @property string     $unique_email_id
 * @property string     $email_type
 * @property string     $status
 * @property string     $unsubscribe_reason
 * @property string     $ip_signup
 * @property string     $timestamp_signup
 * @property string     $ip_opt
 * @property string     $timestamp_opt
 * @property string     $last_changed
 * @property integer    $member_rating
 * @property string     $language
 * @property boolean    $vip
 * @property string     $email_client
 * @property integer    $tags_count
 
 * @property User       $user
 *
 */
class ListMember extends Model
{

	const STATUS_SUBSCRIBED = 'subscribed';
	const STATUS_UNSUBSCRIBED = 'unsubscribed';
	const STATUS_CLEANED = 'cleaned';
	const STATUS_PENDING = 'pending';
	const STATUS_TRANSACTIONAL = 'transactional';

    const EMAIL_TYPE_HTML = 'html';
    const EMAIL_TYPE_TEXT = 'text';

	private $_mailchimp = null;

    public $list_id;

    public $id;
    public $email_address;
    public $unique_email_id;
    public $email_type;
    public $status;
    public $unsubscribe_reason;
    public $ip_signup;
    public $timestamp_signup;
    public $ip_opt;
    public $timestamp_opt;
    public $member_rating;
    public $last_changed;
    public $language;
    public $vip;
    public $email_client;
    public $tags_count;

    public $merge_fields = [];
    public $interests;
    public $stats;
    public $location;
    public $marketing_permissions;
    public $last_note;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'email_address', 'list_id', 'status', ], 'required'],  
            [[ 'member_rating', 'tags_count' ], 'integer'],
            [[ 'list_id', 'id', 'email_address', 'unique_email_id', 'email_type', 'status', 'unsubscribe_reason', 'ip_signup', 'timestamp_signup', 'ip_opt', 'timestamp_opt', 'last_changed', 'email_client', ], 'string'],
            [[ 'vip', ], 'boolean' ],
            [[ 'merge_fields', 'interests', 'stats', 'location', 'marketing_permissions', 'last_note' ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [ 'list_id', 'email_address', 'email_type', 'status', 'language', 'member_rating', 'vip', 'merge_fields', ];
    }


    public function init(){
    	if ( empty( $this->list_id ) ) {
    		throw new InvalidConfigException("Missing required param 'list_id'", 1);
    	}

    	$this->_mailchimp = new MailChimp( Yii::$app->getModule('mailchimp')->apiKey );

    }

    /**
     * Adds this ListMember to mailchimp.
     * @return boolean
     */
    public function read() {

        $id = $this->id ? : $this->_mailchimp->subscriberHash( $this->email_address ) ;

        $this->attributes = $this->_mailchimp->get( 'lists/' . $this->list_id . '/members/' . $id );

        return $this;

    }

    /**
     * Adds this ListMember to mailchimp.
     * @return boolean
     */
    public function create() {

    	if ( empty( $this->status ) && empty( $this->email_address ) ) {
    		throw new InvalidConfigException("Missing required params 'status' and 'email_address'", 1);
	  	}

	  	$result = $this->_mailchimp->post( "lists/" . $this->list_id . "/members" , $this->toArray() );

		if ( $this->_mailchimp->success() ) { $this->attributes = $result; }

	  	return $this->_mailchimp->success();

    }

    public function update() {

		$this->_mailchimp->patch("lists/" . $this->list_id . "/members/" . $this->id, $this->toArray() );

    	return $this->_mailchimp->success();

    }

    public function delete() {

    	$this->_mailchimp->delete("lists/" . $this->list_id . "/members/" . $this->id);

    	return $this->_mailchimp->success();

    }

    public function getError() {

        return $this->_mailchimp->getLastError();

    }

    public static function getStatusList()
    {
        return [
            self::STATUS_SUBSCRIBED => self::STATUS_SUBSCRIBED,
            self::STATUS_UNSUBSCRIBED => self::STATUS_UNSUBSCRIBED,
            self::STATUS_CLEANED => self::STATUS_CLEANED,
            self::STATUS_PENDING => self::STATUS_PENDING,
            self::STATUS_TRANSACTIONAL => self::STATUS_TRANSACTIONAL,
        ];
    }

    public static function getEmailTypeList()
    {
        return [
            self::EMAIL_TYPE_HTML => self::EMAIL_TYPE_HTML,
            self::EMAIL_TYPE_TEXT => self::EMAIL_TYPE_TEXT,
        ];
    }

}
