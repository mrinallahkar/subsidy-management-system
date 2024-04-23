const { exit } = require("browser-sync");
const { extendWith } = require("lodash");

// Pass csrf token in ajax header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function SaveRawMaterial(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Material_Name").val();
    var description = $("#Description").val();
    if (title == "") {
        $("#Material_Name").after('<span class="text-danger error"> Raw material is required </span>');
    }
    if (description == "") {
        $("#Description").after('<span class="text-danger error"> Description is required </span>');
        return false;
    }

    var form_id = formId; //$(this).closest('form').attr('id');
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url, div, formId);
    }

    // else create post
    else {
        createPost(form_data, url, div, formId);
    }
    //   });
}

function SaveGoods(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Goods_Name").val();
    var description = $("#Description").val();
    if (title == "") {
        $("#Goods_Name").after('<span class="text-danger error"> Finish Goods is required </span>');
    }
    if (description == "") {
        $("#Description").after('<span class="text-danger error"> Description is required </span>');
        return false;
    }

    var form_id = formId; //$(this).closest('form').attr('id');
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url, div, formId);
    }

    // else create post
    else {
        createPost(form_data, url, div, formId);
    }
    //   });
}

function SaveFunds(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Fund_Name").val();
    var description = $("#Description").val();
    if (title == "") {
        $("#Fund_Name").after('<span class="text-danger error"> Fund Name is required </span>');
    }
    if (description == "") {
        $("#Description").after('<span class="text-danger error"> Description is required </span>');
        return false;
    }

    var form_id = formId; //$(this).closest('form').attr('id');
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url, div, formId);
    }

    // else create post
    else {
        createPost(form_data, url, div, formId);
    }
    //   });
}
function SaveBank(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Bank_Name").val();
    var description = $("#Description").val();
    if (title == "") {
        $("#Bank_Name").after('<span class="text-danger error"> Bank Name is required </span>');
    }
    if (description == "") {
        $("#Description").after('<span class="text-danger error"> Description is required </span>');
        return false;
    }

    var form_id = formId; //$(this).closest('form').attr('id');
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url, div, formId);
    }

    // else create post
    else {
        createPost(form_data, url, div, formId);
    }
    //   });
}
function SaveRemarks(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Reason_Details").val();
    var description = $("#Description").val();
    if (title == "") {
        $("#Reason_Details").after('<span class="text-danger error"> Remarks is required </span>');
    }
    if (description == "") {
        $("#Description").after('<span class="text-danger error"> Description is required </span>');
        return false;
    }

    var form_id = formId; //$(this).closest('form').attr('id');
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url, div, formId);
    }

    // else create post
    else {
        createPost(form_data, url, div, formId);
    }
    //   });
}
function SaveSubsidy(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Product_Name").val();
    var description = $("#Description").val();
    if (title == "") {
        $("#Product_Name").after('<span class="text-danger error"> Subsidy Name is required </span>');
    }
    if (description == "") {
        $("#Description").after('<span class="text-danger error"> Description is required </span>');
        return false;
    }

    var form_id = formId; //$(this).closest('form').attr('id');
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url, div, formId);
    }

    // else create post
    else {
        createPost(form_data, url, div, formId);
    }
    //   });
}


// create new post
function createPost(form_data, url, div, formId) {
    $.ajax({
        url: url,
        method: 'post',
        data: form_data,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },

        success: function (res) {
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Save");

            if (res.status == "success") {
                $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $("#" + formId).trigger("reset");
                //$("#contain").html(res.body);
                $('#' + div).empty().append().html(res.body);
                $('#result').focus();

            }

            else if (res.status == "failed") {
                $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $('#result').focus();
            }
        }
    });
}

// update post
function updatePost(form_data, url, div, forId) {
    $.ajax({
        url: url,
        method: 'put',
        data: form_data,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },

        success: function (res) {
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Update");

            if (res.status == "success") {
                $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $('#' + div).empty().append().html(res.body);
                $('#result').focus();
            }

            else if (res.status == "failed") {
                $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $('#result').focus();
            }
        }
    });
}

// ---------- [ Delete post ] ----------------
function deletePost(post_id, url, div) {
    swal({
        title: "Are you sure to delete?",
        /*text: "Are you sure to delete?",*/
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + "/" + post_id,
                    method: 'delete',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        if (res.status == "success") {
                            $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                            $('#' + div).empty().append().html(res.body);
                            $('#result').focus();
                        }
                        else if (res.status == "failed") {
                            $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                            $('#result').focus();
                        }
                    }
                });
                /* swal("Poof! Your imaginary file has been deleted!", {
                     icon: "success",
                 });*/
            } else {

            }
        });
}