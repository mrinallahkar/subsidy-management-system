<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled " id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('dashboard-page')}}');">
                <i class="menu-icon mdi mdi-account-box-multiple text-dark mdi-tablet"></i>
                <span class="menu-title" style="font-weight: bold;">Dashboard</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#beneficiary-ui" aria-expanded="" aria-controls="beneficiary-ui">
                <i class="menu-icon mdi mdi-account-box-multiple text-info icon-lg"></i>
                <span class="menu-title" style="font-weight: bold;">Beneficiary</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="beneficiary-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('benificiary-ui.add-benificiary')}}');">Add Beneficiary</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('benificiary-ui.approve-benificiary') }}');">Approve Beneficiary</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#subsidy-claim-ui" aria-expanded="" aria-controls="subsidy-claim-ui">
                <i class="menu-icon mdi mdi-cube text-primary icon-lg"></i>
                <span class="menu-title" style="font-weight: bold;">Subsidy Claim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="subsidy-claim-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('subsidy-ui.add-subsidy') }} ');">Add Subsidy Claim</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('subsidy-ui.approve-subsidy') }}');">Approve Subsidy Claim</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#fund-management-ui" aria-expanded="" aria-controls="fund-allocation-ui">
                <i class="menu-icon mdi mdi-poll-box text-success icon-lg"></i>
                <span class="menu-title" style="font-weight: bold;">Fund Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="fund-management-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('fund-management-ui.subsidy-fund.add-subsidy-fund') }} ');">Add Subsidy Fund</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('fund-management-ui.subsidy-fund.approve-subsidy-fund') }}');">Approve Subsidy Fund</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('fund-management-ui.fund-allocation.add-fund-allocation') }}');">Add Fund Allocation</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('fund-management-ui.fund-allocation.approve-fund-allocation') }}');">Approve Fund Allocation</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#disbursement-ui" aria-expanded="" aria-controls="disbursement-ui">
                <i class="menu-icon mdi mdi-receipt text-warning icon-lg"></i>
                <span class="menu-title" style="font-weight: bold;">Disbursement</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="disbursement-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('disbursement-ui.add-disbursement') }} ');">Add Disbursement</a>
                    </li>
                    <!-- <li class="nav-item  ">
                        <a class="nav-link" href="{{ url('disbursement-ui.search-disbursement') }} ">Search Disbursement</a>
                    </li> -->
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{ url('disbursement-ui.approve-disbursement') }}');">Approve Disbursement</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#report-ui" aria-expanded="" aria-controls="report-ui">
                <i class="menu-icon mdi mdi-account-box-multiple text-danger mdi-elevation-rise"></i>
                <span class="menu-title" style="font-weight: bold;">Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="report-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.fund-receipt-report')}}');">Fund Received Register</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.claim-report')}}');">Claim Received Report</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.pending-claim-report')}}');">Pending Claim Report</a>
                    </li>

                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.disbursement-report')}}');">Disbursement Report</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.composit-report')}}');">Composite Report</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.sector-wise-report')}}');">Sector Wise Report</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.bank-ledger-report')}}');">Bank Ledger Report</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.cash-book-report')}}');">Cash Book Report</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('report-ui.cheque-return-report')}}');">Cheque Returned Register</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<script>
    $("nav flex-column sub-menu li a").click(function() {
        $(this).addClass('active');
    });

    $(".chosen").chosen();
</script>