<!DOCTYPE html>
<html>

<link>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style type="text/css" media="print">
    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0mm;
        /* this affects the margin in the printer settings */
    }

    html {
        background-color: #FFFFFF;
        margin: 20px;
        margin-bottom: 10px;
        /* this affects the margin on the html before sending to printer */
    }

    body {
        border: solid 0px black;
        margin-bottom: 10px;

        /* margin you want for the content */
    }
</style>


<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Bina Sarana Kawasan
                        <small class="pull-right">Date: <?= $list_po->tanggal_order ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Bina Sarana Kawasan</strong><br>
                        Kawasan Industri Pulogadung<br>
                        Jakarta Timur, DKI Jakarta<br>
                        Phone: (804) 123-5432<br>
                        Email: info@yayasanjiepsejahtera.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $list_po->nama ?></strong><br>
                        <?= $list_po->alamat ?><br>

                        <?= $list_po->telp ?><br>
                        <?= $list_po->email ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?= $list_po->no_trans ?></b><br>
                    <br>
                    <b>Order ID:</b> <?= $list_po->id ?><br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> Purchase Order
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <?php $i = 1;
                        foreach ($list_detail_po as $row) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?= $row->produk ?></td>
                                    <td><?= $row->qty ?></td>
                                    <td><?= $row->harga ?></td>
                                    <td><?= $row->qty * $row->harga ?></td>

                                </tr>

                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">

                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">


                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal :</th>
                                <td><?= $list_po->total_harga ?></td>
                            </tr>
                            <tr>
                                <th>Pajak (10%) :</th>
                                <td><?= $list_po->total_harga * 10 / 100 ?></td>
                            </tr>
                            <tr>
                                <th>Ongkos Kirim:</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><?= $list_po->total_harga - ($list_po->total_harga * 10 / 100) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="<?= base_url('po/print/') . $this->uri->segment(3) ?>" type="button" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print
                    </a>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>