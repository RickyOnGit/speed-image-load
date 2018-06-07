<?php 
/**********************************************
 *  Riccardo Castagna Mba, Web Master (Palermo, IT)
 *  Speed Test 
 **********************************************/
$img0 = "http://raw.githubusercontent.com/RickyIta68/speed-image-load/master/trp.png"; 
/***************************************************************************** 
 * this "($img0)" is a 9.5 kb png transparent image, 
 * I have used this inside the div only to resize the div instead of using 
 * javascript or css @media screen, it's a more simple way to resize !!!
 ****************************************************************************/
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
.image_1{
background: url("<?php echo $img1 ?>") 100% 100% no-repeat;
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}
.image_2{
background: url("<?php echo $img2 ?>") 100% 100% no-repeat;
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}
.image_3{
background: url("<?php echo $img3 ?>") 100% 100% no-repeat;
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}
.image_4{
background: url("<?php echo $img4 ?>") 100% 100% no-repeat;
-webkit-background-size: contain;
-moz-background-size: contain;
-o-background-size: contain;
background-size: contain;
background-position: 0 0;
}



</style>
<script>
window.addEventListener("scroll", function(){  
myFnc("image_2","image_2"),myFnc("image_3","image_3"),myFnc("image_4","image_4");
},{passive: true});

function myFnc(id, cls) {
  var element, name, arr;
  element = document.getElementById(id);
  name = cls;
  arr = element.className.split(" ");
  if (arr.indexOf(name) == -1) {
      element.className += " " + name;
  }
}
</script>
  </head>
  <body>
<div id="image_1" class="image_1"><img src="<?php echo $img0 ?>" alt="img 0"></div>
<div id="image_2" ><img src="<?php echo $img0 ?>" alt="img 0"></div>
<div id="image_3" ><img src="<?php echo $img0 ?>" alt="img 0"></div>
<div id="image_4" ><img src="<?php echo $img0 ?>" alt="img 0"></div>
  </body>
</html>