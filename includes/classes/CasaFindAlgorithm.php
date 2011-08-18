<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ariel
 */
require_once dirname(__FILE__).'/AbstractFindAlgorithm';

class CasaFindAlgorithm extends AbstractFindAlgorithm{
    
    public function __construct($localsFilters, $projectsFilters = null) {
        parent::__construct('casa', $localsFilters, $projectsFilters);
    }
    
    public function getProjectsToLocalsMap($filteredProjectsNodes)
    {
        
        $map = array();
        
        foreach($filteredProjectsNodes as $projectNode)            
        {
            $projectHash = spl_object_hash($projectNode);
            $map[$projectHash] = $projectNode;
        }
       return $map;
    }

    
}

?>
