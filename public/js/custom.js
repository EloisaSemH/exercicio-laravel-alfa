particlesJS.load('particles-container', '../js/particlesjs-config.json');

function deleteModal(route) {
    Swal.fire({
        title: 'Do you want to delete the contact?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: 'red',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                success: function (res) {
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    window.location.reload();
                }
            });
        }
    })
}
