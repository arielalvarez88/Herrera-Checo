<?php require dirname(__FILE__).'/../paths.php';?>
<?php $section = isset($section) && $section ? $section . '-' : ''; ?>
<div id="<?php echo $section; ?>filter">
    <div id="filter-header"><a href="#javascript" id="filter-comprar-option" class="filter-selected-option no-decoration-anchor filter-alquilar-comprar-option">COMPRAR</a><a id="filter-alquilar-option" class="no-decoration-anchor filter-alquilar-comprar-option">ALQUILAR</a></div>
    <div id="filter-parameters">
        <label>Tipo de propiedad</label>

        <select>
            <option>Apartamentos</option>
            <option>Local Comerciales</option>
        </select>
        
        <label>Tipo de propiedad</label>
        
        <select>
            <option>Apartamentos</option>
            <option>Local Comerciales</option>
        </select>
        <a id="filter-search-button" class="no-decoration-anchor"><img src="<?php echo $paths->images;?>/filter/buscarButton.png"/></a>
    </div>
</div>