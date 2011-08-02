<?php require dirname(__FILE__) . '/../paths.php'; ?>

<?php $section = 'nuestros-servicios-header'; ?>

<div id="nuestros-servicios">

    <?php require dirname(__FILE__) . '/defaultTopBanner.php'; ?>
    
    <?php $section = false; ?>

    <h2>Nuestros Servicios</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit sagittis lectus dictum fringilla. Maecenas ullamcorper fermentum arcu vitae tempor. Mauris ligula odio, viverra at consequat eget, congue ac sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non laoreet purus.</p>

    <?php require dirname(__FILE__) . '/horizontalGradientDivisor.php'; ?>

    <img class="servicios-icon" src="<?php echo $paths->images ?>/nuestrosServicios/construccion.png"/>
    <div class="nuestros-servicios-servicio">
        <h2>Construccion</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit sagittis lectus dictum fringilla. Maecenas ullamcorper fermentum arcu vitae tempor. Mauris ligula odio, viverra at consequat eget, congue ac sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non laoreet purus.</p>
    </div>


    <?php require dirname(__FILE__) . '/horizontalGradientDivisor.php'; ?>

    <img class="servicios-icon" src="<?php echo $paths->images ?>/nuestrosServicios/diseno.png"/>
    <div class="nuestros-servicios-servicio">
        <h2>Construccion</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit sagittis lectus dictum fringilla. Maecenas ullamcorper fermentum arcu vitae tempor. Mauris ligula odio, viverra at consequat eget, congue ac sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non laoreet purus.</p>
    </div>

</div>