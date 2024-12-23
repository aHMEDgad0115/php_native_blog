<?php

if (!function_exists("send_mail")) {
    function send_mail(array $mails, string $subject, string $message):bool{
        $headers = "MIME-Version: 1.0 \r\n";
        $headers .="Content-type: text/html; charset = UTF-8 \r\n";
        $headers .="from:".config('mail.from_address')."\r\n";
        return mail($mails[0],$subject,$message,$headers);
    }    
}

//var_dump(send_mail(['ahmed.gad.masadah@gmail.com'],'test',"this  is a tester"));