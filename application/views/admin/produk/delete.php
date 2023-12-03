<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="modal-default">
<i class="fa fa-trash-o"></i>Hapus
</button>

<div class="modal fade" id="delete-<?php echo $produk->id_produk?>">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal header">
                 <button type="button" class="close" data-dissmis="modal" aria-label="close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 <h4 class="modal-title text-center">HAPUS DATA PRODUK</h4>
             </div>
             <div class="modal-body">
                 <div class="callout callout-warning">
                     <h4>Peringatan</h4>
                     Yaking ingin menghapus data ini?? data ini tidak bisa dikembalikan.!
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-success" data-dissmis="modal"><i class="fa fa-times"></i>Close</button>
                 <a href="<?php echo base_url('admin/produk/delete/')?>" class="btn btn-danger"><i class="fa fa-trash-o"></i>Ya, Hapus Data ini</a>
             </div>
        </div>
    </div>
</div>