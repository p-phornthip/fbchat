<?php
require 'facebook.php';
$facebook = new Facebook(array(
  'appId'  => '476503632381870',
  'secret' => 'c0e183c1d24cd30898c86957ef2174a5',
));
$user = $facebook->getUser();
if (!$user) {
    die("You are not logged in, click <a href='index.php'>Here</a> to login");
}else
{
  try {
    $user_profile = $facebook->api('/me/friends');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
  require_once('header.php');
}
?>