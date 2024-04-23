const { exit } = require("browser-sync");
const { Tooltip } = require("chart.js");

// Pass csrf token in ajax header
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// search result
function search(url, div, formId) {
    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        method: "get",
        url: url,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
            }
        },
        error: function () {
            alert("Error!");
            //disabledButton('ajaxLoadPage', 'button', false);
        },
    });
}

// search result
function searchWithInput(btnId, url, div, formId, textId) {
    var errors = 0;
    var sucess = 0;

    $("#" + formId + " :input").map(function () {
        if (!$(this).val()) {
            errors++;
        } else if ($(this).val()) {
            sucess++;
            $(".result").html("");
        }
    });

    if (sucess == 0) {
        $(".result").html(
            "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply a search criteria ! </div>"
        );
        $("html, body").animate({ scrollTop: 0 }, "slow");
        $("#" + textId)[0].focus();
        return false;
    }

    // if (formId == "generateDisbursementReport") {
    //     if ($("#scheme_id").val() == "") {
    //         $(".result").html(
    //             "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply scheme name ! </div>"
    //         );
    //         $("html, body").animate({ scrollTop: 0 }, "slow");
    //         return false;
    //     }
    // }
    // if (formId == "generateClaimReport") {
    //     if ($("#scheme_id").val() == "") {
    //         $(".result").html(
    //             "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply scheme name ! </div>"
    //         );
    //         $("html, body").animate({ scrollTop: 0 }, "slow");
    //         return false;
    //     }
    // }
    // if (formId == "generateFundReport") {
    //     if ($("#scheme_id").val() == "") {
    //         $(".result").html(
    //             "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply scheme name ! </div>"
    //         );
    //         $("html, body").animate({ scrollTop: 0 }, "slow");
    //         return false;
    //     }
    // }

    // if (formId == "generateSectorWiseReport") {
    //     if ($("#sector_id").val() == "") {
    //         $(".result").html(
    //             "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply sector name ! </div>"
    //         );
    //         $("html, body").animate({ scrollTop: 0 }, "slow");
    //         return false;
    //     }

        // if ($("#scheme_id").val() == "") {
        //     $(".result").html(
        //         "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply scheme name ! </div>"
        //     );
        //     $("html, body").animate({ scrollTop: 0 }, "slow");
        //     return false;
        // }
   // }
    // if (formId == "generateCompositReport") {
    //     if ($("#scheme_id").val() == "") {
    //         $(".result").html(
    //             "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply scheme name ! </div>"
    //         );
    //         $("html, body").animate({ scrollTop: 0 }, "slow");
    //         return false;
    //     }
    // }
    $(".result").html("");
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            $("#btnPrint").attr("disabled", true);
            $("#dataExport").attr("disabled", true);
            $("#btnExport").attr("disabled", true);
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                //$("#contain").html(result.body);
                $("#btnPrint").removeAttr("disabled");
                $("#dataExport").removeAttr("disabled");
                $("#btnExport").removeAttr("disabled");
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body)
                    .trigger("example");
                doChosen();
                paginationTbl();
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// search result
function changePassword(btnId, url, formId) {
    if ($("#current_pwd").val() == "") {
        $(".result").html(
            "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply current password ! </div>"
        );
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    }
    if ($("#new_pwd").val() == "") {
        $(".result").html(
            "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply new password ! </div>"
        );
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    }
    if ($("#confirm_pwd").val() == "") {
        $(".result").html(
            "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply confirm password ! </div>"
        );
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    }
    $(".result").html("");
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        method: "post",
        // beforeSend: function () {
        //     $('.ajax-loader').css("visibility", "visible");
        // },
        url: url,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $("#return").empty().append().html(result.body);
                fnCmnSuccessMessage(result.message);
                $("form#" + formId).trigger("reset");
            }
            if (result.status == "failed") {
                fnCmnAllertMessage(result.message);
            }
        },
        // complete: function () {
        //     $('.ajax-loader').css("visibility", "hidden");
        // }
    });
}

