<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Create Agent
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="SubMenuForm"  role="form" method="post"  action="<?php echo site_url('create_reference/addReference'); ?>">

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Agent Name *</label>
                                <div class="col-lg-10">  
                                    <input type="text" class="form-control" placeholder="Enter Agent Name" id="add_reference_name" name="add_reference_name" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Agent ID *</label>
                                <div class="col-lg-10">  
                                    <input type="text" class="form-control" placeholder="Enter Agent Name" id="add_reference_id" name="add_reference_id" value="<?= $last_row ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Agent Mobile Number *</label>
                                <div class="col-lg-10">  <input type="text" class="form-control" maxlength="11" minlength="11" pattern="\d*" title="Please enter only mobile number"  placeholder="Enter Agent Mobile Number 11 digit" id="add_reference_mobile_number" name="add_reference_mobile_number" ></div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Agent Mobile Number 1 *</label>
                                <div class="col-lg-10">  <input type="text" class="form-control" maxlength="11" minlength="11" pattern="\d*" title="Please enter only mobile number"  placeholder="Enter Agent Mobile Number 11 digit" id="add_reference_mobile_number_1" name="add_reference_mobile_number_1" ></div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Agent Mobile Number 2 *</label>
                                <div class="col-lg-10">  <input type="text" class="form-control" maxlength="11" minlength="11" pattern="\d*" title="Please enter only mobile number"  placeholder="Enter Agent Mobile Number 11 digit" id="add_reference_mobile_number_2" name="add_reference_mobile_number_2" ></div>
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
                        View Agent
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
                                        <th>Agent Name</th>
                                        <th>Agent ID</th>
                                        <th>Number Of Passport</th>
                                        <th>Agent Mobile Number</th>
                                        <th>Agent Mobile Number 1</th>
                                        <th>Agent Mobile Number 2</th>
<!--<th>Relation</th>-->
                                        <th>Action</th>
                                     <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($get_reference_data as $row) :
                                        $id = $row->id;
                                        $add_reference_name = $row->reference_name;
                                                                              
                                        $ref = $add_reference_name . '-' . $id;
                                        
                                        $sqq = mysql_query("SELECT * FROM `passport_makings` WHERE reference_name like '%$ref%'");
                                        $num = mysql_num_rows($sqq);
                                        
                                        $add_reference_name = $row->reference_name;
                                        $add_reference_id = $row->reference_id;
                                        $add_reference_mobile_number = $row->reference_mobile;
                                        $add_reference_mobile_number_1 = $row->reference_mobile_1;
                                        $add_reference_mobile_number_2 = $row->reference_mobile_2;
                                        ?>
                                        <tr class="gradeX">
                                            <td ><?php echo $add_reference_name ?></td>
                                            <td><?php echo $add_reference_id ?></td>
                                            <td><span style='color:green;'><a target="_blank" href="<?= site_url('view_customer/view_reference/'.$id) ?>"><?php echo $num ?></span></a></td>
                                            <td><?php echo $add_reference_mobile_number ?></td>
                                            <td><?php echo $add_reference_mobile_number_1 ?></td>
                                            <td><?php echo $add_reference_mobile_number_2 ?></td>
   

                                            <td>

                                                <button class="btn btn-primary btn-xs" onclick="editReference(<?= $id ?>);"><i class="fa fa-pencil"></i></button>
                                                <!--<button class="btn btn-danger btn-xs" onclick="deleteReference(<?= $id ?>);"><i class="fa fa-trash-o "></i></button>-->
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Agent</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('create_reference/editReference'); ?>">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Agent Name</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Reference  Name" id="edit_reference_name" name="edit_reference_name" class="form-control" readonly>
                                    <input type="hidden" id="edit_id" name="edit_id" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Agent ID *</label>
                                <div class="col-lg-9">  
                                    <input type="text" class="form-control" placeholder="Enter Reference ID" id="edit_reference_id" name="edit_reference_id"  readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Agent Mobile Number</label>
                                <div class="col-lg-9">
                                    <input type="text" maxlength="11" minlength="11" pattern="\d*" title="Please enter only mobile number"  placeholder="Enter Reference Mobile Number" id="edit_reference_mobile_number" name="edit_reference_mobile_number" class="form-control">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Reference Mobile Number 1</label>
                                <div class="col-lg-9">
                                    <input type="text" maxlength="11" minlength="11" pattern="\d*" title="Please enter only mobile number"  placeholder="Enter Reference Mobile Number" id="edit_reference_mobile_number_1" name="edit_reference_mobile_number_1" class="form-control">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Reference Mobile Number 2</label>
                                <div class="col-lg-9">
                                    <input type="text" maxlength="11" minlength="11" pattern="\d*" title="Please enter only mobile number" placeholder="Enter Reference Mobile Number" id="edit_reference_mobile_number_2" name="edit_reference_mobile_number_2" class="form-control">

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
        <div class="modal fade" id="myModalRelation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Relation Reference</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('create_reference/editReferenceSearch'); ?>">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Reference Name</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Reference  Name" id="relation_reference_name" name="relation_reference_name" class="form-control">
                                    <input type="hidden" id="relation_id" name="relation_id" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference ID *</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Enter Reference ID" id="relation_reference_id" name="relation_reference_id"  readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Reference Mobile Number</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Reference Mobile Number" id="relation_reference_mobile_number" name="relation_reference_mobile_number" class="form-control">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Enter Reference Name/Passport</label>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Enter Reference  Name/Passport" id="reference_name" name="reference_name" class="form-control">

                                </div>
                                <div class="col-lg-3">
                                    <button class="btn btn-primary pull-right" type="button" onclick="relationReferenceSearch()">Search</button>
                                </div>
                            </div>

                            <div class="form-group" style="max-height: 300px;overflow:scroll">
                                <div id="referenceTable" class="col-lg-9 col-lg-offset-3">


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-9 col-lg-3 ">
                                    <button class="btn btn-success pull-right" type="submit">Update</button>
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
                <form method="post" action="<?= site_url('create_reference/deleteReference') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete Menu Confirmation</h4>
                        </div>
                        <div class="modal-body">

                            Do You Want To Delete Reference?
                            <input type="hidden" id="delete_id" name="delete_id" />
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
