<div class="container-fluid px-xl-5 mt-lg-5">
        <div class="container user-list">
            <div class="row flex-lg-nowrap mb-lg-5" >
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>TRANSACTIONS LIST </span><small class="px-1"></small></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="max-width">Customer</th>
                                            <th class="max-width">CardName</th>
                                            <th class="max-width">AccountNumber</th>
                                            <!-- <th class="max-width">Product</th> -->
                                            <!-- <th class="max-width">Price</th>
                                            <th class="max-width">Qty</th> -->
                                            <th class="max-width">Amount</th>
                                            <th class="max-width">Country</th>
                                            <th class="max-width">City</th>
                                        </tr>
                                        </thead>
                                        <tbody id="role">
                                        <?php
                                        $i =0; ?>
                                        <?php foreach ($transactions as $transaction): $i++; ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td><?php echo $transaction->customer->name." ".$transaction->customer->surname ?></td>
                                                <td><?php echo $transaction->creditcard->name ?></td>
                                                <td><?php echo $transaction->account->accountnumber; ?></td>
                                                <td><?php echo $transaction->amount; ?></td>
                                                <td><?php echo $transaction->country; ?></td>
                                                <td><?php echo $transaction->city; ?></td>
                                                <!-- <td><?php // echo $transaction->ipaddress; ?></td>
                                                <td><?php //echo $transaction->created_at; ?></td>
                                                <td><?php //echo $transaction->timetransaction; ?></td> -->
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