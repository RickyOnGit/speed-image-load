<?php 
/**********************************************************************************************************************
 *  Author: Riccardo Castagna Mba, Php Web Developer (Via Pindaro, 45, Palermo, ITALY) tel: +39 3315954155 email: 3315954155@libero.it
 *  Title : Responsive mobile image load for high speed.   
 *  According to the browsers simultaneous connection limitations on HTTP/1 (six for many modern browsers) so when we are developing a web page we have to evaluate 
 *  the number of requests to the same domain server and than process the right and lighter load strategy.
 *  A stategy could be to use the CDN and to put max six resource for page into a CDN, so you sort the web page resources in different domains.  
 *  In this example with no CDN the goal is to load faster the web page, loading less resource possible at the beginning and then defer all the other 
 *  resources (images in this case) that do not appear on the mobile screen and therefore do not need to load immediately.
 *  As reported by google, about 53% of smartphone users do not open a web page if a page does not load within 3 seconds. 
 *  The three seconds are refered to the fast 3G network with a 4x cpu throttling. 
 *  In short, less is the page weigh and less are the requests for page (HTTP/1) to the same domain server, more we get in performance speed.
 *  In this example,the layout resize of the div elements, is processed through the transparent gif image of only 2kbit, with a webp image it is possible to obtain less kbit but in this example let go on with a gif.
 *  The load event listener javascript function charges only the images that go inside the screen of a mobile device  
 *  and the scroll event listener defer the loading of the others images. In this example three images are loaded at the beginning while the fourth one is defered, so if you have many
 *  images (the case could be of an e-commerce web site or an booking system for an hotel web site) you will be able to have, with this method a very fast page.
 *  The weight, the size and also, optionally, the file format coversion of the new images for mobile screen is processed by php class. 
 *  The css @media screen options set the size of background images.
 *  Php Class usage:
 *  include_once('./lib/class.resize.php');
 *  $ref=new imageResize;
 *  $newImage = $ref->resize('imagefile_source','directory',integer,integer,NULL,FALSE);   with this we generate the new image file resized;
 *  $newImage_name = $ref->newfilename;    with this we get the name (src) of the new image file resized;
 *  
 *  param1 = 'imagefile_source' -> is a string with the src of the image file es: 'http://www.example.com/image.png' or './images/image.png' ;
 *  param2 = 'directory' -> is a string with new directory name or the same local directory of the image source, example: 'new_mobile_images' 
 *  or './images/new_mobile_images' or 'images' ;
 *  param3 = integer -> number integer, is the new width in pixel of the new image, usually we should use : 300 or 768 or 1024 ;
 *  param4 = integer -> number integer, is the compression level, default value is  NULL = No compression but this is good only for gif and bmp; NOTE: 
 *  if the original file format is not a gif or bmp you have to insert a value;  possible values go from 0 to 100 for jpeg and webp where 
 *  100 is no compression and 0 is the max compression; 
 *  for png image files format, 0 to 9, at the contrary: 0 is no compression and 9 is max compression, I repeat, use NULL only for gif and for bmp;
 *  param5 = 'string' or NULL ->  if it is set to NULL = no file format will be converted, the possible values are string: 'webp' or 'jpeg' or 'png' or 'gif' or 'bmp' ;
 *  param6 = the possible values are: TRUE OR FALSE -> TRUE to set Transparency (Alpha Channel), FALSE to not set Transparency, NOTE: set transparency only if the original file format
 *  is png, gif or webp.
 *  the new image files are generated only one time if the files do not exist, if the files exist the class will get only the file names. 
 ***********************************************************************************************************************/

$img0 = "./images/trp.gif"; //original image size 2000 px x 1200 px transparent, no background image (I need it only to resize the div where there are the background images)
$img1 = "./images/1.jpg";  //original image size 2000 px x 1200 px background image 
$img2 = "./images/2.jpg";  //original image size 2000 px x 1200 px background image
$img3 = "./images/3.jpg";  //original image size 2000 px x 1200 px background image
$img4 = "./images/4.jpg";  //original image sze 2000 px x 1200 px background image

