<?php

class SlideshowUtilities
{
    public static function getPagerSubset($imagesArray, $setsSize)
    {
        $length = count($imagesArray);
        $imagesSets = array();
         
        
        
        for($i=0; $i < $length; $i++)
        {
            $numbersOfPicsOfThisSet = $i + $setsSize-1 <= $length-1 ? $setsSize : $length-1;   
            
            $imagesSets[] = implode(" ", array_slice($imagesArray, $i, $numbersOfPicsOfThisSet));
           
            if(($i + $numbersOfPicsOfThisSet-1) == $length-1)
                break;
        }
       
        
        return $imagesSets;
        
    }
}
?>
