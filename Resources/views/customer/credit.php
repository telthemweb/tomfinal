<div class="container px-xl-5 mt-lg-5 mb-lg-5">
<button class="btn btn-danger mb-5" data-toggle="modal" data-target="#usercard">Add Card</button>
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>CREDIT CARD</span><small class="px-1"></small><b class="float-right badge badge-warning text-grey p-3 mb-2">Account No# <?php echo " ".$account->accountnumber; ?></b></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                <table class="table table-bordered" id="myTableb">
                                <thead>
                                <tr>
                                    <th class="text-left">#</th>
                                    <th class="text-left">Card Name</th>
                                    <th class="text-left">Card Number</th>
                                    <th class="text-left">Bank</th>
                                    <th class="text-left">View Card</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="role">
                                <?php
                                $i =0; ?>
                                <?php foreach ($creditcard as $card): $i++; ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $card->name ?></td>
                                        <td><?php echo $card->ac_number; ?></td>
                                        <td><?php echo $card->account->bank; ?></td>
                                        <td><button class="btn btn-success rounded-0" onclick="viewaccountcard(<?php echo $card->id; ?>)" data-toggle="modal" data-target="#viewcreditcard">
                                                                        View Card </button></td>
                                        <td class="text-center">
                                        <a class="text-success"  href="<?php route('/creditcard/h/'.$card->id); ?>" >
                                                View Transactions
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

</div>


<div class="modal fade" role="dialog" tabindex="-1" id="viewcreditcard">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">CREDIT CARD DETAILS <i class="pl-lg-5"><i></i></i> <span class="float-right"><b id="accountnumberid"></b></span></h5>

                <button class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">
                    <div class="card mb-5">
                        <div class="card-body border-none">
                            
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    <div class="center">
                                        <div class="crcard">
                                            <div class="flip">
                                                <div class="front">
                                                    <div class="strip-bottom"></div>
                                                    <div class="strip-top"></div>

                                                    <div class="investor" id="cardtype">Investor</div>
                                                    <div class="chip">
                                                        <div class="chip-line"></div>
                                                        <div class="chip-line"></div>
                                                        <div class="chip-line"></div>
                                                        <div class="chip-line"></div>
                                                        <div class="chip-main"></div>
                                                    </div>
                                                    <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                                                        <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                                                        <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                                                        <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
                                                    </svg>
                                                    <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                                                        <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                                                        <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                                                        <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
                                                    </svg>
                                                    <div class="card-number" id="card-number">
                                                       
                                                    </div>
                                                    <div class="end"><span class="end-text">exp. end:</span><span class="end-date" id="end-date">11/22</span></div>
                                                    <div class="card-holder" id="card-holder"></div>
                                                   
                                                </div>
                                                <div class="back">
                                                    <div class="strip-black"></div>
                                                    <div class="ccv">
                                                        <label>ccv</label>
                                                        <div id="ccv">123</div>
                                                    </div>
                                                    <div class="terms" id="terms">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><?php require __DIR__ . '/../layouts/creditcard.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="usercard" width="250">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">ADD BANK CARD<b id="ordernumber"></b></h5>
                <button class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">
                    <form>
                        <div id="crediterrormessage">

                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <select class="form-control" name="name" id="name">
                                    <option value="" disabled selected>Choose Card Type</option>
                                    <option value="VISA">VISA</option>
                                    <option value="MASTERCARD">MASTERCARD</option>
                                    <option value="ECOBANK VISA">ECOBANK VISA</option>
                                    <option value="STEWART VISA">STEWART VISA</option>
                                    <option value="FBC VISA">FBC VISA</option>
                                    <option value="BARCLAYS MASTERCARD">BARCLAYS MASTERCARD</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="form-control pl-3" id="account_Id" value="<?php echo $account->id;?>">

                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="ac_number" placeholder="Enter Card Number" required="required" id="ac_number" onkeydown="tocheckNumberofCreditcard()">
                            </div>
                        </div>
                        <p id="cardnumberlength" class="float-right" style="font-size: 12px;"></p>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="text" class="form-control pl-3" name="cvv" placeholder="Enter Your cvv" required="required" id="cvv">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="rounded">
                                <input type="date" class="form-control pl-3" name="expiry_date" required="required" id="expiry_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="rounded">
                                <input type="password" class="form-control pl-3" name="pin" placeholder="Enter Your pin" required="required" id="pin">
                            </div>
                        </div>



                        <div class="float-lg-right">
                            <button type="button" id="loadingcre" class="btn btn-primary login-btn btn-block" onclick="addCustomerCredit()">SUBMIT</button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
