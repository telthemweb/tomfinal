<div class="container-fluid px-xl-5 mt-lg-5">
        
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>ORDERS FOR <?php echo strtoupper($customer->name." ".$customer->surname); ?></span><small class="px-1"></small></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="max-width">Order Number</th>
                                            <th class="max-width">Quantity</th>
                                            <th class="max-width">Total</th>
                                            <th class="max-width">Status</th>
                                            <th class="max-width">Date Paid</th>
                                            <th class="max-width">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="role">
                                        <?php
                                        $i =0; ?>
                                        
                                        <?php foreach ($orders as $data): $i++; ?>
                                        
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td><?php echo $data->ordernumber; ?></td>
                                                <td><?php echo $data->quantity; ?></td>
                                                <td><?php echo $data->total_amt; ?></td>
                                                <?php if($data->ispaid =="1"):?>
                                                <td class="text-center">Paid <i class="fa fa-check-circle mr-3 text-primary"></i></td>
                                                <?php else:?>
                                                <td class="text-center"><b class="text-danger">Not Paid</b></td>
                                                <?php endif;?>
                                                <td><?php echo date('d-M-Y',strtotime($data->created_at)); ?></td> 
                                                <td class="text-center">
                                                <a class="text-success"  href="<?php route('/admin/customer/orderitems/'.$data->id); ?>" >
                                                        View Items <i class="fa fa-eye mr-3 text-green"></i>
                                                    </a> 

                                                   
                                                   
                                                </td>
                                            </tr>
                                            
                                        <?php endforeach; ?>
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

