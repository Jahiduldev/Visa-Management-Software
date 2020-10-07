<!--main content start-->
<section id="main-content">
    <section class="wrapper">


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Dashboard
                    </header>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-12">

                                <form role="form" class="cmxform form-horizontal tasi-form" method="post"  id="RoleForm" action="<?php echo site_url('dashboard/search'); ?>">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">From Date</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="default-date-picker form-control" placeholder="Enter From Date" id="date_from"  name="date_from" value="<?php
                                            // echo $date_from;
                                            ?>" required>
                                        </div>
                                        <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">To Date</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="default-date-picker form-control" placeholder="Enter To Date" id="date_to"  name="date_to" value="<?php
                                            //  echo $date_to;
                                            ?>" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitDate" class="btn btn-info pull-right">Submit</button>
                                </form>


                            </div>
                        </div>
                        <br>
                        <div class="adv-table">
                            <table class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr style="color:white;font-weight:bold;">
                                        <th style="background-color:#2A3F54;">New Passport</th>                                      
                                        <th style="background-color:#2A3F54;">Enjaz Info</th>
                                        <th style="background-color:#2A3F54;">Okala Info</th>
                                        <th style="background-color:#2A3F54;">Fitcard Info</th>
                                        <th style="background-color:#2A3F54;">Embasy Info</th>
                                        <th style="background-color:#2A3F54;">Manpower Info</th>
                                        <th style="background-color:#2A3F54;">Ticket Info</th>
                                        <th style="background-color:#2A3F54;">Passport Cancel Info</th>
                                        <th style="background-color:#2A3F54;">Fingering Info</th>
                                        <th style="background-color:#2A3F54;">Inside</th>
                                        <th style="background-color:#2A3F54;">Outside</th>

