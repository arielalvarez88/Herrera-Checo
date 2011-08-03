<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
    <head>

        <title><?php print $head_title; ?></title>
        <?php print $head; ?>
        <?php print $styles; ?>
        <!--[if lte IE 6]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie6.css"</style><![endif]-->
        <!--[if IE 7]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie7.css"</style><![endif]-->

    </head>

    <body class="<?php print $body_classes; ?>">
        <div id="skip"><a href="#content"><?php print t('Skip to Content'); ?></a> <a href="#navigation"><?php print t('Skip to Navigation'); ?></a></div>  
        <div id="page-wrapper">
            <div id="page">

                <!-- ______________________ HEADER _______________________ -->

                <div id="header">

                    <div id="logo-title">
                        <?php if (!empty($logo)): ?>
                            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($primary_links)): ?>

                            <?php
                            if (!empty($primary_links)) {
                                print theme('links', $primary_links, array('id' => 'primary-links', 'class' => 'links main-menu'));
                            }
                            ?>


                        <?php endif; ?>                        

                        <?php if ($header): ?>
                            <div id="header-region">
                                <?php print $header; ?>
                            </div>
                        <?php endif; ?>

                        <?php // Uncomment to add the search box.// print $search_box;   ?>

                    </div> 
                </div><!-- /header -->

                <!-- ______________________ MAIN _______________________ -->

                <div id="main" class="clearfix">

                    <div id="content">
                        <div id="content-inner" class="inner column center">

                            <?php if ($content_top): ?>
                                <div id="content-top">
                                    <?php print $content_top; ?>
                                </div> <!-- /#content-top -->
                            <?php endif; ?>

                            <?php if ($center_left): ?>

                                <div id="center-left">
                                    <?php print $center_left; ?>
                                </div><!-- /#content-bottom -->
                            <?php endif; ?>

                            <?php if ($center_right): ?>
                                <div id="center-right">
                                    <?php print $center_right; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($content_bottom): ?>
                                <div id="content-bottom">
                                    <?php print $content_bottom; ?>
                                </div>
                            <?php endif; ?>


                        </div>
                    </div> <!-- /content-inner /content -->



                    <?php if ($left): ?>
                        <div id="sidebar-first" class="column sidebar first">
                            <div id="sidebar-first-inner" class="inner">
                                <?php print $left; ?>
                            </div>
                        </div>
                    <?php endif; ?> <!-- /sidebar-left -->

                    <?php if ($right): ?>
                        <div id="sidebar-second" class="column sidebar second">
                            <div id="sidebar-second-inner" class="inner">
                                <?php print $right; ?>
                            </div>
                        </div>
                    <?php endif; ?> <!-- /sidebar-second -->


                    <div id="drupal-content">

                        <?php if (in_array('administrator', array_values($user->roles)) && ($breadcrumb || $title || $mission || $messages || $help || $tabs)): ?>
                            <div id="content-header">

                                <?php print $breadcrumb; ?>

                                <?php if ($title): ?>
                                    <h1 class="title"><?php print $title; ?></h1>
                                <?php endif; ?>

                                <?php if ($mission): ?>
                                    <div id="mission"><?php print $mission; ?></div>
                                <?php endif; ?>

                                <?php print $messages; ?>

                                <?php print $help; ?> 

                                <?php if ($tabs): ?>
                                    <div class="tabs"><?php print $tabs; ?></div>
                                <?php endif; ?>

                            </div> <!-- /#content-header -->
                        <?php endif; ?>

                        <?php if ($content): ?>
                            <div id="content-area">
                                <?php print $content; ?>
                            </div> <!-- /#content-area -->
                        <?php endif; ?>
                            
                        <?php if ($drupal_content_bottom): ?>
                            <div id="drupal-content-bottom">

                                <?php print $drupal_content_bottom; ?>
                            </div>
                        <?php endif; ?>

                        <?php print $feed_icons; ?>


                    </div>


                </div> <!-- /main -->





                <!-- ______________________ FOOTER _______________________ -->


                <div id="footer">
                    <div id="footer-left-side">

                        <ul class="links sub-menu" id="secondary">
                            <li ><a class="secondary-link no-decoration-anchor" href="/">INICIO </a> |</li> 
                            <li ><a class="secondary-link no-decoration-anchor" href="/nosotros">NOSOTROS </a> |</li> 
                            <li><a class="secondary-link no-decoration-anchor" href="/proyectos-residenciales">PROYECTOS </a> | </li>

                            <li><a class="secondary-link no-decoration-anchor" href="/servicios">SERVICIOS</a> |</li>
                            <li><a class="secondary-link no-decoration-anchor" href="/contactos">CONTACTOS </a> </li> 

                        </ul>


                        <?php if (!empty($logo)): ?>
                            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                            </a>
                        <?php endif; ?>
                        <p>Copright 2011 <span class="blue-text">Constructora Herrero Checo</span></p>
                    </div>
                    <div class="vertical-gradient-divisor">
                        <img  src="/sites/default/files/images/common/verticalGradientDivisor.png"/>
                    </div>
                    <div id="footer-right-side">
                        <h2 id="herrera-checo-contacto-header">Contacto</h2>
                        <p id="herrera-checo-contacto">

                            <span class="herrera-checo-telefono blue-text" >T. 809-471-7807</span>
                            <span class="herrera-checo-telefono blue-text" >T. 809-471-7808</span>

                            <span id="herrera-checo-direccion">Direcci&oacute;n Av. Juan Pablo Duarte,<br/> Plaza las Ramblas Boulevard</span>
                        </p>
                    </div>

                </div> <!-- /footer -->


            </div> 
        </div><!-- /page -->
        <?php print $scripts; ?>
        <?php print $closure; ?>
    </body>
</html>