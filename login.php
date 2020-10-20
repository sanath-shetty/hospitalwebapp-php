<?php
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$failed = "";

if (isset($_POST["submit"])) {

    $a_type = $_POST["s_type"];
    $a_user = $_POST["uname"];
    $password = $_POST["upswd"];

    if ($a_type == 'admin') {
        $sql = "SELECT * FROM admin where a_name='$a_user' && a_pswd='$password'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION["aid_session"] = $row["a_id"];
                header('location: dashboard.php');
            }
        } else {
            $failed = "<div class='warndiv'>
            <p class='warnlogin'><i class='fas fa-skull-crossbones'></i>Invalid</p>
            </div>";
            header('location: login.php');
        }
        $con->close();
    } else {
        $failed = "<div class='warndiv'>
            <p class='warnlogin'><i class='fas fa-skull-crossbones'></i>Invalid</p>
            </div>";
    }

    if ($a_type == 'patient') {
        $sql = "SELECT * FROM a_patient where pa_name='$a_user' && pa_pswd='$password'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION["pa_session"] = $row["padmin_id"];
                header('location: dashboard_patientadmin.php');
            }
        } else {
            $failed = "<p class='type_head'>Invalid Username/Password</p>";
        }
        $con->close();
    } else {
        $failed = "<p class='type_head'>Select Valid Type</p>";
    }

    if ($a_type == 'doctor') {
        $sql = "SELECT * FROM a_doctor where da_name='$a_user' && da_pswd='$password'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION["da_session"] = $row["dadmin_id"];
                header('location: dashboard_doctoradmin.php');
            }
        } else {
            $failed = "<p class='type_head'>Invalid Username/Password</p>";
        }
        $con->close();
    } else {
        $failed = "<p class='type_head'>Select Valid Type</p>";
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
</head>

<body>
    <?php include("cmn_file/login_navbar.php"); ?>
    <div class="route my-3">
        <div class="container">
            <div class="row">
                <h7>Home</h7>
                <i class="fas fa-arrow-right"></i>
                <h7>Login</h7>
            </div>
        </div>
    </div>
    <section class="loginsec">
        <div class="row">
            <div class="col-md-4 m-auto">
                <h3 class="login_head my-3">Login Interface</h3>
                <form method="POST">
                    <div class="form-group">
                        <label for="usertype">User Type</label>
                        <select name="s_type" class="form-control">
                            <option>Select Type</option>
                            <option value="admin">Main Admin</option>
                            <option value="patient">Patient</option>
                            <option value="doctor">Doctor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="uname" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="upswd" class="form-control">
                    </div>

                    <?php echo $failed; ?>
                    <input type="submit" name="submit" value="Login" class="btn btn-primary login"><br>
                    <div class="my-3">
                        <a href="forgot_pswd.php">Forgot Password</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>