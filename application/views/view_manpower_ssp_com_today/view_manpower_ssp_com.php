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
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Remaining</th>
                                        <th>Office</th>
                                        <th>Manpower Note</th>
                                        <th>Action</th>
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
                <h4 class="modal-title">Edit Enjaz Info</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_manpower_com/editModel'); ?>">

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
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                        <div class="col-lg-9">
                            <input type="file" name="edit_embasy_file" size="20" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status*</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="edit_embasy_status" name="edit_embasy_status"> <!-- input-sm m-bot15  -->
                                <option value="">Select</option>
                                <option value="Complete">Complete</option>
                                <option value="Incomplete">Incomplete</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3"> Date *</label>
                        <div class="col-lg-9">
                            <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_embasy_date" name="edit_embasy_date" required="required">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date *</label>
                        <div class="col-lg-9">
                            <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required">

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Office*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Office Name" id="edit_embasy_office" name="edit_embasy_office">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Embasy Note *</label>
                        <div class="col-lg-9">  
                            <textarea class="form-control"   id="edit_embasy_note" name="edit_embasy_note" required="required"></textarea>
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

