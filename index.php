<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="indexstyle.css">
  <title>Home Page</title>
</head>

<body>
  <?php include('connect.php') ?>
  <?php include('header.php') ?>

  <section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
      <h2>Movies</h2>
      <p><span>Check &nbsp;</span> <span class="description-title">Latest Movies</span></p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
        <form action="index.php" method="post">

          <div class="row">

            <div class="col-lg-3 col-md-6 d-flex">
              <div class="form-group">
                <input type="text" class="form-control" name="movie_search" placeholder="Search Movie Name">
              </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex">
              <div class="form-group">
                <select name="catid" class="form-control">
                  <option value="">Select Category</option>
                  <?php
                  $sql = "SELECT * FROM `categories`";
                  $res = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($res) > 0) {
                    while ($data = mysqli_fetch_array($res)) {

                      ?>
                      <option value="<?= $data['catid'] ?>"> <?= $data['catname'] ?> </option> <?php

                    }

                  } else {
                    ?>
                    <option value="">No Category found</option> <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-lg-1 col-md-6 d-flex">
              <div class="form-group">
                <input type="submit" name="btnSearch" value="Search" class="btn btn-primary">
              </div>
            </div>

          </div>
        </form>

        <div class="row mt-5">
          <?php


          if (isset($_POST['btnSearch'])) {

            $movie_search = $_POST['movie_search'];
            $catid = $_POST['catid'];

            $sql = "SELECT movies.*, categories.catname
              from movies
              inner join categories on categories.catid = movies.catid
              where movies.title LIKE '%$movie_search%' and movies.catid = '$catid'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
              while ($data = mysqli_fetch_array($res)) {

                ?>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up"
                  data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="admin/uploads/<?= $data['image'] ?>" style="height:250px !important; width:250px !important;"
                        alt="">
                      <div class="social">
                        <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank" class="btn btn-primary"
                          style="width:150px;">Watch Trailer</a>

                      </div>
                    </div>
                    <div class="member-info">
                      <h4><?= $data['title'] ?></h4>
                      <span><?= $data['catname'] ?></span>
                    </div>
                  </div>
                </div>



                <?php

              }
            }


          } else {





            $sql = "SELECT movies.*, categories.catname
                                from movies
                                inner join categories on categories.catid = movies.catid
                                order by movies.movieid DESC";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
              while ($data = mysqli_fetch_array($res)) {

                ?>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up"
                  data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="admin/uploads/<?= $data['image'] ?>" style="height:250px !important; width:250px !important;"
                        alt="">
                      <div class="social">
                        <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank" class="btn btn-primary"
                          style="width:150px;">Watch Trailer</a>

                      </div>
                    </div>
                    <div class="member-info">
                      <h4><?= $data['title'] ?></h4>
                      <span><?= $data['catname'] ?></span>
                    </div>
                  </div>
                </div>

                <?php
              }
            }

          }



          ?>

        </div>

      </div>
    </div>

    </div>

  </section>

  <?php include('footer.php') ?>
</body>

</html>