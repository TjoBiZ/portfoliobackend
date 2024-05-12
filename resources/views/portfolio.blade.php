<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Unique - Responsive vCard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Unique - Responsive vCard Template" />
    <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Unique, portfolio" />
    <meta name="author" content="lmtheme" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/transition-animations.css" type="text/css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
      <!-- Google tag (gtag.js) -->
      @if(config('app.url') === 'https://solarneutrino.com')
          <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_GA4_ANALYTICS_ID') }}"></script>
          <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', '{{ env('GOOGLE_GA4_ANALYTICS_ID') }}');

              var appUrl = "{{ config('app.url') }}";
          </script>
      @endif
      <script>
          var GoogleRecaptchaV3SiteKey = "{{ env('GOOGLE_RECAPTCHAR_V3_FRONTEND') }}";
      </script>
      <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHAR_V3_FRONTEND') }}"></script>
  </head>

  <body>
    <!-- Loading animation -->
    <div class="preloader">
      <div class="preloader-animation">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
    <!-- /Loading animation -->

    <div id="page" class="page">
      <!-- Header -->
      <header id="site_header" class="header mobile-menu-hide header-color-light">
        <div class="my-photo tilt-effect">
          <img src="images/main_photo.jpg" alt="Roman Primerov - Web Developer">
        </div>

        <div class="site-title-block">
          <h1 class="site-title">Roman Primerov</h1>
        </div>

        <!-- Navigation -->
        <div class="site-nav">
          <!-- Main menu -->
          <ul id="nav" class="site-main-menu">
            <li>
              <a class="pt-trigger" href="#home" data-animation="21"><i class="menu-icon pe-7s-icon pe-7s-home"></i>Home</a><!-- href value = data-id without # of .pt-page. -->
            </li>
            <li>
              <a class="pt-trigger" href="#about_me" data-animation="17"><i class="menu-icon pe-7s-icon pe-7s-user"></i>About me</a>
            </li>
            <li>
              <a class="pt-trigger" href="#resume" data-animation="18"><i class="menu-icon pe-7s-icon pe-7s-id"></i>Resume</a>
            </li>
            <li>
              <a class="pt-trigger" href="#portfolio" data-animation="19"><i class="menu-icon pe-7s-icon pe-7s-portfolio"></i>Portfolio</a>
            </li>
            <li>
              <a class="pt-trigger" href="#contact" data-animation="20"><i class="menu-icon pe-7s-icon pe-7s-mail"></i>Contact</a>
            </li>
          </ul>
          <!-- /Main menu -->
        </div>
        <!-- Navigation -->
      </header>
      <!-- /Header -->

      <!-- Mobile Header -->
      <div class="mobile-header mobile-visible">
        <div class="mobile-logo-container">
          <div class="mobile-site-title">Roman Primerov</div>
        </div>

        <a class="menu-toggle mobile-visible">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <!-- /Mobile Header -->

      <!-- Arrows Nav -->
      <div class="lmpixels-arrows-nav">
        <div class="lmpixels-arrow-left"><i class="pe-7s-icon pe-7s-angle-left"></i></div>
        <div class="lmpixels-arrow-right"><i class="pe-7s-icon pe-7s-angle-right"></i></div>
      </div>
      <!-- /Arrows Nav -->

      <!-- Main Content -->
      <div id="main" class="site-main">
        <!-- Page changer wrapper -->
        <div class="pt-wrapper" style="background-image:
        url(images/Background_FullStack_Web_Developer_Laravel_PHP_JavaScript_AWS_MySQL_Roman_Primerov.svg);">
          <!-- Subpages -->
          <div class="subpages">

            <!-- Home Subpage -->
            <section class="pt-page pt-page-1 section-without-bg section-paddings-0 table" data-id="home">
              <div class="section-inner">
                <div class="home-page-block">
                  <h2>Roman Primerov</h2>
                  <div class="owl-carousel text-rotation">
                    <div class="item">
                      <p class="home-page-description">Full Stack Web Developer</p>
                    </div>
                    <div class="item">
                      <p class="home-page-description">SEO Optimized Code</p>
                    </div>
                    <div class="item">
                      <p class="home-page-description">UX/UI eCommerce Designer</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- End of Home Subpage -->

            <!-- About Me Subpage -->
            <section class="pt-page pt-page-2" data-id="about_me">
              <div class="border-block-top-110"></div>
              <div class="section-inner">
                <div class="section-title-block">
                  <div class="section-title-wrapper clearfix">
                    <h2 class="section-title">About Me</h2>
                    <h5 class="section-description">Software Engineer, Thinker, Creative Doer</h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-4 subpage-block">
                    <div class="">
                      <img src="images/main_photo.jpg" alt="Fullstack Web Developer">
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-6 col-lg-4">
                    <h3>I am Full Stack Web Developer</h3>
                    <p>Specializing in the Back-End of LAMP architecture and eCommerce SEO-optimized code for the Front-End, I enjoy using the PHP Laravel framework for OOP development and hosting on AWS. For the Front-End, JavaScript and CSS with the most popular frameworks are my tools of choice.</p>
                    <p>Fully committed to using MacOS for my development setup, it stands as my main environment where virtualization is utilized to manage a range of Linux-based systems. This setup proves ideal for the JetBrains IDEs I depend on, whether coding in PHP with PhpStorm or handling JavaScript in WebStorm. My Mac and JetBrains combo ensures everything runs smoothly and efficiently.</p>
                    <p>Whenever there was something new to learn, I was quick to pick it up and apply it with a professional touch.</p>

                  </div>

                  <div class="col-sm-6 col-md-6 col-lg-4 subpage-block">
                    <ul class="info-list">
                      <li><span class="title">Residence:</span><span class="value">United States</span></li>
                      <li><span class="title">Address:</span><span class="value">5520 Generals Place, North
                        Highlands, CA</span></li>
                      <li><span class="title">e-mail:</span><span class="value"><a href="mailto:j@solarneutrino.com">j@solarneutrino.com</a></span></li>
                      <li><span class="title">Phone:</span><span class="value">+1 916 595 9841</span></li>
                      <li><span class="title">Employment Type Options:</span><span class="value">W-2, 1099, and C2C</span></li>
                      <li><span class="title">Work Location Preferences:</span><span class="value available">On-Site,
                        Hybrid, Remote</span></li>
                    </ul>

                    <ul class="social-links">
                      <li><a class="tip social-button" href="https://www.linkedin.com/in/tjobiz/" target="_blank" rel="noreferrer"
                             title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                      <!-- Full list of social icons: http://fontawesome.io/icons/#brand -->
                      <li><a class="tip social-button" href="https://github.com/TjoBiZ" target="_blank" title="GitHub"><i
                              class="fa fa-github"></i></a></li>
                      <li><a class="tip social-button" href="https://codepen.io/kodzero/pens/" target="_blank" title="CodePen"><i
                              class="fa fa-codepen"></i></a></li>
                      <li><a class="tip social-button" href="https://t-jo.com" target="_blank"
                             title="My Tech WordPress Blog"><i class="fa fa-wordpress"></i></a></li>
                      <li><a class="tip social-button" href="https://t.me/k0dzer0" target="_blank" title="Telegram"><i
                              class="fa fa-telegram"></i></a></li>
                      <li><a class="tip social-button" href="https://www.youtube.com/@TjoBiz/videos"
                             target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                      <!--<li><a class="tip social-button" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>-->
                      <!--<li><a class="tip social-button" href="#" title="last.fm"><i class="fa fa-lastfm"></i></a></li>-->
                      <!--<li><a class="tip social-button" href="#" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>-->
                    </ul>
                  </div>
                </div>

                <!-- Services block -->
                <div class="block-title">
                  <h3>Services</h3>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-md-3 subpage-block">
                    <div class="service-block">
                      <div class="service-info">
                        <i class="service-icon pe-7s-icon pe-7s-browser"></i>
                        <h4>Web Manager</h4>
                        <p>There have been times when I was the sole team member, tackling everything from designing
                          vector logos in CorelDRAW and creating graphics in Photoshop, to SEO, video editing.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-3 subpage-block">
                    <div class="service-block">
                      <div class="service-info">
                        <i class="service-icon pe-7s-icon pe-7s-refresh-cloud"></i>
                        <h4>Cloud Developer</h4>
                        <p>I can configure OS like Windows, Mac OS, Linux, and integrate these platforms with cloud services like AWS, GCP, etc.</p>
                        <p>This will speed up your website and projects, boosting search engine rankings and increasing traffic.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-3 subpage-block">
                    <div class="service-block">
                      <div class="service-info">
                        <i class="service-icon pe-7s-icon pe-7s-cart"></i>
                        <h4>E-Commerce</h4>
                        <p>I'm a top-tier seller and developer of software solutions, like modules or plugins, for renowned eCommerce platforms, with thousands of customers. My modules handle tasks such as uploading products to Facebook, Google Merchant Center, and more, all of which I develop from scratch.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-3 subpage-block">
                    <div class="service-block">
                      <div class="service-info">
                        <i class="service-icon pe-7s-icon pe-7s-graph1"></i>
                        <h4>Marketing</h4>
                        <p>I've kicked off startups from the ground up and assembled teams for new ventures. As a team
                          leader, I've managed tasks and brought on freelancers to speed up processes and address specialized challenges when necessary.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Services block -->

                <!-- Clients block -->
                <div class="block-title">
                  <h3>Clients</h3>
                </div>

                <div class="row">
                  <div class="col-sm-4 col-md-2 subpage-block">
                    <div class="client-block">
                      <a href="https://heart-in-diamond.com" target="_blank"><img src="images/clients/heart-in-diamond-logo.svg" alt="image"></a>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-2 subpage-block">
                    <div class="client-block">
                      <a href="https://landing-page-property.t-jo.com" target="_blank"><img src="images/clients/AndamanRiviera-logo.svg" alt="image"></a>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-2 subpage-block">
                    <div class="client-block">
                      <a href="https://en.wikipedia.org/wiki/Skolkovo_Innovation_Center" rel="noreferrer" target="_blank"><img
                              src="images/clients/sk-logo-en.svg" alt="image"></a>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-2 subpage-block">
                    <div class="client-block">
                      <a href="https://fvsport.com"
                         target="_blank"><img src="images/clients/FVSport-logo.svg" rel="noreferrer" alt="image"></a>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-2 subpage-block">
                    <div class="client-block">
                      <a href="https://cuff.ru"
                         target="_blank"><img src="images/clients/cuff.ru-logo.svg" rel="noreferrer" alt="image"></a>
                    </div>
                  </div>

                  <div class="col-sm-4 col-md-2 subpage-block">
                    <div class="client-block">
                      <a href="https://www.webasyst.com" target="_blank"><img src="images/clients/Webasyst-logo.svg" alt="image"></a>
                    </div>
                  </div>
                </div>
                <!-- End of Clients block -->

                <div class="row">
                  <div class="col-sm-12 col-md-12 subpage-block">
                    <div class="block-title">
                      <h3>Testimonials</h3>
                    </div>
                    <div class="testimonials owl-carousel">
                      <!-- Testimonial 1 -->
                      <div class="testimonial-item">
                        <!-- Testimonial Content -->
                        <div class="testimonial-content">
                          <div class="testimonial-text">
                            <p>"He approaches every project as if it were his own, always putting in diligent and responsible effort."</p>
                          </div>
                        </div>
                        <!-- /Testimonial Content -->
                        <!-- Testimonial Author -->
                        <div class="testimonial-credits">
                          <!-- Picture -->
                          <div class="testimonial-picture">
                            <img src="images/testimonials/testimonial_photo_1.jpg" alt="">
                          </div>
                          <!-- /Picture -->
                          <!-- Testimonial author information -->
                          <div class="testimonial-author-info">
                            <p class="testimonial-author">Elena Prokofeva</p>
                            <p class="testimonial-firm">Co-Founder at EarCuffs</p>
                          </div>
                        </div>
                        <div class="parent_button">
                          <a class="button" target="_blank" href="references/CUFF.RU_fullstack_developer_system_administrator_SEO.jpg">Download Reference</a>
                        </div>
                        <!-- /Testimonial author information -->
                      </div>
                      <!-- End of Testimonial 1 -->

                      <!-- Testimonial 2 -->
                      <div class="testimonial-item">
                        <!-- Testimonial Content -->
                        <div class="testimonial-content">
                          <div class="testimonial-text">
                            <p>"He has received significant exposure during our project in three of its main areas, which he managed: web full stack development, technical support, and search engine optimization."</p>
                          </div>
                        </div>
                        <!-- /Testimonial Content -->
                        <!-- Testimonial Author -->
                        <div class="testimonial-credits">
                          <!-- Picture -->
                          <div class="testimonial-picture">
                            <img src="images/testimonials/testimonial_photo_2.jpg" alt="">
                          </div>
                          <!-- /Picture -->
                          <!-- Testimonial author information -->
                          <div class="testimonial-author-info">
                            <p class="testimonial-author">Elena Yurievna</p>
                            <p class="testimonial-firm">FVSport</p>
                          </div>
                        </div>
                        <div class="parent_button">
                          <a class="button" target="_blank" href="references/FVSPORT_eCommrec_Store_Moscow_Russia.jpeg">Download Reference</a>
                        </div>
                        <!-- /Testimonial author information -->
                      </div>
                      <!-- End of Testimonial 2 -->

                      <!-- Testimonial 3 -->
                      <div class="testimonial-item">
                        <!-- Testimonial Content -->
                        <div class="testimonial-content">
                          <div class="testimonial-text">
                            <p>"He consistently demonstrated professionalism, problem-solving abilities, and a proactive attitude."</p>
                          </div>
                        </div>
                        <!-- /Testimonial Content -->
                        <!-- Testimonial Author -->
                        <div class="testimonial-credits">
                          <!-- Picture -->
                          <div class="testimonial-picture">
                            <img src="images/testimonials/testimonial_photo_3.jpg" alt="">
                          </div>
                          <!-- /Picture -->
                          <!-- Testimonial author information -->
                          <div class="testimonial-author-info">
                            <p class="testimonial-author">Sergei Cvetkov</p>
                            <p class="testimonial-firm">NAD SERVICES LLC</p>
                          </div>
                        </div>
                        <div class="parent_button">
                          <a class="button" target="_blank" href="references/Roman_Primerov_Laravel_and_AWS.pdf">Download Reference</a>
                        </div>
                        <!-- /Testimonial author information -->
                      </div>
                      <!-- End of Testimonial 3 -->
                    </div>
                  </div>
                </div>

                <!-- Fun facts block -->
                <div class="block-title">
                  <h3>Fun Facts</h3>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-md-3 subpage-block">
                    <div class="fun-fact-block gray-bg tilt-effect">
                      <i class="pe-7s-icon pe-7s-smile"></i>
                      <h4>Happy Clients</h4>
                      <span class="fun-value">> 2,000</span>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-3 subpage-block tilt-effect">
                    <div class="fun-fact-block">
                      <i class="pe-7s-icon pe-7s-alarm"></i>
                      <h4>Working Hours</h4>
                      <span class="fun-value">> 15,000</span>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-3 subpage-block tilt-effect">
                    <div class="fun-fact-block gray-bg">
                      <i class="pe-7s-icon pe-7s-medal"></i>
                      <h4>Projects Completed</h4>
                      <span class="fun-value">21</span>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-3 subpage-block tilt-effect">
                    <div class="fun-fact-block">
                      <i class="pe-7s-icon pe-7s-coffee"></i>
                      <h4>Coffee Consumed</h4>
                      <span class="fun-value">20,000</span>
                    </div>
                  </div>
                </div>
                <!-- End of Fun fucts block -->
              </div>
            </section>
            <!-- End of About Me Subpage -->

            <!-- Resume Subpage -->
            <section class="pt-page pt-page-3" data-id="resume">
              <div class="border-block-top-110"></div>
              <div class="section-inner">
                <div class="section-title-block">
                  <div class="section-title-wrapper">
                    <h2 class="section-title">Resume</h2>
                    <h5 class="section-description">15 years in IT, systems to software</h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-md-4 subpage-block">
                    <div class="block-title">
                      <h3>Experience</h3>
                    </div>
                    <div class="timeline">
                      <!-- Single event -->
                      <div class="timeline-event te-primary">
                        <h5 class="event-date">Jan 2019 - Jan 2022</h5>
                        <h4 class="event-name">Full Stack Developer</h4>
                        <span class="event-description">NAD SERVICES LLC 🇺🇸 🇬🇧 🇦🇺 🇳🇿 🇨🇦 🇯🇵</span>
                        <p>Developed an eCommerce jewelry store platform using Laravel - PHP Framework.</p>
                      </div>
                      <!-- Single event -->
                      <div class="timeline-event te-primary">
                        <h5 class="event-date">Oct 2016 - Dec 2019</h5>
                        <h4 class="event-name">Full Stack Web Developer - eСommerce frameworks</h4>
                        <span class="event-description">FVSPORT 🇷🇺</span>
                        <p>Web developer proficient an eCommerce frameworks in HTML/CSS/SCSS/JavaScript/PHP.</p>
                      </div>
                      <!-- Single event -->
                      <div class="timeline-event te-primary">
                        <h5 class="event-date">Nov 2012 - Oct 2016</h5>
                        <h4 class="event-name"> Web Developer and System Administrator specializing in eCommerce and SEO</h4>
                        <span class="event-description">EarCuff 🇷🇺</span>
                        <p> I specialize in an online jewelry store on WooCommerce for WordPress.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 subpage-block">
