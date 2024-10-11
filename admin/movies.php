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
    <title>Movies</title>
</head>

<body>
    <?php include('header.php') ?>

    <?php

    if (isset($_GET['editid'])) {

        $editid = $_GET['editid'];
        $sql = "SELECT movies.*, categories.catname
        from movies
        inner join categories on categories.catid = movies.catid";
        $res = mysqli_query($conn, $sql);
        $editdata = mysqli_fetch_array($res);

        ?>

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <form action="movies.php" method="post" enctype="multipart/form-data">

                        <div class="form-group mb-4">

                            <select name="catid" class="form-control">
                                <option value="<?= $editdata['catname'] ?>">Select Category</option>

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

                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="title" value="<?= $editdata['title'] ?>"
                                placeholder="enter title">
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="description"
                                value="<?= $editdata['description'] ?>" placeholder="enter description">
                        </div>

                        <div class="form-group mb-4">
                            <input type="date" class="form-control" name="releasedate"
                                value="<?= $editdata['releasedate'] ?>">
                        </div>

                        <div class="form-group mb-4">
                            Poster:
                            <input type="file" class="form-control" name="image" value="">
                        </div>

                        <div class="form-group mb-4">
                            Trailer:
                            <input type="file" class="form-control" name="trailer" value="">
                        </div>

                        <div class="form-group ">
                            <input type="submit" class="btn btn-info" value="Update" name="update">

                        </div>


                    </form>
                    <?php
    } else {
        ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="movies.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group mb-4">

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

                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="title" value=""
                                            placeholder="enter title">
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="description" value=""
                                            placeholder="enter description">
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="date" class="form-control" name="releasedate" value="">
                                    </div>

                                    <div class="form-group mb-4">
                                        Poster:
                                        <input type="file" class="form-control" name="image" value="">
                                    </div>

                                    <div class="form-group mb-4">
                                        Trailer:
                                        <input type="file" class="form-control" name="trailer" value="">
                                    </div>

                                    <div class="form-group ">
                                        <input type="submit" class="btn btn-primary" value="Add" name="add">

                                    </div>


                                </form>


                                <?php
    }
    ?>
                        </div>

                        <div class="col-lg-6">

                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Poster</th>
                                    <th>Action</th>
                                </tr>

                                <?php
                                $sql = "SELECT movies.*, categories.catname
      from movies
      inner join categories on categories.catid = movies.catid";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($data = mysqli_fetch_array($res)) {

                                        ?>

                                        <tr>
                                            <td><?= $data['movieid'] ?></td>
                                            <td><?= $data['title'] ?></td>
                                            <td><?= $data['catname'] ?></td>

                                            <td> <img src="uploads/<?= $data['image'] ?>" heigt="50" width="50" alt=""> </td>
                                            <td>
                                                <!-- <a href="movies.php?editid=<?= $data['movieid'] ?>" class="btn btn-primary">
                                                    Edit</a> -->
                                                <a href="movies.php?deleteid=<?= $data['movieid'] ?>" class="btn btn-danger">
                                                    Delete</a>
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                } else {
                                    echo 'No categories found';
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

    $catid = $_POST['catid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $releasedate = $_POST['releasedate'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    $trailer = $_FILES['trailer']['name'];
    $tmp_trailer = $_FILES['trailer']['tmp_name'];



    move_uploaded_file($tmp_image, "uploads/$image");

    move_uploaded_file($tmp_trailer, "uploads/$trailer");


    $sql = "INSERT INTO `movies`(`title`, `description`, `releasedate`, `image`, `trailer`,  `catid`) 
  VALUES ('$title','$description','$releasedate','$image','$trailer','$catid')";

    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('movies added')</script>";
        echo "<script> window.location.href='movies.php' </script>";
    } else {
        echo "<script> alert('movies not added')</script>";
    }

}

if (isset($_POST['update'])) {
    $movieid = $_POST['movieid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $releasedate = $_POST['releasedate'];


    $sql = "UPDATE `movies` SET `title`='$title',`description`='$description',`releasedate`='$releasedate' WHERE `movieid` = '$movieid'";

    if (mysqli_query($conn, $sql)) {
        echo '<script> window.location.href="movies.php" </script>';
    } else {
        echo "<script> alert('movies not added')</script>";
    }

}

if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $sql = "DELETE FROM `movies` WHERE movieid = '$deleteid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='movies.php' </script>";
    } else {
        echo "<script> alert('Movie not deleted')</script>";
    }
}

?>