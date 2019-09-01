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
use RuntimeException;
use Yii;
use DrewM\MailChimp\MailChimp;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\ArrayDataProvider;

use cinghie\mailchimp\models\MailchimpList;

class ListController extends Controller
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
                        'actions' => [ 'index', 'view', 'member' ],
                        'roles' => $this->module->roles
                    ]
                ],
                'denyCallback' => function () {
                    throw new RuntimeException(Yii::t('mailchimp', 'You are not allowed to access this page'));
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
        
        $MailChimp = new MailChimp(Yii::$app->controller->module->apiKey);

        $lists = $MailChimp->get('lists');
        $dataProvider = new ArrayDataProvider([
            'allModels' => $lists['lists'],
            'key' => 'id',
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MailchimpList model
     *
     * @return mixed
     * @throws Exception
     */
    public function actionView($id)
    {

        $model = new MailchimpList([ 'id' => $id ]);
        $members = $model->getMembers();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $members['members'],
        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            //'members' => $members,
        ]);
    }

    /**
     * Deletes an existing MailchimpList model.
     * If deletion is successful, the browser will be redirected to the 'list/view' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = new MailchimpList(['id' => $id]);
        $model->delete();

        return $this->redirect(['index']);
    }
}
