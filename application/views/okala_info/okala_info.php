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
                        <form class="cmxform form-horizontal tasi-form" id="addPassportForm"  role="form" method="post"  action="<?php echo site_url('create_new/addPassport');  ?>"  enctype="multipart/form-data">
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
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">ID Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Visa Number" id="add_id_number" name="add_id_number">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Visa Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Visa Number" id="add_visa_number" name="add_visa_number">
                                </div>
                            </div>
							
							
						<div class="form-group">
                        <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Fingering*</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="add_fingering_type" name="add_fingering_type"> <!-- input-sm m-bot15  -->
                                <option value="">Select</option>
                                <option value="Send">Send</option>
                                <option value="Receive">Receive</option>
                            </select>
                        </div>
                        </div>
						
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Reference Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Reference Name" id="add_reference_name" name="add_reference_name">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Broker Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Broker Name" id="add_broker_name" name="add_broker_name">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Broker Mobile Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Broker Mobile Number" id="add_broker_mobile_number" name="add_broker_mobile_number">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Reference Mobile Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Reference Mobile Number" id="add_reference_mobile_number" name="add_reference_mobile_number">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Sponsor Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Sponsor Name" id="add_sponsor_name" name="add_sponsor_name">
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
									<header class="panel-heading">
								    <B style="color:blue">FITCARD</B>
									
									</header>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Medical Name*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Medical Name" id="add_medical_name" name="add_medical_name">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">File</label>
                                <div class="col-lg-10">
                                    <input type="file" name="add_file" size="20" />
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Submitted Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Submitted Date" value="" type="text" id="submitted_date" name="submitted_date">
                                  
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Receive Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Receive Date" value="" type="text" id="receive_date" name="receive_date">
                                  
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Expire Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Expire Date" value="" type="text" id="expire_date" name="expire_date">
                                  
                                </div>
                            </div>
							 <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Fitcard Note*</label>
                                <div class="col-lg-10">  
                                    <textarea class="form-control"  placeholder="Enter Fit card Note"  id="add_fitcard_note" name="add_fitcard_note"> </textarea>
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Entry Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Entry Date" value="" type="text" id="entry_date" name="entry_date">
                                  
                                </div>
                            </div>
							
							
                            <!--<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Status *</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="add_status" name="add_status"> <!-- input-sm m-bot15  
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Deactive</option>
                                    </select>
                                </div>
                            </div>-->
							
							        <header class="panel-heading">
                                    <B style="color:blue">ENJAZ INFO</B>
									</header>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Mufa Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Mufa Number" id="add_mufa_number" name="add_mufa_number">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Re Mufa Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Re Mufa Number" id="add_remufa_number" name="add_remufa_number">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Mufa Fee*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Mufa Fee" id="add_mufa_fee" name="add_mufa_fee">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Enjaz Visa Fee*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Enjaz Visa Fee" id="add_enjaz_visa_fee" name="add_enjaz_visa_fee">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Enjaz Health Fee*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Enjaz Health Fee" id="add_enjaz_health_fee" name="add_enjaz_health_fee">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">File</label>
                                <div class="col-lg-10">
                                    <input type="file" name="add_enjaz_file" size="20" />
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Enjaz Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Enjaz Date" value="" type="text" id="enjaz_date" name="enjaz_date">
                                  
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Enjaz Note *</label>
                                <div class="col-lg-10">  
                                   <textarea class="form-control"  placeholder="Enter Enjaz Note" id="add_enjaz_note" name="add_enjaz_note"></textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Entry Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Entry Date" value="" type="text" id="enjaz_entry_date" name="enjaz_entry_date">
                                  
                                </div>
                            </div>
							
							       <header class="panel-heading">
								  <B style="color:blue">EMBASSY INFO</B>
									
									</header>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Status*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Status" id="add_embasy_status" name="add_embasy_status">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">File</label>
                                <div class="col-lg-10">
                                    <input type="file" name="add_embasy_file" size="20" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Embassy Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Embassy Date" value="" type="text" id="embasy_date" name="embasy_date">
                                  
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Embassy Note *</label>
                                <div class="col-lg-10">  
                                   <textarea class="form-control"  placeholder="Enter Embassy Note" id="add_embasy_note" name="add_embasy_note"></textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Entry Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Entry Date" value="" type="text" id="embasy_entry_date" name="embasy_entry_date">
                                  
                                </div>
                            </div>
							
							<header class="panel-heading">
								
									<B style="color:blue">TICKET INFO</B>
									</header>
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Price (BDT/$)*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Price(BDT/$)" id="add_price" name="add_price">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Ticket Number*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Ticket Number" id="add_ticket_number" name="add_ticket_number">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Location*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Location " id="add_ticket_location" name="add_ticket_location">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Flying Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Flying Date" value="" type="text" id="flying_date" name="flying_date">
                                  
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Flying Time *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Flying Time" id="add_flying_time" name="add_flying_time">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Purchase Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Purchase Date" value="" type="text" id="ticket_purchase_date" name="ticket_purchase_date">
                                  
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Ticket Note *</label>
                                <div class="col-lg-10">  
                                   <textarea class="form-control"  placeholder="Enter Ticket Note" id="add_ticket_note" name="add_ticket_note"></textarea>
                                </div>
                            </div>
		
							<div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Entry Date</label>
                                <div class="col-lg-10">
                                  <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Entry Date" value="" type="text" id="ticket_entry_date" name="ticket_entry_date">
                                  
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

