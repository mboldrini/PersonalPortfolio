<?php
/* 
 * Template Name: Starter Page
 */

get_header();
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Starter Page</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li class="current">Starter Page</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Starter Section</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <!-- WordPress Loop para exibir postagens -->
            <?php
            $args = array(
                'post_type' => 'post', // Tipo de postagem a ser exibido (post padrão do WordPress)
                'posts_per_page' => 5, // Quantidade de postagens a serem exibidas
                'order' => 'DESC', // Ordem das postagens (pode ser 'ASC' para ascendente)
                'orderby' => 'date' // Ordenar por data
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata(); // Restaurar dados originais da consulta
            else :
                ?>
                <p><?php esc_html_e('No posts found.', 'text-domain'); ?></p>
            <?php endif; ?>
        </div>

    </section><!-- /Starter Section Section -->

</main>

<?php get_footer(); ?>
