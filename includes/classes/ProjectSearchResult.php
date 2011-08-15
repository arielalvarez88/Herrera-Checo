<?php


class ProjectSearchResult 
{
    private $projectAbstraction;
    private $coincidences;
    
    public function __construct($projectAbstraction,$coincidences)
    {
        $this->projectAbstraction = $projectAbstraction;
        $this->coincidences = $coincidences;
        
    }
    public function addCoincidence()
    {
        $this->coincidences += 1;
    }
    
    public function getProjectAbstraction()
    {
        return $this->projectAbstraction;
    }
    
    public function getCoincidences()
    {
        return $this->coincidences;
    }
    
}
?>
