<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT DATA GALERI</h3>

	<?php foreach($galeri as $g) : ?>

		<form method="post" action="<?php echo base_url().'admin/galeri/update' ?>">
			
			<div class="form-group">
				<label>Judul</label>
				<input type="text" name="judul" class="form-control" value="<?php echo $g->judul ?>">
			</div>

			<div class="form-group">
				<label>Deskripsi</label>
				<input type="text" name="deskripsi" class="form-control" value="<?php echo $g->deskripsi ?>">
			</div>

			<div class="form-group">
				<label>Tanggal</label>
				<input type="date" name="tanggal" class="form-control" value="<?php echo $g->tanggal ?>">
			</div>

			<button type="submit" class="btn btn-primary btn-sm"> Simpan</button>

		</form>

	<?php endforeach; ?>
</div>