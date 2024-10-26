<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
      <h2 class="text-center mb-4">Frequently Asked Questions</h2>
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
                          <div class="accordion-body">
                              <?php echo htmlspecialchars($faq['answer']); ?>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          } else {
              echo "<p>No FAQs available at the moment.</p>";
          }

          $conn->close();
        ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
