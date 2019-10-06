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
                <h3 class="box-title">Daftar Purchase Order</h3>

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
                            <th>No.</th>

                            <th>No Transaksi</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($list_po as $row) { ?>
                            <tr>

                                <td><?php echo $i++; ?></td>

                                <td><?php echo $row->no_trans; ?></td>
                                <td><?php echo $row->tanggal_order ?></td>
                                <td><?php echo $row->nama ?></td>



                                <td>

                                    <a href="<?php echo base_url('purchaseorder/detail/') . $row->id; ?>" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                                </td>



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