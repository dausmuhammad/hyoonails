

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title_pdf; ?>
    </title>
    <link rel="icon" type="image/png" href="" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/style.css">
    <style>
        table {
            width: 100%;
        }

        th {
            text-align: center;
            border-bottom: 2px solid grey;
        }

        td {
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid grey;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="col-lg-12">
        <h1>LAPORAN KEUANGAN</h1>
        <h2 style="margin-top: -1.5rem;">HYOONAILS</h2>
        <p>Alamat : Jl. xxxx </p>
        <p>Tanggal :
            <?php echo date("l, d F Y") ?>
        </p>
        <hr>
        <table cellspacing="0">
            <tr>
                <th>Uang Masuk</th>
                <th>Tanggal Uang Masuk</th>
                <th>Uang Keluar</th>
                <th>Tanggal Uang Keluar</th>
                <th>Total</th>
            </tr>
            <?php for($i = 0 ; $i < count($data);$i++) {?>
            <tr>
                <td style="text-align: center;">
                    <?php echo $data[$i]['uang_masuk'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data[$i]['tanggal_uang_masuk'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data[$i]['uang_keluar'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data[$i]['tanggal_uang_keluar'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data[$i]['total'] ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <th colspan="4" style="text-align: left"><h3>Total Keseluruhan<h3></th>
                <th><?php echo number_format($data[count($data) - 1]['totalKeseluruhan'] ,2,',','.');?></th>
            </tr>
        </table>
    </div>
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>

</body>

</html>