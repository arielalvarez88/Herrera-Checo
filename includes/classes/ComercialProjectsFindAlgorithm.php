<?php
require_once dirname(__FILE__).'/AbstractFindAlgorithm.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ComercialProjectsFindAlgorithm extends AbstractFindAlgorithm 
{
    function __construct($filterType,$localsFilters,$projectFilter)
    {
  
        parent::__construct($filterType,$localsFilters,$projectFilter);
        
    }
    
    public function getProjectsToLocalsMap($projectsNodes)
    {
   
        $map = array();
        $localContainerField = 'field_com_project_levels';
        $localField = 'field_com_project_level_locals';
        $containers = array();
        foreach($projectsNodes as $projectNode)
        {
            
            $projectHash = spl_object_hash($projectNode);
            foreach($projectNode->$localContainerField as $localContainerInfo)
            {
                
                $localContainerId = $localContainerInfo['nid'];
                $locaolContainerNode = node_load($localContainerId);
                
                 
                foreach($locaolContainerNode->$localField as $localInfo)
                {
                     
                    $localNodeId = $localInfo['nid'];                    
                    $localNode = node_load($localNodeId);
                    if(!isset($map[$projectHash]))
                        $map[$projectHash] = array();
                    $map[$projectHash][] = $localNode;
                }
                
            }
            
        }
        return $map;
    }
}




?>
