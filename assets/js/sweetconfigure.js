const Erro = Swal.mixin({
    icon: 'error',
    showConfirmButton: false,
    iconColor: 'bg-danger',
    customClass: {
        title: 'swal2-title',
    },
    toast: true,
    timer: 3500,
    timerProgressBar: true,
    position: 'top-end'
});

const Successo = Swal.mixin({
    icon: 'success',
    showConfirmButton: false,
    iconColor: 'bg-success',
    customClass: {
        title: 'swal2-title'
    },
    toast: true,
    timer: 3500,
    timerProgressBar: true,
    position: 'top-end'
});