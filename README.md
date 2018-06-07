# speed-image-load
Two different way to load images (mobile responsive) with two different speed performance.
demo1.php is the normal way to load image. The results on lighthouse tests are from 96 to 97 in speed performance.
demo2.php get the first image in background on load and the others images always in background but on scroll event. The results on lighthouse tests are from 99 to 100 in speed performance : https://googlechrome.github.io/lighthouse/viewer/?gist=5bbc42a6b0e790f262add6420f3d00f1 
In demo2.php, to solve the problem of resizing and mobile responsive of the background images, in a simple way, I have put inside the div a png transparent image of 9.5kb.  
