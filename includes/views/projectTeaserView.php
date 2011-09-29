
<?php $projectsAbstractions = isset($viewsParams) && isset($viewsParams['projectsAbstractions']) ? $viewsParams['projectsAbstractions'] : false; ?>




<?php require_once dirname(__FILE__) . '/../paths.php'; ?>


<?php foreach ($projectsAbstractions as $projectAbstraction): ?>

    <?php if ($projectAbstraction): ?>
        <div class="proyecto first last odd">

            <div class="ultimos-proyectos-photo">


                <a class="imagefield imagefield-nodelink imagefield-field_res_project_slides" href="/proyectos/residencial-oasis-del-dorado"><?php echo theme('imagecache','projects_thumbs',$projectAbstraction->getPictureUrl(),'foto-del-proyecto',$projectAbstraction->getTitle())?></a>
            </div>


            <div class="ultimos-proyectos-info">


                <h4><?php echo $projectAbstraction->getTitle(); ?></h4>
                <h5><?php echo $projectAbstraction->getFriendlyType(); ?></h5>
                <p><?php echo $projectAbstraction->getShortDescription(); ?></p>
                <a href="/<?php echo $projectAbstraction->getPath(); ?>"><img src="/sites/default/files/images/ultimosProyectos/verProyecto.png"></a>

            </div>

        </div>
    <?php endif; ?>
<?php endforeach; ?>
