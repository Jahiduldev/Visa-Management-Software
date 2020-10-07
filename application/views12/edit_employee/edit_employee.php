<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Employee
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addUserForm"  role="form" method="post"  action="<?php echo site_url('view_employee/editEmployeeData'); ?>" enctype="multipart/form-data">
                            <?php
                            foreach ($get_employee_data as $row) :
                                $id = $row->id;
                                $emp_name = $row->emp_name;
                                $emp_user_name = $row->user_name;
                                $date_joining = $row->joining_date;
                               
                                $phone = $row->mobile_number;
                                $emp_code = $row->emp_id;
                                $email = $row->email;                             
                                $photo_upload = $row->photo_upload;
                                $date = $row->date;

                            endforeach;
                            ?>
                            <?php
                            $role_id = $this->session->userdata('role_id');
                            if ($role_id == 3):
                                $readonly = "readonly";
                                $st = "style=display:none;";
                            else:
                                $readonly = "";
                                $st = "";
                            endif;
                            ?>

                            <div class="form-group" <?= $st ?>>
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Employee Code*</label>
                                <div class="col-lg-10">
                                    <label for="inputSuccess" class="col-sm-2 control-label col-lg-2"><?= $emp_code; ?></label>

                                </div>
                            </div>
                            <div class="form-group" <?= $st ?>>
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Employee  Name*</label>
                                <div class="col-lg-10">
                                    <input type="hidden"  id="id" name="id" value="<?= $id; ?>">
                                    <input type="text" class="form-control" placeholder="Employee  Name" id="emp_name" name="emp_name" value="<?= $emp_name ?>" required="required" >
                                </div>
                            </div>

                            <div class="form-group" <?= $st ?>>
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date Of Joining*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Joining Date Time" id="date_join"  name="date_join" value="<?= $date_joining ?>" >
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Phone*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter phone Number" id="phone" name="phone" value="<?= $phone ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Email*</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?= $email ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Upload Image*</label>
                                <div class="col-lg-10">
                                    <div class="col-lg-6">
                                        <img src="<?php echo $base_url . "/public/uploads/employee/" . $photo_upload; ?>" class="img-rounded" width="100%" height="auto"  />
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" name="userfile" size="20" />
                                    </div>
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


