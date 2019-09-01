<?php

use yii\grid\GridView;
use yii\helpers\Html;

?>

<div class="mailchimp-list">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'options' => ['class' => 'table-responsive', ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
            // The MD5 hash of the lowercase version of the list member’s email address.
			//'id',

			// Email address for a subscriber.
			'email_address:email',

			// An identifier for the address across all of MailChimp.
			//'unique_email_id',

			// Type of email this member asked to get (‘html’ or ‘text’).
			'email_type',

			// Subscriber’s current status. Possible Values: subscribed unsubscribed cleaned pending transactional
			'status',

			// A subscriber’s reason for unsubscribing.
			//'unsubscribe_reason',

			// An individual merge var and value for a member.
			'merge_fields.FNAME',
            'merge_fields.LNAME',
            //'merge_fields.ADDRESS.addr1',
            //'merge_fields.ADDRESS.addr2',
            //'merge_fields.ADDRESS.city',
            //'merge_fields.ADDRESS.state',
            //'merge_fields.ADDRESS.zip',
            //'merge_fields.ADDRESS.country',
            //'merge_fields.PHONE',
            //'merge_fields.BIRTHDAY',

            // Array. The key of this object’s properties is the ID of the interest in question.
			//'interests',

            // Open and click rates for this subscriber.
            // A subscriber’s average open rate.
            //'stats.avg_open_rate',

            // A subscriber’s average clickthrough rate.
            //'stats.avg_click_rate',
			
            // IP address the subscriber signed up from.
			//'ip_signup',

            // The date and time the subscriber signed up for the list.
            // 'timestamp_signup',

			// The IP address the subscriber used to confirm their opt-in status.
			'ip_opt',

			// The date and time the subscribe confirmed their opt-in status.
			//'timestamp_opt',

			// Star rating for this member, between 1 and 5.
			'member_rating',

			// The date and time the member’s info was last changed.
			//'last_changed',

			// If set/detected, the subscriber’s language.
			'language',

			// VIP status for subscriber.
			'vip:boolean',

			// The list member’s email client.
			'email_client',


			// Subscriber location information.
			// The location latitude.
			//'location.latitude',

			// The location longitude.
			//'location.longitude',

			// The time difference in hours from GMT.
			//'location.gmtoff',

			// The offset for timezones where daylight saving time is observed.
			//'location.dstoff',

			// The unique code for the location country.
			//'location.country_code',

			// The timezone for the location.
			//'location.timezone',

			// The marketing permissions for the subscriber.
			// The id for the marketing permission on the list
			//'marketing_permissions.marketing_permission_id',

			// The text of the marketing permission.
			//'marketing_permissions.text',

			// If the subscriber has opted-in to the marketing permission.
			//'marketing_permissions.enabled:boolean',


			// The most recent Note added about this member.
			// The note id.
			//'last_note.note_id',

			// The date and time the note was created.
			//'last_note.created_at',

			// The author of the note.
			//'last_note.created_by',

			// The content of the note.
			//'last_note.note',


			// The list id.
			//'list_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{member}',
				'urlCreator'=>function($action, $model, $key, $index){
					return [ $action, 'id' => $model['id'] , 'list_id' => $model['list_id'] ];
				},
                'buttons' => [
                    'member' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                            $url,
                            [
                                'title' => Yii::t('mailchimp', 'Member'),
                                //'target' => '_blank',
                            ]
                        );
                    },
                ]
            ],

        ],
    ]) ?>
</div>
