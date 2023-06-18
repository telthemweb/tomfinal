<div class="container-fluid px-xl-5 mt-lg-5">

    <div class="container user-list">
        <div class="row flex-lg-nowrap">
            <div class="col-lg-12">
                <div id="switchPoint" class="e-panel card">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="mr-2"><span>Orders</span><small class="px-1"></small></h6>
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
                                            <th class="max-width">IsPaid</th>
                                            <th class="max-width">Date Paid</th>
                                            <th class="max-width text-center">View</th>
                                            <th class="max-width text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="role">
                                        <?php
                                        $i = 0; ?>

                                        <?php foreach ($orders as $data) : $i++; ?>

                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td class="text-center"><?php echo $data->id; ?></td>
                                                <td class="text-center"><?php echo $data->quantity; ?></td>
                                                <td class="text-center"><?php echo $data->total_amt; ?></td>
                                                <?php if ($data->ispaid == "1") : ?>
                                                    <td class="text-center">Paid <i class="fa fa-check-circle mr-3 text-primary"></i></td>
                                                <?php else : ?>
                                                    <td class="text-center"><b class="text-danger">Not Paid</b></td>
                                                <?php endif; ?>
                                                <td><?php echo date('d-M-Y', strtotime($data->created_at)); ?></td>
                                                <td class="text-center">
                                                    <a class="text-success" href="<?php route('/order/items/' . $data->id); ?>">
                                                        View Items <i class="fa fa-eye mr-3 text-green"></i>
                                                    </a>
                                                </td>

                                                <?php if ($data->ispaid == "1") : ?>

                                                    <td class="text-center">Paid <i class="fa fa-check-circle mr-3 text-primary"></i></td>

                                                <?php else : ?>
                                                    <td class="text-center">
                                                        <a href="<?php route('/order/getpaymentform/'.$data->id); ?>" class="btn btn-primary rounded-0">
                                                            Make Payment </a>
                                                    </td>
                                                <?php endif; ?>
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






<div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal" width="250">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Make Payment for Order Number #<b id="ordernumber"></b></h5>
                <button class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">
                    

            </div>
        </div>
    </div>
</div>
</div>