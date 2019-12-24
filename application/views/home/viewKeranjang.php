<div class="container" style="margin-top:140px;">

    <h1 class="text-center mb-4"><i class="fas fa-shopping-cart"></i> Keranjang Belanja</h1>


    <?php foreach ($this->cart->contents() as $Keranjang) : ?>

    <div class="card mb-3" style="max-width: 100rem;">
        <div class="card-body">
            <h3 class="card-title"><?php echo $Keranjang['name'] ?></h3>
            <p class="card-text">Jumlah Pesanan : <?php echo $Keranjang['qty'] ?> <?= $Keranjang['satuan'] ?>
            </p>
            <p class="card-text">Harga : Rp <?php echo number_format($Keranjang['price'], 0, ',', '.') ?>,00</p>
            <a href="" class="btn btn-danger float-right mt-3"><i class="fas fa-trash-alt"></i> Hapus</a>


        </div>
    </div>
    <?php endforeach; ?>


    <h3 class="text-center mb-5">TOTAL BELANJA : Rp <?php echo number_format($this->cart->total(), 0, ',', '.') ?>,00
    </h3>

    <div align="right">

        <a href="<?php echo base_url('transaksi/hapus_keranjang') ?>" class="btn btn-danger"><i
                class="fas fa-trash-alt"></i> Hapus Keranjang</a>
        <a href="<?php echo base_url() . 'pembeli/index' ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Lanjut
            Belanja</a>
        <a href="<?php echo base_url('transaksi/isi_data_pesanan') ?>" class="btn btn-success"><i
                class="fas fa-money-bill-wave-alt"></i> Bayar</a>

    </div>


</div>