# speed-image-load
 *  According to the browsers simultaneous connection limitations on HTTP/1 (six for many modern browsers) when we are developing a web page we have to evaluate the number of requests to the same domain server and than process the right and lighter load strategy.
A stategy could be to use the CDN and to put max six resource for page into a CDN, so you sort the web page resources in different domains.
 
 *  In this example, with no CDN, the goal is to load faster the web page, loading less resource possible at the beginning and then   defer all the other; 
resources (images in this case) that do not appear on the mobile screen and therefore do not need to load immediately.
 *  As reported by google, about 53% of smartphone users do not open a web page if a page does not load within 3 seconds. 
 The three seconds are refered to the fast 3G network with a 4x slow down cpu throttling. 
 In short, less is the page weight and less are the requests for page (HTTP/1) to the same domain server, less are the DOM breakpoint,    more we get in performance speed.
 *  There are three example with three different speed performance; according the lighthouse speed test the fastest is the example 4       (index_4.php)
 *  The weight, the size and also, optionally, the file format coversion of the new images for mobile screen, is processed by php class. 
 The css @media screen options set the size of background images.
 *  Php Class usage:
 include_once('./lib/class.resize.php');
 $ref=new imageResize;
 $newImage = $ref->resize('imagefile_source','directory',integer,integer,NULL,FALSE);   with this we generate the new image file resized;
 $newImage_name = $ref->newfilename;    with this we get the name (src) of the new image file resized;
   
 *  param1 = 'imagefile_source' -> is a string with the src of the image file es: 'http://www.example.com/image.png' or './images/image.png' ;
 
 *  param2 = 'directory' -> is a string with new directory name or the same local directory of the image source, example: 'new_mobile_images' or './images/new_mobile_images' or 'images' ;
 
 *  param3 = integer -> number integer, is the new width in pixel of the new image, usually we should use : 300 or 768 or 1024 ;
 
 *  param4 = integer -> number integer, is the compression level, default value is  NULL = No compression but this is good only for gif; IMPORTANT NOTE: 
 if the original file format is not a gif you have to insert a value;  possible values are from 0 to 100 for jpeg and webp where 
 100 is no compression and 0 is the max compression; 
 for png image files format, 0 to 9, at the contrary: 0 is no compression and 9 is max compression, I repeat, use NULL only for gif;
 
 * param5 = 'string' or NULL ->  if it is set to NULL = no file format will be converted, the possible values are string: 'webp' or 'jpeg' or 'png' or 'gif' ;
 
 *  param6 = the possible values are: TRUE OR FALSE -> TRUE to set Transparency (Alpha Channel), FALSE to not set Transparency; 
 IMPORTANT NOTE: when resize or convert the images set transparency only if the original file source is completely transparent and the source file format is png, gif or webp or if you wish to convert a sorce image into png, gif or webp completely transparent.
 
 *  the new image files are generated only one time if the files do not exist, if the files exist the class will get only the file names.  

