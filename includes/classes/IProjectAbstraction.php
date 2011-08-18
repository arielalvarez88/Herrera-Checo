<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/IProjectAbstraction.php';
require_once dirname(__FILE__).'/LocalContainerAbstraction.php';

abstract class ProjectAbstraction
{
    
    protected $projectNode;
    protected $projectDescriptionFieldName;
    protected $projectSlidesFieldName;
    protected $projectTitleFieldName;    
    protected $projectLocalsContainersFieldName;
    protected $localsContainersTitleFieldName;
    protected $localContainerLocalsFieldName;
    protected $localsTitleFieldName;
    protected $localsPriceFieldName;
    protected $localsConstructionFieldName;
    protected $localsContainersAbstractions;
    protected $localsConditionFieldName;
    protected $projectFeaturesFieldName;
    protected $projectPaymentDescFieldName;
    protected $projectAddressFieldName;


    protected function generateLocalsContainersAbstractions()
    {
        $LocalsContainersAbstractions = array();
        $projectLocalsContainerFieldName = $this->projectLocalsContainersFieldName;
        $localsContainersInfo = $this->projectNode->$projectLocalsContainerFieldName;
        foreach($localsContainersInfo as $localsContainerInfo)
        {
            $localContainerNode = node_load($localsContainerInfo['nid']);
            
            $localContainerAbstraction = new LocalContainerAbstraction($localContainerNode, $this->localsContainersTitleFieldName, $this->localContainerLocalsFieldName, $this->localsTitleFieldName, $this->localsPriceFieldName, $this->localsConstructionFieldName,$this->localsConditionFieldName);
            $LocalsContainersAbstractions[] = $localContainerAbstraction;
        }
        return $LocalsContainersAbstractions;
    }
    

    public function getLocalsContainers()
    {
        return $this->localsContainersAbstractions;
    }
    public function getTitle()
    {
        $fieldName = $this->projectTitleFieldName;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['value'];
    }
    
    public function getDescription()
    {
        $fieldName = $this->projectDescriptionFieldName;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['value'];
    }
    
    public function getFeatures()
    {
        $fieldName = $this->projectFeaturesFieldName;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['value'];
    }
    
    public function getPaymentDesc()
    {
        $fieldName = $this->projectPaymentDescFieldName;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['value'];
    }
    
    
    public function getPictureUrl()
    {
        $fieldName = $this->projectSlidesFieldName;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['filepath'];
    }
    

    function getSlides()
    {
         $fieldName = $this->projectSlidesFieldName;                
         $slidesInfo = $this->projectNode->$fieldName;
         $slides = array();
         foreach($slidesInfo as $slideInfo)
             $slides[] = $slideInfo['filepath'];
        
         return $slides;
        
    }
    
    
    public function getAdderss()
    {
        $fieldName = $this->projectAddressFieldName;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['value'];
        
    }
 
    
}
?>


