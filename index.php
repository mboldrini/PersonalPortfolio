<?php get_header(); ?>
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-img.jpg" alt="" data-aos="fade-in" />
        <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
            <h2>I am Matheus Boldrini</h2>
            <p><span class="typed" data-typed-items="Software Engineer, Full-Stack Developer"></span></p>
        </div>
    </section>
<section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <?php
            $profile_query = new WP_Query(array(
                'post_type' => 'profile',
                'posts_per_page' => 1, // Para exibir apenas um perfil, ajuste conforme necessário
            ));

            if ($profile_query->have_posts()) :
                while ($profile_query->have_posts()) : $profile_query->the_post();
                    $name = get_field('name');
                    $profile = get_field('profile');
                    $email = get_field('email');
                    $phone = get_field('phone');
                    $about_me = get_field("about_me");
                    ?>
                    <div class="col-md-6">
                        <div class="row justify-content-between gy-4">
                            <div class="col-lg-5">
                                <?php
                                $image = get_field('profile_image');
                                if ($image) :
                                    ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-7 about-info">
                                <p><strong>Name: </strong> <span><?php echo esc_html($name); ?></span></p>
                                <p><strong>Profile: </strong> <span><?php echo esc_html($profile); ?></span></p>
                                <p><strong>Email: </strong> <span><?php echo esc_html($email); ?></span></p>
                                <p><strong>Phone: </strong> <span><?php echo esc_html($phone); ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-me">
                            <h4>About me</h4>
                            <?php echo esc_html($about_me); ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No profiles found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <?php
                $services = get_dynamic_services();
                foreach ($services as $service) :
                ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="<?php echo esc_attr($service['icon']); ?>"></i></div>
                        <a href="<?php echo esc_url($service['link']); ?>" class="stretched-link"><h3><?php echo esc_html($service['title']); ?></h3></a>
                        <p><?php echo esc_html($service['description']); ?></p>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section><!-- End Services Section -->
  <section id="stats" class="stats section">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/stats-bg.jpg" alt="" data-aos="fade-in" />
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <?php
            // Query para obter os posts do tipo 'frases'
            $frases_query = new WP_Query(array(
                'post_type' => 'frases',
                'posts_per_page' => -1,
            ));

            if ($frases_query->have_posts()) :
                while ($frases_query->have_posts()) : $frases_query->the_post();
                    // Obter o título da frase
                    $frase = get_the_title();
            ?>
            
            <div class="col-lg-12 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span style="font-size: 2rem;"><?php echo esc_html($frase); ?></span>
                </div>
            </div>
            <!-- End Stats Item -->

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Nenhuma frase encontrada.</p>';
            endif;
            ?>

        </div>
    </div>
</section>
<section id="portfolio" class="portfolio section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>
    <div class="container">
        <div class="isotope-layout"
            data-default-filter="*"
            data-layout="masonry"
            data-sort="original-order">            
            <div class="row gy-4 isotope-container"
                data-aos="fade-up"
                data-aos-delay="200">
                <?php
                $portfolio_args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => -1, // -1 para mostrar todos os posts
                );
                $portfolio_query = new WP_Query($portfolio_args);
                if ($portfolio_query->have_posts()) :
                    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                        $image = get_field('image');
                        $title = get_the_title();
                        $description = get_field('description');
                        $link = get_field('link');
                ?>
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                    <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($title); ?>" />
                    <div class="portfolio-info">
                        <h4><?php echo esc_html($title); ?></h4>
                        <p><?php echo esc_html($description); ?></p>
                        <a href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($title); ?>"
                            data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                class="bi bi-zoom-in"></i></a>
                        <a href="<?php echo esc_url($link); ?>" title="More Details" class="details-link"><i
                                class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhum item de portfólio encontrado.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
</main>
<?php get_footer(); ?>