// search result with two datatable
function searchWithInputWithTwoDatatable(btnId, url, div, formId, textId) {
    var errors = 0;
    var sucess = 0;
    $("#" + formId + " :input").map(function () {
        if (!$(this).val()) {
            errors++;
        } else if ($(this).val()) {
            sucess++;
            $(".result").html("");
        }
    });
    if (sucess == 0) {
        $(".result").html(
            "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Supply a search criteria ! </div>"
        );
        $("html, body").animate({ scrollTop: 0 }, "slow");
        $("#" + textId)[0].focus();
        return false;
    }
    $(".result").html("");
    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body)
                    .trigger("example");
                doChosen();
                paginationTbl();
            }
        },
        error: function () {
            alert("Error!");
            $(".ajax-loader").css("visibility", "hidden");
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// search result
function searchClaimBenificiary(url, div, formId) {
    var scheme_id = $("#claim_scheme_id").val();
    var bank_name = $("#claim_bank_name").val();
    if (scheme_id == "") {
        $("#claim_scheme_id").after(
            '<br><span class="text-danger error"> Alert! Select a Scheme ! </span>'
        );
        $("#claim_scheme_id")[0].scrollIntoView();
        $("#claim_scheme_id")[0].focus();
        return false;
    }
    // if (bank_name == "") {
    //     $("#claim_bank_name").after('<br><span class="text-danger error"> Select a Bank </span>');
    //     $('#claim_bank_name')[0].scrollIntoView();
    //     $('#claim_bank_name')[0].focus();
    //     return false;
    // }
    $(".result").html("");
    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
            }
        },
        error: function () {
            alert("Error!");
            $(".ajax-loader").css("visibility", "hidden");
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// loading modal form
function addModal(url, div, formId) {
    $.ajax({
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                //$("#contain").html(result.body);
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + "editMaster").empty();
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                // to facus on first enabled and visible input dimanically
                $("#" + formId + " :input:enabled:visible:first").focus();
                doChosen();
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// loading modal form
function addModalMaster(id, url, div, formId, MODE, module) {
    // disabledButton('ajaxLoadPage', 'button', true);
    $.ajax({
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url + "/" + id + "/" + MODE,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $(".result").empty("");
                // $("#" + formId).trigger("resultet");
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                // to facus on first enabled and visible input dimanically
                $("#" + formId + " :input:enabled:visible:first").focus();
                //$("#contain").html(result.body);
                $("#" + "editMaster").empty();
                if (MODE === "VIW") {
                    $(".modal-title").html("View " + module);
                    // hide button
                    $("#createBtn").addClass("d-none");
                    $("#submitBtn").addClass("d-none");
                    $("#resultetBtn").addClass("d-none");
                }
                if (MODE === "EDT") {
                    $(".modal-title").html("Edit " + module);
                    // pass data to input fields
                    /*  $("#title").attr("readonly", "false");
                      $("#title").val(title);*/
                    $("#createBtn").text("Update");
                    $("#createBtn").addClass("mdi mdi-content-save");
                    // hide button
                }
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

function disbursementModal(url, div, formId, id, claim_id) {
    // disabledButton('ajaxLoadPage', 'button', true);
    $.ajax({
        method: "GET",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url + "/" + id + "/" + claim_id,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                //$("#contain").html(result.body);
                $("#" + "editMaster").empty();
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                $("#paymentDiv").empty().append().html(result.body1);
                // to facus on first enabled and visible input dimanically
                $("#" + formId + " :input:enabled:visible:first").focus();
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// loading modal form
function addAllocationModal(url, div, formId, fund_id, scheme_id) {
    /* convert the JSON object into string */
    var markers = { fund_id: fund_id, scheme_id: scheme_id };
    var dataString = JSON.stringify(markers);
    // disabledButton('ajaxLoadPage', 'button', true);
    $.ajax({
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                //$("#contain").html(result.body);
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + "editMaster").empty();
                $("#access_deny").addClass("d-none");
                $("#modal_content").removeClass("d-none");
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                // to facus on first enabled and visible input dimanically
                $("#" + formId + " :input:enabled:visible:first").focus();
                //paginationTblWithFourDatatable();
                paginationInnerTbl();
            } else if (result.status == "access_deny") {
                $("#access_deny").removeClass("d-none");
                $("#modal_content").addClass("d-none");
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// loading modal form
function addClaimModal(url, benificiaryId, div, formId) {
    // disabledButton('ajaxLoadPage', 'button', true);
    $.ajax({
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                //$("#contain").html(result.body);
                $("#" + "editMaster").empty();
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                // to facus on first enabled and visible input dimanically
                $("#" + formId + " :input:enabled:visible:first").focus();
                $("#benificiary_id").val(benificiaryId);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

//----- [ button click function ] ----------
function SavePost(url, formId) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();

    var title = $("#title").val();
    var description = $("#description").val();
    if (title == "") {
        $("#title").after(
            '<span class="text-danger error"> Title is required </span>'
        );
        $("#title")[0].scrollIntoView();
        return false;
    }
    if (description == "") {
        $("#description").after(
            '<span class="text-danger error"> Description is required </span>'
        );
        $("#description")[0].scrollIntoView();
        return false;
    }
    var form_id = formId; //$(this).closest('div').prev('div').children('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(form_data, url);
    }

    // else create post
    else {
        createPost(form_data, url);
    }
}

function SaveRawMaterial(
    url,
    formId,
    div,
    material_id_hidden,
    titleid,
    descriptionid
) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#" + titleid).val();
    var Unit_Id_Fk = $("#Unit_Id_Fk").val();
    var description = $("#" + descriptionid).val();

    if (title == "") {
        $("#" + titleid).after(
            '<span class="text-danger error"> Raw material is required </span>'
        );
        $("#" + titleid)[0].scrollIntoView();
        return false;
    }
    if (Unit_Id_Fk == "") {
        $("#Unit_Id_Fk").after(
            '<br><span class="text-danger error"> Unit name is required </span>'
        );
        $("#Unit_Id_Fk")[0].scrollIntoView();
        return false;
    }
    if (description == "") {
        $("#" + descriptionid).after(
            '<span class="text-danger error"> Description is required </span>'
        );
        $("#" + descriptionid)[0].scrollIntoView();
        return false;
    }
    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#" + material_id_hidden).val() != "") {
        updatePost(
            $("#" + material_id_hidden).val(),
            form_data,
            url,
            div,
            form_id
        );
    }

    // else create post
    else {
        $("#editMaterial").empty();
        createPost(form_data, url, div, form_id);
    }
    //   });
}

function SaveUnit(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Unit_Name").val();
    var description = $("#Description").val();
    if (title == "") {
        $("#Unit_Name").after(
            '<span class="text-danger error"> Unit Name is required </span>'
        );
        $("#Unit_Name")[0].scrollIntoView();
        return false;
    }
    if (description == "") {
        $("#Description").after(
            '<span class="text-danger error"> Description is required </span>'
        );
        $("#Description")[0].scrollIntoView();
        return false;
    }

    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost($("#id_hidden").val(), form_data, url, div, form_id);
    }

    // else create post
    else {
        createPost(form_data, url, div, form_id);
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
        $("#Goods_Name").after(
            '<span class="text-danger error"> Finish Goods is required </span>'
        );
        $("#Goods_Name")[0].scrollIntoView();
        return false;
    }
    if (description == "") {
        $("#Description").after(
            '<span class="text-danger error"> Description is required </span>'
        );
        $("#Description")[0].scrollIntoView();
        return false;
    }

    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost($("#id_hidden").val(), form_data, url, div, form_id);
    }

    // else create post
    else {
        createPost(form_data, url, div, form_id);
    }
    //   });
}

function SaveFunds(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var Sanction_Letter = $("#Sanction_Letter").val();
    var Sanction_Date = $("#Sanction_Date").val();
    var Sanction_Amount = $("#Sanction_Amount").val();
    var Bank_Master_Id = $("#Bank_Account_Id").val();
    var Scheme_Id = $("#Scheme_Id").val();

    if (Sanction_Letter == "") {
        $("#Sanction_Letter").after(
            '<span class="text-danger error"> Sanction Letter is required </span>'
        );
        $("#Sanction_Letter")[0].scrollIntoView();
        return false;
    }
    if (Sanction_Date == "") {
        $("#Sanction_Date").after(
            '<span class="text-danger error"> Sanction Date is required </span>'
        );
        $("#Sanction_Date")[0].scrollIntoView();
        return false;
    }
    if (Sanction_Amount == "") {
        $("#Sanction_Amount").after(
            '<span class="text-danger error"> Sanction Amount is required </span>'
        );
        $("#Sanction_Amount")[0].scrollIntoView();
        return false;
    }
    if (Bank_Master_Id == "") {
        $("#Bank_Account_Id").after(
            '<br><span class="text-danger error"> Select Bank Account </span>'
        );
        $("#Bank_Account_Id")[0].scrollIntoView();
        return false;
    }
    if (Scheme_Id == "") {
        $("#Scheme_Id").after(
            '<span class="text-danger error"> Select Scheme Name </span>'
        );
        $("#Scheme_Id")[0].scrollIntoView();
        return false;
    }
    /* if(!AmountValidation('#Sanction_Amount'))
     {
         $("#Sanction_Amount").after('<span class="text-danger error"> Invalid value </span>');
         return false;
     }*/

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

function SaveSubsidyFunds(id, url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var Sanction_Letter = $("#Sanction_Letter").val();
    var Sanction_Date = $("#Sanction_Date").val();
    var Sanction_Amount = $("#Sanction_Amount").val();
    var Bank_Master_Id = $("#Bank_Account_Id").val();
    var Scheme_Id = $("#Scheme_Id").val();
    var Year = $("#Year").val();
    if (Sanction_Letter == "") {
        $("#Sanction_Letter").after(
            '<span class="text-danger error"> Sanction Letter is required </span>'
        );
        $("#Sanction_Letter")[0].scrollIntoView();
        return false;
    }
    if (Sanction_Date == "") {
        $("#Sanction_Date").after(
            '<span class="text-danger error"> Sanction Date is required </span>'
        );
        $("#Sanction_Date")[0].scrollIntoView();
        return false;
    }
    if (Sanction_Amount == "") {
        $("#Sanction_Amount").after(
            '<span class="text-danger error"> Sanction Amount is required </span>'
        );
        $("#Sanction_Amount")[0].scrollIntoView();
        return false;
    }
    if (Year == "") {
        $("#Year").after(
            '<span class="text-danger error"> Number of Year is required </span>'
        );
        $("#Year")[0].scrollIntoView();
        return false;
    }
    if (Bank_Master_Id == "") {
        $("#Bank_Account_Id").after(
            '<br><span class="text-danger error"> Select Bank Account </span>'
        );
        $("#Bank_Account_Id")[0].scrollIntoView();
        return false;
    }
    if (Scheme_Id == "") {
        $("#Scheme_Id").after(
            '<span class="text-danger error"> Select Scheme Name </span>'
        );
        $("#Scheme_Id")[0].scrollIntoView();
        return false;
    }

    /* if(!AmountValidation('#Sanction_Amount'))
     {
         $("#Sanction_Amount").after('<span class="text-danger error"> Invalid value </span>');
         return false;
     }*/

    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist

    if ($("#id_hidden").val() != "") {
        updatePost(id, form_data, url, div, form_id);
    }

    // else create post
    else {
        createPost(form_data, url, div, form_id);
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
    var Account_No = $("#Account_No").val();
    var Branch_Name = $("#Branch_Name").val();
    var Subsidy_Scheme = $("#Scheme_Id_Fk").val();
    if (title == "") {
        $("#Bank_Name").after(
            '<span class="text-danger error"> Bank Name is required </span>'
        );
        $("#Bank_Name")[0].scrollIntoView();
    }
    if (Account_No == "") {
        $("#Account_No").after(
            '<span class="text-danger error"> Account No. is required </span>'
        );
        $("#Account_No")[0].scrollIntoView();
        return false;
    }
    if (Branch_Name == "") {
        $("#Branch_Name").after(
            '<span class="text-danger error"> Branch Name is required </span>'
        );
        $("#Branch_Name")[0].scrollIntoView();
        return false;
    }
    if (Subsidy_Scheme == "") {
        $("#Scheme_Id_Fk").after(
            '<br><span class="text-danger error"> Select Subsidy Scheme </span>'
        );
        $("#Scheme_Id_Fk")[0].scrollIntoView();
        return false;
    }

    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost($("#id_hidden").val(), form_data, url, div, form_id);
    }

    // else create post
    else {
        createPost(form_data, url, div, form_id);
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
        $("#Reason_Details").after(
            '<span class="text-danger error"> Remarks is required </span>'
        );
        $("#Reason_Details")[0].scrollIntoView();
    }
    if (description == "") {
        $("#Description").after(
            '<span class="text-danger error"> Description is required </span>'
        );
        $("#Description")[0].scrollIntoView();
        return false;
    }

    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost($("#id_hidden").val(), form_data, url, div, form_id);
    }

    // else create post
    else {
        createPost(form_data, url, div, form_id);
    }
    //   });
}
function SaveSubsidy(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var title = $("#Scheme_Name").val();
    var policy = $("#Gov_policy").val();
    var year = $("#Year").val();
    var short_form = $("#Short_form").val();
    if (title == "") {
        $("#Scheme_Name").after(
            '<span class="text-danger error"> Scheme Name is required </span>'
        );
        $("#Scheme_Name")[0].scrollIntoView();
    }
    if (policy == "") {
        $("#Gov_policy").after(
            '<br><span class="text-danger error"> Select a policy </span>'
        );
        $("#Gov_policy")[0].scrollIntoView();
        return false;
    }
    if (year == "") {
        $("#Year").after(
            '<br><span class="text-danger error">Enter Year </span>'
        );
        $("#Year")[0].scrollIntoView();
        return false;
    }
    if (short_form == "") {
        $("#Short_form").after(
            '<br><span class="text-danger error">Select short form </span>'
        );
        $("#Short_form")[0].scrollIntoView();
        return false;
    }
    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost($("#id_hidden").val(), form_data, url, div, form_id);
    }

    // else create post
    else {
        createPost(form_data, url, div, form_id);
    }
    //   });
}

function SaveBenificiary(id, url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var beneficiary_name = $("#Benificiary_Name").val();
    var district = $("#district").val();
    var state_id = $("#state_id").val();
    var beneficiary_addresults = $("#beneficiary_addresults").val();
    var manufacture_addresults = $("#manufacture_addresults").val();
    var gov_policy = $("#gov_policy").val();
    // var pan = $("#Pan_No").val();
    var sub_registration = $("#sub_registration").val();
    // var sub_registration_date = $("#sub_registration_date").val();
    // var ind_registration = $("#ind_registration").val();
    // var ind_registration_date = $("#ind_registration_date").val();
    var sector_id = $("#sector_id").val();

    var purposal_id = $("#purposal_id").val();
    var production_date = $("#production_date").val();
    var unit_id = $("#unit_id").val();
    var Bank_Id = $("#Bank_Id").val();
    var gov_policy = $("#gov_policy").val();

    if (beneficiary_name == "") {
        $("#Benificiary_Name").after(
            '<span class="text-danger error"> Benificiary Name is required </span>'
        );
        $("#Benificiary_Name")[0].scrollIntoView();
        return false;
    }
    if (state_id == "") {
        $("#state_id").after(
            '<br><span class="text-danger error"> Select a State Name </span>'
        );
        $("#state_id")[0].scrollIntoView();
        return false;
    }
    if (district == "") {
        $("#district").after(
            '<br><span class="text-danger error"> Select a District Name </span>'
        );
        $("#district")[0].scrollIntoView();
        return false;
    }
    if (beneficiary_addresults == "") {
        $("#beneficiary_addresults").after(
            '<br><span class="text-danger error"> Benificiary Addresults is required </span>'
        );
        $("#beneficiary_addresults")[0].scrollIntoView();
        return false;
    }
    if (manufacture_addresults == "") {
        $("#manufacture_addresults").after(
            '<br><span class="text-danger error"> Manufacture Addresults is required </span>'
        );
        $("#manufacture_addresults")[0].scrollIntoView();
        return false;
    }
    // if (pan == "") {
    //     $("#Pan_No").after('<span class="text-danger error"> PAN is required </span>');
    //     $("#Pan_No")[0].scrollIntoView();
    //     return false;
    // }
    // if (sub_registration == "") {
    //     $("#sub_registration").after(
    //         '<span class="text-danger error"> Subsidy registration is required </span>'
    //     );
    //     $("#sub_registration")[0].scrollIntoView();
    //     return false;
    // }
    // if (sub_registration_date == "") {
    //     $("#sub_registration_date").after('<br><span class="text-danger error"> Subsidy registration date is required </span>');
    //     $("#sub_registration_date")[0].scrollIntoView();
    //     return false;
    // }
    // if (ind_registration == "") {
    //     $("#ind_registration").after('<span class="text-danger error"> Industry registration is required </span>');
    //     $("#ind_registration")[0].scrollIntoView();
    //     return false;
    // }
    // if (ind_registration_date == "") {
    //     $("#ind_registration_date").after('<br><span class="text-danger error"> Industry registration date is required </span>');
    //     $("#ind_registration_date")[0].scrollIntoView();
    //     return false;
    // }

    if (production_date == "") {
        $("#production_date").after(
            '<span class="text-danger error"> Production date is required </span>'
        );
        $("#production_date")[0].scrollIntoView();
        return false;
    }
    if (purposal_id == "") {
        $("#purposal_id").after(
            '<br><span class="text-danger error"> Select Purpose for </span>'
        );
        $("#purposal_id")[0].scrollIntoView();
        return false;
    }
    if (unit_id == "") {
        $("#unit_id").after(
            '<br><span class="text-danger error"> Select Unite Type </span>'
        );
        $("#unit_id")[0].scrollIntoView();
        return false;
    }
    //if (Bank_Id == "") {
    //    $("#Bank_Id").after('<br><br><span class="text-danger error">Select Financing Bank/Institutions</span>');
    //    $("#Bank_Id")[0].scrollIntoView();
    //    return false;
    //}
    if (sector_id == "") {
        $("#sector_id").after(
            '<span class="text-danger error"> Select a Sector name </span>'
        );
        $("#sector_id")[0].scrollIntoView();
        return false;
    }
    if (gov_policy == "") {
        $("#gov_policy").after(
            '<br><span class="text-danger error"> Select Govt. Policies. </span>'
        );
        $("#gov_policy")[0].scrollIntoView();
        return false;
    }

    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(id, form_data, url, div, form_id);
    }

    // else create post
    else {
        saveData(form_data, url, div, form_id);
    }
    //   });
}

function SaveSubsidyClaim(id, url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var scheme_id = $("#scheme_id").val();
    var scheme_span = $("scheme_span");
    var remarks_id = $("#remarks_id").val();
    var Benificiary_Id = $("#Benificiary_Id").val();
    var audit_status = $("#audit_status").val();
    //var slc_date = $("#slc_date").val();
    var claim_receive_date = $("#claim_receive_date").val();
    var id_hidden_short_name = $("#id_hidden_short_name").val();
    var claim_to = $("#claim_to").val();
    var claim_from = $("#claim_from").val();

    //CCIS_CCIIAC
    var c_file_volume = $("#c_file_volume").val();
    var c_investment_on_plant = $("#c_investment_on_plant").val();
    var c_investment_on_building = $("#c_investment_on_building").val();
    var c_approve_cs_on_plant = $("#c_approve_cs_on_plant").val();
    var c_subsidy_claim_amount = $("#c_subsidy_claim_amount").val();
    var c_under_eccc = $("#c_under_eccc").val();
    var c_ec_cc_date = $("#c_ec_cc_date").val();
    //TSS_FSS_TI
    var a_file_volume = $("#a_file_volume").val();
    var a_raw_material = $("#a_raw_material").val();
    var a_finish_goods = $("#a_finish_goods").val();
    var a_raw_approve_ts = $("#a_raw_approve_ts").val();
    var a_goods_approve_ts = $("#a_goods_approve_ts").val();
    var a_subsidy_claim_amount = $("#a_subsidy_claim_amount").val();
    //INS_CCII
    var e_sum_insured = $("#e_sum_insured").val();
    var e_insured_stock = $("#e_insured_stock").val();
    var e_value_covered = $("#e_value_covered").val();
    var e_premium_actualy_paid = $("#e_premium_actualy_paid").val();
    var e_refund = $("#e_refund").val();
    var e_premium_eligible = $("#e_premium_eligible").val();
    var e_commencement_date = $("#e_commencement_date").val();
    var e_insurance_policy = $("#e_insurance_policy").val();
    var e_file_volume = $("#e_file_volume").val();
    var e_endorsement_policy = $("#e_endorsement_policy").val();
    var e_subsidy_claim_amount = $("#e_subsidy_claim_amount").val();
    //CIS
    var d_file_volume = $("#d_file_volume").val();
    var d_approved_interesultt_subsidy = $(
        "#d_approved_interesultt_subsidy"
    ).val();
    var d_subsidy_claim_amount = $("#d_subsidy_claim_amount").val();

    if (scheme_id == "") {
        $("#scheme_span").html(
            '<span class="text-danger error"> Select Benificiary Name </span>'
        );
        $("#scheme_id")[0].scrollIntoView();
        return false;
    }
    if (Benificiary_Id == "") {
        $("#benificiary_span").html(
            '<span class="text-danger error"> Select Benificiary Name </span>'
        );
        $("#Benificiary_Id")[0].scrollIntoView();
        return false;
    }
    if (audit_status == "") {
        $("#audit_status").after(
            '<br><span class="text-danger error"> Select Audit status </span>'
        );
        $("#audit_status")[0].scrollIntoView();
        return false;
    }
    // if (remarks_id == "") {
    //     $("#remarks_id").after(
    //         '<br><span class="text-danger error"> Select Remark  </span>'
    //     );
    //     $("#remarks_id")[0].scrollIntoView();
    //     return false;
    // }
    $("input[id *= 'slc_date']").each(function () {
        if (!$(this).val().trim()) {
            $(this).after(
                '<br><span class="text-danger error"> SLC Date is required  </span>'
            );
            $(this)[0].scrollIntoView();
            die();
        }
    });
    // if (slc_date == "") {
    //     $("#slc_date").after('<span class="text-danger error"> SLC Date is required </span>');
    //     $("#slc_date")[0].scrollIntoView();
    //     return false;
    // }

    if (claim_receive_date == "") {
        $("#claim_receive_date").after(
            '<span class="text-danger error"> Claim Receipt Date is required  </span>'
        );
        $("#claim_receive_date")[0].scrollIntoView();
        return false;
    }
    if (!(id_hidden_short_name == "CCIS" || id_hidden_short_name == "CCIIAC")) {
        if (claim_from == "") {
            $("#claim_from").after(
                '<span class="text-danger error"> Claim from Date is required  </span>'
            );
            $("#claim_from")[0].scrollIntoView();
            return false;
        }
        if (claim_to == "") {
            $("#claim_to").after(
                '<span class="text-danger error"> Claim to Date is required  </span>'
            );
            $("#claim_to")[0].scrollIntoView();
            return false;
        }
    }
    //CCIS_CCIIAC
    if (id_hidden_short_name == "CCIS" || id_hidden_short_name == "CCIIAC") {
        if (c_file_volume == "") {
            $("#c_file_volume").after(
                '<span class="text-danger error"> File volume is required  </span>'
            );
            $("#c_file_volume")[0].scrollIntoView();
            return false;
        }
        // if (c_investment_on_plant == "") {
        //     $("#c_investment_on_plant").after(
        //         '<span class="text-danger error"> Value is required </span>'
        //     );
        //     $("#c_investment_on_plant")[0].scrollIntoView();
        //     return false;
        // }
        // if (c_investment_on_building == "") {
        //     $("#c_investment_on_building").after(
        //         '<span class="text-danger error"> Value is required </span>'
        //     );
        //     $("#c_investment_on_building")[0].scrollIntoView();
        //     return false;
        // }
        if (c_approve_cs_on_plant == "") {
            $("#c_approve_cs_on_plant").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#c_approve_cs_on_plant")[0].scrollIntoView();
            return false;
        }
        if (parseInt(c_subsidy_claim_amount) <= 0) {
            $("#c_subsidy_claim_amount").after(
                '<span class="text-danger error"> Subsidy Claim Amount is required </span>'
            );
            $("#c_subsidy_claim_amount")[0].scrollIntoView();
            return false;
        }
    }
    //TSS_FSS_TI
    if (
        id_hidden_short_name == "TSS" ||
        id_hidden_short_name == "FSS" ||
        id_hidden_short_name == "TI"
    ) {
        if (a_file_volume == "") {
            $("#a_file_volume").after(
                '<span class="text-danger error"> File volume is required  </span>'
            );
            $("#a_file_volume")[0].scrollIntoView();
            return false;
        }
        // if (a_raw_material == "") {
        //     $("#a_raw_material").after('<span class="text-danger error"> Raw material is required </span>');
        //     $("#a_raw_material")[0].scrollIntoView();
        //     return false;
        // }
        // if (a_finish_goods == "") {
        //     $("#a_finish_goods").after('<span class="text-danger error"> Raw material is required  </span>');
        //     $("#a_finish_goods")[0].scrollIntoView();
        //     return false;
        // }
        if (a_raw_approve_ts == "") {
            $("#a_raw_approve_ts").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#a_raw_approve_ts")[0].scrollIntoView();
            return false;
        }
        if (a_goods_approve_ts == "") {
            $("#a_goods_approve_ts").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#a_goods_approve_ts")[0].scrollIntoView();
            return false;
        }
        if (parseInt(a_subsidy_claim_amount) <= 0) {
            $("#a_subsidy_claim_amount").after(
                '<span class="text-danger error"> Subsidy Claim Amount is required </span>'
            );
            $("#a_subsidy_claim_amount")[0].scrollIntoView();
            return false;
        }
    }
    //INS_CCII
    if (id_hidden_short_name == "INS" || id_hidden_short_name == "CCII") {
        if (e_sum_insured == "") {
            $("#e_sum_insured").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#e_sum_insured")[0].scrollIntoView();
            return false;
        }
        // if (e_insured_stock == "") {
        //     $("#e_insured_stock").after(
        //         '<span class="text-danger error"> Value is required </span>'
        //     );
        //     $("#e_insured_stock")[0].scrollIntoView();
        //     return false;
        // }
        if (e_value_covered == "") {
            $("#e_value_covered").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#e_value_covered")[0].scrollIntoView();
            return false;
        }
        if (e_premium_actualy_paid == "") {
            $("#e_premium_actualy_paid").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#e_premium_actualy_paid")[0].scrollIntoView();
            return false;
        }
        // if (e_refund == "") {
        //     $("#e_refund").after('<span class="text-danger error"> Value is required </span>');
        //     $("#e_refund")[0].scrollIntoView();
        //     return false;
        // }
        if (e_premium_eligible == "") {
            $("#e_premium_eligible").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#e_premium_eligible")[0].scrollIntoView();
            return false;
        }
        // if (e_commencement_date == "") {
        //     $("#e_commencement_date").after(
        //         '<span class="text-danger error"> Commencement date is required </span>'
        //     );
        //     $("#e_commencement_date")[0].scrollIntoView();
        //     return false;
        // }
        // if (e_insurance_policy == "") {
        //     $("#e_insurance_policy").after(
        //         '<span class="text-danger error"> Enter insurance policy no. </span>'
        //     );
        //     $("#e_insurance_policy")[0].scrollIntoView();
        //     return false;
        // }
        if (e_file_volume == "") {
            $("#e_file_volume").after(
                '<span class="text-danger error"> File volume is required </span>'
            );
            $("#e_file_volume")[0].scrollIntoView();
            return false;
        }
        // if (e_endorsement_policy == "") {
        //     $("#e_endorsement_policy").after(
        //         '<span class="text-danger error">Enter endorsement policy no. </span>'
        //     );
        //     $("#e_endorsement_policy")[0].scrollIntoView();
        //     return false;
        // }

        if (parseInt(e_subsidy_claim_amount) <= 0) {
            $("#e_subsidy_claim_amount").after(
                '<span class="text-danger error"> Subsidy Claim Amount is required </span>'
            );
            $("#e_subsidy_claim_amount")[0].scrollIntoView();
            return false;
        }
    }
    //CIS
    if (id_hidden_short_name == "CIS") {
        if (d_file_volume == "") {
            $("#d_file_volume").after(
                '<span class="text-danger error"> File volume is required  </span>'
            );
            $("#d_file_volume")[0].scrollIntoView();
            return false;
        }
        if (d_approved_interesultt_subsidy == "") {
            $("#d_approved_interesultt_subsidy").after(
                '<span class="text-danger error"> Value is required </span>'
            );
            $("#d_approved_interesultt_subsidy")[0].scrollIntoView();
            return false;
        }
        if (parseInt(d_subsidy_claim_amount) <= 0) {
            $("#d_subsidy_claim_amount").after(
                '<span class="text-danger error"> Subsidy Claim Amount is required </span>'
            );
            $("#d_subsidy_claim_amount")[0].scrollIntoView();
            return false;
        }
    }
    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updatePost(id, form_data, url, div, form_id);
    }

    // else create post
    else {
        saveData(form_data, url, div, form_id);
    }
    //   });
}

function SaveDisbursement(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var account_no = $("#account_no").val();
    var ifsc_code = $("#ifsc_code").val();
    var bank_name = $("#bank_name").val();
    var payment_mode = $("#payment_mode").val();
    var insurance_no = $("#insurance_no").val();
    var instrument_date = $("#instrument_date").val();
    var paid_amount = $("#paid_amount").val();
    var narration = $("#narration").val();
    var total_amount = $("#hid_total_amount").val();
    var Allocation_Id = $("#Allocation_Id").val();
    var Claim_Id = $("#Claim_Id").val();

    if (payment_mode == "") {
        $("#payment_mode").after(
            '<br><span class="text-danger error"> Select payment mode </span>'
        );
        $("#payment_mode")[0].scrollIntoView();
        return false;
    }
    if (bank_name == "") {
        $("#bank_name").after(
            '<br><span class="text-danger error"> Enter bank name </span>'
        );
        $("#bank_name")[0].scrollIntoView();
        return false;
    }
    // if (ifsc_code == "") {
    //     $("#ifsc_code").after('<br><span class="text-danger error"> Enter IFSC Code </span>');
    //     $("#ifsc_code")[0].scrollIntoView();
    //     return false;
    // }
    if (instrument_date == "") {
        $("#instrument_date").after(
            '<br><span class="text-danger error"> Enter insurance date </span>'
        );
        $("#instrument_date")[0].scrollIntoView();
        return false;
    }
    if (payment_mode == 1) {
        if (insurance_no == "") {
            $("#insurance_no").after(
                '<br><span class="text-danger error"> Enter insurance no.  </span>'
            );
            $("#insurance_no")[0].scrollIntoView();
            return false;
        }
    }
    if (paid_amount == "") {
        $("#paid_amount").after(
            '<span class="text-danger error"> Enter amount </span>'
        );
        $("#paid_amount")[0].scrollIntoView();
        return false;
    }
    if (narration == "") {
        $("#narration").after(
            '<br><span class="text-danger error"> Enter narration  </span>'
        );
        $("#narration")[0].scrollIntoView();
        return false;
    }
    // if (Math.round(paid_amount) > Math.round(total_amount)) {
    //     $(".inner_result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! Insufficent Balance </div>");
    //     $('.inner_result')[0].scrollIntoView();
    //     $('html, body').animate({ scrollTop: 0 }, 'slow');
    //     return false;
    // }
    var form_id = $(formId).closest("form").attr("id");
    //var form_id = $(this).closest('td').parent('tr').parent('tbody').parent('table').parent('form').attr('id');
    var form_data = $("#" + form_id).serialize();
    // if post id exist
    if ($("#id_hidden").val() != "") {
        updateDisbursement($("#id_hidden").val(), form_data, url, div, form_id);
    } else {
        saveDisbursementData(
            form_data,
            url,
            div,
            form_id,
            Allocation_Id,
            Claim_Id
        );
    }
    //   });
}

// create new post
function saveDisbursementData(
    form_data,
    url,
    div,
    formId,
    Allocation_Id,
    Claim_Id
) {
    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        url: url + "/" + Allocation_Id + "/" + Claim_Id,
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        data: form_data,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },

        success: function (result) {
            cmnSessionExpired(result);
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Save");

            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + formId).trigger("resultet");
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                $("#paymentDiv").empty().append().html(result.body1);
                fnCmnSuccessMessage(result.message);
                paginationTbl();
                paginationTblWithTwoDatatable();
            } else if (result.status == "failed") {
                fnCmnAllertMessage(result.message);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

function SaveUser(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var user_name = $("#user_name").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    var phone_no = $("#phone_no").val();
    var email = $("#email").val();
    var type = $("#type").val();
    if (user_name == "") {
        $("#user_name").after(
            '<span class="text-danger error"> User Name is required </span>'
        );
        $("#user_name")[0].scrollIntoView();
    }
    if (password == "") {
        $("#password").after(
            '<span class="text-danger error"> Password is required </span>'
        );
        $("#password")[0].scrollIntoView();
        return false;
    }
    if (confirm_password == "") {
        $("#confirm_password").after(
            '<span class="text-danger error"> Confirm password is required </span>'
        );
        $("#confirm_password")[0].scrollIntoView();
        return false;
    }
    if (password != confirm_password) {
        fnCmnAllertMessage("Confirm Password not same!");
        return false;
    }
    if (phone_no == "") {
        $("#phone_no").after(
            '<br><span class="text-danger error">Phone no is required </span>'
        );
        $("#phone_no")[0].scrollIntoView();
        return false;
    }
    if (email == "") {
        $("#email").after(
            '<br><span class="text-danger error"> Email no is required </span>'
        );
        $("#email")[0].scrollIntoView();
        return false;
    }
    if (type == "") {
        $("#type").after(
            '<br><span class="text-danger error"> Select user type </span>'
        );
        $("#type")[0].scrollIntoView();
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

function SaveRole(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var module_id = $("#module_id").val();
    var role_name = $("#role_name").val();
    var controller = $("#controller").val();

    if (module_id == "") {
        $("#module_id").after(
            '<span class="text-danger error"> Select module name</span>'
        );
        $("#module_id")[0].scrollIntoView();
    }
    if (role_name == "") {
        $("#role_name").after(
            '<span class="text-danger error"> Role name is required </span>'
        );
        $("#role_name")[0].scrollIntoView();
        return false;
    }
    if (controller == "") {
        $("#controller").after(
            '<span class="text-danger error"> Controller path is required </span>'
        );
        $("#controller")[0].scrollIntoView();
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

function SaveAccess(url, formId, div) {
    //----- [ button click function ] ----------
    // $("#btnSave").click(function (event) {
    event.preventDefault();
    $(".error").remove();
    $(".alert").remove();
    var user_id = $("#user_id_access").val();
    var module_id = $("#module_id_access").val();
    var role_id = $("#role_id_access").val();

    if (user_id == "") {
        $("#user_id_access").after(
            '<br><span class="text-danger error"> Select a user</span>'
        );
        $("#user_id_access")[0].scrollIntoView();
        return false;
    }
    if (module_id == "") {
        $("#module_id_access").after(
            '<br><span class="text-danger error"> Select module name</span>'
        );
        $("#module_id_access")[0].scrollIntoView();
    }
    if (role_id == "") {
        $("#role_id_access").after(
            '<br><span class="text-danger error"> Select a role </span>'
        );
        $("#role_id_access")[0].scrollIntoView();
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
function saveData(form_data, url, div, formId) {
    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        url: url,
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        data: form_data,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },

        success: function (result) {
            cmnSessionExpired(result);
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Save");

            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + formId).trigger("resultet");
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                $("#returnModel").empty().append().html(result.body1);

                //   $('#approvalBtn').prop("disabled", false);
                //$("#createBtn").text("Update");
                fnCmnSuccessMessage(result.message);
                fnCmnSchemeWiseDivHideShow();
                paginationTbl();
            } else if (result.status == "failed") {
                fnCmnAllertMessage(result.message);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

function CmnApproval(id, url, formId, div) {
    var form_id = $(formId).closest("form").attr("id");
    // disabledButton('ajaxLoadPage', 'button', true);
    var fundAllocationForm = $("form#" + form_id).serializeObject();
    // disabledButtonPaging('ajaxLoadPage', 'button', true);
    var dataString = JSON.stringify(fundAllocationForm);
    $.ajax({
        url: url + "/" + id,
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $("#approvalBtn").addClass("disabled");
            $("#approvalBtn").text("Processing..");
        },
        success: function (result) {
            cmnSessionExpired(result);
            $("#approvalBtn").removeClass("disabled");
            $("#approvalBtn").text("Submit for Approval");
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + form_id).trigger("resultet");
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                $("#createBtn").prop("disabled", true);
                $("#approvalBtn").prop("disabled", true);
                $("#createBtn").addClass("disabled");
                $("#approvalBtn").addClass("disabled");
                $(".deleteBtn").addClass("disabled");
                fnCmnSuccessMessage(result.message);
            } else if (result.status == "failed") {
                fnCmnAllertMessage(result.message);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}
// create new post
function createPost(form_data, url, div, formId) {
    $.ajax({
        url: url,
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        data: form_data,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },

        success: function (result) {
            cmnSessionExpired(result);
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Save");

            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + formId).trigger("resultet");
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                $("#returnModel").empty().append().html(result.body1);
                fnCmnSuccessMessage(result.message);
            } else if (result.status == "failed") {
                fnCmnAllertMessage(result.message);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// update post
function updatePost(id, form_data, url, div, formId) {
    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        url: url + "/" + id,
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        data: form_data,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },
        success: function (result) {
            cmnSessionExpired(result);
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Update");
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                //$("#" + formId).trigger("resultet");
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                $("#viewEditModal").empty().append().html(result.body1);
                $("#returnModel").empty().append().html(result.body1);
                $("#afterSave").empty().append().html(result.body1);
                $("#paymentDiv").empty().append().html(result.body1);
                //  $('#afterEdit').empty().append().html(result.body1);
                fnCmnSuccessMessage(result.message);
                fnCmnSchemeWiseDivHideShow();
                paginationTbl();
            } else if (result.status == "failed") {
                fnCmnAllertMessage(result.message);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// update post
function updateDisbursement(id, form_data, url, div, formId) {
    // disabledButton('ajaxLoadPage', 'button', true);
    var createForm = $("form#" + formId).serializeObject();
    /* convert the JSON object into string */
    var dataString = JSON.stringify(createForm);
    $.ajax({
        url: url + "/" + id,
        method: "post",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        data: form_data,
        dataType: "json",
        data: dataString,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $("#createBtn").addClass("disabled");
            $("#createBtn").text("Processing..");
        },
        success: function (result) {
            cmnSessionExpired(result);
            $("#createBtn").removeClass("disabled");
            $("#createBtn").text("Update");
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                //$("#" + formId).trigger("resultet");
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                $("#viewEditModal").empty().append().html(result.body1);
                $("#returnModel").empty().append().html(result.body1);
                $("#afterSave").empty().append().html(result.body1);
                $("#paymentDiv").empty().append().html(result.body1);
                //  $('#afterEdit').empty().append().html(result.body1);
                fnCmnSuccessMessage(result.message);
                fnCmnSchemeWiseDivHideShow();
                paginationTbl();
                paginationTblWithTwoDatatable();
            } else if (result.status == "failed") {
                fnCmnAllertMessage(result.message);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
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
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url + "/" + post_id,
                method: "delete",
                beforeSend: function () {
                    $(".ajax-loader").css("visibility", "visible");
                },
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },

                success: function (result) {
                    cmnSessionExpired(result);
                    if (result.status == "success") {
                        $(".ajax-loader").css("visibility", "hidden");
                        $("#" + div)
                            .empty()
                            .append()
                            .html(result.body);
                        fnCmnSuccessMessage(result.message);
                        paginationTbl();
                    } else if (result.status == "access_deny") {
                        $(document).ready(function () {
                            jQuery.noConflict();
                            $("#myModal").modal("show");
                        });
                    } else if (result.status == "failed") {
                        fnCmnAllertMessage(result.message);
                    }
                },
                complete: function () {
                    $(".ajax-loader").css("visibility", "hidden");
                },
            });
            /* swal("Poof! Your imaginary file has been deleted!", {
                     icon: "success",
                 });*/
        } else {
        }
    });
}

// ---------- [ Delete post ] ----------------
function deleteAllocation(post_id, url, div) {
    swal({
        title: "Are you sure to delete?",
        /*text: "Are you sure to delete?",*/
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url + "/" + post_id,
                method: "delete",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },

                success: function (result) {
                    cmnSessionExpired(result);
                    if (result.status == "success") {
                        $("#" + div)
                            .empty()
                            .append()
                            .html(result.body);
                        fnCmnSuccessMessage(result.message);
                        paginationTblWithTwoDatatable();
                    } else if (result.status == "access_deny") {
                        $(document).ready(function () {
                            jQuery.noConflict();
                            $("#myModal").modal("show");
                        });
                    } else if (result.status == "failed") {
                        fnCmnAllertMessage(result.message);
                    }
                },
            });
            /* swal("Poof! Your imaginary file has been deleted!", {
                     icon: "success",
                 });*/
        } else {
        }
    });
}

// ---------- [ Delete post ] ----------------
function deleteAllocation(post_id, url, div) {
    swal({
        title: "Are you sure to delete?",
        /*text: "Are you sure to delete?",*/
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url + "/" + post_id,
                method: "delete",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },

                success: function (result) {
                    cmnSessionExpired(result);
                    if (result.status == "success") {
                        $("#" + div)
                            .empty()
                            .append()
                            .html(result.body);
                        $("#searchResult").empty().append().html(result.body1);
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        fnCmnSuccessMessage(result.message);
                    } else if (result.status == "failed") {
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        fnCmnAllertMessage(result.message);
                    }
                },
            });
            /* swal("Poof! Your imaginary file has been deleted!", {
                     icon: "success",
                 });*/
        } else {
        }
    });
}

// this function is used for session expired
function cmnSessionExpired(result) {
    if (result.status === "sessionExpired") {
        window.location.href = "http://localhost/Subsidy/session-expire";
        document.location.href = "/session-expire";
        // window.location.href = 'http://localhost/Subsidy/session-expire';
        // $('body').empty().append().html(result.body);
    } else {
        if (result.accessKey == 0) {
            accessDeniedPopUp();
        }
    }
}

// loading modal form
function viewModel(id, url, div, MODE, module, formId) {
    // disabledButton('ajaxLoadPage', 'button', true);
    $.ajax({
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url + "/" + id + "/" + MODE,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $(".result").empty("");
                $(".inner_result").empty("");
                $(".result").empty();
                $("#modal").empty();
                $("#contModal").empty();
                //$("#contain").html(result.body);
                if (MODE === "VIW") {
                    $(".modal-title").html("View " + module);
                    // hide button
                    $("#createBtn").addClass("d-none");
                    $("#submitBtn").addClass("d-none");
                    $("#resultetBtn").addClass("d-none");
                    $("#access_deny").addClass("d-none");
                    $("#modal_content").removeClass("d-none");
                    $("#" + div)
                        .empty()
                        .append()
                        .html(result.body);
                }
                if (MODE === "EDT") {
                    $(".modal-title").html("Edit " + module);
                    // pass data to input fields
                    /*  $("#title").attr("readonly", "false");
                      $("#title").val(title);*/
                    $("#createBtn").text("Update");
                    $("#createBtn").addClass("mdi mdi-content-save");
                    $("#access_deny").addClass("d-none");
                    $("#modal_content").removeClass("d-none");
                    $("#" + div)
                        .empty()
                        .append()
                        .html(result.body);
                    // hide button
                }
                $("#loading-image").hide();
                doChosen();
                fnCmnSchemeWiseDivHideShow();
            } else if (result.status == "access_deny") {
                $("#access_deny").removeClass("d-none");
                $("#modal_content").addClass("d-none");
                $("#access_deny").empty().append().html(result.body);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
            //disabledButton('ajaxLoadPage', 'button', false);
        },
    });
}

// loading modal form
function viewModelClaim(id, url, div, MODE, module, formId) {
    // disabledButton('ajaxLoadPage', 'button', true);
    $.ajax({
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url + "/" + id + "/" + MODE,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $(".result").empty("");
                $(".inner_result").empty("");
                $(".result").empty();
                $("#modal").empty();
                $("#contModal").empty();
                //$("#contain").html(result.body);
                if (MODE === "VIW") {
                    $(".modal-title").html("View " + module);
                    // hide button
                    $("#createBtn").addClass("d-none");
                    $("#submitBtn").addClass("d-none");
                    $("#resultetBtn").addClass("d-none");
                    $("#access_deny").addClass("d-none");
                    $("#modal_content").removeClass("d-none");
                    $("#" + div)
                        .empty()
                        .append()
                        .html(result.body);
                }
                if (MODE === "EDT") {
                    $(".modal-title").html("Edit " + module);
                    // pass data to input fields
                    /*  $("#title").attr("readonly", "false");
                      $("#title").val(title);*/
                    $("#createBtn").text("Update");
                    $("#createBtn").addClass("mdi mdi-content-save");
                    $("#access_deny").addClass("d-none");
                    $("#modal_content").removeClass("d-none");
                    $("#" + div)
                        .empty()
                        .append()
                        .html(result.body);
                    // hide button
                }
                doChosen();
                fnCmnSchemeWiseDivHideShow();
            } else if (result.status == "access_deny") {
                $("#access_deny").removeClass("d-none");
                $("#modal_content").addClass("d-none");
                $("#access_deny").empty().append().html(result.body);
            }
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// loading modal form
function viewDisbursementModel(
    id,
    claim_Id_Pk,
    url,
    div,
    MODE,
    module,
    formId
) {
    // disabledButton('ajaxLoadPage', 'button', true);
    $.ajax({
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url + "/" + id + "/" + claim_Id_Pk + "/" + MODE,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            //disabledButton('ajaxLoadPage', 'button', false);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $(".result").empty();
                $("#modal").empty();
                //$("#contain").html(result.body);
                $("#" + div)
                    .empty()
                    .append()
                    .html(result.body);
                if (MODE === "VIW") {
                    $(".modal-title").html("View " + module);
                    // hide button
                    $("#createBtn").addClass("d-none");
                    $("#submitBtn").addClass("d-none");
                    $("#resultetBtn").addClass("d-none");
                }
                if (MODE === "EDT") {
                    $(".modal-title").html("Edit " + module);
                    // pass data to input fields
                    /*  $("#title").attr("readonly", "false");
                      $("#title").val(title);*/
                    $("#createBtn").text("Update");
                    // hide button
                }
            }
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

$("#editMaterial").on("shown.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    var title = $(e.relatedTarget).data("title");
    var description = $(e.relatedTarget).data("description");
    var action = $(e.relatedTarget).data("action");
    if (action !== undefined) {
        if (action === "view") {
            $(".result").empty();
            // set modal title
            $(".modal-title").html("Material Detail");

            // pass data to input fields
            $("#edtMaterial_Name").attr("readonly", "true");
            $("#edtMaterial_Name").val(title);

            $("#edtMaterial_Description").attr("readonly", "true");
            $("#edtMaterial_Description").val(description);

            // hide button
            $("#materialCreateBtn").addClass("d-none");
        }
        if (action === "edit") {
            $(".result").empty();
            $("#edtMaterial_Name").removeAttr("readonly");
            $("#edtMaterial_Description").removeAttr("readonly");

            // set modal title
            $(".modal-title").html("Update Material");

            $("#materialCreateBtn").text("Update");

            // pass data to input fields
            $("#raw_id_hidden").val(id);
            $("#edtMaterial_Name").val(title);
            $("#edtMaterial_Description").val(description);

            // hide button
            $("#btnEdit").addClass("d-none");
            $("bntSubmitApproval").removeAttr("");
        }
    } else {
        $(".modal-title").html("Create Material");
        $(".result").empty();
        // pass data to input fields
        $("#title").removeAttr("readonly");
        $("#title").val("");

        $("#description").removeAttr("readonly");
        $("#description").val("");

        // hide button
        $("#materialCreateBtn").removeClass("d-none");
    }
});

$("#addPostModal").on("shown.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    var title = $(e.relatedTarget).data("title");
    var description = $(e.relatedTarget).data("description");
    var action = $(e.relatedTarget).data("action");
    if (action !== undefined) {
        if (action === "view") {
            $(".result").empty();
            // set modal title
            $(".modal-title").html("Post Detail");

            // pass data to input fields
            $("#title").attr("readonly", "true");
            $("#title").val(title);

            $("#description").attr("readonly", "true");
            $("#description").val(description);

            // hide button
            $("#createBtn").addClass("d-none");
        }
        if (action === "edit") {
            $(".result").empty();
            $("#title").removeAttr("readonly");
            $("#description").removeAttr("readonly");

            // set modal title
            $(".modal-title").html("Update Post");

            $("#createBtn").text("Update");

            // pass data to input fields
            $("#id_hidden").val(id);
            $("#title").val(title);
            $("#description").val(description);

            // hide button
            $("#createBtn").removeClass("d-none");
        }
    } else {
        $(".modal-title").html("Create Post");
        $(".result").empty();
        // pass data to input fields
        $("#title").removeAttr("readonly");
        $("#title").val("");

        $("#description").removeAttr("readonly");
        $("#description").val("");

        // hide button
        $("#createBtn").removeClass("d-none");
    }
});

//resultet a form
$(document).on("click", "input[type='resultet']", function (e) {
    var status = confirm("Do you want to delete this post?");
    if (status == true) {
        e.preventDefault();
        form = e.toElement.form;
        form.resultet();
    } else {
    }
});

function getTotalAmountForbank(lavelId, appId, url) {
    $.ajax({
        url: url + "/" + lavelId,
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $(appId).empty().append().html(result.body);
                document.getElementById("hid_total_amount").value = result.body;
            } else if (result.status == "failed") {
                $(".result").html(
                    "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
                        "Failed to load amount" +
                        "</div>"
                );
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

function getDistrictPerState(stateId, appId, url) {
    $.ajax({
        url: url + "/" + stateId,
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $(appId).empty().append().html(result.body);
                doChosen();
            } else if (result.status == "failed") {
                $(".result").html(
                    "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
                        "Failed to load district" +
                        "</div>"
                );
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

function getDashboardOnYearChange(year, url) {
    $.ajax({
        url: url + "/" + year,
        method: "get",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $("#totalBenificiary").text(addCommas(result.totalBenificiary));
                $("#totalDisbursement").text(
                    addCommas(result.totalDisbursement)
                );
                $("#totalAllocation").text(addCommas(result.totalAllocation));
                $("#totalClaim").text(addCommas(result.totalClaim));
                $("#statewiseclaim").empty().append().html(result.body);
                $("#statewisedisbursement").empty().append().html(result.body1);
                displayLineChart(result.claimDisbursement);
                displayColumnChart(result.claimDisbursement);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

function addCommas(nStr) {
    nStr += "";
    x = nStr.split(".");
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    return x1;
}

function displayLineChart(chartData) {
    var claimDisbursement = chartData;
    // console.log(claimDisbursement);
    google.charts.load("current", {
        packages: ["corechart"],
    });
    google.charts.setOnLoadCallback(lineChart);

    function lineChart() {
        var data = google.visualization.arrayToDataTable(claimDisbursement);
        var options = {
            // chart line color
            colors: ["#ffaf00", "#2196f3"],
            is3D: true,
            // fillOpacity: 0.7,
            curveType: "function",
            hAxis: {
                areaOpacity: 0.3,
                //title: 'Year',
                titleTextStyle: {
                    color: "#404040",
                },
            },
            vAxis: {
                viewWindow: {
                    min: 0,
                },
            },
            // For the legend to fit, we make the chart area smaller
            chartArea: {
                width: "85%",
                height: "50%",
            },
            legend: {
                position: "bottom",
            },
            animation: {
                duration: 400,
                startup: true, //This is the new option
            },
        };
        var chart = new google.visualization.LineChart($("#linechart"));
        chart.draw(data, options);
    }
}

function displayColumnChart(chartData) {
    var claimDisbursement = chartData;
    // console.log(claimDisbursement);
    google.charts.load("current", {
        packages: ["corechart"],
    });
    google.charts.setOnLoadCallback(clmChart);

    function clmChart() {
        var data = google.visualization.arrayToDataTable(claimDisbursement);
        var options = {
            // column line color
            colors: ["#ffaf00", "#2196f3"],
            is3D: true,
            // fillOpacity: 0.7,
            curveType: "function",
            hAxis: {
                areaOpacity: 0.3,
                //title: 'Year',
                titleTextStyle: {
                    color: "#404040",
                },
            },
            vAxis: {
                areaOpacity: 0.3,
                //  title: 'Amount',
                minValue: 0,
            },
            // For the legend to fit, we make the chart area smaller
            chartArea: {
                width: "85%",
                height: "50%",
            },
            legend: {
                position: "bottom",
            },
            animation: {
                duration: 400,
                startup: true, //This is the new option
            },
        };
        var chart = new google.visualization.ColumnChart($("#columnchart"));
        chart.draw(data, options);
    }
}

function getShortName(shemeId, url) {
    $.ajax({
        url: url + "/" + shemeId,
        method: "get",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $("input[id=id_hidden_short_name]").val(result.body);
                if (result.body == "CCIS" || result.body == "CCIIAC") {
                    // CCIS/CCIIAC
                    $("#CCIS_CCIIAC_FIL").removeClass("d-none");
                    $("#CCIS_CCIIAC_ENDORSE").removeClass("d-none");
                    $("#claim_from").prop("disabled", true);
                    $("#claim_to").prop("disabled", true);
                    $("#two_colmn").removeClass("d-none");
                    //TSS/FSS/TI
                    $("#TSS_FSS_TI_FIL").addClass("d-none");
                    $("#TSS_FSS_TI_GOODS").addClass("d-none");
                    //INS/CCII
                    $("#INS_CCII_SUM").addClass("d-none");
                    $("#INS_CCII_SUM_REFUND").addClass("d-none");
                    $("#INS_CCII_SUM_ENDORSE").addClass("d-none");
                    //CIS
                    $("#CIS_FILE").addClass("d-none");
                }
                if (
                    result.body == "TSS" ||
                    result.body == "FSS" ||
                    result.body == "TI"
                ) {
                    // CCIS/CCIIAC
                    $("#CCIS_CCIIAC_FIL").addClass("d-none");
                    $("#CCIS_CCIIAC_ENDORSE").addClass("d-none");
                    $("#claim_from").prop("disabled", false);
                    $("#claim_to").prop("disabled", false);
                    $("#two_colmn").addClass("d-none");
                    //TSS/FSS/TI
                    $("#TSS_FSS_TI_FIL").removeClass("d-none");
                    $("#TSS_FSS_TI_GOODS").removeClass("d-none");
                    //INS/CCII
                    $("#INS_CCII_SUM").addClass("d-none");
                    $("#INS_CCII_SUM_REFUND").addClass("d-none");
                    $("#INS_CCII_SUM_ENDORSE").addClass("d-none");
                    //CIS
                    $("#CIS_FILE").addClass("d-none");
                }

                if (result.body == "INS" || result.body == "CCII") {
                    // CCIS/CCIIAC
                    $("#CCIS_CCIIAC_FIL").addClass("d-none");
                    $("#CCIS_CCIIAC_ENDORSE").addClass("d-none");
                    $("#claim_from").prop("disabled", false);
                    $("#claim_to").prop("disabled", false);
                    $("#two_colmn").addClass("d-none");
                    //TSS/FSS/TI
                    $("#TSS_FSS_TI_FIL").addClass("d-none");
                    $("#TSS_FSS_TI_GOODS").addClass("d-none");
                    //INS/CCII
                    $("#INS_CCII_SUM").removeClass("d-none");
                    $("#INS_CCII_SUM_REFUND").removeClass("d-none");
                    $("#INS_CCII_SUM_ENDORSE").removeClass("d-none");
                    //CIS
                    $("#CIS_FILE").addClass("d-none");
                }
                if (result.body == "CIS") {
                    // CCIS/CCIIAC
                    $("#CCIS_CCIIAC_FIL").addClass("d-none");
                    $("#CCIS_CCIIAC_ENDORSE").addClass("d-none");
                    $("#claim_from").prop("disabled", false);
                    $("#claim_to").prop("disabled", false);
                    $("#two_colmn").addClass("d-none");
                    //TSS/FSS/TI
                    $("#TSS_FSS_TI_FIL").addClass("d-none");
                    $("#TSS_FSS_TI_GOODS").addClass("d-none");
                    //INS/CCII
                    $("#INS_CCII_SUM").addClass("d-none");
                    $("#INS_CCII_SUM_REFUND").addClass("d-none");
                    $("#INS_CCII_SUM_ENDORSE").addClass("d-none");

                    //CIS
                    $("#CIS_FILE").removeClass("d-none");
                }
            } else if (result.status == "failed") {
                $(".result").html(
                    "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
                        "Failed to load district" +
                        "</div>"
                );
            }
        },
    });
}
function PanValidation(Pan_No) {
    $(document).ready(function () {
        $(Pan_No).keyup(function () {
            var inputvalues = $(this).val().toUpperCase();
            var reg = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;

            if (inputvalues.length == 10) {
                if (inputvalues.match(reg)) {
                    $("#pan").text("");
                    $("#pan").remove(); // remove them from the DOM completely
                    $("#pan1").text("");
                    $("#pan1").remove(); // remove them from the DOM completely
                    return true;
                } else {
                    $("#pan").text(""); // clear the text
                    $("#pan").remove(); // remove them from the DOM completely
                    $("#pan1").text("");
                    $("#pan1").remove(); // remove them from the DOM completely
                    $(Pan_No).after(
                        '<span id="pan" class="text-danger error"> Invalid PAN </span>'
                    );
                    return false;
                }
            } else {
                $("#pan").text(""); // clear the text
                $("#pan").remove(); // remove them from the DOM completely
                $("#pan1").text("");
                $("#pan1").remove(); // remove them from the DOM completely
                $(Pan_No).after(
                    '<span id="pan1" class="text-danger error"> Enter Valid Pan Number </span>'
                );
                return false;
            }
        });
    });
}

function GSTValidation(GST) {
    $(document).ready(function () {
        $(GST).keyup(function () {
            var inputvalues = $(this).val().toUpperCase();
            var reg =
                /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
            if (inputvalues.match(reg)) {
                $("#gst").text("");
                return true;
            } else {
                $("#gst").text("");
                $("#gst").remove(); // remove them from the DOM completely
                $(GST).after(
                    '<span id="gst" class="text-danger error"> Invalid GST </span>'
                );
                //document.getElementById("txtifsc").focus();
                // $("#gst").focus();
                return false;
            }
        });
    });
}
function AmountValidation(id) {
    $(document).ready(function () {
        $(id).keyup(function () {
            var inputvalues = $(this).val();
            var reg = /^\d{0,9}(\.\d{0,2})?$/;
            if (inputvalues.match(reg)) {
                $("#amt").text("");
                return true;
            } else {
                $("#amt").text("");
                $("#amt").remove(); // remove them from the DOM completely
                $(id).after(
                    '<span id="amt" class="text-danger error"> Invalid value </span>'
                );
                document.getElementById(id).focus();
                return false;
            }
        });
    });
}

function isNumber(evt) {
    evt = evt ? evt : window.event;
    var charCode = evt.which ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function onlyNumber(id) {
    if (isNaN($("#" + id).val()))
        $("#" + id).bind("keyup paste", function () {
            this.value = this.value.replace(/[^0-9]/g, "");
        });
}

function calculateSum(field1, field2, field3, field4) {
    $("#" + field3).empty();
    $("#" + field4).empty();
    var val1 = $("#" + field1).val(),
        val2 = $("#" + field2).val();
    if (val1.length == 0) {
        val1 = 0;
    }
    if (val2.length == 0) {
        val2 = 0;
    }
    $("#" + field3).val(parseInt(val1) + parseInt(val2));
    $("#" + field4).val(parseInt(val1) + parseInt(val2));
}
function calculateInsurance(field1, field2, field3, field4) {
    $("#" + field3).empty();
    $("#" + field4).empty();
    var val1 = $("#" + field1).val(),
        val2 = $("#" + field2).val();
    if (val1.length == 0) {
        val1 = 0;
    }
    if (val2.length == 0) {
        val2 = 0;
    }
    $("#" + field3).val(parseInt(val1) - parseInt(val2));
    //$("#" + field4).val(parseInt(val1) - parseInt(val2));
}
function autoField(field1, field2) {
    $("#" + field2).empty();
    var val1 = $("#" + field1).val(),
        val2 = $("#" + field2).val();
    if (val1.length == 0) {
        val1 = 0;
    }
    if (val2.length == 0) {
        val2 = 0;
    }
    $("#" + field2).val(parseInt(val1));
}

function calculateInvestment(field1, field2) {
    $("#" + field2).empty();
    var val1 = $("#" + field1).val(); 
    if (val1.length == 0) {
        val1 = 0;
    }   
    $("#" + field2).val(parseInt(val1));
}

function amountValidation(id) {
    $("#" + id).keyup(function () {
        var $row = $(this).closest("tr"); // Find the row
        //var $text = $row.find("#amount").html(); // Find the text
        var $text = $row.find("td:eq(6)").text(); // get current row 6rd TD
        var $edValue = document.getElementById(id);
        var $enterVal = $edValue.value;
        if (parseFloat($enterVal.trim()) > parseFloat($text.trim())) {
            $("#spn" + id).text("");
            //  $("#" + id).val('');
            document.getElementById(id).focus();
            document.getElementById(id).value = " ";
            $("#" + id).after(
                '<span id="spn' +
                    id +
                    '" class="text-danger error"> Amount Exceeds from Claim! </span>'
            );
            return false;
        } else {
            $("#spn" + id).text("");
        }
    });
}

$(document).ready(function () {
    $("#languages").multiselect({
        nonSelectedText: "Select Language",
    });
});

$(".chosen").chosen();
function CheckAll() {
    $(document).ready(function () {
        $("#checkedAll").click(function (e) {
            var table = $(e.target).closest("table");
            $("td input:checkbox", table).prop("checked", this.checked);
        });
    });
}

function checkAllCheckBox(id) {
    if ($(id).prop("checked") == true) {
        $(id)
            .closest("table")
            .find("input:checkbox")
            .each(function () {
                $(this).prop("checked", true);
            });
    } else {
        $(id)
            .closest("table")
            .find("input:checkbox")
            .each(function () {
                $(this).prop("checked", false);
            });
    }
}

// Save fund allocation
function fnSaveFundAllocation(
    url,
    formId,
    listOfClaimAllocation,
    fund_id,
    scheme_id
) {
    var idsArr = [];
    $(".checkbox:checked").each(function () {
        idsArr.push($(this).attr("data-id"));
    });
    if (idsArr.length <= 0) {
        $(".inner_result").html(
            "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! At least one record should be checked ! </div>"
        );
        $(".inner_result")[0].scrollIntoView();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    } else {
        $(".inner_result").html("");
    }
    // var allocate_amount = $("#allocated_amount" + id).val();
    // if (allocate_amount == "") {
    //     $("#allocate_validation").text('');
    //     $("#allocated_amount" + id).after('<br><span id="allocate_validation" class="text-danger error"> Enter Amount </span>');
    //     return false;
    // }
    var fundAllocationForm = $("form#" + formId).serializeObject();
    // disabledButtonPaging('ajaxLoadPage', 'button', true);
    var dataString = JSON.stringify(fundAllocationForm);
    $.ajax({
        type: "POST",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url + "/" + fund_id + "/" + scheme_id,
        contentType: "application/json",
        data: dataString,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + listOfClaimAllocation)
                    .empty()
                    .append()
                    .html(result.body);
                $("#searchResult").empty().append().html(result.body1);
                $(".inner_result").html(
                    "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
                        result.message +
                        "</div>"
                );
                paginationTbl();
                paginationTblWithTwoDatatable();
                //$('.inner_result')[0].scrollIntoView();
                //$('html, body').animate({ scrollTop: 0 }, 'slow');
            }
            if (result.status == "failed") {
                $(".inner_result").html(
                    "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
                        result.message +
                        "</div>"
                );
                //$('.inner_result')[0].scrollIntoView();
                // $('html, body').animate({ scrollTop: 0 }, 'slow');
            }
            //disabledButtonPaging('ajaxLoadPage', 'button', false);
        },
        error: function () {
            alert("Error! ");
            $(".ajax-loader").css("visibility", "hidden");
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

//Cmn Approval
function fnCmnApproved(url, formId, div) {
    // $('#approvalInvestmentDetails').empty(); // for investment module Only
    //  fnCmnRemoveGeneralClass();
    var idsArr = [];
    $("#" + formId + " input:checkbox:checked").each(function () {
        // $(".checkbox:checked").each(function () {
        idsArr.push($(this).attr("data-id"));
    });
    if (idsArr.length <= 0) {
        $(".result").html(
            "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>Alert! At least one record should be checked ! </div>"
        );
        $(".result")[0].scrollIntoView();
        $("html, body").animate({ scrollTop: 0 }, "medium");
        return false;
    } else {
        $(".result").html("");
    }
    if ($("#" + formId + " #decision").val() == "") {
        $("html, body").animate({ scrollTop: 0 }, "medium");
        fnCmnAllertMessage("Select a Decision !");
        return false;
    }
    if ($("#" + formId + " #approval_date").val() == "") {
        $("html, body").animate({ scrollTop: 0 }, "medium");
        fnCmnAllertMessage("Please enter approval Date !");
        return false;
    }
    if ($("#" + formId + " #remarks").val() == "") {
        $("html, body").animate({ scrollTop: 0 }, "medium");
        fnCmnAllertMessage("Please enter remarks !");
        return false;
    }

    // fnCmnRemoveGeneralClass();
    // var listFromCheckBox = $('form#frm' + module + 'List').serializeObject();
    var cmnApprovalForm = $("form#" + formId).serializeObject();
    // disabledButtonPaging('ajaxLoadPage', 'button', true);
    var dataString = JSON.stringify(cmnApprovalForm);
    $.ajax({
        type: "POST",
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        url: url,
        contentType: "application/json",
        data: dataString,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (resultponse) {
            cmnSessionExpired(resultponse);
            if (resultponse.status) {
                $(".ajax-loader").css("visibility", "hidden");
                $("#" + div)
                    .empty()
                    .append()
                    .html(resultponse.body);
                fnCmnSuccessMessage(resultponse.message);
                paginationTbl();
            } else {
                $("#" + resultponse.id).focus();
                fnCmnAllertMessage(resultponse.message);
            }
            // disabledButtonPaging('ajaxLoadPage', 'button', false);
        },
        error: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

function fnCmnSuccessMessage($message) {
    $(".result").html(
        "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
            $message +
            "</div>"
    );
    $(".inner_result").html(
        "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
            $message +
            "</div>"
    );
    $("html, body").animate({ scrollTop: 0 }, 500);
    // document.getElementById("inner_result").scrollIntoView();
    $(".modal").animate(
        {
            scrollTop: $("#inner_result").offset().top,
        },
        500
    );
}

function fnCmnAllertMessage($message) {
    $(".result").html(
        "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
            $message +
            "</div>"
    );
    $(".inner_result").html(
        "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
            $message +
            "</div>"
    );
    $("html, body").animate({ scrollTop: 0 }, 500);
    //document.getElementById("inner_result").scrollIntoView();
    $(".modal").animate(
        {
            scrollTop: $("#inner_result").offset().top,
        },
        500
    );
}

function fnCmnSchemeWiseDivHideShow() {
    $short_name = $("input[id=id_hidden_short_name]").val();
    if ($short_name == "CCIS" || $short_name == "CCIIAC") {
        // CCIS/CCIIAC
        $("#CCIS_CCIIAC_FIL").removeClass("d-none");
        $("#CCIS_CCIIAC_ENDORSE").removeClass("d-none");
        $("#td_claim_from").prop("disabled", true);
        $("#td_claim_to").prop("disabled", true);
        $("#claim_from").prop("disabled", true);
        $("#claim_to").prop("disabled", true);
        $("#two_colmn").removeClass("d-none");
        //TSS/FSS/TI
        $("#TSS_FSS_TI_FIL").addClass("d-none");
        $("#TSS_FSS_TI_GOODS").addClass("d-none");
        //INS/CCII
        $("#INS_CCII_SUM").addClass("d-none");
        $("#INS_CCII_SUM_REFUND").addClass("d-none");
        $("#INS_CCII_SUM_ENDORSE").addClass("d-none");
        //CIS
        $("#CIS_FILE").addClass("d-none");
    }
    if ($short_name == "TSS" || $short_name == "FSS" || $short_name == "TI") {
        // CCIS/CCIIAC
        $("#CCIS_CCIIAC_FIL").addClass("d-none");
        $("#CCIS_CCIIAC_ENDORSE").addClass("d-none");
        $("#claim_from").prop("disabled", false);
        $("#claim_to").prop("disabled", false);
        $("#two_colmn").addClass("d-none");
        //TSS/FSS/TI
        $("#TSS_FSS_TI_FIL").removeClass("d-none");
        $("#TSS_FSS_TI_GOODS").removeClass("d-none");
        //INS/CCII
        $("#INS_CCII_SUM").addClass("d-none");
        $("#INS_CCII_SUM_REFUND").addClass("d-none");
        $("#INS_CCII_SUM_ENDORSE").addClass("d-none");
        //CIS
        $("#CIS_FILE").addClass("d-none");
    }
    if ($short_name == "INS" || $short_name == "CCII") {
        // CCIS/CCIIAC
        $("#CCIS_CCIIAC_FIL").addClass("d-none");
        $("#CCIS_CCIIAC_ENDORSE").addClass("d-none");
        $("#claim_from").prop("disabled", false);
        $("#claim_to").prop("disabled", false);
        $("#two_colmn").addClass("d-none");
        //TSS/FSS/TI
        $("#TSS_FSS_TI_FIL").addClass("d-none");
        $("#TSS_FSS_TI_GOODS").addClass("d-none");
        //INS/CCII
        $("#INS_CCII_SUM").removeClass("d-none");
        $("#INS_CCII_SUM_REFUND").removeClass("d-none");
        $("#INS_CCII_SUM_ENDORSE").removeClass("d-none");
        //CIS
        $("#CIS_FILE").addClass("d-none");
    }
    if ($short_name == "CIS") {
        // CCIS/CCIIAC
        $("#CCIS_CCIIAC_FIL").addClass("d-none");
        $("#CCIS_CCIIAC_ENDORSE").addClass("d-none");
        $("#claim_from").prop("disabled", false);
        $("#claim_to").prop("disabled", false);
        $("#two_colmn").addClass("d-none");
        //TSS/FSS/TI
        $("#TSS_FSS_TI_FIL").addClass("d-none");
        $("#TSS_FSS_TI_GOODS").addClass("d-none");
        //INS/CCII
        $("#INS_CCII_SUM").addClass("d-none");
        $("#INS_CCII_SUM_REFUND").addClass("d-none");
        $("#INS_CCII_SUM_ENDORSE").addClass("d-none");
        //CIS
        $("#CIS_FILE").removeClass("d-none");
    }
}

/* This method is used to disabled the double click */
function disabledButton(pageId, buttonName, isDisabled) {
    if (isDisabled) {
        //        lockScroll();
        $("#wrapper").css("opacity", "0.6");
        $("body").css("z-index", "100");
        $("#overLay").css("display", "block");
        $("#ajaxLoaderImg").css("display", "block");
        $("#ajaxLoaderImg")
            .find('span[data-name~="timeCounter"]')
            .empty()
            .text("00:00:00");
        startTime = new Date().getTime();
        timerFunction = setInterval(function () {
            var currentTime = new Date().getTime();
            var timer = currentTime - startTime;
            var milisecond = parseInt(timer % 100, 10);
            var seconds = parseInt((timer / 1000) % 60, 10);
            var minutes = parseInt((timer / (60 * 1000)) % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            milisecond = milisecond < 10 ? "0" + milisecond : milisecond;
            $("#ajaxLoaderImg")
                .find('span[data-name~="timeCounter"]')
                .empty()
                .text(minutes + ":" + seconds + ":" + milisecond);
        }, 10);
    } else {
        //        unlockScroll();
        $("#wrapper").css("opacity", "10");
        $("#overLay").css("display", "none");
        $("#ajaxLoaderImg").css("display", "none");
        clearInterval(timerFunction);
        $("#ajaxLoaderImg").find('span[data-name~="timeCounter"]').empty();
        prism_load_init_chosen_select();
    }
}

function navigationClick(url, appId) {
    $.ajax({
        url: url,
        method: "get",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            if (result.status == "success") {
                $(appId).empty().append().html(result.body);
            } else if (result.status == "failed") {
                $(".result").html(
                    "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" +
                        "Failed to load district" +
                        "</div>"
                );
            }
        },
    });
}

$(function () {
    $("fieldset .content").hide();
    $("legend").click(function () {
        $(this).parent().find(".content").slideToggle("slow");
    });
});

$(document).ready(function () {
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#today").value = today;
});

// formLoad
function fnLeftSubMenuNavigation(id, url) {
    $.ajax({
        url: url,
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        method: "get",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $("#ajaxLoadPage").empty().append().html(result.body);
                $(".chosen").chosen();
                $("li.nav-item.active").removeClass("active");
                $(id).parent("li.nav-item").addClass("active");
                $(id)
                    .parent("li.nav-item")
                    .parent("ul.nav")
                    .parent("div.collapse")
                    .parent("li.nav-item")
                    .addClass("active");
                $(id)
                    .parent("li.nav-item")
                    .parent("ul.nav")
                    .parent("div.collapse")
                    .parent("li.nav-item")
                    .children("i.menu-icon")
                    .addClass("active");
                $(".ajax-loader").css("visibility", "hidden");
                doChosen();
                paginationTbl();
                paginationTblWithTwoDatatable();
                (function ($) {
                    "use strict";
                    $(function () {
                        $('[data-toggle="offcanvas"]').on("click", function () {
                            $(".sidebar-offcanvas").toggleClass("active");
                        });
                    });
                })(jQuery);
            } else {
                cmnSessionExpired(result);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}

// this function is used for session expired
function cmnSessionExpired(result) {
    if (result.status === "sessionExpired") {
        $("body").empty().append(result.body);
    }
}

function paginationTbl() {
    $('table.display').DataTable().api().ajax.reload();
    $("#example").DataTable().api().ajax.reload();
}
function paginationInnerTbl() {
    $('table.dataTable').DataTable();
}
function paginationTblWithTwoDatatable() {
    
    // $('#example1').DataTable( {
    //     responsive: {
    //         details: {
    //             display: $.fn.dataTable.Responsive.display.modal( {
    //                 header: function ( row ) {
    //                     var data = row.data();
    //                     return 'Details for '+data[0]+' '+data[1];
    //                 }
    //             } ),
    //             renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
    //                 tableClass: 'table'
    //             } )
    //         }
    //     }
    // } );
    $("#example1").DataTable().api().ajax.reload();
}
function paginationTblWithFourDatatable() {
   
    // $('#example2').DataTable( {
    //     responsive: {
    //         details: {
    //             display: $.fn.dataTable.Responsive.display.modal( {
    //                 header: function ( row ) {
    //                     var data = row.data();
    //                     return 'Details for '+data[0]+' '+data[1];
    //                 }
    //             } ),
    //             renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
    //                 tableClass: 'table'
    //             } )
    //         }
    //     }
    // } );
    // $('#example3').DataTable( {
    //     responsive: {
    //         details: {
    //             display: $.fn.dataTable.Responsive.display.modal( {
    //                 header: function ( row ) {
    //                     var data = row.data();
    //                     return 'Details for '+data[0]+' '+data[1];
    //                 }
    //             } ),
    //             renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
    //                 tableClass: 'table'
    //             } )
    //         }
    //     }
    // } );
    $("#example2").DataTable().api().ajax.reload();
    $("#example3").DataTable().api().ajax.reload();
}

function doChosen() {
    $(".chosen").chosen();
}

function printDiv(divId, title) {
    let mywindow = window.open(
        "",
        "PRINT",
        "height=650,width=1200,top=100,left=150"
    );
    // mywindow.document.write('<html><head><title>' + title + '</title>');
    mywindow.document.write("</head><body >");
    mywindow.document.write(document.getElementById(divId).innerHTML);
    mywindow.document.write("</body></html>");
    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/
    mywindow.print();
    mywindow.close();
    return true;
}
function printPDF() {
    var doc = new jsPDF();
    var elementHandler = {
        "#searchResult": function (element, renderer) {
            return true;
        },
    };
    var source = window.document.getElementsByTagName("body")[0];
    doc.fromHTML(source, 15, 15, {
        width: 180,
        elementHandlers: elementHandler,
    });

    doc.output("dataurlnewwindow");
}

//Create PDf from HTML...
function getPDF(divId, title) {
    var HTML_Width = $("#" + divId).width();
    var HTML_Height = $("#" + divId).height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + top_left_margin * 2;
    var PDF_Height = PDF_Width * 1.5 + top_left_margin * 2;
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($("#" + divId)[0], { allowTaint: true }).then(function (
        canvas
    ) {
        canvas.getContext("2d");

        console.log(canvas.height + "  " + canvas.width);

        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF("p", "pt", [PDF_Width, PDF_Height]);
        pdf.addImage(
            imgData,
            "JPG",
            top_left_margin,
            top_left_margin,
            canvas_image_width,
            canvas_image_height
        );

        for (var i = 1; i <= totalPDFPages; i++) {
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(
                imgData,
                "JPG",
                top_left_margin,
                -(PDF_Height * i) + top_left_margin * 4,
                canvas_image_width,
                canvas_image_height
            );
        }

        pdf.save(title + ".pdf");
    });
}

function fnDashboardMenuNavigation(stateID, url) {
    $.ajax({
        url: url,
        beforeSend: function () {
            $(".ajax-loader").css("visibility", "visible");
        },
        method: "get",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            cmnSessionExpired(result);
            if (result.status == "success") {
                $("#ajaxLoadPage").empty().append().html(result.body);
                $(".chosen").chosen();
                $("li.nav-item.active").removeClass("active");
                $(".ajax-loader").css("visibility", "hidden");
                doChosen();
                paginationTbl();
                (function ($) {
                    "use strict";
                    $(function () {
                        $('[data-toggle="offcanvas"]').on("click", function () {
                            $(".sidebar-offcanvas").toggleClass("active");
                        });
                    });
                })(jQuery);
            } else {
                cmnSessionExpired(result);
            }
        },
        complete: function () {
            $(".ajax-loader").css("visibility", "hidden");
        },
    });
}
