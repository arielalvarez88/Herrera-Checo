<?php

require_once dirname(__FILE__).'/IFilter.php';

Class ResidentialProjectLocalConditionFilter implements IFilter{
    public $fieldName;
    public $value;
    
    public function __construct($maxValue)
    {
        $this->fieldName = 'field_apt_condition';
        $this->value = $maxValue;
    }
    
     public function testCondition($object){
        $fieldName = $this->fieldName;
         $field = $object->$fieldName;

         return $field[0]['value'] == $this->value;
     }
    
   
}
?>
