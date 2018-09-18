<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="container">
        <header>
            <div class="header">
                <div class="container">
                    <?php alicemaid_logo(); ?>
                    <div class="main-menu" id="navbar">                     
                        <?php alicemaid_menu('primary-menu'); ?>
                        <div class="search primary-menu">
                            <?php alicemaid_car(); ?>
                        </div>
                    </div>

                    
                </div>
            </div>
            <div class="menu-nav">
                <div class="container">
                    <h1>OUR BLOG</h1>   
                    <div class="nav-menu">
                        <ul class="nav-menu-list">
                            <?php alicemaid_home() ?>
                         </ul>
                    </div>
                </div>
            </div>
        </header>