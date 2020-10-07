<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add User
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addUserForm"  role="form" method="post"  action="<?php echo site_url('add_user/addUser');  ?>">
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Role Name *</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="add_role" name="add_role"> <!-- input-sm m-bot15  -->
                                        <option value="">Select Role Name</option>
                                        <?php
                                        foreach ($get_role_data as $row) :
                                            ?>
                                        <option value="<?=$row->role_id; ?>"><?=$row->role_name; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Company Name *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Company Name" id="add_company_name" name="add_company_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Full Name *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Full Name" id="add_full_name" name="add_full_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">User Name *</label>
                                <div class="col-lg-10">  
                                    <input type="text" class="form-control" placeholder="Enter User Name" id="add_user_name" name="add_user_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Password *</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" placeholder="Enter Password" id="add_password" name="add_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Phone *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Phone" id="add_phone" name="add_phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Email *</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" placeholder="Enter Email" id="add_email" name="add_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Address</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" placeholder="Enter Address" id="add_address" name="add_address"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Status *</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="add_status" name="add_status"> <!-- input-sm m-bot15  -->
                                        <option value="">Select Status</option>
                                        <?php
                                        foreach ($get_status_data as $row) :
                                            ?>
                                        <option value="<?=$row->status_id; ?>"><?=$row->status_detail; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View User
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr>
                                        <th class="hidden-phone">User Role</th>
                                        <th class="hidden-phone">Full Name</th>
                                        <th>User Name</th>

                                        <th class="hide_coloum">Phone</th>
                                        <th class="hide_coloum">Email</th>
                                        <th class="hide_coloum">Status</th>
                                        <th class="hide_coloum">DateTime</th>
                                        <th>Action</th>
                                        <th class="hide_coloum">User Id</th>
                                    <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_user_data as $rowUser) :
                                        $role_id=$rowUser->role_id;
                                        $queryRole = $this->db->query("SELECT * FROM user_role WHERE role_id='$role_id'");
                                        foreach ($queryRole->result() as $rowRole) {
                                            $role_name=$rowRole->role_name;
                                        }

                                        $name=$rowUser->name;
                                        $user_id=$rowUser->user_id;
                                        $status_id=$rowUser->status;
                                        $queryStatus = $this->db->query("SELECT * FROM status WHERE status_id='$status_id'");
                                        foreach ($queryStatus->result() as $rowStatus) {
                                            $status_detail=$rowStatus->status_detail;
                                        }

                                        ?>
                                    <tr class="gradeX">
                                        <td class="hidden-phone"><?php echo $role_name; ?></td>
                                        <td class="hidden-phone"><?php echo $name; ?></td>
                                        <td><?php echo $rowUser->user_name; ?></td>

                                        <td class="hide_coloum"><?php echo $rowUser->phone; ?></td>
                                        <td class="hide_coloum"><?php echo $rowUser->email; ?></td>
                                        <td class="hide_coloum"><?php echo $status_detail; ?></td>
                                        <td class="hide_coloum"><?php echo $rowUser->date_time; ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" onclick="editUser(<?=$user_id?>);"><i class="fa fa-pencil"></i></button>
                                         <button class="btn btn-danger btn-xs" onclick="deleteUser(<?=$user_id?>);"><i class="fa fa-trash-o "></i></button>
                                                <?php
                                                $resultSubMenu=$this->db->query("SELECT * FROM user WHERE user_id='$user_id'");
                                                if($resultSubMenu->num_rows()):
                                                    ?>

                                                <?php
                                                else:
                                                    ?>


                                                <?php
                                                endif;
                                                ?>

                                        </td>
                                        <td class="hide_coloum"><?php echo $rowUser->user_id; ?></td>
                                    </tr>

                                    <?php endforeach;  ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>




    </section>
</section>
<!--main content end-->


<!-- Modal -->

<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit User Confirmation</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('add_user/editUser');  ?>">
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Company Name</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Enter Company Name" id="edit_company_name" name="edit_company_name" class="form-control">

                        </div>
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Full Name</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Enter Full Name" id="edit_name" name="edit_name" class="form-control">
                            <input type="hidden" id="edit_user_id" name="edit_user_id" />
                        </div>
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Mobile Number</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Enter Phone" id="edit_phone" name="edit_phone" class="form-control">

                        </div>
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Email</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Enter Email" id="edit_email" name="edit_email" class="form-control">

                        </div>
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Address</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" placeholder="Enter Address" id="edit_address" name="edit_address"></textarea>

                        </div>






                        <label class="col-lg-3 col-sm-3 control-label" for="name">Select Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="edit_status" name="edit_status"> <!-- input-sm m-bot15  -->


                                <option value="1">Active</option>
                                <option value="2">In Active</option>
                            </select>

                        </div>





                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- modal -->
<!-- Modal -->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="<?=site_url('add_user/deleteUser')?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete Menu Confirmation</h4>
                </div>
                <div class="modal-body">

                    Do You Want To Delete This User?
                    <input type="hidden" id="delete_user_id" name="delete_user_id" />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Yes</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- modal -->

</section>
</section>
<!--main content end-->

