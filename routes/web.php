<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BenificiaryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisbursementController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\SubsidyController;
use App\Http\Controllers\BankMasterController;
use App\Http\Controllers\FundMasterController;
use App\Http\Controllers\SubsidyMasterController;
use App\Http\Controllers\FinishGoodsController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\FundAllocationController;
use App\Http\Controllers\RemarksMasterController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AccessController;
use App\Models\TbCmnFundAllocationMaster;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AutocompleteController;


Route::get('chart-js', [ChartJSController::class, 'showChart']);
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('signout', [LoginController::class, 'logOut']);
Route::get('forgot-password', [LoginController::class, 'forgotPassword']);
Route::post('find-username', [LoginController::class, 'findUser']);
Route::get('forgot-username', [LoginController::class, 'forgotUseraname']);
Route::post('find-email', [LoginController::class, 'findEmail']);
Route::post('find-user-email', [LoginController::class, 'findUserEmail']);
Route::get('/logout', [DashboardController::class, 'index']);
Route::get('/session-expire', [DashboardController::class, 'sessionExpire']);
Route::get('/', [DashboardController::class, 'index']);
Route::get('dashboard-page', [DashboardController::class, 'DashboardAction']);
Route::get('dashboard', [DashboardController::class, 'Dashboard']);
Route::get('create-post', [PostController::class, 'index']);
Route::get('show', [PostController::class, 'showList']);
Route::post('post', [PostController::class, 'store']);
Route::put('post', [PostController::class, 'update']);
Route::delete('post/{post_id}', [PostController::class, 'destroy']);
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

//Benificiary route
Route::get('benificiary-ui.add-benificiary', [BenificiaryController::class, 'addBenificiary']);
Route::post('benificiary-ui.benificiary-search-result', [BenificiaryController::class, 'searchBenificiary']);
Route::get('benificiary-ui.approve-benificiary', [BenificiaryController::class, 'approveBenificiary']);
Route::get('benificiary-ui.add-benificiary-modal', [BenificiaryController::class, 'addBenificiaryModal']);
Route::get('fill-district-onChange/{state_id}', [CommonController::class, 'fillDistrictOnStateChange']);
Route::get('get-short-scheme-name/{scheme_id}', [CommonController::class, 'getShortNameOnSchemChange']);

Route::post('save-benificiary', [BenificiaryController::class, 'saveBenificiary']);
Route::post('save-benificiary/{benificiary_id}', [BenificiaryController::class, 'updateBenificiary']);
Route::delete('save-benificiary/{benificiary_id}', [BenificiaryController::class, 'destroyBenificiary']);
Route::get('view-edit-benificiary/{benificiary_id}/{MODE}', [BenificiaryController::class, 'viewEditBenificiary']);
Route::post('approve-benificiary', [BenificiaryController::class, 'approveBenificiaryEntry']);
Route::post('benificiary-approval/{benificiary_id}', [BenificiaryController::class, 'benificiaryApproval']);


//Subsidy route
Route::get('subsidy-ui.add-subsidy', [SubsidyController::class, 'addSubsidy']);
Route::get('subsidy-ui.approve-subsidy', [SubsidyController::class, 'approveSubsidy']);
Route::post('subsidy-ui.search-subsidy-result', [SubsidyController::class, 'searchSubsidyResult']);
Route::get('subsidy-ui.add-subsidy-modal', [SubsidyController::class, 'addSubsidyModal']);
Route::post('save-subsidy', [SubsidyController::class, 'saveSubsidy']);
Route::post('save-subsidy/{subsidy_claim_id}', [SubsidyController::class, 'updateClaim']);
Route::delete('save-subsidy/{subsidy_claim_id}', [SubsidyController::class, 'destroySubsidyClaim']);
Route::get('view-edit-subsidy-claim/{subsidy_claim_id}/{MODE}', [SubsidyController::class, 'viewEditSubsidy']);
Route::get('view-claim-history/{subsidy_claim_id}/{MODE}', [SubsidyController::class, 'viewClaimHistory']);
Route::post('approve-subsidy-claim', [SubsidyController::class, 'approveSubsidyClaimEntry']);
Route::post('claim-approval/{subsidy_claim_id}', [SubsidyController::class, 'claimApproval']);



