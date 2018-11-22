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

class CampaignController extends Controller
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
                        'actions' => [ 'index', 'view', ],
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
     * Displays campaigns list
     *
     * @return mixed
     * @throws Exception
     */
    public function actionIndex()
    {
        $apiKey = Yii::$app->controller->module->apiKey;

        $MailChimp = new MailChimp( $apiKey );
        $campaigns = $MailChimp->get( 'campaigns' );

        $dataProvider = new ArrayDataProvider([
            'allModels' => $campaigns[ 'campaigns' ],
            'key' => 'id',
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays campaign info
     *
     * @return mixed
     * @throws Exception
     */
    public function actionView($id)
    {
        $apiKey = Yii::$app->controller->module->apiKey;

        $MailChimp = new MailChimp( $apiKey );
        $campaign = $MailChimp->get( 'campaigns/' . $id );

        return $this->render('view', [
            'campaign' => $campaign,
        ]);
    }

}
