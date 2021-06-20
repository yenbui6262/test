const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    closeButtonHtml: '<i class="fas fa-times" style="font-size: 25px;"></i>',
    showCloseButton: true,
    showClass: {
        popup: 'animate__animated animate__slideInRight'
    },
    hideClass: {
        popup: 'animate__animated animate__slideOutRight'
    },
    willOpen: (toast) => {},
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
        toast.addEventListener('click', Swal.close)
    },
    willClose: (toast) => {}
})
const Alert = Swal.mixin({
    showConfirmButton: false,
    timer: 3000,
    showCancelButton: true,
    cancelButtonText: 'Đóng',
    timerProgressBar: true,
    closeButtonHtml: '<i class="fas fa-times" style="font-size: 25px;"></i>',
    showCloseButton: true,
})

function fireToast(type, message) {
    switch (type) {
        case 'error':
            Toast.fire({
                icon: 'error',
                title: message,
            })
            break;
        case 'success':
            Toast.fire({
                icon: 'success',
                title: message,
            })
            break;
        case 'info':
            Toast.fire({
                icon: 'info',
                title: message,
            })
            break;
        case 'question':
            Toast.fire({
                icon: 'question',
                title: message,
            })
            break;
        case 'warning':
            Toast.fire({
                icon: 'warning',
                title: message,
            })
            break;
    }
}

function fireAlert(type, title, message) {
    switch (type) {
        case 'error':
            Alert.fire({
                icon: 'error',
                title: title,
                text: message,
            })
            break;
        case 'success':
            Alert.fire({
                icon: 'success',
                title: title,
                text: message,
            })
            break;
        case 'info':
            Alert.fire({
                icon: 'info',
                title: title,
                text: message,
            })
            break;
        case 'question':
            Alert.fire({
                icon: 'question',
                title: title,
                text: message,
            })
            break;
        case 'warning':
            Alert.fire({
                icon: 'warning',
                title: title,
                text: message,
            })
            break;
    }
}