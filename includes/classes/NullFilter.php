<?php
require_once dirname(__FILE__).'/IFilter.php';

class NullFilter implements IFilter{
    
    public function testCondition($localNode) {
        return true;
    }
}

?>
