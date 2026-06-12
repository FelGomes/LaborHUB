setTimeout(() => {

    const alert = document.querySelector('.alert');

    if (alert) {

        const bsAlert = new bootstrap.Alert(alert);

        bsAlert.close();
    }

}, 6500);



