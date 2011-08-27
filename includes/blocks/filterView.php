<?php require dirname(__FILE__).'/../paths.php';?>

<?php $section = isset($section) && $section ? $section . '-' : ''; ?>

<?php 

if(isset($_GET['condition']))
{
    if($_GET['condition'] == "venta")
    {
        $comprarInitialCondition = 'filter-selected-option' ;
    $alquilarInitialCondition = '' ;
    }
    else
    {
        $comprarInitialCondition = '' ;
    $alquilarInitialCondition = 'filter-selected-option' ;
    }
}


else
{
    $comprarInitialCondition = 'filter-selected-option' ;
    $alquilarInitialCondition = '' ;
}
?>
<div id="<?php echo $section; ?>filter">
    <div id="filter-header"><a href="#javascript" id="filter-comprar-option" class="<?php echo $comprarInitialCondition;?> no-decoration-anchor filter-alquilar-comprar-option">COMPRAR</a><a href="#javascript" id="filter-alquilar-option" class="<?php echo $alquilarInitialCondition;?> no-decoration-anchor filter-alquilar-comprar-option">ALQUILAR</a></div>
    <div id="filter-parameters">
        
        <label>Tipo de propiedad</label>

        <select id="filter-property-type" name="filter-property-type">
            <option value="residenciales" <?php echo isset($_GET['type']) && $_GET['type'] == "residenciales"? 'selected = "selected"' : '';?>>Apartamento</option>
            <option value="comerciales" <?php echo isset($_GET['type']) && $_GET['type'] == "comerciales"? 'selected = "selected"' : '';?>>Local Comercial</option>
            <option value="casas" <?php echo isset($_GET['type']) && $_GET['type'] == "casas"? 'selected = "selected"' : '';?>>Casa</option>
        </select>
        
        <label>Estado</label>
        
        <select id="filter-property-state" name="filter-property-state" >
            <option value="finished" <?php echo isset($_GET['state']) && $_GET['state'] == "finished"? 'selected = "selected"' : '';?>>Terminado</option>
            <option value="construction" <?php echo isset($_GET['state']) && $_GET['state'] == "constuction"? 'selected = "selected"' : '';?>>En Construcci&oacute;n</option>
            <option value="blueprints" <?php echo isset($_GET['state']) && $_GET['state'] == "blueprints"? 'selected = "selected"' : '';?>>Planos</option>
        </select>
        
        <label>Metros de la propiedad</label>
        
         <select id="filter-property-construction" name="filter-property-construction">
             <option value="all" <?php echo isset($_GET['construction']) && $_GET['construction'] == "all"? 'selected = "selected"' : '';?>>Eligir Tama&ntilde;o</option>
            <option value="50-100" <?php echo isset($_GET['construction']) && $_GET['construction'] == "50-100"? 'selected = "selected"' : '';?>>50 a 100 Metros</option>
            <option value="100-200" <?php echo isset($_GET['construction']) && $_GET['construction'] == "100-200"? 'selected = "selected"' : '';?>>100 a 200 Metros</option>
            <option value="200-300" <?php echo isset($_GET['construction']) && $_GET['construction'] == "200-300"? 'selected = "selected"' : '';?>>200 a 300 Metros</option>
            <option value="300-x" <?php echo isset($_GET['construction']) && $_GET['construction'] == "300-x"? 'selected = "selected"' : '';?>>Mayor de 300 Metros</option>
        </select>
        
        <div id="filter-slider"></div>
       
        <p><span class="filter-slider-min-position bold">Desde</span> <span class="filter-slider-max-position bold">Hasta</span></p>
        <p><span class="filter-slider-min-position" id="filter-slider-min">$500,000</span> <span class="filter-slider-max-position" id="filter-slider-max">M&aacute; de $20,000,000</span></p>
        <a  id="filter-search-button" class="no-decoration-anchor"><img src="<?php echo $paths->images;?>/filter/buscarButton.png"/></a>
    </div>
</div>