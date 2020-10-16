<?php
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['id'])) {
    $fname = $_POST['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="vpatientdetail.css">
</head>

<body>
    <div class="container">
        <?php include("cmn_file/login_topnav_patient.php"); ?>
        <section class="search_block">
            <form action="" method="POST">
                <div class="search_sec">
                    <input type="text" name="id" placeholder="Patient Id or Name" class="inp_search" value="">
                    <input type="submit" name="search" value="search" class="btn_search">
                </div>
            </form>
        </section>
        <section class="vpdata_sec">
            <p class="vpdate_head">View Patient Data</p>
            <form action="" method="POST">
                <table class="tb_vpdata">
                    <tr>
                        <th>Sl.No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Blood</th>
                        <th>Age</th>
                        <th>Date</th>
                        <th>Total</th>
                    </tr>
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

                </table>
            </form>
        </section>
    </div>
</body>

</html>