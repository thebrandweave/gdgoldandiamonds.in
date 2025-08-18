<?php
include("./adminFiles/config.php");
?>

<!DOCTYPE html>
<html id="documenContainer" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!--   seo optimization -->
  <!-- Homepage Meta Description -->
  <meta name="description" content="Liyas gold & diamonds in Mudipu offers exclusive jewelry collections and tailored gold plans for Mangalore customers. Visit us today!">

  <!-- Gold Plans Page Meta Description -->
  <meta name="description" content="Explore flexible gold plans at Liyas, Mudipu's trusted source for quality jewelry in Mangalore. Start your savings today!">

  <!-- Contact Page Meta Description -->
  <meta name="description" content="Visit GD Gold in Mudipu, Mangalore for quality gold plans and more. Contact us today for exclusive options.">

  <title>GD Gold and Diamonds</title>
  <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/navBar.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/testimonials.css" />

  <link rel="stylesheet" href="./css/responsive/phone.css">
  <link rel="stylesheet" href="./css/popup.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- aos animation  -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    /* Collections.php loader styles */
    .loader-bg {
      position: fixed; z-index: 9999; width: 100vw; height: 100vh;
      background: #000; display: flex; align-items: center; justify-content: center;
      transition: opacity 1s;
    }
    .loader-logo {
      width: 120px; animation: logoPop 1.2s cubic-bezier(.68,-0.55,.27,1.55);
    }
    @keyframes logoPop {
      0% { transform: scale(0.5); opacity: 0; }
      80% { transform: scale(1.1); opacity: 1; }
      100% { transform: scale(1); }
    }
  </style>

</head>

<body class="content">
  <div id="loader" class="loader-bg">
    <img src="./images/liyaslogo1.png" class="loader-logo" alt="Logo" />
  </div>

  <!-- --------------- ----nav bar start ------------------ -->
  <header id="header">
    <img src="./images/liyaslogo1.png" href="#" class="logo" />
    <div class="menu">
      <a class="active">HOME</a>
      <a href="./about.php" class="active" onclick="closeMenu()">ABOUT</a>
      <a href="./collections.php" class="active">COLLECTIONS</a>
      <a href="./plans.php" class="active" onclick="closeMenu()">PLANS</a>
      <span> <a href="https://goldendream.in/landing" class="active">LOGIN</a>
      </span>
      <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
    </div>
    <div class="menu-shadow" onclick="closeMenu()"></div>
    <i class="fa fa-bars show-bar" onclick="openMenu()"></i>
  </header>
  <!-- --------------- ----nav bar end ------------------ -->

  <!-- ------------------popup ads start------------ -->
  <!-- <div class="popupAd" id="offerModal">
  <div class="custom-modal">
    <a  onclick="closePopup()" class="close-btn">&times;</a>
    <img src="images/bangle.png" alt="Promotional Offer" class="promo-image">
    <p>Use code SUMMER50 at checkout. Hurry, offer ends soon!</p>
    <a href="#" class="btn btn-shop">Shop Now</a>
  </div>
