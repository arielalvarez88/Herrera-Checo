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
    protected $projectSlides;
    protected $projectTitleFieldName;    
    protected $projectLocalsContainersFieldName;
    protected $localsContainersTitleFieldName;
    protected $localContainerLocalsFieldName;
    protected $localsTitleFieldName;
    protected $localsPriceFieldName;
    protected $localsConstructionFieldName;
    protected $localsContainersAbstractions;
    
  
    

    protected function generateLocalsContainersAbstractions()
    {
        $LocalsContainersAbstractions = array();
        $projectLocalsContainerFieldName = $this->projectLocalsContainersFieldName;
        $localsContainersInfo = $this->projectNode->$projectLocalsContainerFieldName;
        foreach($localsContainersInfo as $localsContainerInfo)
        {
            $localContainerNode = node_load($localsContainerInfo['nid']);
            
            $localContainerAbstraction = new LocalContainerAbstraction($localContainerNode, $this->localsContainersTitleFieldName, $this->localContainerLocalsFieldName, $this->localsTitleFieldName, $this->localsPriceFieldName, $this->localsConstructionFieldName);
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
    
    public function getPictureUrl()
    {
        $fieldName = $this->projectSlides;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['filepath'];
    }
    

    function getSlides()
    {
         $fieldName = $this->projectPictureUrlFieldName;                
        return $field = $this->projectNode->$fieldName;
        
    }
    
    
       
    function getLocals()
    {
        return $this->projectLocalsFieldName;
    }
    
}
?>


