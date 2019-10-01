<!DOCTYPE html>
<html>

<head>
    <title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>

<body>
    <center>
        <h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
        <h3>Edit Data</h3>
    </center>

    <form action="<?php echo base_url() . 'welcome/update'; ?>" method="post">
        <table style="margin:20px auto;">
            <tr>
                <td>stock</td>
                <td>
                    <input type="hidden" name="barang_id" value="<?php echo $produk->barang_id ?>">
                    <input type="text" name="nama_barang" value="<?php echo $produk->nama_barang ?>">
                </td>
            </tr>
            <tr>
                <td>harga_beli</td>
                <td><input type="text" name="kategori_id" value="<?php echo $produk->kategori_id ?>"></td>
            </tr>
            <tr>
                <td>harga_jual</td>
                <td><input type="text" name="harga" value="<?php echo $produk->harga ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

</body>

</html>