<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <B style="color:blue">Create Visa Application Form</B>    

                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addPassportForm"  role="form" method="post"  action="<?php echo site_url('create_visa_form/addVisaApp'); ?>"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Full Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Full Name" id="add_full_name" name="add_full_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Mother's Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Mother's Name" id="add_mothers_name" name="add_mothers_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date Of Birth *</label>
                                <div class="col-lg-10">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="add_date_birth" name="add_date_birth" required="required">

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Place Of Birth*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Place" id="add_place" name="add_place">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Profession*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Profession" id="add_profession" name="add_profession">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date Of Passport issue *</label>
                                <div class="col-lg-10">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="add_passport_issue_date" name="add_passport_issue_date" required="required">

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date Of Passport expiry *</label>
                                <div class="col-lg-10">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="add_passport_expiry_date" name="add_passport_expiry_date" required="required">

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Passport No.*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Passport No." id="add_passport_no" name="add_passport_no">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Name Of the Employer In Saudi Arabia(English)*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Name Of the Employer In Saudi Arabia(English)" id="add_saudi_emp_name_eng" name="add_saudi_emp_name_eng">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visa No.(English)*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Visa No.(English)" id="add_visa_no_eng" name="add_visa_no_eng">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visa No.(Arabic)*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Visa No.(Arabic)" id="add_visa_no_ara" name="add_visa_no_ara">
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visa Date(English)*</label>
                                <div class="col-lg-10">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="add_visa_date_eng" name="add_visa_date_eng" required="required">

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visa Date(Arabic)*</label>
                                <div class="col-lg-10">
                                    <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="add_visa_date_ara" name="add_visa_date_ara" required="required">

                                </div>
                            </div>
                            
                             
                             
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Authorization.*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Authorization No." id="add_authorization_no" name="add_authorization_no">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visit Work For.*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Visit Work For." id="add_visit_work_for" name="add_visit_work_for">
                                </div>
                            </div>

                          
                            


                            <!--<div class="form-group">
                            <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Gender*</label>
                            <div class="col-lg-10">
                                    <select class="form-control" id="add_passport_type" name="add_passport_type">
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </select>
                            </div>
                            </div>-->




                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>



    </section>
</section>
<!--main content end-->

