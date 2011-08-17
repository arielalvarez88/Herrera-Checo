<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__).'/IProjectAbstraction.php';
require_once dirname(__FILE__).'/LocalContainerAbstraction.php';
class ResidentialProjectAbstraction extends ProjectAbstraction
{
   
    
    public function __construct($projectNode)
    {
        
                
        $this->projectNode = $projectNode;
        $this->projectTitleFieldName = 'field_res_project_title';
        $this->projectDescriptionFieldName = 'field_res_project_description';
        $this->projectSlidesFieldName = 'field_res_project_slides';
        $this->projectFeaturesFieldName = 'field_res_project_features';
        $this->projectPaymentDescFieldName = 'field_res_project_terminations';
        
        $this->projectLocalsContainersFieldName = 'field_res_project_buildings';                
        $this->localsContainersTitleFieldName = 'field_building_title';
        $this->localContainerLocalsFieldName = 'field_building_apts';        
        $this->localsTitleFieldName = 'field_apt_title';        
        $this->localsPriceFieldName = 'field_apt_price';
        $this->localsConstructionFieldName = 'field_apt_construction';
        $this->localsConditionFileName = 'field_apt_conndition';
        $this->projectAddressFieldName = 'field_res_project_address';
        $this->localsContainersAbstractions = $this->generateLocalsContainersAbstractions();
    }
    

  
}
?>
