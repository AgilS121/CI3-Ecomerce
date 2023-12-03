
<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="container-table-cart pos-relative">
<div class="wrap-table-shopping-cart bgwhite">
    <table class="table-shopping-cart">
        <tr class="table-head">
            <th class="column-1">Gambar</th>
            <th class="column-2">Produk</th>
            <th class="column-3">Harga</th>
            <th class="column-4 p-l-70">Jumlah</th>
            <th class="column-5">Sub Total</th>
        </tr>

<?php
//looping

foreach($keranjang as $cart) {

    $id_produk = $cart['id'];
    $produk = $this->produk_model->detail($id_produk);
?>


        <tr class="table-row">
            <td class="column-1">
                <div class="cart-img-product b-rad-4 o-f-hidden">
                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar)?>" 
                    alt="<?php echo $cart['name'] ?>">
                </div>
            </td>
            <td class="column-2"><?php echo $cart['name']?></td>
            <td class="column-3"><?php echo number_format($cart['price'],'0',',','.')?></td>
            <td class="column-4">
                <div class="flex-w bo5 of-hidden w-size17">
                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                    </button>

                    <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $cart['qty']?>">

                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
            <td class="column-5">Rp. <?php
             $sub_total = $cart['price'] * $cart['qty'];
             echo number_format($sub_total,'0',',','.'); 
             ?></td>
        </tr>
<?php
//end looping

}
?>
<tr class="table-row">
    <td colspan="4" class="column-1"> Total Belanja</td>
    <td class="column2">Rp. <?php echo number_format($this->cart->total(),'0',',','.')?></td>
</tr>
    </table>
</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
    <div class="size11 bo4 m-r-10">
        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
    </div>

    <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
        <!-- Button -->
        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
            Apply coupon
        </button>
    </div>
</div>

<div class="size10 trans-0-4 m-t-10 m-b-10">
    <!-- Button -->
    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
        Update Cart
    </button>
</div>
</div>


</div>
</section>