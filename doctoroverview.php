<!-- laptop -->

<div class="laptop">
    <section class="overview-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    $sql = "SELECT * FROM `doctor_data`";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Total doctors</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                    $date = date("Y-m-d");
                    $sql = "SELECT * FROM `appointment` WHERE `apnt_date` = '$date'";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Appointments today</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- tab -->

<div class="tab">
    <section class="overview-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $sql = "SELECT * FROM `doctor_data`";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Total doctors</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php
                    $date = date("Y-m-d");
                    $sql = "SELECT * FROM `appointment` WHERE `apnt_date` = '$date'";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Appointments today</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- mobile  -->

<div class="mobile">
    <section class="overview-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-3 my-3">
                    <?php
                    $sql = "SELECT * FROM `doctor_data`";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Total doctors</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                    $date = date("Y-m-d");
                    $sql = "SELECT * FROM `appointment` WHERE `apnt_date` = '$date'";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Appointments today</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>