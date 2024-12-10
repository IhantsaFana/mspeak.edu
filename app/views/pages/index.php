<?php require APPROOT . '/views/inc/header.php'; ?>
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <div class="company-badge mb-4">
                            <i class="bi bi-check-circle me-2"></i>
                            Your Path to Fluent English Starts Here.
                        </div>

                        <h1 class="mb-4">
                            <span class="typed" data-typed-items="Master English, Speak English, With Confidence, Start your course">Master English</span>
                            <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
                            <br />
                            <span class="accent-text"><?php echo MSPEAK; ?></span>
                        </h1>

                        <p class="mb-4 mb-md-5">
                            Join thousands of learners who have transformed their lives by mastering English. Whether you are a beginner or looking to improve your skills, we have the right tools for you.
                        </p>

                        <div class="hero-buttons">
                            <a href="<?php echo URLROOT ?>/courses" class="btn btn-primary me-0 me-sm-2 mx-1">Start Course</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="<?php echo URLROOT ?>/assets/img/hero.svg" alt="Hero Image" class="img-fluid">

                        <div class="customers-badge">
                            <div class="customer-avatars">
                                <img src="<?php echo URLROOT ?>/assets/img/oeka.png" alt="Customer 1" class="avatar">
                                <img src="<?php echo URLROOT ?>/assets/img/avatar-2.webp" alt="Customer 2" class="avatar">
                                <img src="<?php echo URLROOT ?>/assets/img/avatar-3.webp" alt="Customer 3" class="avatar">
                                <img src="<?php echo URLROOT ?>/assets/img/avatar-4.webp" alt="Customer 4" class="avatar">
                                <img src="<?php echo URLROOT ?>/assets/img/avatar-5.webp" alt="Customer 5" class="avatar">
                                <span class="avatar more">12+</span>
                            </div>
                            <p class="mb-0 mt-2">Over 12,000 satisfied learners have already joined us!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="stat-content">
                            <h4>Top-rated Courses</h4>
                            <!-- <p class="mb-0">Award-winning English lessons, recognized globally.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="stat-content">
                            <h4>5,000+ Active Learners</h4>
                            <!-- <p class="mb-0">Join a growing community of English learners worldwide.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="stat-content">
                            <h4>95% Learner Progress</h4>
                            <!-- <p class="mb-0">Our students make real progress—fast!</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div class="stat-content">
                            <h4>24/7 Support</h4>
                            <!-- <p class="mb-0">Get help whenever you need it, with our round-the-clock support team.</p>-->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-center justify-content-between">

                <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <span class="about-meta">LEARN MORE ABOUT US</span>
                    <h2 class="about-title">Empowering You to Speak English Confidently</h2>
                    <p class="about-description">At M'Speak, we believe that mastering English opens doors to a world of opportunities. Whether you're a beginner or looking to refine your skills, our expert-designed courses are tailored to meet your unique learning needs. Our mission is to help you communicate with confidence, clarity, and ease.</p>

                    <div class="row feature-list-wrapper">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Interactive, engaging lessons for all levels
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Learn at your own pace with flexible schedules
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Personalized feedback to help you improve
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Expert instructors with years of experience
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Access to a global community of learners
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    24/7 support to assist you on your journey
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="info-wrapper">
                        <div class="row gy-4">
                            <div class="col-lg-5">
                                <div class="profile d-flex align-items-center gap-3">
                                    <img src="<?php echo URLROOT ?>/assets/img/oeka.png" alt="Founder Profile" class="profile-image">
                                    <div>
                                        <h4 class="profile-name">OEKA Mikofo</h4>
                                        <p class="profile-position">Founder &amp; Head Instructor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="contact-info d-flex align-items-center gap-2">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div>
                                        <p class="contact-label">Call us anytime</p>
                                        <p class="contact-number">+261 38 47 025 32</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                            <img src="<?php echo URLROOT ?>/assets/img/about-5.webp" alt="English Learning Class" class="img-fluid main-image rounded-4">
                            <img src="<?php echo URLROOT ?>/assets/img/about-2.webp" alt="English Language Workshop" class="img-fluid small-image rounded-4">
                        </div>
                        <div class="experience-badge floating">
                            <h3>10+
                                <span>Years</span>
                            </h3>
                            <p>of experience in English education</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- /About Section -->

    <!-- Services Section -->
    <section
        id="services" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Services</h2>
            <p>Discover a range of services designed to help you improve your English skills</p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-activity"></i>
                        </div>
                        <div>
                            <h3>Interactive Lessons</h3>
                            <p>Engage with interactive content that helps you learn English effectively, whether you're a beginner or an advanced learner.</p>
                            <a href="/" class="read-more">Read More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Card -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <div>
                            <h3>Grammar and Vocabulary</h3>
                            <p>Strengthen your English grammar and expand your vocabulary through comprehensive lessons and exercises.</p>
                            <a href="/" class="read-more">Read More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Card -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-easel"></i>
                        </div>
                        <div>
                            <h3>Speaking Practice</h3>
                            <p>Improve your spoken English with real-time practice and interactive speaking exercises that build your confidence.</p>
                            <a href="/" class="read-more">Read More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Card -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card d-flex">
                        <div class="icon flex-shrink-0">
                            <i class="bi bi-clipboard-data"></i>
                        </div>
                        <div>
                            <h3>Personalized Lessons</h3>
                            <p>Receive personalized lesson plans that cater to your unique learning style and goals, ensuring efficient progress.</p>
                            <a href="/" class="read-more">Read More
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Card -->

            </div>

        </div>

    </section>
    <!-- /Services Section -->

    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

        <div class="container">
            <div class="row">

                <div class="col-lg-5" data-aos="fade-up">
                    <h2 class="faq-title">Have a question? Check out the FAQ</h2>
                    <p class="faq-description">Learn more about how our platform can help you improve your English skills with our frequently asked questions.</p>
                    <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                        <svg class="faq-arrow" width="200" height="211" viewbox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
                        </svg>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>What is the best way to start learning English?</h3>
                            <div class="faq-content">
                                <p>The best way to start is by mastering basic vocabulary and grammar, and then practicing speaking and listening regularly.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>How can I improve my English speaking skills?</h3>
                            <div class="faq-content">
                                <p>Regular speaking practice with native speakers or using interactive platforms is key to improving your spoken English.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Do I need to be fluent in English to use your platform?</h3>
                            <div class="faq-content">
                                <p>No! Our platform is designed to help learners at every level, from beginners to advanced students.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>What resources are available on your platform?</h3>
                            <div class="faq-content">
                                <p>Our platform offers a wide range of resources, including interactive lessons, quizzes, grammar exercises, vocabulary builders, and pronunciation practice. You can also find real-life conversations, audio and video materials, and even a community forum to connect with other learners.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Is this platform suitable for all ages and learning styles?</h3>
                            <div class="faq-content">
                                <p>Absolutely! We cater to a diverse range of learners, including those with different learning styles and needs. Whether you're a visual learner, auditory learner, or kinesthetic learner, our platform has something for you. We also provide personalized learning paths to help you achieve your English learning goals, whatever they may be.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>What are the benefits of using your platform?</h3>
                            <div class="faq-content">
                                <p>test</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section
        id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>If you have any questions or need support, feel free to reach out. We're here to help!</p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Contact Info</h3>
                        <p>Learn English with confidence! We're here to help you on your language learning journey.</p>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="content">
                                <h4>Our Location</h4>
                                <p>Antananarivo 101</p>
                                <p>Madagascar</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <h4>Phone Number</h4>
                                <p>+261 38 47 025 32</p>
                                <p>+261 38 47 025 32</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Email Address</h4>
                                <p>contact@mspeak.com</p>
                                <p>ihantsarakotondranaivo@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h3>Get In Touch</h3>
                        <p>Let's talk about how we can help you achieve your English learning goals!</p>

                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit" class="btn">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- /Contact Section -->

</main>
<?php require APPROOT . '/views/inc/footer.php'; ?>