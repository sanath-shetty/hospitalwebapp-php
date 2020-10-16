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
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <section class="navbar">
            <div class="logo_sec" align="center">
                <div>
                    <img src="image/logo.png" class="navbar_img">
                </div>
            </div>
            <div class="nav_sec" align="right">
                <ul class="ul_nav_sec">
                    <li>
                        <a href="index.php" class="chng_clr">Home</a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="loginsec">
            <div class="login_sec">
                <p class="login_head">Login Interface</p>

                <form action="" method="POST" align="center">
                    <label class="utype_head">User Type</label>
                    <select class="sel_utype" name="s_type">
                        <option>Select Type</option>
                        <option value="admin">Main Admin</option>
                        <option value="patient">Patient</option>
                        <option value="doctor">Doctor</option>
                    </select><br>
                    <input type="text" name="uname" placeholder="User Name" class="inp_userid"><br>
                    <input type="password" name="upswd" placeholder="Password" class="inp_pswd"><br>
                    <?php echo $failed; ?>
                    <input type="submit" name="submit" value="Login" class="btn_submit"><br>
                    <a href="forgot_pswd.php" class="a_pswd">Forgot Password</a>
                </form>
            </div>
        </section>
    </div>
</body>

</html>