<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Employee
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addUserForm"  role="form" method="post"  action="<?php echo site_url('add_employee/addEmployeeData'); ?>" enctype="multipart/form-data">


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Employee Id*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Employee Id" id="employee_id" name="employee_id" value="<?=rand(10000, 99999);?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Name" id="employee_name" name="employee_name"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date Of Birth*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Date Of Birth" id="date_birth"  name="date_birth" required>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Department*</label>
                                <div class="col-lg-10">
                                      <input type="text" class="form-control" placeholder="Enter Department" id="department" name="department"  required>
                                   
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Designation*</label>
                                <div class="col-lg-10">
                                     <input type="text" class="form-control" placeholder="Enter Designation" id="designation" name="designation"  required>
                                  
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Gross Salary*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Gross Salary" id="gross_salary" name="gross_salary" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Reporting To*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Reporting To" id="reporting_to" name="reporting_to" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Appointed Date*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Appointed Date" id="appointed_date"  name="appointed_date" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Joining Date*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Joining Date " id="joining_date"  name="joining_date" required>
                                </div>
                            </div>  

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Prohibition Period*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Prohibition Period" id="prohibition_period"  name="prohibition_period" required>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">User Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter User Name" id="user_name"  name="user_name" required>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Password*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Password" id="password"  name="password" required>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Gender*</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="gender" name="gender" required> <!-- input-sm m-bot15  -->
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Marital Status*</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="marital_status" name="marital_status" required> <!-- input-sm m-bot15  -->
                                        <option value="">Select Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Single">Married</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Religion*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Religion" id="religion" name="religion" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Mobile Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number" id="mobile_number" name="mobile_number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Email*</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Father Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Father Name" id="father_name" name="father_name" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Mother Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Mother Name" id="mother_name" name="mother_name" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Emergency Contact*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Emergency Contact" id="emergency_contact" name="emergency_contact" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Photo Upload*</label>
                                <div class="col-lg-10">
                                    <input type="file" name="photo" id="photo" size="20" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Signature Upload*</label>
                                <div class="col-lg-10">
                                    <input type="file" name="signature" id="signature" size="20"  required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Present Address*</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" placeholder="Enter Present Address" id="present_address" name="present_address" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Permanent Address*</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" placeholder="Enter Permanent Address" id="permanent_address" name="permanent_address" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">CV Upload*</label>
                                <div class="col-lg-10">
                                    <input type="file" name="cv" id="cv" size="20" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Status*</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="status" name="status" required> <!-- input-sm m-bot15  -->
                                        <option value="">Select Status</option>
                                        <?php
                                        foreach ($get_status_data as $row) :
                                            ?>
                                            <option value="<?= $row->status_id; ?>"><?= $row->status_detail; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>


    </section>
</section>
<!--main content end-->


