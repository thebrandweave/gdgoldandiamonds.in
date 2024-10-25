<?php
include("./adminFiles/config.php");
?>

<!DOCTYPE html>
<html id="documenContainer" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GD Gold and Diamonds</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/navBar.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/testimonials.css" />

  <link rel="stylesheet" href="./css/responsive/phone.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- aos animation  -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body class="content">
  <div class="loading">
    <div class="loadingAnimation">

      <div class="circle"></div>
      <div class="circle"></div>
      <img height="160" style="margin-top: -35px;" src="./images/gdlogo.png" alt="">

    </div>
  </div>

  <!-- --------------- ----nav bar start ------------------ -->
  <header id="header">
    <img src="./images/gdlogo.png" href="#" class="logo" />
    <div class="menu">
      <a class="active">HOME</a>
      <a href="./about.php" onclick="closeMenu()">ABOUT</a>
      <a href="./collections.php">COLLECTIONS</a>
      <a href="./plans.php" onclick="closeMenu()">PLANS</a>
      <span> <a  href="https://goldendream.in/referral-user/registration/5fOKJqalEd">LOGIN</a>
      </span>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->

  <!-- Carousel Slider -->
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="d-block w-100 vh-100 bg-customDark text-white d-flex justify-content-center align-items-center backgroundImage1">
          <!-- edit from here  -->
          <div class="video-container">
            <video autoplay loop muted playsinline>
              <source src="./images/backgrounds/videos/newBgVido.mp4" type="video/mp4" />
              <!-- Your browser does not support the video tag. -->
            </video>
          </div>
          <div class="homePageImg">
            <img src="./images/bangle6.png" alt="" />
          </div>

          <div class="homePageText">
            <h2>
              A Small Investment <br />
              for your Future
            </h2>
            <span> <a href="./plans.php" class="btn btn-outline-warning golden_BG homeScreenBtn">Explore Now</a>
            </span><span> <a href="https://goldendream.in/referral-user/registration/5fOKJqalEd" class="btn btn golden_BG homeScreenBtn bg-golden">Register</a>
            </span>
          </div>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="d-block w-100 vh-100 bg-customDark text-white d-flex justify-content-center align-items-center backgroundImage2">
          <!-- edit from here  -->
          <div class="video-container">
            <video autoplay loop muted playsinline>
              <source src="./images/backgrounds/videos/bg4.mp4" type="video/mp4" />
              <!-- Your browser does not support the video tag. -->
            </video>
          </div>
          <div class="homePageImg">
            <img src="./images/bangle7.png" alt="" />
          </div>
          <div class="homePageText">
            <h2>
              A Small Investment <br />
              for your Future
            </h2>
            <span> <a href="./plans.php" class="btn btn-outline-warning golden_BG homeScreenBtn">Explore Now</a>
            </span><span> <a href="https://goldendream.in/referral-user/registration/5fOKJqalEd" class="btn btn golden_BG homeScreenBtn bg-golden">Register</a>
            </span>
          </div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="d-block w-100 vh-100 bg-customDark text-white d-flex justify-content-center align-items-center backgroundImage3">
          <!-- edit from here  -->
          <div class="video-container">
            <video autoplay loop muted playsinline>
              <source src="./images/backgrounds/videos/bg3.mp4" type="video/mp4" />
              <!-- Your browser does not support the video tag. -->
            </video>
          </div>
          <div class="homePageImg">
            <img src="./images/chain9.png" alt="" />
          </div>
          <div class="homePageText">
            <h2>
              A Small Investment <br />
              for your Future
            </h2>
            <span> <a href="./plans.php" class="btn btn-outline-warning golden_BG homeScreenBtn">Explore Now</a>
            </span><span> <a href="https://goldendream.in/referral-user/registration/5fOKJqalEd" class="btn btn golden_BG homeScreenBtn bg-golden">Register</a>
            </span>
          </div>
        </div>
      </div>
      <!-- Slide 4 -->
      <div class="carousel-item">
        <div class="d-block w-100 vh-100 bg-customDark text-white d-flex justify-content-center align-items-center backgroundImage4">
          <!-- edit from here  -->
          <div class="video-container">
            <video autoplay loop muted playsinline>
              <source src="./images/backgrounds/videos/bg5.mp4" type="video/mp4" />
              <!-- Your browser does not support the video tag. -->
            </video>
          </div>
          <div class="homePageImg">
            <img src="./images/chain11.png" alt="" style="width: 55%; height: 55%;" />
          </div>
          <div class="homePageText">
            <h2>
              A Small Investment <br />
              for your Future
            </h2>
            <span> <a href="./plans.php" class="btn btn-outline-warning golden_BG homeScreenBtn">Explore Now</a>
            </span><span> <a href="https://goldendream.in/referral-user/registration/5fOKJqalEd" class="btn btn golden_BG homeScreenBtn bg-golden">Register</a>
            </span>
          </div>
        </div>
      </div>
      <!-- Slide 5 -->
      <div class="carousel-item">
        <div class="d-block w-100 vh-100 bg-customDark text-white d-flex justify-content-center align-items-center backgroundImage5">
          <!-- edit from here  -->
          <div class="video-container">
            <video autoplay loop muted playsinline>
              <source src="./images/backgrounds/videos/videoplayback2.mp4" type="video/mp4" />
              <!-- Your browser does not support the video tag. -->
            </video>
          </div>
          <div class="homePageImg">
            <img src="./images/bangle6.png" alt="" />
          </div>
          <div class="homePageText">
            <h2>
              A Small Investment <br />
              for your Future
            </h2>
            <span> <a href="./plans.php" class="btn btn-outline-warning golden_BG homeScreenBtn">Explore Now</a>
            </span><span> <a href="https://goldendream.in/referral-user/registration/5fOKJqalEd" class="btn btn golden_BG homeScreenBtn bg-golden">Register</a>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional controls -->
    <button style="z-index: 2;" class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button style="z-index: 2;" class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- -------------------------------------carousel end-------------------------------------- -->

  <!-- ------------------------why choose us--------------------------------- -->
  <div class="container2">
    <div class="row">
      <div class="col-md-6 Cont2info">
        <h1 data-aos-delay="100" data-aos="fade-up">Why Choose Us</h1>
        <p data-aos-delay="100" data-aos="fade-up">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, quo molestias? Reiciendis esse cumque aspernatur, temporibus quam modi tenetur quaerat cupiditate dolorem suscipit eos?</p>
        <p data-aos-delay="100" data-aos="fade-up">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, quo molestias? Reiciendis esse officia cumque aspernatur, temporibus quam modi tenetur quaerat cupiditate dolorem suscipit eos?</p>
        <p data-aos-delay="100" data-aos="fade-up">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, quo molestias? Reiciendis esse officia cumque aspernatur, temporibus quam modi tenetur quaerat cupiditate dolorem suscipit eos?</p>
      </div>
      <div class="col-md-6 text-center section2">
        <img data-aos-delay="100" data-aos="fade-up" src="./images/bangle.svg" alt="" />
      </div>
    </div>
  </div>
  <!-- ------------------------why choose us end--------------------------------- -->

  <!-- ------------------------Trending Start-------------------------------- -->

  <div class="container3 text-center">
    <h1 data-aos-delay="100" data-aos="fade-up">Trending on <span>GD Gold and Diamonds</span></h1>
    <div data-aos-delay="100" data-aos="fade-up" style="margin: 0px" class="UnderLine text-center">
      <p></p>
    </div>

    <div class="row" style="justify-content: space-around !important;">
      <!-- Main -->
      <?php
      include("./adminFiles/config.php");

      // Modify the SQL query to limit the result to 3 items
      $tc_sql = "SELECT collection_id, collection_name, collection_image_url FROM trending_collections ORDER BY sort_order ASC LIMIT 3";
      $tc_result = $conn->query($tc_sql);

      if ($tc_result === FALSE) {
        echo "<p>Error fetching data: " . $conn->error . "</p>";
      } elseif ($tc_result->num_rows > 0) {
        while ($row = $tc_result->fetch_assoc()) {
      ?>
          <div data-aos-delay="100" data-aos="fade-up" class="col-md-3 trend_Container">
            <img src="./adminFiles/CollectionItems/<?php echo htmlspecialchars($row['collection_image_url']); ?>" alt="<?php echo htmlspecialchars($row['collection_name']); ?>" />
            <p><?php echo htmlspecialchars($row['collection_name']); ?></p>
          </div>
      <?php
        }
      } else {
        echo "<p>No collections found.</p>";
      }
      ?>


    </div>
  </div>
  <br />
  <!-- ------------------------Trending End-------------------------------- -->

  <!-- ------------------------Collections Start-------------------------------- -->
  <?php



  $col_sql = "SELECT collection_id, collection_name, collection_image_url FROM collections ORDER BY sort_order ASC";
  $col_result = $conn->query($col_sql);
  ?>

  <!-- ------------------------Collections Start-------------------------------- -->
  <div class="container4 text-center">
    <h2 data-aos-delay="100" data-aos="fade-up">- Explore our Collections -</h2>
    <div data-aos-delay="100" data-aos="fade-up" class="exploreline UnderLine text-center ourCollectionsUnderline">
      <p></p>
    </div>
    <?php
    if ($col_result === FALSE) {
      echo "<p>Error fetching data: " . $conn->error . "</p>";
    } elseif ($col_result->num_rows > 0) {
      $count = 0; // to keep track of items per row
      while ($row = $col_result->fetch_assoc()) {
        if ($count >= 6) {
          break; // stop displaying items after 6
        }

        if ($count % 3 == 0) { // start a new row every 3 items
          if ($count > 0) {
            echo "</div><br>"; // close previous row and add space between rows
          }
          echo '<div class="row" style="justify-content: space-around">';
        }
    ?>
        <div data-aos-delay="100" data-aos="fade-up" class="col-md-3 Coll_Container ">
          <img src="./adminFiles/CollectionItems/<?php echo htmlspecialchars($row['collection_image_url']); ?>" alt="<?php echo htmlspecialchars($row['collection_name']); ?>" />
          <p><?php echo htmlspecialchars($row['collection_name']); ?></p>
        </div>
    <?php
        $count++;
      }
      // Close the last row div if there are any remaining items
      if ($count % 3 != 0) {
        echo "</div>";
      }
    } else {
      echo "<p>No collections found.</p>";
    }
    ?>

    <div class="viewMore text-center"><a data-aos-delay="100" data-aos="fade-up" href="./collections.php" class="btn  bg-golden ">View More Collections</a></div>

  </div>

  <?php
  $conn->close();
  ?>
