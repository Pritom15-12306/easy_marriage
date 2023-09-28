<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="container">
  <?php
  $files = array();
  $packages = $conn->query("SELECT * FROM `packages` order by rand() ");
  while ($row = $packages->fetch_assoc()) {
    if (!is_dir(base_app . 'uploads/package_' . $row['id']))
      continue;
    $fopen = scandir(base_app . 'uploads/package_' . $row['id']);
    foreach ($fopen as $fname) {
      if (in_array($fname, array('.', '..')))
        continue;
      $files[] = validate_image('uploads/package_' . $row['id'] . '/' . $fname);
    }
  }
  ?>
  <!-- <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner h-100">
          <?php foreach ($files as $k => $img) : ?>
          <div class="carousel-item  h-100 <?php echo $k == 0 ? 'active' : '' ?>">
              <img class="d-block w-100  h-100" src="<?php echo $img ?>" alt="">
          </div>
          <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div> -->

  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">


        <div class="info-box-content" style="background-image: linear-gradient(to right, #00048b , #0084b7); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">TOTAL PRODUCTS</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;">
            <?php echo $conn->query("SELECT * FROM items")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right bottom, #07e182, #00e5a3, #00e8c0, #00ead8, #12ebeb); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">TOTAL PACKAGE</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;">
            <?php echo $conn->query("SELECT * FROM packages")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right top, #d48d4b, #b4ac57, #90c382, #75d4b9, #7bdfe9); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">TOTAL BLOG</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;">
            <?php echo $conn->query("SELECT * FROM blog")->num_rows; ?>
          </span>
        </div>
      </div>
    </div>

    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right, #376405 , #09dd4a); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">PACKAGE BOOKED</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;"><?php echo $conn->query("SELECT * FROM book_list")->num_rows; ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right, #370c7c , #a900ff); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">TOTAL SERVICES</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;"><?php echo $conn->query("SELECT * FROM services")->num_rows; ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right, #6a0000 , #d90000); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">SERVICE BOOKED</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;"><?php echo $conn->query("SELECT * FROM services_book")->num_rows; ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right, #645300 , #ffd400); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">TOTAL USERS</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;"><?php echo $conn->query("SELECT * FROM users")->num_rows; ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right, #004c49 , #00fff5); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">QUERY</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;"><?php echo $conn->query("SELECT * FROM inquiry")->num_rows; ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content" style="background-image: linear-gradient(to right, #004c49 , #6a0000); border-radius: 11px;">
          <span class="info-box-text" style="font-size:24px; text-align:center; color:#fff;">CLIENT'S REVIEW</span>
          <span class="info-box-number" style="font-size:24px; text-align:center; color:#fff;"><?php echo $conn->query("SELECT * FROM user_feedback")->num_rows; ?></span>
        </div>
      </div>
    </div>


    <style>
      .info-box {
        height: 180px;
      }
    </style>