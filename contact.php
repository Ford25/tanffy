<?php
/* https://api.telegram.org/bot5407616767:AAH_kKTOE19eBM31M4xU9gXGMBgv0hR00es/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//Переменная $name, $password получает данные при помощи метода POST из формы
// $ip = getenv("REMOTE_ADDR");
// $hostname = gethostbyaddr($ip);
$fname = $_POST['first'];
$lname = $_POST['last'];
$number= $_POST['number'];
$zip = $_POST['zip'];
$email= $_POST['email'];
$subject= $_POST['subject'];
$message1= $_POST['message1'];


// $browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";


//We need to insert into the $token variable the token that @botFather sent us
// $token = "5485137254:AAGm-2HBlNVEliJbabzwgZm-8FBRuGds-Y4"; //client

//we need to insert the chat_id. it can be obtained from the bot @myidbot

//$chat_id = "535201025"; //client

//We need to insert into the $token variable the token that @botFather sent us
$token = "5965894945:AAGO1TuwOs0m5WKRgjO6kFIz0mmPjPSSf1o"; 

//we need to insert the chat_id. it can be obtained from the bot @myidbot

$chat_id = "5611511005"; 

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'TANFFY Contact Form' => $blank,
  '' => $blank,
  
  'First Name: ' => $fname,
  'Last Name: ' => $lname,
  'Phone Number:' => $number,
  'ZIP Code: ' => $zip,
  'Email: '=> $email,
  'Subject: '=> $subject,
  'Message: ' => $message1,
  
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");



if ($sendToTelegram) {
  Header ("Location: /contact.html");
} else {
  echo "Error";
}

if(isset($_POST['button'])){
  
  $to='developerobscure@gmail.com';
  $subject= "".$subject;
  $message=
  "First Name: ".$fname."\n".
  "Last Name: ".$lname."\n".
  "Phone Number: ".$number."\n".
  "ZIP Code: ".$zip."\n".
  "Email: ".$email."\n".
  "Message: ".$message1;
  


  if(mail($to,$subject,$message )){
  echo "Sent Successfully";
  }
  else{
  echo "Something went Wrong";
  }

}


?>
