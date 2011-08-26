<?php require_once dirname(__FILE__) . '/../paths.php'; ?>
<?php require_once dirname(__FILE__) . '/../utilities/commify.php'; ?>
<?php require_once dirname(__FILE__) . '/../classes/ProjectAbsctractionFactory.php'; ?>
<?php require_once dirname(__FILE__) . '/../classes/LocalContainerAbstraction.php'; ?>
<?php require_once dirname(__FILE__) . '/../classes/LocalAbstraction.php'; ?>

<?php

$projectAbstraction = ProjectAbstractionFactory::createProjectAbstraction($node);
$localsContainers = $projectAbstraction->getLocalsContainers();
$localsContainersNumber = count($localsContainers);




$slides = $projectAbstraction->getSlides();
$slidesNumber = count($slides);
$showAllApartments = isset($_GET['ver-todos-apartamentos']) && $_GET['ver-todos-apartamentos'] == 1 ? 1 : 0;


$relatedProjects = $projectAbstraction->getRelatedProjectsAbstractions();

$viewsParams = array();
$viewsParams['projectsAbstractions'] = $relatedProjects;
?>



<div id="proyecto">

    <div id="proyecto-info">
        <h2 id="proyecto-info-header"> <?php echo $node->field_res_project_title[0]['value']; ?></h2>
        <div id="proyecto-slideshow-container">


            <div id="proyecto-slideshow">

                <?php for ($i = 0; $i < $slidesNumber; $i++): ?>



                    <img src="/<?php echo $slides[$i]; ?> " class="proyecto-slideshow-slide"/>




                <?php endfor; ?>
            </div>
            <div id="proyecto-slideshow-pager-container">
                <img id="proyecto-slideshow-previous" src="<?php echo $paths->images; ?>/proyecto/previousButton.png"/>
                <div id="proyecto-slideshow-pager">
                    <?php $limit = $slidesNumber < 4 ? $slidesNumber : 4; ?>
                    <?php for ($i = 0; $i < $slidesNumber; $i++): ?>

                        <?php for ($j = 0; $j < $limit && $i + $limit <= $slidesNumber; $j++): ?>
                            <?php if (($j + 1) == 1 || ($j + 1) % 5 == 0): ?>
                                <div class="proyecto-slideshow-pager-group">
                                <?php endif; ?>

                                <img src="/<?php echo $slides[$i + $j]; ?>" class="proyecto-slideshow-photos-selector proyecto-pager-for-<?php echo $i + $j; ?>"/>

                                <?php if ($j == $slidesNumber - 1 || ($j + 1) % 4 == 0): ?>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php endfor; ?>
                </div>
                <img id="proyecto-slideshow-next" src="<?php echo $paths->images; ?>/proyecto/nextButton.png"/>
            </div>

        </div>

        <h3 id="proyecto-description-header">Descripci&oacute;n:</h3>
        <p><?php echo $projectAbstraction->getDescription(); ?></p>
        <div id="proyecto-propiedades">

            <div id="proyecto-info-pago">



                <div id="proyecto-caracteristicas-atractivos">
                    <div id="proyecto-caracteristicas">
                        <h3>Caracter&iacute;sticas</h3>
                        <div id="proyecto-caracteristicas-text"><?php echo $projectAbstraction->getFeatures(); ?></div>
                        <div class="proyecto-shadow">
                            <img alt="sombra" src="<?php echo $paths->images; ?>/proyecto/shadow.png" />
                        </div>

                    </div>


                    <div id="proyecto-condiciones-pago">
                        <h3 id="proyecto-condiciones-de-pago">Condiciones de pago</h3>
                        <div id="proyecto-condiciones-pago-text"><?php echo $projectAbstraction->getPaymentDesc(); ?></div>
                        <div class="proyecto-shadow">
                            <img alt="sombra" src="<?php echo $paths->images; ?>/proyecto/shadow.png" />
                        </div>
                    </div>

                </div>

                <div id="proyecto-atractivos">
                    <h3>Atractivos</h3>
                    <div id="proyecto-atractivos-text"></div>
                    <div class="proyecto-shadow">
                        <img alt="sombra" src="<?php echo $paths->images; ?>/proyecto/shadow.png" />
                    </div>
                </div>


            </div>
            <div id="proyecto-edificios-container">
                <h3>Disponibilidad</h3>
                <div id="proyecto-edificios">
                    <?php for ($i = 0; $i < $localsContainersNumber; $i++): ?>                        
                        <div>

                            <?php
                            $localContainer = $localsContainers[$i];
                            if ($localContainer):
                                ?>

                                <div class="building">

                                    <h4 class="building-title"><?php echo $localContainer->getTitle(); ?></h4><img src="<?php echo $paths->images; ?>/building/buildingTitleCorner.png"/>
                                    <table class="hidden">
                                        <tr>
                                            <td class="bold building-apt-header"><?php echo $projectAbstraction->getLocalAbbr(); ?></td>
                                            <td class="bold building-apt-header">mts.</td>
                                            <td class="bold building-apt-header">Precio de venta</td>
                                        </tr>
                                        <?php $locals = $localContainer->getLocals(); ?>

                                        <?php foreach ($locals as $local): ?>

                                            <?php if (($local->getCondition() == 'vendido' && $showAllApartments) || $local->getCondition() == 'venta' || $local->getCondition() == 'alquiler'): ?>
                                                <tr>
                                                    <td><?php echo $local->getNumber(); ?></td>
                                                    <td><?php echo $local->getConstruction(); ?></td>
                                                    <td><?php echo commify($local->getPrice()); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>




                                    </table>

                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endfor; ?>
                </div>

            </div>

        </div>

        <?php require dirname(__FILE__) . '/../blocks/horizontalGradientDivisor.php'; ?>

        <div id="proyectos-residenciales-address">
            <h3>Direcci&oacute;n</h3>
            

                <p id="proyecto-address"><?php echo $projectAbstraction->getAdderss(); ?></p>
            
        </div>
        <?php if($relatedProjects[0]): ?>
            
        <div id="proyecto-relacionado">
            <h3>Proyectos Relacionados</h3>
            <?php require dirname(__FILE__).'/projectTeaserView.php';?>
        </div>    
        <?php endif;?>
        
        
    </div>
    <?php $section = 'proyectos'; ?>

</div>