<!----------------------------------- Youtube video ---------------------------->
<br>
<div class="container3 text-center">
  <h1 data-aos-delay="100" data-aos="fade-up">YouTube</h1>

  <div class="cover-container" onclick="showVideo()" >
    <img src="./images/gdteam.jpg" class="cover" />
    <img src="./images/gdlogo.png" alt="Play Button" class="play-button" >
  </div>
</div>

<div class="video-popup-overlay" id="videoPopup">
  <div class="video-popup-content">
    <span class="close-button" onclick="hideVideo()">&times;</span>
    <iframe id="youtubeIframe" width="560" height="315" 
            src="" 
            title="YouTube video player" frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen loading="lazy">
    </iframe>
  </div>
</div>


  <!-- ------------------------contact Start-------------------------------- -->

  <div class="container5">
    <div data-aos-delay="100" data-aos="fade-up" class="cont5top">
      <h4>Need Help?</h4>
      <p>+91 8867575821 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;+91 8867575821</p>
    </div>
    <div style="background: white; width: 100%; height: 20px"></div>
    <div data-aos-delay="100" data-aos="fade-up" class="container my-5">
      <div class="row">
        <!-- Info Section -->
        <div class="col-lg-6">
          <div class="info-section contactSectionHeight">
            <h2 class="mb-4 golden_Text">Let's get in touch</h2>
            <p class="text-justify">Whether you have a question, need support, or just want to collaborate, we’re here to help. Feel free to reach out to us through the contact details provided or by filling out the form. We look forward to hearing from you!</p>
            <p>#2-108/C-7, Ground Floor, Sri Mantame Complex, Near Soorya Infotech Park, Kurnadu Post, Mudipu Road, Bantwal- 574153</p>
            <p>lorem@ipsum.com</p>
            <p>123-456-789</p>
            <h5>Connect with us:</h5>
            <div class="mt-2">
              <span class="social-icon"><i class="fa fa-whatsapp"></i> </span>
              <span class="social-icon"><i class="fa fa-instagram"></i> </span>
              <span class="social-icon"><i class="fa fa-twitter"></i> </span>
            </div>
          </div>
        </div>

        <!-- Contact Form Section -->
        <div class="col-lg-6">
          <div class="contact-section contactSectionHeight">
            <h2 class="text-white mb-4">Contact us</h2>
            <form method="POST" action="./sendMail.php">
              <div class="mb-3">
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required />
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required />
              </div>
              <div class="mb-3">
                <input type="tel" class="form-control" name="phone" placeholder="Phone" required />
              </div>
              <div class="mb-3">
                <textarea class="form-control" name="message" rows="4" placeholder="Message" style="resize: none" required></textarea>
              </div>
              <button type="submit" class="btn w-100 contactBtn">Send Message</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ------------------------testimonials Start-------------------------------- -->
  <hr>
  <div class="container3 text-center testimonialsContainer">
    <h1 data-aos-delay="100" data-aos="fade-up">Testimonials</span></h1>
    <div data-aos-delay="100" data-aos="fade-up" style="margin: 0px" class="UnderLine text-center">
      <p></p>
    </div>

    <div class="row" style="justify-content: space-around !important;">
      <!-- Main -->

      <div data-aos-delay="100" data-aos="fade-up id=" testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
          <?php
          include("./adminFiles/config.php");

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $testi_sql = "SELECT customer_name, feedback, rating, customer_image_url FROM testimonials ORDER BY sort_order ASC";
          $testi_result = $conn->query($testi_sql);

          if ($testi_result === FALSE) {
            echo "<p>Error fetching data: " . $conn->error . "</p>";
          } elseif ($testi_result->num_rows > 0) {
            $isFirst = true; // Track first slide
            while ($row = $testi_result->fetch_assoc()) {
              // Check if the first item is active
              $activeClass = $isFirst ? 'active' : '';
              echo '<div class="carousel-item ' . $activeClass . '">';
              echo '<div class="testimonial-card">';
              echo '<img src="./adminFiles/CollectionItems/' . htmlspecialchars($row['customer_image_url']) . '" alt="Customer Image">';

              echo '<h5>' . htmlspecialchars($row['customer_name']) . '</h5>';
              echo '<p class="mb-1">"' . htmlspecialchars($row['feedback']) . '"</p>';

              echo '<img style="border-radius:0;height:15px" src="./images/ratingStar.png">';
              echo '</div>';
              echo '</div>';
              $isFirst = false; // After the first iteration, this will be false
            }
          } else {
            echo "<p>No testimonials found.</p>";
          }

          $conn->close();
          ?>
        </div>


      </div>



    </div>
  </div>
  <br />
  <!-- ------------------------Trending End-------------------------------- -->

  <footer class="site-footer">
    <div class="footer-content">


      <div style="width: 150% !important" class="footer-info second-column">
        <!-- <p class="footer-business-name">Copyrights &copy; GD Golds and Diamonds</p> -->
        <div class="row">
          <div class="col-3">
            <img height="100" class="footerLogo" src="./images/gdlogo.png" alt="" />
          </div>
          <div class="col-8" style="text-align: left;">
            <p class="footer-business-address "><strong>Locations:</strong> #2-108/C-7, Ground Floor, Sri Mantame Complex, Near Soorya Infotech Park, Kurnadu Post, Mudipu Road, Bantwal- 574153</p>
            <p class="footer-business-phone"><strong>Phone: </strong>+91 73497 39580</p>
          </div>
        </div>
      </div>
      <div style="width: 100% !important" class="footer-info second-column">
        <p class="footer-business-name pcFooterCopyright">Copyrights &copy; GD Golds and Diamonds</p>
        <a  href="https://intelexsolutions.site" class="logo-column">
          <img height="85" src="./images/footerCreditsIS.png" alt="" />
        </a>
      </div>
      <nav class="footer-nav third-column ">
        <ul>
          <li><a href="./">Home</a></li>
          |&nbsp;&nbsp;
          <li><a href="./privacy-policy/"> About us</a></li>
          |&nbsp;&nbsp;
          <li><a href="./contact">Collections</a></li>
          |&nbsp;&nbsp;
          <li><a href="./privacy-policy/">Plans</a></li>
        </ul>
        <div style="width: 100%;text-align: center;">

          <div class="mt-2">
            <span class="social-icon"><i class="fa fa-whatsapp"></i> </span>
            <span class="social-icon"><i class="fa fa-instagram"></i> </span>
            <span class="social-icon"><i class="fa fa-twitter"></i> </span>
          </div>
        </div>
      </nav>
    </div>

  </footer>
  <div class="phoneFooterCopyright">
    <p class="">Copyrights &copy; GD Golds and Diamonds</p>

  </div>



  <script src="./js/main.js"></script>
  <script src="./js/navBar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    // Manually initialize the carousel with auto-slide and set interval of 5000ms
    var myCarousel = document.querySelector("#carouselExample");
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 5000, // 5 seconds
      ride: "carousel", // Auto-start the carousel
    });
  </script>
  <script>
    const params = new URLSearchParams(window.location.search);

    const showValue = params.get('show');

<<<<<<< HEAD
    if (showValue !== null) {
      console.log(`The value of the 'show' parameter is: ${showValue}`);
    } else {
      window.location.href = "Maintenance.html";
    }
  </script>
=======
if (showValue !== null ) {
  console.log(`The value of the 'show' parameter is: ${showValue}`);
} else {
  // window.location.href = "Maintenance.html";
}

</script>
>>>>>>> refs/remotes/origin/main
  <!-- aos animation script  -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
<<<<<<< HEAD

=======
 <script>
  function showVideo() {
    const iframe = document.getElementById("youtubeIframe");
    iframe.src = "https://www.youtube.com/embed/4smhzjT3d1w?autoplay=1";
    document.getElementById("videoPopup").style.display = "flex";
  }

  function hideVideo() {
    const videoPopup = document.getElementById("videoPopup");
    const iframe = document.getElementById("youtubeIframe");

    // Hide the popup and stop the video by clearing the src
    videoPopup.style.display = "none";
    iframe.src = "";
  }
 </script>
>>>>>>> refs/remotes/origin/main
</body>

</html>