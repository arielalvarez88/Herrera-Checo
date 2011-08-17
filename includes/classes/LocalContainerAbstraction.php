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
    
    public function __construct($localContainerNode,$titleFieldName,$localsFieldName, $localsTitleFieldName, $localsPriceFieldName,$localsConstructionFieldName)
    {
        $this->localContainerNode = $localContainerNode;
        $this->title = $titleFieldName;
        $this->localsFieldName = $localsFieldName;
        $this->localsTitleFieldName = $localsTitleFieldName;
        $this->localsPriceFieldName = $localsPriceFieldName;
        $this->localsConstructionFieldName = $localsConstructionFieldName;
        $this->locals = generateLocals();
    }


    private function generateLocals()
    {
        $localsFieldName = $this->localsFieldName;
        $localsInfo = $this->localContainerNode->$localsFieldName;
        $localsAbstractions = array();
        
        $localsTitle = $this->localsTitleFieldName;
        $localsPrice = $this->localsPriceFieldName;
        $localsConstruction = $this->localsConstructionFieldName;
        
        foreach($locasInfo as $localsInfo)
        {
            $localNode = node_load($localsInfo['nid']);
            
            $localAbstraction = new LocalAbastraction($localNode->$localsTitle[0]['value'], $localNode->$localsPrice[0]['value'], $localNode->$locasConstruction[0]['value']);
            $localsAbstractions[]= $localAbstraction;
            
        }
        return $localsAbstractions;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getLocals()
    {
        return $this->locals;
    }
    
    
    
}
?>
