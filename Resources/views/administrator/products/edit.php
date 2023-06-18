<div class="container-fluid px-xl-5 mb-lg-5 mt-lg-5">
     
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>UPDATE <?php echo strtoupper($product->name); ?></span><small class="px-1"></small></h6>
                            </div>

                            <div class="py-1">
                            <form action="<?php route('/admin/product/update/'.$product->id);?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_crsftoken" value="<?php CSRFToken();?>">
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="name" placeholder="Product Name" value="<?php echo $product->name; ?>"  required="required" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="price" placeholder="Product Price" value="<?php echo $product->price; ?>" id="name">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="rounded">
                              <input type="text" class="form-control pl-3" name="description" placeholder="Description" value="<?php echo $product->description; ?>" id="description">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="quantity" placeholder="Qty"  value="<?php echo $product->quantity; ?>" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="rounded">
                            <select class="form-control" name="category_Id" id="category_Id">
                            <option value="" disabled selected><?php echo $product->category->name; ?></option>
                            <?php foreach ($categories as $item): ?>
                                <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
                            <?php endforeach ?>
                             </select>
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
        </div>
    </div>

    