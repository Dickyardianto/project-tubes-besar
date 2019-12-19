// function coba() {
//     const Toast = Swal.mixin({
//         toast: true,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 3000,
//         timerProgressBar: true,
//         onOpen: (toast) => {
//             toast.addEventListener('mouseenter', Swal.stopTimer)
//             toast.addEventListener('mouseleave', Swal.resumeTimer)
//         }
//     })

//     Toast.fire({
//         icon: 'success',
//         title: 'Signed in successfully'
//     })

// }

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
        text: "hapus submenu ini !",
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