</div> -->


  <?php
  $pop_sql = "SELECT * FROM popups ORDER BY created_at DESC LIMIT 1";
  $pop_result = $conn->query($pop_sql);
  $popup_visiblity = "none";

  if ($pop_result->num_rows > 0) {
    $ad = $pop_result->fetch_assoc();
    $popup_visiblity = "flex";

  ?>

    <div style="display: <?php echo $popup_visiblity; ?>;" class="popupAd" id="offerModal">
      <div class="custom-modal">
        <a onclick="closePopup()" class="close-btn">&times;</a>
        <img src="<?php echo htmlspecialchars(str_replace('../', './adminFiles/', $ad['popup_image_url'])); ?>"
          alt="<?php echo htmlspecialchars($ad['title']); ?>" class="promo-image">
        <p><?php echo htmlspecialchars($ad['title']); ?></p>
        <a onclick="closePopup()" id="<?php echo htmlspecialchars($ad['link_url']); ?>" class="btn btn-shop">Close</a>
      </div>
    </div>



  <?php
  } else {
    $popup_visiblity = "none";
  }

  ?>
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
            <img src="./images/bangle1.png" alt="Gold Bangle Collection" />
          </div>

          <div class="homePageText">
            <h2>
              A Small Investment <br />
              for your Future
            </h2>
            <br>
            <span> <a href="./plans.php" class="btn btn-outline-warning golden_BG homeScreenBtn">Explore Now</a>
            </span><span> <a href="https://goldendream.in/landing" class="btn btn golden_BG homeScreenBtn bg-golden">Register</a>
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
            <img src="./images/chain11.png" alt="Gold Chain Collection" />
          </div>
          <div class="homePageText">
            <h2>
              Smart Investments, <br>
              Bright Tomorrows
            </h2>
            <br>
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
            <img src="./images/earring12.png" alt="Diamond Earrings Collection" />
          </div>
          <div class="homePageText">
            <h2>
              Plant Today,<br>
              Prosper Tomorrow
            </h2>
            <br>
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
            <img src="./images/chain13.png" alt="Gold Chain Collection" />
          </div>
          <div class="homePageText">
            <h2>
              Secure Your Future,<br>
              One Step at a Time
            </h2>
            <br>
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
            <img src="./images/bracelet11.png" alt="Gold Bracelet Collection" />
          </div>
          <div class="homePageText">
            <h2>
              Invest Now, <br>
              Reap for a Lifetime
            </h2>
            <br>
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

        <p class="whyTochooseUs">
          At LIYAS GOLD AND DIAMONDS, we're dedicated to providing a trusted, high-quality experience for our clients. With ethically sourced, rigorously inspected gold, we ensure each piece meets the highest standards. Whether you're new to investing or an experienced buyer, our range of products offers something for everyone.</p>
        <p class="whyTochooseUs">

          Our expert team at LIYAS GOLD AND DIAMONDS brings decades of experience, dedicated to empowering clients with knowledge and personalized guidance. Whether you're investing in gold for security, growth, or as a family heirloom, we're here to support informed decisions. Your success is our priority.</p>
        <p class="whyTochooseUs">

          Choosing LIYAS GOLD AND DIAMONDS means partnering with a team committed to integrity, transparency, and excellence. We prioritize long-term relationships, offering trusted guidance to help secure your financial future with confidence.</p>
      </div>
      <div class="col-md-6 text-center section2">
        <img data-aos-delay="100" data-aos="fade-up" src="./images/bangle.png" alt="" />
      </div>
    </div>
  </div>
  <!-- ------------------------why choose us end--------------------------------- -->

  <!-- ------------------------Trending Start-------------------------------- -->

  <div class="container3 text-center">
    <h1 data-aos-delay="100" data-aos="fade-up">Trending on <span>LIYAS Gold and Diamonds</span></h1>
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
            <img src="<?php echo './adminFiles/' . str_replace('../', '', htmlspecialchars($row['collection_image_url'])); ?>" alt="<?php echo htmlspecialchars($row['collection_name']); ?>" />
            <p><?php echo htmlspecialchars($row['collection_name']); ?></p>
          </div>
      <?php
        }
      } else {
        echo "<p>No trending collections found in database.</p>";
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
        <a href="./collectionItems.php?col_id=<?php echo $row['collection_id']; ?>" data-aos-delay="100" data-aos="fade-up" class="col-md-3 Coll_Container btn">
          <img src="<?php echo './adminFiles/' . str_replace('../', '', htmlspecialchars($row['collection_image_url'])); ?>" alt="<?php echo htmlspecialchars($row['collection_name']); ?>" />
          <p><?php echo htmlspecialchars($row['collection_name']); ?></p>
        </a>
    <?php
        $count++;
      }
      // Close the last row div if there are any remaining items
      if ($count % 3 != 0) {
        echo "</div>";
      }
    } else {
      echo "<p>No collections found in database.</p>";
    }
    ?>

    <div class="viewMore text-center mt-3"><a data-aos-delay="100" data-aos="fade-up" href="./collections.php" class="btn  bg-golden ">View More Collections</a></div>

  </div>
  <!-- <br> -->

  <!-- ------------------------contact Start-------------------------------- -->

  <div class="container5">
    <div data-aos-delay="100" data-aos="fade-up" class="cont5top">
      <h4>Need Help?</h4>
      <p>+91 73497 39580 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;+91 73497 39580</p>
    </div>
    <div style="background: white; width: 100%; height: 20px"></div>
    <div data-aos-delay="100" data-aos="fade-up" class="container my-5">
      <div class="row">
        <!-- Info Section -->
        <div class="col-lg-6">
          <div class="info-section contactSectionHeight">
            <h2 class="mb-4 golden_Text">Let's get in touch</h2>
            <p class="text-justify">Whether you have a question, need support, or just want to collaborate, we're here to help. Feel free to reach out to us through the contact details provided or by filling out the form. We look forward to hearing from you!</p>
            <p>#2-108/C-7, Ground Floor, Sri Mantame Complex, Near Soorya Infotech Park, Kurnadu Post, Mudipu Road, Bantwal- 574153</p>
            <p>Goldendream035@gmail.com</p>
            <p>+91 73497 39580</p>
            <h5>Connect with us:</h5>
            <div class="mt-2 socialBtns" title="Social Accounts" onclick="window.location.href='./socials.php'">
              <span class="social-icon"><i class="fa fa-whatsapp"></i> </span>
              <span class="social-icon"><i class="fa fa-instagram"></i> </span>
              <span class="social-icon"><i class="fa fa-twitter"></i> </span>
            </div>
          </div>
        </div>

        <!-- Contact Form Section -->
        <div class="col-lg-6">
          <div class="info-section contactSectionHeight">
            <h2 class="mb-4 golden_Text">Contact us</h2>
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

          ?>
        </div>


      </div>



    </div>
  </div>
  <!-- <br /> -->
  <!-- ------------------------Trending End-------------------------------- -->
  <!----------------------------------- Youtube video ---------------------------->
  <h1 data-aos-delay="100" data-aos="fade-up">Videos</span></h1>
  <div data-aos-delay="100" data-aos="fade-up" style="margin: 0px" class="UnderLine text-center">
    <p></p>
  </div>

  <?php

  $yt_sql = "SELECT yt_link FROM youtube_links ORDER BY created_at DESC LIMIT 3";
  $yt_result = $conn->query($yt_sql);

  if ($yt_result->num_rows > 0) {
    echo '
    <div class="container mt-2">
        <div class="row justify-content-center">';

    while ($yt_row = $yt_result->fetch_assoc()) {
      $yt_link = $yt_row["yt_link"];
      $videoID = null;

      if (strpos($yt_link, 'youtube.com') !== false) {
        parse_str(parse_url($yt_link, PHP_URL_QUERY), $params);
        $videoID = $params['v'] ?? null;
      } elseif (strpos($yt_link, 'youtu.be') !== false) {
        $videoID = basename(parse_url($yt_link, PHP_URL_PATH));
      }

      if ($videoID) {
        echo '
            <div class="col-md-4 mb-4">  <!-- Use col-md-4 for 3 videos per row on PC -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . htmlspecialchars($videoID) . '" allowfullscreen></iframe>
                </div>
            </div>';
      }
    }

    echo '
        </div> <!-- End of row -->
    </div> <!-- End of container -->
    ';
  } else {
    echo '<p class="text-center">No videos available right now.</p>';
  }

  ?>


  <!------------------ faqs start ----------------- -->
  <h1 data-aos-delay="100" data-aos="fade-up">FAQs</span></h1>
  <div data-aos-delay="100" data-aos="fade-up" style="margin: 0px" class="UnderLine text-center">
    <p></p>
  </div>
  <div class="container text-center">
    <div class="accordion" id="faqAccordion">
      <?php
      include('./adminFiles/config.php');

      // Query to fetch FAQs ordered by sort_order
      $faq_sql = "SELECT * FROM faqs ORDER BY sort_order ASC";
      $faq_result = $conn->query($faq_sql);

      if ($faq_result->num_rows > 0) {
        $count = 0;
        while ($faq = $faq_result->fetch_assoc()) {
          $count++;
      ?>
          <!-- FAQ Item -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading-<?php echo $count; ?>">
              <button class="accordion-button <?php echo $count !== 1 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse-<?php echo $count; ?>" aria-expanded="<?php echo $count === 1 ? 'true' : 'false'; ?>" aria-controls="faqCollapse-<?php echo $count; ?>">
                <?php echo htmlspecialchars($faq['question']); ?>
              </button>
            </h2>
            <div id="faqCollapse-<?php echo $count; ?>" class="accordion-collapse collapse <?php echo $count === 1 ? 'show' : ''; ?>" aria-labelledby="faqHeading-<?php echo $count; ?>" data-bs-parent="#faqAccordion">
              <div class="accordion-body" style="text-align: justify;">
                <?php echo htmlspecialchars($faq['answer']); ?>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo '<div class="container text-center"><p class="text-center">No FAQs available at the moment.</p></div>';
      }

      $conn->close();
      ?>
    </div>
  </div>





  <?php include('./footer.php'); ?>



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
  <!-- <script>
    const params = new URLSearchParams(window.location.search);

    const showValue = params.get('show');

    if (showValue !== null) {
      console.log(`The value of the 'show' parameter is: ${showValue}`);
    } else {
      window.location.href = "Maintenance.html";
    }
  </script> -->
  <!-- aos animation script  -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script>
    function closePopup() {
      document.getElementById('offerModal').style.display = "none"
    }
  </script>

  <!-- Loader functionality -->
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      setTimeout(() => {
        document.getElementById('loader').style.opacity = 0;
        setTimeout(() => document.getElementById('loader').style.display = 'none', 1000);
      }, 1500);
    });
  </script>
</body>

</html>
