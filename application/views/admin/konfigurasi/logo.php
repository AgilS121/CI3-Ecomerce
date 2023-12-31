<?php

//notif

if($this->session->flashdata('sukses'))
{
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

?>

<?php

if(isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open_multipart(base_url('admin/konfigurasi/logo/'),'class="form-horizontal"');

?>


<div class="form-group">
    <label class="col-md-2 control-label">Nama Website</label>
    <div class="col-md-8">
    <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" > 
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Upload Logo</label>
    <div class="col-md-8">
    <input type="file" name="logo" class="form-control" placeholder="logo" value="<?php echo $konfigurasi->logo ?>" > 
    Logo lama: <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo )?>" alt="" class="img img-responsive img-thumbnail">
</div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-8">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save">Simpan</i>
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times">Reset</i>
        </button>
    </div>
</div>

<?php echo form_close(); ?>

