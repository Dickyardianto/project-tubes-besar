<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="col-xl-4 col-md-6 mb-4">
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user['nama']; ?></div>
                        <div class="text-xs font-weight-bold text-gray-800 mb-1"><?= $user['email'] ?></div>
                        <div class="text-xs font-weight-bold text-gray-800 mb-1">Member since
                            <?= date('d F Y', $user['date_created']); ?></div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <a href="petani/editProfile" class="btn btn-primary mt-4">Edit profile</a>
    </div>



    <!-- <a href="" class="btn btn-success">Edit profile</a> -->

</div>
<!-- /.container-fluid -->

</div>