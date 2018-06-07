# speed-image-load
three different way to load images (mobile responsive).
demo1.php is the normal way to load image. The result on lighthouse test is 98 of speed performance.
demo2.php get images through php curl and encode into base64 . The result on lighthouse test is 72 of speed performance. 
demo3.php get the first image in background on load and the others images always in background on scroll event. The result on lighthouse test is 100 of speed performance. 
In demo3.php to solve the problem of resizing and mobile responsive of the background images in a simple way I have put inside the div a png transparent image of 9.5kb  
