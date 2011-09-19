<?php require dirname(__FILE__).'/../paths.php'; ?>

<h2 id="offices-slideshow-header">Nuestras Oficinas</h2>
<div>
<div id="offices-slideshow">
    
    <div id="offices-slideshow-photos-container">
        
        <?php for ($i = 1; $i < 6; $i++): ?>
            <?php
            $fieldname = 'field_oficinas_slideshow_slide' . $i;
            $field = $node->$fieldname;
            $fieldname = $field[0]['filepath'];
            ?>
            <?php if ($fieldname): ?>
                <?php echo theme('imagecache','offices_slides_thumbs',$fieldname,'slide','slide',array('class' => 'offices-slideshow-photos')); ?>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
    <img id="offices-slideshow-previous" class="offices-slideshow-navigator" src="<?php echo $paths->images; ?>/officesSlideshow/previousButton.png"/>
    <img id="offices-slideshow-next" class="offices-slideshow-navigator" src="<?php echo $paths->images; ?>/officesSlideshow/nextButton.png"/>
      
     
    
</div>
 
<div id="offices-slideshow-pager">

    </div>  
</div>