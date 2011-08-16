<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/IProjectAbstraction.php';
require_once dirname(__FILE__).'/LocalAbstraction.php';
class ResidentialProjectAbstraction implements ProjectAbstraction
{
    
    private $projectNode;
    private $projectDescriptionFieldName;
    private $projectSlides;
    private $projectTitleFieldName;    
    private $projectLocalsContainersFieldName;
    private $localsContainersTitleFieldName;
    private $localContainerLocalsFieldName;
    private $localsTitleFieldName;
    private $localsPriceFieldName;
    private $localsConstructionFieldName;
    private $localsContainersAbstractions;
    public function __construct($projectNode)
    {
        
                
        $this->projectNode = $projectNode;
        $this->projectTitleFieldName = 'field_res_project_title';
        $this->projectDescriptionFieldName = 'field_res_project_description';
        $this->projectSlides = 'field_res_project_slides';
        $this->projectLocalsContainersFieldName = 'field_res_project_buildings';                
        $this->localsContainersTitleFieldName = 'field_building_title';
        $this->localContainerLocalsFieldName = 'field_building_apts';        
        $this->localsTitleFieldName = 'field_apt_title';        
        $this->localsPriceFieldName = 'field_apt_price';
        $this->localsConstructionFieldName = 'field_apt_construction';
        $this->localsContainersAbstractions = $this->generateLocalsContainersAbstractions();
    }
    

    private function generateLocalsContainersAbstractions()
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
