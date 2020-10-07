<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Info
                        <div>
                            <form role="form" class="form-horizontal" method="post" target="_blank" action="<?php echo site_url('view_customer/print_basic_page'); ?>">
                                <input type="hidden" class="form-control" id="edit_id_print" name="edit_id_print" value="<?= $print_id ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">Print</button>
                            </form>
                        </div>
                    </header>
                    <div class="panel-body">
                        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('view_customer/editModelNewEdit'); ?>"  enctype="multipart/form-data">
                            <?php
                            foreach ($get_passport_makings_data as $row) :

                                $id = $row->id;
                                $name = $row->name;
                                $passport_no = $row->passport_no;
                                $basic_id_number = $row->basic_id_number;
                                $mobile_no = $row->mobile_number;
                                $visa_type = $row->visa_type;
                                $basic_visa_number = $row->basic_visa_number;
                                $basic_fingering = $row->basic_fingering;
                                $reference_name = $row->reference_name;
                                $broker_name = $row->broker_name;
                                $broker_mobile_number = $row->broker_mobile_number;
                                $reference_mobile_number = $row->reference_mobile_number;
                                $okala_sponsor_name = $row->okala_sponsor_name;
                                $basic_passport_type = $row->basic_passport_type;
                                $basic_receive_site = $row->basic_receive_site;
                                $man_power = $row->man_power;
                                $basic_note = $row->basic_note;
                                $passport_preview = $row->passport_preview;
                                $police_clearance = $row->police_clearance;
                                $training = $row->training;
                                $passport_owner = $row->passport_owner;
                                $basic_flight = $row->basic_flight;


                            endforeach;
                            ?>



                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name *</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" value="<?= $name ?>">
                                </div>
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">PASSPORT NO. *</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="edit_passport_no" name="edit_passport_no" value="<?= $passport_no ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO.*</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO.*</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Mobile NO.*</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"  id="edit_mobile_number" name="edit_mobile_number" value="<?= $mobile_no ?>">
                                </div>
                            </div>



                            <!--<div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering*</label>
                                <div class="col-lg-9">
                                    <select class="form-control" id="edit_fingering_type" name="edit_fingering_type"> 
                                        <option value="">Select</option>
                                        <option value="Send" <?php if ($basic_fingering == 'Send') echo 'selected' ?>>Send</option>
                                        <option value="Receive" <?php if ($basic_fingering == 'Receive') echo 'selected' ?>>Receive</option>
                                    </select>
                                </div>
                            </div>-->

                            <!-- <div class="form-group">
                                 <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">REFERENCE NAME*</label>
                                 <div class="col-lg-9">
                                     <input type="text" class="form-control"  id="edit_reference_name" name="edit_reference_name">
                                 </div>
                             </div>-->

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Agent Name *</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="edit_reference_name" id="edit_reference_name"  onchange="Show_Ref_Mobile_number(this.value)"> <!-- input-sm m-bot15  -->
                                        <option value="">Select Agent</option>
                                        <?php
                                        foreach ($get_reference_data as $row) :
                                            $ref_name = $row->reference_name . '-' . $row->reference_id;
                                            if ($reference_name == $ref_name) {
                                                ?>
                                                <option value="<?= $row->reference_name . '-' . $row->reference_id; ?>"  selected><?= $row->reference_name . '-' . $row->reference_id; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $row->reference_name . '-' . $row->reference_id; ?>" ><?= $row->reference_name . '-' . $row->reference_id; ?></option>
                                                <?php
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                         

                       

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Agent Mobile Number*</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="edit_reference_mobile_number" name="edit_reference_mobile_number" >
                                </div>
                            </div>
                         

                   

                          
                            
                           

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Gender*</label>
                                <div class="col-lg-9">
                                    <select class="form-control" id="edit_passport_type" name="edit_passport_type"> <!-- input-sm m-bot15  -->
                                        <option value="">Select</option>
                                        <option value="Male" <?php if ($basic_passport_type == 'Male') echo 'selected' ?>>Male</option>
                                        <option value="Female" <?php if ($basic_passport_type == 'Female') echo 'selected' ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                         


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Preview *</label>
                                <div class="col-lg-9">
                                    <span class="photo">

                                        <img id="pp" alt="avatar" src="<?= $base_url . 'public/uploads/' . $passport_preview ?>" width="150" height="100">
                                        <a href="<?= $base_url . 'public/uploads/' . $passport_preview ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a>

                                        <input type="file" name="passportpreview" size="20" />


                                    </span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Note*</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control"  id="edit_description" name="edit_description" ><?= $basic_note ?> </textarea>
                                </div>
                            </div>







                            <?php
                            $role_id = $this->session->userdata('role_id');
                            if ($role_id == 1 || $role_id == 2 || $role_id == 13) {
                                ?>
                                <div class="form-group">
                                    <div class="col-lg-offset-10 col-lg-2">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>

                    </div>
                </section>
            </div>
        </div>







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

    </section>
</section>
<!--main content end-->
