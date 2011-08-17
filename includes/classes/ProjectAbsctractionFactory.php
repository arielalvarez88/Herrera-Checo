<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once  dirname(__FILE__).'/ResidentialProjectAbstraction.php';
require_once  dirname(__FILE__).'/ComercialProjectAbstraction.php';
class ProjectAbstractionFactory
{

    public static function createProjectAbstraction($projectNode)
    {
        $type = $projectNode->type;
        if($type == 'residential_project')
            return new ResidentialProjectAbstraction($projectNode);
        if($type == 'comercial_project')
            return new ComercialProjectAbstraction($projectNode);
    }
}

?>