//Fund management route
Route::get('fund-management-ui.subsidy-fund.add-subsidy-fund', [FundMasterController::class, 'addSubsidyFund']);
Route::get('fund-management-ui.subsidy-fund.approve-subsidy-fund', [FundMasterController::class, 'approveSubsidyFundForm']);
Route::post('search-subsidy-fund-result', [FundMasterController::class, 'searchSubsidyFund']);
Route::get('fund-management-ui.subsidy-fund.add-subsidy-fund-modal', [FundMasterController::class, 'addSubsidyFundModal']);
Route::post('save-subsidy-fund', [FundMasterController::class, 'saveSubsidyFund']);
Route::post('save-subsidy-fund/{funs_id}', [FundMasterController::class, 'updateSubsidyFund']);
Route::delete('save-subsidy-fund/{allocation_id}', [FundMasterController::class, 'destroySubsidyFund']);
Route::get('view-edit-subsidy-fund/{funs_id}/{MODE}', [FundMasterController::class, 'viewEditSubsidyFund']);
Route::get('fill-amount-onChange/{bank_Id}', [CommonController::class, 'fillAmountOnBankChange']);
Route::post('approve-subsidy-fund', [FundMasterController::class, 'approveSubsidyFundEntry']);
Route::post('fund-master-approval/{funs_id}', [FundMasterController::class, 'fundMaterApproval']);

Route::get('fund-management-ui.fund-allocation.add-fund-allocation', [FundAllocationController::class, 'addFundAllocation']);
Route::get('fund-management-ui.fund-allocation.approve-fund-allocation', [FundAllocationController::class, 'approveFundAllocationForm']);
Route::post('approve-fund-allocation', [FundAllocationController::class, 'approveFundAllocation']);
Route::post('search-fund-allocation-result', [FundAllocationController::class, 'searchFundAllocation']);
Route::post('fund-allocation.add-fund-allocation-modal', [FundAllocationController::class, 'addFundAllocationModal']);
Route::post('save-fund-allocation/{fundId}/{scheme_id}', [FundAllocationController::class, 'saveFundAllocation']);
Route::delete('save-fund-allocation/{allocation_id}', [FundAllocationController::class, 'destroyFundAllocation']);
Route::delete('delete-fund-allocation-master/{allocation_id}', [FundAllocationController::class, 'destroyFundAllocationMaster']);
Route::get('view-edit-fund-allocation/{allocation_id}/{MODE}', [FundAllocationController::class, 'viewEditFundAllocation']);
Route::post('fund-management-ui.fund-allocation.search-claim-list', [FundAllocationController::class, 'searchClaimedBenificiary']);
Route::post('approve-subsidy-fund-allocation', [FundAllocationController::class, 'approveSubsidyFundAllocationEntry']);
Route::post('fund-allocation-approval/{allocation_id}', [FundAllocationController::class, 'fundAllocationMaterApproval']);



//Disbursement route
Route::get('disbursement-ui.add-disbursement', [DisbursementController::class, 'addDisbursement']);
Route::get('disbursement-ui.approve-disbursement', [DisbursementController::class, 'approveDisbursement']);
Route::post('disbursement-ui.search-disbursement-result', [DisbursementController::class, 'searchDisbursementResult']);
Route::get('disbursement-ui.create-disbursement-modal/{id}/{Claim_Id}', [DisbursementController::class, 'addDisbursementModal']);
Route::get('disbursement-ui.edit-view-disbursement-modal/{id}/{Claim_Id}', [DisbursementController::class, 'editViewDisbursementModal']);
Route::get('disbursement-ui.search-disbursement', [DisbursementController::class, 'searchDisbursementDetails']);
Route::get('view-disbursement-details-modal/{id}/{claim_Id}/{MODE}', [DisbursementController::class, 'viewDisbursementDetailsModal']);
Route::get('view-disbursement-details-modal/{claim_Id}/{MODE}', [DisbursementController::class, 'viewDisbursementClaimDetailsModal']);
Route::POST('save-disbursement/{Allocation_Id}/{Claim_Id}', [DisbursementController::class, 'saveDisbursementDetails']);
Route::POST('save-disbursement/{disbursement_id}', [DisbursementController::class, 'upateDisbursementDetails']);
Route::delete('save-disbursement/{disbursement_id}', [DisbursementController::class, 'destroyDisbursement']);
Route::post('approve-disbursement', [DisbursementController::class, 'approveDisbursementEntry']);
Route::post('disbursement-approval/{disbursement_id}', [DisbursementController::class, 'disbursementApproval']);


