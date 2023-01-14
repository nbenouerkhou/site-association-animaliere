<?php
 
session_start();
 
$permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
  
function generate_string($input, $strength = 10) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
$image = imagecreatetruecolor(200, 50);
 
imageantialias($image, true);
 
$colors = [];
 
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);
 
for($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
 
imagefill($image, 0, 0, $colors[0]);
 
for($i = 0; $i < 10; $i++) {
  imagesetthickness($image, rand(2, 10));
  $line_color = $colors[rand(1, 4)];
  imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $line_color);
}
 
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
 
$fonts = [dirname(__FILE__).'\fonts\Acme.ttf', dirname(__FILE__).'\fonts\Ubuntu.ttf', dirname(__FILE__).'\fonts\Merriweather.ttf', dirname(__FILE__).'\fonts\PlayfairDisplay.ttf'];
 
$string_length = 6;
$captcha_string = generate_string($permitted_chars, $string_length);
 
$_SESSION['captcha_text'] = $captcha_string;
 
for($i = 0; $i < $string_length; $i++) {
  $letter_space = 170/$string_length;
  $initial = 15;
   
  imagettftext($image, 24, rand(-15, 15), $initial + $i*$letter_space, rand(25, 45), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $captcha_string[$i]);
}
 
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

// session_start();
 
// if($_POST) {
//     $visitor_name = "";
//     $visitor_email = "";
//     $email_title = "";
//     $concerned_department = "";
//     $visitor_message = "";
 
//     if(isset($_POST['captcha_challenge']) && $_POST['captcha_challenge'] == $_SESSION['captcha_text']) {
     
//         if(isset($_POST['visitor_name'])) {
//             $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
//         }
         
//         if(isset($_POST['visitor_email'])) {
//             $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
//             $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
             
//         }
         
//         if(isset($_POST['email_title'])) {
//             $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
//         }
         
//         if(isset($_POST['concerned_department'])) {
//             $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
//         }
         
//         if(isset($_POST['visitor_message'])) {
//             $visitor_message = htmlspecialchars($_POST['visitor_message']);
//         }
         
//         if($concerned_department == "billing") {
//             $recipient = "billing@domain.com";
//         }
//         else if($concerned_department == "marketing") {
//             $recipient = "marketing@domain.com";
//         }
//         else if($concerned_department == "technical support") {
//             $recipient = "tech.support@domain.com";
//         }
//         else {
//             $recipient = "contact@domain.com";
//         }
         
//         $headers  = 'MIME-Version: 1.0' . "\r\n"
//         .'Content-type: text/html; charset=utf-8' . "\r\n"
//         .'From: ' . $visitor_email . "\r\n";
         
//         if(mail($recipient, $email_title, $visitor_message, $headers)) {
//             echo '<p>Thank you for contacting us. You will get a reply within 24 hours.</p>';
//         } else {
//             echo '<p>We are sorry but the email did not go through.</p>';
//         }
//     } else {
//         echo '<p>You entered an incorrect Captcha.</p>';
//     }
     
// } else {
//     echo '<p>Something went wrong</p>';
// }
?>