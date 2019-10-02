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
                <h3 class="box-title">Daftar Barang</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>

                            <th scope="col">Nama Barang</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($produk as $row) { ?>
                            <tr>
                                <form method="post" action="<?php echo base_url(); ?>purchaseorder/tambah" method="post" accept-charset="utf-8">
                                    <td><?php echo $i++; ?></td>

                                    <td><?php echo $row->nama_produk; ?></td>
                                    <td><?php echo $row->deskripsi ?></td>
                                    <td>Rp. <?php echo number_format($row->harga_beli, 0, ",", "."); ?></td>
                                    <input type="hidden" name="id" value="<?php echo $row->id_produk; ?>" />
                                    <input type="hidden" name="nama" value="<?php echo $row->nama_produk; ?>" />
                                    <input type="hidden" name="harga" value="<?php echo $row->harga_beli; ?>" />

                                    <input type="hidden" name="qty" value="1" />
                                    <td><button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                                </form>
                                <a href="<?php echo base_url('produk/edit/') . $row->id_produk; ?>" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Detail</a></td>

                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->