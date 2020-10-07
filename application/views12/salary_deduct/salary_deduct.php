<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Employee  Information
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addUserForm2"  role="form" method="post"  action="#" enctype="multipart/form-data">

                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-2">
                                    <input type="text" class="form-control" placeholder="Enter employee id"  id="employee_code" name="employee_code" pattern="\d*" title="Please enter only employee code">                                 
                                </div>
                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-info pull-left" onclick="getEmployeeInfo()">Search</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"  id="employee_name" name="employee_name"  readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Department</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"  id="department" name="department"  readonly>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Designation</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"  id="designation" name="designation"  readonly>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Joining Date</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control"  id="joining_date"  name="joining_date" readonly>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Mobile Number</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control"  id="mobile_number" name="mobile_number" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Email</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control"  id="email" name="email" readonly>
                                </div>
                            </div>

                        </form>

                    </div>
                </section>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Salary  Deduct
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addUserForm"  role="form" method="post"  action="<?php echo site_url('salary_deduct/addSalaryDeduct'); ?>" enctype="multipart/form-data">

                            
                           <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Employee Id</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control"  id="employee_code2" name="employee_code2" pattern="\d*" title="Please enter only employee code" required readonly>                                 
                                </div>
                               
                            </div> 
                            
                            
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Deduct Type*</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="deduct_type" name="deduct_type" required> <!-- input-sm m-bot15  -->
                                        <option value="">Deduct Type</option>
                                        <?php
                                        foreach ($get_salary_deduct_type_data as $row) :
                                            ?>
                                            <option value="<?= $row->id; ?>"><?= $row->type; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                     <input type="hidden" class="form-control"  id="id" name="id" >
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Amount*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="amount"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Note*</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" placeholder="Enter Note" id="note" name="note" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Date" id="deduct_date"  name="deduct_date" required>
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


