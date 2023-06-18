<div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">
    <div class="container user-list">
        <button class="btn btn-success mb-4 rounded-0" data-toggle="modal" data-target="#user-form-modal">
            New Product <i class="fa fa-folder"></i>
        </button>
        <div class="row flex-lg-nowrap ">
            <div class="col-lg-12">
                <div id="switchPoint" class="e-panel card">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 class="mr-2"><span>PRODUCTS LIST</span><small class="px-1"></small></h6>
                        </div>
                        <div class="e-table">
                            <div class="table-responsive table-lg mt-3">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="max-width">Picture</th>
                                            <th class="max-width">Name</th>
                                            <th class="max-width">Category</th>
                                            <th class="max-width">Quantity</th>
                                            <th class="max-width">Price</th>
                                            <th class="max-width">Date Published</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="role">

                                        <?php
                                        $i = 0; ?>
                                        <?php foreach ($products as $product) : $i++; ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td><img src="<?php echo url($product->product_img); ?>" class="img-fluid" width="40"></td>
                                                <td><?php echo $product->name; ?></td>
                                                <td><?php echo $product->category->name; ?></td>
                                                <td><?php echo $product->quantity; ?></td>
                                                <td><?php echo $product->price; ?></td>
                                                <td><?php echo date('d-M-Y', strtotime($product->created_at)); ?></td>
                                                <td class="text-center">

                                                    <a class="text-success" href="<?php route('/admin/product/' . $product->id); ?>">
                                                        Edit <i class="fa fa-edit mr-3 text-green"></i>
                                                    </a>|
                                                    <a class="text-danger" href="<?php route('/admin/product/delete/' . $product->id); ?>">
                                                        Delete <i class="fa fa-trash mr-3 text-green"></i>
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

<div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">CREATE PRODUCT</h5>
                <button class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">

                    <form action="<?php route('/addproduct'); ?>" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="name" placeholder="Product Name" required="required" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="price" placeholder="Product Price" required="required" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="description" placeholder="Description" required="required" id="description">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="quantity" placeholder="Qty" required="required" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <select class="form-control" name="category_Id" id="category_Id">
                                    <option value="" disabled selected>Category</option>
                                    <?php foreach ($categories as $item) : ?>
                                        <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="date" class="form-control pl-3" name="expiry_date" placeholder="Zuva richaora chirimwa zvenyu" id="expiry_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="rounded">
                                <label for="">Upload Product Picture</label>
                                <input type="file" class="form-control pl-3" name="product_img" placeholder="Upload picture" id="product_img">
                            </div>
                        </div>

                        <div class="float-lg-right">
                            <div class="">
                                <button type="submit" class="btn btn-primary login-btn btn-block">SUBMIT</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>