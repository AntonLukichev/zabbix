#!/bin/php
<?php
header("Content-Type: text/xml; charset=UTF-8");
Include('QTSMS.class.php');
$sms= new QTSMS();

$sender_name='';
$period=600;
$post_id_sms=time();

$to=$argv[1];
$subject=$argv[2];
$message=$argv[3];

$logfilelocation = "/var/log/zabbix/sms/";
// if debug is true, log files will be generated
$debug=true;

$result=$sms->post_message($subject.": ".$message, $to, $sender_name, $post_id_sms, $period);

if ( $debug )
  file_put_contents($logfilelocation."sms_alert_".date("Ymd"), "\n\n".$result, FILE_APPEND);
?>