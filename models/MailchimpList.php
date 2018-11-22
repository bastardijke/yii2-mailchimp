<?php

namespace cinghie\mailchimp\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

use DrewM\MailChimp\MailChimp;

/**
 * This is the List model class.
 *
 * @property string     $id
 * @property integer    $web_id
 * @property string     $name



 * @property ListMember[] $members
 *
 */
class MailchimpList extends Model
{

    private $_mailchimp = null;

    public $id;
    public $web_id;
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['web_id', ], 'integer'],
            [['id', 'name', ], 'string'],
        ];
    }

    public function init(){
        if ( empty( $this->id ) ) {
            throw new InvalidConfigException("Missing required param 'id'.", 1);
        }

        $this->_mailchimp = new MailChimp( Yii::$app->controller->module->apiKey );

        $this->attributes = $this->_mailchimp->get( 'lists/' . $this->id );

    }


/*    public static function create( $params = [] ) {

        return new self();

    }*/


    public function delete() {

        return $this->_mailchimp->delete("lists/" . $this->list_id );

    }

    public function getMembers() {

        return $this->_mailchimp->get( 'lists/' . $this->id . '/members' , [ 'count' => Yii::$app->controller->module->count, ] );

    }


    public static function getList(){

        $mailchimp = new MailChimp( Yii::$app->controller->module->apiKey );

        $lists = $mailchimp->get('lists');

        return ArrayHelper::map(
            $lists['lists'],
            'id',
            'name'
        );

    }

}
