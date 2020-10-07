<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Details Report
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" target="_blank"  role="form" method="post"  action="<?php echo site_url('details_report/print_page');  ?>">
                        
                         <div class="form-group">
                                        <button type="submit" class="btn btn-info pull-right" style="margin-right: 15px;">Print</button>
                                    </div>
                        
                            <div class="row">
                                <div class="col-lg-12">

                                    <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Gender*</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" id="gender_type" name="gender_type" onchange="getGenderData(this.value)">  <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>



                                    <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Passport Side*</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" id="passport_type" name="passport_type" onchange="getPassportData(this.value)"> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Inside">Inside</option>
                                            <option value="Outside">Outside</option>
                                        </select>
                                    </div>


                                </div>
                            </div>

                            <div class="adv-table">
                                <table class="display table table-bordered" id="editable-sample"> <!--hidden-table-info   -->
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>NAME (الاسم)</th>
                                            <th>PASSPORT NO.</th>
                                            <th>REFERENCE NAME (من طرف)</th>
                                            <th>BROKER NAME (اسم البروكور)</th>
                                            <th>Sponsor Name (اسم  الكفيل)</th>
                                            <th>Enjaz (معلومات الانجاز)</th>
                                            <th>Okala (وكالات )</th>
                                            <th>Fitcard (ورقه المديكل )</th>
                                            <th>Embasy (معلومات السفاره )</th>
                                            <th>Fingering (بصمه )</th>
                                            <th>GENDER (الجنس)</th>
                                            <th>Passport Side (داخل /خارج)</th>
                                            <th>Action</th>


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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Basic Info</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_customer/editModel');  ?>">

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
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">REFERENCE NAME*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  id="edit_reference_name" name="edit_reference_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_reference_mobile_number" name="edit_reference_mobile_number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Broker Mobile Number*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_broker_mobile_number" name="edit_broker_mobile_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name*</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name">
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
                        <!--EDIT ENJAZ-->
                        <header class="panel-heading">
                            <B style="color:blue"> Edit Enjaz Info</B>
                        </header>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Mufa Number*</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control"  id="edit_mufa_number" name="edit_mufa_number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Enjaz Date</label>
                            <div class="col-lg-9">
                                <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_enjaz_date" name="edit_enjaz_date">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Enjaz Note *</label>
                            <div class="col-lg-9">
                                <textarea class="form-control"   id="edit_enjaz_note" name="edit_enjaz_note"></textarea>
                            </div>
                        </div>
                        <!--EDIT ENJAZ-->

                        <!--EDIT OKALA-->
                        <header class="panel-heading">
                            <B style="color:blue"> Edit Okala Info</B>
                        </header>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Sponsor Name *</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control"  id="edit_okala_sponsor_name" name="edit_okala_sponsor_name">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Office  *</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control"  id="edit_okala_office" name="edit_okala_office">

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
                                <input type="text" class="form-control"  id="edit_okala_note" name="edit_okala_note">

                            </div>
                        </div>
                        <!--EDIT OKALA-->


                        <!--EDIT FITCARD-->

                        <header class="panel-heading">
                            <B style="color:blue">Edit FITCARD</B>
                        </header>


                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Receive Date</label>
                            <div class="col-lg-9">
                                <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_receive_date" name="edit_receive_date">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date</label>
                            <div class="col-lg-9">
                                <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_expire_date" name="edit_expire_date">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fitcard Note*</label>
                            <div class="col-lg-9">
                                <textarea class="form-control"    id="edit_fitcard_note" name="edit_fitcard_note"> </textarea>
                            </div>
                        </div>

                        <!--EDIT FITCARD-->


                        <!--EDIT EMBASY-->

                        <header class="panel-heading">
                            <B style="color:blue">Edit Embassy Info</B>

                        </header>
                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                            <div class="col-lg-9">
                                <!--<input type="file" name="edit_embasy_file" size="20" />-->
                                <span class="photo"><img id="pp2" alt="avatar" src="" width="150" height="100"></span>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Office*</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control"  id="edit_embasy_office" name="edit_embasy_office">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Date</label>
                            <div class="col-lg-9">
                                <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_embasy_date" name="edit_embasy_date">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date *</label>
                            <div class="col-lg-9">
                                <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date">


                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Embassy Note *</label>
                            <div class="col-lg-9">
                                <textarea class="form-control"   id="edit_embasy_note" name="edit_embasy_note"></textarea>
                            </div>
                        </div>


                        <!--EDIT EMBASY-->

                        <!--<header class="panel-heading">

							<B style="color:blue">Edit Ticket Info</B>
							</header>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Price (BDT/$)*</label>
<div class="col-lg-9">
    <input type="text" class="form-control"  id="edit_price" name="edit_price">
</div>
</div>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Number*</label>
<div class="col-lg-9">
    <input type="text" class="form-control"  id="edit_ticket_number" name="edit_ticket_number">
</div>
</div>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Location*</label>
<div class="col-lg-9">
    <input type="text" class="form-control"  id="edit_ticket_location" name="edit_ticket_location">
</div>
</div>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Flying Date</label>
<div class="col-lg-9">
  <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_flying_date" name="edit_flying_date">

</div>
</div>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Flying Time *</label>
<div class="col-lg-9">
    <input type="text" class="form-control"  id="edit_flying_time" name="edit_flying_time">
</div>
</div>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Purchase Date</label>
<div class="col-lg-9">
  <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="" type="text" id="edit_ticket_purchase_date" name="edit_ticket_purchase_date">

</div>
</div>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Note *</label>
<div class="col-lg-9">  
   <textarea class="form-control"   id="edit_ticket_note" name="edit_ticket_note"></textarea>
</div>
</div>

							<div class="form-group">
<label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Entry Date</label>
<div class="col-lg-9">
  <input class="form-control form-control-inline input-medium default-date-picker" size="16" value="" type="text" id="edit_ticket_entry_date" name="edit_ticket_entry_date">
</div>
</div>-->


                        <!--<div class="form-group">
                            <div class="col-lg-offset-10 col-lg-2">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>-->
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

