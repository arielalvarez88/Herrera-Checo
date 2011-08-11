<?php require dirname(__FILE__).'/../paths.php';?>
<?php $section = isset($section) && $section ? $section . '-' : ''; ?>
<?php 

if(isset($_GET['condition']))
{
    if($_GET['condition'] == "comprar")
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
            <option value="residenciales" <?php echo isset($_GET['type']) && $_GET['type'] == "residenciales"? 'selected = "selected"' : '';?>>Apartamentos</option>
            <option value="comerciales" <?php echo isset($_GET['type']) && $_GET['type'] == "comerciales"? 'selected = "selected"' : '';?>>Local Comerciales</option>
        </select>
        
        <label>Estado</label>
        
        <select id="filter-property-state" name="filter-property-state" id="filter-property-state">
            <option value="finished" <?php echo isset($_GET['state']) && $_GET['state'] == "finished"? 'selected = "selected"' : '';?>>Terminado</option>
            <option value="construction" <?php echo isset($_GET['state']) && $_GET['state'] == "constuction"? 'selected = "selected"' : '';?>>Construccion</option>
            <option value="bluprints" <?php echo isset($_GET['state']) && $_GET['state'] == "blueprints"? 'selected = "selected"' : '';?>>Planos</option>
        </select>
        
        
        <div id="filter-slider"></div>
       
        <p><span class="filter-slider-min-position">Desde</span> <span class="filter-slider-max-position">Hasta</span></p>
        <p><span class="filter-slider-min-position" id="filter-slider-min">RD $1000000</span> <span class="filter-slider-max-position" id="filter-slider-max">RD $5000000</span></p>
        <a href="#javascript" id="filter-search-button" class="no-decoration-anchor"><img src="<?php echo $paths->images;?>/filter/buscarButton.png"/></a>
    </div>
</div>