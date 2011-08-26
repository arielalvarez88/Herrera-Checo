<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/ProjectAbstraction.php';
require_once dirname(__FILE__).'/LocalContainerAbstraction.php';
class ResidentialProjectAbstraction extends ProjectAbstraction
{
   
    
    public function __construct($projectNode)
    {
        
                
        $this->projectNode = $projectNode;
        $this->projectTitleFieldName = 'field_res_project_title';
        $this->projectDescriptionFieldName = 'field_res_project_large_desc';
        $this->projectSlidesFieldName = 'field_res_project_slides';
        $this->projectFeaturesFieldName = 'field_res_project_features';
        $this->projectPaymentDescFieldName = 'field_res_project_terminations';
        $this->projectShortDescriptionFieldName = 'field_res_project_description';
        $this->projectLocalsContainersFieldName = 'field_res_project_buildings';                
        $this->projectRelatedProyectsFieldName = 'field_res_project_relateds';
        $this->localsContainersTitleFieldName = 'field_building_title';
        $this->localContainerLocalsFieldName = 'field_building_apts';        
        $this->localsNumberFieldName = 'field_apt_number';        
        $this->localsPriceFieldName = 'field_apt_price';
        $this->localsConstructionFieldName = 'field_apt_construction';
        $this->localsConditionFieldName = 'field_apt_condition';
        $this->projectAddressFieldName = 'field_res_project_addr';
        
        $this->localsContainersAbstractions = $this->generateLocalsContainersAbstractions();
    }
    public function getLocalAbbr() {
        return 'Apts.';
    }
    

    public function getFriendlyType()
    {
        return 'Proyecto Residencial';
    }
    
    

  
}
?>
