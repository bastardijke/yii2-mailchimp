<?php

namespace cinghie\mailchimp\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Model;

/**
 * This is the List model class.
 *
 * @property string $list_id
 * @property string $name
 * @property string $email_address
 * @property string $unique_email_id
 * @property string $email_type
 * @property string $status
 * @property integer $member_rating
 * @property string $language
 * @property mixed $listMember
 * @property boolean $vip
 *
 */
class ListMemberForm extends Model
{
    protected $member;

    public $list_id;

    public $email_address;
    public $email_type;
    public $status;
    public $language;
    public $member_rating;
    public $vip;
    public $merge_fields_fname;
    public $merge_fields_lname;

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [[ 'email_address', 'list_id', 'status', ], 'required'],
            [[ 'member_rating', ], 'integer'],
            [
                [
                    'list_id',
                    'email_address',
                    'email_type',
                    'status',
                    'language',
                    'merge_fields_fname',
                    'merge_fields_lname'
                ],
                'string'
            ],
            [[ 'vip', ], 'boolean' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'list_id' => Yii::t('mailchimp', 'List ID'),
            'email_address' => Yii::t('mailchimp', 'Email Address'),
            'email_type' => Yii::t('mailchimp', 'Email Type'),
            'status' => Yii::t('mailchimp', 'Status'),
            'language' => Yii::t('mailchimp', 'Language'),
            'member_rating' => Yii::t('mailchimp', 'Member Rating'),
            'vip' => Yii::t('mailchimp', 'VIP'),
            'merge_fields_fname' => Yii::t('mailchimp', 'First Name'),
            'merge_fields_lname' => Yii::t('mailchimp', 'Last Name'),
        ];
    }

    /**
     * @return bool
     * @throws InvalidConfigException
     */
    public function create()
    {
        $this->member = new ListMember([
            'list_id' => $this->list_id,
            'email_address' => $this->email_address,
            'email_type' => $this->email_type,
            'status' => $this->status,
            'language' => $this->language,
            'member_rating' => intval($this->member_rating),
            'vip' => $this->vip ? true : false,
            'merge_fields' => [
                'FNAME' => $this->merge_fields_fname,
                'LNAME' => $this->merge_fields_lname,
            ],
        ]);

        return $this->member->create();
    }

    /**
     * @return ListMember
     */
    public function getListMember(): ListMember
    {
        return $this->member;
    }
}
