<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Manpower Complete
                    </header>
                    <div class="panel-body">

                        <div class="adv-table">
                            <table class="display table table-bordered" id="editable-sample"> <!--hidden-table-info   -->
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Passport No</th>
                                       
                                        <th>Manpower Name</th>
                                        <th>Note</th>
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
                <h4 class="modal-title">Edit Okala Info</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_okala_com/editModel'); ?>">

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Passport Holder Name" id="edit_name" name="edit_name" readonly="readonly" required="required">
                        </div>
                        <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">PASSPORT NO.*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_passport_no" name="edit_passport_no" readonly="readonly" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Sponsor Name *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_okala_sponsor_name" name="edit_okala_sponsor_name" required="required">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Office  *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_okala_office" name="edit_okala_office" required="required">
                        </div>
                    </div>

                    <div class="form-group">
		        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status*</label>
		        <div class="col-lg-9">
			<select class="form-control" id="edit_okala_status" name="edit_okala_status"> <!-- input-sm m-bot15  -->
			<option value="">Select</option>
			<option value="Send">Send</option>
			<option value="Receive">Receive</option>
			</select>
			</div>
		    </div>
                    
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Note *</label>
                        <div class="col-lg-9">  
                            <textarea class="form-control"   id="edit_okala_note" name="edit_okala_note" required="required"></textarea>
                        </div>
                    </div>


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

