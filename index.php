<?php
require_once('send.message.php'); //requires file
require_once('facebook.php'); //sdk provided by facebook, you need one for tokens and
$config = array('appId' => '433418896723663' ,'secret'=>'882ef62beadf2e40c5ad31f4cd0b58b7' );//////////////////////////your application secret
$facebook=new Facebook($config);
if(!$facebook->getUser()){
    $params = array(
  'scope' => 'xmpp_login',
  'redirect_uri' => 'http://google.com/'
    );
    $url=$facebook->getLoginUrl($params);
    header("location:".$url);
    die();
}
$messageobj=new SendMessage($facebook);

$receiverId=''; // this may either be username or userID, this class takes care of both the
$body='test message';
if($messageobj->sendMessage($body,$receiverId))
{
echo 'message sent';
}else
{
echo 'some error occured';
}
?>
