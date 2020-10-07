<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Book Tour Package Details
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-12">

                                <form role="form" class="cmxform form-horizontal tasi-form" method="post"  id="RoleForm" action="<?php echo site_url('tour_package/searchData') ?>">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-1 control-label col-lg-1">From Date</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="default-date-picker form-control" placeholder="Enter From Date" id="date_from"  name="date_from" >
                                        </div>
                                        <label for="inputSuccess" class="col-sm-1 control-label col-lg-1">To Date</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="default-date-picker form-control" placeholder="Enter To Date" id="date_to"  name="date_to"  >
                                        </div>
                                      

                                    </div>
                                    <button type="submit" name="submitDate" class="btn btn-info pull-right" onclick="getDateSearch()">Submit</button>
                                </form>


                            </div>
                        </div>
                        <br>

  <div class="adv-table">
                        <div class="adv-table">
                            <table class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Tour Name</th>
                                        <th>Country</th>
                                        <th>Amount</th>
                                        <th>package</th>
                                        <th>Client Name</th>
										<th>Mobile </th>
										<th>Email </th>
										<th>Start Date </th>
										<th>End Date </th>
										<th>Entry Date </th>
										
                                     <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $counter = 0;
                                    foreach ($reference_data as $row) :
                                        $counter++;
										
										
										
										  $pak_id = $row->pak_id;
                                        $result2=$this->db->query("select *  from package where id='$pak_id'");

                                        foreach($result2->result() as $row2):
                                            $tour_name=$row2->tour_name;
											$country=$row2->country;
											$amount=$row2->amount;
											$package=$row2->package;
                                        endforeach;
										
										
										
										
										$name = $row->name;
                                        $phn = $row->mobile;
                                        $email = $row->email;
                                        $sdate = $row->sdate;
                                   
                                        $edate = $row->edate;
                                        $datetime = $row->datetime;
                                       
                                        ?>
                                    <tr class="gradeX">
									 <td><?php echo $counter; ?></td>
                                        <td><?php echo $tour_name; ?></td>
                                        <td><?php echo $country ?></td>
                                        <td><?php echo $amount ?></td>
                                        <td><?php echo $package ?></td>
                                         <td><?php echo $name ?></td>
                                        <td><?php echo $phn ?></td>
										 <td><?php echo $email; ?></td>
                                        <td><?php echo $sdate ?></td>
                                        <td><?php echo $edate ?></td>
                                        <td><?php echo $datetime ?></td>
                                       

                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>	
</div	>					
                    </div>



                </section>
            </div>
        </div>




    </section>
</section>
<!--main content end-->
