<?php
require_once('send.message.php'); //requires file
require_once('facebook.php'); //sdk provided by facebook, you need one for tokens and
$config = array('appId' => '1496661733888719' ,'secret'=>'3c3ad56149c2d7cd91aaf0db42305cc9' );
$facebook=new Facebook($config);
if(!$facebook->getUser()){
    $params = array(
  'scope' => 'xmpp_login',
  'redirect_uri' => 'http://localhost/'
    );
    $url=$facebook->getLoginUrl($params);
    header("location:".$url);
    die();
}
$messageobj=new SendMessage($facebook);

$receiverId='nootan.ghimire'; // this may either be username or userID, this class takes care of both the //cases
$body='test message';
if($messageobj->sendMessage($body,$receiverId))
{
echo 'message sent';
}else
{
echo 'some error occured';
}
?>
