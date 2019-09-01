<?php

namespace cinghie\mailchimp\models;

use Exception;
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
 *
 * @property ListMember[] $members
 *
 */
class MailchimpList extends Model
{

    protected $mailchimp = null;

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

    /**
     * @throws InvalidConfigException
     * @throws Exception
     */
    public function init(): void
    {
        if (empty($this->id)) {
            throw new InvalidConfigException("Missing required param 'id'.", 1);
        }

        $this->mailchimp = new MailChimp(Yii::$app->mailchimp->apiKey);

        $this->attributes = $this->mailchimp->get('lists/' . $this->id);
    }

    public function delete()
    {
        return $this->mailchimp->delete('lists/' . $this->list_id);
    }

    public function getMembers()
    {
        return $this->mailchimp->get(
            'lists/' . $this->id . '/members',
            [ 'count' => Yii::$app->getModule('mailchimp')->count ]
        );
    }

    /**
     * @return array
     * @throws Exception
     */
    public static function getList(): array
    {
        $mailchimp = new MailChimp(Yii::$app->mailchimp->apiKey);

        $lists = $mailchimp->get('lists');

        return ArrayHelper::map(
            $lists['lists'],
            'id',
            'name'
        );
    }
}
