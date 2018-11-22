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

use cinghie\mailchimp\models\ListMember;

class MemberController extends Controller
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
                        'actions' => [ 'create', 'view', 'delete', ],
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
	 * Displays a single ListMember model
	 *
	 * @return mixed
	 * @throws Exception
	 */
    public function actionView( $id , $list_id )
    {

        $model = new ListMember([ 'id' => $id , 'list_id' => $list_id ]);

        return $this->render('view', [
            'model' => $model,
        ]);

    }

    /**
     * Creates a new ListMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param string $list_id
     * @return mixed
     */
    public function actionCreate( $list_id )
    {
        $model = new ListMember([ 'list_id' => $list_id ]);

        if ($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect(['view', 'id' => $model->id , 'list_id' => $model->list_id ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing ListMember model.
     * If deletion is successful, the browser will be redirected to the 'list/view' page.
     * @param string $id
     * @param string $list_id
     * @return mixed
     */
    public function actionDelete( $id , $list_id )
    {
        $model = new ListMember([ 'id' => $id , 'list_id' => $list_id ]);

        $model->delete();

        return $this->redirect(['list/view' , 'id' => $list_id]);
    }

}
