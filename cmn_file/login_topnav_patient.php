<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="cmn_file/nav-style.css">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <div class="row top-sec">
            <img src="image/logo.png" class="navbar_img">
            <a class="navbar-brand" href="#">Sanjivini Hospital</a>
        </div>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="dashboard_patientadmin.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="change_pswd.php">Change Password</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link"><?php echo $user; ?>-Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>