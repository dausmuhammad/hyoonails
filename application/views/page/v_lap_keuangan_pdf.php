

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
                <th>Keterangan</th>
                <th>Total</th>
            </tr>

            <tr>
                <td style="text-align: center;">
                    <?php echo $data['uang_masuk'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data['tanggal_uang_masuk'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data['uang_keluar'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data['tanggal_uang_keluar'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data['keterangan'] ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $data['total'] ?>
                </td>
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

<html>

<head>
    <title>Simple invoice in PHP</title>
    <style type="text/css">
        body {
            font-family: Verdana;
        }

        div.invoice {
            border: 1px solid #ccc;
            padding: 10px;
            height: 740pt;
            width: 570pt;
        }

        div.company-address {
            border: 1px solid #ccc;
            float: left;
            width: 200pt;
        }

        div.invoice-details {
            border: 1px solid #ccc;
            float: right;
            width: 200pt;
        }

        div.customer-address {
            border: 1px solid #ccc;
            float: right;
            margin-bottom: 50px;
            margin-top: 100px;
            width: 200pt;
        }

        div.clear-fix {
            clear: both;
            float: none;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="company-address">
            ACME ltd
            <br />
            489 Road Street
            <br />
            London, AF3Z 7BP
            <br />
        </div>

        <div class="invoice-details">
            Invoice N°: 564
            <br />
            Date: 24/01/2012
        </div>

        <div class="customer-address">
            To:
            <br />
            Mr. Bill Terence
            <br />
            123 Long Street
            <br />
            London, DC3P F3Z
            <br />
        </div>

        <div class="clear-fix"></div>
        <table border='1' cellspacing='0'>
            <tr>
                <th width=250>Description</th>
                <th width=80>Amount</th>
                <th width=100>Unit price</th>
                <th width=100>Total price</th>
            </tr>

            <?php
            $total = 0;
            $vat = 21;

            $articles = array(
                array("Motherboard", "Case", "RAM", "Hard Disk", "Monitor", "Installation"),
                array(1, 1, 2, 2, 1, 1),
                array(65, 80, 70, 125, 210, 30)
            );

            for ($a = 0; $a < 5; $a++) {
                $description = $articles[0][$a];
                $amount = $articles[1][$a];
                $unit_price = number_format($articles[2][$a], 2);
                $total_price = number_format($amount * $unit_price, 2);
                $total += $total_price;
                echo ("<tr>");
                echo ("<td>$description</td>");
                echo ("<td class='text-center'>$amount</td>");
                echo ("<td class='text-right'>€$unit_price</td>");
                echo ("<td class='text-right'>€$total_price</td>");
                echo ("</tr>");
            }

            echo ("<tr>");
            echo ("<td colspan='3' class='text-right'>Sub total</td>");
            echo ("<td class='text-right'>€" . number_format($total, 2) . "</td>");
            echo ("</tr>");
            echo ("<tr>");
            echo ("<td colspan='3' class='text-right'>VAT</td>");
            echo ("<td class='text-right'>€" . number_format(($total * $vat) / 100, 2) . "</td>");
            echo ("</tr>");
            echo ("<tr>");
            echo ("<td colspan='3' class='text-right'><b>TOTAL</b></td>");
            echo ("<td class='text-right'><b>€" . number_format(((($total * $vat) / 100) + $total), 2) . "</b></td>");
            echo ("</tr>");
            ?>
        </table>
    </div>
</body>

</html>