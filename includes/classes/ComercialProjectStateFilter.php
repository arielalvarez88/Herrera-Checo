<?php
require_once dirname(__FILE__).'/IFilter.php';

Class ComerciallProjectStateFilter implements IFilter{
    public $fieldName;
    public $value;
    
    public function __construct($value,$fieldName='field_com_project_state')
    {
        $this->fieldName = $fieldName;
        $this->value = $value;
    }
    
     public function testCondition($object)
    {
        
        $fieldName = $this->fieldName;
        $field = $object->$fieldName;            
        
         return $field[0]['value'] == $this->value;
       
     }
    
   
}
?>