<!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr class="gradeX" style="color:red; font-weight:bold;">
                                        <td><a target="_blank" href="<?= site_url('view_customer/basicToday') ?>"><?php echo $passport; ?></a></td>
                                        <td ><a target="_blank" href="<?= site_url('view_enjaz_com/enjazToday') ?>"><?php echo $enjaz; ?></a></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_okala_com/okalaToday') ?>"><?php echo $okala; ?></a></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_fitcard_com/fitcardToday') ?>"><?php echo $fitcard; ?></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_embasy_com/embasyToday') ?>"><?php echo $embasy; ?></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_manpower_com/manpowerToday') ?>"><?php echo $manpower; ?></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_ticket_com/ticketToday') ?>"><?php echo $ticket; ?></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_cancel_com/cancelToday') ?>"><?php echo $cancel; ?></td>
                                        <td class="hidden-phone"><a target="_blank" href="view_finger_receive/fingerToday"><?php echo $fingering; ?></a></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_customer_in_today/basicToday') ?>"><?php echo $inside; ?></a></td>
                                        <td class="hidden-phone"><a target="_blank" href="<?= site_url('view_customer_out_today/basicToday') ?>"><?php echo $outside; ?></a></td>
                                    </tr>





                                </tbody>
                            </table>

                        </div>

                        <div class="adv-table">
                            <table class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr style="color:White; font-weight:bold;">
                                        <th style="background-color:#2A3F54;">Fitcard Expire</th>                                      
                                        <th style="background-color:#2A3F54;">Embassy Expire</th>
                                        <th style="background-color:#2A3F54;">Manpower Expire</th>
                                        <th style="background-color:#2A3F54;">Ticket Expire</th>
                                        <th style="background-color:#2A3F54;">All Passport Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 0;
                                    $counter2 = 0;
                                    foreach ($get_fit_receive_data as $row):
                                        $fit_receive_expire_date = $row->fit_receive_expire_date;
                                        $embassy_visa_stamping_status = $row->embassy_visa_stamping_status;
                                        if ($embassy_visa_stamping_status != 'Complete' || $embassy_visa_stamping_status == NULL) {
                                            $dif = date_diff(date_create(date('Y-m-d')), date_create($fit_receive_expire_date))->format("%R%a");

                                            if ($dif <= 20) {
                                                $counter++;
                                                // echo  $dif."<br>";
                                            }
                                        }
                                    endforeach;

                                    foreach ($get_embassy_visa_stamping_data as $row):
                                        $embasy_expire_date = $row->embasy_expire_date;
                                        $basic_flight = $row->basic_flight;
                                        if ($basic_flight != 'Complete' || $basic_flight == NULL || $basic_flight == '') {
                                            $dif = date_diff(date_create(date('Y-m-d')), date_create($embasy_expire_date))->format("%R%a");
                                            if ($dif <= 20) {
                                                $counter2++;
                                                //   echo  $dif."<br>";
                                            }
                                        }
                                    endforeach;
                                    ?>
                                    <tr class="gradeX" style="color:red; font-weight:bold;">
                                        <td><a target="_blank" href="<?= site_url('view_fitcard_com/getExpire') ?>"><?php echo $counter; ?></a></td>
                                        <td ><a target="_blank" href="<?= site_url('view_embasy_com/getExpire') ?>"><?php echo $counter2; ?></a></td>
                                        <td ><a target="_blank" href="<?= site_url('view_manpower_com/getExpire') ?>"><?php //echo $counter2;    ?></a></td>
                                        <td ><a target="_blank" href="<?= site_url('view_ticket_com/getExpire') ?>"><?php //echo $counter2;    ?></a></td>
                                        <td ><a target="_blank" href="<?= site_url('view_all_cancel_advance_search') ?>"><?php echo "Click Here"; ?></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <form role="form" class="cmxform form-horizontal tasi-form" method="post"  id="RoleForm" action="<?php echo site_url('dashboard/searchSingle'); ?>">

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Passport No.</label>
                                <div class="col-lg-6">
                                    <input type="text" class=" form-control" placeholder="Enter Passport No." id="passport_no"  name="passport_no"  required>
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" name="searchPassportButton" class="btn btn-info pull-left">Search</button>
                                </div>
                            </div>

                        </form>

                        <form role="form" class="form-horizontal" method="post" target="_blank" action="<?php echo site_url('dashboard/print_dashboard_all_page'); ?>">
                            <input type="hidden" class="form-control" id="edit_id_print" name="edit_id_print" value="<?= $print_id ?>">
                            <button class="btn btn-danger btn-sm pull-right" type="submit">Print All</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>



        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <?php
        if (count($passport_makings_data) > 0):

            $role_id = $this->session->userdata('role_id');
            foreach ($passport_makings_data as $row):
                $id = $row->id;
                $name = $row->name;
                $passport_no = $row->passport_no;
                $okala_sponsor_name = $row->okala_sponsor_name;
                $okala_office = $row->okala_office;
                $okala_status = $row->okala_status;
                $okala_note = $row->okala_note;

                $basic_id_number = $row->basic_id_number;
                $basic_visa_number = $row->basic_visa_number;
                $basic_fingering = $row->basic_fingering;
                $reference_name = $row->reference_name;
                $broker_name = $row->broker_name;
                $broker_mobile_number = $row->broker_mobile_number;
                $reference_mobile_number = $row->reference_mobile_number;
                $okala_sponsor_name = $row->okala_sponsor_name;
                $basic_passport_type = $row->basic_passport_type;
                $basic_receive_site = $row->basic_receive_site;
                $basic_note = $row->basic_note;
                $passport_preview = $row->passport_preview;
                $basic_flight = $row->basic_flight;

                $enzaz_mufa_number = $row->enzaz_mufa_number;
                $enzaz_date = $row->enzaz_date;
                $enzaz_note = $row->enzaz_note;



                $embassy_file_upload = $row->embassy_file_upload;
                $embassy_visa_stamping_status = $row->embassy_visa_stamping_status;
                $embassy_date = $row->embassy_date;
                $embasy_expire_date = $row->embasy_expire_date;

                $embasy_expire_date_count = date_diff(date_create(date('Y-m-d')), date_create($embasy_expire_date))->format("%R%a");

                $embasy_office = $row->embasy_office;
                $embassy_note = $row->embassy_note;


                $fit_receive_receive_date = $row->fit_receive_receive_date;
                $fit_receive_expire_date = $row->fit_receive_expire_date;
                $fit_receive_note = $row->fit_receive_note;


                $manpower_status = $row->manpower_status;
                $manpower_file_upload = $row->manpower_file_upload;
                $manpower_date = $row->manpower_date;
                $manpower_note = $row->manpower_note;
                $manpower_entry_date = $row->manpower_entry_date;
                $manpower_office = $row->manpower_office;
                $manpower_expire_date_count = date_diff(date_create(date('Y-m-d')), date_create($manpower_date))->format("%R%a");


                $ticket_number = $row->ticket_number;
                $ticket_location = $row->ticket_location;
                $ticket_flying_date = $row->ticket_flying_date;
                $ticket_flying_time = $row->ticket_flying_time;
                $ticket_file_upload = $row->ticket_file_upload;
                $ticket_note = $row->ticket_note;
                $ticket_entry_date = $row->ticket_entry_date;
                $basic_flight = $row->basic_flight;
                $ticket_expire_date_count = date_diff(date_create(date('Y-m-d')), date_create($ticket_flying_date))->format("%R%a");


                $is_cancel = $row->is_cancel;



            endforeach;
            ?>
        
         <!-- Basic Start -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($passport_no != ''):
                                ?>
                                <b style="color:green"> Basic <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Basic <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 13):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editBasic()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_basic">view</button>
                            <div id="demo_basic" class="collapse">
                                <br>
                                <form role="form" class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name  </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number </label>
                                        <div class="col-lg-9">  
                                            <input type="text" class="form-control"  value="<?= $passport_no ?>" readonly >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>">

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                        <div class="col-lg-9">

                                            <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Gender</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $basic_passport_type ?>">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Side</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $basic_receive_site ?>">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Basic Flight</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $basic_flight ?>">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Preview </label>
                                        <div class="col-lg-9">
                                            <span class="photo">

                                                <img id="pp" alt="no image found" src="<?= $base_url . 'public/uploads/' . $passport_preview ?>" width="150" height="100">
                                                <a href="<?= $base_url . 'public/uploads/' . $passport_preview ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a>
                                        </div>

                                        </span>
                                    </div>



                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Note</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control"  id="edit_description" name="edit_description"><?= $basic_note ?> </textarea>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editBasic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Basic Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editBasic'); ?>"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $name ?>" name="edit_name" id="edit_name">
                                        <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number *</label>
                                    <div class="col-lg-9">  
                                        <input type="text" class="form-control"  value="<?= $passport_no ?>"  name="edit_passport_no" id="edit_passport_no">
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
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_fingering_type" name="edit_fingering_type"> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Send" <?php if ($basic_fingering == 'Send') echo 'selected' ?>>Send</option>
                                            <option value="Receive" <?php if ($basic_fingering == 'Receive') echo 'selected' ?>>Receive</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name *</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="edit_reference_name" id="edit_reference_name" onchange="Show_Ref_Mobile_number(this.value)"> <!-- input-sm m-bot15  -->
                                            <option value="">Select Reference</option>
                                            <?php
                                            foreach ($get_reference_data as $row) :
                                                $rr = $row->reference_name . '-' . $row->id;
                                                if ($rr == $reference_name) {
                                                    ?>
                                                    <option value="<?= $row->reference_name . '-' . $row->id; ?>" selected><?= $row->reference_name . '-' . $row->id; ?></option>
                                                    <?php
                                                } else {
                                                    ?>                                  
                                                    <option value="<?= $row->reference_name . '-' . $row->id; ?>"><?= $row->reference_name . '-' . $row->id; ?></option>
                                                    <?php
                                                }
                                            endforeach;
                                            ?>

                                        </select> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_reference_mobile_number" name="edit_reference_mobile_number" value="<?= $reference_mobile_number ?>">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME*</label>
                                    <div class="col-lg-9">


                                        <select class="form-control" name="edit_broker_name" id="edit_broker_name"  onchange="Show_Brok_Mobile_number(this.value)"> <!-- input-sm m-bot15  -->
                                            <option value="">Select Broker</option>
                                            <?php
                                            foreach ($get_broker_data as $row) :
                                                $rr = $row->broker_name . '-' . $row->id;
                                                if ($rr == $broker_name) {
                                                    ?>
                                                    <option value="<?= $row->broker_name . '-' . $row->id; ?>" selected><?= $row->broker_name . '-' . $row->id; ?></option>
                                                    <?php
                                                } else {
                                                    ?>                                  
                                                    <option value="<?= $row->broker_name . '-' . $row->id; ?>"><?= $row->broker_name . '-' . $row->id; ?></option>
                                                    <?php
                                                }
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_mobile_number" name="edit_broker_mobile_number" value="<?= $broker_mobile_number ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>">
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
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Side*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_passport_side" name="edit_passport_side"> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Inside" <?php if ($basic_receive_site == 'Inside') echo 'selected' ?>>Inside</option>
                                            <option value="Outside" <?php if ($basic_receive_site == 'Outside') echo 'selected' ?>>Outside</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Basic Flight*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_basic_flight" name="edit_basic_flight"> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Complete"  <?php if ($basic_flight == 'Complete') echo 'selected' ?>>Complete</option>
                                            <option value="Cancel"  <?php if ($basic_flight == 'Cancel') echo 'selected' ?>>Cancel</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Preview *</label>
                                    <div class="col-lg-9">
                                        <span class="photo">
                                            <input type="file" name="passportpreview" />
                                            <img id="pp" alt="no image found" src="<?= $base_url . 'public/uploads/' . $passport_preview ?>" width="150" height="100">
                                            <a href="<?= $base_url . 'public/uploads/' . $passport_preview ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a>
                                    </div>

                                    </span>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Note*</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control"  id="edit_description" name="edit_description"><?= $basic_note ?> </textarea>
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
            <!-- Basic End -->
            
             <!-- Fitcard Start -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($fit_receive_receive_date != ''):
                                ?>
                                <b style="color:green"> Fitcard <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Fitcard <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 6):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editFitcard()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_fitcard">view</button>
                            <div id="demo_fitcard" class="collapse">
                                <br>
                                <form role="form" class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name  </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number </label>
                                        <div class="col-lg-9">  
                                            <input type="text" class="form-control"  value="<?= $passport_no ?>" readonly >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Receive Date</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Receive Date" value="<?= $fit_receive_receive_date ?>" type="text" id="edit_receive_date" name="edit_receive_date">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Expire Date" value="<?= $fit_receive_expire_date ?>" type="text" id="edit_expire_date" name="edit_expire_date">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fitcard Note </label>
                                        <div class="col-lg-9">  
                                            <textarea class="form-control"   id="edit_fitcard_note" name="edit_fitcard_note" required="required"><?= $fit_receive_note ?></textarea>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editFitcard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Fitcard Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editFitcard'); ?>"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $name ?>" name="edit_name" id="edit_name" readonly>
                                        <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number *</label>
                                    <div class="col-lg-9">  
                                        <input type="text" class="form-control"  value="<?= $passport_no ?>"  name="edit_passport_no" id="edit_passport_no" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>" readonly>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>" readonly> 

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>" readonly>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Receive Date</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Receive Date" value="<?= $fit_receive_receive_date ?>" type="text" id="edit_receive_date" name="edit_receive_date">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Expire Date" value="<?= $fit_receive_expire_date ?>" type="text" id="edit_expire_date" name="edit_expire_date">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fitcard Note *</label>
                                    <div class="col-lg-9">  
                                        <textarea class="form-control"   id="edit_fitcard_note" name="edit_fitcard_note" required="required"><?= $fit_receive_note ?></textarea>
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
            <!-- Fitcard End -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($okala_status == 'Receive'):
                                ?>
                                <b style="color:green"> Okala <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Okala <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 5):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editOkala()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>	
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">view</button>
                            <div id="demo" class="collapse">
                                <br>
                                <form role="form" class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="Enter Passport Holder Name" id="edit_name" name="edit_name" value="<?= $name ?>" readonly="readonly">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">PASSPORT NO.</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="edit_passport_no" name="edit_passport_no" value="<?= $passport_no ?>" readonly="readonly" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Sponsor Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  id="edit_okala_sponsor_name" name="edit_okala_sponsor_name" value="<?= $okala_sponsor_name ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Office</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  id="edit_okala_office" name="edit_okala_office" value="<?= $okala_office ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  id="edit_okala_office" name="edit_okala_office" value="<?= $okala_status ?>" >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Note</label>
                                        <div class="col-lg-9">  
                                            <textarea class="form-control"   id="edit_okala_note" name="edit_okala_note" ><?= $okala_note ?></textarea>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editOkala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Okala Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editOkala'); ?>">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Enter Passport Holder Name" id="edit_name" name="edit_name" value="<?= $name ?>" readonly="readonly" required="required">
                                    </div>
                                    <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">PASSPORT NO.*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="passport_no" name="passport_no" value="<?= $passport_no ?>" readonly="readonly" required="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>" readonly>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>" readonly>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>" readonly>
                                    </div>
                                </div>






                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Sponsor Name *</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_okala_sponsor_name" name="edit_okala_sponsor_name" value="<?= $okala_sponsor_name ?>" required="required">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Office  *</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_okala_office" name="edit_okala_office" value="<?= $okala_office ?>" required="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_okala_status" name="edit_okala_status"> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Send" <?php if ($okala_status == "Send") echo "selected"; ?>>Send</option>
                                            <option value="Receive" <?php if ($okala_status == "Receive") echo "selected"; ?>>Receive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Okala Note *</label>
                                    <div class="col-lg-9">  
                                        <textarea class="form-control"   id="edit_okala_note" name="edit_okala_note" required="required"><?= $okala_note ?></textarea>
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

           



            <!-- Enjaz Start -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($enzaz_mufa_number != ''):
                                ?>
                                <b style="color:green"> Enjaz <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Enjaz <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 4):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editEnjaz()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_enjaz">view</button>
                            <div id="demo_enjaz" class="collapse">
                                <br>
                                <form role="form" class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name  </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number </label>
                                        <div class="col-lg-9">  
                                            <input type="text" class="form-control"  value="<?= $passport_no ?>" readonly >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Mufa Number </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  id="edit_mufa_number" name="edit_mufa_number" value="<?= $enzaz_mufa_number ?>"  >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Enjaz Date </label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $enzaz_date ?>" type="text" id="edit_enjaz_date" name="edit_enjaz_date" >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Enjaz Note </label>
                                        <div class="col-lg-9">  
                                            <textarea class="form-control"   id="edit_enjaz_note" name="edit_enjaz_note" ><?= $enzaz_note ?></textarea>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editEnjaz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Enjaz Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editEnjaz'); ?>"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $name ?>" name="edit_name" id="edit_name" readonly>
                                        <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number *</label>
                                    <div class="col-lg-9">  
                                        <input type="text" class="form-control"  value="<?= $passport_no ?>"  name="edit_passport_no" id="edit_passport_no" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>" readonly>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>" readonly>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>" readonly>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Mufa Number *</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_mufa_number" name="edit_mufa_number" value="<?= $enzaz_mufa_number ?>"  required="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Enjaz Date *</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $enzaz_date ?>" type="text" id="edit_enjaz_date" name="edit_enjaz_date" required="required">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Enjaz Note *</label>
                                    <div class="col-lg-9">  
                                        <textarea class="form-control"   id="edit_enjaz_note" name="edit_enjaz_note" required="required"><?= $enzaz_note ?></textarea>
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
            <!-- Enjaz End -->


            <!-- Embasy Start -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($embassy_visa_stamping_status == 'Complete'):
                                ?>
                                <b style="color:green"> Embasy <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Embasy <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 7):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editEmbasy()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_embasy">view</button>
                            <div id="demo_embasy" class="collapse">
                                <br>
                                <form role="form" class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name  </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number </label>
                                        <div class="col-lg-9">  
                                            <input type="text" class="form-control"  value="<?= $passport_no ?>" readonly >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                                        <div class="col-lg-9">
                                            <?php
                                            $allex = explode('.', $embassy_file_upload);
                                            $ex = $allex[1];
                                            if ($ex == "pdf"):
                                                ?>
                                                <a href="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>" target="_blank" ><?= $embassy_file_upload ?> <span style="color:red"> Click Download</span></a>
                                                <?php
                                            else:
                                                ?>   
                                                <img id="pp2" alt="no image found" src="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>" width="150" height="150">
                                                <a href="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>" target="_blank" > <span style="color:red">Click View</span></a>
                                            <?php
                                            endif;
                                            ?>



                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status*</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $embassy_visa_stamping_status ?>" readonly >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3"> Date *</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $embassy_date ?>" type="text" id="edit_embasy_date" name="edit_embasy_date" required="required">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date *</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $embasy_expire_date ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date Count*</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium " size="16"  value="<?= $embasy_expire_date_count ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Office*</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="Enter Office Name" id="edit_embasy_office" name="edit_embasy_office" value="<?= $embasy_office ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Embasy Note *</label>
                                        <div class="col-lg-9">  
                                            <textarea class="form-control"   id="edit_embasy_note" name="edit_embasy_note" required="required"><?= $embassy_note ?></textarea>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editEmbasy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Embasy Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editEmbasy'); ?>"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $name ?>" name="edit_name" id="edit_name" readonly>
                                        <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number *</label>
                                    <div class="col-lg-9">  
                                        <input type="text" class="form-control"  value="<?= $passport_no ?>"  name="edit_passport_no" id="edit_passport_no" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>" readonly>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>" readonly> 

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>" readonly>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                                    <div class="col-lg-9">
                                        <?php
                                        $allex = explode('.', $embassy_file_upload);
                                        $ex = $allex[1];
                                        if ($ex == "pdf"):
                                            ?>
                                            <a href="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>" target="_blank" ><?= $embassy_file_upload ?>  <span style="color:red">Click Download</span></a>
                                            <?php
                                        else:
                                            ?>   
                                            <img id="pp2" alt="no image found" src="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>" width="150" height="150">
                                            <a href="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>" target="_blank" > <span style="color:red">Click View</span></a>
                                        <?php
                                        endif;
                                        ?>
                                        <input type="file" name="edit_embasy_file" size="20" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_embasy_status" name="edit_embasy_status" required> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Complete" <?php if ($embassy_visa_stamping_status == 'Complete') echo 'selected' ?>>Complete</option>
                                            <option value="Incomplete" <?php if ($embassy_visa_stamping_status == 'Incomplete') echo 'selected' ?>>Incomplete</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3"> Date *</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $embassy_date ?>" type="text" id="edit_embasy_date" name="edit_embasy_date" required="required">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date *</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $embasy_expire_date ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required" disabled>

                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Office*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Enter Office Name" id="edit_embasy_office" name="edit_embasy_office" value="<?= $embasy_office ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Embasy Note *</label>
                                    <div class="col-lg-9">  
                                        <textarea class="form-control"   id="edit_embasy_note" name="edit_embasy_note" required="required"><?= $embassy_note ?></textarea>
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
            <!-- Embasy End -->







           



            <!-- Manpower Start -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($manpower_status == 'Receive'):
                                ?>
                                <b style="color:green"> Manpower <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Manpower <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 14):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editManpower()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_manpower">view</button>
                            <div id="demo_manpower" class="collapse">
                                <br>
                                <form role="form" class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name  </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number </label>
                                        <div class="col-lg-9">  
                                            <input type="text" class="form-control"  value="<?= $passport_no ?>" readonly >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                                        <div class="col-lg-9">
                                            <?php
                                            $allex = explode('.', $manpower_file_upload);
                                            $ex = $allex[1];
                                            if ($ex == "pdf"):
                                                ?>
                                                <a href="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>" target="_blank" ><?= $manpower_file_upload ?> <span style="color:red"> Click Download</span></a>
                                                <?php
                                            else:
                                                ?>   
                                                <img id="pp2" alt="no image found" src="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>" width="150" height="150">
                                                <a href="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>" target="_blank" > <span style="color:red">Click View</span></a>
                                            <?php
                                            endif;
                                            ?>



                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status*</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $manpower_status ?>" readonly >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3"> Date *</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $manpower_date ?>" type="text" id="edit_embasy_date" name="edit_embasy_date" required="required">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Office*</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="Enter Office Name" id="edit_manpower_office" name="edit_manpower_office" value="<?= $manpower_office ?>">
                                        </div>
                                    </div>

                                    <!--  <div class="form-group">
                                          <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date *</label>
                                          <div class="col-lg-9">
                                              <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $embasy_expire_date ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required">

                                          </div>
                                      </div>-->
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Remaining Date*</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium " size="16"  value="<?= $manpower_expire_date_count ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required">

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Manpower Note *</label>
                                        <div class="col-lg-9">  
                                            <textarea class="form-control"   id="edit_embasy_note" name="edit_embasy_note" required="required"><?= $manpower_note ?></textarea>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editManpower" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Manpower Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editManpower'); ?>"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $name ?>" name="edit_name" id="edit_name" readonly>
                                        <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number *</label>
                                    <div class="col-lg-9">  
                                        <input type="text" class="form-control"  value="<?= $passport_no ?>"  name="edit_passport_no" id="edit_passport_no" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>" readonly>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>" readonly> 

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>" readonly>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                                    <div class="col-lg-9">
                                        <?php
                                        $allex = explode('.', $manpower_file_upload);
                                        $ex = $allex[1];
                                        if ($ex == "pdf"):
                                            ?>
                                            <a href="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>" target="_blank" ><?= $manpower_file_upload ?>  <span style="color:red">Click Download</span></a>
                                            <?php
                                        else:
                                            ?>   
                                            <img id="pp2" alt="no image found" src="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>" width="150" height="150">
                                            <a href="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>" target="_blank" > <span style="color:red">Click View</span></a>
                                        <?php
                                        endif;
                                        ?>
                                        <input type="file" name="edit_manpower_file" size="20" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_manpower_status" name="edit_manpower_status" required> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Send" <?php if ($manpower_status == 'Send') echo 'selected' ?>>Send</option>
                                            <option value="Receive" <?php if ($manpower_status == 'Receive') echo 'selected' ?>>Receive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3"> Date *</label>
                                    <div class="col-lg-9">                                       
                                        <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?php
                                        if ($manpower_date == '') {
                                            echo date('Y-m-d');
                                        } else {
                                            echo $manpower_date;
                                        }
                                        ?>" type="text" id="edit_manpower_date" name="edit_manpower_date" required="required">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Office*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Enter Office Name" id="edit_manpower_office" name="edit_manpower_office" value="<?= $manpower_office ?>">
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                     <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Expire Date *</label>
                                     <div class="col-lg-9">
                                         <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?//= $embasy_expire_date ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required" disabled>

                                     </div>
                                 </div> -->



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Manpower Note *</label>
                                    <div class="col-lg-9">  
                                        <textarea class="form-control"   id="edit_manpower_note" name="edit_manpower_note" required="required"><?= $manpower_note ?></textarea>
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
            <!-- Manpower End -->



            <!-- Ticket Start -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($basic_flight == 'Complete'):
                                ?>
                                <b style="color:green"> Ticket <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Ticket <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 15):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editTicket()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_ticket">view</button>
                            <div id="demo_ticket" class="collapse">
                                <br>
                                <form role="form" class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name  </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number </label>
                                        <div class="col-lg-9">  
                                            <input type="text" class="form-control"  value="<?= $passport_no ?>" readonly >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                                        <div class="col-lg-9">
                                            <?php
                                            $allex = explode('.', $ticket_file_upload);
                                            $ex = $allex[1];
                                            if ($ex == "pdf"):
                                                ?>
                                                <a href="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>" target="_blank" ><?= $ticket_file_upload ?> <span style="color:red"> Click Download</span></a>
                                                <?php
                                            else:
                                                ?>   
                                                <img id="pp2" alt="no image found" src="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>" width="150" height="150">
                                                <a href="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>" target="_blank" > <span style="color:red">Click View</span></a>
                                            <?php
                                            endif;
                                            ?>



                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Number*</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $ticket_number ?>"  >

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Location*</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"  value="<?= $ticket_location ?>"  >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Flying Date </label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?= $ticket_flying_date ?>" type="text" id="edit_embasy_date" name="edit_embasy_date" required="required">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Flying Time </label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium" size="16"  value="<?= $ticket_flying_time ?>" type="text" id="edit_embasy_date" name="edit_embasy_date" required="required">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Remaining Date</label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-inline input-medium " size="16"  value="<?= $ticket_expire_date_count ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required">

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Note </label>
                                        <div class="col-lg-9">  
                                            <textarea class="form-control"   id="edit_embasy_note" name="edit_embasy_note" required="required"><?= $ticket_note ?></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Basic Flight </label>
                                        <div class="col-lg-9">  
                                            <input class="form-control form-control-inline input-medium " size="16"  value="<?= $basic_flight ?>" type="text" id="edit_embasy_expire_date" name="edit_embasy_expire_date" required="required">
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Ticket Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editTicket'); ?>"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $name ?>" name="edit_name" id="edit_name" readonly>
                                        <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number *</label>
                                    <div class="col-lg-9">  
                                        <input type="text" class="form-control"  value="<?= $passport_no ?>"  name="edit_passport_no" id="edit_passport_no" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>" readonly>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>" readonly> 

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>" readonly>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">File</label>
                                    <div class="col-lg-9">
                                        <?php
                                        $allex = explode('.', $ticket_file_upload);
                                        $ex = $allex[1];
                                        if ($ex == "pdf"):
                                            ?>
                                            <a href="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>" target="_blank" ><?= $ticket_file_upload ?>  <span style="color:red">Click Download</span></a>
                                            <?php
                                        else:
                                            ?>   
                                            <img id="pp2" alt="no image found" src="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>" width="150" height="150">
                                            <a href="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>" target="_blank" > <span style="color:red">Click View</span></a>
                                        <?php
                                        endif;
                                        ?>
                                        <input type="file" name="edit_ticket_file" size="20" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $ticket_number ?>"  name="edit_ticket_number" >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Location*</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $ticket_location ?>"  name="edit_ticket_location" required="required">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Flying Date *</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-inline input-medium default-date-picker" size="16"  value="<?php
                                        if ($ticket_flying_date == '') {
                                            echo date('Y-m-d');
                                        } else {
                                            echo $ticket_flying_date;
                                        }
                                        ?>" type="text" id="edit_ticket_date" name="edit_ticket_date" required="required">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Flying Time *</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-inline input-medium" size="16"  value="<?= $ticket_flying_time ?>" type="text" id="edit_ticket_time" name="edit_ticket_time" required="required">

                                    </div>
                                </div>






                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Ticket Note *</label>
                                    <div class="col-lg-9">  
                                        <textarea class="form-control"   id="edit_ticket_note" name="edit_ticket_note" required="required"><?= $ticket_note ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Basic Flight*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_basic_flight" name="edit_basic_flight" required="required"> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>
                                            <option value="Complete" <?php if ($basic_flight == 'Complete') echo 'selected' ?>>Complete</option>
                                            <option value="Cancel" <?php if ($basic_flight == 'Cancel') echo 'selected' ?>>Cancel</option>
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
            <!-- Ticket End -->	



            <!-- Passport Cancel Start -->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php
                            if ($is_cancel == 'false'):
                                ?>
                                <b style="color:green"> Passport Cancel <span aria-hidden="true" class="glyphicon glyphicon-ok"></span></b> 
                                <?php
                            else:
                                ?>
                                <b style="color:red"> Passport Cancel <span aria-hidden="true" class="glyphicon glyphicon-remove"></span></b>   
                            <?php
                            endif;
                            ?>
                        </header>
                        <div class="panel-body">
                            <?php
                            if ($role_id == 1 || $role_id == 2 || $role_id == 13):
                                ?>
                                <button type="button" class="btn btn-danger" onclick="editPassportCancel()">Edit</button> &nbsp;
                                <?php
                            endif;
                            ?>


                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editPassportCancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Edit Passport Cancel Info</h4>
                        </div>

                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editPassportCancel'); ?>"  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Name * </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $name ?>" name="edit_name" id="edit_name" readonly>
                                        <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?= $id ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Number *</label>
                                    <div class="col-lg-9">  
                                        <input type="text" class="form-control"  value="<?= $passport_no ?>"  name="edit_passport_no" id="edit_passport_no" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">ID NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_id_number" name="edit_id_number" value="<?= $basic_id_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">VISA NO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_visa_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Fingering</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $basic_fingering ?>" readonly>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Name</label>
                                    <div class="col-lg-9">

                                        <input type="text" class="form-control"  id="edit_visa_number" name="edit_visa_number" value="<?= $reference_name ?>" readonly> 

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Reference Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $reference_mobile_number ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER NAME</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_broker_name" name="edit_broker_name" value="<?= $broker_name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">BROKER Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control"  value="<?= $broker_mobile_number ?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Sponsor Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="edit_sponsor_name" name="edit_sponsor_name" value="<?= $okala_sponsor_name ?>" readonly>
                                    </div>
                                </div>





                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Passport Cancel*</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="edit_is_cancel" name="edit_is_cancel" required="required"> <!-- input-sm m-bot15  -->
                                            <option value="">Select</option>

                                            <option value="true" <?php if ($is_cancel == 'true') echo 'selected' ?>>Cancel</option>
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
            <!-- Passport Cancel -->	





        <?php endif; ?>


        <br><br>
        <?php
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 10):
            ?>

            <div class="row">
                <div class="col-lg-12">                
                    <a href="<?= site_url('enjaz_notification') ?>"> <button type="button"  class="btn btn-info ">Enjaz Notification</button></a>                               
                    <a href="<?= site_url('passport_movement_notification') ?>">  <button type="button"  class="btn btn-primary">Passport Movement Notification</button></a>                  
                </div>
            </div>
        <?php endif; ?>
    </section>
