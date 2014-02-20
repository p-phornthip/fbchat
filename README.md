fbchat
======

Awesome fb messaging api using php

usage:
```php
<?php
require_once(‘facebook.message.php’); //requires file
require_once(‘facebook.php’); //sdk provided by facebook, you need one for tokens and
//all
$facebook=new Facebook(‘appId’ => ‘your_app_id’,'secret’ => ‘your_app_secret’);
$message=new SendMessage($facebook);

$receiverId=”; // this may either be username or userID, this class takes care of both the //cases
$message=’test message’;
if($message->sendMessage($body,$receiverId))
{
echo ‘message sent’;
}else
{
echo ‘some error occured’;
}
?>
```
