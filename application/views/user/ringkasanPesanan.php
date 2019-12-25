<div class="container" style="margin-top:100px;">

    <div class="card">

        <h3 class="card-header text-center"><i class="fas fa-table"></i> Ringkasan Data Pesanan</h3>

        <div class="card-body">

            <?php foreach ($data_pesanan as $pesanan) : ?>

            <h4 class="card-title"> <i class="fas fa-user"></i> Data Pemesan</h4><br>
            <p class="card-text" name="nama" class="form-control-file">Nama Pemesan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;: &nbsp; &nbsp;<?php echo $pesanan->nama_pemesan ?></p>
            <p class="card-text" name="nomorTelp">Nomor Telphone &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;
                &nbsp; <?php echo $pesanan->nomor_telephone ?></p>
            <p class="card-text" name="pengiriman">Jenis Pengiriman &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;
                &nbsp; <?php echo $pesanan->jenis_pengiriman ?></p>
            <p class="card-text" name="pembayaran">Jenis Pembayaran &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp;
                <?php echo $pesanan->jenis_pembayaran ?></p>
            <p class="card-text" name="alamat">Alamat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; <?php echo $pesanan->alamat ?> </p>
            <br>
            <br>
            <?php endforeach; ?>
            <h4 class="card-title"><i class="fas fa-file-alt"></i> Pesanan </h4><br>



            <p class="card-text">Sayur &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;
                &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;
                &nbsp;<?php foreach ($this->cart->contents() as $Keranjang) : ?><?php echo $Keranjang['name'], ' ', $Keranjang['qty'], '(', $Keranjang['satuan'], ')', ',' ?>
                <?php endforeach; ?> </p>

            <p class="card-text">Total Pembayaran &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp;Rp
                <?php $grand_total = 0;
				if ($keranjang = $this->cart->contents()) {
					foreach ($keranjang as $krj) {

						$grand_total = $grand_total + $krj['subtotal'];
					}

					echo number_format($grand_total, 0, ',', '.');
				} ?>,00
            </p>

            <br>
            <br>
            <h4 class="card-title"><i class="fas fa-money-bill-wave"></i> Pembayaran</h4><br>
            <li class="list-group-item list-group-item-warning">

                Harap Lakukan Pembayaran Pada Nomor Rekening dibawah ini! <br>
                Bank &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp;BCA <br>
                No Rekening&nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp;12344567890 <br>
                Atas Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; Niaga Sayur
            </li>
            <br>
            <br>


            <form action="<?php echo base_url() . 'transaksi/upload_bukti_pembayaran'; ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label>Upload Bukti Pembayaran disini</label>
                    <input type="file" name="gambar" class="form-control-file">
                    <input type="hidden" name="is-success" value="1">
                </div>
                <button type="submit" class="btn btn-success mb-3 float-right">Konfirmasi Pembayaran</button>
            </form>
        </div>
    </div>

</div>