<!--                    <div class="block-title">-->
<!--                      <h3>Experience</h3>-->
<!--                    </div>-->
                    <br>
                    <br>
                    <div class="timeline">
                      <!-- Single event -->
                      <div class="timeline-event te-primary">
                        <h5 class="event-date">Oct 2009 - Nov 2012</h5>
                        <h4 class="event-name">Network Administrator</h4>
                        <span class="event-description">NWLink ISP 🇷🇺</span>
                        <p>Technical Support Specialist ISP: Skilled Network Admin with extensive UNIX/Linux and
                          TCP/IP experience.</p>
                      </div>
                      <!-- Single event -->
                      <div class="timeline-event te-primary">
                        <h5 class="event-date">Jul 2007 - Sep 2009</h5>
                        <h4 class="event-name">System Administrator</h4>
                        <span class="event-description">7-ya 🇷🇺</span>
                        <p>A chain of neighborhood convenience stores similar to 7-Eleven with establishments and corporate offices in diverse cities.</p>
                      </div>
                      <!-- Single event -->
                      <div class="timeline-event te-primary">
                        <h5 class="event-date">Jan 2005 - Aug 2007</h5>
                        <h4 class="event-name">System Network Administrator</h4>
                        <span class="event-description">InterZet 🇷🇺</span>
                        <p>Preeminent Internet Service Provider in a 5-Million-Population Urban Hub.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 subpage-block">
                    <div class="block-title">
                      <h3>Full Stack Software Development</h3>
                    </div>
                    <div class="skills-info">
                      <h4>PHP/JavaSript/MySQL/Linux/AWS</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-1"></div>
                      </div>

                      <h4>UX/UI eCommerce Design</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-2"></div>
                      </div>

                      <h4>SEO-optimized code</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-3"></div>
                      </div>
                    </div>

                    <div class="block-title">
                      <h3>Coding Skills</h3>
                    </div>
                    <div class="skills-info">
                      <h4>PHP</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-4"></div>
                      </div>

                      <h4>JavaScript</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-5"></div>
                      </div>

                      <h4>MySQL</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-6"></div>
                      </div>

                      <h4>Python/Perl/SWIFT/Golang</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-7"></div>
                      </div>

                      <h4>HTML/CSS/SASS/Bootstrap/Materialize</h4>
                      <div class="skill-container">
                        <div class="skill-percentage skill-8"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <div class="download-cv-block">
                      <a id="enterprise-resume" class="button resumedevbutton" target="_blank"
                         href="https://cv.solarneutrino.com"
                         alt="A resume targeted at large corporations and companies like FAANG"
                         title="A resume targeted at large corporations and companies like FAANG">Download Resume for
                        Large Enterprises <i class="fa fa-id-card-o fa-2x" aria-hidden="true"></i></a>
                      <a class="button resumedevbutton fa-2x" target="_blank" href="http://resume.solarneutrino.com"
                         alt="A resume aimed at small to medium-sized businesses and startups. SMBs - (Small and Medium Businesses) " title="A resume aimed at small to medium-sized businesses and startups. SMBs - (Small and Medium Businesses)"><span>Download Resume for SMBs</span> <i class="fa fa-cogs fa-2x" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- End Resume Subpage -->


            <!-- Portfolio Subpage -->
            <section class="pt-page pt-page-4" data-id="portfolio">
              <div class="border-block-top-110"></div>
              <div class="section-inner">
                <div class="section-title-block">
                  <div class="section-title-wrapper">
                    <h2 class="section-title">Portfolio</h2>
                    <h5 class="section-description">Projects I've Participated in or Created</h5>
                  </div>
                </div>

                <!-- Portfolio Content -->
                <div class="portfolio-content">

                  <!-- Portfolio filter -->
                  <ul id="portfolio_filters" class="portfolio-filters">
                    <li class="active">
                      <a class="filter btn btn-sm btn-link active" data-group="all">All</a>
                    </li>
                    <li>
                      <a class="filter btn btn-sm btn-link" data-group="laravel">Laravel</a>
                    </li>
                    <li>
                      <a class="filter btn btn-sm btn-link" data-group="seocode">SEO optimized code</a>
                    </li>
                    <li>
                      <a class="filter btn btn-sm btn-link" data-group="uxui">UX/UI design</a>
                    </li>
                    <li>
                      <a class="filter btn btn-sm btn-link" data-group="aws">AWS</a>
                    </li>
                    <li>
                      <a class="filter btn btn-sm btn-link" data-group="plugin">eCommerce plugins</a>
                    </li>
                    <li>
                      <a class="filter btn btn-sm btn-link" data-group="video">Video</a>
                    </li>
                  </ul>
                  <!-- End of Portfolio filter -->

                  <!-- Portfolio Grid -->
                  <div id="portfolio_grid" class="portfolio-grid portfolio-masonry masonry-grid-3">

                    <!-- Portfolio Item 1 -->
                    <figure class="item" data-groups='["all", "laravel", "seocode", "uxui", "aws"]'>
                      <a href="images/portfolio/full/1.jpg" class="lightbox"
                         title="✓ Developed an eCommerce jewelry store platform using Laravel - PHP Framework, integrating original business processes and UX/UI design to achieve specified goals.
