<?php

use yii\helpers\Html;

// Set Title and Breadcrumbs
$this->title = Yii::t('mailchimp', 'Mailchimp');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mailchimp-index container"> 

    <p>
        <?= Html::a( '<i class="glyphicon glyphicon-align-justify"></i> ' . Yii::t('mailchimp', 'Lists'), ['lists'], ['class' => 'btn btn-default']) ?>
        <?= Html::a( '<i class="glyphicon glyphicon-align-justify"></i> ' . Yii::t('mailchimp', 'Campaigns'), ['campaigns'], ['class' => 'btn btn-default']) ?>
    </p>

</div>

