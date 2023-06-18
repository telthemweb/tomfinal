<div class="container-fluid px-xl-5 mt-5">
       
        <div class="container user-list">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div id="switchPoint" class="e-panel card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>BUYERS</span><small class="px-1"></small></h6>
                            </div>
                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="max-width">Name</th>
                                            <th class="max-width">Surname</th>
                                            <th class="max-width">Phone</th>
                                            <th class="max-width">City</th>
                                            <th class="max-width">Gender</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="role">
                                        <?php
                                        $i =0; ?>
                                        <?php foreach ($customers as $comp): $i++; ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td><?php echo $comp->name; ?></td>
                                                <td><?php echo $comp->surname; ?></td>
                                                <td><?php echo $comp->phone; ?></td>
                                                <td><?php echo $comp->city; ?></td>

                                                <td><?php echo $comp->gender; ?></td>

                                                <td class="text-center">
                                                    <a class="text-success"  href="<?php route('/admin/customer/'.$comp->id) ?>" >
                                                        <i class="fa fa-eye mr-3 text-green"></i>
                                                    </a>
                                                    <a class="text-danger"  href="<?php route('/admin/customer/f/'.$comp->id) ?>" >
                                                        <i class="fa fa-file mr-3 text-red"></i>
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
