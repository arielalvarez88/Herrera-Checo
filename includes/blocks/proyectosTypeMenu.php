<?php require dirname(__FILE__).'/../paths.php';?>
<div id="proyectos-type-menu">
    <?php require dirname(__FILE__).'/defaultTopBanner.php';?>
    <h3>Elija el tipo de Propiedad que busca</h3>
    <a href="/proyectos-comerciales"><img src="<?php echo $paths->images;?>/proyecto/leftMenu/comerciales.png"/></a>
    <a id="proyectos-type-menu-residenciales" href="/proyectos-residenciales"><img src="<?php echo $paths->images;?>/proyecto/leftMenu/residenciales.png"/></a>
    <?php $section='';?>
    <?php require dirname(__FILE__).'/horizontalGradientDivisor.php';?>
    <?php require dirname(__FILE__).'/venderAlquilarOption.php';?>
</div>