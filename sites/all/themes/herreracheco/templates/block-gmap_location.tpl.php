<?php $section = isset($section) && $section? $section.'-':'';?>
<div class="block <?php echo $section;?>location-block">

   
    
    <div id="<?php echo $section;?>localizacion">
        
            <?php print $block->content; ?>
    </div>



    <?php print $edit_links; ?>
   
</div> <!-- /block -->
