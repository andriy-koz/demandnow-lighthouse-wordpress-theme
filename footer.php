<!-- Footer -->
<footer id="contact">
<div class="footer-content">
<div class="footer-main">
<div class="footer-brand">
<h3>Ready to Scale Your Business?</h3>
<p class="footer-tagline">Join hundreds of growth-stage companies who've transformed their marketing with our AI-powered solutions. Get your free strategy call today.</p>
</div>
<div class="contact-form">
<h3>Get Your Free Strategy Call</h3>
<?php if (isset($_GET['form_success']) && $_GET['form_success'] == '1'): ?>
<div class="form-success-message" role="alert" aria-live="assertive">
<div class="success-content">
<span class="success-icon">✅</span>
<h4>Thank You!</h4>
<p>Your strategy call request has been submitted successfully. We'll be in touch within 24 hours to discuss your marketing goals.</p>
</div>
</div>
<?php else: ?>
<form method="POST" action="">
<input type="hidden" name="source_url" value="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="custom_lead_form" value="1">
<input type="hidden" name="form_type" value="contact">
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
<div class="form-group">
<label class="screen-reader-text" for="message">Message</label>
<textarea id="message" name="message" placeholder="Tell us about your growth goals..." rows="4" required></textarea>
</div>
<button type="submit" class="submit-button">Get a free strategy call</button>
</form>
<?php endif; ?>
</div>
</div>
<div class="footer-bottom">
<p>&copy; 2024 DemandNow.AI. All rights reserved. | Privacy Policy | Terms of Service</p>
</div>
</div>
</footer>
<?php wp_footer(); ?>

<!-- DemandNow.ai Nav: CSS + JS (drop-in) -->
<style>
/* ===== Desktop nav alignment ===== */
header nav{display:flex;align-items:center;justify-content:space-between;gap:24px}
header .nav-links{display:flex;align-items:center;gap:24px;margin:0;padding:0}
header .nav-links li{list-style:none}
header .nav-links a,.solutions-dropdown-toggle{display:inline-flex;align-items:center;line-height:1;padding:8px 0}
.solutions-dropdown{position:relative}
.solutions-dropdown-toggle svg{margin-left:6px;width:12px;height:12px;transform:translateY(1px)}
header{z-index:1000}
.solutions-dropdown-panel{top:calc(100% + 10px);z-index:1050}

