<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/IProjectAbstraction.php';

class ResidentialProjectAbstraction implements ProjectAbstraction
{
    
    private $projectNode;
    private $projectDescriptionFieldName;
    private $projectPictureUrlFieldName;
    private $projectTitleFieldName;
    
    
    public function __construct($projectNode)
    {
        $this->projectNode = $projectNode;
        $this->projectTitleFieldName = 'field_res_project_title';
        $this->projectDescriptionFieldName = 'field_res_project_description';
        $this->projectPictureUrlFieldName = 'field_res_project_slides';
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
        $fieldName = $this->projectPictureUrlFieldName;                
        $field = $this->projectNode->$fieldName;
        return $field[0]['filepath'];
    }
    
    
    
}
?>
