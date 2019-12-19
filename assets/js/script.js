const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        title: 'Submenu',
        text: 'Berhasil ' + flashdata,
        icon: 'success'
    });

}

$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu yakin ?',
        text: "ingin menghapus ini !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

const flashdatas = $('.flash-datas').data('flashdatas');

if (flashdatas) {
    Swal.fire({
        title: 'Profil',
        text: 'Berhasil ' + flashdatas,
        icon: 'success'
    });

}

const flashdataMenu = $('.flash-dataMenu').data('flashdata');

if (flashdataMenu) {
    Swal.fire({
        title: 'Menu',
        text: 'Berhasil ' + flashdataMenu,
        icon: 'success'
    });

}

const flashdataPP = $('.flash-dataPP').data('flashdata');

if (flashdataPP) {
    Swal.fire({
        title: 'Data',
        text: 'Berhasil ' + flashdataPP,
        icon: 'success'
    });

}