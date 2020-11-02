<div class="container-fluid">
	<div class="row">
		<div class="col-md2"></div>
		<div class="col-md8">
			<div class="btn btn-sm btn-success">
				<?php 
				$grand_total = 0;
				if ($booking = $this->cart->contents()) 
					{
						foreach ($booking as $item)	
						{
							$grand_total = $grand_total + $item['subtotal'];
						}

					echo "<h4>Total Pemesanan Anda: Rp.".number_format($grand_total,0,',','.');	
					 ?>
			</div><br><br>

			<h3>Input Pembayaran</h3>

			<form method="post" action="<?php echo base_url('dashboard/proses_pembayaran') ?>">
				

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>Pilih Pembayaran</label>
					<select class="form-control">
						<option>BCA - XXXXXXX</option>
						<option>BNI - XXXXXXX</option>
						<option>BRI - XXXXXXX</option>
						<option>MANDIRI - XXXXXXX</option>
					</select>
				</div>


				<button type="submit" class="btn btn-sm btn-primary">Pesan</button>
			</form>

			<?php 
			} else 
			{
				echo "<h4>Anda Belum Memesan";
			} ?>
		</div>

		<div class="col-md2"></div>
	</div>
</div>