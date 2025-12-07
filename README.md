# Jonk Movers Inc. - Website

A modern, responsive website for Jonk Movers Inc., a professional moving company based in Toronto, Ontario, Canada.

## 🚀 Project Overview

This website showcases the services, mission, and values of Jonk Movers Inc. Built with Tailwind CSS for a clean, professional look with mobile-first responsive design.

## 📁 Project Structure

```
jonk_movers/
├── index.html          # Home page
├── about.html          # About Us page
├── services.html       # Services page
├── contact.html        # Contact page with form & map
├── assets/
│   ├── css/            # Custom CSS (if needed)
│   ├── js/
│   │   └── main.js     # JavaScript functionality
│   └── images/
│       └── hero-truck.svg  # Hero section truck illustration
└── README.md
```

## 🎨 Color Palette

### Primary Colors
- **Primary (Indigo 900)**: `#1E3A8A`
- **Secondary (Blue 600)**: `#2563EB`
- **Accent (Amber 500)**: `#F59E0B`

### Neutral Colors
- **Background (Slate 100)**: `#F1F5F9`
- **Text (Slate 900)**: `#0F172A`
- **Gray tones**: Various slate shades

## ✨ Features

### Pages Included
1. **Home Page** - Hero section, company highlights, services preview, testimonials, CTA
2. **About Us** - Mission, vision, core values, company stats
3. **Services** - Comprehensive list of all moving services with details
4. **Contact** - Contact form with validation, Google Maps integration, contact information

### Key Features
- ✅ Fully responsive design (mobile, tablet, desktop)
- ✅ Modern UI with Tailwind CSS
- ✅ Mobile navigation menu
- ✅ Contact form with client-side validation
- ✅ Google Maps integration
- ✅ Smooth scrolling
- ✅ SEO-optimized structure
- ✅ Fast loading (CDN-based Tailwind CSS)
- ✅ Accessible and clean code
- ✅ Font Awesome icons
- ✅ Animated cards on scroll

## 🛠️ Technologies Used

- **HTML5** - Semantic markup
- **Tailwind CSS** - Utility-first CSS framework (via CDN)
- **JavaScript (Vanilla)** - Interactive functionality
- **Font Awesome** - Icon library
- **Google Maps** - Location integration

## 🚀 Getting Started

### Prerequisites
- A modern web browser (Chrome, Firefox, Safari, Edge)
- A local web server (optional, but recommended)

### Installation

1. **Clone or download the project:**
   ```bash
   cd jonk_movers
   ```

2. **Open with a local server (recommended):**
   
   **Option A - Using Python:**
   ```bash
   # Python 3
   python -m http.server 8000
   
   # Then open: http://localhost:8000
   ```
   
   **Option B - Using PHP:**
   ```bash
   php -S localhost:8000
   
   # Then open: http://localhost:8000
   ```
   
   **Option C - Using VS Code Live Server:**
   - Install "Live Server" extension
   - Right-click `index.html`
   - Select "Open with Live Server"

3. **Or simply open the HTML files directly:**
   - Double-click `index.html` to open in your default browser
   - Note: Some features may work better with a local server

## 📱 Responsive Breakpoints

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

## 📝 Customization Guide

### Update Contact Information

Edit all HTML files and replace placeholder contact details:

```html
<!-- Phone Number -->
<a href="tel:+1234567890">+1 (xxx) xxx-xxxx</a>

<!-- Email -->
<a href="mailto:info@jonkmovers.ca">info@jonkmovers.ca</a>

<!-- Address -->
Toronto, Ontario, Canada
```

### Change Colors

Update the Tailwind config in each HTML file's `<head>`:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#1E3A8A',    // Change this
                secondary: '#2563EB',   // Change this
                accent: '#F59E0B',      // Change this
            }
        }
    }
}
```

### Modify Services

Edit `services.html` to add, remove, or update service offerings in the services grid section.

### Update Google Maps Location

In `contact.html`, find the iframe and replace the embed URL with your specific location:

```html
<iframe 
    src="YOUR_GOOGLE_MAPS_EMBED_URL" 
    width="100%" 
    height="100%" 
    style="border:0;">
</iframe>
```

To get your embed URL:
1. Go to [Google Maps](https://www.google.com/maps)
2. Search for your address
3. Click "Share" → "Embed a map"
4. Copy the iframe code

## 📧 Contact Form Setup

The contact form currently uses client-side validation only. To make it functional:

### Option 1: Formspree (Easy, Free)
1. Sign up at [Formspree.io](https://formspree.io/)
2. Get your form endpoint
3. Update the form in `contact.html`:
   ```html
   <form action="https://formspree.io/f/YOUR_FORM_ID" method="POST">
   ```

### Option 2: Backend Integration
Integrate with your backend API by modifying `assets/js/main.js`:
```javascript
// In the form validation section, add:
fetch('YOUR_API_ENDPOINT', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formData)
});
```

## 🎯 SEO Optimization

Each page includes:
- Meta descriptions
- Meta keywords
- Semantic HTML structure
- Alt text for images
- Proper heading hierarchy
- Fast loading times

### Improve SEO Further:
1. Add `robots.txt` file
2. Create `sitemap.xml`
3. Add structured data (JSON-LD)
4. Optimize images further
5. Set up Google Analytics
6. Set up Google Search Console

## 🖼️ Logo Recommendations

Use these AI prompts to generate a logo:

**Prompt 1 (Recommended):**
```
A modern, minimalistic logo for 'Jonk Movers Inc.' featuring a clean geometric 
moving truck icon, bold sans-serif typography, smooth lines, flat style, 
blue and steel grey palette, professional corporate look.
```

**Prompt 2:**
```
A sleek emblem logo for a Toronto moving company called 'Jonk Movers Inc.', 
incorporating a shield, a truck silhouette, and subtle maple leaf elements, 
clean vector style, trustworthy and strong.
```

Once you have a logo, replace the icon in the navbar with your logo image:
```html
<img src="assets/images/logo.png" alt="Jonk Movers Inc." class="h-12">
```

## 📦 Deployment Options

### Option 1: Netlify (Recommended)
1. Create account at [netlify.com](https://netlify.com)
2. Drag and drop the `jonk_movers` folder
3. Your site is live!

### Option 2: GitHub Pages
1. Create a GitHub repository
2. Push your code
3. Enable GitHub Pages in settings
4. Access at `username.github.io/repository-name`

### Option 3: Vercel
1. Sign up at [vercel.com](https://vercel.com)
2. Import your project
3. Deploy with one click

### Option 4: Traditional Web Hosting
1. Use FTP/SFTP client (FileZilla)
2. Upload all files to your web server
3. Ensure proper file permissions

## 🔧 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 📄 License

This project is created for Jonk Movers Inc. All rights reserved.

## 🤝 Support

For questions or issues:
- Email: info@jonkmovers.ca
- Phone: +1 (xxx) xxx-xxxx

## 🎨 Design Credits

- Icons: [Font Awesome](https://fontawesome.com/)
- CSS Framework: [Tailwind CSS](https://tailwindcss.com/)
- Fonts: System fonts for optimal performance

---

**Built with ❤️ for Jonk Movers Inc. - Toronto's Most Trusted Moving Partner**