✓ Developed the eCommerce store on multiple EC2 - Ubuntu servers, Apache, RDS (MySQL), incorporating multi-domain functionality (e.g., site.com, site.co.uk, site.com.au, site.co.nz, etc.) within a single Laravel core in one project. All traffic was routed through a Load Balancer, while static content, images, and scripts (*.js, *.css) were stored on S3 Buckets accessed via CloudFront (CDN) within the AWS service environment.
✓ AWS hosting: I configured CodeCommit for GIT branches, managed backups, employed AWS CLI, implemented IAM Roles, created AMIs, handled routing, managed logs, deployed Python Lambdas, worked with SQS, managed Route 53, enabled HTTPS(SSL), engaged with RDS, EFS, and other services.
✓ Collaborated with IT teams and globally dispersed business functions.
✓ Monitored and improved the quality of web components.
✓ Participated in a development team to ensure successful and timely technical implementations and process adherence related to analysis, designs, development, rollout, and support of global eCommerce applications and systems.
✓ Ensured adherence to eCommerce website quality control, change management, and compliance.
✓ Designed and developed related applications, such as dashboard reports, console applications, etc.
✓ The software stack: HTML/CSS/JavaScript/Vue/PHP/Linux.">
                        <img src="images/portfolio/1.jpg" alt="">
                        <div>
                          <h5 class="name">Laravel, eCommerece UX/UI, SEO optimized code 🇺🇸 🇬🇧 🇦🇺 🇳🇿 🇨🇦 🇯🇵</h5>
                          <p>Developed a multi-domain online store using a single Laravel core, hosted on multiple EC2 AWS servers and a CDN. Utilized cloud technologies for maximum reliability, including CDN - CloudFront, RDS, S3, and ELB. Crafted SEO-optimized code and UX/UI to enhance conversion rates.</p>
                          <small class="several_links">
                            <span class="button_link_project" data-link="heart-in-diamond.com">Visit
                              1 Site</span>
                            <span class="button_link_project" data-link="heart-in-diamond.co.uk">Visit
                              2 Site</span>
                            <span class="button_link_project" data-link="heart-in-diamond.com.au">Visit
                              3 Site</span>
                            <span class="button_link_project" data-link="heart-in-diamond.co.nz">Visit
                              4 Site</span>
                          </small>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 1 -->

                    <!-- Portfolio Item 2 -->
                    <figure class="item" data-groups='["all", "laravel", "seocode", "uxui", "aws"]'>
                      <a href="images/portfolio/full/2.jpg" class="lightbox"
                         title="I am currently developing a custom website theme focusing on achieving high scores in Google Page Speed. The theme would use the Laravel framework based on October CMS, offering eCommerce capabilities.
