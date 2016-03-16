<?php 
/*
 * ImageCheck ... Is a script to verify that the ImageMagick library and ImageMagick php extension is installed on the hosting server.
 */

//Initializing functions.
class ImageCheck {
    
    function __construct(){
        $this->gd_check();
        $this->imagick_ext_check();
        $this->imagick_lib_check();    
    }
    
    //Checking for GD library and extension.
    function gd_check(){
        if(extension_loaded('gd')){
            echo 'GD extension and library installed<span style="background-color:50f524; margin-left:3px; padding:3px">YES</span><br /><br />';
        } else {
            echo 'GD extension and library not installed<span style="background-color:fe0101; margin-left:3px; padding:3px">NO</span><br /><br />';
        }
    }
    
    //Checking for imagick.so PHP extension.
    function imagick_ext_check(){
        
        if(extension_loaded('imagick')){
            echo 'ImageMagick PHP extension (imagick.so) loaded<span style="background-color:50f524; margin-left:3px; padding:3px">YES</span><br /><br />';
        } else {
            echo 'ImageMagick PHP extension (imagick.so) not loaded<span style="background-color:fe0101; margin-left:3px; padding:3px">NO</span><br /><br />';
        }
        
    }
    
    //Checking for ImageMagick library and convert version.
    function imagick_lib_check(){
        function alist ($array) {  
            $alist = "<ul>";
            for ($i = 0; $i < sizeof($array); $i++) {
              $alist .= "<li>$array[$i]";
            }
            $alist .= "</ul>";
            echo $alist;
        }
          //Try to get ImageMagick "convert" program version number.
          exec("convert -version", $out, $rcode);
          
          $code = $rcode;
          
          if($code == 0){
              echo 'ImageMagick Library installed<span style="background-color:50f524; margin-left:3px; padding:3px">YES</span><br /><br />';
              echo alist($out);
          } else {
              echo 'ImageMagick Library not installed<span style="background-color:fe0101; margin-left:3px; padding:3px">NO</span><br /><br />';
          }
          //Print the return code: 0 if OK, nonzero if error. 
          //return "Version return code is $rcode <br>";
          //Print the output of "convert -version"    
          //return alist($out);
          
    }
}

new ImageCheck;