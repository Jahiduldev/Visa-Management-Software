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
                        <form class="cmxform form-horizontal tasi-form" id="addShopForm"  role="form" method="post"  action="<?php echo site_url('view_credit_management/editCreditManagementData');  ?>" enctype="multipart/form-data">
                            <?php
                            foreach ($get_credit_management_data as $row) :
                                $id= $row->id;
                                $user_id= $row->user_id;
                                $amount= $row->amount;
                                $joining_date= $row->joining_date;
                                $status= $row->status;
                            endforeach;
                            ?>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">User *</label>
                                <div class="col-lg-10">
                                    <input type="hidden" name="edit_id" value="<?=$id;?>"/>
                                    <select class="form-control" id="user" name="user"> <!-- input-sm m-bot15  -->
                                        <option value="">Select User</option>
                                        <?php
                                        foreach ($get_user_data as $row) :
                                            if($user_id==$row->user_id):
                                                    ?>
                                        <option value="<?=$row->user_id; ?>" selected><?=$row->user_name; ?></option>
                                        <?php
                                        else:
                                            ?>
                                            <option value="<?=$row->user_id; ?>"><?=$row->user_name; ?></option>
                                        <?php
                                                endif;
                                            ?>
                                    
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Amount *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="amount"  value="<?=$amount?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Join Date *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Joining Date" id="date_join"  name="date_join" value="<?=$joining_date?>">
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