//
// Report route
Route::get('report-ui.claim-report', [ReportController::class,'claimReport']);
Route::post('report-ui.generate-claim-report', [ReportController::class,'claimReportResult']);
Route::get('report-ui.pending-claim-report', [ReportController::class,'pendingClaimReport']);
Route::post('report-ui.generate-pending-claim-report', [ReportController::class,'pendingClaimReportResult']);
Route::get('report-ui.fund-receipt-report', [ReportController::class,'fundReceiptReport']);
Route::post('report-ui.generate-fund-report', [ReportController::class,'fundReportResult']);
Route::get('report-ui.disbursement-report', [ReportController::class,'disbursementReport']);
Route::post('report-ui.generate-disbursement-report', [ReportController::class,'disbursementReportResult']);
Route::get('report-ui.composit-report', [ReportController::class,'compositReport']);
Route::post('report-ui.generate-composit-report', [ReportController::class,'compositReportResult']);
Route::get('report-ui.sector-wise-report', [ReportController::class,'sectorWiseReport']);
Route::post('report-ui.generate-sector-wise-report', [ReportController::class,'sectorWiseReportResult']);
Route::get('report-ui.bank-ledger-report', [ReportController::class,'bankLedgerReport']);
Route::get('report-ui.cash-book-report', [ReportController::class,'cashBookReport']);
Route::get('report-ui.disbursement-report/{id}', [ReportController::class,'disbursementReport']);
Route::get('report-ui.cheque-return-report', [ReportController::class,'chequeReturnReport']);
Route::get('ajax-autocomplete-search', [ReportController::class, 'selectSearch']);
Route::post('/autocomplete/fetch', [AutocompleteController::class,'fetch'])->name('autocomplete.fetch');

// Master
Route::get('master-ui.master-setting', [MasterController::class, 'materialPanel']);

// Configuration route
Route::get('configuration', [ConfigurationController::class, 'getConfigurationPage']);
Route::get('change_password', [ConfigurationController::class, 'getChangePasswordPage']);
Route::post('update_password', [UserController::class, 'updatePassword']);
Route::post('reset-password-on-first-login', [UserController::class, 'resetPasswordOnFirstLogin']);
//User route
Route::get('modal.create-user', [UserController::class, 'createUserModal']);
Route::get('show-user', [UserController::class, 'showUser']);
Route::get('approval-user', [UserController::class, 'approvalUser']);
Route::post('save-user', [UserController::class, 'saveUser']);
Route::delete('save-user/{user_id}', [UserController::class, 'destroyUser']);
Route::post('approve-user', [UserController::class, 'approveUserEntry']);
Route::post('user-master-search', [UserController::class, 'SearchUser']);


//Role route
Route::get('modal.create-role', [RoleController::class, 'createRoleModal']);
Route::get('show-role', [RoleController::class, 'showRole']);
Route::get('approval-role', [RoleController::class, 'approvalRole']);
Route::post('save-role', [RoleController::class, 'saveRole']);
Route::delete('save-role/{role_id}', [RoleController::class, 'destroyRole']);
Route::post('approve-role', [RoleController::class, 'approveRoleEntry']);
Route::post('role-master-search', [RoleController::class, 'SearchRoles']);

