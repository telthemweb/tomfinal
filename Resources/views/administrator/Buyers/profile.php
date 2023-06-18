<div class="container-fluid ">

        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel">
                        <div class="row mb-lg-5 justify-content-center">
                            <div class="col-lg-10 ">
                                <div id="switchPoint" class="e-panel card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title" id="f_name"><?php echo '<b>Name </b>: '.'<b class="float-right">'. $customer->name ." ".$customer->surname.'</b>'; ?></h5>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>Phone Number</b>:   ' .'<b class="float-right">'.$customer->phone .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>E-mail Address:</b>   ' .'<b class="float-right">'.$customer->email .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>Gender:</b>   ' .'<b class="float-right">'.$customer->gender .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>Province:</b>   ' .'<b class="float-right">'.$customer->province .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>District:</b>   ' .'<b class="float-right">'.$customer->district .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>City/Town:</b>   ' .'<b class="float-right">'.$customer->city .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>Physical Address:</b>   ' .'<b class="float-right">'.$customer->address .'</b>'; ?></p>

                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="<?php route('/admin/customer/f/'.$customer->id) ?>" class="btn btn-success float-left rounded-0" >View Activities<i class="fa fa-check-circle ml-2"></i></a>
                                                    <button class="btn btn-red float-right rounded-0  text-white" >Delete Account<i class="fa fa-trash ml-2"></i></button>

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
    </div>
</div>