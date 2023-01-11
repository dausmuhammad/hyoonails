<?php
$rolename = "";
if ($_SESSION['role'] == 1) {
    $rolename = "Admin";
} else if ($_SESSION['role'] == 2) {
    $rolename = "Kasir";
} else if ($_SESSION['role'] == 3) {
    $rolename = "Warehouse";
}
?>

<div class="content-wrapper">
    <div class="row content">
        <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-dark" style="height: 180px;">
                    <h3 class="widget-user-username"><?php echo "Selamat datang di halaman Administrator HYOONAILS" ?></h3>
                    <h4 class="widget-user-username"><?php echo $_SESSION['nama_lengkap'] ?></h3>
                        <div class="widget-user-image" >
                            <img style="border: none;" src="<?php echo base_url()."assets/images/logo_user.png" ?>" alt="User Avatar">
                        </div>
                        <!-- <h5 class="widget-user-desc"><?php echo $rolename ?></h5> -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">SALES HARIAN</h3>

                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">SALES BULANAN</h3>

                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChartBulanan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">SALES TAHUNAN</h3>

                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChartTahunan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>