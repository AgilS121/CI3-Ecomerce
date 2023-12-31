<!-- Title Page -->
<section class="bg-title-page" style="background-image: url(<?php echo base_url()?>assets/upload/image/sepatu2.jpg);">
<h2 class="l-text2 t-center">
<?php echo $title ?>
</h2>
<p class="m-text13 t-center">
<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
<div class="leftbar p-r-20 p-r-0-sm">
<!--  -->
<h4 class="m-text14 p-b-7">
Kategori Produk
</h4>

<ul class="p-b-54">
<?php foreach($listing_kategori as $list) {?>
<li class="p-t-4">
<a href="<?php echo base_url('produk/kategori/'.$list->slug_produk)?>" class="s-text13 active1">
    <?php echo $list->nama_kategori ?>
</a>
</li>
<?php }?>
</ul>


</div>
</div>

<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">




<!-- Product -->
<div class="row">
    <?php foreach($produk as $produk) {?>
<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
<?php 

echo form_open_multipart(base_url('belanja/add/'));
echo form_hidden('id', $produk->id_produk);
echo form_hidden('qty', 1);
echo form_hidden('price', $produk->harga);
echo form_hidden('name', $produk->nama_produk);
echo form_hidden('page', str_replace('list.php/','',current_url()));
?>
<div class="block2">
<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar)?>" 
    alt="<?php echo $produk->nama_produk?>" height="200">

    <div class="block2-overlay trans-0-4">
        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
        </a>

        <div class="block2-btn-addcart w-size1 trans-0-4">
            <!-- Button -->
            <button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
				Add to Cart
			</button>
        </div>
    </div>
</div>

<div class="block2-txt p-t-20">
<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk)?>" class="block2-name dis-block s-text3 p-b-5">
		<?php echo $produk->nama_produk?>
	</a>

    <span class="block2-price m-text6 p-r-5">
    IDR <?php echo number_format($produk->harga,'0',',','.')?>
    </span>
</div>
</div>
<?php 
echo form_close();
?>
</div>
    <?php } ?>

</div>

<!-- Pagination -->
<div class="pagination flex-m flex-w p-t-26">
<?php echo $pagin?>
</div>
</div>
</div>
</div>
</section>