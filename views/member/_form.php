<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use cinghie\mailchimp\models\MailchimpList;
use cinghie\mailchimp\models\ListMember;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model cinghie\mailchimp\models\ListMemberForm */
?>

<div class="list-member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'list_id' )->dropDownList( MailchimpList::getList() , [ 'prompt' => '' ] ); ?>

    <?= $form->field($model, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_type' )->dropDownList( ListMember::getEmailTypeList() ); ?>

    <?= $form->field($model, 'status' )->dropDownList( ListMember::getStatusList() ); ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vip')->checkBox() ?>

    <?= $form->field($model, 'merge_fields_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merge_fields_lname')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton( '<i class="glyphicon glyphicon-floppy-save"></i> ' . Yii::t('mailchimp', 'Save'),
            [ 'class' =>  'btn btn-success'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
