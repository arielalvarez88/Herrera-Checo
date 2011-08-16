<?php



class LocalContainerAbstraction
{
    private $localContainerNode;
    private $title;
    private $localsAbstractions;
    private $localsFieldName;
    private $localsTitleFieldName;
    private $localsPriceFieldName;
    private $localsConstructionFieldName;
    private $locals;
    private $localsConditionFieldName    ;
    public function __construct($localContainerNode,$titleFieldName,$localsFieldName, $localsTitleFieldName, $localsPriceFieldName,$localsConstructionFieldName,$localsConditionFieldName)
    {
        $this->localContainerNode = $localContainerNode;
        $this->titleFieldName = $titleFieldName;
        $this->localsFieldName = $localsFieldName;
        $this->localsTitleFieldName = $localsTitleFieldName;
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
        
        $localsTitle = $this->localsTitleFieldName;
        $localsPrice = $this->localsPriceFieldName;
        $localsConstruction = $this->localsConstructionFieldName;
        $localsCondition = $this->localsConditionFieldName;
        foreach($locasInfo as $localsInfo)
        {
            $localNode = node_load($localsInfo['nid']);
            
            $localAbstraction = new LocalAbastraction($localNode->$localsTitle[0]['value'], $localNode->$localsPrice[0]['value'], $localNode->$localsConstruction[0]['value'],$localNode->$localsCondition[0]['value']);
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
