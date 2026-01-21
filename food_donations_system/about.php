<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="\css\bootstrap.min.css">
    <link rel="stylesheet" href="mycss/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"></head>
    <style>
    /* Custom styles for the carousel */
    .carousel-item {
      max-height: 600px; /* Set a maximum height for the carousel items */
      overflow: hidden; /* Hide any overflow if images are too tall */
    }
    .carousel-item img {
      width: 100%; /* Ensure image fills the width */
      height: auto; /* Maintain aspect ratio */
      object-fit: contain; /* This is crucial: scales the image nicely without cropping */
      /* Other options for object-fit:
         - cover: Fills the entire space, potentially cropping parts of the image.
         - fill: Stretches/squishes the image to fill the space.
         - scale-down: Behaves like 'none' or 'contain', whichever results in a smaller concrete object size.
      */
      max-height: 600px; /* Match the max-height of carousel-item */
    }
    .carousel-caption {
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for readability */
      padding: 15px;
      border-radius: 5px;
    }
  </style>
<body>
  <?php include 'navbar.php'; ?>
  
  <div class="container mt-5">
  <h2 class="text-center mb-4">Our Food Waste Management System in Action</h2>
  <div id="foodWasteCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#foodWasteCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#foodWasteCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#foodWasteCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#foodWasteCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#foodWasteCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>

    </div>

    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="img/main.png" class="d-block w-100" alt="Help Reduce Food Waste">
        <div class="carousel-caption d-none d-md-block">
        <h2>Help Reduce Food Waste</h2>
        </div>
      </div>

      <div class="carousel-item ">
        <img src="img/img5.png" class="d-block w-100" alt="Hotel Staff Packaging Food">
        <div class="carousel-caption d-none d-md-block">
          <h5>Step 1: Hotel Harvest & Packaging</h5>
          <p>Our partner hotels meticulously pack surplus, high-quality food, ensuring it's ready for donation.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="img/img4.png" class="d-block w-100" alt="NGO Collecting Food from Hotel">
        <div class="carousel-caption d-none d-md-block">
          <h5>Step 2: Efficient NGO Collection</h5>
          <p>Our dedicated NGO partners swiftly collect the packaged meals, minimizing transit time and maintaining freshness.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="img/img6.png" class="d-block w-100" alt="NGO Distributing Food">
        <div class="carousel-caption d-none d-md-block">
          <h5>Step 3: Nourishing Communities</h5>
          <p>The collected food is distributed to those in need, providing warm, nutritious meals and fighting hunger.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="img/img7.png" class="d-block w-100" alt="People Enjoying Donated Food">
        <div class="carousel-caption d-none d-md-block">
          <h5>The Impact: A Meal, A Smile</h5>
          <p>Witnessing the positive impact of redirected food, bringing joy and sustenance to individuals and families.</p>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#foodWasteCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#foodWasteCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>



<div class="main-content">
<section class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-4 ">About Us</h2>
        <p class="lead text-center">
          The Food Waste Management System connects donors, NGOs, and
          communities to minimize food waste and fight hunger.
        </p>
        <div class="row mt-5">
          <div class="col-md-4">
            <div class="card shadow-sm p-3 role-box">
              <h5 class="fw-bold">🌍 Our Mission</h5>
              <p>Reduce food waste and ensure surplus food reaches those in need.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm p-3 role-box">
              <h5 class="fw-bold">🤝 Our Vision</h5>
              <p>Build a hunger-free community with the help of donors and NGOs.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm p-3 role-box">
              <h5 class="fw-bold">💡 What We Do</h5>
              <p>We create a bridge between donors and receivers for effective food distribution.</p>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
    <?php include 'footer.php'; ?>
</body>
</html>