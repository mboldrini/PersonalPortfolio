<?php
/* Template Name: Portfolio Details */
get_header();
?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0"><?php the_title(); ?></h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="<?php echo home_url(); ?>">Home</a></li>
          <li class="current">Portfolio Details</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Portfolio Details Section -->
  <section id="portfolio-details" class="portfolio-details section">

    <div class="container" data-aos="fade-up">

      <div class="portfolio-details-slider swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "navigation": {
              "nextEl": ".swiper-button-next",
              "prevEl": ".swiper-button-prev"
            },
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            }
          }
        </script>
        <div class="swiper-wrapper align-items-center">
          <?php if( have_rows('portfolio_images') ): while ( have_rows('portfolio_images') ) : the_row(); ?>
            <div class="swiper-slide">
              <img src="<?php the_sub_field('image'); ?>" alt="">
            </div>
          <?php endwhile; endif; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="row justify-content-between gy-4 mt-4">

        <div class="col-lg-8" data-aos="fade-up">
          <div class="portfolio-description">
            <h2><?php the_field('portfolio_title'); ?></h2>
            <p><?php the_field('portfolio_description'); ?></p>
            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span><?php the_field('testimonial'); ?></span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <div>
                <img src="<?php the_field('testimonial_image'); ?>" class="testimonial-img" alt="">
                <h3><?php the_field('testimonial_name'); ?></h3>
                <h4><?php the_field('testimonial_role'); ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: <?php the_field('category'); ?></li>
              <li><strong>Client</strong>: <?php the_field('client'); ?></li>
              <li><strong>Project date</strong>: <?php the_field('project_date'); ?></li>
              <li><strong>Project URL</strong>: <a href="<?php the_field('project_url'); ?>"><?php the_field('project_url'); ?></a></li>
              <li><a href="<?php the_field('project_url'); ?>" class="btn-visit align-self-start">Visit Website</a></li>
            </ul>
          </div>
        </div>

      </div>

    </div>

  </section><!-- /Portfolio Details Section -->

</main>

<?php get_footer(); ?>
