@vite('resources/css/client-styles/footer.css')
<?php
$footerLinks = [
    "about" => [
        "About G-Travels" => "/",
        "Work with us" => "/",
        "Brochures" => "/",
        "Difficulty Levels" => "/"
    ],
    "information" => [
        "Terms and Conditions" => "/",
        "Privacy Policy" => "/",
        "Blog" => "/",
        "FAQ" => "/faq",
        "Travel Guide" => "/",
        "Trip Documents" => "/",
        "Customer Support" => "/"
    ],
    "explore" => [
        "Popular Tours" => "/",
        "Destinations" => "/",
        "Trekking" => "/",
        "Pilgrimage" => "/",
        "Adventure" => "/",
        "Helicopter" => "/helicopter",
        "National Park & Wildlife" => "/",
        "Hiking" => "/hiking"
    ]
];
?>

<footer class="tnt-footer">
    <div class="tnt-footer-mountain">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 192" fill="none" height="152">
            <g clip-path="url(#clip0_2776_475)">
                <path
                    d="M0 174.579L126 138.248L237.622 26.8267L296.622 63.8267L316.413 107.573L1055.12 131.703L1648.52 101.618L1920 131.703V192.713H0V174.579Z"
                    fill="#005A62"></path>
                <path
                    d="M218.092 0.993652C163.065 0.993652 118.612 45.4953 118.612 100.474C118.612 113.786 121.351 126.521 126.109 138.199C133.702 133.057 141.391 128.299 149.753 124.31C160.807 119.12 171.235 112.392 181.279 105.424C181.472 105.087 181.952 104.655 182.529 104.222C184.115 103.261 185.508 102.444 187.142 101.867C190.074 99.897 192.861 97.9266 195.889 96.1004C200.839 93.1689 206.366 92.1596 211.508 89.949C216.506 87.7383 219.87 84.7587 222.946 81.6349C225.397 75.6277 229.53 71.0622 234.48 66.6409C242.121 59.9608 243.514 54.8186 252.453 57.9904C260.911 60.97 270.667 76.8772 278.068 82.4039C285.036 87.9305 281.048 93.9378 291.284 96.1004C301.232 98.3111 309.594 102.252 317.187 107.634C317.38 105.279 317.572 102.877 317.572 100.474C317.572 45.4953 273.118 0.993652 218.092 0.993652Z"
                    fill="#E4E7E8"></path>
                <path
                    d="M144.995 156.893C156.049 158.864 167.631 160.45 179.164 160.257C189.833 160.065 200.358 158.479 211.123 156.653C229.145 153.722 247.455 151.126 265.861 150.934C276.866 150.934 288.4 152.328 298.925 155.356C303.058 149.156 306.903 142.38 309.402 135.219C303.202 134.066 297.147 132.288 290.755 131.086C281.816 129.116 272.926 129.308 263.698 129.308C248.224 129.116 232.749 130.269 217.226 131.471C216.121 131.471 215.929 129.693 216.842 129.5C233.086 123.878 249.81 118.735 266.918 116.765C269.513 116.38 271.868 116.188 274.512 115.996C272.445 115.756 270.475 115.612 268.504 115.371C258.364 114.795 248.032 115.179 238.084 113.016C237.122 112.824 237.122 111.431 238.084 111.238C250.483 109.028 263.506 108.018 276.097 108.018C276.674 108.018 277.059 108.018 277.683 108.018C269.513 103.501 261.344 99.0796 252.837 95.9078C252.261 95.7156 252.453 94.9466 253.03 94.9466C257.98 95.3311 262.785 95.7156 267.447 96.5325C267.111 96.1 266.534 95.7156 266.149 95.3311C259.758 90.7656 253.03 87.2093 246.253 83.4608C245.869 83.2685 246.061 82.788 246.446 82.788C253.847 82.9802 260.142 84.7583 266.918 87.5938C264.564 85.2389 261.728 82.9802 259.95 81.6346C255 77.2613 250.675 69.3317 246.926 67.6978C246.926 67.6978 242.313 71.4463 235.777 76.0598C233.134 77.838 230.971 80.4331 228.808 82.788C228.424 85.9598 226.357 88.9874 223.81 91.1501C227.174 90.5734 230.587 90.1408 233.758 90.1408C234.72 90.1408 234.96 91.15 234.335 91.7267C228.424 95.9078 221.648 97.1092 214.92 99.0796C208.143 100.858 201.559 103.116 195.36 105.664C194.447 106.24 193.39 107.057 192.477 107.634C183.73 114.17 173.974 117.149 169.024 127.674C168.448 128.683 167.871 129.5 167.39 130.461C172.581 129.308 177.723 128.491 182.913 128.299C184.114 128.299 184.307 129.644 183.586 130.269C177.002 134.643 169.024 137.286 161.479 140.169C161.191 140.409 160.999 140.409 160.806 140.602C169.841 139.977 178.54 139.448 187.286 138.007C189.257 137.622 190.026 140.409 188.247 141.371C175.176 147.378 161.864 149.54 147.975 152.52C144.419 153.289 140.862 154.106 137.258 155.067C137.45 155.356 137.642 155.548 137.835 155.74C140.286 156.076 142.64 156.461 144.995 156.893Z"
                    fill="#E4E7E8"></path>
            </g>
        </svg>
    </div>
    <div class="tnt-footer-links-container py-4">
        <div class="tnt-container">
            <div class="row tnt-footer-links text-white gap-4 gap-md:8 flex-wrap flex-md-nowrap">

                <div class="position-relative col-sm-12 col-md-4 col-lg-4">
                    <div class="footer-logo-container">
                        <a href="/">
                            <img src="./assets/images/tnt-logo-footer.svg" alt="Trail Nepal Treks" class="img-fluid">
                        </a>
                        <p class="slogan">
                            Your gateway to Himalayas
                        </p>
                    </div>

                    <!-- Footer social media -->
                    <div class="mt-2 d-flex gap-3 lg-mt-4">
                        <a class="text-light transition" target="_blank" rel="noopener noreferrer"
                            href="https://facebook.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-facebook">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a class="text-light transition" target="_blank" rel="noopener noreferrer"
                            href="https://instagram.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-instagram">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                            </svg>
                        </a>
                        <a class="text-light transition" target="_blank" rel="noopener noreferrer"
                            href="https://twitter.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-twitter">
                                <path
                                    d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z">
                                </path>
                            </svg>
                        </a>
                        <a class="text-light transition" target="_blank" rel="noopener noreferrer"
                            href="https://youtube.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-youtube">
                                <path
                                    d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17">
                                </path>
                                <path d="m10 15 5-3-5-3z"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- Registered & Associated with -->
                    <div class="mt-5">
                        <h3 class="footer-register-text">Registered &amp; Associated with</h3>
                        <div class="mt-2 d-flex align-items-center gap-2">
                            <a href="https://www.nepal.gov.np/" target="_blank"
                                class="footer-register-link d-flex align-items-center justify-content-center rounded bg-white p-1">
                                <img src="./assets/images/gov_of_Nepal.svg"
                                    alt="Trail Nepal Treks - Government of Nepal">
                            </a>
                            <a href="https://ntb.gov.np/" target="_blank"
                                class="footer-register-link d-flex align-items-center justify-content-center rounded bg-white p-1">
                                <img src="./assets/images/ntb_logo.jpg" alt="Trail Nepal Treks - Nepal tourism board">
                            </a>
                            <a href="https://www.taan.org.np/" target="_blank"
                                class="footer-register-link d-flex align-items-center justify-content-center rounded bg-white p-1">
                                <img src="./assets/images/taan-logo.jpg"
                                    alt="Trail Nepal Treks - Trekking Agencies Association of Nepal">
                            </a>
                            <a href="https://www.nepalmountaineering.org/" target="_blank"
                                class="footer-register-link d-flex align-items-center justify-content-center rounded bg-white p-1">
                                <img src="./assets/images/NMA-Logo.png"
                                    alt="Trail Nepal Treks - Nepal Mountaineering Association">
                            </a>
                            <a href="https://www.himalayanrescue.org/" target="_blank"
                                class="footer-register-link d-flex align-items-center justify-content-center rounded bg-white p-1">
                                <img src="./assets/images/hra-logo.png"
                                    alt="Trail Nepal Treks - Himalayan Rescue Association Nepal">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="z-10 w-100 w-md-75">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php foreach ($footerLinks as $title => $links): ?>
                            <div class="col">
                                <h3 class="footer-link-header text-pink mb-2 fw-semibold text-capitalize">
                                    <?= htmlspecialchars($title) ?>
                                </h3>
                                <ul class="list-unstyled">
                                    <?php    foreach ($links as $text => $url): ?>
                                    <li class="mb-2">
                                        <a class="text-decoration-none transition footer-link"
                                            href="<?= htmlspecialchars($url) ?>">
                                            <?= htmlspecialchars($text) ?>
                                        </a>
                                    </li>
                                    <?php    endforeach; ?>
                                </ul>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tnt-footer-bottom tnt-container border-top py-3">
        <span id="footer-date" class="me-1">&copy; {{ date(format: 'Y') }}</span>Trail Nepal
        Treks. All rights reserved.
    </div>
</footer>