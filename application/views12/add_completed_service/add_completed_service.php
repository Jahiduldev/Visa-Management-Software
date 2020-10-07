
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
       

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Completed  Service
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
                                        <th class="hidden-phone">ADDRESS</th>
                                        <th class="hidden-phone">PHONE</th>
                                        <th class="hidden-phone">STATUS</th>
                                        <th class="hidden-phone">ZONE</th>
                                        <th class="hidden-phone">MODEL</th>
                                        <th class="hidden-phone">INSTALL DATE</th>
                                       <!-- <th class="hidden-phone">Service DATE</th>-->
                                        <th class="hidden-phone">PRIORITY</th>
                                        <th>Action</th>
                                        <th class="hide_coloum">Test</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($get_base_service_custom_data as $row) :
                                        $id=$row->cu_id;
                                        $ref_client_id=$row->ref_client_id;
                                        $is_active=$row->is_active;



                                        $res_clients= $this->db->query("select * from base_service_master where ref_client_id='$ref_client_id'");
                                        foreach ($res_clients->result() as $row0) :

                                            $m_id=$row0->m_id;
                                            $install_date=$row0->install_date;
                                            $ref_model_id=$row0->ref_model_id;
                                        endforeach;

                                        $res_clients= $this->db->query("select * from base_clients where ci_id='$ref_client_id'");
                                        foreach ($res_clients->result() as $row1) :
                                            $client_code=$row1->client_code;
                                            $client_name=$row1->client_name;
                                            $client_phone=$row1->client_phone;
                                            $client_address=$row1->client_address;
                                            $ref_area_id=$row1->ref_area_id;
                                        endforeach;

                                        $res_area= $this->db->query("select * from base_areas where a_id='$ref_area_id'");
                                        foreach ($res_area->result() as $row2) :
                                            $area_name=$row2->area_name;
                                        endforeach;

                                        $res_area= $this->db->query("select * from base_models where mo_id='$ref_model_id'");
                                        foreach ($res_area->result() as $row3) :
                                            $model_name=$row3->model_name;
                                        endforeach;

                                        //   $service_date=$row->service_date;

                                        $service_priority=$row->service_priority;
                                        if($service_priority==1) {
                                            $priority='Normal';
                                        }else if($service_priority==2) {
                                            $priority='Moderate';
                                        }else if($service_priority==3) {
                                            $priority='High';
                                        }else {
                                            $priority='';
                                        }
                                        ?>
                                    <tr class="gradeX">
                                        <td class="hidden-phone"><?php echo $client_code; ?></td>
                                        <td><?php echo $client_name; ?></td>
                                        <td class="hidden-phone"><?php echo $client_address; ?></td>
                                        <td class="hidden-phone"><?php echo $client_phone; ?></td>
                                        <td class="hidden-phone"><?php echo $is_active; ?></td>
                                        <td class="hidden-phone"><?php echo $area_name; ?></td>
                                        <td class="hidden-phone"><?php echo $model_name; ?></td>
                                        <td class="hidden-phone"><?php echo $install_date; ?></td>
                                       <!-- <td class="hidden-phone"><?php //echo $area_name; ?></td>-->
                                        <td class="hidden-phone"><?php echo $priority; ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" onclick="addModal(<?=$id?>);"><i class="fa fa-pencil">Add</i></button>

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
                <form class="cmxform form-horizontal tasi-form" id="addServiceForm"  role="form" method="post"  action="<?php echo site_url('add_completed_service/addCompletedService');  ?>">

                    <input type="hidden" class="form-control"  id="req_id" name="req_id">


                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Add notes about service *</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" placeholder="Enter Service Description" id="add_notes" name="add_notes"></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Filter Change *</label>
                        <div class="col-lg-9">
                            <input type="checkbox" name="filter_change" id="filter_change"  value="">

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