//Access route
Route::get('modal.create-access', [AccessController::class, 'createAccessModal']);
Route::get('show-access', [AccessController::class, 'showAccess']);
Route::get('approval-access', [AccessController::class, 'approvalAccess']);
Route::post('save-access', [AccessController::class, 'saveAccess']);
Route::delete('save-access/{role_id}', [AccessController::class, 'destroyAccess']);
Route::get('fill-role-onChange/{module_id}', [CommonController::class, 'fillRoleOnModuleChange']);
Route::get('get-dashboard-values-onChange/{year}', [CommonController::class, 'getDashboardValueOnYearChange']);

Route::post('approve-access', [AccessController::class, 'approveAccessEntry']);
Route::post('access-master-search', [AccessController::class, 'SearchAccess']);

// Master panel
/*Route::get('master-ui.panels.raw-material-panel', [RawMaterialController::class, 'rawMaterialPanel']);
Route::get('master-ui.panels.fund-master-panel', [FundMasterController::class, 'fundMasterPanel']);
Route::get('master-ui.panels.bank-master-panel', [BankMasterController::class, 'bankMasterPanel']);
Route::get('master-ui.panels.finish-goods-panel', [FinishGoodsController::class, 'finishGoodsMaterialPanel']);
Route::get('master-ui.panels.remark-master-panel', [RemarksMasterController::class, 'remarksMasterPanel']);
Route::get('master-ui.panels.subsidy-master-panel', [SubsidyMasterController::class, 'subsidyMaterialPanel']);
Route::get('master-ui.panels.unit-master-panel', [UnitController::class, 'unitMasterPanel']);
*/

// Master Modal form
Route::get('modal.raw-material', [RawMaterialController::class, 'rawMaterialModal']);
Route::get('modal.finish-goods', [FinishGoodsController::class, 'finishGoodsModal']);
Route::get('modal.fund-master', [FundMasterController::class, 'fundMasterModal']);
Route::get('modal.bank-master', [BankMasterController::class, 'bankMasterModal']);
Route::get('modal.remarks-master', [RemarksMasterController::class, 'remarksMasterModal']);
Route::get('modal.subsidy-master', [SubsidyMasterController::class, 'subsidyMasterModal']);
Route::get('modal.unit-master', [UnitController::class, 'unitMasterModal']);

// Master search result
Route::post('bank-master-search', [BankMasterController::class, 'searchBankMasterResult']);
Route::post('finish-goods-search', [FinishGoodsController::class, 'searchFinishGoodsResult']);
Route::post('fund-master-search', [FundMasterController::class, 'searchFundMasterResult']);
Route::post('material-master-search', [RawMaterialController::class, 'searchRawMatetialMasterResult']);
Route::post('remarks-master-search', [RemarksMasterController::class, 'searchRemarksMasterResult']);
Route::post('sunsidy-master-search', [SubsidyMasterController::class, 'searchSunsidyMasterResult']);
Route::post('unit-master-search', [UnitController::class, 'searchUnitMasterResult']);

// Unit master store
Route::get('approval_unit_master', [UnitController::class, 'showUnitApproval']);
Route::get('show_unit_master', [UnitController::class, 'showUnitMaster']);
Route::post('add_unit_master', [UnitController::class, 'addUnitMaster']);
Route::post('add_unit_master/{unit_id}', [UnitController::class, 'updateUnitMaster']);
Route::delete('add_unit_master/{unit_id}', [UnitController::class, 'destroyUnitMaster']);
Route::post('approve-unit', [UnitController::class, 'approveUnitEntry']);
Route::get('view-edit-unit-master/{unit_id}/{MODE}', [UnitController::class, 'viewEditUnitModal']);
Route::post('unit-master-approval/{unit_id}', [UnitController::class, 'unitMasterApproval']);


