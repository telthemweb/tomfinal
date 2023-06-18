<div class="container px-xl-5 mt-lg-5">
<h4>DASHBOARD/Admin</h4>
    <div class="row mb-3">
        
        <div class="col-md-4">
            <a class="text-white " href="<?php route('/admin/customers');?>">
                <div class="card bg-info">
                    <div class="card-header text-white"><span>Customers</span><b class="float-right"><i class="fa fa-file"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><?php echo $totalcustom; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4"><a class="text-white " href="<?php route('/admin/transactions');?>">
                <div class="card bg-secondary">
                    <div class="card-header text-white"><span>Transactions</span><b class="float-right"><i class="fa fa-shopping-cart"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><?php echo $countTransaction; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-white " href="">
                <div class="card bg-danger">
                    <div class="card-header text-white"><span>Frauds list</span><b class="float-right"><i class="fa fa-database"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right">0</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-md-4">
            <a class="text-white " href="<?php route('/admin/bank/accounts');?>">
                <div class="card bg-dark">
                    <div class="card-header text-white"><span>Bank Accounts</span><b class="float-right"><i class="fa fa-university"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><?php echo $countAccount; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4"><a class="text-white " href="<?php route('/admin/bank/credits');?>">
                <div class="card bg-primary">
                    <div class="card-header text-white"><span>Credit Cards</span><b class="float-right"><i class="fa fa-credit-card"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><?php echo $countCreditcard; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-white " href="<?php route('/admin/categories');?>">
                <div class="card bg-success">
                    <div class="card-header text-white"><span>Categories</span><b class="float-right"><i class="fa fa-box"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><?php echo $countCategory; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <a class="text-white " href="<?php route('/admin/products');?>">
                <div class="card bg-success">
                    <div class="card-header text-white"><span>Products</span><b class="float-right"><i class="fa fa-folder"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><?php echo $countProduct; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4"><a class="text-white " href="<?php route('/systemlogs');?>">
                <div class="card bg-secondary">
                    <div class="card-header text-white"><span>System logs</span><b class="float-right"><i class="fa fa-database"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><i class="fa fa-database"></i></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-white " href="<?php route('/audits');?>">
                <div class="card bg-danger">
                    <div class="card-header text-white"><span>Audit Logs</span><b class="float-right"><i class="fa fa-bug"></i></b></div>
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3 class="float-right"><i class="fa fa-bug"></i></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


</div>
</div>
</div>