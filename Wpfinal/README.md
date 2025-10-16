# Hrc Sallon WordPress Theme

A modern, responsive WordPress theme designed for learning purposes.

## Features

- **Responsive Design**: Mobile-first approach with responsive layouts
- **Custom Logo Support**: Upload your own logo from the customizer
- **Navigation Menus**: Primary and footer menu locations
- **Widget Areas**: Sidebar and footer widget areas
- **Featured Images**: Full support for post thumbnails
- **Custom Image Sizes**: Optimized image sizes for different contexts
- **Translation Ready**: Fully translatable with .pot file support
- **Accessibility**: Built with accessibility best practices
- **HTML5 Markup**: Modern, semantic HTML5 structure
- **Custom Template Tags**: Reusable functions for common tasks

## Installation

1. Download the theme ZIP file
2. Go to WordPress Admin > Appearance > Themes
3. Click "Add New" then "Upload Theme"
4. Choose the ZIP file and click "Install Now"
5. Activate the theme

## Setup

### Menus
1. Go to Appearance > Menus
2. Create a new menu
3. Assign it to "Primary Menu" location

### Widgets
1. Go to Appearance > Widgets
2. Add widgets to "Sidebar" or "Footer Widget Area"

### Custom Logo
1. Go to Appearance > Customize
2. Navigate to Site Identity
3. Upload your logo

## File Structure

\`\`\`
hrc-sallon/
├── js/
│   └── navigation.js       # Mobile menu and navigation scripts
├── template-parts/
│   ├── content.php         # Default post content template
│   ├── content-single.php  # Single post content template
│   ├── content-page.php    # Page content template
│   ├── content-search.php  # Search results template
│   └── content-none.php    # No content found template
├── 404.php                 # 404 error page
├── archive.php             # Archive pages template
├── comments.php            # Comments template
├── footer.php              # Footer template
├── functions.php           # Theme functions and features
├── header.php              # Header template
├── index.php               # Main template file
├── page.php                # Page template
├── search.php              # Search results page
├── searchform.php          # Search form template
├── sidebar.php             # Sidebar template
├── single.php              # Single post template
├── style.css               # Main stylesheet
└── README.md               # This file
\`\`\`

## Customization

### Colors
Edit the CSS variables in `style.css` to change the color scheme.

### Fonts
The theme uses system fonts by default. To add custom fonts, edit the `hrc_sallon_scripts()` function in `functions.php`.

### Layout
Modify the container width and spacing in `style.css` under the `.container` class.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Credits

- Theme Author: Shpat Berisha
- WordPress: https://wordpress.org/

## License

This theme is licensed under the GNU General Public License v2 or later.
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Support

For support and questions, visit: https://website.com/wp-devs

## Changelog

### Version 1.0
- Initial release
- Basic theme structure
- Responsive design
- Custom logo support
- Widget areas
- Navigation menus