// Raw material store
Route::get('approval_raw_materials', [RawMaterialController::class, 'showRawMaterialMasterApproval']);
Route::get('show_raw_materials', [RawMaterialController::class, 'showRawMaterialMaster']);
Route::post('add_raw_materials', [RawMaterialController::class, 'addRawMaterialMaster']);
Route::post('add_raw_materials/{raw_id}', [RawMaterialController::class, 'updateRawMaterialMaster']);
Route::delete('add_raw_materials/{raw_id}', [RawMaterialController::class, 'destroyRawMaterialMaster']);
Route::post('approve-material', [RawMaterialController::class, 'approveMaterialEntry']);
Route::get('view-edit-material/{raw_id}/{MODE}', [RawMaterialController::class, 'viewEditMaterialModal']);
Route::post('raw-material-approval/{raw_id}', [RawMaterialController::class, 'rawMaterialApproval']);

// Finish Goods master store
Route::get('approval_finish_goods', [FinishGoodsController::class, 'showFinishGoodsMasterApproval']);
Route::get('show_finish_goods', [FinishGoodsController::class, 'showFinishGoodsMaster']);
Route::post('add_finish_goods', [FinishGoodsController::class, 'addFinishGoodsMaster']);
Route::post('add_finish_goods/{goods_id}', [FinishGoodsController::class, 'updateFinshGoodsMaster']);
Route::delete('add_finish_goods/{goods_id}', [FinishGoodsController::class, 'destroyFinishGoodsMaster']);
Route::post('approve-goods', [FinishGoodsController::class, 'approveGoodsEntry']);
Route::get('view-edit-goods-master/{goods_id}/{MODE}', [FinishGoodsController::class, 'viewEditGoodsModal']);
Route::post('goods-master-approval/{goods_id}', [FinishGoodsController::class, 'goodsMasterApproval']);

// Fund master store
Route::get('approval_fund_master', [FundMasterController::class, 'showFundMasterApproval']);
Route::get('show_fund_master', [FundMasterController::class, 'showFundMaster']);
Route::post('add_fund_master', [FundMasterController::class, 'addFundMaster']);
Route::put('add_fund_master', [FundMasterController::class, 'updateFundMaster']);
Route::delete('add_fund_master/{raw_id}', [FundMasterController::class, 'destroyFundMaster']);

// Bank master store
Route::get('approval_bank_master', [BankMasterController::class, 'showBankApproval']);
Route::get('show_bank_master', [BankMasterController::class, 'showBankMaster']);
Route::post('add_bank_master', [BankMasterController::class, 'addBankMaster']);
Route::post('add_bank_master/{bank_id}', [BankMasterController::class, 'updateBankMaster']);
Route::delete('add_bank_master/{bank_id}', [BankMasterController::class, 'destroyBankMaster']);
Route::post('approve-bank', [BankMasterController::class, 'approveBankEntry']);
Route::get('view-edit-bank-master/{bank_id}/{MODE}', [BankMasterController::class, 'viewEditBankModal']);
Route::post('bank-master-approval/{bank_id}', [BankMasterController::class, 'bankMasterApproval']);

// Remarks master store
Route::get('approval_remarks_master', [RemarksMasterController::class, 'showRemarksMasterApproval']);
Route::get('show_remarks_master', [RemarksMasterController::class, 'showRemarksMaster']);
Route::post('add_remarks_master', [RemarksMasterController::class, 'addRemarksMaster']);
Route::post('add_remarks_master/{remark_id}', [RemarksMasterController::class, 'updateRemarksMaster']);
Route::delete('add_remarks_master/{remark_id}', [RemarksMasterController::class, 'destroyRemarksMaster']);
Route::post('approve-remarks', [RemarksMasterController::class, 'approveRemarksEntry']);
Route::get('view-edit-remarks-master/{remark_id}/{MODE}', [RemarksMasterController::class, 'viewEditRemarksModal']);
Route::post('remarks-master-approval/{remark_id}', [RemarksMasterController::class, 'remarksMasterApproval']);


