<?php

/**
 * @copyright Copyright &copy; Gogodigital Srls
 * @company Gogodigital Srls - Wide ICT Solutions
 * @website http://www.gogodigital.it
 * @github https://github.com/cinghie/yii2-mailchimp
 * @license BSD 3-Clause
 * @package yii2-mailchimp
 * @version 0.2.0
 */

namespace cinghie\mailchimp\controllers;

use Exception;
use Yii;
use DrewM\MailChimp\MailChimp;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\ArrayDataProvider;

class DefaultController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [ 'index', 'lists', 'list', 'member' , 'campaigns', 'campaign', ],
                        'roles' => $this->module->roles
                    ]
                ],
                'denyCallback' => function () {
	                throw new \RuntimeException(Yii::t('mailchimp','You are not allowed to access this page'));
                }
            ]
        ];
    }

    /**
     * Displays import view
     *
     * @return mixed
     * @throws Exception
     */
    public function actionIndex()
    {
        return $this->render( 'index' );
    }

	/**
	 * Displays import view
	 *
	 * @return mixed
	 * @throws Exception
	 */
    public function actionLists()
    {
        $apiKey = Yii::$app->controller->module->apiKey;

        $MailChimp = new MailChimp($apiKey);
        $lists = $MailChimp->get('lists');
        $dataProvider = new ArrayDataProvider([
            'allModels' => $lists['lists'],
            'key' => 'id',
        ]);

        return $this->render('lists', [
            'dataProvider' => $dataProvider,
        ]);
    }

	/**
	 * Displays a single Items model
	 *
	 * @return mixed
	 * @throws Exception
	 */
    public function actionList()
    {
        $apiKey = Yii::$app->controller->module->apiKey;
        $request = Yii::$app->request;

        $id   = $request->get('id');
        $name = $request->get('name');

        $MailChimp = new MailChimp($apiKey);

        $members = $MailChimp->get('lists/' .$id. '/members' , [ 'count' => Yii::$app->controller->module->count, ] );
        $dataProvider = new ArrayDataProvider([
            'allModels' => $members['members'],
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'members' => $members,
            'id' => $id,
            'name' => $name
        ]);
    }

    /**
     * Displays List Member info
     *
     * @return mixed
     * @throws Exception
     */
    public function actionMember( $id , $list_id )
    {
        $apiKey = Yii::$app->controller->module->apiKey;

        $MailChimp = new MailChimp( $apiKey );
        $member = $MailChimp->get( 'lists/' . $list_id . '/members/' . $id );

        return $this->render('member', [
            'member' => $member,
        ]);
    }


    /**
     * Displays campaigns list
     *
     * @return mixed
     * @throws Exception
     */
    public function actionCampaigns()
    {
        $apiKey = Yii::$app->controller->module->apiKey;

        $MailChimp = new MailChimp( $apiKey );
        $campaigns = $MailChimp->get( 'campaigns' );

        $dataProvider = new ArrayDataProvider([
            'allModels' => $campaigns[ 'campaigns' ],
            'key' => 'id',
        ]);

        return $this->render('campaigns', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays campaign info
     *
     * @return mixed
     * @throws Exception
     */
    public function actionCampaign($id)
    {
        $apiKey = Yii::$app->controller->module->apiKey;

        $MailChimp = new MailChimp( $apiKey );
        $campaign = $MailChimp->get( 'campaigns/' . $id );

        return $this->render('campaign', [
            'campaign' => $campaign,
        ]);
    }

}
