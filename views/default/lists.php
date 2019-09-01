<?php

use yii\helpers\Html;
use yii\grid\GridView;

// Set Title and Breadcrumbs
$this->title = Yii::t('mailchimp', 'Lists');
$this->params['breadcrumbs'][] = ['label' => Yii::t('mailchimp', 'Mailchimp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="mailchimp-lists"> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'table-responsive', ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // A string that uniquely identifies this list.
            //'id',

            // The ID used in the MailChimp web application. View this list in your MailChimp account at https://{dc}.admin.mailchimp.com/lists/members/?id={web_id}.
            //'web_id',

            // The name of the list.
            'name',

            // Contact information displayed in campaign footers to comply with international spam laws.

            // The company name for the list.
            //'contact.company',

            // The street address for the list contact.
            //'contact.address1',

            // The street address for the list contact.
            //'contact.address2',

            // The city for the list contact.
            //'contact.city',

            // The state for the list contact.
            //'contact.state',

            // The postal or zip code for the list contact.
            //'contact.zip',

            // A two-character ISO3166 country code. Defaults to US if invalid.
            //'contact.country',

            // The phone number for the list contact.
            //'contact.phone',

            // The permission reminder for the list.
            //'permission_reminder',

            // Whether campaigns for this list use the Archive Bar in archives by default.
            //'use_archive_bar:boolean',

            // Default values for campaigns created for this list.

            // The default from name for campaigns sent to this list.
            //'campaign_defaults.from_name',

            // The default from email for campaigns sent to this list.
            //'campaign_defaults.from_email',

            // The default subject line for campaigns sent to this list.
            //'campaign_defaults.subject',

            // The default language for this lists’s forms.
            //'campaign_defaults.language',

            // The email address to send subscribe notifications to.
            //'notify_on_subscribe',

            // The email address to send unsubscribe notifications to.
            //'notify_on_unsubscribe',

            // The date and time that this list was created.
            'date_created',

            // An auto-generated activity score for the list (0-5).
            //'list_rating',

            // Whether the list supports multiple formats for emails. When set to true, subscribers can choose whether they want to receive HTML or plain-text emails. When set to false, subscribers will receive HTML emails, with a plain-text alternative backup.
            //'email_type_option:boolean',

            // Our EepURL shortened version of this list’s subscribe form.
            //'subscribe_url_short',

            // The full version of this list’s subscribe form (host will vary).
            //'subscribe_url_long',

            // The list’s Email Beamer address.
            //'beamer_address',

            // Whether this list is public or private. Possible Values: pub prv
            //'visibility',

            // Whether or not to require the subscriber to confirm subscription via email.
            //'double_optin:boolean',

            // Whether or not the list has marketing permissions (eg. GDPR) enabled.
            //'marketing_permissions:boolean',

            // array. Any list-specific modules installed for this list.
            //'modules',

            //Stats for the list. Many of these are cached for at least five minutes.

            // The number of active members in the list.
            'stats.member_count',

            // The number of members who have unsubscribed from the list.
            'stats.unsubscribe_count',

            // The number of members cleaned from the list.
            //'stats.cleaned_count',

            // The number of active members in the list since the last campaign was sent.
            //'stats.member_count_since_send',

            // The number of members who have unsubscribed since the last campaign was sent.
            //'stats.unsubscribe_count_since_send',

            // The number of members cleaned from the list since the last campaign was sent.
            //'stats.cleaned_count_since_send',

            // The number of campaigns in any status that use this list.
            //'stats.campaign_count',

            // The date and time the last campaign was sent to this list. This is updated when a campaign is sent to 10 or more recipients.
            //'stats.campaign_last_sent',

            // The number of merge vars for this list (not EMAIL, which is required).
            //'stats.merge_field_count',

            // The average number of subscriptions per month for the list (not returned if we haven’t calculated it yet).
            //'stats.avg_sub_rate',

            // The average number of unsubscriptions per month for the list (not returned if we haven’t calculated it yet).
            //'stats.avg_unsub_rate',

            // The target number of subscriptions per month for the list to keep it growing (not returned if we haven’t calculated it yet).
            //'stats.target_sub_rate',

            // The average open rate (a percentage represented as a number between 0 and 100) per campaign for the list (not returned if we haven’t calculated it yet).
            //'stats.open_rate',

            // The average click rate (a percentage represented as a number between 0 and 100) per campaign for the list (not returned if we haven’t calculated it yet).
            //'stats.click_rate',

            // The date and time of the last time someone subscribed to this list.
            //'stats.last_sub_date',

            // The date and time of the last time someone unsubscribed from this list.
            //'stats.last_unsub_date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{list}',
                'buttons' => [
                    'list' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                            $url,
                            [
                                'title' => Yii::t('mailchimp', 'List'),
                                //'target' => '_blank',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>

</div>