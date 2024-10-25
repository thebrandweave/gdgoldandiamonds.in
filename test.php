<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testimonials - GD Gold & Diamonds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .carousel-item {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: transform 0.6s ease-in-out;
            position: relative; /* Ensure positioning for z-index */
            z-index: 1; /* Default z-index for inactive items */
        }

        .carousel-item.active {
            z-index: 2; /* Higher z-index for the active item */
        }

        .testimonial-card {
            width: 100%;
            max-width: 500px;
            margin: auto;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 20px;
        }

        .testimonial-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>

<div class=" py-5">
    <h1 class="text-center mb-5">Testimonials</h1>

    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
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
                    echo '<p>Rating: ' . htmlspecialchars($row['rating']) . ' stars</p>';
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

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
