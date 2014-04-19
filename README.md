fbchat
======

Awesome fb messaging api using php

usage:
```php
<?php
require_once('facebook.message.php'); //requires file
require_once('facebook.php'); //sdk provided by facebook, you need one for tokens and
//all
$facebook=new Facebook('appId' => 'your_app_id','secret' => 'your_app_secret');
$message=new SendMessage($facebook);

$receiverId=''; // this may either be username or userID, this class takes care of both the //cases
$message='test message';
if($message->sendMessage($body,$receiverId))
{
echo 'message sent';
}else
{
echo 'some error occured';
}
?>
```
Remember, if the code doesn't do in case of your host, you need call your hosting provider, tell him to unblock outbound connections. and specify that you are messing around with facebook chat api or else they may not accept your request.
