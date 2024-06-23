<?php

// Registrar os tipos de post personalizados
function custom_post_types() {
    // Tipo de post personalizado para Portfolio
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio Item',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'menu_icon' => 'dashicons-portfolio',
    ));

    // Tipo de post personalizado para Services
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'services'),
        'menu_icon' => 'dashicons-hammer',
    ));

    // Tipo de post personalizado para Frases
    register_post_type('frases', array(
        'labels' => array(
            'name' => 'Frases',
            'singular_name' => 'Frase',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'frases'),
        'menu_icon' => 'dashicons-format-quote', // Ícone para o menu
    ));

    // Tipo de post personalizado para Testimonials
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'menu_icon' => 'dashicons-testimonial',
    ));
}
add_action('init', 'custom_post_types');

// Função para obter os serviços dinâmicos
function get_dynamic_services() {
    $services = array();

    // Query para obter os posts do tipo 'services'
    $services_query = new WP_Query(array(
        'post_type' => 'services',
        'posts_per_page' => -1,
    ));

    if ($services_query->have_posts()) {
        while ($services_query->have_posts()) {
            $services_query->the_post();

            // Obter os campos personalizados do ACF
            $icon = get_field('icon');
            $title = get_field('title');
            $description = get_field('description');
            $link = get_field('link');

            // Adicionar ao array de serviços
            $services[] = array(
                'icon' => $icon,
                'title' => $title,
                'description' => $description,
                'link' => $link,
            );
        }
        wp_reset_postdata();
    }

    return $services;
}

// Função para obter a frase dinâmica das estatísticas
function get_stats_phrase() {
    // Verifica se a função ACF está disponível
    if (function_exists('get_field')) {
        // Obtém o valor do campo 'frase' da opção global do ACF
        $stats_phrase = get_field('frase', 'option');
        return $stats_phrase ? $stats_phrase : '';
    }
    return '';
}

// Habilitar suporte a thumbnails
add_theme_support('post-thumbnails');


// Função para registrar o menu de navegação
function register_my_menu() {
    register_nav_menu('main-menu', 'Main Menu');
}
add_action('after_setup_theme', 'register_my_menu');




function custom_register_post_type_profile() {
    register_post_type('profile', array(
        'labels' => array(
            'name' => 'Profiles',
            'singular_name' => 'Profile',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => false, // Se você não precisa de um arquivo de arquivamento
        'rewrite' => array('slug' => 'profile'),
        'menu_icon' => 'dashicons-id',
    ));
}
add_action('init', 'custom_register_post_type_profile');



function my_theme_enqueue_styles() {

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), null);

    // Registrando estilos
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css');
    wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Registrando scripts no footer
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('validate', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), false, true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), false, true);
    wp_enqueue_script('typed', get_template_directory_uri() . '/assets/vendor/typed.js/typed.umd.js', array(), false, true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', array(), false, true);
    wp_enqueue_script('purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), false, true);
    wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), false, true);
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), false, true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), false, true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
