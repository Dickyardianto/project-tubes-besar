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
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="hidden" name="id" value="<?= $submenu['id']; ?>"></<input>
                        <input type="text" name="title" id="title" class="form-control"
                            value="<?= $submenu['title']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-5">
                        <label for="exampleFormControlInput1">Menu</label>
                        <select class="form-control" id="menu_id" name="menu_id">
                            <?php foreach ($menu as $m) : ?>
                            <?php if ($m->id == $submenu['menu_id']) : ?>
                            <option value="<?php echo $m->id; ?>" selected><?php echo $m->menu; ?></option>
                            <?php else : ?>
                            <option value="<?= $m->id; ?>"><?= $m->menu; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-5">
                        <label for="exampleFormControlInput1">Url</label>
                        <input type="text" name="url" id="url" class="form-control" value="<?= $submenu['url']; ?>">
                        <small class="form-text text-danger"><?= form_error('url'); ?></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-5">
                        <label for="exampleFormControlInput1">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control" value="<?= $submenu['icon']; ?>">
                        <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-5">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active"
                                checked>
                            <label for="is_active" class="form-check-label">Active ?</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="ubahSubMenu" class="btn btn-primary float-left mt-2">Ubah data</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->