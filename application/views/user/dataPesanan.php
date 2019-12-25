<div class="container" style="margin-top:100px;">

    <div class="card col-lg-8 mx-auto">

        <h3 class="text-center pt-4">Isi Data Pemesan</h3>

        <div class="card-body">
            <form method="post" action="<?php echo base_url() . 'transaksi/tambah_data_pesanan' ?>">
                <input type="hidden" name="id-user" value="<?= $user['id'] ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="Email" class="form-control" id="disabledTextInput" name="email"
                        placeholder="Masukkan Email yang Terdaftar...">
                </div>

                <div class="form-group">

                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="namaPemesan" placeholder="Masukkan Nama Lengkap...">

                </div>

                <div class="form-group">

                    <label for="NomorHp">Nomor Telephone</label>
                    <input type="text" class="form-control" name="NomorHp" placeholder="Masukkan Nomor Telephone...">

                </div>


                <div class="form-group">

                    <label for="jenis Pengiriman">Jenis Pengiriman</label>
                    <select class="form-control" name="jenisPengiriman">
                        <option>COD</option>
                        <option>JNE</option>
                        <option>GRAB</option>
                        <option>GOSEND</option>
                    </select>

                </div>

                <div class="form-group">

                    <label for="jenis Pengiriman">Jenis Pembayaran</label>
                    <select class="form-control" name="jenisPembayaran">
                        <option>Transfer Bank</option>
                        <!-- <option>Bayar ditempat</option> -->
                    </select>

                </div>

                <div class="form-group">

                    <label for="alamat">Alamat</label>

                    <textarea type="text" name="alamat" class="form-control"
                        placeholder="Masukkan Alamat Pengiriman..."></textarea>

                </div>

                <button type="submit" class="btn btn-success btn-lg btn-block">Proses Pesanan</button>

            </form>
        </div>
    </div>

</div>