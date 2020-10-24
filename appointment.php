<?php session_start();
include('connect.php');

$sql = "SELECT * FROM a_doctor where dadmin_id='" . $_SESSION["da_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user = $row["da_name"];
    }
} else {
    header('location: login.php');
}
?>

<?php

include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$msg = "";
if (isset($_POST['saveApnt'])) {

    $date = $_POST['apnt_data'];
    $name = $_POST['apnt_name'];
    $cont = $_POST['apnt_cont'];
    $specl = $_POST['spec'];
    $d_name = $_POST['docName'];
    $time = $_POST['apnt_time'];

    $sql = "INSERT INTO `appointment`(`dadmin_id`, `p_name`, `contact`, `s_id`, `doc_id`, `apnt_date`, `apnt_time`) VALUES ('" . $_SESSION['da_session'] . "','$name','$cont','$specl','$d_name','$date','$time')";
    $ctn = mysqli_query($con, $sql);

    if ($ctn) {
        $msg = "<p class='success_para'>Data inserted</p>";
    } else {
        $msg = "<p class='success_para'>Error occured</p>";
    }
}

?>
<!DOCTYPE html>
<html>

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
    <?php include("cmn_file/login_topnav_doctor.php"); ?>

    <!-- laptop -->

    <div class="laptop">
        <div class="route my-3">
            <div class="container">
                <div class="row">
                    <h7>Home</h7>
                    <i class="fas fa-arrow-right"></i>
                    <h7>Doctor admin</h7>
                    <i class="fas fa-arrow-right"></i>
                    <h7>Add appointment</h7>
                </div>
            </div>
        </div>
        <section class="appont_sec container">
            <div class="row top-row">
                <div class="col-md-8 m-auto">
                    <form method="POST">
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="date">Date</label>
                                <input type="date" name="apnt_data" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 m-auto">
                                <label for="name">Name</label>
                                <input type="text" name="apnt_name" class="form-control">
                            </div>
                            <div class="form-group col-md-6 m-auto">
                                <label for="contact">Conatct</label>
                                <input type="number" name="apnt_cont" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 m-auto">
                                <label for="spec">Specialization</label>
                                <select class="form-control" name="spec" id="spec">
                                    <option></option>
                                    <?php
                                    include "connect.php";
                                    $sql = "SELECT * FROM d_specl ";
                                    $cnt = mysqli_query($con, $sql);

                                    if ($cnt) {
                                        while ($row = mysqli_fetch_assoc($cnt)) {
                                            echo "<option value=" . $row['s_id'] . ">" . $row['s_name'] . "</option>";
                                        }
                                    } else {
                                        echo $con->error;
                                    } ?>

                                </select>
                            </div>
                            <div class="form-group col-md-4 m-auto">
                                <label for="doctor">Doctor</label>
                                <select name='docName' id='docName' class='form-control'></select>
                            </div>
                            <div class="form-group col-md-4 m-auto">
                                <label for="time">Time</label>
                                <input type="time" name="apnt_time" class="form-control">
                            </div>
                        </div>
                        <input type="submit" name="saveApnt" value="Save" class="btn_submit mt-3">
                    </form>
                </div>
            </div>
            <?php echo $msg; ?>
        </section>
    </div>

    <!-- tab -->

    <div class="tab">
        <div class="route my-3">
            <div class="container">
                <div class="row">
                    <a href="">
                        <h7>Home</h7>
                    </a>
                    <i class="fas fa-arrow-right"></i>
                    <a href="">
                        <h7>Doctor admin</h7>
                    </a>
                    <i class="fas fa-arrow-right"></i>
                    <a href="">
                        <h7>Add appointment</h7>
                    </a>
                </div>
            </div>
        </div>
        <section class="appont_sec container">
            <div class="row top-row">
                <div class="col-md-10 m-auto">
                    <form method="POST">
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="date">Date</label>
                                <input type="date" name="apnt_data" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 m-auto">
                                <label for="name">Name</label>
                                <input type="text" name="apnt_name" class="form-control">
                            </div>
                            <div class="form-group col-md-6 m-auto">
                                <label for="contact">Conatct</label>
                                <input type="number" name="apnt_cont" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 m-auto">
                                <label for="spec">Specialization</label>
                                <select class="form-control" name="spec" id="spec">
                                    <option></option>
                                    <?php
                                    include "connect.php";
                                    $sql = "SELECT * FROM d_specl ";
                                    $cnt = mysqli_query($con, $sql);

                                    if ($cnt) {
                                        while ($row = mysqli_fetch_assoc($cnt)) {
                                            echo "<option value=" . $row['s_id'] . ">" . $row['s_name'] . "</option>";
                                        }
                                    } else {
                                        echo $con->error;
                                    } ?>

                                </select>
                            </div>
                            <div class="form-group col-md-4 m-auto">
                                <label for="doctor">Doctor</label>
                                <select name='docName' id='docName' class='form-control'></select>
                            </div>
                            <div class="form-group col-md-4 m-auto">
                                <label for="time">Time</label>
                                <input type="time" name="apnt_time" class="form-control">
                            </div>
                        </div>
                        <input type="submit" name="saveApnt" value="Save" class="btn_submit mt-3">
                    </form>
                </div>
            </div>
            <?php echo $msg; ?>
        </section>
    </div>

    <!-- mobile -->

    <div class="mobile">
        <div class="route my-3 mx-3">
            <div class="container">
                <div class="row">
                    <a href="">
                        <h7>Home</h7>
                    </a>
                    <i class="fas fa-arrow-right"></i>
                    <a href="">
                        <h7>Doctor admin</h7>
                    </a>
                    <i class="fas fa-arrow-right"></i>
                    <a href="">
                        <h7>Add appointment</h7>
                    </a>
                </div>
            </div>
        </div>
        <section class="form-sec container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <form method="POST">
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="date">Date</label>
                                <input type="date" name="apnt_data" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 m-auto">
                                <label for="name">Name</label>
                                <input type="text" name="apnt_name" class="form-control">
                            </div>
                            <div class="form-group col-md-6 m-auto">
                                <label for="contact">Conatct</label>
                                <input type="number" name="apnt_cont" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 m-auto">
                                <label for="spec">Specialization</label>
                                <select class="form-control" name="spec" id="spec">
                                    <option></option>
                                    <?php
                                    include "connect.php";
                                    $sql = "SELECT * FROM d_specl ";
                                    $cnt = mysqli_query($con, $sql);

                                    if ($cnt) {
                                        while ($row = mysqli_fetch_assoc($cnt)) {
                                            echo "<option value=" . $row['s_id'] . ">" . $row['s_name'] . "</option>";
                                        }
                                    } else {
                                        echo $con->error;
                                    } ?>

                                </select>
                            </div>
                            <div class="form-group col-md-4 m-auto">
                                <label for="doctor">Doctor</label>
                                <select name='docName' id='docName' class='form-control'></select>
                            </div>
                            <div class="form-group col-md-4 m-auto">
                                <label for="time">Time</label>
                                <input type="time" name="apnt_time" class="form-control">
                            </div>
                        </div>
                        <input type="submit" name="saveApnt" value="Save" class="btn_submit mt-3">
                    </form>
                </div>
            </div>
            <?php echo $msg; ?>
        </section>
    </div>

    <script src="js/jquery-1.8.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#spec').change(function() {

                var s_id = $('#spec').val();

                $('#docName').empty(); //remove all existing options

                $.get('ddck.php', {
                    's_id': s_id
                }, function(return_data) {
                    if (return_data.data.length > 0) {
                        $('#msg').html('');
                        $.each(return_data.data, function(key, value) {
                            $("#docName").append("<option value='" + value.doc_id + "'>" + value.f_name + ' ' + value.l_name + "</option>");
                        });
                    } else {
                        $('#msg').html('Doctor Missing');
                    }
                }, "json");

            });

        });
    </script>
</body>

</html>