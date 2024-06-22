<?php
get_header();
?>

<main id="main" class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0"><?php the_title(); ?></h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
          <li class="current"><?php the_title(); ?></li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Starter Section Section -->
  <section id="starter-section" class="starter-section section">

    <!-- Section Title -->
    <div class="container section-title d-flex justify-content-center align-items-center" data-aos="fade-up">
      <h2><?php the_title(); ?></h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up">
      <p><?php the_content(); ?></p>
    </div>

  </section><!-- /Starter Section Section -->

</main>

<?php get_footer(); ?>
