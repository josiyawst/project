<?php

use App\User;

// General helper function to send a single email
function send_single_email($content, $subject, $display_name = NULL, $to = NULL, $from = NULL, $user_name = NULL)
{
    if ($from === NULL) {
        $from = Config::get('app.from_email');
    }
    if ($to === NULL) {
        $to = Config::get('app.from_email');
    }
    if ($display_name === NULL) {
        $display_name = Config::get('app.display_name');
    }
    if ($user_name === NULL) {
        $user_name = Config::get('app.display_name');
    }
    $subject = Config::get('app.display_name') . " : " . $subject;
    $content = email_template($content, $subject, $display_name, $to, $from, $user_name);

    /**
     * Send email using Sendgrid cURL method
     */
    $fromemail = Config::get('app.from_email');
    $fromName = Config::get('app.display_name');
    $url = 'https://api.sendgrid.com/';
    $user = 'libin1993swt';
    $pass = 'websight2016';
    $params = array(
        'api_user' => $user,
        'api_key' => $pass,
        'to' => $to,
        'subject' => $subject,
        'html' => $content,
        'from' => $fromemail,
        'fromname' => Config::get('app.display_name')
    );
    $request = $url . 'api/mail.send.json';
    // Generate curl request
    $session = curl_init($request);
    // Tell curl to use HTTP POST
    curl_setopt($session, CURLOPT_POST, true);
    // Tell curl that this is the body of the POST
    curl_setopt($session, CURLOPT_POSTFIELDS, $params);
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    // obtain response
    $ok = curl_exec($session);
}

// General helper function to send a single email
function sendMultipleEmailBCC($content, $subject, $display_name = NULL, $to_bcc = NULL, $from = NULL)
{
    if ($from === NULL || $to_bcc === NULL || $display_name === NULL)
        $user_info = User::where('status', 1)->where('user_type', 'A')->get();
    $to = $user_info[0]->email;
    if ($from === NULL) {
        $from = $user_info[0]->email;
    }
    if ($to_bcc === NULL) {
        $to_bcc = array($user_info[0]->email);
    }
    if ($display_name === NULL) {
        $firstname = $user_info[0]->first_name;
        $lastname = $user_info[0]->last_name;
        $display_name = $firstname . ' ' . $lastname;
    }
    $subject = "{{ config('global.site_title') }} : " . $subject;
    $content = email_template($content, $subject, $display_name, $to_bcc, $from);
    $to_bcc = implode(',', $to_bcc);

    /**
     * Send email using Sendgrid cURL method
     */
    $json_string = array(
        'to' => array(
            $to_bcc
        ),
        'category' => 'test_category'
    );

    $fromemail = "info@ingredientexchange.co.uk";
    $fromName = 'Ingredient Exchange';
    $url = 'https://api.sendgrid.com/';
    $user = 'libin1993swt';
    $pass = '';
    $params = array(
        'api_user' => $user,
        'api_key' => $pass,
        'x-smtpapi' => json_encode($json_string),
        'to' => $to,
        'subject' => $subject,
        'html' => $content,
        'from' => $fromemail,
        'fromname' => 'Watugot'
    );
    $request = $url . 'api/mail.send.json';
    // Generate curl request
    $session = curl_init($request);
    // Tell curl to use HTTP POST
    curl_setopt($session, CURLOPT_POST, true);
    // Tell curl that this is the body of the POST
    curl_setopt($session, CURLOPT_POSTFIELDS, $params);
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    // obtain response
    $ok = curl_exec($session);
}

// Template for emails
function email_template($content, $subject, $display_name = NULL, $to = NULL, $from = NULL, $user_name = NULL)
{
    $template = '<!DOCTYPE HTML>
	<html>
	<body>
	<div style="width:100%; max-width:600px; border:#ccc solid 1px;  border-bottom:#FF9E50 solid 5px; border-top:#FF9E50 solid 5px;">
	<div style="background:#FFF; padding:4px 10px; color:#333; border-bottom:#eee solid 1px; text-align: center">
	<img src="' . \URL::asset('assets/img/logo.png') . '"  alt="">
	</div>
	<div style="margin:20px; color:#333; font-size:14px; font-family:\'Trebuchet MS\', Arial, Helvetica, sans-serif;">
	<b>
	Hi ' . $user_name . ',
	</b><br><br>
	' . $content . '
	<br><br>
	Regards,<br>
	<b>Administrator</b>,<br/>
	' . Config::get('app.display_name') . '
	</div>
	</div>
	</body>
	</html>';

    return $template;
}

?>