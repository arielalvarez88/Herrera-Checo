<?php

$proyectoId = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '';
$proyectoObject = node_load($proyectoId);
if($proyectoObject)
    echo node_view($proyectoObject);
else
    echo '<h1>Error: Id del proyecto incorrecto</h1>';

?>