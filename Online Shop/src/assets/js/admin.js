$(function () {

    var path = "http://localhost:8000/index.php/admin";
    $("#dialog:ui-dialog").dialog("destroy");
    $("#dialog-confirm").dialog({
        autoOpen: false,
        resizable: false,
        height: 140,
        modal: true,
        hide: 'Slide',
        buttons: {
            "Delete": function () {

                var del_id = {id: $("#del_id").val()};
                $.ajax({
                    type: "POST",
                    url: "path/delete",
                    data: del_id,
                    success: function (msg) {

                        $('#show').html(msg);
                        $('#dialog-confirm').dialog("close");
                    }

                });
            },
            Cancel: function () {

                $(this).dialog("close");
            }

        }

    });
    $("#form_input").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: false,
        hide: 'Slide',
        buttons: {
            "Add": function () {

                var form_data = {
                    id: $('#id').val(),
                    name: $('#name').val(),
                    description: $('#description').val(),
                    price: $('#price').val(),
                    ajax: 1

                };
                $('#name').attr("disabled", true);
                $('#description').attr("disabled", true);
                $('#price').attr("disabled", true);
                $.ajax({
                    url: "+path/submit",
                    type: 'POST',
                    data: form_data,
                    success: function (msg) {

                        $('#show').html(msg),
                                $('#id').val(''),
                                $('#name').val(''),
                                $('#description').val(''),
                                $('#price').val(''),
                                $('#name').attr("disabled", false);
                        $('#description').attr("disabled", false);
                        $('#price').attr("disabled", false);
                        $('#form_input').dialog("close")

                    }

                });

            },
            Cancel: function () {

                $('#id').val(''),
                        $('#name').val('');
                $('#price').val('');
                $(this).dialog("close");
            }

        },
        close: function () {

            $('#id').val(''),
                    $('#name').val('');
            $('#price').val('');
        }

    });

    $("#create-product")

            .button()

            .click(function () {

                $("#form_input").dialog("open");
            });
});

$(".edit").live("click", function () {

    var id = $(this).attr("id");
    var name = $(this).attr("name");
    var description = $(this).attr("description");
    var price = $(this).attr("price");

    $('#id').val(id);
    $('#name').val(name);
    $('#description').val(description);
    $('#price').val(price);

    $("#form_input").dialog("open");

    return false;
});

$(".delbutton").live("click", function () {

    var element = $(this);
    var del_id = element.attr("id");
    var info = 'id=' + del_id;
    $('#del_id').val(del_id);
    $("#dialog-confirm").dialog("open");

    return false;
});
