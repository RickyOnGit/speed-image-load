<?php 

class imageResize{
private $Scr = './images/trp.gif';
private $NewDir = 'images';
private $NewWidth = 2000;
private $Compr = NULL;
private $Conv= NULL;
private $Trans = FALSE;

private function setTransparency($new_image,$image_source) 
{       
$transparencyIndex = imagecolortransparent($image_source); 
$transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255); 
if ($transparencyIndex >= 0) { 
$transparencyColor = imagecolorsforindex($image_source, $transparencyIndex);    
} 
$transparencyIndex = imagecolorallocate($new_image, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']); 
imagefill($new_image, 0, 0, $transparencyIndex);
imagesavealpha($new_image, true ); 
imagecolortransparent($new_image, $transparencyIndex);  
}

public function resize($Scr,$NewDir,$NewWidth,$Compr=NULL,$Conv=NULL,$Trans=FALSE){
$this->Scr = $Scr; 
$this->NewDir = $NewDir;
$this->NewWidth = $NewWidth;
$this->Compr = $Compr;
$this->Conv = $Conv;
$this->Trans = $Trans;

$res_1 = basename(preg_replace('/.[^.]*$/', '', $this->Scr));
$dir = dirname($this->Scr) . PHP_EOL;
$directoryName = $this->NewDir; 
if(!is_dir($directoryName)){
mkdir($directoryName, 0777);
}
$size = getimagesize($this->Scr);
list($width, $height) = $size;
$dest_imagex = $this->NewWidth;
$dest_imagey = ($height*$dest_imagex/$width);
if ($this->Compr==NULL){
$q = 100;
} else 
{$q=$this->Compr;}

if ($this->Conv==NULL){
switch ($size['mime']) { 
    case "image/gif":
$newfilename = "./".$directoryName."/".$res_1."_".$dest_imagex."x".$dest_imagey."_".$q.".gif";  
        break; 
    case "image/jpeg":
$newfilename = "./".$directoryName."/".$res_1."_".$dest_imagex."x".$dest_imagey."_".$q.".jpeg";       
        break; 
    case "image/png":
$newfilename = "./".$directoryName."/".$res_1."_".$dest_imagex."x".$dest_imagey."_".$q.".png";   
        break; 
    case "image/webp":
$newfilename = "./".$directoryName."/".$res_1."_".$dest_imagex."x".$dest_imagey."_".$q.".webp"; 
       break; 
}}else{
$newfilename = "./".$directoryName."/".$res_1."_".$dest_imagex."x".$dest_imagey."_".$q.".".$this->Conv;
}
$this->newfilename = $newfilename;
if (!file_exists($newfilename)){
switch ($size['mime']) { 
    case "image/gif": 
        $im = imagecreatefromgif($this->Scr);
        $fF= 'gif'; 
        break; 
    case "image/jpeg": 
        $im = imagecreatefromjpeg($this->Scr);
        $fF= 'jpeg';       
        break; 
    case "image/png": 
        $im = imagecreatefrompng($this->Scr);
        $fF= 'png';  
        break; 
    case "image/webp": 
        $im = imagecreatefromwebp($this->Scr);
        $fF= 'webp'; 
        break; 
} 
$source_imagex = imagesx($im);
$source_imagey = imagesy($im);
$dest_image = imagecreatetruecolor($dest_imagex, $dest_imagey);

if (($fF=='png')||($fF=='gif')||($fF=='webp')&&($this->Trans==TRUE)){

$this->setTransparency($dest_image,$im);
imagealphablending($dest_image, true);
}
imagecopyresampled($dest_image, $im, 0, 0, 0, 0, $dest_imagex, $dest_imagey, $source_imagex, $source_imagey);
if ($this->Conv==NULL){
switch ($size['mime']) { 
    case "image/gif":                
        $newimg = imagegif($dest_image, $newfilename, $this->Compr); 
        break; 
    case "image/jpeg": 
        $newimg = imagejpeg($dest_image, $newfilename, $this->Compr);       
        break; 
    case "image/png":
        if ($this->Trans==TRUE){
        imagetruecolortopalette($dest_image, false, 255);
        }
        $newimg = imagepng($dest_image, $newfilename, $this->Compr);  
        break; 
    case "image/webp":
        if ($this->Trans==TRUE){
        $opacity = imagecolorallocatealpha($dest_image, 0, 0, 0, 127);
        imagefill($dest_image, 0, 0, $opacity);
        imagealphablending($dest_image, false );
        imagesavealpha($dest_image, true );
        }    
        $newimg = imagewebp($dest_image, $newfilename, $this->Compr); 
        break; 
} }
else if ($this->Conv=='webp'){
if ($this->Trans==TRUE){
$opacity = imagecolorallocatealpha($dest_image, 0, 0, 0, 127);
imagefill($dest_image, 0, 0, $opacity);
imagealphablending($dest_image, false );
imagesavealpha($dest_image, true );
}
$newimg = imagewebp($dest_image, $newfilename, $this->Compr);
}
else if ($this->Conv=='jpeg'){
$newimg = imagejpeg($dest_image, $newfilename, $this->Compr);
}
else if ($this->Conv=='png'){
if ($this->Trans==TRUE){
imagetruecolortopalette($dest_image, false, 255);
}
$newimg = imagepng($dest_image, $newfilename, $this->Compr);
}
else if ($this->Conv=='gif'){
$newimg = imagegif($dest_image, $newfilename, $this->Compr);
}
imagedestroy($im);
return $newimg; 
}
return $this->newfilename;
}
} 
?>