✓ Given my strong interest in attaining high search engine rankings for future projects using this theme, you can expect optimal scores on Google Page Speed or Lighthouse tests. I can deliver websites that achieve these scores within the green zone, regardless of location. The theme features a modern Materialize design style with Bootstrap markup and is powered by Laravel and Amazon servers on the backend. There is comprehensive documentation available for ongoing team support. I have also created vector graphics with effects, optimization, and UX/UI design elements.
✓ Please note that this theme is not available for sale.">
                        <img src="images/portfolio/2.jpg" alt="">
                        <div class="laravel-google-speed">
                          <h5 class="name">Laravel, SEO optimized code, UX/UI 🇺🇸</h5>
                          <p> Intense competition in the real estate and jewelry sectors, combined with years of
                            experience and AI, have honed my skills in writing SEO-optimized code. Websites in these industries can reach a completely different level of potential for growth in organic search engine rankings within their thematic niches and over time may not require additional paid advertising due to top-ranking positions. Developed using OctoberCMS - Laravel, this allows for the rapid implementation of eCommerce business objectives.</p>
                          <small class="several_links">
                            <span class="button_link_project" data-link="alrty.com">Visit Site</span>
                            <span class="button_link_project"
                                  data-link="pagespeed.web.dev/analysis/https-alrty-com/eztnrt5d2x?form_factor=mobile">Check <strong>YOUR</strong> Site with Google PageSpeed</span>
                          </small>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 2 -->

                    <!-- Portfolio Item 3 -->
                    <figure class="item" data-groups='["all", "seocode", "aws", "uxui", "aws"]'>
                      <a href="images/portfolio/full/3.jpg" class="lightbox"
                         title="FEATURES:
