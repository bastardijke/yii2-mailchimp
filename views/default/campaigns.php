<?php

use yii\helpers\Html;
use yii\grid\GridView;

// Set Title and Breadcrumbs
$this->title = Yii::t('mailchimp', 'Campaigns');
$this->params['breadcrumbs'][] = ['label' => Yii::t('mailchimp', 'Mailchimp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mailchimp-campaigns"> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // A string that uniquely identifies this campaign.
            'id',

            // The ID used in the MailChimp web application. View this campaign in your MailChimp account at https://{dc}.admin.mailchimp.com/campaigns/show/?id={web_id}.
            'web_id',

             // If this campaign is the child of another campaign, this identifies the parent campaign. For Example, for RSS or Automation children.
            //'parent_campaign_id',

            // There are four types of campaigns you can create in MailChimp. A/B Split campaigns have been deprecated and variate campaigns should be used instead. Possible Values: regular plaintext absplit rss variate
            'type',

            // The date and time the campaign was created.
            'create_time', 

            // The link to the campaign’s archive version.
            'archive_url:url',

            // The original link to the campaign’s archive version.
            'long_archive_url:url',

            // The current status of the campaign.
            'status',

            // The total number of emails sent for this campaign.
            'emails_sent',

            // The date and time a campaign was sent.
            'send_time',

            // How the campaign’s content is put together (‘template’, ‘drag_and_drop’, ‘html’, ‘url’).
            'content_type',

            // Determines if the campaign needs its blocks refreshed by opening the web-based campaign editor.
            //'needs_block_refresh',

            // List settings for the campaign.
            // The unique list id.
            //'recipients.list_id',

            // The status of the list used, namely if it’s deleted or disabled.
            //'recipients.list_is_active',

            // The name of the list.
            //'recipients.list_name',

            // A description of the segment used for the campaign. Formatted as a string marked up with HTML.
            //'recipients.segment_text',

            // Count of the recipients on the associated list. Formatted as an integer.
            //'recipients.recipient_count',

            // An object representing all segmentation options. This object should contain a saved_segment_id to use an existing segment, or you can create a new segment by including both match and conditions options.
            //'recipients.segment_opts',


            // The settings for your campaign, including subject, from name, reply-to address, and more.
            // The subject line for the campaign.
            //'settings.subject_line', 

            // The preview text for the campaign.
            //'settings.preview_text',

            // The title of the campaign.
            //'settings.title',

            // The ‘from’ name on the campaign (not an email address).
            //'settings.from_name',

            // The reply-to email address for the campaign.
            //'settings.reply_to',

            // Use MailChimp Conversation feature to manage out-of-office replies.
            //'settings.use_conversation', 

            // The campaign’s custom ‘To’ name. Typically the first name merge field.
            //'settings.to_name',

            // If the campaign is listed in a folder, the id for that folder.
            //'settings.folder_id',

            // Whether MailChimp authenticated the campaign. Defaults to true.
            //'settings.authenticate',

            // Automatically append MailChimp’s default footer to the campaign.
            //'settings.auto_footer',

            // Automatically inline the CSS included with the campaign content.
            //'settings.inline_css',

            // Automatically tweet a link to the campaign archive page when the campaign is sent.
            //'settings.auto_tweet',

            // An array of Facebook page ids to auto-post to.
            //'settings.auto_fb_post',

            // Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to true.
            //'settings.fb_comments',

            // Send this campaign using Timewarp.
            //'settings.timewarp',

            // The id for the template used in this campaign.
            //'settings.template_id',

            // Whether the campaign uses the drag-and-drop editor.
            //'settings.drag_and_drop',



            // The settings specific to A/B test campaigns.
            // ID for the winning combination.
            //'variate_settings.winning_combination_id',

            // ID of the campaign that was sent to the remaining recipients based on the winning combination.
            //'variate_settings.winning_campaign_id',

            // The combination that performs the best. This may be determined automatically by click rate, open rate, or total revenue—or you may choose manually based on the reporting data you find the most valuable. For Multivariate Campaigns testing send_time, winner_criteria is ignored. For Multivariate Campaigns with ‘manual’ as the winner_criteria, the winner must be chosen in the MailChimp web application. Possible Values: opens clicks manual total_revenue
            //'variate_settings.winner_criteria',

            // The number of minutes to wait before choosing the winning campaign. The value of wait_time must be greater than 0 and in whole hours, specified in minutes.
            //'variate_settings.wait_time',

            // The percentage of recipients to send the test combinations to, must be a value between 10 and 100.
            //'variate_settings.test_size',

            // The possible subject lines to test. If no subject lines are provided, settings.subject_line will be used.
            //'variate_settings.subject_lines',

            // The possible send times to test. The times provided should be in the format YYYY-MM-DD HH:MM:SS. If send_times are provided to test, the test_size will be set to 100% and winner_criteria will be ignored.
            //'variate_settings.send_times',

            // The possible from names. The number of from_names provided must match the number of reply_to_addresses. If no from_names are provided, settings.from_name will be used.
            //'variate_settings.from_names',

            // The possible reply-to addresses. The number of reply_to_addresses provided must match the number of from_names. If no reply_to_addresses are provided, settings.reply_to will be used.
            //'variate_settings.reply_to_addresses',

            // Descriptions of possible email contents. To set campaign contents, make a PUT request to /campaigns/{campaign_id}/content with the field ‘variate_contents’.
            //'variate_settings.contents',

            // Combinations of possible variables used to build emails.
            // Unique ID for the combination.
            //'variate_settings.combinations.id',

            // The index of variate_settings.subject_lines used.
            //'variate_settings.combinations.subject_line',

            // The index of variate_settings.send_times used.
            //'variate_settings.combinations.send_time',

            // The index of variate_settings.from_names used.
            //'variate_settings.combinations.from_name', 

            // The index of variate_settings.reply_to_addresses used.
            //'variate_settings.combinations.reply_to',

            // The index of variate_settings.contents used.
            //'variate_settings.combinations.content_description',

            // The number of recipients for this combination.
            //'variate_settings.combinations.recipients',


            // The tracking options for a campaign.
            // Whether to track opens. Defaults to true. Cannot be set to false for variate campaigns.
            //'tracking.opens:boolean',

            // Whether to track clicks in the HTML version of the campaign. Defaults to true. Cannot be set to false for variate campaigns.
            //'tracking.html_clicks:boolean',

            // Whether to track clicks in the plain-text version of the campaign. Defaults to true. Cannot be set to false for variate campaigns.
            //'tracking.text_clicks:boolean',

            // Whether to enable Goal tracking.
            //'tracking.goal_tracking:boolean',

            // Whether to enable eCommerce360 tracking.
            //'tracking.ecomm360:boolean',

            // The custom slug for Google Analytics tracking (max of 50 bytes).
            //'tracking.google_analytics',

            // The custom slug for ClickTale tracking (max of 50 bytes).
            //'tracking.clicktale',

            // Salesforce tracking options for a campaign. Must be using MailChimp’s built-in Salesforce integration.
            // Create a campaign in a connected Salesforce account.
            //'tracking.salesforce.campaign:boolean',

            // Update contact notes for a campaign based on subscriber email addresses.
            //'tracking.salesforce.notes:boolean',

            // Capsule tracking options for a campaign. Must be using MailChimp’s built-in Capsule integration.
            // Update contact notes for a campaign based on subscriber email addresses.
            //'tracking.capsule.notes:boolean',

            // RSS options for a campaign.
            // The URL for the RSS feed.
            //'rss_opts.feed_url:url',

            // The frequency of the RSS Campaign. Possible Values: daily weekly monthly
            //'rss_opts.frequency',

            // The schedule for sending the RSS Campaign.
            // The hour to send the campaign in local time. Acceptable hours are 0-23. For example, ‘4’ would be 4am in your account’s default time zone.
            //'rss_opts.schedule.hour',

            // The days of the week to send a daily RSS Campaign.
            //'rss_opts.schedule.daily_send.sunday:boolean',
            //'rss_opts.schedule.daily_send.monday:boolean',
            //'rss_opts.schedule.daily_send.tuesday:boolean',
            //'rss_opts.schedule.daily_send.wednesday:boolean',
            //'rss_opts.schedule.daily_send.thursday:boolean',
            //'rss_opts.schedule.daily_send.friday:boolean',
            //'rss_opts.schedule.daily_send.saturday:boolean',

            // The day of the week to send a weekly RSS Campaign. Possible Values: sunday monday tuesday wednesday thursday friday saturday
            //'rss_opts.schedule.weekly_send_day',

            // The day of the month to send a monthly RSS Campaign. Acceptable days are 0-31, where ‘0’ is always the last day of a month. Months with fewer than the selected number of days will not have an RSS campaign sent out that day. For example, RSS Campaigns set to send on the 30th will not go out in February.
            //'rss_opts.schedule.monthly_send_date',

            // The date the campaign was last sent.
            //'rss_opts.last_sent',

            // Whether to add CSS to images in the RSS feed to constrain their width in campaigns.
            //'rss_opts.constrain_rss_img:boolean',

            // A/B Testing options for a campaign.
            // The type of AB split to run. Possible Values: subject from_name schedule
            //'ab_split_opts.split_test',

            // How we should evaluate a winner. Based on ‘opens’, ‘clicks’, or ‘manual’. Possible Values: opens clicks manual
            //'ab_split_opts.pick_winner',

            // How unit of time for measuring the winner (‘hours’ or ‘days’). This cannot be changed after a campaign is sent. Possible Values: hours days
            //'ab_split_opts.wait_units',

            // The amount of time to wait before picking a winner. This cannot be changed after a campaign is sent.
            //'ab_split_opts.wait_time',

            // The size of the split groups. Campaigns split based on ‘schedule’ are forced to have a 50⁄50 split. Valid split integers are between 1-50.
            //'ab_split_opts.split_size',

            // For campaigns split on ‘From Name’, the name for Group A.
            //'ab_split_opts.from_name_a',

            // For campaigns split on ‘From Name’, the name for Group B.
            //'ab_split_opts.from_name_b',

            // For campaigns split on ‘From Name’, the reply-to address for Group A.
            //'ab_split_opts.reply_email_a',

            // For campaigns split on ‘From Name’, the reply-to address for Group B.
            //'ab_split_opts.reply_email_b',

            // For campaigns split on ‘Subject Line’, the subject line for Group A.
            //'ab_split_opts.subject_a',

            // For campaigns split on ‘Subject Line’, the subject line for Group B.
            //'ab_split_opts.subject_b',

            // The send time for Group A.
            //'ab_split_opts.send_time_a',

            // The send time for Group B.
            //'ab_split_opts.send_time_b',

            // The send time for the winning version.
            //'ab_split_opts.send_time_winner',

            // The preview for the campaign, rendered by social networks like Facebook and Twitter. Learn more.
            // The url for the header image for the card.
            //'social_card.image_url:url',

            // A short summary of the campaign to display.
            //'social_card.description',

            // The title for the card. Typically the subject line of the campaign.
            //'social_card.title',


            // For sent campaigns, a summary of opens, clicks, and e-commerce data.
            // The total number of opens for a campaign.
            //'report_summary.opens',

            // The number of unique opens.
            //'report_summary.unique_opens',

            // The number of unique opens divided by the total number of successful deliveries.
            //'report_summary.open_rate',

            // The total number of clicks for an campaign.
            //'report_summary.clicks',

            // The number of unique clicks.
            //'report_summary.subscriber_clicks',

            // The number of unique clicks divided by the total number of successful deliveries.
            //'report_summary.click_rate',

            // E-Commerce stats for a campaign.
            // The total orders for a campaign.
            //'report_summary.ecommerce.total_orders',

            // The total spent for a campaign. Calculated as the sum of all order totals with no deductions.
            //'report_summary.ecommerce.total_spent',

            // The total revenue for a campaign. Calculated as the sum of all order totals minus shipping and tax totals.
            //'report_summary.ecommerce.total_revenue',


            // Updates on campaigns in the process of sending.
            // Whether Campaign Delivery Status is enabled for this account and campaign.
            //'delivery_status.enabled',

            // Whether a campaign send can be canceled.
            //'delivery_status.can_cancel',

            // The current state of a campaign delivery.
            //'delivery_status.status',

            // The total number of emails confirmed sent for this campaign so far.
            //'delivery_status.emails_sent',

            // The total number of emails canceled for this campaign.
            //'delivery_status.emails_canceled', 

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{campaign}',
                'buttons' => [
                    'campaign' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                    'title' => Yii::t('mailchimp', 'Campaign'),
                                    //'target' => '_blank',
                        ]);
                    },
                ]
            ],

        ],
    ]); ?>
</div>