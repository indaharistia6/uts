<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT DATA AKOMODASI</h3>

	<?php foreach($akomodasi as $a) : ?>

		<form method="post" action="<?php echo base_url().'admin/data_akomodasi/update' ?>">
			
			<div class="form-group">
				<label>Nama Kamar</label>
				<input type="text" name="nama_kamar" class="form-control" value="<?php echo $a->nama_kamar ?>">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" value="<?php echo $a->keterangan ?>">
			</div>

			<div class="form-group">
				<label>Kategori</label>
				<input type="hidden" name="id" class="form-control" value="<?php echo $a->id ?>">
				<input type="text" name="kategori" class="form-control" value="<?php echo $a->kategori ?>">
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" value="<?php echo $a->harga ?>">
			</div>

			<div class="form-group">
				<label>Stok</label>
				<input type="text" name="stok" class="form-control" value="<?php echo $a->stok ?>">
			</div>

			<button type="submit" class="btn btn-primary btn-sm"> Simpan</button>

		</form>

	<?php endforeach; ?>
</div>