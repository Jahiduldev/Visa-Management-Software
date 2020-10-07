<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Customer
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addCustomerForm"  role="form" method="post"  action="<?php echo site_url('add_customer/addCustomer');  ?>">

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Install Date *</label>
                                <div class="col-lg-10">
                                   <input class="form-control form-control-inline input-medium default-date-picker" placeholder="Install Date" size="16" value="" type="text"   id="install_date" name="install_date">
                                 <!--   <input size="16" value="" placeholder="Install Date"  class="form_datetime form-control" id="install_date" name="install_date" type="text">-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Customer Code *</label>
                                <div class="col-lg-10">
                                    <input type="text" readonly="readonly" class="form-control" value="<?=$last_row?>" placeholder="Auto Generated" id="customer_code" name="customer_code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Sales by *</label>
                                <div class="col-lg-10">  
                                    <select class="form-control" name="salesby" id="salesby" required>
                                        <option value="">Select Sales by</option>
                                        <?php
                                        foreach ($get_base_employees_data as $row) :
                                            $id=$row->em_id;
                                            $employee_code=$row->employee_code;
                                            ?>
                                        <option value="<?=$id?>"><?=$employee_code?></option>
                                        <?php endforeach;  ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Install by *</label>
                                <div class="col-lg-10">  
                                    <select class="form-control" name="installby" id="installby" required>
                                        <option value="">Select Install by</option>
                                        <?php
                                        foreach ($get_base_employees_data as $row) :
                                            $id=$row->em_id;
                                            $employee_code=$row->employee_code;
                                            ?>
                                        <option value="<?=$id?>"><?=$employee_code?></option>
                                        <?php endforeach;  ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Tech Zone *</label>
                                <div class="col-lg-10">  
                                    <select class="form-control" name="techzone" id="techzone" required>
                                        <option value="">Select Zone</option>
                                         <?php
                                        foreach ($get_base_areas_data as $row) :
                                            $id=$row->a_id;
                                            $area_name=$row->area_name;
                                            ?>
                                       <option value="<?=$id?>"><?=$area_name?></option>
                                        <?php endforeach;  ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Models *</label>
                                <div class="col-lg-10">  
                                    <select class="form-control" name="model" id="model" required>
                                        <option value="">Select Model</option>
                                        <?php
                                        foreach ($get_base_models_data as $row) :
                                            $id=$row->mo_id;
                                            $model_name=$row->model_name;
                                            ?>
                                       <option value="<?=$id?>"><?=$model_name?></option>
                                        <?php endforeach;  ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Customer Name *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Customer Name" id="customer_name" name="customer_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Customer Address</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" placeholder="Enter Address" id="address" name="address"></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Customer Phone *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Phone" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date of Birth </label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Date Of Birth" value="" type="text" id="date_birth" name="date_birth">
                                  
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Email Address *</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
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

