<?php $section = isset($section) && $section? $section.'-':'';?>
<div class="block <?php echo $section;?>location-block">

   
    <?php if($section == 'proyectos-residenciales-' || $section=='proyectos-comerciales'):?>
    <h2 id="<?php echo $section;?>location-header">Localización</h2>
   <?php endif;?>
    
    <div id="<?php echo $section;?>localizacion">
        
            <?php print $block->content; ?>
    </div>



    <?php print $edit_links; ?>
   
</div> <!-- /block -->
