<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <!-- Tampilkan pesan error -->

            <?= $this->session->flashdata('message'); ?>

            <form action="" method="post">
                <div class="form-row">
                    <div class="col-5">
                        <label for="exampleFormControlInput1">Menu</label>
                        <input type="hidden" name="id" value="<?= $menu['id']; ?>"></<input>
                        <input type="text" name="menu" id="menu" class="form-control" value="<?= $menu['menu']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <button type="submit" name="ubah" class="btn btn-primary float-left mt-2">Ubah data</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->