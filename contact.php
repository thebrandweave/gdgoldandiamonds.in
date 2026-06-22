<?php
include("./adminFiles/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/'; ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Contact Liyas Gold & Diamonds in Bejai, Mangalore. Get in touch with us for gold schemes, custom jewelry designs, or to book a showroom visit.">
  <title>Contact Us - Liyas Gold and Diamonds</title>

  <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
  <link rel="stylesheet" href="./css/style.css?v=1.2" />
  <link rel="stylesheet" href="./css/navBar.css?v=1.2" />
  <link rel="stylesheet" href="./css/footer.css?v=1.2" />
  <link rel="stylesheet" href="./css/testimonials.css?v=1.2" />
  <link rel="stylesheet" href="./css/responsive/phone.css?v=1.2">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="content" style="background-color: var(--color-cream-light);">

  <!-- Loader Screen -->
  <div id="loader" class="loader-bg">
    <img src="./images/liyaslogo1.png" class="loader-logo" alt="Logo" />
  </div>

  <!-- Include Shared Header Component -->
  <?php include("./header.php"); ?>

  <div style="height:80px; width:100vw"></div>

  <!-- Contact Heading -->
  <section class="section-padding bg-cream" style="padding: 60px 0 30px;">
    <div class="container">
      <div class="section-title-wrapper" data-aos="fade-up">
        <h2>Contact Us</h2>
        <div class="divider"></div>
        <p>Get in touch or visit our showroom.</p>
      </div>
    </div>
  </section>

  <!-- Get In Touch & Map Section -->
  <section class="section-padding bg-cream-light" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="container">
      <div class="row g-5">
        
        <!-- Get In Touch Details -->
        <div class="col-lg-5" data-aos="fade-right">
          <div class="contact-info-card">
            <h3 class="text-magenta" style="font-family: var(--font-serif); font-size: 2.2rem; font-weight: 700; margin-bottom: 15px;">Get In Touch</h3>
            <p style="opacity: 0.8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px;">
              We're here to help you find the perfect jewelry. Reach out to us through any of the channels below or fill out the enquiry form.
            </p>
            
            <ul class="contact-info-list">
              <!-- Address -->
              <li class="contact-info-node">
                <i class="fa fa-map-marker"></i>
                <div>
                  <strong>Showroom Address:</strong><br>
                  Liyas Gold & Diamonds,<br>
                  Bejai, Mangalore - 575004
                </div>
              </li>
              
              <!-- Phone -->
              <li class="contact-info-node">
                <i class="fa fa-phone"></i>
                <div>
                  <strong>Phone Number:</strong><br>
                  +91 82421 55109
                </div>
              </li>
              
              <!-- Email -->
              <li class="contact-info-node">
                <i class="fa fa-envelope"></i>
                <div>
                  <strong>Email Address:</strong><br>
                  info@liyasgold.com
                </div>
              </li>
              
              <!-- Website -->
              <li class="contact-info-node">
                <i class="fa fa-globe"></i>
                <div>
                  <strong>Website URL:</strong><br>
                  www.liyasgoldanddiamonds.com
                </div>
              </li>
              
              <!-- Timings -->
              <li class="contact-info-node">
                <i class="fa fa-clock-o"></i>
                <div>
                  <strong>Working Hours:</strong><br>
                  Mon - Sun [9:30 AM - 8:00 PM]
                </div>
              </li>
            </ul>
            
            <div class="contact-social-row">
              <a href="https://wa.me/917349739580" target="_blank" class="contact-social-btn"><i class="fa fa-whatsapp"></i></a>
              <a href="https://instagram.com/liyasgold" target="_blank" class="contact-social-btn"><i class="fa fa-instagram"></i></a>
              <a href="https://facebook.com/liyasgold" target="_blank" class="contact-social-btn"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/liyasgold" target="_blank" class="contact-social-btn"><i class="fa fa-twitter"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Google Map Iframe -->
        <div class="col-lg-7" data-aos="fade-left">
          <div style="border: 1px solid var(--color-gold); border-radius: 4px; overflow: hidden; height: 100%; min-height: 450px; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <!-- Embedding a Google Map for Bejai, Mangalore -->
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.378772844898!2d74.83981881529124!3d12.882736490914187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba35a3962d85b19%3A0xe54d8a1c97a8e84!2sBejai%2C%20Mangalore%2C%20Karnataka%20575004!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin" 
              width="100%" 
              height="100%" 
              style="border:0; min-height: 450px;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- Showroom Visit CTA Form & Banner -->
  <section class="section-padding bg-cream-light" id="book-visit" style="padding-top: 30px;">
    <div class="container">
      <div class="contact-showroom-box" data-aos="fade-up">
        <div class="row align-items-center g-0">
          
          <!-- Booking Form Left -->
          <div class="col-lg-6 contact-showroom-content">
            <h3>Visit Our Showroom</h3>
            <p>Experience our exquisite collections in person. Fill out the quick registration form to schedule a personalized shopping assistance session at our store.</p>
            
            <form method="POST" action="./sendMail.php" class="mt-4">
              <div class="row g-3">
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="full_name" placeholder="Full Name" required style="border-radius: 4px; padding: 12px; background-color: rgba(255,255,255,0.95); border: 1px solid rgba(226,197,138,0.3);" />
                </div>
                <div class="col-sm-6">
                  <input type="email" class="form-control" name="email" placeholder="Email Address" required style="border-radius: 4px; padding: 12px; background-color: rgba(255,255,255,0.95); border: 1px solid rgba(226,197,138,0.3);" />
                </div>
                <div class="col-12">
                  <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required style="border-radius: 4px; padding: 12px; background-color: rgba(255,255,255,0.95); border: 1px solid rgba(226,197,138,0.3);" />
                </div>
                <div class="col-12">
                  <textarea class="form-control" name="message" rows="4" placeholder="Your Message or Preferred Timings" required style="resize: none; border-radius: 4px; padding: 12px; background-color: rgba(255,255,255,0.95); border: 1px solid rgba(226,197,138,0.3);"></textarea>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn-gold-filled w-100 py-3" style="text-align: center;">Book Your Visit</button>
                </div>
              </div>
            </form>
          </div>
          
          <!-- Showroom Interior Image Right -->
          <div class="col-lg-6">
            <img src="./images/showroom_interior.png" class="w-100 contact-showroom-img" alt="Liyas Gold Showroom Interior" />
          </div>
          
        </div>
      </div>
    </div>
  </section>

  <!-- Include Shared Footer Component -->
  <?php include('./footer.php'); ?>

  <script src="./js/main.js?v=1.2"></script>
  <script src="./js/navBar.js?v=1.2"></script>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 900, once: true });
  </script>
</body>

</html>