<div class="container-fluid px-xl-5 mt-lg-2">

    <div class="container user-list">
        <div class="row flex-lg-nowrap">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-5">
                            <div class="card-header bg-dark text-white">Accounts Details <span class="float-right"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#useraccountk">Add Account</button></span></div>
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
                                                            <th class="text-left"></th>
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
                                                                <td class="text-center">
                                                                <a class="btn btn-success rounded-0" href="<?php route('/viewacreditcard/'.$account->id); ?>">
                                                                        View Card </a>
                                                                    <!-- <button class="btn btn-success rounded-0" onclick="viewaccountcard(<?php //echo $account->id; ?>)" data-toggle="modal" data-target="#viewcreditcard">
                                                                        View Card </button> -->
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

                <div class="row mb-lg-5">
                    <div class="col-lg-12">
                        <div id="switchPoint" class="e-panel">
                            <div class="row mb-lg-5">
                                <div class="col-lg-12 ">
                                    <div id="switchPoint" class="e-panel card">
                                        <div class="card">
                                            <div class="card-header bg-dark text-white">MY PROFILE</div>
                                            <div class="card-body">
                                                <h5 class="card-title" id="f_name"><?php echo '<b>Name </b>: ' . '<b class="float-right">' . $_SESSION['name'] . " " . $_SESSION['surname'] . '</b>'; ?></h5>
                                                <div class="dropdown-divider mb-lg-5"></div>
                                                <p class="heading2" id="email"><?php echo '<b>Phone Number</b>:   ' . '<b class="float-right">' . $_SESSION['phone'] . '</b>'; ?></p>
                                                <div class="dropdown-divider mb-lg-5"></div>
                                                <p class="heading2" id="email"><?php echo '<b>E-mail Address:</b>   ' . '<b class="float-right">' . $_SESSION['email'] . '</b>'; ?></p>
                                                <div class="dropdown-divider mb-lg-5"></div>
                                                <p class="heading2" id="email"><?php echo '<b>Gender:</b>   ' . '<b class="float-right">' . $_SESSION['gender'] . '</b>'; ?></p>
                                                <div class="dropdown-divider mb-lg-5"></div>
                                                <p class="heading2" id="email"><?php echo '<b>Province:</b>   ' . '<b class="float-right">' . $_SESSION['province'] . '</b>'; ?></p>
                                                <div class="dropdown-divider mb-lg-5"></div>
                                                <p class="heading2" id="email"><?php echo '<b>District:</b>   ' . '<b class="float-right">' . $_SESSION['district'] . '</b>'; ?></p>

                                                <div class="dropdown-divider mb-lg-5"></div>
                                                <p class="heading2" id="email"><?php echo '<b>City/Town:</b>   ' . '<b class="float-right">' . $_SESSION['city'] . '</b>'; ?></p>
                                                <div class="dropdown-divider mb-lg-5"></div>
                                                <p class="heading2" id="email"><?php echo '<b>Physical Address:</b>   ' . '<b class="float-right">' . $_SESSION['address'] . '</b>'; ?></p>

                                            </div>
                                            <div class="card-footer text-center">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-success float-left rounded-0" data-toggle="modal" data-target="#user-editform-modal" data-toggle="tooltip" title="edit">Edit Profile <i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-red float-right rounded-0  text-white" data-toggle="modal" data-target="#user-form-modal" data-toggle="tooltip" title="delete">Change Password</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">CHANGE PASSWORD</h5>
                <button class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">
                    <form action="<?php route('/changepassword/' . $_SESSION['customer_id']) ?>" method="POST">
                        <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="newpassword" required="required" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="cnewpassword" required="required" placeholder="Confirm New Password">
                            </div>
                        </div>
                        <div class="float-lg-right">
                            <div class="">
                                <button type="submit" class="btn btn-danger login-btn btn-block">SUBMIT</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" role="dialog" tabindex="-1" id="user-editform-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">UPDATE PROFILE</h5>
                <button class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">
                    <form action="<?php route('/profile/update/' . $_SESSION['customer_id']); ?>" method="POST">
                        <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded-0">
                                        <input type="text" class="form-control pl-3" name="name" value="<?php echo $_SESSION['name']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control pl-3" name="surname" value="<?php echo $_SESSION['surname']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="province" id="province">
                                        <option value="" disabled selected><?php echo $_SESSION['province']; ?></option>
                                        <option value="Bulawayo">Bulawayo</option>
                                        <option value="Harare">Harare</option>
                                        <option value="Manicaland">Manicaland</option>
                                        <option value="Mashonaland Central">Mashonaland Central</option>
                                        <option value="Mashonaland East">Mashonaland East</option>
                                        <option value="Mashonaland West">Mashonaland West</option>
                                        <option value="Masvingo">Masvingo</option>
                                        <option value="Matebelend South">Matebelend North</option>
                                        <option value="Matebelend South">Matebelend South</option>
                                        <option value="Midlands">Midlands</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="district" value="<?php echo  $_SESSION['district']; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="address" value="<?php echo  $_SESSION['address']; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="" disabled selected><?php echo $_SESSION['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control pl-3" name="city" value="<?php echo  $_SESSION['city']; ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded-0">
                                        <input type="email" class="form-control pl-3" name="email" value="<?php echo $_SESSION['email']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control pl-3" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                                </div>
                            </div>
                        </div>


                        <div class="float-lg-right">
                            <div class="">
                                <button type="submit" class="btn btn-primary login-btn btn-block">UPDATE</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" role="dialog" tabindex="-1" id="useraccountk" width="250">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">ADD BANK ACCOUNT<b id="ordernumber"></b></h5>
                <button class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">
                    <form>
                        <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                        <div id="errormessage">

                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <select class="form-control" name="country" id="country">
                                    <option value="Zimbabwe" disabled selected>Zimbabwe</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="USA">USA</option>
                                    <option value="England">England</option>
                                    <option value="China">China</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="bank" placeholder="Enter Bank Name" required="required" id="bank">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="accountnumber" placeholder="Enter account Number" required="required" id="accountnumber" onkeydown="tocheckAccountNumber()">
                            </div>
                        </div>
                        <p id="accountnumberlength" class="float-right" style="font-size: 12px;"></p>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="balance" placeholder="Enter account Balance" required="required" id="balance">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="trans_limit" placeholder="Enter Transaction Limit" required="required" id="trans_limit">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="branchname" placeholder="Enter Branch" required="required" id="branchname">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="location" placeholder="Enter Location(Optional)" id="location">
                            </div>
                        </div>


                        <div class="float-lg-right">
                            <button type="button" id="loading" class="btn btn-primary login-btn btn-block" onclick="addCustomerAccountNumber()">SUBMIT</button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>




