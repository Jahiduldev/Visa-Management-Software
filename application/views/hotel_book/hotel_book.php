<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Hotel Book Details
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-12">

                                <form role="form" class="cmxform form-horizontal tasi-form" method="post"  id="RoleForm" action="<?php echo site_url('hotel_book/searchData') ?>">

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
                                        <th>Tour Location</th>
                                        <th>Check In Date </th>
										<th>Check Out Date </th>
										<th>Rooms </th>
										<th>Adults </th>
										<th>Child </th>
										<th>Type Single </th>
										<th>Type Delux </th>
										<th>Type Non Delux </th>
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
                                        $phn = $row->phn;
                                        $email = $row->email;
                                        $leavefrom = $row->leavefrom;
                                   
                                        $dep = $row->dep;
                                        $returns = $row->returns;
                                        $email = $row->email;
                                        $room = $row->room;
										
										$adult = $row->adult;
                                        $child = $row->child;
                                        $single = $row->single;
                                        $eco = $row->eco;
										 $datetimes = $row->datetimes;
                                        ?>
                                    <tr class="gradeX">
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $phn ?></td>
                                        <td><?php echo $email ?></td>
                                         <td><?php echo $leavefrom ?></td>
                                        <td><?php echo $dep ?></td>
										 <td><?php echo $returns; ?></td>
                                        <td><?php echo $room ?></td>
                                        <td><?php echo $adult ?></td>
                                        <td><?php echo $child ?></td>
                                         <td><?php echo $single ?></td>
                                        <td><?php echo $eco ?></td>
										<td><?php echo $bus ?></td>
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