// Subsidy master store
Route::get('approval_subsidy_master', [SubsidyMasterController::class, 'showSubsidyMasterApproval']);
Route::get('show_subsidy_master', [SubsidyMasterController::class, 'showSubsidyMaster']);
Route::post('add_subsidy_master', [SubsidyMasterController::class, 'addSubsidyMaster']);
Route::post('add_subsidy_master/{scheme_id}', [SubsidyMasterController::class, 'updateSubsidyMaster']);
Route::delete('add_subsidy_master/{scheme_id}', [SubsidyMasterController::class, 'destroySubsidyMaster']);
Route::post('approve-scheme', [SubsidyMasterController::class, 'approveSchemeEntry']);
Route::get('view-edit-scheme-master/{scheme_id}/{MODE}', [SubsidyMasterController::class, 'viewEditSchemeModal']);
Route::post('scheme-master-approval/{scheme_id}', [SubsidyMasterController::class, 'schemeMasterApproval']);


Route::group(['prefix' => 'basic-ui'], function () {
    // Route::get('add-benificiary', function () { return view('benificiary-ui.add-benificiary'); });
    //Route::get('search-benificiary', function () { return view('benificiary-ui.search-benificiary'); });
    Route::get('approve-benificiary', function () {
        return view('benificiary-ui.approve-benificiary');
    });
    Route::get('create-subsidy', function () {
        return view('subsidy-ui.create-subsidy');
    });
    Route::get('search-subsidy', function () {
        return view('subsidy-ui.search-subsidy');
    });
    Route::get('approve-subsidy', function () {
        return view('subsidy-ui.approve-subsidy');
    });
    Route::get('create-disbursement', function () {
        return view('disbursement-ui.create-disbursement');
    });
    Route::get('search-disbursement', function () {
        return view('disbursement-ui.search-disbursement');
    });
    Route::get('approve-disbursement', function () {
        return view('disbursement-ui.approve-disbursement');
    });

    Route::get('claim-report', function () {
        return view('report-ui.claim-report');
    });
    Route::get('disbursement-report', function () {
        return view('report-ui.disbursement-report');
    });
    Route::get('composit-report', function () {
        return view('report-ui.composit-report');
    });
    Route::get('sector-wise-report', function () {
        return view('report-ui.sector-wise-report');
    });
    Route::get('bank-ledger-report', function () {
        return view('report-ui.bank-ledger-report');
    });
    Route::get('cash-book-report', function () {
        return view('report-ui.cash-book-report');
    });
    Route::get('fund-receipt-report', function () {
        return view('report-ui.fund-receipt-report');
    });
    Route::get('cheque-return-report', function () {
        return view('report-ui.cheque-return-report');
    });
    Route::get('tables', [FundAllocationController::class, 'tableLayout']);
    Route::get('test', function () {
        return view('master-ui.test');
    });
    Route::get('raw-material-master', function () {
        return view('master-ui.raw-material-master');
    });
});

Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-table', function () {
        return view('pages.tables.basic-table');
    });
    Route::get('data-table', function () {
        return view('pages.tables.data-table');
    });
    Route::get('js-grid', function () {
        return view('pages.tables.js-grid');
    });
    Route::get('sortable-table', function () {
        return view('pages.tables.sortable-table');
    });
});

Route::get('notifications', function () {
    return view('pages.notifications.index');
});

Route::group(['prefix' => 'user-pages'], function () {
    Route::get('login', function () {
        return view('pages.user-pages.login');
    });
    Route::get('login-2', function () {
        return view('pages.user-pages.login-2');
    });
    Route::get('multi-step-login', function () {
        return view('pages.user-pages.multi-step-login');
    });
    Route::get('register', function () {
        return view('pages.user-pages.register');
    });
    Route::get('register-2', function () {
        return view('pages.user-pages.register-2');
    });
    Route::get('lock-screen', function () {
        return view('pages.user-pages.lock-screen');
    });
});

Route::group(['prefix' => 'error-pages'], function () {
    Route::get('error-404', function () {
        return view('pages.error-pages.error-404');
    });
    Route::get('error-500', function () {
        return view('pages.error-pages.error-500');
    });
});

// For Clear cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error-pages.error-404');
})->where('page', '.*');

// 500 for server error
Route::get('error500', function () {
    return View::make('pages.error-pages.error-500');
})->where('page', '.*');
