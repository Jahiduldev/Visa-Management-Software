<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <B style="color:blue">Create Passport Receives</B>    

                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addPassportForm"  role="form" method="post"  action="<?php echo site_url('create_new/addPassport'); ?>"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Passport holder Name" id="add_passport_holder_name" name="add_passport_holder_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Passport Number *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Passport Number" id="add_passport_no" name="add_passport_no">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Mobile Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number" id="add_mobile_number" name="add_mobile_number">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">ID Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Id Number" id="add_id_number" name="add_id_number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visa Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Visa Number" id="add_visa_number" name="add_visa_number">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visa Type*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Visa Type" id="add_visa_type" name="add_visa_type">
                                </div>
                            </div>
							
							
							
							  <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date of Birth</label>
                                <div class="col-lg-10">
                                <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Date of Birth" value="" type="text" id="dob" name="dob">
                                </div>
                            </div>
							
							
							
							
						
							
							
							 <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Passeneger Experience</label>
                                <div class="col-lg-10">  
                                    <textarea class="form-control"  placeholder="Enter Experience"  id="add_experience" name="add_experience"> </textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Agent Name *</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="add_reference_name" id="add_reference_name" onChange="Show_Ref_Mobile_number(this.value)"> <!-- input-sm m-bot15  -->
                                        <option value="">Select Agent</option>
                                        <?php
                                        foreach ($get_reference_data as $row) :
                                            ?>
                                        <option value="<?= $row->reference_name.'-'.$row->id; ?>"><?= $row->reference_name.'-'.$row->id; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br>
                                     <button type="button" data-toggle="modal" data-target="#myModalreference" class="btn btn-info pull-right">Add Agent</button>
                                </div>
                            </div>

                            <!--   <div class="form-group">
                                   <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Reference Name*</label>
                                   <div class="col-lg-10">
                                       <input type="text" class="form-control" placeholder="Enter Reference Name" id="add_reference_name" name="add_reference_name">
                                   </div>
                               </div>-->

                       
                            <!--  <div class="form-group">
                                  <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Broker Name*</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" placeholder="Enter Broker Name" id="add_broker_name" name="add_broker_name">
                                  </div>
                              </div>-->


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Agent Mobile Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Agent Mobile Number" id="add_reference_mobile_number" name="add_reference_mobile_number" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Sponsor Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Sponsor Name" id="add_sponsor_name" name="add_sponsor_name">
                                </div>
                            </div>
                            
                       
                            
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Training</label>
                                <div class="col-lg-10">
                                    <input type="file" name="training" size="20" />
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Passport Copy</label>
                                <div class="col-lg-10">
                                    <input type="file" name="passport_owner" size="20" />
                                </div>
                            </div>
                            
                        
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Gender*</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="add_passport_type" name="add_passport_type"> <!-- input-sm m-bot15  -->
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
							
							
							
							
							
							
							
							 
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Cooking</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="cooking" name="cooking"> <!-- input-sm m-bot15  -->
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
							
							
							
							
							
							
							
							
								 
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Clerning</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="clerning" name="clerning"> <!-- input-sm m-bot15  -->
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
							
							
							 <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Baby Sitting</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="baby" name="baby"> <!-- input-sm m-bot15  -->
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
							
							
							
									
							 <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Driving</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="driving" name="driving"> <!-- input-sm m-bot15  -->
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
							
							
                        <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Post Apply For</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="post_apply" name="post_apply"> <!-- input-sm m-bot15  -->
                                        <option value="">Select</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Jordan">Jordan</option>
										<option value="Oman">Oman</option>
                                        <option value="KSA">KSA</option>
										<option value="Dubai">Dubai</option>
										<option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Passport Preview</label>
                                <div class="col-lg-10">
                                    <input type="file" name="passportpreview" size="20" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Note*</label>
                                <div class="col-lg-10">  
                                    <textarea class="form-control"  placeholder="Enter Description"  id="add_description" name="add_description"> </textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>



    </section>
</section>
<!--main content end-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Broker</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('create_new/addBroker');  ?>">
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Broker Name</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Enter Broker Name" id="broker_name" name="broker_name" class="form-control">

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Broker Mobile Number *</label>
                        <div class="col-lg-9">
                            <input type="text" maxlength="11" minlength="11" pattern="\d*" placeholder="Enter Broker Mobile Number" id="broker_mobile" name="broker_mobile" class="form-control">

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Broker Mobile Number 1 *</label>
                        <div class="col-lg-9">
                            <input type="text" maxlength="11" minlength="11" pattern="\d*" placeholder="Enter Broker Mobile Number" id="broker_mobile_1" name="broker_mobile_1" class="form-control">

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Broker Mobile Number 2 *</label>
                        <div class="col-lg-9">
                            <input type="text" maxlength="11" minlength="11" pattern="\d*" placeholder="Enter Broker Mobile Number" id="broker_mobile_2" name="broker_mobile_2" class="form-control">

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
<!-- Reference modal -->

<div class="modal fade" id="myModalreference" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Reference</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('create_new/addReference');  ?>">
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Reference Name</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Enter Reference Name" id="reference_name" name="reference_name" class="form-control">

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Ref. Number *</label>
                        <div class="col-lg-9">
                            <input type="text" maxlength="11" minlength="11" pattern="\d*" placeholder="Enter Reference Mobile Number" id="reference_mobile" name="reference_mobile" class="form-control">

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Ref. Number 1 *</label>
                        <div class="col-lg-9">
                            <input type="text" maxlength="11" minlength="11" pattern="\d*" placeholder="Enter Reference Mobile Number" id="reference_mobile_1" name="reference_mobile_1" class="form-control">

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-3 control-label" for="name">Ref. Number 2 *</label>
                        <div class="col-lg-9">
                            <input type="text" maxlength="11" minlength="11" pattern="\d*" placeholder="Enter Reference Mobile Number" id="reference_mobile_2" name="reference_mobile_2" class="form-control">

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