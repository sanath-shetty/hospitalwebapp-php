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
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="appointment.css">
</head>

<body>
    <div class="container">
        <?php include("cmn_file/login_topnav_doctor.php"); ?>
        <section class="appont_sec">
            <p class="appont_head">Book Appointment</p>

            <form action="" method="POST">

                <div>
                    <input type="date" name="apnt_data" class="inp_date">
                </div>

                <div style="margin-top: 1%">
                    <input type="text" name="apnt_name" placeholder="Name" class="inp_name">

                    <input type="number" name="apnt_cont" placeholder="Contact" class="inp_cont">
                </div>

                <div style="margin-top: 1%">
                    <select class="sel_cdoc" name="spec" id="spec">
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
                        }

                        echo "</select>

                <select name='docName' id='docName' class='sel_cdoc1'></select>
                ";
                        ?>
                        <span style="color: red;" id=msg> &nbsp;</span>

                        <input type="time" name="apnt_time" class="inp_time">
                </div>

                <div align="center">
                    <input type="submit" name="saveApnt" value="Save" class="btn_sappoint">
                </div>

            </form>
            <?php echo $msg; ?>
        </section>
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