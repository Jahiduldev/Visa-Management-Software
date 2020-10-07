<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
       

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Payment Details
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr>
                                        <th>Payment Serial</th>
                                        <th>Payment</th>
                                        <th>Date Time</th>
                                     <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>
								
                                    <?php 
									$counter=0;
									foreach ($passport_detail_data as $row) :
									$counter++;
                                        $passport_no= $row->passport_no;
										$payment= $row->payment;
										$date_time= $row->date_time;
										 
										
                                        ?>
                                    <tr class="gradeX">
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $payment ?></td>
                                         <td><?php echo $date_time ?></td>
                                    </tr>

                                    <?php endforeach;  ?>
                                </tbody>
                            </table>

                        </div>																	
                    </div>
					
					 <?php 									
									foreach ($passport_amount_data as $row) :								
                                        $passport_no= $row->passport_no;
										$name= $row->name;
										$contact_amount= $row->contact_amount;
										$total_payment= $row->total_payment;
										 $total_due= $contact_amount - $total_payment;
										endforeach;
                                        ?>
					  <div class="row">
            <div class="col-sm-6 col-lg-offset-3" style="border:solid">
					<h4>Name : <?=$name?></h4>
				    <h4>Passport Number : <?=$passport_no?></h4>
					<h4>Contact Amount : <?=$contact_amount?></h4>
					<h4>Total Payment : <?=$total_payment?></h4>
					<h4>Total Due : <?=$total_due?></h4>
					</div>
					</div>
					<br><br>
					
                </section>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?=site_url('add_menu/deleteMenu')?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete Menu Confirmation</h4>
                        </div>
                        <div class="modal-body">

                            Do You Want To Delete This Menu?
                            <input type="hidden" id="delete_menu_id" name="delete_menu_id" />
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

        <!-- Modal -->
        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Menu Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('add_menu/editMenu');  ?>">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Menu Name</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Menu Name" id="edit_menu_name" name="edit_menu_name" class="form-control">
                                    <input type="hidden" id="edit_menu_id" name="edit_menu_id" />
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
        <!-- modal -->

    </section>
</section>
<!--main content end-->
