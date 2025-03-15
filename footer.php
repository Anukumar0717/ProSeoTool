</div><!-- #content -->

<footer class="border-t py-6 md:py-0">
    <div class="container flex flex-col items-center justify-between gap-4 md:h-24 md:flex-row">
        <div class="flex flex-col items-center gap-4 px-8 md:flex-row md:gap-2 md:px-0">
            <p class="text-center text-sm leading-loose text-muted-foreground md:text-left">
                <?php
                printf(
                    esc_html__('Built by %1$s. Powered by %2$s.', 'proseokit'),
                    '<a href="' . esc_url(home_url('/')) . '" class="font-medium underline underline-offset-4">' . get_bloginfo('name') . '</a>',
                    '<a href="https://wordpress.org" class="font-medium underline underline-offset-4">WordPress</a>'
                );
                ?>
            </p>
        </div>
        <nav class="flex items-center space-x-6">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'flex items-center space-x-6',
                'fallback_cb' => false,
                'items_wrap' => '%3$s',
                'walker' => new ProSEOKit_Nav_Walker(),
            ));
            ?>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html> 