<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?= base_url('welcome/index') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>




            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Purchase Order</span>
                    <!-- <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span> -->
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('produk/tambah') ?>"><i class="fa fa-circle-o"></i> Daftar Barang Baru</a></li>
                    <li><a href="<?= base_url('purchaseorder/index') ?>"><i class="fa fa-circle-o"></i> Buat Purchase Order</a></li>
                    <?php $cart = 'Cart : ' . $this->cart->total_items() . ' items' ?>
                    <li><a href="<?= base_url('purchaseorder/tampil_cart') ?>"><i class="fa fa-circle-o"></i><?php echo $cart ?></a></li>
                </ul>
            </li>

            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Purchase Order</span>
                    <!-- <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span> -->
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('purchaseorder/list_purchaseorder') ?>"><i class="fa fa-circle-o"></i> Daftar Purchase Order</a></li>

                </ul>
            </li>









            <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->