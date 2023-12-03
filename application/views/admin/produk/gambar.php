<?php

if(isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open_multipart(base_url('admin/produk/gambar/'.$produk->id_produk),'class="form-horizontal"');

?>


<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Judul Gambar</label>
    <div class="col-md-8">
    <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar" value="<?php echo set_value('judul_gambar') ?>" required> 
    </div>
</div>

<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Unggah Produk</label>
    <div class="col-md-4">
    <input type="file" name="gambar" class="form-control" placeholder="Unggah Produk" value="<?php echo set_value('gambar') ?>" required> 
    </div>
    <div class="col-md-4">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save">Simpan</i>
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times">Reset</i>
        </button>
    </div>
</div>

<?php echo form_close()?>

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
            <th>Gambar</th>
            <th>Judul</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($gambar as $gambar)  {?>
        <tr>
            <td><?php echo $no ?></td>
            <td><img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="200"></td>

            <td><?php echo $gambar->judul_gambar ?></td>

            <td>

                <a href="<?php echo base_url('admin/produk/delete_gambar/'.$gambar->id_produk.'/'.$gambar->id_gambar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash-o"></i>Hapus</a>

            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>