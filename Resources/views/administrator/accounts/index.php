<div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">
        
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>CUSTOMERS BANK ACCOUNTS</span><small class="px-1"></small></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                <table class="table table-bordered" id="myTable">
                                <thead>
                                <tr>
                                    <th class="text-left">#</th>
                                    <th class="text-left">Customer</th>
                                    <th class="text-left">Bank</th>
                                    <th class="text-left">Account Number</th>
                                    <th class="text-left">Balance</th>
                                    <th class="text-left">Branch</th>
                                    <th class="text-left">Country</th>
                                    <th class="text-left">Limit</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="role">
                                <?php
                                $i =0; ?>
                                <?php foreach ($accounts as $account): $i++; ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $account->customer->name." ".$account->customer->surname ?></td>
                                        <td><?php echo $account->bank ?></td>
                                        <td><?php echo $account->accountnumber; ?></td>
                                        <td><?php echo $account->balance; ?></td>
                                        <td><?php echo $account->branchname; ?></td>
                                        <td><?php echo $account->country; ?></td>
                                        <td><?php echo $account->trans_limit; ?></td>

                                        <td class="text-center">
                                        <a class="text-success"  href="<?php route('/admin/bank/accounts/'.$account->id); ?>" >
                                                <i class="fa fa-share mr-3 text-green"></i>
                                            </a> 
                                                
                                        </td>
                                        
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>