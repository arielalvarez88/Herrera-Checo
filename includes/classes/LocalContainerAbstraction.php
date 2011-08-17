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
        
        $localsTitleFieldName = $this->localsTitleFieldName;
        $localsPriceFieldName = $this->localsPriceFieldName;
        $localsConstructionFieldName = $this->localsConstructionFieldName;
        $localsConditionFieldName = $this->localsConditionFieldName;
     
        foreach($localsInfo as $localsInfo)
        {
            $localNode = node_load($localsInfo['nid']);
            
            $localTitleArray = $localNode->$localsTitleFieldName;
            $localTitle = $localTitleArray[0]['value'];
            
            $localPriceArray = $localNode->$localsPriceFieldName;
            $localPrice = $localPriceArray[0]['value'];
           
            
            $localConstructionArray = $localNode->$localsConstructionFieldName;
            $localConstruction = $localConstructionArray[0]['value'];
            
            $localConditionArray = $localNode->$localsConditionFieldName;
            $localCondition = $localConditionArray[0]['value'];
            
            $localAbstraction = new LocalAbastraction($localTitle, $localPrice, $localConstruction,$localCondition);
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
