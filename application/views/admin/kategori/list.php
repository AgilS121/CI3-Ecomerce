<p>
    <a href="<?php echo base_url('admin/kategori/tambah')?>" class="btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah
    </a>
</p>

<?php

//notif

if($this->session->flashdata('sukses'))
{
    echo '<div class="alert alert-seccess">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

?>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
        <th>Urutan</th>
            <th>Nama</th>
            <th>Slug</th>
            
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($kategori as $u)  {?>
        <tr>
        <td><?php echo $u->urutan ?></td>
            <td><?php echo $u->nama_kategori ?></>
            <td><?php echo $u->slug_kategori ?></td>
            
            <td>
                <a href="<?php echo base_url('admin/kategori/edit/'.$u->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

                <a href="<?php echo base_url('admin/kategori/delete/'.$u->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Kategori Ini')"><i class="fa fa-trash-o"></i>Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>