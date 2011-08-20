<?php

require_once dirname(__FILE__) . '/ResidentialProjectMinPriceFilter.php';
require_once dirname(__FILE__) . '/ProjectSearchResult.php';
require_once dirname(__FILE__) . '/ResidentialProjectMaxPriceFilter.php';
require_once dirname(__FILE__) . '/NullFilter.php';
require_once dirname(__FILE__) . '/ProjectAbsctractionFactory.php';

abstract class AbstractFindAlgorithm {

    protected $projectTypeName, $localsFilters, $projectsFilters;

    function __construct($projectTypeName, $localsFilters, $projectsFilters=null) {
        $this->projectTypeName = $projectTypeName;

        $this->localsFilters = $localsFilters;
        $this->projectsFilters = $projectsFilters ? $projectsFilters : array(new NullFilter());
        $this->runSearch();
    }

    public function runSearch() {
        $allProjectsNodes = $this->getPropertiesByType($this->projectTypeName);


        $filteredProjectsNodes = $this->filterProjects($allProjectsNodes, $this->projectsFilters);


        $projectsToLocalsMap = $this->getProjectsToLocalsMap($filteredProjectsNodes);



        $projectsSearchResults = $this->filterLocals($filteredProjectsNodes, $projectsToLocalsMap, $this->localsFilters);

        return $projectsSearchResults;
    }

    public function filterProjects($projectsNodes, $projectsFilters) {

        $filteredProjects = array();
        foreach ($projectsNodes as $projectNode) {

            if ($this->applyFilters($projectNode, $projectsFilters))
                $filteredProjects[] = $projectNode;
        }
        return $filteredProjects;
    }

    public function applyFilters($node, $filters) {


        $filtersCount = count($filters);
        $i = 0;
        for ($i; $i < $filtersCount; $i++) {
            echo 'Nodo---';
            var_dump($node);
            echo 'filtro---';
            var_dump($filters[$i]);
            echo 'Resultado';
            var_dump($filters[$i]->testCondition($node));
            if (!$filters[$i]->testCondition($node)) {

                break;
            }
        }

        return $i == $filtersCount;
    }

    public abstract function getProjectsToLocalsMap($localsFilters);

    public function filterLocals($projectNodes, $projectsToLocalsMap, $localFilters) {

        $searchResults = array();
        $coincidences = 0;

        foreach ($projectNodes as $projectNode) {

            $projectHash = spl_object_hash($projectNode);
            $projectLocals = $projectsToLocalsMap[$projectHash];

            foreach ($projectLocals as $projectLocal) {

                if ($this->applyFilters($projectLocal, $localFilters)) {
                    if (isset($searchResults[$projectHash]))
                        $searchResults[$projectHash]->addCoincidence();
                    else {
                        $projectAbstraction = ProjectAbstractionFactory::createProjectAbstraction($projectNode);
                        $searchResults[$projectHash] = new ProjectSearchResult($projectAbstraction, 1);
                    }
                }
            }
        }
        return $searchResults;
    }

    function getPropertiesByType($projectTypeName) {

        $projects = db_query("SELECT * FROM {node} WHERE type = '%s'", $projectTypeName);
        $projectsNodes = array();
        while ($project = db_fetch_object($projects)) {
            $projectsNodes[] = node_load($project->nid);
        }
        return $projectsNodes;
    }

}

?>