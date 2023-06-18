<div class="container-fluid px-xl-5 mb-lg-5 mt-lg-5">

    <div class="container user-list">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div id="switchPoint" class="e-panel card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="modal-title text-dark">Make Payment for Order Number #<b><?php echo $order->id;?></b> <badge class="badge badge-success p-2 float-right">Total $<?php echo $order->total_amt;?></badge></h5>
                        </div>

                        <div class="py-1">
                            <form action="<?php route('/order/payment'); ?>" method="POST">
                                <div id="errormessage"></div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="cardnumber"  name="cardnumber"  placeholder="Enter Credit Card Number" onchange="detectCardType()">
                                </div>
                                <div class="form-group" id="card_typecontainer">
                                    <input type="text" class="form-control" id="card_type" placeholder="Credit Card type" readonly>
                                    <input type="hidden" class="form-control" name="order_Id" value="<?php echo $order->id;?>">
                                    <input type="hidden" class="form-control" name="customer_Id" value="<?php echo $order->customer_Id;?>" >
                                    <input type="hidden" class="form-control" name="total_amt" value="<?php echo $order->total_amt;?>" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="card_expiry" placeholder="MM / YY" pattern="(0[1-9]|1[0-2])\/(\d{2})" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="card_cvc" placeholder="Enter CVC">
                                </div>

                                <div class="float-lg-right">
                                    <button type="submit" id="loading" class="btn btn-primary login-btn btn-block">SUBMIT</button>
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