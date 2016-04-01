fbchat (Facebook has pulled chat API for public use for some reason, as there's no chat API, this repo can't work. Please let me know if there's a way to send message using some API directly on people's Inbox, not from JavaScript, using any server side JavaScript)
======

### This project no longer works as facebook has shut it's chat api down, please don't refer this code anymore. There is no way one can send messages from outside of facebook anymore.


Awesome fb messaging api using php

usage:
```php
<?php
require_once('send.message.php'); //requires file
require_once('facebook.php'); //sdk provided by facebook, you need one for tokens and
//all
$config = array('appId' => '1496661733888719' ,'secret'=>'0c959ab2dec71c5a53aab1cd64751223' );
$facebook=new Facebook($config);
if(!$facebook->getUser()){
	$params = array(
  'scope' => 'read_mailbox, xmpp_login',
  'redirect_uri' => 'http://localhost/'
	);
	$url=$facebook->getLoginUrl($params);
	header("location:".$url);
	die();
}
$messageobj=new SendMessage($facebook);

$receiverId=''; // this may either be username or userID, this class takes care of both the //cases
$body='test message';
if($messageobj->sendMessage($body,$receiverId))
{
echo 'message sent';
}else
{
echo 'some error occured';
}
?>
```
You need to pass the proper $facebook object which is the instance of Facebook class with permission of xmpp_login<br />
Remember, if the code doesn't work in case of your host, you need call your hosting provider, tell him to unblock outbound connection on port 22. and specify that you are messing around with facebook chat api or else they may not accept your request.
