<?php
require dirname(__FILE__) . '/../paths.php';
$photosFolderRelativePath = $paths->images . '/frontPageSlideShow/';
$photosFolderAbsolutePath = realpath('./' . $photosFolderRelativePath);
$folder = opendir($photosFolderAbsolutePath);
?>

<div id="front-page-slideshow">
    <div id="front-page-slideshow-photo">
        <?php while ($file = readdir($folder)): ?>
            <?php if ($file != '.' && $file != '..' && $file != 'previousArrow.png' && $file != 'nextArrow.png'): ?>
                <img src="<?php echo $photosFolderRelativePath . $file; ?>" class="front-page-slideshow-photo"/>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
    <div id="front-page-slideshow-pager">
        <a href="#javascript" class="no-decoration-anchor" id="front-page-slideshow-pager-previous"><img src="/sites/default/files/images/frontPageSlideShow/previousArrow.png"/></a>
        <a href="#javascript" class="no-decoration-anchor" id="front-page-slideshow-pager-next"><img src="/sites/default/files/images/frontPageSlideShow/nextArrow.png"/></a>
    </div>

</div>

