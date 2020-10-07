<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Enjaz Complete
                    </header>
                    <div class="panel-body">

                        <div class="adv-table">
                            <table class="display table table-bordered" id="editable-sample"> <!--hidden-table-info   -->
                                <thead>
                                    <tr>
                                        <th>Name of the Emp. Saudi</th>
                                        <th>Visa No. & Date</th>
                                        <th>Full Name Emp.</th>
                                        <th>Passport No. Date</th>
                                        <th>Profession</th>
                                        <th>Religion</th>
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
                <h4 class="modal-title">Edit Visa Info</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_visa_form/editModel'); ?>">

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name of the Emp. Saudi*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Name of the Emp. Saudi" id="edit_saudi_emp_name" name="edit_saudi_emp_name"  required="required">
                        </div>
                        <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Visa No.</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_visa_no" name="edit_visa_no"  required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Full Name Emp*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_full_name" name="edit_full_name"  required="required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport No.*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_passport_no" name="edit_passport_no"  required="required">
                        </div>
                    </div>

        

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Profession *</label>
                        <div class="col-lg-9">  
                            <textarea class="form-control"   id="edit_prof" name="edit_prof" required="required"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Religion *</label>
                        <div class="col-lg-9">  
                            <textarea class="form-control"   id="edit_religion" name="edit_religion" required="required"></textarea>
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

