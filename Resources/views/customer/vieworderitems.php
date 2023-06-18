<div class="container-fluid px-xl-5 mt-lg-5">
        
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>ORDERS ITEMS </span><small class="px-1"></small>
                                <b class="float-right"><?php echo "ORDERNO# :". $order->id; ?></b></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="max-width">Image</th>
                                            <th class="max-width">Product</th>
                                            <th class="max-width">Price</th>
                                            <th class="max-width">Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody id="role">
                                        <?php
                                        $i =0; ?>
                                        
                                        <?php foreach ($orderitems as $data): $i++; ?>
                                        
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td><img src="<?php echo url($data->product->product_img); ?>" alt="<?php echo url('assets/img/2.png'); ?>" width="40" class="img-thumbnail bg-gradient-gray"></td>
                                               <td><?php echo $data->product->name; ?></td>
                                                <td><?php echo $data->product->price; ?></td>
                                                <td><?php echo $data->quantity; ?></td>
                                            
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>