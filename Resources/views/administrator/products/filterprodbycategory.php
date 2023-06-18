<div class="container-fluid px-xl-5 mt-lg-5">
        <div class="container user-list">
            <div class="row flex-lg-nowrap " >
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2">ALL PRODUCTS UNDER <b><span><?php echo strtoupper($category->name); ?></span></b><small class="px-1"></small></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="max-width">Name</th>
                                            <th class="max-width">Quantity</th>
                                            <th class="max-width">Price</th>
                                            <th class="max-width">IsOnPromo</th>
                                            <th class="max-width">Date Published</th>
                                        </tr>
                                        </thead>
                                        <tbody id="role">
                                        
                                        <?php
                                            $i = 0;?>
                                        <?php foreach ($products as $product): $i++;?>
	                                            <tr>
	                                                <td class="text-center"><?php echo $i ?></td>
	                                                <td><?php echo $product->name; ?></td>
                                                    <td><?php echo $product->quantity; ?></td>
                                                    <td><?php echo $product->price; ?></td>
                                                    <td><?php echo $product->isOnPromototion; ?></td>
	                                                <td><?php echo date('d-M-Y',strtotime($product->created_at)); ?></td>
	                                            </tr>
	                                        <?php endforeach?>
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