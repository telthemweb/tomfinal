
<div class="container-fluid mt-5">

        <div class="container user-list">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div id="switchPoint" class="e-panel">
                        <div class="row mb-lg-5">
                            <div class="col-lg-12 ">
                                <div id="switchPoint" class="e-panel card">
                                    <div class="card">
                                        <div class="card-header bg-dark text-white"> My Personal Information</div>
                                        <div class="card-body">
                                            <h5 class="card-title" id="f_name"><?php echo '<b>Name </b>: '.'<b class="float-right">'. $_SESSION['name'] ." ".$_SESSION['surname'].'</b>'; ?></h5>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>Phone Number</b>:   ' .'<b class="float-right">'.$_SESSION['phone'] .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>E-mail Address:</b>   ' .'<b class="float-right">'.$_SESSION['email'] .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>Gender:</b>   ' .'<b class="float-right">'.$_SESSION['gender'] .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>City/Town:</b>   ' .'<b class="float-right">'.$_SESSION['city'] .'</b>'; ?></p>
                                            <div class="dropdown-divider mb-lg-5"></div>
                                            <p class="heading2" id="email"><?php echo '<b>Physical Address:</b>   ' .'<b class="float-right">'.$_SESSION['address'] .'</b>'; ?></p>

                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success float-left rounded-0" data-toggle="modal" data-target="#user-editform-modal" data-toggle="tooltip" title="edit">Edit Profile <i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-red float-right rounded-0  text-white" data-toggle="modal" data-target="#user-form-modal" data-toggle="tooltip" title="delete" >Change Password</button>

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
                <button  class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-1">
                <form action="<?php route('/changepassword/c/'.$_SESSION['admin_id']) ?>" method="POST">
                            <div class="form-group">
                                <div class="rounded">
                                    <input type="text" class="form-control pl-3" name="newpassword" 
                                        required="required" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="rounded">
                                    <input type="text" class="form-control pl-3" name="cnewpassword" 
                                        required="required" placeholder="Confirm New Password">
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
                <button  class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div class="py-1">
                <form action="<?php route('/user/u/'.$_SESSION['admin_id']); ?>" method="POST">
                            <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded-0">
                                        <input type="text" class="form-control pl-3" name="name" value="<?php echo $_SESSION['name']; ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control pl-3" name="surname" value="<?php echo $_SESSION['surname']; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <select class="form-control" name="role_Id" id="role_Id" readonly>
                                        <option value="" disabled selected><?php echo  $_SESSION['role_name']; ?></option>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="username" value="<?php echo  $_SESSION['username']; ?>" readonly>
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
                                        <input type="text" class="form-control pl-3" name="address" value="<?php echo  $_SESSION['address']; ?>" >
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
                                    <input type="text" class="form-control pl-3" name="city" value="<?php echo  $_SESSION['city']; ?>" >
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded-0">
                                        <input type="email" class="form-control pl-3" name="email" value="<?php echo $_SESSION['email']; ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control pl-3" name="phone" value="<?php echo $_SESSION['phone']; ?>" >
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

