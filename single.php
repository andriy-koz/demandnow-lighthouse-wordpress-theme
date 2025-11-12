<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<!-- Post Hero Section -->
<section class="post-hero">
<div class="post-hero-content">
<div class="post-breadcrumb">
<a href="<?php echo home_url(); ?>">Home</a>
<span class="breadcrumb-separator">→</span>
<a href="<?php echo home_url('/blog/'); ?>">Blog</a>
<span class="breadcrumb-separator">→</span>
<span class="current-post"><?php the_title(); ?></span>
</div>
<h1 class="post-title"><?php the_title(); ?></h1>
<div class="post-meta">
<span class="post-date"><?php echo get_the_date('M j, Y'); ?></span>
<span class="post-separator">•</span>
<span class="post-read-time"><?php 
// Calculate reading time (average 200 words per minute)
$content = get_post_field('post_content', get_the_ID());
$word_count = str_word_count(strip_tags($content));
$reading_time = max(1, ceil($word_count / 200)); // Minimum 1 minute
echo $reading_time . ' min read';
?></span>
</div>
</div>
</section>

<!-- Post Content Section -->
<section class="post-content">
<div class="post-container">
<article class="post-article">
<div class="post-body">
<?php the_content(); ?>
</div>
</article>

<!-- Post Navigation -->
<div class="post-navigation">
<div class="nav-links">
<?php 
$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<?php if ($prev_post) : ?>
<div class="nav-previous">
<a href="<?php echo get_permalink($prev_post); ?>" class="nav-link">
<span class="nav-direction">← Previous</span>
<span class="nav-title"><?php echo get_the_title($prev_post); ?></span>
</a>
</div>
<?php endif; ?>

<?php if ($next_post) : ?>
<div class="nav-next">
<a href="<?php echo get_permalink($next_post); ?>" class="nav-link">
<span class="nav-direction">Next →</span>
<span class="nav-title"><?php echo get_the_title($next_post); ?></span>
</a>
</div>
<?php endif; ?>
</div>
</div>

<!-- Back to Blog -->
<div class="back-to-blog">
<a href="<?php echo home_url('/blog/'); ?>" class="back-link">
<svg width="16" height="16" viewBox="0 0 16 16" fill="none">
<path d="M10 3L5 8L10 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
Back to Blog
</a>
</div>
</div>
</section>

<?php endwhile; ?>
<?php else : ?>

<section class="post-not-found">
<div class="post-container">
<div class="not-found-content">
<h1>Post Not Found</h1>
<p>Sorry, the post you're looking for doesn't exist.</p>
<a href="<?php echo home_url('/blog/'); ?>" class="cta-button">Back to Blog</a>
</div>
</div>
</section>

<?php endif; ?>

<?php get_footer(); ?> 