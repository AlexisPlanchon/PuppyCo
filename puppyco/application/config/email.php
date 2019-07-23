<?php defined('BASEPATH') OR exit('No direct script access allowed');

//SMTP & mail configuration
$config['useragent'] = 'CodeIgniter';
$config['protocol'] = 'smtp';
//$config['mailpath'] = '/usr/sbin/sendmail';
$config['smtp_host'] = 'smtp.googlemail.com';
$config['smtp_user'] = 'puppystorefr@gmail.com';
$config['smtp_pass'] = 'puppystore2019';
$config['smtp_port'] = 465; 
$config['smtp_crypto'] = 'ssl';
$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['validate'] = FALSE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = FALSE;
$config['bcc_batch_size'] = 200;
