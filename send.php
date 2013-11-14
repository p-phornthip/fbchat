<?php

require_once('facebook.php');
require_once('send.message.php');
if(isset($_POST['submit']))
{
    $facebook=new Facebook(array(
  'appId'  => '476503632381870',
  'secret' => 'c0e183c1d24cd30898c86957ef2174a5',
));
    $body=$_POST['message'];
        foreach($_POST['friends'] as $friendID)
        {           
            $message=new SendMessage($facebook);
            $message->sendMessage($body, $friendID);
        }
}else{
    echo "No data submitted";
}
header("location:compose.php?action=success");
?>