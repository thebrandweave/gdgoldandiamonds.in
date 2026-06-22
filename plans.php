<?php
include("./adminFiles/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/'; ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Explore flexible gold saving plans at Liyas Gold & Diamonds. Start your savings today and secure gold jewelry for the future.">
  <title>Gold Scheme - Liyas Gold and Diamonds</title>

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

  <!-- Main Section -->
  <section class="section-padding" style="min-height: 80vh; padding: 60px 0;">
    <div class="container">
      
      <!-- Section Title -->
      <div class="section-title-wrapper" data-aos="fade-up">
        <h2>Gold Scheme Plans</h2>
        <div class="divider"></div>
        <p>A smart investment for your future security.</p>
      </div>

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-8">
          <div class="card p-4" style="background-color: #fff; border: 1px solid var(--color-gold); border-radius: 4px; box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
            
            <h4 class="text-magenta text-center mb-4" style="font-family: var(--font-serif); font-size: 1.8rem; font-weight: 700;">
              Mega Gold Savings Plan
            </h4>
            
            <!-- Brochure PDF Preview -->
            <div class="mb-4" style="border: 1px solid rgba(197, 155, 39, 0.15); border-radius: 4px; overflow: hidden;">
              <iframe src="https://drive.google.com/file/d/1V_Nas4bwU1f7Ih9VTlpxbg2No_1SO9R-/preview" width="100%" height="600" style="border: 0;"></iframe>
            </div>

            <!-- Download and Action buttons -->
            <div class="row g-3 justify-content-center">
              <div class="col-sm-6 text-center">
                <a href="./files/gb.pdf" class="btn-magenta-filled w-100 py-3" download="Mega_Gold_Savings_Plan_Brochure.pdf">
                  Download Brochure &nbsp; <i class="fa fa-download"></i>
                </a>
              </div>
              <div class="col-sm-6 text-center">
                <a href="https://goldendream.in/landing" target="_blank" class="btn-gold-filled w-100 py-3">
                  Register Now &nbsp; <i class="fa fa-external-link"></i>
                </a>
              </div>
            </div>

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