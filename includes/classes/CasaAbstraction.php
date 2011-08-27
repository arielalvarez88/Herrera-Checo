<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/ProjectAbstraction.php';
require_once dirname(__FILE__) . '/ILocalContainerAbstraction.php';
require_once dirname(__FILE__) . '/ILocalContainerAbstraction.php';

class CasaAbstraction extends ProjectAbstraction implements ILocalContainerAbstraction, ILocalAbstraction {

    public function __construct($projectNode) {
        $this->projectNode = $projectNode;
        $this->projectTitleFieldName = 'field_casa_title';
        $this->projectDescriptionFieldName = 'field_casa_description';
        $this->projectShortDescriptionFieldName = 'field_casa_short_desc';
        $this->projectSlidesFieldName = 'field_casa_slides';
        $this->projectFeaturesFieldName = 'field_casa_features';
        $this->projectPaymentDescFieldName = 'field_casa_payment';
$this->projectRelatedProyectsFieldName = 'field_casa_relateds';

        $this->localsContainersTitleFieldName = 'field_casa_title';

        $this->localsNumberFieldName = 'field_casa_number';
        $this->localsPriceFieldName = 'field_casa_price';
        $this->localsConstructionFieldName = 'field_casa_construction';
        $this->localsConditionFieldName = 'field_casa_condition';
        $this->projectAddressFieldName = 'field_casa_address';

        $this->localsContainersAbstractions = $this->generateLocalsContainersAbstractions();
    }

    public function generateLocalsContainersAbstractions() {
        return array($this);
    }

    public function getLocalsContainers() {
        return $this->localsContainersAbstractions;
    }

    public function getTitle() {
        $fieldName = $this->localsContainersTitleFieldName;
        $field = $this->projectNode->$fieldName;
        return $field[0]['value'];
    }

    public function getLocals() {
        return array($this);
    }

    public function getPrice() {
        $fieldName = $this->localsPriceFieldName;
        $fieldsArray = $this->projectNode->$fieldName;
        return $fieldsArray[0]['value'];
    }

    public function getNumber() {
        $fieldName = $this->localsNumberFieldName;
        $fieldsArray = $this->projectNode->$fieldName;
 
        return $fieldsArray[0]['value'];
    }

    public function getConstruction() {
        $fieldName = $this->localsConstructionFieldName;
        $fieldsArray = $this->projectNode->$fieldName;
        return $fieldsArray[0]['value'];
    }

    public function getCondition() {
        $fieldName = $this->localsConditionFieldName;
        $fieldsArray = $this->projectNode->$fieldName;
        return $fieldsArray[0]['value'];
    }

       public function getLocalAbbr() {
        return 'Casa';
    }
    
    public function getFriendlyType()
    {
        return 'Casa';
    }

  
}

?>
