<?php
    function sendEmail($req) {
        $name = $req['name'];
        $email = $req['email'];
        $token = $req['token'];

        $headers = "From: Sender name <noreply@example.com>\r\n";
        $headers .= "Reply-To: noreply@example.com\r\n";
        $headers .= "Return-Path: noreply@example.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

        $to = $email;
        $subject = "Email subject";
        $body = '<table><tr><td>'.$name.'</td></tr><tr><td>'.$token.'</td></tr></table>';

        mail($to, $subject, $body, $headers);
    }