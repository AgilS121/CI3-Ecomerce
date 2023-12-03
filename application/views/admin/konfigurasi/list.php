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
echo form_open_multipart(base_url('admin/konfigurasi/'),'class="form-horizontal"');

?>


<div class="form-group">
    <label class="col-md-2 control-label">Nama Website</label>
    <div class="col-md-8">
    <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" > 
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tagline</label>
    <div class="col-md-8">
    <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>" > 
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Email</label>
    <div class="col-md-8">
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" > 
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Website</label>
    <div class="col-md-8">
    <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website ?>" > 
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Keyword Produk</label>
    <div class="col-md-8">
        <textarea name="keywords" id="" class="form-control" placeholder="Keyword"><?php echo $konfigurasi->keywords ?></textarea>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Meta Text</label>
    <div class="col-md-8">
        <textarea name="metatext" id="" class="form-control" placeholder="Meta text"><?php echo $konfigurasi->metatext ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Telepon</label>
    <div class="col-md-8">
    <input type="number" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" > 
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Alamat</label>
    <div class="col-md-8">
        <textarea name="alamat" id="" class="form-control" placeholder="Alamat"><?php echo $konfigurasi->alamat ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Facebook</label>
    <div class="col-md-8">
    <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" > 
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">IG</label>
    <div class="col-md-8">
    <input type="text" name="instagram" class="form-control" placeholder="IG" value="<?php echo $konfigurasi->instagram ?>" > 
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Deskripsi</label>
    <div class="col-md-8">
        <textarea name="deskripsi" id="" class="form-control" placeholder="Deskripsi"><?php echo $konfigurasi->deskripsi ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">logo</label>
    <div class="col-md-8">
    <input type="text" name="logo" class="form-control" placeholder="logo" value="<?php echo $konfigurasi->logo ?>" > 
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">icon</label>
    <div class="col-md-8">
    <input type="text" name="icons" class="form-control" placeholder="icon" value="<?php echo $konfigurasi->icons ?>" > 
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Rekening</label>
    <div class="col-md-8">
        <textarea name="rekening_pembayaran" id="" class="form-control" placeholder="Rekening Pembayaran"><?php echo $konfigurasi->rekening_pembayaran ?></textarea>
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

