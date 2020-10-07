<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Broker Details
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-12">

                                <form role="form" class="cmxform form-horizontal tasi-form" method="post"  id="RoleForm" action="<?php echo site_url('broker_report/searchData') ?>">

                                    <div class="form-group">
                                        <label for="inputSuccess" class="col-sm-1 control-label col-lg-1">From Date</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="default-date-picker form-control" placeholder="Enter From Date" id="date_from"  name="date_from" >
                                        </div>
                                        <label for="inputSuccess" class="col-sm-1 control-label col-lg-1">To Date</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="default-date-picker form-control" placeholder="Enter To Date" id="date_to"  name="date_to"  >
                                        </div>
                                        <label for="inputSuccess" class="col-sm-1 control-label col-lg-1">Broker Name *</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" name="broker_name" id="broker_name" >
                                                <option value="">Select Broker</option>
                                                <?php
                                                foreach ($broker_name as $row) :
                                                    ?>
                                                <option value="<?=$row->id;?>"><?=$row->broker_name; ?></option>
                                                <?php endforeach;  ?>
                                            </select>
                                        </div>

                                    </div>
                                    <button type="submit" name="submitDate" class="btn btn-info pull-right" onclick="getDateSearch()">Submit</button>
                                </form>


                            </div>
                        </div>
                        <br>


                        <div class="adv-table">
                            <table class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Due</th>
                                        <th>Payment</th>
                                        <th>Note</th>
                                        <th>Date </th>
                                     <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $counter = 0;
                                    foreach ($broker_data as $row) :
                                        $counter++;
                                        $broker_id = $row->broker_id;
                                        $result2=$this->db->query("select *  from broker_table where id='$broker_id'");

                                        foreach($result2->result() as $row2):
                                            $broker_name=$row2->broker_name;
                                        endforeach;
                                        $payment = $row->payment;
                                        $due = $row->due;
                                        $note = $row->note;
                                        $date_time = $row->date_time;
                                        ?>
                                    <tr class="gradeX">
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $broker_name ?></td>
                                        <td><?php echo $due ?></td>
                                        <td><?php echo $payment ?></td>
                                        <td><?php echo  $note ?></td>
                                        <td><?php echo $date_time ?></td>
                                    </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>																	
                    </div>



                </section>
            </div>
        </div>




    </section>
</section>
<!--main content end-->
