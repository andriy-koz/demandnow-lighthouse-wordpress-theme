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
Pilot Program
</div>
<h1 style="font-size: 2em;">Join Our Exclusive Pilot Testing Program</h1>
<p class="hero-subtitle">Be among the first to experience our next-generation AI-powered marketing platform. Help shape the future while getting early access to cutting-edge features.</p>
</div> <!-- /.hero-content -->
</section> <!-- /.hero -->

<!-- Pilot Signup Form Section -->
<section class="services" style="padding: 80px 0;">
<div class="services-content">
<div class="contact-form" style="max-width: 600px; margin: 0 auto;">
<h3>Sign Up for Pilot Testing</h3>
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
