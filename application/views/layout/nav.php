<?php
$nav_produk = $this->konfigurasi_model->nav_produk();
$nav_produk_mobile = $this->konfigurasi_model->nav_produk();
$site = $this->konfigurasi_model->listing();
?>

<div class="wrap_header">
	<!-- Logo -->
	<a href="index.html" class="logo">
		<img src="<?php echo base_url('assets/upload/image/'.$site->logo)?>" alt="IMG-LOGO">
	</a>

	<!-- Menu -->
	<div class="wrap_menu">
		<nav class="menu">
			<ul class="main_menu">
				<li >
					<a href="<?php echo base_url() ?>">Home</a>
					
				</li>

				<li>
					<a href="<?php echo base_url('produk') ?>">Shop</a>
					<ul class="sub_menu">
						<?php foreach($nav_produk as $nav) { ?>
						<li><a href="<?php echo base_url('produk/kategori/'.$nav->slug_kategori )?>">
					<?php echo $nav->nama_kategori ?>
					</a></li>
						<?php }?>

					</ul>
				</li>


				<li>
					<a href="<?php echo base_url('kontak')?>">Contact</a>
				</li>
			</ul>
		</nav>
	</div>

	<!-- Header Icon -->
	<div class="header-icons">
		<a href="#" class="header-wrapicon1 dis-block">
			<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
		</a>

		<span class="linedivide1"></span>

		<div class="header-wrapicon2">
			<?php
			$keranjang = $this->cart->contents();
			?>
			<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
			<span class="header-icons-noti"><?php echo count($keranjang)?></span>

			<!-- Header cart noti -->
			<div class="header-cart header-dropdown">
				<ul class="header-cart-wrapitem">
					<?php
					if(empty($keranjang)) {
					?>
					<li class="header-cart-item">
						<p class="alert alert-success">Keranjang Belanja Kosong</p>
					</li>

					<?php
					
					}else{

						$total_belanja = 'Rp '.number_format($this->cart->total(),'0',',','.');

						foreach ($keranjang as $keranjang) {
							$id_produk = $keranjang['id'];
							$produk = $this->produk_model->detail($id_produk);
							
						
						?>
				<li class="header-cart-item">
						<div class="header-cart-item-img">
							<img src="<?php echo base_url('assets/upload/image/'.$produk->gambar)?>" 
							alt="<?php echo $keranjang['name']?>">
						</div>

						<div class="header-cart-item-txt">
							<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk)?>" class="header-cart-item-name">
								<?php echo $keranjang['name']?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $keranjang['qty']?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?>= Rp. <?php echo number_format($keranjang['subtotal'],'0',',','.')?>
							</span>
						</div>
					</li>
						<?php }
				}?>
					
				</ul>

				<div class="header-cart-total">
					Total: <?php echo $total_belanja?>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							View Cart
						</a>
					</div>

					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja/checkout')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Header Mobile -->
<div class="wrap_header_mobile">
<!-- Logo moblie -->
<a href="index.html" class="logo-mobile">
	<img src="<?php echo base_url('assets/upload/image/'.$site->logo)?>" alt="IMG-LOGO">
</a>

<!-- Button show menu -->
<div class="btn-show-menu">
	<!-- Header Icon mobile -->
	<div class="header-icons-mobile">
		<a href="#" class="header-wrapicon1 dis-block">
			<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
		</a>

		<span class="linedivide2"></span>

		<div class="header-wrapicon2">

		<?php
			$keranjang_mobile = $this->cart->contents();
		?>

			<img src="<?php echo base_url()?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
			<span class="header-icons-noti"><?php echo count($keranjang_mobile)?></span>

			<!-- Header cart noti -->
			<div class="header-cart header-dropdown">
				<ul class="header-cart-wrapitem">

				<?php
					if(empty($keranjang)) {
					?>
					<li class="header-cart-item">
						<p class="alert alert-success">Keranjang Belanja Kosong</p>
					</li>

					<?php
					
					}else{

						$total_belanja = 'Rp '.number_format($this->cart->total(),'0',',','.');

						foreach ($keranjang as $keranjang) {
							
						
						?>

					<li class="header-cart-item">
						<div class="header-cart-item-img">
							<img src="<?php echo base_url()?>assets/template/images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt">
							<a href="#" class="header-cart-item-name">
							<?php echo $keranjang['name']?>
							</a>

							<span class="header-cart-item-info">
							<?php echo $keranjang['qty']?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?>= Rp. <?php echo number_format($keranjang['subtotal'],'0',',','.')?>
							</span>
						</div>
					</li>
					<?php }
				}?>
					
				</ul>

				<div class="header-cart-total">
				Total: <?php echo $total_belanja?>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							View Cart
						</a>
					</div>

					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja/checkout')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
	<ul class="main-menu">
		<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
			<span class="topbar-child1">
				<?php echo $site->alamat ?>
			</span>
		</li>

		<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
			<div class="topbar-child2-mobile">
				<span class="topbar-email">
				<?php echo $site->email ?>
				</span>

				<div class="topbar-language rs1-select2">
					<select class="selection-1" name="time">
						<option><?php echo $site->telepon ?></option>
						<option><?php echo $site->email ?></option>
					</select>
				</div>
			</div>
		</li>

		<li class="item-topbar-mobile p-l-10">
			<div class="topbar-social-mobile">
				<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
				<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>

			</div>
		</li>

		<li class="item-menu-mobile">
			<a href="<?php echo base_url()?>">Home</a>
		</li>

		<li class="item-menu-mobile">
			<a href="<?php echo base_url('produk')?>">Shop</a>
			<ul class="sub-menu">
			<?php foreach($nav_produk_mobile as $nav_mobile) { ?>
						<li><a href="<?php echo base_url('produk/kategori/'.$nav_mobile->slug_kategori )?>">
					<?php echo $nav_mobile->nama_kategori ?>
					</a></li>
						<?php }?>
			</ul>
			<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
		</li>

		


		<li class="<?php echo base_url('kontak')?>">
			<a href="contact.html">Contact</a>
		</li>
	</ul>
</nav>
</div>
			</div>
			
</header>