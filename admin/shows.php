<?php
include('../connect.php');

if (!isset($_SESSION['uid'])) {
    echo "<script> window.location.href='../login.php';  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theater</title>
</head>

<body>


    <?php include('header.php') ?>


    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <form action="shows.php" method="post">

                    <div class="form-group mb-4">

                        <select name="theatername" class="form-control">
                            <option value="">Select Theater</option>

                            <?php
                            $sql = "SELECT * FROM `theaterlist`";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($data = mysqli_fetch_array($res)) {

                                    ?>
                                    <option value="<?= $data['theatername'] ?>"> <?= $data['theatername'] ?> </option> <?php

                                }

                            } else {
                                ?>
                                <option value="">No Shows found</option> <?php
                            }
                            ?>



                        </select>
                    </div>

                    <div class="form-group mb-4">

                        <select name="movieid" class="form-control">
                            <option value="">Select Movie</option>

                            <?php
                            $sql = "SELECT * FROM `movies`";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($data = mysqli_fetch_array($res)) {

                                    ?>
                                    <option value="<?= $data['movieid'] ?>"> <?= $data['title'] ?> </option> <?php

                                }

                            } else {
                                ?>
                                <option value="">No Movies found</option> <?php
                            }
                            ?>



                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <input type="time" class="form-control" name="timing" value="">
                    </div>

                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="days" value="" placeholder="enter days">
                    </div>

                    <div class="form-group mb-4">
                        <input type="date" class="form-control" name="date" value="">
                    </div>

                    <div class="form-group mb-4">
                        <input type="number" class="form-control" name="price" value="" placeholder="enter price">
                    </div>

                    <div class="form-group mb-4">

                        <select name="theateraddr" class="form-control">
                            <option value="">Location</option>

                            <?php
                            $sql = "SELECT * FROM `theaterlist`";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($data = mysqli_fetch_array($res)) {

                                    ?>
                                    <option value="<?= $data['theateraddr'] ?>"> <?= $data['theateraddr'] ?> </option> <?php

                                }

                            } else {
                                ?>
                                <option value="">No Locations found</option> <?php
                            }
                            ?>



                        </select>
                    </div>

                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" value="Add Show" name="add">

                    </div>


                </form>


            </div>
            <div class="col-lg-6">

                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Theater</th>
                        <th>Movie</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Days/Time</th>
                        <th>Ticket</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $sql = "SELECT theater.*, movies.title, categories.catname
      from theater
      inner join movies on movies.movieid = theater.movieid
      inner join categories on categories.catid = movies.catid";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($data = mysqli_fetch_array($res)) {

                            ?>

                            <tr>
                                <td><?= $data['theaterid'] ?></td>
                                <td><?= $data['theater_name'] ?></td>
                                <td><?= $data['title'] ?></td>
                                <td><?= $data['catname'] ?></td>
                                <td><?= $data['date'] ?></td>
                                <td><?= $data['days'] ?> - <?= $data['timing'] ?></td>
                                <td><?= $data['price'] ?></td>
                                <td><?= $data['location'] ?></td>

                                <td>
                                    <!-- <a href="theater.php?editid=<?= $data['theaterid'] ?>" class="btn btn-primary"> Edit</a> -->
                                    <a href="shows.php?deleteid=<?= $data['theaterid'] ?>" class="btn btn-danger"> Delete</a>
                                </td>
                            </tr>


                            <?php
                        }
                    } else {
                        echo 'no Theaters found';
                    }


                    ?>


                </table>

            </div>
        </div>


    </div>


    <?php include('footer.php') ?>

</body>

</html>

<?php
if (isset($_POST['add'])) {

    $movieid = $_POST['movieid'];
    $theater_name = $_POST['theatername'];
    $days = $_POST['days'];
    $timing = $_POST['timing'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $location = $_POST['theateraddr'];


    $sql = "INSERT INTO `theater`(`theater_name`,`timing`, `days`, `date`, `price`, `location`, `movieid`) VALUES ('$theater_name','$timing','$days','$date','$price','$location','$movieid')";

    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='shows.php' </script>";
    } else {
        echo "<script> alert('Error adding theater: " . mysqli_error($conn) . "')</script>";
    }

}

?>

<?php
if (isset($_GET['deleteid'])) {
    $theaterid = $_GET['deleteid'];

    // Make sure to prepare the statement to prevent SQL injection
    $sql = "DELETE FROM `theater` WHERE `theaterid` = '$theaterid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Theater deleted successfully')</script>";
        echo "<script> window.location.href='shows.php' </script>";
    } else {
        echo "<script> alert('Error deleting movie: " . mysqli_error($conn) . "')</script>";
    }
}
?>