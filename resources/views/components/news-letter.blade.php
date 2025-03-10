@vite('resources/css/client-styles/newsletter.css')

<div class="newsletter-container">
    <div class="newsletter-content">
        <h5 class="newsletter-title">Sign up for our newsletter</h5>
        <p class="newsletter-description">
            Sign up for our newsletter to receive exclusive tips, tailored
            travel advice, and early access to special offers on unforgettable
            experiences!
        </p>
    </div>
    <div class="newsletter-form-container">
        <div>
            <!-- TODO: Update subscribe newletter action -->
            <form class="newsletter-form">
                <label class="newsletter-label">Sign up Today!</label>
                <div class="newsletter-input-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="newsletter-icon">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <input class="newsletter-input" placeholder="Email" type="email" required>
                    <button class="newsletter-button">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
        <p class="newsletter-privacy">
            <!-- TODO: Update privacy policy url  -->
            By subscribing you are accepting our
            <a href="/privacy" class="newsletter-privacy-link">privacy policy</a>
        </p>
    </div>
</div>