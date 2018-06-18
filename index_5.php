<?php 
/**************************************************************************************************************************************
  * In this other example I have converted the background image files into webp, and also the transparent gif images into webp !!!  
  * In this example the images are all webp but the best result in speed performance I have recived from the example 4: file index_4.php
  * where the transparent gif images are converted to transparent palette png images and the background images to webp images.
  * the webp converted are opened correctly into the web browser but if you try to open these images with any webp image editor it fail to open
  * https://bugs.php.net/bug.php?id=66590 
  * I have opened a new issue about this problem: https://bugs.chromium.org/p/webp/issues/detail?id=389 because the solutions to fix this bug 
  * in the issue id 66590 doesn't work fine. 
*****************************************************************************************************************************************/

$img0 = "./images/trp.gif"; //original image size 2000 px x 1200 px transparent, this is a no background image to insert within the div element (I need it only to resize the div where there are the background images that I wish to display )
$img1 = "./images/1.jpg";  //original image size 2000 px x 1200 px background image 
$img2 = "./images/2.jpg";  //original image size 2000 px x 1200 px background image
$img3 = "./images/3.jpg";  //original image size 2000 px x 1200 px background image
$img4 = "./images/4.jpg";  //original image sze 2000 px x 1200 px background image


// ok all set (I hope) , let go on ... ;-)


