<?php
require_once dirname(__FILE__).'/IFilter.php';

Class ComercialProjectMinPriceFilter implements IFilter{
    public $fieldName;
    public $value;
    
    public function __construct($minvalue)
    {
        $this->fieldName = 'field_com_local_price';
        $this->value = $minvalue;
       
    }
    
     public function testCondition($object){
         $fieldName = $this->fieldName;
         $field = $object->$fieldName;
         
         return $field[0]['value'] >= $this->value;
     }
    
   
}

?>