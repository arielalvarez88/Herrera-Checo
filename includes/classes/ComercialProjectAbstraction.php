<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/IProjectAbstraction.php';

class ComercialProjectAbstraction extends ProjectAbstraction
{
  
    public function __construct($projectNode)
    {
            $this->projectNode = $projectNode;
        $this->projectTitleFieldName = 'field_com_project_title';
        $this->projectDescriptionFieldName = 'field_com_project_description';
        $this->projectSlidesFieldName = 'field_com_project_slides';
         $this->projectFeaturesFieldName = 'field_com_project_features';
        $this->projectPaymentDescFieldName = 'field_com_project_pay_cond';
        
        $this->projectLocalsContainersFieldName = 'field_com_project_levels';                
        $this->localsContainersTitleFieldName = 'field_level_title';
        $this->localContainerLocalsFieldName = 'field_level_locals';        
        $this->localsTitleFieldName = 'field_com_local_title';        
        $this->localsPriceFieldName = 'field_com_local_price';
        $this->localsConstructionFieldName = 'field_com_local_construction';
                $this->localsConditionFileName = 'field_com_local_conndition';
        $this->localsContainersAbstractions = $this->generateLocalsContainersAbstractions();
    }
    
    
 
    
    
}
?>
