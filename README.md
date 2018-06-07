# speed-image-load
Three different way to load images (mobile responsive) with three different speed performance.
demo1.php is the normal way to load image. The results on lighthouse tests are from 96 to 98 in speed performance.
demo2.php get images through php curl and encode into base64 . The results on lighthouse tests are from 72 to 92 max in speed performance.
To test demo2.php you need to use a secure server or you have to download the images file and change the url source image file, row n° 17 to row n° 20:

the original file is

set_option($ch1, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/1.jpg");
set_option($ch2, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/2.jpg");
set_option($ch3, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/3.jpg");
set_option($ch4, "https://raw.githubusercontent.com/RickyIta68/speed-image-load/master/4.jpg");

change into (after you have downloaded the images) :

set_option($ch1, "http://127.0.0.1/ ... path to image/1.jpg");
set_option($ch2, "http://127.0.0.1/ ... path to image/2.jpg");
set_option($ch3, "http://127.0.0.1/ ... path to image/3.jpg");
set_option($ch4, "http://127.0.0.1/ ... path to image/4.jpg");

demo3.php get the first image in background on load and the others images always in background on scroll event. The results on lighthouse tests are from 99 to 100 in speed performance : https://googlechrome.github.io/lighthouse/viewer/?gist=5bbc42a6b0e790f262add6420f3d00f1 
In demo3.php to solve the problem of resizing and mobile responsive of the background images in a simple way I have put inside the div a png transparent image of 9.5kb.  