⧁ STUNNING MATERIAL DESIGN: A visually appealing interface that enhances user engagement.
⧁ COMPREHENSIVE USER ANALYTICS: Tracks IP, language, geographic location, first visit, visit count, and more.
⧁ WEBVISOR TECHNOLOGY: Records mouse movements and keystrokes, providing a video playback of user interactions.
⧁ MULTI-CHANNEL COMMUNICATION FORMS: Messages from forms are sent via email, SMS, and directly to a private mobile app channel for staff via Telegram, complete with sound notifications.
⧁ REFINED UX/UI DESIGN: Features a mindfully designed slider that enhances user experience.
⧁ OPTIMIZED PERFORMANCE: Scripts and pages are optimized using Webpack to ensure fast loading times.
⧁ SEO-FRIENDLY: No backend SQL queries, which enhances SEO performance as the site relies solely on frontend technology, ensuring smooth indexing by search engines like Google and Yahoo.
⧁ MODERN VIDEO INTEGRATION: Incorporates advanced video technologies for a rich user experience.
⧁ MULTILINGUAL SUPPORT: Offers content in multiple languages to cater to a global audience.
⧁ DYNAMIC PRICING DISPLAY: Utilizes online currency conversion to display prices in the viewer's local currency.
⧁ ROBUST HOSTING ON LINUX VDS: Running on CentOS with ISPManager (alternatively, cPanel configuration available).
⧁ CDN INTEGRATION: Currently enhancing content delivery to ensure the website loads quickly worldwide in the future.
⧁ LANGUAGE LOCALIZATION UPDATE: Planned translation improvements to enhance accessibility for a global audience.
UPCOMING FEATURES:
⧁ Messages submitted through the website form can now be received directly on personal mobile devices by staff members via a secure Telegram channel, ensuring immediate and private communication.
This project highlights my capabilities in video editing, website design, user data analytics, and secure, real-time communication integration, reflecting my commitment to creating comprehensive, user-friendly, and secure web solutions.">
                        <img src="images/portfolio/3.jpg" alt="">
                        <div>
                          <h5 class="name">Multilingual site, SEO optimization, and Telegram bot 🇹🇭 🇺🇸 🇷🇺 🇨🇳</h5>
                          <p>A sleek landing page using MaterializeCSS for style, pure JavaScript for functionality, and Webpack for optimization. Features include multilingual support, real-time form messaging via Telegram, and advanced user analytics.</p>
                          <small><span class="button_link_project"
                                                    data-link="landing-page-property.t-jo.com">Visit Site</span></small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 3 -->

                    <!-- Portfolio Item 4 -->
                    <figure class="item" data-groups='["all", "laravel", "aws"]'>
                      <a href="images/portfolio/full/4.jpg" class="lightbox"
                         title="In my recent project, I was responsible for optimizing performance by alleviating the load on the central core of the application. To address this, I innovated by extracting specific logical tasks and encapsulating them into microservices. These microservices, each running on its own server, communicate through a RESTful API to ensure seamless functionality and integration. A notable instance of my work is a Laravel-developed RESTful API that precisely identifies a user's IP address and provides detailed geolocation data including postal code, country, latitude, and longitude.">
                        <img src="images/portfolio/4.jpg" alt="">
                        <div>
                          <h5 class="name">Laravel RESTful API for Geo-Location and IP Address 🇺🇸</h5>
                          <p>I was tasked with reducing the load on a project's central core. To achieve this, certain logic operations were segregated into microservices and deployed on separate servers. These microservices interact via a RESTful API to maintain full functionality. An example of one such RESTful API, developed by me using Laravel, identifies the user's IP address and provides their location, postal code, country, latitude, and longitude.</p>
                          <small><span class="button_link_project"
                                       data-link="ip.t-jo.com/api/geoip">Visit Site</span></small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 4 -->

                    <!-- Portfolio Item 5 -->
                    <figure class="item" data-groups='["all", "seocode", "uxui", "aws"]'>
                      <a a href="images/portfolio/full/5.jpg" class="lightbox"
                         title="2015 PORTFOLIO OVERVIEW: This landing page from my portfolio, created in 2015, highlights my expertise in SEO-optimized coding, UX/UI design, and web development. Initially crafted for the Russian market in Saint Petersburg, this portfolio has been fully translated to cater to a global audience. It showcases a range of projects, many of which no longer exist, demonstrating my ability to deliver non-standard solutions with significant results.

