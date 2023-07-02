$(document).ready(function () {
    $(function () {

        // delete user
        $('.users__table .users__item-delete').submit(function (event) {
            event.preventDefault();

            let form = $(this);
            let message = "Are you sure you want to remove user?";
            let id = form.find('input[name="id"]').val();

            if (confirm(message)) {
                $.ajax({
                    url: form.attr('action'),
                    type: 'DELETE',
                    data: JSON.stringify({id: id}),
                    contentType: 'application/json',
                    success: function (data) {
                        alert('User has been successfully deleted!');
                        window.location.replace("/users");
                    },
                    error: function (xhr, status, error) {
                        alert(status + ': ' + error);
                    }
                }).done(function (data) {
                    console.log(data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.error(jqXHR, textStatus, errorThrown);
                });
            }
        });
    });
});