include_once('./lib/class.resize.php'); //include the class to resize the original image files
$ref=new imageResize;
$newImg0_300_px = $ref->resize($img0,'mobile_images',300,NULL,NULL,TRUE); //create the new transparent gif of 300px for the html 'srcset' attribute (In this example I left the original file format 'gif' with the last param set to NULL but it is also possible to convert into new generation image 'webp' and also to compress: $newImg0_300_px = $ref->resize($img0,'mobile_images',300,80,'webp');
$newImg0_300_px_name = $ref->newfilename; //get the name (src) of new file 
$newImg0_768_px = $ref->resize($img0,'mobile_images',768,NULL,NULL,TRUE);  //create the new transparent gif of 768px for the html 'srcset' attribute
$newImg0_768_px_name = $ref->newfilename; //get the name (src) of new file
$newImg0_1024_px = $ref->resize($img0,'mobile_images',1024,NULL,NULL,TRUE); //create the new transparent gif of 1024px for the html 'srcset' attribute
$newImg0_1024_px_name = $ref->newfilename; //get the name (src) of new file  

// ok all set (I hope) , let go on ... ;-)
// now we have to set up the others (background) images for the css @media screen but I will do it tomorrow cause it is too late now and 
// I am really very, very tired 

$newImg1_300_px = $ref->resize($img1,'mobile_images',300,90,NULL,FALSE);
$newImg1_300_px_name = $ref->newfilename;
$newImg1_768_px = $ref->resize($img1,'mobile_images',768,90,NULL,FALSE);
$newImg1_768_px_name = $ref->newfilename;  
$newImg1_1024_px = $ref->resize($img1,'mobile_images',1024,90,NULL,FALSE);
$newImg1_1024_px_name = $ref->newfilename;

$newImg2_300_px = $ref->resize($img2,'mobile_images',300,90,NULL,FALSE);
$newImg2_300_px_name = $ref->newfilename;
$newImg2_768_px = $ref->resize($img2,'mobile_images',768,90,NULL,FALSE);
$newImg2_768_px_name = $ref->newfilename;  
$newImg2_1024_px = $ref->resize($img2,'mobile_images',1024,90,NULL,FALSE);
$newImg2_1024_px_name = $ref->newfilename; 

$newImg3_300_px = $ref->resize($img3,'mobile_images',300,90,NULL,FALSE);
$newImg3_300_px_name = $ref->newfilename;
$newImg3_768_px = $ref->resize($img3,'mobile_images',768,90,NULL,FALSE);
$newImg3_768_px_name = $ref->newfilename;  
$newImg3_1024_px = $ref->resize($img3,'mobile_images',1024,90,NULL,FALSE);
$newImg3_1024_px_name = $ref->newfilename;

$newImg4_300_px = $ref->resize($img4,'mobile_images',300,90,NULL,FALSE);
$newImg4_300_px_name = $ref->newfilename;
$newImg4_768_px = $ref->resize($img4,'mobile_images',768,90,NULL,FALSE);
$newImg4_768_px_name = $ref->newfilename;  
$newImg4_1024_px = $ref->resize($img4,'mobile_images',1024,90,NULL,FALSE);
$newImg4_1024_px_name = $ref->newfilename;   

// ok all set, I hope this work could be usefull and please let me know if there are errors 
              
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
background: url("<?php echo $img1 ?>") 100% 100% no-repeat;
}
.image_2{
background: url("<?php echo $img2 ?>") 100% 100% no-repeat;
}
.image_3{
background: url("<?php echo $img3 ?>") 100% 100% no-repeat;
}
.image_4{
background: url("<?php echo $img4 ?>") 100% 100% no-repeat;
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
{preloadImgs("<?php echo $img0 ?>","<?php echo $img1 ?>","<?php echo $img2 ?>","<?php echo $img3 ?>");
myFnc("image_2","image_2"),myFnc("image_3","image_3");
});

window.addEventListener("scroll", function(){
preloadImgs("<?php echo $img4 ?>");  
myFnc("image_4","image_4");
},{passive: true});


function preloadImgs() {
var d=document; var a=arguments; 
if(!d.FP_imgs) {d.FP_imgs=new Array();};
for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i];}
}
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
<div id="image_1" class="image_1"><img src="<?php echo $img0 ?>" alt="img_0" srcset="<?php echo $img0.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
<div id="image_2" ><img src="<?php echo $img0 ?>" alt="img_0" srcset="<?php echo $img0.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
<div id="image_3" ><img src="<?php echo $img0 ?>" alt="img_0" srcset="<?php echo $img0.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
<div id="image_4" ><img src="<?php echo $img0 ?>" alt="img_0" srcset="<?php echo $img0.' 2000w,'.$newImg0_300_px_name.' 300w,'.$newImg0_768_px_name.' 768w,'.$newImg0_1024_px_name.' 1024w' ?>" sizes="100vw" /></div>
  </body>
</html>