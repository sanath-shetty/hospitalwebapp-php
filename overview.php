<!-- laptop -->

<div class="laptop">
    <section class="overview-sec my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 my-2">
                    <?php
                    $sql = "SELECT * FROM `ward_asgn`";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Total patients</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                    $sql = "SELECT * FROM `ward` WHERE `status` = '0'";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Wards available</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- tab -->

<div class="tab">
    <section class="overview-sec my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $sql = "SELECT * FROM `ward_asgn`";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Total patients</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php
                    $sql = "SELECT * FROM `ward` WHERE `status` = '0'";
                    $res = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card">
                        <h7>Wards available</h7>
                        <p><?php echo $count ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>