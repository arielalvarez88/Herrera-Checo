<?php

require_once dirname(__FILE__).'/IFilter.php';

Class CasaMinConstructioneFilter implements IFilter{
    public $fieldName;
    public $value;
    
    public function __construct($maxValue)
    {
        $this->fieldName = 'field_com_local_construction';
        $this->value = $maxValue;
    }
    
     public function testCondition($object){
        $fieldName = $this->fieldName;
         $field = $object->$fieldName;

         return $field[0]['value'] >= $this->value;
     }
    
   
}
?>