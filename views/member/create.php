<?php
use yii\widgets\DetailView;

// Set Title and Breadcrumbs
$this->title = Yii::t('mailchimp', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('mailchimp', 'Mailchimp'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('mailchimp', 'Lists'), 'url' => ['list/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('mailchimp', 'List'), 'url' => ['list/view' , 'id' => $model->list_id ]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mailchimp-list-member-create container"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>