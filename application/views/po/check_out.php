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
                <h3 class="box-title">Check Out #BSK<?php echo $invoice; ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php
                $grand_total = 0;
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    } ?>

                    <script src="<?php echo base_url('assets/'); ?>ajax.js"></script>
                    <form action="<?php echo base_url() ?>purchaseorder/proses_po" method="post" autocomplete="off">

                        <div class="form-group">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Total : </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rp. <?php echo  number_format($grand_total, 0, ",", ".") ?>" value="<?php echo $grand_total ?>" name="total_harga">
                            </div>
                            <div class="form-group">
                                <label>Transaction Number</label><br>
                                <input class="form-control" type="text" name="no_trans" placeholder="BSK<?php echo $invoice; ?>" value="BSK<?php echo $invoice; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Date</label><br>
                                <input class="form-control" type="date" name="tanggal_order" placeholder="Input Transaction Number">
                            </div>
                            <div class="form-group">
                                <label>Supplier Name</label><br>
                                <input list="data_customer" class="form-control" type="text" name="nama" id="nama" placeholder="Input Customer Name" onchange="return autofill();">
                            </div>
                            <div class="form-group">
                                <label>Supplier Address</label><br>
                                <input type="text" class="form-control" name="alamat" id="alamat">
                            </div>
                            <div class="form-group">
                                <label>Supplier Phone</label><br>
                                <input type="text" class="form-control" name="telp" id="telp">
                            </div>
                            <div class="form-group">
                                <label>Supplier Email</label><br>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>


                            <button type="submit" class="btn btn-success">Process</button>
                    </form>
                <?php
                } else {
                    echo "<h5>Shopping Cart masih kosong</h5>";
                }
                ?>

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

<datalist id="data_customer">
    <?php
    foreach ($record->result() as $b) {
        echo "<option value='$b->nama'>$b->alamat</option>";
    }
    ?>

</datalist>
<script>
    function autofill() {
        var nama = document.getElementById('nama').value;
        $.ajax({
            url: "<?php echo base_url(); ?>purchaseorder/cari",
            data: '&nama=' + nama,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('nama').value = val.nama;
                    document.getElementById('email').value = val.email;
                    document.getElementById('alamat').value = val.alamat;
                    document.getElementById('telp').value = val.telp;


                });
            }
        });

    }
</script>