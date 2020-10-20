<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user = $row["pa_name"];
    }
} else {
    header('location: login.php');
}
?>
<?php
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_GET['docv'];

$sql = "SELECT * FROM ward_asgn a, patient_data b, building c, ward d WHERE a.p_id = b.p_id && a.bld_id = c.bld_id && a.w_id = d.w_id && a.wasgn_id = '$id'";
$result = mysqli_query($con, $sql);

while ($rows = mysqli_fetch_assoc($result)) {

    $pid = $rows['p_id'];
    $fname = $rows['f_name'];
    $lname = $rows['l_name'];
    $bldName = $rows['bld_name'];
    $wNum = $rows['w_num'];
}

if (isset($_POST['btn_save'])) {
    $docName = $_POST['docName'];

    $sql = "SELECT * FROM visited a, doctor_data b WHERE a.doc_id = b.doc_id && a.doc_id = '$docName' && a.wasgn_id = '$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Error from here";
        while ($rows = mysqli_fetch_assoc($result)) {

            $dfName = $rows['f_name'];
            $dlName = $rows['l_name'];
            $count = $rows['vis_count'];
            $inc_count = ++$count;

            $sq = "UPDATE visited a SET `vis_count` = '$inc_count' WHERE doc_id = '$docName'";
            $ctn = mysqli_query($con, $sq);

            if ($ctn) {
                echo "Count Updated Successfully";
            } else {
                echo "Count Not Updated";
            }
        }
    } else {

        $sql = "INSERT INTO `visited`(`wasgn_id`, `doc_id`, `vis_count`) VALUES ('$id','$docName','1')";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "error occured";
        }
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
        }
    </style>
</head>

<body>
    <?php include("cmn_file/login_topnav_patient.php"); ?>
    <div class="route my-3">
        <div class="container">
            <div class="row">
                <h7>Home</h7>
                <i class="fas fa-arrow-right"></i>
                <h7>Patient admin</h7>
            </div>
        </div>
    </div>
    <section class="doc_vsec container mb-3">
        <div class="row top-row">
            <div class="col-md-10 m-auto">
                <form method="POST">
                    <div class="row my-2">
                        <div class="form-group col-md-2 m-auto">
                            <label for="patientid">Patient id</label>
                            <input type="text" name="pg_id" class="form-control" value="<?php echo $pid; ?>" readonly>
                        </div>
                        <div class="form-group col-md-5 m-auto">
                            <label for="fname">First name</label>
                            <input type="text" name="pg_fname" class="form-control" value="<?php echo $fname; ?>" readonly>
                        </div>
                        <div class="form-group col-md-5 m-auto">
                            <label for="lname">Last name</label>
                            <input type="text" name="pg_lname" class="form-control" value="<?php echo $lname; ?>" readonly>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="form-group col-md-6 m-auto">
                            <label for="building">Building</label>
                            <input type="text" name="pg_building" class="form-control" value="<?php echo $bldName; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6 m-auto">
                            <label for="ward">Ward</label>
                            <input type="text" name="pg_ward" class="form-control" value="<?php echo $wNum; ?>" readonly>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="form-group col-md-6 m-auto">
                            <label for="spec">Specialization</label>
                            <select class="form-control" name="spec" id="spec">
                                <option></option>
                                <?php
                                include "connect.php";
                                $sql = "SELECT * FROM d_specl ";
                                $cnt = mysqli_query($con, $sql);

                                if ($cnt) {

                                    while ($row = mysqli_fetch_assoc($cnt)) { ?>

                                        <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name'] ?></option>
                                <?php    }
                                } else {
                                    echo $con->error;
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 m-auto">
                            <label for="doctor">Doctor</label>
                            <select name='docName' id='docName' class='form-control'></select>
                        </div>
                    </div>
                    <input type="submit" name="btn_save" class="docvisbtn mt-3" value="Save">
                </form>
            </div>
        </div>


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