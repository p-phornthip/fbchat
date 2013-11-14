<?php
require 'facebook.php';
$facebook = new Facebook(array(
  'appId'  => '476503632381870',
  'secret' => 'c0e183c1d24cd30898c86957ef2174a5',
));
$user = $facebook->getUser();
if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
if ($user) {
  header("location:compose.php");
} else {
$params = array(
  'scope' => 'read_stream, xmpp_login',
  'redirect_uri' => 'http://www.nishgtm.com/message/compose.php'
);
  $loginUrl = $facebook->getLoginUrl($params);
  echo "<a href='$loginUrl'>Login with facebook</a>";
}
?>