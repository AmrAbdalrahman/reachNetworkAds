<?php

if (!function_exists('sendMail')) {
    function sendMail($to, $data)
    {
        require 'vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("amr.abdalrahman94@gmail.com", "Reach Network");
        $email->setSubject("Reminder Ads the next day");
        $email->addTo($to, $data['name']);
        //$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<body>
<p>Dear Eng.{$data['name']},</p>
<p>This is friendly reminder email for your ads tomorrow
<p>Good Luck</p>
</body>"
        );
        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            /*print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";*/
        } catch (\Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

    }

}






