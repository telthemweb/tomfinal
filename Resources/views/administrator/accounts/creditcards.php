<div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>CREDIT CARDS</span><small class="px-1"></small><b class="float-right"></b></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                <table class="table table-bordered" id="myTableb">
                                <thead>
                                <tr>
                                    <th class="text-left">#</th>
                                    <th class="text-left">Card Name</th>
                                    <th class="text-left">Customer</th>
                                    <th class="text-left">Card Number</th>
                                    <th class="text-left">Bank</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="role">
                                <?php
                                $i =0; ?>
                                <?php foreach ($creditcards as $card): $i++; ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $card->name ?></td>
                                        <td><?php echo $card->customer->name." ".$card->customer->surname ?></td>
                                        <td><?php echo $card->ac_number; ?></td>
                                        <td><?php echo $card->account->bank; ?></td>
                                        <td class="text-center">
                                        <a class="text-success"  href="<?php route('/admin/bankcard/transaction-history/'.$card->id); ?>" >
                                                View Transactions
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
</div>