<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
    <div class="container flex h-14 items-center">
        <div class="mr-4 flex">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="mr-6 flex items-center space-x-2">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<span class="font-bold">' . get_bloginfo('name') . '</span>';
                }
                ?>
            </a>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2 md:justify-end">
            <nav class="flex items-center space-x-6">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'flex items-center space-x-6',
                    'fallback_cb' => false,
                    'items_wrap' => '%3$s',
                    'walker' => new ProSEOKit_Nav_Walker(),
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content"> 