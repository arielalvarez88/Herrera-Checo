
<?php $projectsAbstractions = isset($viewsParams) && isset($viewsParams['projectsAbstractions']) ? $viewsParams['projectsAbstractions'] : false; ?>




<?php require_once dirname(__FILE__) . '/../paths.php'; ?>


<?php foreach ($projectsAbstractions as $projectAbstraction): ?>

    <?php if ($projectAbstraction): ?>
        <div class="ultimos-proyectos first last odd">

            <div class="ultimos-proyectos-photo">


                <a class="imagefield imagefield-nodelink imagefield-field_res_project_slides" href="/proyectos/residencial-oasis-del-dorado"><img width="1400" height="900" src="/<?php echo $projectAbstraction->getPictureUrl(); ?>" alt="" class="imagefield imagefield-field_res_project_slides"></a>
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