KEY FEATURES AND SERVICES:
⧁  SEO OPTIMIZATION: Enhanced website visibility in search engines.
⧁  E-COMMERCE SOLUTIONS: Rapid deployment of online stores, ready in just 14 days.
⧁  VIDEO PRODUCTION: Creation of promotional videos for businesses.
⧁  COMPREHENSIVE IT AND NETWORK MANAGEMENT: From server setup and maintenance to networking and fiscal equipment integration.
⧁  GLOBAL TELECOMMUNICATIONS: Set up IP telephony and cloud PBX systems worldwide.
⧁  TURNKEY WEBSITE SOLUTIONS: Custom websites designed from scratch to meet specific client goals.

This portfolio showcases my technical skills and commitment to providing tailored solutions and comprehensive support, ensuring each project’s success from inception to delivery.">
                        <img src="images/portfolio/5.jpg" alt="">
                        <div>
                          <h5 class="name">Landing page, SEO optimized code, UX/UI design 🇷🇺</h5>
                          <p>This is my personal old portfolio, created back in 2015. It showcases my projects from that time and the skills I have mastered. Many of these projects no longer exist. The portfolio was initially crafted in Russian in Saint Petersburg, Russia, a city with a population of five million. For convenience, I have translated it entirely from its original Russian version. Technologies used include HTML, SASS, jQuery, and Gulp.</p>
                          <small><span class="button_link_project" data-link="web.t-jo.com">Visit Site</span></small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 5 -->

                    <!-- Portfolio Item 6 -->
                    <figure class="item" data-groups='["all", "laravel", "seocode", "uxui", "aws"]'>
                      <a href="images/portfolio/full/6.jpg" class="lightbox"
                         title="⧁ As a seasoned Full-Stack Web Developer based in California, I am proud to present my online portfolio, which showcases my extensive skills and project accomplishments using the robust Laravel framework. My portfolio reflects my expertise in developing SEO-optimized code and sophisticated UX/UI designs, especially for eCommerce platforms.

⧁ This portfolio underscores my proficiency in both front-end and back-end development. I excel in using technologies such as PHP, JavaScript, CSS, and various frameworks to deliver seamless web applications. It details my professional experience and includes a showcase of diverse projects ranging from eCommerce systems to cloud solutions, demonstrating my capability to handle complex development environments effectively.

⧁ My work emphasizes my commitment to clean, efficient code and my ability to optimize web applications for maximum performance and scalability. The site provides insights into my creative process, technical skills, and the successful outcomes of my web solutions. It also includes testimonials from clients and colleagues, reinforcing my reputation as a reliable and skilled developer.

⧁ Visitors to my portfolio can explore various sections that detail my services, experience, client projects, and personal insights about the technology industry. Each section is designed to convey the breadth of my capabilities, from managing cloud infrastructures to developing custom web applications that meet specific business needs.

⧁ This portfolio serves as a professional showcase and a resource for potential clients and employers to understand my approach to solving technological challenges in the digital world. Whether you're interested in web development, cloud solutions, or custom software, my portfolio offers a detailed and insightful look into my career and achievements.">
                        <img src="images/portfolio/6.jpg" alt="">
                        <div>
                          <h5 class="name">My new portfolio on the Laravel framework 🇺🇸</h5>
                          <p>I often receive the same questions from recruiters at first contact, so I decided to
                            create this portfolio site using my favorite framework, Laravel. It showcases my work and experience, highlighting key points succinctly.</p>
                          <small>You are on this site now.</small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 6 -->

                    <!-- Portfolio Item 7 -->
                    <figure class="item" data-groups='["all", "seocode", "aws", "uxui", "aws"]'>
                      <a href="images/portfolio/full/7.jpg" class="lightbox"
                         title="FEATURES:
⧁ STUNNING MATERIAL DESIGN: A visually appealing interface that enhances user engagement.
⧁ COMPREHENSIVE USER ANALYTICS: Tracks IP, language, geographic location, first visit, visit count, and more.
⧁ WEBVISOR TECHNOLOGY: Records mouse movements and keystrokes, providing a video playback of user interactions.
⧁ MULTI-CHANNEL COMMUNICATION FORMS: Messages from forms are sent via email, SMS, and directly to a private mobile app channel for staff via Telegram, complete with sound notifications.
⧁ REFINED UX/UI DESIGN: Features a mindfully designed slider that enhances user experience.
⧁ OPTIMIZED PERFORMANCE: Scripts and pages are optimized using Webpack to ensure fast loading times.
⧁ SEO-FRIENDLY: No backend SQL queries, which enhances SEO performance as the site relies solely on frontend technology, ensuring smooth indexing by search engines like Google and Yahoo.
⧁ MODERN VIDEO INTEGRATION: Incorporates advanced video technologies for a rich user experience.
⧁ ROBUST HOSTING ON LINUX VDS: Running on CentOS with ISPManager (alternatively, cPanel configuration available).
⧁ CDN INTEGRATION: Currently enhancing content delivery to ensure the website loads quickly worldwide in the future.
⧁ LANGUAGE LOCALIZATION UPDATE: Planned translation improvements to enhance accessibility for a global audience.
UPCOMING FEATURES:
⧁ Messages submitted through the website form can now be received directly on personal mobile devices by staff members via a secure Telegram channel, ensuring immediate and private communication.
This project highlights my capabilities in video editing, website design, user data analytics, and secure, real-time communication integration, reflecting my commitment to creating comprehensive, user-friendly, and secure web solutions.">
                        <img src="images/portfolio/7.jpg" alt="">
                        <div>
                          <h5 class="name">Landing Page for Property Management Company, SEO optimization, and Telegram bot 🇹🇭 🇺🇸</h5>
                          <p>A sleek landing page using MaterializeCSS for style, pure JavaScript for functionality, and Webpack for optimization. Features include real-time form messaging via Telegram, and advanced user analytics.</p>
                          <small><span class="button_link_project"
                                       data-link="apartments.t-jo.com">Visit Site</span></small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 7 -->

                    <!-- Portfolio Item 8 -->
                    <figure class="item" data-groups='["all",  "plugin", "uxui"]'>
                      <a href="images/portfolio/full/8.jpg" class="lightbox"
                         title="This plugin facilitates the export and publication of products to Google Merchant Center feeds. It is ideal for standard retail and complex catalog systems integrated with systems like 1C or My Warehouse. It generates a link to the exported file, which users can download at their discretion.
