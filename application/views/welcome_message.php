<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">nama</th>
            <th scope="col">stock</th>
            <th scope="col">harga</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <?php foreach ($produk as $row) { ?>
        <tbody>
            <tr>
                <th><?= $row->barang_id ?></th>
                <td><?= $row->kategori_id ?></td>
                <td><?= $row->nama_barang ?></td>
                <td><a href="<?= base_url('welcome/edit/') . $row->barang_id ?>" type="button" class="btn btn-primary">edit</a></td>
            </tr>

        </tbody>
    <?php } ?>
</table>