<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Credit Management
                    </header>
                    <div class="panel-body">



                        <div class="adv-table">
                            <table class="display table table-bordered" id="editable-sample"> <!--hidden-table-info   -->
                                <thead>
                                    <tr>

                                        <th>NAME</th>
                                        <th>PASSPORT NO.</th>
										
                                        <th>ID NO.</th>
                                        <th>Medical Name</th>
                                        <th>File</th>
                                        <th>Submitted Date</th>
                                        <th>Receive Date</th>
										<th>Expire Date</th>
										<th>Fitcard Note</th>
										<th>Entry Date</th>
										<th>Remaining Days</th>
                                        <!--<th>Action</th>-->

                                    </tr>
                                </thead>
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
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Model Confirmation</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_customer/editModel');  ?>">

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Passport Holder Name " id="edit_name" name="edit_name">
                        </div>
                         <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">PASSPORT NO. *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Passport Number." id="edit_passport_no" name="edit_passport_no">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO.*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter ID Number" id="edit_id_number" name="edit_id_number">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO.*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Visa Number" id="edit_visa_number" name="edit_visa_number">
                        </div>
                    </div>
					
				
					<div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering*</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="edit_fingering_type" name="edit_fingering_type"> <!-- input-sm m-bot15  -->
                                <option value="">Select</option>
                                <option value="1">Send</option>
                                <option value="2">Receive</option>
                            </select>
                        </div>
                        </div>
					
					<div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">REFERENCE NAME*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Reference Name" id="edit_reference_name" name="edit_reference_name">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Broker Name" id="edit_broker_name" name="edit_broker_name">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Sponsor Name" id="edit_sponsor_name" name="edit_sponsor_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Note*</label>
                        <div class="col-lg-9">
                            <textarea class="form-control"  id="edit_description" name="edit_description">Enter Description </textarea>
                        </div>
                    </div>

                    <!--<div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status *</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="edit_status" name="edit_status"> 
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-lg-offset-10 col-lg-2">
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
        <form method="post" action="<?=site_url('view_customer/deleteModel')?>">
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