KEY FEATURES:
• Automatic product type tagging for enhanced visibility.
• This plugin resolves all tasks related to generating feeds from Google specifications, doing so safely to ensure users avoid inadvertently violating the extensive set of rules they may not be aware of.
• Solves GTIN issues in 80% of cases.
• It supports exporting Google's product category tags; users must assign the correct category to the product attribute and select it in the plugin settings.
• Currency selection for feed exports and additional tags for creating company-specific groups.
• Supports variations with different prices and combines them into one group.
• Exports the main product image or any specified via a link.
• Professional UTM tagging compatible with product SKUs or database IDs.
• Understand logistics from 1C or My Warehouse, managing product containers.
• Automatically updates availability status as in_stock or out_of_stock.">
                        <img src="images/portfolio/8.jpg" alt="">
                        <div>
                          <h5 class="name">Plugins (modules) for integrating eCommerce stores with <strong>GOOGLE
                          </strong> Merchant Center 🇷🇺 🇺🇸</h5>
                          <p>Over 900 online stores have installed my plugin codes on their websites and actively use
                            them to generate revenue. Google Merchant Center Plugin automates product exports for enhanced online visibility. Features include automatic product type tagging, GTIN correction, and dynamic price variation management. Ideal for detailed product listings and SEO optimization. I am a top seller of this solution on the e-commerce framework Webasys.</p>
                          <small><span class="button_link_project"
                                       data-link="www.webasyst.ru/store/plugin/shop/googlemc">Visit Site</span></small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 8 -->

                    <!-- Portfolio Item 9 -->
                    <figure class="item" data-groups='["all", "seocode", "uxui", "aws"]'>
                      <a href="images/portfolio/full/9.jpg" class="lightbox"
                         title="I spearheaded the development of this project from its inception: https://cuff.ru. I specialize in an online store on WooCommerce WordPress, concurrently integrating trading equipment, including cash registers, operating on Linux OS, alongside comprehensive inventory management.
Implemented a VDS server on Linux Debian OS for cPanel hosting within a shared OpenVPN network, integrating with an accounting program server.
IP telephony (SIP) and CCTV. Frontend development for various sites employs HTML, CSS, CSS3, JavaScript, Gulp, PHP, and MySQL.
Key Achievements:
✓ Enhanced website performance through SEO tools like KeyCollector, ZennoPoster, and Yazzle, resulting in top rankings on Yandex and Google within the Russian segment.
✓ Optimized website for Google Page Speed, transitioning from red to the green zone, improving visibility on Google and Yandex.
✓ Consolidated cash equipment, accounting systems, and online store functionality into a unified system.
✓ Developed plugins and modules, notably a multicity plugin for WordPress, facilitating the operation of offline stores across multiple cities with unique product displays.
✓ Configured VoIP.
✓ Implemented a CCTV in-store with remote accessibility from home or office.

I have experience with various e-commerce CMS platforms, including WordPress (WooCommerce), Drupal, 1C-Bitrix, Joomla, Webasyst (Shop-Script), ModX, Magento, and CS-Cart.
I am skilled in managing Linux Servers, specifically CentOS and Debian, with Python automation. I use Linux panels such as ISPManager or cPanel. I am proficient in iptables, bash scripting, Perl scripts, and security measures, including VPN (OpenVPN, PPTP), local cryptography, L3 routing, and more.
We are experienced in managing virtual machines with VirtualBox and VMware.
I am proficient in vector graphics using CorelDraw and Adobe suite applications, including Photoshop, Premiere Pro, and After Effects for video editing.
We experienced YouTube videos.">
                        <img src="images/portfolio/9.jpg" alt="">
                        <div>
                          <h5 class="name">WordPress Web Developer specializing in eCommerce and SEO 🇷🇺</h5>
                          <p>Managed and developed a WooCommerce-based online store, integrating cash register systems on Linux with unified product databases. Oversaw backend, frontend, SEO, and system administration, optimizing for peak performance on Google and Yandex. Developed plugins for multi-city store operations and managed CCTV and IP telephony, ensuring seamless connectivity and robust security.</p>
                          <small><span class="button_link_project"
                                                    data-link="cuff.ru">Visit Site</span></small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 9 -->

                    <!-- Portfolio Item 10 -->
                    <figure class="item" data-groups='["all", "plugin", "uxui"]'>
                      <a href="images/portfolio/full/10.jpg" class="lightbox"
                         title="FACEBOOKPRO PLUGIN: Streamlines product export to Facebook catalogs for advertising. Generates links for the exported files, allowing optional local downloads.

FACEBOOK PIXEL PLUGIN: Tracks and optimizes advertising on Facebook. Simple setup enables even novices to implement and monitor event-based ads efficiently, boosting ROI and ad effectiveness through precise event tracking and dynamic ad features.">
                        <img src="images/portfolio/10.jpg" alt="">
                        <div>
                          <h5 class="name">Plugins (modules) for <strong>FACEBOOK</strong> sales for eCommerce stores
                            🇷🇺 🇺🇸</h5>
                          <p>Over 900 online stores have installed my plugin codes on their websites and actively use
                            them to generate revenue. These include a plugin for exporting products to Facebook and Instagram ad feeds and the Facebook Pixel plugin for tracking statistics on advertising platforms. I am a top seller of this solution on the e-commerce framework Webasys.</p>
                          <small class="several_links">
                            <span class="button_link_project" data-link="www.webasyst.ru/store/plugin/shop/facebookpro">Module FacebookPro</span>
                            <span class="button_link_project"
                                  data-link="www.webasyst.ru/store/plugin/shop/facebookpixel/">Module Facebookpixel</span>
                          </small>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 10 -->

                    <!-- Portfolio Item 11 -->
                    <figure class="item" data-groups='["all", "seocode", "uxui"]'>
                      <a href="images/portfolio/full/11.jpg" class="lightbox"
                         title="Technical details:
