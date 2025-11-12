<?php 
// DEBUG: Remove this after fixing
echo '<!-- DEBUG: home.php template is loading -->';
get_header(); 
?>

<!-- Blog Hero Section -->
<section class="blog-hero">
<div class="blog-hero-content">
<div class="hero-badge">
<span>📝</span>
Latest Insights
</div>
<h1 style="font-size: 2em;">DemandNow.AI Blog</h1>
<p class="hero-subtitle">Discover the latest strategies, insights, and trends in AI-powered growth marketing.</p>
</div>
</section>

<!-- Blog Posts Section -->
<section class="blog-posts">
<div class="blog-content">
<?php if (have_posts()) : ?>
<div class="blog-grid">
<?php while (have_posts()) : the_post(); ?>
<article class="blog-card">
<a href="<?php the_permalink(); ?>" class="blog-card-link">
<?php if (has_post_thumbnail()) : ?>
<div class="blog-featured-image">
<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
</div>
<?php else : ?>
<div class="blog-placeholder-image">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
</svg>
</div>
<?php endif; ?>
<div class="blog-card-content">
<div class="blog-meta">
<span class="blog-date"><?php echo get_the_date('M j, Y'); ?></span>
<span class="blog-separator">•</span>
<span class="blog-read-time"><?php 
// Calculate reading time (average 200 words per minute)
$content = get_post_field('post_content', get_the_ID());
$word_count = str_word_count(strip_tags($content));
$reading_time = max(1, ceil($word_count / 200)); // Minimum 1 minute
echo $reading_time . ' min read';
?></span>
</div>
<h3 class="blog-title">
<?php the_title(); ?>
</h3>
<p class="blog-excerpt">
<?php 
$excerpt = get_the_excerpt();
if (empty($excerpt)) {
echo 'Discover powerful strategies and insights that will transform your marketing approach and drive sustainable growth for your business.';
} else {
echo wp_trim_words($excerpt, 25, '...');
}
?>
</p>
</div>
</a>
</article>
<?php endwhile; ?>
</div>

<!-- Pagination -->
<div class="blog-pagination">
<?php
$pagination = paginate_links(array(
'type' => 'array',
'prev_text' => '← Previous',
'next_text' => 'Next →',
'mid_size' => 2,
'end_size' => 1,
));

if ($pagination) :
?>
<nav class="pagination-nav">
<?php foreach ($pagination as $page) : ?>
<span class="page-item"><?php echo $page; ?></span>
<?php endforeach; ?>
</nav>
<?php endif; ?>
</div>

<?php else : ?>
<div class="no-posts">
<div class="no-posts-content">
<h2>No Posts Found</h2>
<p>There are no blog posts available at the moment. Check back soon for the latest insights!</p>
<a href="<?php echo home_url(); ?>" class="cta-button">Back to Home</a>
</div>
</div>
<?php endif; ?>
</div>
</section>

<?php get_footer(); ?> 