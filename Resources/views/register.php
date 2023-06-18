<div class="container mb-5 mt-lg-5">
    <div class="row">
        <div class="col-md-12">
        <form action="<?php route('/customer/register'); ?>" method="POST">
                    <input type="hidden" name="_crsftoken" value="<?php CSRFToken();?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="name" placeholder="Name"
                                               required="required" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="surname" placeholder="Surname" id="surname" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                      <input type="text" class="form-control pl-3" name="address" placeholder="Physical Address" id="address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                    <select class="form-control" name="country" id="country" required="required">
                                            <option value="Zimbabwe" disabled selected>Zimbabwe</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="USA">USA</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Australia">Australia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <select class="form-control" name="province" id="province">
                                            <option value="" disabled selected>Select Province</option>
                                            <option value="Bulawayo">Bulawayo</option>
                                            <option value="Harare">Harare</option>
                                            <option value="Manicaland">Manicaland</option>
                                            <option value="Matebeleland North">Matebeleland North</option>
                                            <option value="Matebeleland South">Matebeleland South</option>
                                            <option value="Mashonaland Central">Mashonaland Central</option>
                                            <option value="Mashonaland East">Mashonaland East</option>
                                            <option value="Mashonaland West">Mashonaland West</option>
                                            <option value="Masvingo">Masvingo</option>
                                            <option value="Midlands">Midlands</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control pl-3" name="district" placeholder="District" id="district">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="phonenumber" placeholder="Phone number" id="phonenumber" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="email" class="form-control pl-3" name="email" placeholder="Email Address" id="email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <select class="form-control" name="gender" id="gender" required="required">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="Male">MALE</option>
                                            <option value="Female">FEMALE</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                    <input type="password" class="form-control pl-3" name="password" placeholder="Password" id="password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <div class="rounded">
                                        <input type="text" class="form-control pl-3" name="city" placeholder="Town/City" id="city">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="float-lg-right">
                            <div class="">
                                <button type="submit" class="btn btn-primary login-btn btn-block">CREATE ACCOUNT</button>
                            </div>
                        </div>
                    </form>

        </div>
    </div>
</div>