//Since we need four images resized (300,768,1024,2000) from one image source I write a function to do all in one 
// and if the browser support the webp we convert the original file format into webp file format;
function newimages($src,$compression,$alpha_channel,$file_format){
include_once('./lib/class.resize.php');
$ref=new imageResize;
if((isset($_SERVER['HTTP_ACCEPT']) === true) && (strstr($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false)){
$new_2000 = $ref->resize($src,'mobile_images',2000,$compression,$file_format,$alpha_channel);
$new_2000_name = $ref->newfilename;
}else{
$file_format=NULL;
$new_2000_name = $src; // we don't need a new 2000 px file if the browser does't support the webp because alredy exist  
}
$new_300 = $ref->resize($src,'mobile_images',300,$compression,$file_format,$alpha_channel);
$new_300_name = $ref->newfilename;
$new_768 = $ref->resize($src,'mobile_images',768,$compression,$file_format,$alpha_channel);
$new_768_name = $ref->newfilename;
$new_1024 = $ref->resize($src,'mobile_images',1024,$compression,$file_format,$alpha_channel);
$new_1024_name = $ref->newfilename;
return array($new_300_name,$new_768_name,$new_1024_name,$new_2000_name);
}

$images_0 = newimages($img0,90,TRUE,'webp'); //these are the transparent images resized, compressed 90% and converted into webp if the browser support webp 
list($newImg0_300_px_name,$newImg0_768_px_name, $newImg0_1024_px_name, $newImg0_2000_px_name)=$images_0; //here the list name (src) of the new four images 
$images_1 = newimages($img1,90,FALSE,'webp'); // these are the jpeg images resized with a 90% of compression and no transparency and converted into webp if the browser support webp 
list($newImg1_300_px_name,$newImg1_768_px_name, $newImg1_1024_px_name, $newImg1_2000_px_name)=$images_1; //here the list name (src) of the new four images
$images_2 = newimages($img2,90,FALSE,'webp'); // these are the jpeg images resized with a 90% of compression and no transparency and converted into webp if the browser support webp 
list($newImg2_300_px_name,$newImg2_768_px_name, $newImg2_1024_px_name, $newImg2_2000_px_name)=$images_2; //here the list name (src) of the new four images
$images_3 = newimages($img3,90,FALSE,'webp'); // these are the jpeg images resized with a 90% of compression and no transparency and converted into webp if the browser support webp 
list($newImg3_300_px_name,$newImg3_768_px_name, $newImg3_1024_px_name, $newImg3_2000_px_name)=$images_3; //here the list name (src) of the new four images
$images_4 = newimages($img4,90,FALSE,'webp'); // these are the jpeg images resized with a 90% of compression and no transparency and converted into webp if the browser support webp 
list($newImg4_300_px_name,$newImg4_768_px_name, $newImg4_1024_px_name, $newImg4_2000_px_name)=$images_4; //here the list name (src) of the new four images


// ok all set, I hope this work could be usefull for someone and please let me know if there are errors or questions 
              
?>
<!DOCTYPE html>
<html lang='it'>
  <head>
    <title>responsive images load</title>
    <meta charset='utf-8'>
    <meta name='description' content='load speed image test'>
    <meta name='keywords' content='lighthouse test image load'>
    <meta name='author' content='Riccardo Castagna'>
    <meta name='robots' content='all'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link href='./php-icon.png' rel='shortcut icon' type='image/png'>
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



@media screen and (max-width: 29.999em){

.image_1{
background: url("<?php echo $newImg1_300_px_name ?>") 100% 100% no-repeat;
}
.image_2{
background: url("<?php echo $newImg2_300_px_name ?>") 100% 100% no-repeat;
}
.image_3{
background: url("<?php echo $newImg3_300_px_name ?>") 100% 100% no-repeat;
}
.image_4{
background: url("<?php echo $newImg4_300_px_name ?>") 100% 100% no-repeat;
}
}
@media screen and (min-width: 30em) and (max-width: 47.999em) {

.image_1{
background: url("<?php echo $newImg1_768_px_name ?>") 100% 100% no-repeat;
}
.image_2{
background: url("<?php echo $newImg2_768_px_name ?>") 100% 100% no-repeat;
}
.image_3{
background: url("<?php echo $newImg3_768_px_name ?>") 100% 100% no-repeat;
}
.image_4{
background: url("<?php echo $newImg4_768_px_name ?>") 100% 100% no-repeat;
}
}
@media screen and (min-width: 48em) and (max-width: 91em){

.image_1{
background: url("<?php echo $newImg1_1024_px_name ?>") 100% 100% no-repeat;
}
.image_2{
background: url("<?php echo $newImg2_1024_px_name ?>") 100% 100% no-repeat;
}
.image_3{
background: url("<?php echo $newImg3_1024_px_name ?>") 100% 100% no-repeat;
}
.image_4{
background: url("<?php echo $newImg4_1024_px_name ?>") 100% 100% no-repeat;
}
}
@media screen and (min-width: 91.001em){

.image_1{
background: url("<?php echo $newImg1_2000_px_name ?>") 100% 100% no-repeat;
}
.image_2{
background: url("<?php echo $newImg2_2000_px_name ?>") 100% 100% no-repeat;
}
.image_3{
background: url("<?php echo $newImg3_2000_px_name ?>") 100% 100% no-repeat;
}
.image_4{
background: url("<?php echo $newImg4_2000_px_name ?>") 100% 100% no-repeat;
}
}

.image_1{
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}
.image_2{
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}
.image_3{
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}
.image_4{
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}
</style>
<script>
window.addEventListener("load", function()
{ myFnc("image_1","image_1"),
myFnc("image_2","image_2"),myFnc("image_3","image_3");
},{capture:true});

window.addEventListener("scroll", function(){  
myFnc("image_4","image_4");
},{passive: true, capture:false});

function myFnc(id, cls) {
var element, name, arr;
element = document.getElementById(id);
name = cls;                         
arr = element.className.split(" ");
if (arr.indexOf(name) == -1) {
element.className += " " + name;}
}
</script>
</head>
  <body>
<div id="image_1" ><img src="<?php echo $newImg0_2000_px_name ?>" alt="img_0" srcset="<?php echo $newImg0_2000_px_name.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
<div id="image_2" ><img src="<?php echo $newImg0_2000_px_name ?>" alt="img_0" srcset="<?php echo $newImg0_2000_px_name.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
<div id="image_3" ><img src="<?php echo $newImg0_2000_px_name ?>" alt="img_0" srcset="<?php echo $newImg0_2000_px_name.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
<div id="image_4" ><img src="<?php echo $newImg0_2000_px_name ?>" alt="img_0" srcset="<?php echo $newImg0_2000_px_name.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
  </body>
</html>