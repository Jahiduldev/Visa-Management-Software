<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Visa Book Details
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-12">

                                <form role="form" class="cmxform form-horizontal tasi-form" method="post"  id="RoleForm" action="<?php echo site_url('visa_report/searchData') ?>">

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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Business Visa </th>
										<th>Turist Visa </th>
										<th>Assist you with Visa Query </th>
										<th>Visa Assistant Team  </th>
										<th>Foreigner Registration and Visa Extension Guide </th>
										
										
										<th>Entry Date </th>
                                     <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $counter = 0;
                                    foreach ($reference_data as $row) :
                                        $counter++;
										
										$name = $row->name;
                                        $phn = $row->mobile;
                                        $email = $row->email;
                                        $country = $row->country;
                                   
                                        $v1 = $row->v1;
                                        $v2 = $row->v2;
                                        $v3 = $row->v3;
                                        $v4 = $row->v4;
									$v5 = $row->v5;
										 $datetimes = $row->datetimes;
                                        ?>
                                    <tr class="gradeX">
                                        <td><?php echo $counter ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $phn ?></td>
                                        <td><?php echo $email ?></td>
                                         <td><?php echo $country ?></td>
                                        <td><?php echo $v1 ?></td>
										 <td><?php echo $v2 ?></td>
                                        <td><?php echo $v3 ?></td>
                                        <td><?php echo $v4 ?></td>
                                       <td><?php echo $v5 ?></td>
										<td><?php echo $datetimes ?></td>
                                    </tr>

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
