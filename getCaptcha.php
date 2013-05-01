/*
  Use the following code in each page you wish to have a CAPTCHA image.
  
  Enter the text you see in the following image:

  <img src="/getCaptcha.php" width="" height="" alt="Captcha cannot be displayed" />

  !-- set width and height attributes as desired -->

  <!--Textfield-->

  To use generate a random string:

  - include this file using require_once() or include()
  - call generator() as:
      $returnString = generator(Length of desired string);
*/

<?php   
  function generator($totalLength) 	
  { 		
    $characterSet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 		
    srand ((double) microtime() * 10000000); 		
    $index = 1; 		
    $code = ''; 		
    while($index <= $totalLength) 		
    { 			
      $number = rand() % 10; 			
      $temp = substr($characterSet, $number, 1); 			
      $code = $code.$temp; 			
      $index++; 		
    } 		
    return $code; 	
  } 	
  $returnCode = generator(5);   
  $height = 25;  	
  $width = 55;  	
  $captchaImage = imagecreate($width, $height);  	
  $background = imagecolorallocate($captchaImage, 0, 0, 0);  	
  $textColor = imagecolorallocate($captchaImage, 255, 255, 255);  	
  $fontSize = 14;   	
  imagestring($captchaImage, $fontSize, 5, 5, $returnCode, $textColor);  	
  imagejpeg($captchaImage, NULL, 100);  	
  echo json_encode($returnCode); 		
?>
