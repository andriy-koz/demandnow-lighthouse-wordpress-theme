# DemandNow.AI WordPress Theme

A modern, responsive WordPress theme designed for DemandNow.AI - AI-Powered Growth Marketing. This is a landing page focused theme that converts the original HTML design into a fully functional WordPress theme.

## Features

- **Responsive Design**: Mobile-first approach with perfect responsiveness across all devices
- **Modern UI**: Clean, professional design with smooth animations and hover effects
- **Landing Page + Blog**: Combined landing page and blog functionality
- **Card-Style Blog Layout**: Beautiful card-based design for blog posts listing
- **Blog Functionality**: Complete blog system with post listing, single post pages, and pagination
- **Modular Templates**: Separate header and footer templates for easy maintenance
- **Fast Loading**: Minimal dependencies and optimized CSS
- **SEO Ready**: Proper HTML structure and WordPress integration
- **Static Landing Content**: Landing page content is hardcoded, blog content is dynamic

## Theme Structure

```
demandnow-theme/
├── style.css          # Main stylesheet with theme header and blog styles
├── front-page.php     # Homepage template (highest priority)
├── index.php          # Fallback template
├── header.php         # Shared header template
├── footer.php         # Shared footer template
├── home.php           # Blog posts listing page
├── single.php         # Individual blog post template
├── page.php           # Static pages template
├── functions.php      # Theme functions and setup
└── README.md          # This file
```

## Installation Instructions

### Method 1: Direct Upload

1. **Prepare the theme files**:
   - Ensure all files (`style.css`, `index.php`, `functions.php`) are in the theme directory
   - Create a folder named `demandnow-theme` and place all files inside

2. **Upload to WordPress**:
   - Zip the entire `demandnow-theme` folder
   - Go to WordPress Admin → Appearance → Themes
   - Click "Add New" → "Upload Theme"
   - Select your zip file and click "Install Now"

### Method 2: FTP Upload

1. **Connect via FTP**:
   - Access your website via FTP
   - Navigate to `/wp-content/themes/`

2. **Upload theme folder**:
   - Upload the entire `demandnow-theme` folder to the themes directory
   - Ensure folder structure is correct: `/wp-content/themes/demandnow-theme/`

### Method 3: Local Development

1. **For local WordPress installations**:
   - Copy the theme folder to your local WordPress installation
   - Path: `your-wordpress-folder/wp-content/themes/demandnow-theme/`

## Activation

1. **Activate the theme**:
   - Go to WordPress Admin → Appearance → Themes
   - Find "DemandNow.AI Theme" and click "Activate"

2. **Configure homepage and blog**:
   - Go to Settings → Reading
   - Set "Your homepage displays" to "A static page"
   - Create a new page called "Home" (leave content empty) and set it as "Homepage"
   - Create a new page called "Blog" (leave content empty) and set it as "Posts page"
   - This will display the landing page at your main URL and blog at `/blog/`
   
   **Alternative (Current Setup)**: If you prefer to keep "Latest posts" as homepage:
   - The theme will automatically show the landing page as homepage (using front-page.php)
   - But you'll need to create a "Blog" page manually for the /blog/ URL to work

## Configuration

### Required WordPress Settings

1. **Permalink Structure**:
   - Go to Settings → Permalinks
   - Choose any structure except "Plain" for better SEO

2. **Site Title**:
   - Go to Settings → General
   - Update "Site Title" - this will appear in the browser title

### Theme Customization

Since this is a static content theme, all content modifications need to be done by editing the files directly:

- **Hero Section**: Edit lines 31-44 in `index.php`
- **Stats**: Edit lines 47-67 in `index.php`
- **Services**: Edit lines 70-113 in `index.php`
- **Pricing**: Edit lines 116-167 in `index.php`
- **Footer/Contact**: Edit lines 170-207 in `index.php`
- **Styling**: Modify `style.css` for any visual changes

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Dependencies

- **WordPress**: 5.0 or higher
- **PHP**: 7.4 or higher
- **Inter Font**: Loaded from Google Fonts CDN

## Notes

- This theme is designed as a single landing page
- The contact form is basic HTML - you may want to integrate with contact form plugins later
- All content is static and hardcoded as requested
- No additional WordPress features (widgets, menus, etc.) are included in this basic version

## Future Enhancements

When you're ready to expand the theme, consider adding:
- Dynamic content management
- Contact form functionality
- Blog post templates
- WordPress menu integration
- Theme customizer options
- Additional page templates

## Support

For any modifications or enhancements to this theme, you'll need to edit the theme files directly or consult with a WordPress developer.

## License

This theme is licensed under GPL v2 or later, same as WordPress. 