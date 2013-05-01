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
