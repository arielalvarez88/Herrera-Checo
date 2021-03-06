<?php


require_once dirname(__FILE__).'/LocalAbstraction.php';
require_once dirname(__FILE__).'/ILocalContainerAbstraction.php';

class LocalContainerAbstraction implements ILocalContainerAbstraction
{
    private $localContainerNode;
    private $title;
    private $localsAbstractions;
    private $localsFieldName;
    private $localsNumberFieldName;
    private $localsPriceFieldName;
    private $localsConstructionFieldName;
    private $locals;
    private $localsConditionFieldName    ;
    public function __construct($localContainerNode,$titleFieldName,$localsFieldName, $localsNumberFieldName, $localsPriceFieldName,$localsConstructionFieldName,$localsConditionFieldName)
    {
        $this->localContainerNode = $localContainerNode;
        $this->titleFieldName = $titleFieldName;
        $this->localsFieldName = $localsFieldName;
        $this->localsNumberFieldName = $localsNumberFieldName;
        $this->localsPriceFieldName = $localsPriceFieldName;
        $this->localsConstructionFieldName = $localsConstructionFieldName;
        $this->localsConditionFieldName = $localsConditionFieldName;
        
        $this->locals = $this->generateLocals();
    }


    private function generateLocals()
    {
        $localsFieldName = $this->localsFieldName;
        
        $localsInfo = $this->localContainerNode->$localsFieldName;
        $localsAbstractions = array();
        
        $localsNumberFieldName = $this->localsNumberFieldName;
        $localsPriceFieldName = $this->localsPriceFieldName;
        $localsConstructionFieldName = $this->localsConstructionFieldName;
        $localsConditionFieldName = $this->localsConditionFieldName;
        
        foreach($localsInfo as $localsInfo)
        {
            $localNode = node_load($localsInfo['nid']);
            
            $localNumberArray = $localNode->$localsNumberFieldName;
            $localNumber = $localNumberArray[0]['value'];
            
            $localPriceArray = $localNode->$localsPriceFieldName;
            $localPrice = $localPriceArray[0]['value'];
           
            
            $localConstructionArray = $localNode->$localsConstructionFieldName;
            $localConstruction = $localConstructionArray[0]['value'];
            
            $localConditionArray = $localNode->$localsConditionFieldName;
            $localCondition = $localConditionArray[0]['value'];
            
            $localAbstraction = new LocalAbstraction($localNumber, $localPrice, $localConstruction,$localCondition);
            $localsAbstractions[]= $localAbstraction;
            
        }
        return $localsAbstractions;
    }
    
    public function getTitle()
    {
        $fieldName = $this->titleFieldName;
        $field = $this->localContainerNode->$fieldName;
        return $field[0]['value'];
    }
    
    public function getLocals()
    {
        return $this->locals;
    }
    
    
    
}
?>