Web developer proficient in HTML/CSS/SCSS/JavaScript or PHP FullStack, experienced with VDS/AWS – Linux Server, AJAX, JSON, jQuery, Webpack, SMARTY, accounting programs, APIs, NODE.JS, and eCommerce CMS.
Achievements:
✓ Compiled a semantic core for the website, conducted competitor analysis for semantic core requests, and provided optimal recommendations for content development, resulting in increased site traffic.
✓ Optimized website performance for Google Page Speed according to the latest standards, transitioning from red to the green zone, improving Google and Yandex rankings.
✓ Successfully mitigated a site hacking incident, promptly identifying vulnerabilities, closing security holes, and enhancing site protection and activity monitoring.
✓ Identified the most cost-effective VDS hosting solution for the business, installing a Linux server and optimizing it for CMS, enabling configurations not feasible on shared hosting.
✓ Accelerated website performance through server optimization, leading to faster loading times globally and increased sales.
✓ Created user instructions for website usage.
✓ Developed custom plugins for various purposes, including managing ads on Facebook, Google, etc.
✓ Developed an assortment unloading plugin for the Google Merchant Center, enabling the sale of goods with images on the Google homepage.
✓ Created a plugin for an accounting program to simplify sales reporting and facilitate convenient record-keeping for offline stores.
✓ Developed plugins for uploading products to Facebook and integrating Facebook pixel for advertising campaigns on Facebook and Instagram, targeting specific audiences and increasing sales.">
                        <img src="images/portfolio/11.jpg" alt="">
                        <div>
                          <h5 class="name">Full Stack Web Developer - eСommerce frameworks 🇷🇺</h5>
                          <p>Web developer skilled in HTML, CSS/SCSS, PHP, MySQL, JavaScript, and more. I've enhanced site security, optimized for Google Page Speed, and developed unique plugins, boosting site performance and visitor engagement. An expert in VDS hosting and API integrations, I've increased sales with targeted plugins for Facebook and Google ads.</p>
                          <small><span class="button_link_project"
                                       data-link="fvsport.com">Visit Site</span></small>
                          <i class="pe-7s-icon pe-7s-photo"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 11 -->

                    <!-- Portfolio Item 12 -->
                    <figure class="item" data-groups='["all", "video"]'>
                      <a href="video" title="Using this work as an example, you can see that I am skilled in video editing." class="lightbox mfp-iframe">
                        <img src="images/portfolio/12.jpg" alt="">
                        <div>
                          <h5 class="name">Adobe After Effects Project 🇺🇸</h5>
                          <p>This isn't my primary focus, but consider it a cool bonus for your online project. If needed, I can also edit videos in Adobe Premiere Pro and Adobe After Effects, adding effects that complement your website’s design.</p>
                          <small>Video</small>
                          <i class="pe-7s-icon pe-7s-video"></i>
                        </div>
                      </a>
                    </figure>
                    <!-- /Portfolio Item 12 -->

                  </div>
                  <!-- /Portfolio Grid -->

                </div>
                <!-- /Portfolio Content -->
              </div>
            </section>
            <!-- /Portfolio Subpage -->

            <!-- Contact Subpage -->
            <section class="pt-page pt-page-5" data-id="contact">
              <div class="border-block-top-110"></div>
              <div class="section-inner">
                <div class="section-title-block">
                  <div class="section-title-wrapper">
                    <h2 class="section-title">Contact</h2>
                    <h5 class="section-description">Get in Touch</h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-md-6 subpage-block">
                    <div class="block-title">
                      <h3>Get in Touch</h3>
                    </div>
                    <p>Open to all opportunities in the Laravel full-stack web development. Grateful for any project or
                      job leads you might share.</p>
                    <div class="contact-info-block">
                      <div class="ci-icon">
                        <i class="pe-7s-icon pe-7s-map-marker"></i>
                      </div>
                      <div class="ci-text">
                        <h5>North Highlands, California, USA</h5>
                      </div>
                    </div>
                    <div class="contact-info-block">
                      <div class="ci-icon">
                        <i class="pe-7s-icon pe-7s-mail"></i>
                      </div>
                      <div class="ci-text">
                        <h5>j@solarneutrino.com</h5>
                      </div>
                    </div>
                    <div class="contact-info-block">
                      <div class="ci-icon">
                        <i class="pe-7s-icon pe-7s-call"></i>
                      </div>
                      <div class="ci-text">
                        <h5><a href="tel:+19165959841">+1(916)595-9841</a></h5>
                      </div>
                    </div>
                    <div class="contact-info-block">
                      <div class="ci-icon">
                        <i class="pe-7s-icon pe-7s-check"></i>
                      </div>
                      <div class="ci-text">
                        <h5>Available</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-6 subpage-block">
                    <div class="block-title">
                      <h3>Contact Form</h3>
                    </div>
                    <form id="contact-form" method="post" action="contact-form">
                      @csrf
                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                        <div class="messages"></div>

                      <div class="controls">
                        <div class="form-group">
                            <input id="form_name" type="text" name="name" minlength="2" maxlength="255" class="form-control" placeholder="Full Name" required="required" data-error="Name is required.">
                            <div class="form-control-border"></div>
                            <i class="form-control-icon pe-7s-user"></i>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <input id="form_email" type="email" name="email" minlength="5" maxlength="255" class="form-control" placeholder="Email Address" required="required" data-error="Valid email is required.">
                            <div class="form-control-border"></div>
                            <i class="form-control-icon pe-7s-mail"></i>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <textarea id="form_message" name="message" maxlength="5000" class="form-control" placeholder="Message for Me" rows="4" required="required" data-error="Please, leave me a message."></textarea>
                            <div class="form-control-border"></div>
                            <i class="form-control-icon pe-7s-comment"></i>
                            <div class="help-block with-errors"></div>
                        </div>

                        <input type="submit" class="button btn-send" value="Send message">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
            <!-- End Contact Subpage -->

          </div>
        </div>
        <!-- /Page changer wrapper -->
      </div>
      <!-- /Main Content -->
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/pages-switcher.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/validator.js"></script>
    <script src="js/jquery.shuffle.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/tilt.jquery.min.js"></script>
    <script src="js/jquery.hoverdir.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
