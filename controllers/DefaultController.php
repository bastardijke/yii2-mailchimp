<?php

/**
 * @copyright Copyright &copy; Gogodigital Srls
 * @company Gogodigital Srls - Wide ICT Solutions
 * @website http://www.gogodigital.it
 * @github https://github.com/cinghie/yii2-mailchimp
 * @license BSD 3-Clause
 * @package yii2-mailchimp
 * @version 0.2.2
 */

namespace cinghie\mailchimp\controllers;

use Exception;
use RuntimeException;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [ 'index' ],
                        'roles' => $this->module->roles
                    ]
                ],
                'denyCallback' => function () {
	                throw new \RuntimeException(Yii::t('mailchimp', 'You are not allowed to access this page'));
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
}
