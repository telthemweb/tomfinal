<div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">
    <div class="row ">
        <div class="col-md-3">
            <div class="text-center">
                <img src="<?php echo url('assets/img/a.jpg'); ?>" alt="Profile Picture" width="400" class="img-fluid  shadow mb-3">
                <b class="mb-lg-5"><?php echo strtoupper($customer->name) . " " . strtoupper($customer->surname); ?> <i class="fa fa-check-circle mr-3 text-primary"></i> </b><br>
                <b class="badge badge-success"><?php echo strtoupper($customer->gender); ?> </b><br><br>
                <button class="btn btn-success" data-toggle="modal" data-target="#user-form-modal">EDIT PROFILE</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#changepassword">BLOCK ACCOUNT</button>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header bg-dark text-white">Customer Details</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo "<b>Phone Number</b>    <span class='float-right'>" . $customer->phone . "</span>" ?></h5>
                    <div class="dropdown-divider mb-lg-3"></div>
                    <h5 class="card-title"><?php echo "<b>E-mail Address</b>    <span class='float-right'>" . $customer->email . "</span>" ?></h5>
                    <div class="dropdown-divider mb-lg-3"></div>
                    <h5 class="card-title"><?php echo "<b>City/Town</b>    <span class='float-right'>" . $_SESSION['city'] . "</span>" ?></h5>

                </div>
            </div>


            <div class="card mb-5">
                <div class="card-header bg-dark text-white">Accounts Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="text-left">#</th>
                                                <th class="text-left">Bank</th>
                                                <th class="text-left">Account Number</th>
                                                <th class="text-left">Balance</th>
                                                <th class="text-left">Branch</th>
                                            </tr>
                                        </thead>
                                        <tbody id="role">
                                            <?php
                                            $i = 0; ?>
                                            <?php foreach ($accounts as $account) : $i++; ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i ?></td>
                                                    <td><?php echo $account->bank ?></td>
                                                    <td><?php echo $account->accountnumber; ?></td>
                                                    <td><?php echo $account->balance; ?></td>
                                                    <td><?php echo $account->branchname; ?></td>

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




            <div class="card mb-5">
                <div class="card-header bg-dark text-white">Card Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTableb">
                                        <thead>
                                            <tr>
                                                <th class="text-left">#</th>
                                                <th class="text-left">Name</th>
                                                <th class="text-left">Account Number</th>
                                                <th class="text-left">Card Number</th>
                                                <th class="text-left">Bank</th>
                                            </tr>
                                        </thead>
                                        <tbody id="role">
                                            <?php
                                            $i = 0; ?>
                                            <?php foreach ($creditcards as $card) : $i++; ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i ?></td>
                                                    <td><?php echo $card->name ?></td>
                                                    <td><?php echo $card->account->accountnumber; ?></td>
                                                    <td><?php echo $card->ac_number; ?></td>
                                                    <td><?php echo $card->account->bank; ?></td>


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


