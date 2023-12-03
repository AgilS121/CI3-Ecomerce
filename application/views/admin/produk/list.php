<p>
    <a href="<?php echo base_url('admin/produk/tambah')?>" class="btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah
    </a>
</p>

<?php

//notif

if($this->session->flashdata('sukses'))
{
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

?>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Harga</th>
            
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($produk as $u)  {?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $u->nama_produk ?></td>
            <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$u->gambar) ?>" class="img img-responsive img-thumbnail" width="60"></td>

            <td><?php echo $u->id_kategori ?></td>
            <td><?php echo number_format($u->harga, '0',',','.') ?></td>
            <td><?php echo $u->status_produk ?></td>
            <td>
                <a href="<?php echo base_url('admin/produk/gambar/'.$u->id_produk) ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i>Gambar (<?php echo $u->total_gambar ?>)</a>

                <a href="<?php echo base_url('admin/produk/edit/'.$u->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

                <a href="<?php echo base_url('admin/produk/delete/'.$u->id_produk) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Produk Ini')"><i class="fa fa-trash-o"></i>Hapus</a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>