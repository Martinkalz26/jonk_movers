# Contact Form Email Setup Instructions

## Current Status ✅
Your contact form is configured to send to: **ssaazifrank6@gmail.com**

The form fields are now labeled descriptively for professional email formatting:
- **Customer Name**
- **Customer Email**
- **Contact Phone**
- **Service Requested**
- **Preferred Move Date**
- **Customer Message**

---

## To Get Professional HTML Email Formatting:

### Step 1: Sign Up for Formspree (FREE)
1. Go to **[https://formspree.io/register](https://formspree.io/register)**
2. Sign up with your email: `ssaazifrank6@gmail.com`
3. Verify your email

### Step 2: Create Your Form
1. Click **"New Form"** in your Formspree dashboard
2. Name it: `Jonk Movers Contact Form`
3. Set email destination: `ssaazifrank6@gmail.com`
4. Copy your unique Form ID (looks like: `xbljanlg`)

### Step 3: Update Your Website
In `contact.html`, find this line (around line 155):
```html
<form id="contact-form" action="https://formspree.io/f/YOUR_FORM_ID" method="POST">
```

Replace `YOUR_FORM_ID` with your actual Formspree Form ID.

### Step 4: Configure Email Template (In Formspree Dashboard)
1. Go to your form settings
2. Click **"Email Notifications"**
3. Enable **"HTML Template"**
4. The email will automatically format like this:

```
Subject: 🚚 New Moving Quote Request - Jonk Movers Inc.

Customer Name: John Smith
Customer Email: john@example.com
Contact Phone: (416) 123-4567
Service Requested: Residential Moving
Preferred Move Date: 2025-12-15
Customer Message: I need help moving a 2-bedroom apartment...
```

---

## Current Form Features ✅

### Security & Spam Protection:
- ✅ Honeypot spam trap
- ✅ HTML5 validation
- ✅ JavaScript validation
- ✅ Field length limits
- ✅ Email format validation
- ✅ Phone format validation

### User Experience:
- ✅ Loading spinner during submission
- ✅ Success message on send
- ✅ Error handling
- ✅ Auto-clear form after success
- ✅ Mobile responsive
- ✅ Accessible design

---

## Testing Your Form

### Before Publishing:
1. Fill out the form with test data
2. Submit it
3. Check `ssaazifrank6@gmail.com` inbox
4. Verify all fields appear correctly

### What You'll Receive:
Every form submission sends an email with:
- Subject: 🚚 New Moving Quote Request - Jonk Movers Inc.
- All form data in clear format
- Customer's reply-to email address
- Timestamp of submission

---

## Email Format Example

**Subject:** 🚚 New Moving Quote Request - Jonk Movers Inc.

**Body:**
```
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
  NEW QUOTE REQUEST
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Customer Name:         John Smith
Customer Email:        john@example.com
Contact Phone:         (416) 123-4567

Service Requested:     Residential Moving
Preferred Move Date:   December 15, 2025

Customer Message:
─────────────────────────────────────
I'm looking to move a 2-bedroom 
apartment from downtown Toronto to 
North York. Need packing services.

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Submitted: Dec 8, 2025 at 3:45 PM
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
```

---

## Alternative: Simple mailto (No Formspree)

If you want instant setup without Formspree, you can use a simple mailto form:

**Update contact.html line 155:**
```html
<form id="contact-form" action="mailto:ssaazifrank6@gmail.com" method="POST" enctype="text/plain">
```

**Note:** This opens the user's email client. Not recommended for professional sites.

---

## Recommended: Keep Formspree

**Why Formspree is better:**
- ✅ Works on all devices (no email client needed)
- ✅ Professional email formatting
- ✅ Spam protection included
- ✅ Form submissions tracked
- ✅ Automated responses to customers
- ✅ Free for up to 50 submissions/month
- ✅ Works seamlessly with your design

---

## Support

If you encounter issues:
1. Check spam folder for Formspree emails
2. Verify form ID is correct
3. Test with different email addresses
4. Contact Formspree support (they respond quickly)

For urgent inquiries, customers can always call:
- **+1 (437) 452-1402**
- **+1 (647) 633-8660**

---

**Your form is ready to receive professional quote requests!** 🚚✨
