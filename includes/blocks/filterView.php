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
            <option value="all" <?php echo isset($_GET['construction']) && $_GET['construction'] == "all"? 'selected = "selected"' : '';?>>Mostrar Todos</option>
            
            <option class=" filter-construction-value filter-construction-residential-value" value="60-150" <?php echo isset($_GET['construction']) && $_GET['construction'] == "60-150"? 'selected = "selected"' : '';?>>60 a 150 Metros</option>
            <option class=" filter-construction-value filter-construction-residential-value" value="151-250" <?php echo isset($_GET['construction']) && $_GET['construction'] == "151-250"? 'selected = "selected"' : '';?>>151 a 250 Metros</option>
            <option class=" filter-construction-value filter-construction-residential-value" value="251-350" <?php echo isset($_GET['construction']) && $_GET['construction'] == "251-350"? 'selected = "selected"' : '';?>>251 a 350 Metros</option>
            <option class=" filter-construction-value filter-construction-residential-value" value="351-x" <?php echo isset($_GET['construction']) && $_GET['construction'] == "351"? 'selected = "selected"' : '';?>>Mayor que 350 Metros</option>
            
            <option class=" filter-construction-value filter-construction-comercial-value " class="" value="10-30" <?php echo isset($_GET['construction']) && $_GET['construction'] == "10-30"? 'selected = "selected"' : '';?>>10 a 30 Metros</option>
            <option class=" filter-construction-value filter-construction-comercial-value" class="" value="31-60" <?php echo isset($_GET['construction']) && $_GET['construction'] == "31-60"? 'selected = "selected"' : '';?>>31 a 60 Metros</option>
            <option class=" filter-construction-value filter-construction-comercial-value" class="" value="61-90" <?php echo isset($_GET['construction']) && $_GET['construction'] == "61-90"? 'selected = "selected"' : '';?>>61 a 90 Metros</option>
            <option class=" filter-construction-value filter-construction-comercial-value" class="" value="91-120" <?php echo isset($_GET['construction']) && $_GET['construction'] == "91-120"? 'selected = "selected"' : '';?>>91 a 120 Metros</option>
            <option class=" filter-construction-value filter-construction-comercial-value" class="" value="121-150" <?php echo isset($_GET['construction']) && $_GET['construction'] ==  "121-150"? 'selected = "selected"' : '';?>>121 a 150 Metros</option>
            <option class=" filter-construction-value filter-construction-comercial-value" class="" value="151-x" <?php echo isset($_GET['construction']) && $_GET['construction'] == "151-x"? 'selected = "selected"' : '';?>>Mayor que 150 Metros</option>
        </select>
                
        
        <div id="filter-slider"></div>
       
        <p><span class="filter-slider-min-position bold">Desde</span> <span class="filter-slider-max-position bold">Hasta</span></p>
        <p><span class="filter-slider-min-position" id="filter-slider-min">$500,000</span> <span class="filter-slider-max-position" id="filter-slider-max">M&aacute; de $20,000,000</span></p>
        <a  id="filter-search-button" class="no-decoration-anchor"><img src="<?php echo $paths->images;?>/filter/buscarButton.png"/></a>
    </div>
</div>