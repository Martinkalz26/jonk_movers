# PHP Contact Form Setup Instructions

## Overview
Your contact form now uses a custom PHP script (`send_quote.php`) to send emails directly to **ssaazifrank6@gmail.com**.

## Features
✅ Professional HTML email formatting with company branding
✅ Auto-reply sent to customer confirming receipt
✅ Server-side validation for security
✅ Honeypot spam protection
✅ Beautiful email design with customer details
✅ Reply-to header set to customer's email

---

## Local Testing

### Option 1: PHP Built-in Server (Recommended for Testing)

1. **Install PHP** (if not already installed):
   - Download from: https://www.php.net/downloads
   - Or use XAMPP/WAMP (Windows) or MAMP (Mac)

2. **Open Terminal/PowerShell** in your project folder:
   ```powershell
   cd c:\Users\Personal\projects\jonk_movers
   ```

3. **Start PHP server**:
   ```powershell
   php -S localhost:8000
   ```

4. **Open in browser**:
   ```
   http://localhost:8000/contact.html
   ```

5. **Test the form**:
   - Fill out and submit the contact form
   - Check your email at ssaazifrank6@gmail.com

### Option 2: XAMPP/WAMP (Full Local Environment)

1. Install XAMPP: https://www.apachefriends.org/
2. Copy your entire `jonk_movers` folder to `C:\xampp\htdocs\`
3. Start Apache in XAMPP Control Panel
4. Visit: `http://localhost/jonk_movers/contact.html`

---

## Production Deployment

### Requirements
Your hosting must support:
- ✅ PHP 7.4 or higher
- ✅ PHP `mail()` function enabled

### Recommended Hosting Providers

#### 1. **Hostinger** (Recommended - Cheapest)
- Price: ~$2-4/month
- PHP mail() enabled by default
- Easy cPanel setup
- Website: https://www.hostinger.com

#### 2. **SiteGround**
- Price: ~$3-6/month
- Excellent PHP support
- Website: https://www.siteground.com

#### 3. **Bluehost**
- Price: ~$3-8/month
- Good for beginners
- Website: https://www.bluehost.com

#### 4. **InMotion Hosting**
- Price: ~$5-10/month
- Business-grade
- Website: https://www.inmotionhosting.com

### Deployment Steps

1. **Purchase hosting** from one of the providers above

2. **Upload files via FTP or File Manager**:
   - Upload ALL files from `jonk_movers` folder to `public_html` (or `www`)
   - Make sure `send_quote.php` is uploaded

3. **Update email configuration** (if needed):
   - Open `send_quote.php`
   - Line 9: Verify email is `ssaazifrank6@gmail.com`
   - Line 10: Change `$from_email` to match your domain (e.g., `noreply@yourdomain.com`)

4. **Test the form**:
   - Visit your website at `http://yourdomain.com/contact.html`
   - Submit a test quote request
   - Check ssaazifrank6@gmail.com inbox (and spam folder)

---

## Troubleshooting

### Email Not Received?

**Check 1: Spam Folder**
- Check spam/junk folder in ssaazifrank6@gmail.com
- Mark as "Not Spam" if found there

**Check 2: PHP mail() Function**
- Contact your hosting provider
- Ask: "Is PHP mail() function enabled on my account?"
- Some hosts require SPF/DKIM records

**Check 3: Update From Email**
```php
// In send_quote.php, line 10, change to your domain:
$from_email = "noreply@yourdomain.com";  // Use your actual domain
```

**Check 4: Server Error Logs**
- Check hosting cPanel → Error Logs
- Look for PHP mail() errors

### Form Shows Error Message?

**Check browser console**:
1. Right-click → Inspect → Console tab
2. Look for JavaScript errors or 404 errors

**Verify file paths**:
- Make sure `send_quote.php` is in the same folder as `contact.html`
- Check file permissions (should be 644)

### Alternative: Use SMTP

If PHP mail() doesn't work, you can use SMTP (like Gmail) instead:

1. Install PHPMailer library
2. Configure Gmail SMTP settings
3. Use App Password for authentication

(Let me know if you need help with SMTP setup)

---

## Email Format Preview

### Email to You (ssaazifrank6@gmail.com):
```
Subject: 🚚 New Moving Quote Request - Jonk Movers Inc.

┌─────────────────────────────────────────┐
│     🚚 New Quote Request                │
│     Jonk Movers Inc. - Toronto          │
└─────────────────────────────────────────┘

👤 Customer Name
   John Doe

📧 Email Address
   john@example.com

📱 Phone Number
   +1 (437) 123-4567

─────────────────────────────────────────

🏠 Service Requested
   Residential Move

📅 Preferred Move Date
   December 15, 2025

💬 Customer Message
   ┌─────────────────────────────────────┐
   │ I need help moving from a 2-bedroom │
   │ apartment to a house...             │
   └─────────────────────────────────────┘
```

### Auto-reply to Customer:
```
Subject: Thank you for contacting Jonk Movers Inc.

Thank you for contacting Jonk Movers Inc.!

We've received your quote request and will get back 
to you within 24 hours.

What happens next?
• Our team will review your requirements
• We'll prepare a customized quote for you
• You'll receive a call or email with full details

If you have urgent questions, call us:
📞 +1 (437) 452-1402 or +1 (647) 633-8660
```

---

## Security Features

✅ **Server-side validation** - All inputs validated before processing
✅ **Honeypot field** - Blocks spam bots
✅ **Input sanitization** - Prevents XSS attacks
✅ **Email validation** - Proper format checking
✅ **MIME-type headers** - Secure email delivery

---

## Customization

### Change Email Template Colors
Edit `send_quote.php` lines 70-80 (CSS section):
```php
.header { background: #1E3A8A; }  // Change header color
.label { color: #1E3A8A; }        // Change label color
```

### Change Auto-Reply Message
Edit `send_quote.php` lines 145-180 (customer email section)

### Add More Form Fields
1. Add field to `contact.html`
2. Capture in `send_quote.php` (around line 33)
3. Add to email template (around line 95)

---

## Need Help?

If emails still don't work after deployment:
1. Share your hosting provider name
2. Check if they require additional email configuration
3. Consider using a third-party email service (SendGrid, Mailgun)

Most hosting providers enable PHP mail() by default, so this should work immediately after deployment! 🚀
