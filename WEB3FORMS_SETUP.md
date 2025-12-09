# Web3Forms Setup Guide - FREE Email Service

## ✅ What is Web3Forms?
Web3Forms is a **100% FREE** contact form backend that works perfectly with GitHub Pages and other static hosting. No server or PHP required!

---

## 🚀 Quick Setup (5 Minutes)

### Step 1: Get Your FREE Access Key

1. **Visit**: https://web3forms.com
2. **Enter your email**: `ssaazifrank6@gmail.com`
3. **Click**: "Create Access Key" button
4. **Check your email** for the access key (arrives instantly)
5. **Copy** the access key (looks like: `a1b2c3d4-e5f6-7890-abcd-ef1234567890`)

### Step 2: Add Access Key to Your Form

1. **Open** `contact.html` in your editor
2. **Find line 157** (or search for `YOUR_ACCESS_KEY_HERE`)
3. **Replace** `YOUR_ACCESS_KEY_HERE` with your actual access key:

```html
<input type="hidden" name="access_key" value="a1b2c3d4-e5f6-7890-abcd-ef1234567890">
```

### Step 3: Test Your Form

**Option A: Test Locally with PHP Server**
```powershell
php -S localhost:8000
```
Then open: `http://localhost:8000/contact.html`

**Option B: Deploy to GitHub Pages** (Recommended)
```powershell
git add .
git commit -m "Add Web3Forms integration"
git push origin main
```
Then visit: `https://martinkalz26.github.io/jonk_movers/contact.html`

### Step 4: Submit a Test Quote

1. Fill out the contact form
2. Click "Send Message"
3. Check `ssaazifrank6@gmail.com` inbox
4. You'll receive a beautifully formatted email!

---

## 📧 What Emails Look Like

### Email to You (ssaazifrank6@gmail.com):
```
From: Jonk Movers Website <noreply@web3forms.com>
Reply-To: customer@email.com
Subject: 🚚 New Moving Quote Request - Jonk Movers Inc.

Full Name: John Doe
Email: john@example.com
Phone: +1 (437) 123-4567
Service Requested: Residential Move
Preferred Move Date: 2025-12-15
Message: I need help moving from a 2-bedroom apartment...
```

---

## 🎯 Features Included

✅ **100% FREE Forever** - No credit card, no trials, no limits
✅ **Spam Protection** - Built-in honeypot and reCAPTCHA support
✅ **Email Notifications** - Instant delivery to your inbox
✅ **Custom Redirects** - Send users to thank-you page after submission
✅ **Auto-Reply** - Automatically send confirmation to customers
✅ **File Uploads** - Accept attachments (if needed)
✅ **Works Everywhere** - GitHub Pages, Netlify, Vercel, any static host
✅ **No Backend Needed** - Pure HTML form, no PHP/Node.js required

---

## 🔧 Advanced Configuration

### Add Auto-Reply to Customers

Add this field to your form (already included):
```html
<input type="hidden" name="from_name" value="Jonk Movers Website">
```

### Customize Email Subject

Already configured with:
```html
<input type="hidden" name="subject" value="🚚 New Moving Quote Request - Jonk Movers Inc.">
```

### Add Redirect After Submission

Create a `thank-you.html` page, then add:
```html
<input type="hidden" name="redirect" value="https://martinkalz26.github.io/jonk_movers/thank-you.html">
```

### Enable reCAPTCHA (Optional)

1. Get reCAPTCHA keys from Google
2. Add to form:
```html
<input type="hidden" name="recaptcha_site_key" value="YOUR_SITE_KEY">
```

---

## 🌐 Deploy to GitHub Pages

### Step 1: Push to GitHub
```powershell
git add .
git commit -m "Setup Web3Forms contact form"
git push origin main
```

### Step 2: Enable GitHub Pages
1. Go to your repository: `https://github.com/Martinkalz26/jonk_movers`
2. Click **Settings** tab
3. Scroll to **Pages** section (left sidebar)
4. Under **Source**, select: `main` branch
5. Click **Save**
6. Wait 2-3 minutes

### Step 3: Visit Your Live Site
Your website will be live at:
```
https://martinkalz26.github.io/jonk_movers/
```

---

## 🐛 Troubleshooting

### Email Not Received?

**1. Check Spam Folder**
- Web3Forms emails might land in spam initially
- Mark as "Not Spam" to train your filter

**2. Verify Access Key**
- Make sure you replaced `YOUR_ACCESS_KEY_HERE` with your actual key
- Check for typos or extra spaces

**3. Check Web3Forms Dashboard**
- Login to web3forms.com with your email
- View submission logs to see if form was received

**4. Verify Email Address**
- Web3Forms sends to the email you registered with
- Make sure it's `ssaazifrank6@gmail.com`

### Form Shows Error?

**Check Browser Console:**
1. Right-click → Inspect → Console tab
2. Look for error messages

**Common Issues:**
- Access key not added (shows `YOUR_ACCESS_KEY_HERE`)
- Form action URL incorrect
- JavaScript errors in console

### Form Redirects to Web3Forms Page?

This means you haven't added a custom redirect. Add this to your form:
```html
<input type="hidden" name="redirect" value="https://martinkalz26.github.io/jonk_movers/contact.html#success">
```

---

## 💰 Pricing (It's FREE!)

| Feature | Free Plan | Paid Plan |
|---------|-----------|-----------|
| Submissions | Unlimited | Unlimited |
| Email Notifications | ✅ Yes | ✅ Yes |
| Spam Protection | ✅ Yes | ✅ Yes |
| File Uploads | ✅ Yes | ✅ Yes |
| Custom Branding | ❌ No | ✅ Yes |
| Webhooks | ❌ No | ✅ Yes |
| Priority Support | ❌ No | ✅ Yes |
| **Price** | **$0/month** | $9/month |

**For your needs, the FREE plan is perfect!** ✨

---

## 📊 Alternatives (If Web3Forms Doesn't Work)

### 1. **Formspree** (Free Tier Available)
- 50 submissions/month free
- Similar setup to Web3Forms
- Website: https://formspree.io

### 2. **Netlify Forms** (Free with Netlify)
- Deploy to Netlify instead of GitHub Pages
- 100 submissions/month free
- Built-in spam filtering

### 3. **EmailJS** (Free Tier Available)
- 200 emails/month free
- Requires JavaScript library
- Website: https://www.emailjs.com

---

## ✅ Checklist

- [ ] Get access key from web3forms.com
- [ ] Add access key to contact.html line 157
- [ ] Test form locally with PHP server
- [ ] Push code to GitHub
- [ ] Enable GitHub Pages in repository settings
- [ ] Test live form on GitHub Pages
- [ ] Verify email arrives at ssaazifrank6@gmail.com
- [ ] Mark Web3Forms emails as "Not Spam"

---

## 🎉 Success!

Once you complete the steps above, your contact form will:
- ✅ Work perfectly on GitHub Pages (FREE hosting)
- ✅ Send emails to ssaazifrank6@gmail.com instantly
- ✅ Include all customer information formatted nicely
- ✅ Block spam automatically
- ✅ Work reliably without any server

**No PHP hosting needed! No monthly fees! Just pure, simple, free email delivery!** 🚀
