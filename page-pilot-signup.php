<?php
/**
 * Template Name: Pilot Signup Page
 * Template Post Type: page
 */
get_header();
?>

<!-- Hero Section -->
<section class="hero">
<div class="hero-content">
<div class="hero-badge">
<span>⚡</span>
AI Sales Pilot
</div>
<h1 style="font-size: 2em;">Stop Guessing. Start Selling. Join the Exclusive AI Sales Pilot.</h1>
<p class="hero-subtitle pilot-hero-subtitle">Tired of hours spent researching and writing?</p>
<p class="hero-subtitle pilot-hero-subtitle">Be among the first to experience our next-generation AI sales tool. We automate the tedious parts of your day, instantly providing:</p>
<ul class="service-features" style="max-width: 700px; margin: 24px auto;">
<li><strong>Deep Prospect Research:</strong> Get laser-focused insights on your target accounts.</li>
<li><strong>Personalized Email Generation:</strong> Create highly-converting, hyper-personalized emails in seconds.</li>
<li><strong>Custom Content Generation:</strong> Generate engaging content and talking points tailored to your prospect.</li>
</ul>
<p class="hero-subtitle pilot-hero-subtitle">Help shape the future of sales while getting early access to cutting-edge features that guarantee more conversions and bigger deals.</p>
</div> <!-- /.hero-content -->
</section> <!-- /.hero -->

<!-- Pilot Signup Form Section -->
<section class="pilot-form-section">
<div class="pilot-form-content">
<div class="pilot-signup-form">
<h3>Join the AI Sales Pilot</h3>
<?php if (isset($_GET['form_success']) && $_GET['form_success'] == '1'): ?>
<div class="form-success-message" role="alert" aria-live="assertive">
<div class="success-content">
<span class="success-icon">✅</span>
<h4>Thank You!</h4>
<p>Your pilot application has been submitted successfully. We'll be in touch soon with next steps.</p>
</div>
</div>
<?php else: ?>
<form method="POST" action="">
<input type="hidden" name="source_url" value="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="custom_lead_form" value="1">
<input type="hidden" name="form_type" value="pilot">
<div class="form-row">
<div class="form-group">
<label class="screen-reader-text" for="first_name">First Name</label>
<input id="first_name" type="text" name="first_name" placeholder="First Name" required>
</div>
<div class="form-group">
<label class="screen-reader-text" for="last_name">Last Name</label>
<input id="last_name" type="text" name="last_name" placeholder="Last Name" required>
</div>
</div>
<div class="form-group">
<label class="screen-reader-text" for="email">Email Address</label>
<input id="email" type="email" name="email" placeholder="Email Address" required>
</div>
<div class="form-group">
<label class="screen-reader-text" for="company">Company Name</label>
<input id="company" type="text" name="company" placeholder="Company Name" required>
</div>
<button type="submit" class="submit-button">Apply Now</button>
</form>
<?php endif; ?>
</div>
</div>
</section>

<?php get_footer(); ?>
