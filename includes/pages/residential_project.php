<?php require dirname(__FILE__) . '/../paths.php'; ?>
<?php
$buildingNumber = count($node->field_res_project_buildings);
$slidesNumber = count($node->field_res_project_slides);

?>
<?php require dirname(__FILE__) . '/../blocks/defaultTopBanner.php'; ?>
<!--<div id="proyecto-menu">
    <a><img src="<?php echo $paths->images; ?>/proyecto/leftMenu//comerciales.png"/></a>
    <a><img src="<?php echo $paths->images; ?>/proyecto/leftMenu/residenciales.png"/></a>
    <a><img src="<?php echo $paths->images; ?>/proyecto/leftMenu/residenciales.png"/></a>
    <div id="proyecto-menu-banner"></div>
</div>-->

<div id="proyecto">

    <div id="proyecto-info">
        <h2 id="proyecto-info-header"> <?php echo $node->field_res_project_title[0]['value'];?></h2>
        <div id="proyecto-slideshow-container">


            <div id="proyecto-slideshow">
                <?php for ($i = 0; $i < $slidesNumber; $i++): ?>



                    <img src="/<?php echo $node->field_res_project_slides[$i]['filepath']; ?> " class="proyecto-slideshow-slide"/>




                <?php endfor; ?>
            </div>
            <div id="proyecto-slideshow-pager-container">
                <img id="proyecto-slideshow-previous" src="<?php echo $paths->images; ?>/proyecto/previousButton.png"/>
                <div id="proyecto-slideshow-pager">
                    <?php for ($i = 0; $i < $slidesNumber; $i++): ?>

                        <?php if (($i + 1) == 1 || ($i + 1) % 5 == 0): ?>
                            <div class=proyecto-slideshow-pager-group">
                            <?php endif; ?>

                            <img src="/<?php echo $node->field_res_project_slides[$i]['filepath']; ?>" class="proyecto-slideshow-photos-selector"/>

                            <?php if ($i == $slidesNumber - 1 || ($i + 1) % 4 == 0): ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <img id="proyecto-slideshow-next" src="<?php echo $paths->images; ?>/proyecto/nextButton.png"/>
            </div>

        </div>

       
        <div id="proyecto-propiedades">
           
            <div id="proyecto-caracteristicas">
                
                  <h3>Descripci&oacute;n:</h3>
            <p><?php echo $node->field_res_project_large_desc[0]['safe']; ?></p>
            
                
                <h3>Caracter&iacute;sticas</h3>
                <p><?php echo $node->field_res_project_features[0]['value']; ?></p>

                <h3 id="proyecto-condiciones-de-pago">Condiciones de pago</h3>
                <p><?php echo $node->field_res_project_terminations[0]['safe']; ?></p>
            </div>
            <div id="proyecto-edificios-container">
                <h3>Disponibilidad</h3>
                <div id="proyecto-edificios">
                    <?php for($i=0; $i<$buildingNumber; $i++): ?>
                        <?php $building = $node->field_res_project_buildings[$i];?>
                    
                        <div>

                            <?php
                            $buildingNode = node_load($building["nid"]);
                            echo node_view($buildingNode);
                            ?>

                        </div>
                    <?php endfor; ?>
                </div>

            </div>

        </div>

        <?php require dirname(__FILE__) . '/../blocks/horizontalGradientDivisor.php'; ?>
        
        <div id="proyectos-residenciales-address">
            <h3>Direcci&oacute;n</h3>
            <?php if ($node->field_res_project_addr[0]['safe']): ?>
        
            <p><?php echo $node->field_res_project_addr[0]['safe']; ?></p>
            <?php endif; ?>
        </div>

    </div>


</div>