/* ===== Mega menu (Claude styles, trimmed) ===== */
.solutions-dropdown-toggle{color:#374151;font-weight:500;cursor:pointer;transition:color .2s}
.solutions-dropdown-toggle:hover{color:#111827}
.solutions-dropdown-panel{display:none;position:absolute;left:50%;transform:translateX(-50%);margin-top:.75rem;width:900px;background:#fff;border-radius:.5rem;box-shadow:0 10px 40px rgba(0,0,0,.1);border:1px solid #f3f4f6}
.solutions-dropdown-panel.active{display:block}
.solutions-dropdown-content{padding:2rem}
.solutions-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem}
.solutions-category h3{font-size:.75rem;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:.05em;margin:0 0 1rem}
.solutions-list{display:flex;flex-direction:column;gap:.75rem}
.solution-item{display:flex;align-items:flex-start;gap:.75rem;padding:.75rem;border-radius:.5rem;text-decoration:none;transition:background-color .2s}
.solution-item:hover{background:#f9fafb}
.solution-icon svg{width:1.5rem;height:1.5rem}
.solution-content h4{margin:0 0 .125rem 0;font-weight:500;color:#111827;transition:color .2s}
.solution-item:hover .solution-content h4{color:#2563eb}
.solution-content p{margin:0;font-size:.875rem;color:#6b7280;line-height:1.5}
.case-study-banner{margin-top:2rem;padding:1.5rem;background:linear-gradient(90deg,#2563eb,#9333ea);border-radius:.5rem;display:flex;align-items:center;justify-content:space-between}
.case-study-icon svg{width:2rem;height:2rem;color:#fff}
.case-study-text h4{margin:0 0 .25rem 0;color:#fff;font-size:1.125rem;font-weight:600}
.case-study-text p{margin:0;color:#dbeafe;font-size:.875rem}
.case-study-button{background:#fff;color:#2563eb;padding:.625rem 1.5rem;border-radius:.375rem;font-weight:500;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem}
.case-study-button:hover{background:#eff6ff}

/* ===== Mobile nav (Clay-style accordion) ===== */
@media (max-width:768px){
  .mobile-nav-menu{padding:16px;background:#fff}
  .mobile-nav-menu .cta-button{width:100%;margin-top:16px;text-align:center}
  .mobile-nav-overlay{background:rgba(0,0,0,.25)}

  .m-nav{list-style:none;margin:0;padding:0}
  .m-row,.m-acc-toggle{
    width:100%;display:flex;align-items:center;justify-content:space-between;
    padding:16px 4px;font-size:18px;line-height:1.3;background:none;border:0;
    color:#111827;text-decoration:none;border-top:1px solid #eef0f2
  }
  .m-row:last-child{border-bottom:1px solid #eef0f2}
  .m-chevron{transition:transform .2s}

  .m-acc-panel{padding:8px 0 14px}
  .m-acc-panel[hidden]{display:none}

  .m-acc-panel h4{
    margin:12px 0 6px;font-size:12px;font-weight:700;color:#6b7280;
    text-transform:uppercase;letter-spacing:.04em
  }
  .m-link{display:block;padding:10px 0;font-size:16px;color:#111827;text-decoration:none}
  .m-link:hover{color:#2563eb}
  .m-cta-inline{display:inline-block;margin-top:6px;font-weight:600}
}
</style>

<script>
// ===== Desktop: Solutions mega dropdown =====
function toggleSolutionsDropdown(event){
  event.preventDefault();
  const toggle = event.currentTarget;
  const panel = toggle.parentElement.querySelector('.solutions-dropdown-panel');
  toggle.classList.toggle('active');
  panel.classList.toggle('active');
}
// close when clicking outside or pressing ESC
document.addEventListener('click', function(e){
  if(!e.target.closest('.solutions-dropdown')){
    document.querySelectorAll('.solutions-dropdown-toggle').forEach(t=>t.classList.remove('active'));
    document.querySelectorAll('.solutions-dropdown-panel').forEach(p=>p.classList.remove('active'));
  }
});
document.addEventListener('keydown', function(e){
  if(e.key === 'Escape'){
    document.querySelectorAll('.solutions-dropdown-toggle').forEach(t=>t.classList.remove('active'));
    document.querySelectorAll('.solutions-dropdown-panel').forEach(p=>p.classList.remove('active'));
  }
});

// ===== Mobile: Clay-style accordions =====
(function(){
  function closeAll(){
    document.querySelectorAll('#mobile-navigation .m-acc-panel').forEach(p=>p.hidden=true);
    document.querySelectorAll('#mobile-navigation .m-acc-toggle').forEach(b=>b.setAttribute('aria-expanded','false'));
    document.querySelectorAll('#mobile-navigation .m-chevron').forEach(c=>c.style.transform='rotate(0deg)');
  }
  document.addEventListener('click', function(e){
    const btn = e.target.closest('#mobile-navigation .m-acc-toggle');
    if(!btn) return; // click outside accordion toggles
    e.preventDefault();
    const panel = document.getElementById(btn.getAttribute('aria-controls'));
    const willOpen = panel.hidden;
    closeAll();
    if(willOpen){
      panel.hidden = false;
      btn.setAttribute('aria-expanded','true');
      const chev = btn.querySelector('.m-chevron'); if(chev) chev.style.transform='rotate(180deg)';
    }
  });
})();
</script>
<!-- /DemandNow.ai Nav -->


</body>
</html>