<?php
/**********************************************
 *  Riccardo Castagna Mba, Web Master (Palermo, IT)
 *  Speed Test 
 **********************************************/
function set_option($x, $y){
$enc = base64_encode($y);
curl_setopt($x, CURLOPT_URL,  $y);
curl_setopt($x, CURLOPT_HEADER, 0);
curl_setopt($x, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($x, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($x, CURLOPT_BINARYTRANSFER,TRUE);
curl_setopt($x, CURLOPT_ENCODING, "gzip, deflate" );
}

$ch1 = curl_init(); $ch2 = curl_init(); $ch3 = curl_init(); $ch4 = curl_init();
set_option($ch1, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/1.jpg");
set_option($ch2, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/2.jpg");
set_option($ch3, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/3.jpg");
set_option($ch4, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/4.jpg");
$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch1); curl_multi_add_handle($mh, $ch2); curl_multi_add_handle($mh, $ch3); curl_multi_add_handle($mh, $ch4);
$running = null;
do {
curl_multi_exec($mh, $running);
} while ($running);
curl_multi_remove_handle($mh, $ch1); curl_multi_remove_handle($mh, $ch2); curl_multi_remove_handle($mh, $ch3); curl_multi_remove_handle($mh, $ch4);
curl_multi_close($mh);
$im1 = curl_multi_getcontent($ch1);
$im2 = curl_multi_getcontent($ch2);
$im3 = curl_multi_getcontent($ch3);
$im4 = curl_multi_getcontent($ch4);
$img1 = base64_encode($im1);
$img2 = base64_encode($im2);
$img3 = base64_encode($im3);
$img4 = base64_encode($im4);

?>
<!DOCTYPE html>

<html lang='it'>
  <head>
    <title>base64 image speed test</title>
    <meta charset='utf-8'>
    <meta name='description' content='base64 image test'>
    <meta name='keywords' content=''>
    <meta name='author' content=''>
    <meta name='robots' content='all'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link href='/favicon.png' rel='shortcut icon' type='image/png'>
<style>
body {
margin: 0px;
padding: 0px;
}
div, img {
margin: 0px;
padding: 0px; 
width: 100%;
height: auto; 
}
</style>
  </head>
  <body>
  
<div id="image_1" ><img src="data:image/jpeg;base64,<?php echo $img1 ?>" alt="img 1"></div>
<div id="image_2" ><img src="data:image/jpeg;base64,<?php echo $img2 ?>" alt="img 2"></div>
<div id="image_3" ><img src="data:image/jpeg;base64,<?php echo $img3 ?>" alt="img 3"></div>
<div id="image_4" ><img src="data:image/jpeg;base64,<?php echo $img4 ?>" alt="img 4"></div>
  </body>
</html>