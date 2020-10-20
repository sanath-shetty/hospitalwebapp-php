<section class="overview-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
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