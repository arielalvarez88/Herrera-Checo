<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/ProjectAbstraction.php';

class ComercialProjectAbstraction extends ProjectAbstraction
{
  
    public function __construct($projectNode)
    {
         $this->projectNode = $projectNode;
        $this->projectTitleFieldName = 'field_com_project_title';
        $this->projectDescriptionFieldName = 'field_com_project_description';
        $this->projectShortDescriptionFieldName = 'field_com_project_short_desc';
        $this->projectSlidesFieldName = 'field_com_project_slides';
        $this->projectFeaturesFieldName = 'field_com_project_features';
        $this->projectPaymentDescFieldName = 'field_com_project_pay_cond';
        $this->projectRelatedProyectsFieldName = 'field_com_project_relateds';
        $this->projectLocalsContainersFieldName = 'field_com_project_levels';                
        $this->localsContainersTitleFieldName = 'field_com_project_level_title';
        $this->localContainerLocalsFieldName = 'field_com_project_level_locals';        
        $this->localsNumberFieldName = 'field_com_local_number';        
        $this->localsPriceFieldName = 'field_com_local_price';
        $this->localsConstructionFieldName = 'field_com_local_construction';
        $this->localsConditionFieldName = 'field_com_local_condition';
        $this->projectAddressFieldName = 'field_com_project_address';
        $this->projectAtractivesFieldName = 'field_com_project_atractives';
        $this->localsContainersAbstractions = $this->generateLocalsContainersAbstractions();
    }
    
       public function getLocalAbbr() {
        return 'Local';
    }
    public  function getFriendlyType()
    {
        return 'Proyecto Comercial';
    }
 
    
    
}
?>
