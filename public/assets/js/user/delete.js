$(document).ready(function () {
    $(function () {

        // delete user
        $('.users__table .list__item-delete').submit(function (event) {
            event.preventDefault();

            let form = $(this);
            let message = "Are you sure you want to remove this item?";
            let id = form.find('input[name="id"]').val();

            if (confirm(message)) {
                $.ajax({
                    url: form.attr('action'),
                    type: 'DELETE',
                    data: JSON.stringify({id: id}),
                    contentType: 'application/json',
                    success: function (data) {
                        alert('Пользователь успешно удален!');
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