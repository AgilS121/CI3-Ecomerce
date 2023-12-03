<p>
    <a href="<?php echo base_url('admin/user/tambah')?>" class="btn-success btn-lg">
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
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($user as $u)  {?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $u->nama ?></td>
            <td><?php echo $u->email ?></td>
            <td><?php echo $u->username ?></td>
            <td><?php echo $u->akses_level ?></td>
            <td>
                <a href="<?php echo base_url('admin/user/edit/'.$u->id_users) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

                <a href="<?php echo base_url('admin/user/delete/'.$u->id_users) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus User Ini')"><i class="fa fa-trash-o"></i>Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>