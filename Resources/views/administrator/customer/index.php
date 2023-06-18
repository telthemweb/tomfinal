<div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>CUSTOMERS</span><small class="px-1"></small></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="text-left">#</th>
                                            <th class="text-left">Name</th>
                                            <th class="text-left">Surame</th>
                                            <th class="text-left">Gender</th>
                                            <th class="text-left">Country</th>
                                            <th class="text-left">Transaction</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="role">
                                        <?php
                                        $i =0; ?>
                                        <?php foreach ($customers as $customer): $i++; ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td><?php echo $customer->name ?></td>
                                                <td><?php echo $customer->surname; ?></td>
                                                <td><?php echo $customer->gender; ?></td>
                                                <td><?php echo $customer->country; ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-dark"  href="<?php route('/admin/customer/transaction-history/'.$customer->id) ?>" >
                                                        View Transaction <i class="fa fa-share mr-3 text-green"></i>
                                                    </a>
                                                  
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success"  href="<?php route('/admin/customer/bio/'.$customer->id) ?>" >
                                                        View info <i class="fa fa-edit mr-3 text-green"></i>
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