<style>
    #prod-img-holder {
        height: 45vh !important;
        width: calc(100%);
        overflow: hidden;
    }

    #prod-img {
        object-fit: scale-down;
        height: calc(100%);
        width: calc(100%);
        transition: transform .3s ease-in;
    }

    #prod-img-holder:hover #prod-img {
        transform: scale(1.2);
    }
</style>
<div class="container px-xl-5 mt-lg-5">
    <div class="row justify-content-center mb-lg-5">
        <div class="card card-outline card-primary rounded-0 shadow">
            <div class="card-header">
                <h5 class="card-title pt-3"><b>Product Details</b></h5>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div id="msg"></div>
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                            <div class="position-relative overflow-hidden" id="prod-img-holder">
                                <img src="<?php echo url($product->product_img); ?>" alt="<?php echo url('assets/img/2.png'); ?>" id="prod-img" class="img-thumbnail bg-gradient-gray">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <h3><b><?php echo $product->name; ?></b></h3>
                            
                            <div class="d-flex">
                                <div class="col-auto px-0"><b class="text-muted">Category: </b></div>
                                <div class="col-auto px-0 flex-shrink-1 flex-grow-1">
                                    <p class="m-0"><span class="text-muted ml-lg-5"><?php echo $product->category->name; ?></span></p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="col-auto px-0"><b class="text-muted">Price: </b></div>
                                <div class="col-auto px-0 flex-shrink-1 flex-grow-1">
                                    <p class="m-0 pl-3"><span class="text-primary ml-lg-5"><?php echo "  $" . format_num($product->price) . ".00"; ?></span></p>
                                </div>
                            </div>
                            <form action="<?php route('/cart'); ?>" method="POST">
                                <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                                <div class="row align-items-end">
                                    <div class="col-md-3 form-group">
                                        <input type="number" min="1" id='qty' name='quantity' value="1" class="form-control  text-center">
                                    </div>
                                    <div class="col-md-6 form-group">

                                        <input type="hidden" name="product_Id" value="<?php echo $product->id; ?>">
                                        <button class="btn btn-primary " type="submit" id="add_to_cart"><i class="fa fa-cart-plus"></i> AddtoCart</button>

                                    </div>
                                </div>
                            </form>
                            <div class="w-100"><?php echo html_entity_decode($product->description) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>