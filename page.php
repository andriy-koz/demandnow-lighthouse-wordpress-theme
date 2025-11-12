<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<!-- Page Hero Section -->
<section class="page-hero">
<div class="page-hero-content">
<h1 class="page-title"><?php the_title(); ?></h1>
</div>
</section>

<!-- Page Content Section -->
<section class="page-content">
<div class="page-container">
<article class="page-article">
<div class="page-body">
<?php the_content(); ?>
</div>
</article>
</div>
</section>

<?php endwhile; ?>
<?php else : ?>

<section class="page-not-found">
<div class="page-container">
<div class="not-found-content">
<h1>Page Not Found</h1>
<p>Sorry, the page you're looking for doesn't exist.</p>
<a href="<?php echo home_url(); ?>" class="cta-button">Back to Home</a>
</div>
</div>
</section>

<?php endif; ?>

<?php get_footer(); ?> 