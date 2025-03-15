<?php
/**
 * The template for displaying SEO tool archives
 */

get_header();
?>

<main class="flex-1">
    <div class="container py-8">
        <header class="page-header mb-8">
            <h1 class="text-3xl font-bold"><?php esc_html_e('SEO Tools', 'proseokit'); ?></h1>
            <?php
            the_archive_description('<div class="archive-description prose prose-lg mt-4">', '</div>');
            ?>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>

        <?php the_posts_navigation(); ?>
    </div>
</main>

<?php
get_footer(); 