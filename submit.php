<?php
// print_r($_POST);exit;
if (isset($_POST['key']) == "saveData") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $query = $_POST['query'];



//start gmail smtp
require("mailer/PHPMailerAutoload.php");


            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            //$mail->Host = "erp.slttgroup.com";
            $mail->Host = "smtpout.secureserver.net";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contact@namastepravasi.com";
            $mail->Password = "Asdf@1992";
            $mail->setFrom("contact@namastepravasi.com");
            $mail->Subject = "Nirguna Import Export Website";
            $mail->Body = "<html>
            <head>
            <title>Nirguna Import Export</title>
            </head>
            <body>
            <p>You got new enquiry!</p>
            <table style='width:100%; border: 1px solid black; border-collapse: collapse;'>
            <tr>
                <th style='border: 1px solid black; border-collapse: collapse;'>Parent Name</th>
                <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>".$name."</td>
            </tr>
            <tr>
                <th style='border: 1px solid black; border-collapse: collapse;'>Mobile</th>
                <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>".$mobile."</td>
            </tr>
            <tr>
                <th style='border: 1px solid black; border-collapse: collapse;'>Email</th>
                <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>".$email."</td>
            </tr>
            <tr>
                <th style='border: 1px solid black; border-collapse: collapse;'>Query</th>
                <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>".$query."</td>
            </tr>
            </table>
            </body>
            </html>";
            $mail->AddAddress("komalm0305@gmail.com");

            //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send()){
                $data['status'] = 'false';
            }else{
                $data['status'] = 'true';
            }

//end gmail smtp


    echo json_encode($data);
}
