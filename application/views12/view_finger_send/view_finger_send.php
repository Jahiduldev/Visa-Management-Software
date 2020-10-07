<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       Medical Incomplete
                    </header>
                    <div class="panel-body">



                        <div class="adv-table">
                            <table class="display table table-bordered" id="editable-sample"> <!--hidden-table-info   -->
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Passport No</th>
                                       
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Medical Information</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_finger_send/editModel'); ?>">

                   

                 


                    <div class="form-group">
					<input type="hidden" class="form-control" id="edit_id" name="edit_id">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Option</label>
                        <div class="col-lg-9">
                          

							
							
							
							
							
							
							   <select class="form-control" id="edit_enjaz_date" name="edit_enjaz_date" required="required"> <!-- input-sm m-bot15  -->
                                        <option value="">Select Option</option>
                                        <option value="Fit">Fit</option>
                                        <option value="Unfit">Unfit</option>
										<option value="Held UP + Medicine">Held UP + Medicine</option>
                                       
                                    </select>
							
							
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





<!-- modal -->

