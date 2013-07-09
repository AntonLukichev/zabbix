#!/bin/php
<?php
header("Content-Type: text/xml; charset=UTF-8");
Include('QTSMS.class.php');
$sms= new QTSMS();

$sender_name='SUNLIGHT';
$period=600;
$post_id_sms=time();

$to=$argv[1];
$subject=$argv[2];
$message=$argv[3];

$logfilelocation = "/var/log/zabbix/sms/";
// if debug is true, log files will be generated
$debug=true;
//if (count($argv)<3) {
//  die ("Usage: ".$argv[0]." recipientmobilenumber \"subject\" \"message\"\n");
//}

$result=$sms->post_message($message, $to, $sender_name, $post_id_sms, $period);

if ( $debug )
  file_put_contents($logfilelocation."sms_alert_".date("Ymd"), "\n\n".$result, FILE_APPEND);
?>