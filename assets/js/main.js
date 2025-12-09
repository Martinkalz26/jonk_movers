// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icon
            const icon = mobileMenuBtn.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = mobileMenu.contains(event.target);
            const isClickOnButton = mobileMenuBtn.contains(event.target);
            
            if (!isClickInsideMenu && !isClickOnButton && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }

    // Initialize slideshow
    initSlideshow();
});

// Hero Image Slideshow
let slideIndex = 0;
let slideTimer;

function initSlideshow() {
    const slides = document.getElementsByClassName('slide');
    if (slides.length > 0) {
        showSlides();
    }
}

function showSlides() {
    const slides = document.getElementsByClassName('slide');
    const dots = document.getElementsByClassName('dot');
    
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    
    // Remove active class from all dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(' active', '');
    }
    
    // Show current slide and highlight dot
    if (slides[slideIndex - 1]) {
        slides[slideIndex - 1].style.display = 'block';
    }
    if (dots[slideIndex - 1]) {
        dots[slideIndex - 1].className += ' active';
    }
    
    // Change slide every 4 seconds
    slideTimer = setTimeout(showSlides, 4000);
}

function currentSlide(n) {
    clearTimeout(slideTimer);
    slideIndex = n - 1;
    showSlides();
}

// Smooth Scrolling for Anchor Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Contact Form Validation and Submission
const contactForm = document.getElementById('contact-form');

if (contactForm) {
    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Reset previous error messages
        document.querySelectorAll('.text-red-500').forEach(error => {
            error.classList.add('hidden');
        });
        
        // Hide any previous messages
        document.getElementById('form-success').classList.add('hidden');
        document.getElementById('form-error').classList.add('hidden');
        
        // Get form values
        const fullName = document.getElementById('fullName').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const moveType = document.getElementById('moveType').value;
        const message = document.getElementById('message').value.trim();
        
        let isValid = true;
        
        // Validate Full Name
        if (fullName === '' || fullName.length < 2) {
            showError('fullName', 'Please enter your full name (at least 2 characters)');
            isValid = false;
        }
        
        // Validate Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            showError('email', 'Please enter your email');
            isValid = false;
        } else if (!emailRegex.test(email)) {
            showError('email', 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate Phone
        const phoneRegex = /^[\d\s\-\(\)\+]{10,}$/;
        if (phone === '') {
            showError('phone', 'Please enter your phone number');
            isValid = false;
        } else if (phone.length < 10 || !phoneRegex.test(phone)) {
            showError('phone', 'Please enter a valid phone number (at least 10 digits)');
            isValid = false;
        }
        
        // Validate Move Type
        if (moveType === '') {
            showError('moveType', 'Please select a move type');
            isValid = false;
        }
        
        // Validate Message
        if (message === '') {
            showError('message', 'Please enter a message');
            isValid = false;
        } else if (message.length < 10) {
            showError('message', 'Message must be at least 10 characters long');
            isValid = false;
        }
        
        // If form is valid, submit to PHP
        if (isValid) {
            const submitBtn = document.getElementById('submit-btn');
            const originalBtnText = submitBtn.innerHTML;
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';
            
            try {
                // Submit form data using Fetch API
                const formData = new FormData(contactForm);
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                
                const result = await response.json();
                
                if (result.success || response.ok) {
                    // Success - show success message
                    contactForm.reset();
                    const successMessage = document.getElementById('form-success');
                    const successText = successMessage.querySelector('p');
                    if (successText) {
                        successText.textContent = result.message;
                    }
                    successMessage.classList.remove('hidden');
                    
                    // Scroll to success message
                    successMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    
                    // Hide success message after 10 seconds
                    setTimeout(() => {
                        successMessage.classList.add('hidden');
                    }, 10000);
                } else {
                    // Error - show error message
                    const errorMessage = document.getElementById('form-error');
                    const errorText = errorMessage.querySelector('p');
                    
                    // If there are specific validation errors, show them
                    if (result.errors && result.errors.length > 0) {
                        errorText.innerHTML = '<strong>Please correct the following:</strong><br>' + result.errors.join('<br>');
                    } else if (result.message) {
                        errorText.textContent = result.message;
                    }
                    
                    errorMessage.classList.remove('hidden');
                    errorMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    
                    // Hide error message after 8 seconds
                    setTimeout(() => {
                        errorMessage.classList.add('hidden');
                    }, 8000);
                }
            } catch (error) {
                // Network error - show error message
                const errorMessage = document.getElementById('form-error');
                const errorText = errorMessage.querySelector('p');
                errorText.textContent = 'Network error. Please try again or call us at +1 (437) 452-1402';
                errorMessage.classList.remove('hidden');
                errorMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                
                setTimeout(() => {
                    errorMessage.classList.add('hidden');
                }, 8000);
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        }
    });
    
    function showError(fieldId, message) {
        const errorElement = document.getElementById(fieldId + '-error');
        const inputElement = document.getElementById(fieldId);
        
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
        
        if (inputElement) {
            inputElement.classList.add('border-red-500');
            inputElement.classList.remove('border-gray-300');
        }
    }
    
    // Remove error styling on input
    const formInputs = contactForm.querySelectorAll('input, select, textarea');
    formInputs.forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('border-red-500');
            this.classList.add('border-gray-300');
            
            const errorElement = document.getElementById(this.id + '-error');
            if (errorElement) {
                errorElement.classList.add('hidden');
            }
        });
    });
}

// Navbar scroll effect
let lastScroll = 0;
const navbar = document.querySelector('nav');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll > 100) {
        navbar.classList.add('shadow-xl');
    } else {
        navbar.classList.remove('shadow-xl');
    }
    
    lastScroll = currentScroll;
});

// Add animation on scroll for elements
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all cards and sections with animation class
document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.hover\\:shadow-2xl, .hover\\:shadow-xl');
    
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(el);
    });
});

// Set minimum date for move date picker
const moveDateInput = document.getElementById('moveDate');
if (moveDateInput) {
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    
    const minDate = tomorrow.toISOString().split('T')[0];
    moveDateInput.setAttribute('min', minDate);
}
