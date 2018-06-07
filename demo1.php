<?php 
/**********************************************
 *  Riccardo Castagna Mba, Web Master (Palermo, IT)
 *  Speed Test 
 **********************************************/
$img1 = "http://raw.githubusercontent.com/RickyIta68/speed-image-load/master/1.jpg";
$img2 = "http://raw.githubusercontent.com/RickyIta68/speed-image-load/master/2.jpg";
$img3 = "http://raw.githubusercontent.com/RickyIta68/speed-image-load/master/3.jpg";
$img4 = "http://raw.githubusercontent.com/RickyIta68/speed-image-load/master/4.jpg";
?>
<!DOCTYPE html>
<html lang='it'>
  <head>
    <title>no base64 image speed test</title>
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
<div id="image_1" ><img src="<?php echo $img1 ?>" alt="img 1"></div>
<div id="image_2" ><img src="<?php echo $img2 ?>" alt="img 2"></div>
<div id="image_3" ><img src="<?php echo $img3 ?>" alt="img 3"></div>
<div id="image_4" ><img src="<?php echo $img4 ?>" alt="img 4"></div>
  </body>
</html>