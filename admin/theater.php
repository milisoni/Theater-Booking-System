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
    <title>Theaters</title>
</head>

<body>


    <?php include('header.php') ?>

    <?php

    if (isset($_GET['editid'])) {

        $editid = $_GET['editid'];
        $sql = "SELECT * FROM `theaterlist` WHERE theaterid= '$editid'";
        $res = mysqli_query($conn, $sql);

        $editdata = mysqli_fetch_array($res);

        ?>
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <form action="theater.php" method="post">

                        <div class="form-group mb-4">
                            <input type="hidden" class="form-control" value="<?= $editdata['theaterid'] ?>" name="theaterid">
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="theatername" value="<?= $editdata['theatername'] ?>"
                                placeholder="Enter Theater Name">
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" name="theateraddr" value="<?= $editdata['theateraddr'] ?>"
                                placeholder="Enter Theater Location">
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
                                <form action="theater.php" method="post">

                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="theatername" id="theatername" value=""
                                            placeholder="Enter Theater Name">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="theateraddr" id="theateraddr" value=""
                                            placeholder="Enter Theater Location">
                                    </div>
                                    
                                    <div class="form-group ">
                                        <input type="submit" class="btn btn-primary" value="Add" name="add" id="addButton">

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
                                    <th>Theater Name</th>
                                    <th>Location</th>
                                </tr>

                                <?php
                                $sql = "SELECT * FROM `theaterlist`";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($data = mysqli_fetch_array($res)) {

                                        ?>

                                        <tr>
                                            <td><?= $data['theaterid'] ?></td>
                                            <td><?= $data['theatername'] ?></td>
                                            <td><?= $data['theateraddr'] ?></td>
                                            <td>
                                                <a href="theater.php?editid=<?= $data['theaterid'] ?>" class="btn btn-primary">
                                                    Edit</a>
                                                <a href="theater.php?deleteid=<?= $data['theaterid'] ?>" class="btn btn-danger">
                                                    Delete</a>
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                } else {
                                    echo 'No theaters found';
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

    $name = $_POST['theatername'];
    $loc = $_POST['theateraddr'];
    $sql = "INSERT INTO `theaterlist`( `theatername`,`theateraddr`) VALUES ('$name','$loc')";

    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='theater.php' </script>";
    } else {
        echo "<script> alert('Theater not added')</script>";
    }

}

if (isset($_POST['update'])) {
    $theaterid = $_POST['theaterid'];
    $name = $_POST['theatername'];
    $loc = $_POST['theateraddr'];


    $sql = "UPDATE `theaterlist` SET `theatername`='$name',`theateraddr`='$loc' WHERE  theaterid = '$theaterid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='theater.php' </script>";
    } else {
        echo "<script> alert('Theater not updated')</script>";
    }

}


if (isset($_GET['deleteid'])) {

    $deleteid = $_GET['deleteid'];
    $sql = "DELETE FROM `theaterlist` WHERE theaterid = '$deleteid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script> window.location.href='theater.php' </script>";
    } else {
        echo "<script> alert('Theater not deleted')</script>";
    }

}

?>