<div class="container px-xl-5 mt-lg-5">
    <div class="row  mb-lg-5">
        <div class="col-md-12 ">

            <div class="card card-outline card-primary rounded-0 shadow border">
                <div class="card-header rounded-0 bg-danger text-white">MY CART <b class="float-right"><i class="fa fa-shopping-cart"></i></b></div>
                <div class="card-body p-2">
                   
                    <form method="POST" action="<?php route('/order'); ?>">
                        <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                        <input type="hidden" name="totalquntity" value="<?php echo $totalquntity; ?>">
                        <input type="hidden" name="total_amt" value="<?php echo $carttotlamout; ?>">
                        <?php foreach ($carts as $cart) : ?>
                            <div class="col-md-12 mb-lg-5">
                                <div class="card">



                                    <div class="d-flex align-items-center border p-2">
                                        <div class="col-2 text-center">
                                            <a href="#"><img src="<?php echo url($cart->product->product_img); ?>" alt="" class="img-center prod-img border bg-gradient-gray rounded-0" width="120"></a>
                                        </div>
                                        <div class="col-auto flex-shrink-1 flex-grow-1 ">
                                            <p class="mt-lg-5"></p>
                                            <h4><b><?php echo $cart->product->name; ?></b></h4>
                                            <div class="d-flex mb-lg-5">
                                                <div class="col-auto px-0"><small class="text-muted">Price: </small></div>
                                                <div class="col-auto px-0 flex-shrink-1 flex-grow-1">
                                                    <p class="m-0 pl-3"><small class="text-primary"><?php echo "$" . format_num($cart->product->price) . ".00"; ?></small></p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="d-flex">
                                            <div class="col-auto px-2"><small class="text-muted">
                                                    <h2 class="mt-0">Qty:</h2>
                                                </small></div>
                                            <div class="col-auto">
                                                <div class="mt-2" style="width:10em">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend"><button class="btn btn-dark min-qty" data-id="1" type="button"><i class="fa fa-minus"></i></button></div>
                                                        <input type="text" value="<?php echo $cart->quantity; ?>" class="form-control text-center" readonly="readonly">
                                                        <div class="input-group-append"><button class="btn btn-dark plus-qty" data-id="1" type="button"><i class="fa fa-plus"></i></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12 border">
                                        <div class="d-flex p-2">
                                            <div class="col-9 text-right font-weight-bold text-muted">Total</div>
                                            <div class="col-3 text-right font-weight-bold"><?php echo "$" . format_num($cart->quantity * $cart->product->price) . ".00"; ?></div>
                                        </div>
                                    </div>

                                </div>
                            </div>




                            <input type="hidden" name="product_Id[]" value="<?php echo $cart->product_Id; ?>">
                            <input type="hidden" name="productName[]" value="<?php echo $cart->product->name; ?>">
                            <input type="hidden" name="price[]" value="<?php echo $cart->product->price; ?>">
                            <input type="hidden" name="quantity[]" value="<?php echo $cart->quantity; ?>">
                            <input type="hidden" name="total[]" value="<?php echo $cart->quantity * $cart->product->price; ?>">
                        <?php endforeach; ?>

                        <div class="d-flex p-2">
                            <div class="col-9 h4 font-weight-bold text-right text-muted">Grand Total</div>
                            <div class="col-3 h4 font-weight-bold text-right"><?php echo "$" . format_num($carttotlamout) . ".00"; ?></div>
                        </div>

                        <div class="clear-fix mb-2"></div>
                        <div class="text-right">
                            <button type="submit" class="btn  btn-danger btn-lg">Checkout </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>