const { exit } = require("browser-sync");

// Pass csrf token in ajax header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function SaveBenificiary(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var beneficiary_name = $("#Benificiary_Name").val();
    var beneficiary_address = $("#beneficiary_address").val();
    var manufacture_address = $("#manufacture_address").val();
    var material_id = $("#material_id").val();
    var goods_id = $("#goods_id").val();
    var sub_registration = $("#sub_registration").val();
    var ind_registration = $("#ind_registration").val();
    var gov_policy = $("#gov_policy").val();
    var pan = $("#Pan_No").val();
    //var scheme_id = $("#scheme_id").val();
    var district = $("#district").val();
    var state_id = $("#state_id").val();
    var purposal_id = $("#purposal_id").val();
    var production_date = $("#production_date").val();
    var bank = $("#bank").val();


    if (beneficiary_name == "") {
        $("#Benificiary_Name").after('<span class="text-danger error"> Benificiary Name is required </span>');
        $("#Benificiary_Name")[0].scrollIntoView();
        return false;
    }
    if (beneficiary_address == "") {
        $("#beneficiary_address").after('<span class="text-danger error"> Benificiary Address is required </span>');
        $("#beneficiary_address")[0].scrollIntoView();
        return false;
    }
    if (manufacture_address == "") {
        $("#manufacture_address").after('<span class="text-danger error"> Manufacture Address is required </span>');
        $("#manufacture_address")[0].scrollIntoView();
        return false;
    }
    if (material_id == "") {
        $("#material_id").after('<br><span class="text-danger error"> Select Raw materisal </span>');
        $("#material_id")[0].scrollIntoView();
        return false;
    }
    if (goods_id == "") {
        $("#goods_id").after('<br><span class="text-danger error"> Select Finish goods </span>');
        $("#goods_id")[0].scrollIntoView();
        return false;
    }
    if (sub_registration == "") {
        $("#sub_registration").after('<span class="text-danger error"> Subsidy registration is required </span>');
        $("#sub_registration")[0].scrollIntoView();
        return false;
    }
    if (ind_registration == "") {
        $("#ind_registration").after('<span class="text-danger error"> Industry registration is required </span>');
        $("#ind_registration")[0].scrollIntoView();
        return false;
    }
    if (gov_policy == "") {
        $("#gov_policy").after('<br><span class="text-danger error"> Select Govt. Policies </span>');
        $("#gov_policy")[0].scrollIntoView();
        return false;
    }
    if (pan == "") {
        $("#Pan_No").after('<span class="text-danger error"> PAN is required </span>');
        $("#Pan_No")[0].scrollIntoView();
        return false;
    }
    if (production_date == "") {
        $("#production_date").after('<span class="text-danger error"> Production date is required </span>');
        $("#production_date")[0].scrollIntoView();
        return false;
    }
    if (purposal_id == "") {
        $("#purposal_id").after('<br><span class="text-danger error"> Select Purpose for </span>');
        $("#purposal_id")[0].scrollIntoView();
        return false;
    }
    if (state_id == "") {
        $("#state_id").after('<br><span class="text-danger error"> Select a State Name </span>');
        $("#state_id")[0].scrollIntoView();
        return false;
    }
    if (district == "") {
        $("#district").after('<br><span class="text-danger error"> Select a District Name </span>');
        $("#district")[0].scrollIntoView();
        return false;
    }
    if (bank == "") {
        $("#bank").after('<br><span class="text-danger error"> Financing Bank/Institutions Name is required </span>');
        $("#bank")[0].scrollIntoView();
        return false;
    }
    // if (scheme_id == "") {
    //     $("#scheme_id").after('<span class="text-danger error"> Select a Scheme name </span>');
    //     $("#scheme_id")[0].scrollIntoView();
    //     return false;
    // }
    var form_id = formId; //$(this).closest('form').attr('id');
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url, div, formId);
    }

    // else create post
    else {
        saveData(form_data, url, div, formId);
    }
    //   });
}


// create new post
function saveData(form_data, url, div, formId) {

    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $('form#' + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        url: url,
        method: 'post',
        data: form_data,
        dataType: 'json',
        data: dataString,
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
                $(".inner_result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $("#" + formId).trigger("reset");
                //$("#contain").html(res.body);
                $('#' + div).empty().append().html(res.body);
                $('.inner_result')[0].scrollIntoView();
                $('html, body').animate({ scrollTop: 0 }, 'slow');

            }

            else if (res.status == "failed") {
                $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $(".inner_result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $('.inner_result')[0].scrollIntoView();
            }
        }
    });
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
                $(".inner_result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $("#" + formId).trigger("reset");
                //$("#contain").html(res.body);
                $('#' + div).empty().append().html(res.body);
                $('.inner_result')[0].scrollIntoView();
                $('html, body').animate({ scrollTop: 0 }, 'slow');

            }

            else if (res.status == "failed") {
                $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $(".inner_result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $('.inner_result')[0].scrollIntoView();
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
                $(".inner_result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $('#' + div).empty().append().html(res.body);
                $('.inner_result')[0].scrollIntoView();
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            }

            else if (res.status == "failed") {
                $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $(".inner_result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                $('.inner_result')[0].scrollIntoView();
                $('html, body').animate({ scrollTop: 0 }, 'slow');
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
                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                        }
                        else if (res.status == "failed") {
                            $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                            $('html, body').animate({ scrollTop: 0 }, 'slow');
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
