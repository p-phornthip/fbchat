<?php
require_once("facebook.php");
require_once("send.message.php");
$config=array(
  'appId'  => '476503632381870',
  'secret' => 'c0e183c1d24cd30898c86957ef2174a5',
);
$facebook=new Facebook($config);
if(!$facebook->getUser())
{
	die("login from http://www.nishgtm.com/message then visit this page");
}
die("ok");
$message=new SendMessage($facebook);
$msg=(isset($_GET['msg']))?$_GET['msg']:"hi, nootan, this is the class, if you see this message, you want to be happy because we have working class";
$receiver=(isset($_GET['rec']))?$_GET['rec']:"cyberkiller.nishchal";
if($message->sendMessage($msg,$receiver))
{
echo "message sent";
}
else
{
	echo "error ocured";
}
?>