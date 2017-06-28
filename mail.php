<?php
if(isset($_POST['btn_submit']))
{
    //get the content
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $name." - ".$email;
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Kolkata");
    $t=time();
    //save the content to file
    $myfile = fopen("messages.txt", "a");
    $txt = "".date("h:i:sa")."\nFrom: ".$contact."\nMessage: ".$message."\n\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    //mail the content
   $to = "mominmunna.cs@gmail.com, support@erusen.in";
   $subject = "Algorithmica Contact Page Message Email";
   $email = "
        <html>
            <head>
                <title>Algorithmica Contact Page Message Email</title>
                <style>
                    table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    }

                    td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    tr:nth-child(even) {
                    background-color: #dddddd;
                    }
                </style>
            </head>
            <body>
                <p>New Message Recieved on ".date("h:i:sa")."!</p>
                <table>
                    <tr>
                        <th>From</th>
                        <th>Message</th>
                    </tr>
                    <tr>
                        <td>$contact</td>
                        <td>$message</td>
                    </tr>
                </table>
            </body>
        </html>
";

//set content-type
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@algorithmica.co.in>' . "\r\n";

mail($to,$subject,$email,$headers);
    
    //redirect to main page
    ob_start();
    header('Location: '.'contact.html/sent=true');
    ob_end_flush();
    die();
}
?>