</section>
<!--main content end-->




<script>
    function editOkala() {

        $("#editOkala").modal();
    }
    function editBasic() {

        $("#editBasic").modal();
    }

    function editEnjaz() {

        $("#editEnjaz").modal();
    }

    function editEmbasy() {

        $("#editEmbasy").modal();
    }

    function editFitcard() {

        $("#editFitcard").modal();
    }

    function editManpower() {

        $("#editManpower").modal();
    }

    function editTicket() {

        $("#editTicket").modal();
    }

    function editPassportCancel() {

        $("#editPassportCancel").modal();
    }


    function Show_Ref_Mobile_number(reference_all) {

        var reference_all_arr = reference_all.split("-");
        var reference_name = reference_all_arr[0];
        $.ajax({
            type: "Post",
            url: "<?php echo site_url('create_new/getRefMobileNumber'); ?>",
            data: {'reference_name': reference_name},
            success: function (data) {
                var ob = JSON.parse(data);
                var reference_mobile = ob[0].reference_mobile;

                console.log(data);
                $("#edit_reference_mobile_number").val(reference_mobile);



            }
        });


    }

    function Show_Brok_Mobile_number(broker_all) {
        var broker_all_arr = broker_all.split("-");
        var broker_name = broker_all_arr[0];
        $.ajax({
            type: "Post",
            url: "<?php echo site_url('create_new/getBrokMobileNumber'); ?>",
            data: {'broker_name': broker_name},
            success: function (data) {
                var ob = JSON.parse(data);
                var broker_mobile = ob[0].broker_mobile;


                $("#edit_broker_mobile_number").val(broker_mobile);



            }
        });


    }




</script>