<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user = $row["pa_name"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sanjivini Hospital-MeetDoctor</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cmn_file/nav-style.css">
    <style>
        body {
            background: url(image/dashboard_background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100%;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <?php include("cmn_file/login_topnav_patient.php"); ?>
    <div class="route my-3">
        <div class="container">
            <div class="row">
                <a href="">
                    <h7>Home</h7>
                </a>
                <i class="fas fa-arrow-right"></i>
                <a href="">
                    <h7>Patient admin</h7>
                </a>
                <i class="fas fa-arrow-right"></i>
                <a href="">
                    <h7>Patient list</h7>
                </a>
            </div>
        </div>
    </div>
    <section class="search_block container">
        <form method="POST">
            <div class="form-group search row">
                <input type="text" name="id" placeholder="Patient Id or Name" class="form-control" value="">
                <input type="submit" name="search" value="search" class="btn_search ml-3">
            </div>
        </form>
    </section>
    <section class="vpdata_sec container mb-3">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form method="POST">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sl.No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Blood</th>
                                <th>Age</th>
                                <th>Date</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('connect.php');
                            $i = 1;

                            if (!empty($fname)) {

                                $sql = mysqli_query($con, "SELECT * FROM `bill` WHERE `fname` LIKE '%$fname%'") or die(mysqli_error($con));

                                while ($rows = mysqli_fetch_array($sql)) {
                            ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $rows['fname'] ?></td>
                                        <td><?php echo $rows['lname'] ?></td>
                                        <td><?php echo $rows['blood'] ?></td>
                                        <td><?php echo $rows['age'] ?></td>
                                        <td><?php echo $rows['date'] ?></td>
                                        <td><?php echo $rows['total'] ?></td>
                                    </tr>
                                <?php     }
                            } else {
                                $sql = mysqli_query($con, "SELECT * FROM `bill`") or die(mysqli_error($con));

                                while ($rows = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $rows['fname'] ?></td>
                                        <td><?php echo $rows['lname'] ?></td>
                                        <td><?php echo $rows['blood'] ?></td>
                                        <td><?php echo $rows['age'] ?></td>
                                        <td><?php echo $rows['date'] ?></td>
                                        <td><?php echo $rows['total'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </section>
</body>

</html>