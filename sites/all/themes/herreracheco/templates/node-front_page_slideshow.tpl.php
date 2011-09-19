<?php
require dirname(__FILE__) . '/../../../../../includes/paths.php';

?>

<div id="front-page-slideshow">
    <div id="front-page-slideshow-photo">
        <?php foreach($node->field_front_page_slides as $slide):?>
            <?php if ($slide): ?>
        
                <?php echo theme('imagecache','frontpage_slides_thumbs', $slide['filepath'],'slide','slide',array('class' => 'front-page-slideshow-photo'));?>
                
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div id="front-page-slideshow-pager">
        <a href="#javascript" class="no-decoration-anchor" id="front-page-slideshow-pager-previous"><img src="/sites/default/files/images/frontPageSlideShow/previousArrow.png"/></a>
        <a href="#javascript" class="no-decoration-anchor" id="front-page-slideshow-pager-next"><img src="/sites/default/files/images/frontPageSlideShow/nextArrow.png"/></a>
    </div>

</div>

