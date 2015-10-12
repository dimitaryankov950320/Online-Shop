$(function () {

    $("#dialog:ui-dialog").dialog("destroy");
    $("#form-add-user").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: false,
        hide: 'Slide',
        buttons: {
            "Add": function () {

                var form_data = {
                    id: $('#id').val(),
                    username: $('#username').val(),
                    password: $('#password').val(),
                    email: $('#email').val(),
                    gender: $('#gender').val(),
                    ajax: 1
                };

                $('#username').attr("disabled", true);
                $('#email').attr("disabled", true);
                $('#gender').attr("disabled", true);

                $.ajax({
                    url: "add_user",
                    type: 'POST',
                    data: form_data,
                    dataType: "json",
                    success: function (data) {

                        $('#form_input').dialog("close");
                        $('#users tr:last').after('<tr><td>' + data.id + "</td>\n\
                                                        <td>" + data.username + "</td>\n\
                                                        <td>" + data.email + '</td></tr>');

                    }

                });

            },
            Cancel: function () {

                $('#id').val('');
                $('#username').val('');
                $('#email').val('');
                $('#gender').val('');
                $(this).dialog("close");
            }

        },
        close: function () {

            $('#id').val('');
            $('#username').val('');
            $('#email').val('');
            $('#gender').val('');
        }

    });

    $("#add_user").button().click(function () {
        $("#form-add-user").dialog("open");
    });
});