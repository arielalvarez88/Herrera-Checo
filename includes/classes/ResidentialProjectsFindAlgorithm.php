<?php
require_once dirname(__FILE__).'/AbstractFindAlgorithm.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ResidentialProjectsFindAlgorithm extends AbstractFindAlgorithm 
{
    function __construct($localsFilters,$projectFilter)
    {
  
        parent::__construct('residential_project',$localsFilters,$projectFilter);
        
    }
    
    public function getProjectsToLocalsMap($projectsNodes)
    {
   
        $map = array();
        $buildingField = 'field_res_project_buildings';
        $localField = 'field_building_apts';
        $buildings = array();
        foreach($projectsNodes as $projectNode)
        {
            
            $projectHash = spl_object_hash($projectNode);
            foreach($projectNode->$buildingField as $buildingInfo)
            {
                
                $buildingId = $buildingInfo['nid'];
                $buildingNode = node_load($buildingId);
                
                 
                foreach($buildingNode->$localField as $localInfo)
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
