
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add  Service
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addModelForm"  role="form" method="post"  action="<?php echo site_url('add_service/getServiceSearch');  ?>">
                            <div class="form-group">
                                <!-- <div class="col-lg-3">
                                     <a href="<?//=site_url('view_service/getService2')?>"><button type="button" class="btn btn-info pull-left">View All</button></a>
                                 </div>-->
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Enter passport number" id="customer_code" name="customer_code">
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-info pull-left">Search</button>
                                </div>

                            </div>


                        </form>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">

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
                                        <th class="hidden-phone">CUSTOMER ID</th>
                                        <th>CUSTOMER NAME</th>
                                        <th class="hidden-phone">PHONE</th>
                                        <th class="hidden-phone">ZONE</th>

                                        <th>Action</th>
                                        <th class="hide_coloum">Test</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($base_clients_data as $row) :
                                        $id=$row->ci_id;
                                        $client_code=$row->client_code;
                                        $client_name=$row->client_name;
                                        $client_phone=$row->client_phone;
                                        $ref_area_id=$row->ref_area_id;
                                        $res_area= $this->db->query("select * from base_areas where a_id='$ref_area_id'");
                                        foreach ($res_area->result() as $row2) :
                                            $area_name=$row2->area_name;
                                        endforeach;


                                        ?>
                                    <tr class="gradeX">
                                        <td class="hidden-phone"><?php echo $client_code; ?></td>
                                        <td><?php echo $client_name; ?></td>
                                        <td class="hidden-phone"><?php echo $client_phone; ?></td>
                                        <td class="hidden-phone"><?php echo $area_name; ?></td>

                                        <td>
                                            <button class="btn btn-primary btn-xs" onclick="addModal(<?=$id?>);"><i class="fa fa-pencil">Add</i></button>
                                            <a href="<?=site_url('view_service/getCustomerServiceDetail/'.$id)?>">  <button class="btn btn-primary btn-xs" ><i class="fa fa-pencil">Details</i></button></a>
                                        </td>
                                        <td class="hide_coloum"><?php echo $id; ?></td>
                                    </tr>

                                    <?php endforeach;  ?>
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



<!-- Modal -->
<div class="modal fade" id="myModalADD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Service Confirmation</h4>
            </div>

            <div class="modal-body">
                <form class="cmxform form-horizontal tasi-form" id="addServiceForm"  role="form" method="post"  action="<?php echo site_url('add_service/addReqService');  ?>">

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Customer Code *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" readonly="readonly" placeholder="Enter Customer Code" id="add_customer_code" name="add_customer_code">
                            <input type="hidden" class="form-control"  id="client_id" name="client_id">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Mobile NUmber *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" readonly="readonly" placeholder="Enter Mobile Number" id="add_mobile_number" name="add_mobile_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Service Priority *</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="add_service_priority" id="add_service_priority" required>
                                <option value="">Select Priority</option>
                                <option value="1">Normal</option>
                                <option value="2">Moderate</option>
                                <option value="3">High</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Request Date *</label>
                        <div class="col-lg-9">
                            <input class="form-control form-control-inline input-medium default-date-picker" size="16" placeholder="Enter Request Date" value="" type="text" id="add_request_date" name="add_request_date">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Service Description *</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" placeholder="Enter Service Description" id="add_service_description" name="add_service_description"></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
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














