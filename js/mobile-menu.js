document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-nav-menu');
    const mobileOverlay = document.querySelector('.mobile-nav-overlay');
    const mobileLinks = document.querySelectorAll('.mobile-nav-menu a');
    
    if (!mobileToggle || !mobileMenu || !mobileOverlay) return;
    
    // Toggle mobile menu
    function toggleMobileMenu() {
        const isActive = mobileToggle.classList.contains('active');
        
        if (isActive) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }
    
    // Open mobile menu
    function openMobileMenu() {
        mobileToggle.classList.add('active');
        mobileToggle.setAttribute('aria-expanded', 'true');
        mobileMenu.classList.add('active');
        mobileOverlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Fade in overlay
        requestAnimationFrame(() => {
            mobileOverlay.style.opacity = '1';
        });
    }
    
    // Close mobile menu
    function closeMobileMenu() {
        mobileToggle.classList.remove('active');
        mobileToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.remove('active');
        mobileOverlay.style.opacity = '0';
        document.body.style.overflow = '';
        
        // Hide overlay after transition
        setTimeout(() => {
            if (!mobileMenu.classList.contains('active')) {
                mobileOverlay.style.display = 'none';
            }
        }, 300);
    }
    
    // Event listeners
    mobileToggle.addEventListener('click', toggleMobileMenu);
    mobileOverlay.addEventListener('click', closeMobileMenu);
    
    // Close menu when clicking on links
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            setTimeout(closeMobileMenu, 100);
        });
    });
    
    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        }
    });
    
    // Close menu on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 900 && mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        }
    });
    
    // Initialize overlay styles
    mobileOverlay.style.opacity = '0';
    mobileOverlay.style.transition = 'opacity 0.3s ease';
    
    // Mobile nav CTA smooth scroll
    const mobileNavCTA = document.querySelector('.mobile-nav-cta');
    if (mobileNavCTA) {
        mobileNavCTA.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector('#contact');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }
}); 