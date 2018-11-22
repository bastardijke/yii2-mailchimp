<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use cinghie\mailchimp\models\MailchimpList;

/* @var $this yii\web\View */
/* @var $model common\models\Service */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'list_id' )->dropDownList( MailchimpList::getList() , [ 'prompt' => '' ] ); ?>

    <?= $form->field($model, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status' )->dropDownList( $model::getStatusList() ); ?>

    <div class="form-group">
        <?= Html::submitButton( '<i class="glyphicon glyphicon-floppy-save"></i> ' . Yii::t('mailchimp', 'Save'),
            [ 'class' =>  'btn btn-success'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
