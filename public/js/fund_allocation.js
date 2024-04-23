const { exit } = require("browser-sync");

// Pass csrf token in ajax header
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



// Save fund allocation
function fnSaveFundAllocation(url, formId) {

    // $('#approvalInvestmentDetails').empty(); // for investment module Only
    //  fnCmnRemoveGeneralClass();
    if (!$('.clJournal').is(':checked')) {


        fnCmnWarningMessage('Please select atleast one entry detail !');
        return false;
    }
    if ($('#remarks').val() == '') {
        fnCmnWarningMessage('Please enter remarks !');
        return false;
    }
    // fnCmnRemoveGeneralClass();
    // var listFromCheckBox = $('form#frm' + module + 'List').serializeObject();
    var cmnApprovalForm = $('form#' + formId).serializeObject();
    // disabledButtonPaging('ajaxLoadPage', 'button', true);
    var dataString = JSON.stringify(cmnApprovalForm);
    $.ajax({
        type: 'POST',
        url: url,
        contentType: 'application/json',
        data: dataString,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                $('#ajax-content').empty().append(response.html['html']).trigger('showGrid');
                $('#ajax-sub-content').empty().append(response.html['secondHtml']).trigger('showGrid');
                $('#ajax-sub-sub-content').empty().append(response.html['thirdHtml']).trigger('showGrid')
                fnCmnSuccessMessage(response.message);
            } else {
                fnCmnWarningMessage(response.message);
                $('#' + response.id).focus();
            }
            // disabledButtonPaging('ajaxLoadPage', 'button', false);
        },
        error: function () {
            // disabledButtonPaging('ajaxLoadPage', 'button', false);
        }
    });
}

