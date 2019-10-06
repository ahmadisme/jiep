<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Purchase Order <?= $list_po->no_trans ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
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
                            <a href="<?= base_url('purchaseorder/print/') . $this->uri->segment(3) ?>" type="button" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print
                            </a>

                        </div>
                    </div>
                </section>
                <!-- /.content -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->