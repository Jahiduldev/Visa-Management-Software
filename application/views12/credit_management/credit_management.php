<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Credit Management
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addShopForm"  role="form" method="post"  action="<?php echo site_url('credit_management/addCreditData');  ?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">User *</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="user" name="user"> <!-- input-sm m-bot15  -->
                                        <option value="">Select User</option>
                                        <?php
                                        foreach ($get_user_data as $row) :
                                            ?>
                                        <option value="<?=$row->user_id; ?>"><?=$row->user_name; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                 <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Shop Address*</label>
                                 <div class="col-lg-10">
                                     <textarea class="form-control" placeholder="Enter Shop Address" id="shop_address" name="shop_address"></textarea>
                                 </div>
                             </div>-->
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Amount *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="amount"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Join Date *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Joining Date" id="date_join"  name="date_join">
                                </div>
                            </div>
                            <!--   <div class="form-group">
                                     <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Upload Image*</label>
                                     <div class="col-lg-10">
                                         <input type="file" name="userfile" id="userfile" size="20" />
                                     </div>
                                 </div>-->

                            <!--  <div class="form-group">
                                 <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Status *</label>
                                 <div class="col-lg-10">
                                     <select class="form-control" id="status" name="status">
                                         <option value="">Select Status</option>
                            <?php
                            //    foreach ($get_status_data as $row) :
                            ?>
                                         <option value="<?//=$row->status_id; ?>"><?//=$row->status_detail; ?></option>
                            <?php// endforeach;  ?>
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


