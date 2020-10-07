<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Passport Receive
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" target="_blank"  role="form" method="post"  action="<?php echo site_url('view_customer/print_page');  ?>">
                           

                            <div class="adv-table">
                                <table class="display table table-bordered" id="editable-sample"> <!--hidden-table-info   -->
                                    <thead>
                                        <tr>
                                            <th >Action</th>
                                            <th >SI</th>
                                            <th >NAME</th>
                                            <th >PASSPORT NO.</th>
                                            <th >Create Date</th>
                                      
                                        
                                            <th >VISA NO.</th>
                                            <th >AGENT NAME</th>
                                       
                                            
                                            <th >AGENT MOBILE NUMBER</th>
                                          
                                            <th >GENDER</th>
                                          
                                            <th >Note</th>
                                            

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>




    </section>
</section>
<!--main content end-->

<!-- Modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<div class="row">
                                <div class="col-lg-6">
                
                <h4 class="modal-title">Edit Basic Info</h4>
				</div>
				
				 <div class="col-lg-6">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<form role="form" class="form-horizontal" method="post" target="_blank" action="<?php echo site_url('view_customer/print_basic_page'); ?>">
				<input type="hidden" class="form-control" id="edit_id_print" name="edit_id_print">
				  <button class="btn btn-danger btn-sm pull-right" type="submit">Print</button>
				</form>
				</div>
				
				</div>
				</div>
           

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_customer/editModel'); ?>">

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" <!--placeholder="Enter Passport Holder Name--> " id="edit_name" name="edit_name">
                        </div>
                        <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">PASSPORT NO. *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_passport_no" name="edit_passport_no">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO.*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO.*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering*</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="edit_fingering_type" name="edit_fingering_type"> <!-- input-sm m-bot15  -->
                                <option value="">Select</option>
                                <option value="Send">Send</option>
                                <option value="Receive">Receive</option>
                            </select>
                        </div>
                    </div>

                   <!-- <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">REFERENCE NAME*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_reference_name" name="edit_reference_name">
                        </div>
                    </div>-->
					
					<div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Agent Name *</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="edit_reference_name" id="edit_reference_name" > <!-- input-sm m-bot15  -->
                                        <option value="">Select Agent</option>
                                        <?php
                                        foreach ($get_reference_data as $row) :
                                            ?>
                                            <option value="<?= $row->reference_name.'-'.$row->reference_id;  ?>"><?= $row->reference_name.'-'.$row->reference_id; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                   
                 

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_reference_mobile_number" name="edit_reference_mobile_number">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Gender*</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="edit_passport_type" name="edit_passport_type"> <!-- input-sm m-bot15  -->
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
            

               
                   
                   
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Preview *</label>
                        <div class="col-lg-9">
                            <span class="photo">

                                <img id="pp" alt="avatar" src="" width="150" height="100">

                                </div>

                            </span>
                        </div>



                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Note*</label>
                            <div class="col-lg-9">
                                <textarea class="form-control"  id="edit_description" name="edit_description">Enter Description </textarea>
                            </div>
                        </div>







<?php   
 $role_id=$this->session->userdata('role_id');
 if($role_id==1 || $role_id==2  || $role_id==13){
?>
                        <div class="form-group">
                            <div class="col-lg-offset-10 col-lg-2">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>
                        <?php } ?>
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
        <form method="post" action="<?= site_url('view_customer/deleteModel') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete Model Confirmation</h4>
                </div>
                <div class="modal-body">

                    Do You Want To Delete This Model?
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

