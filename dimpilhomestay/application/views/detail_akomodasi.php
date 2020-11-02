<div class="container-fluid">
    <div class="card">
    <h5 class="card-header">Detail Kamar</h5>
    <div class="card-body">

        <?php foreach($akomodasi as $a): ?>
        <div class="row">
            <div class="col-md-4">
                    <img src="<?php echo base_url().'/uploads/'.$a->gambar_kamar ?>" class="card-img-top">
                    </div>
            <div class="col-md-8">
                    <table>
                        <tr>
                            <td>Nama Kamar</td>
                            <td><strong><?php echo $a->nama_kamar ?></strong></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><strong><?php echo $a->keterangan ?></strong></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><strong><?php echo $a->kategori ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><strong><?php echo $a->stok ?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($a->harga,0,',','.') ?></div></strong></td>
                        </tr>
                    </table>

                    <?php echo anchor('dashboard/booking/'.$a->id,'<div class="btn btn-sm btn-primary">Booking</div>') ?>
                    <?php echo anchor('welcome/index/','<div class="btn btn-sm btn-danger">Kembali</div>') ?>
            </div>
        </div>

        <?php endforeach; ?>
       </div>
    </div>
</div>