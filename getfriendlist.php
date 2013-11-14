<?php
require_once('facebook.php');
require_once('send.message.php');
$facebook = new Facebook(array(
  'appId'  => '476503632381870',
  'secret' => 'c0e183c1d24cd30898c86957ef2174a5',
));
$data=$facebook->api('/me/friends');
echo json_encode($data['data']);
?>