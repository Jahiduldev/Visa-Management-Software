<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Completed Service
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addModelForm"  role="form" method="post"  action="<?php echo site_url('view_complete_service/getServiceSearch');  ?>">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <a href="<?=site_url('view_complete_service/getService2')?>"><button type="button" class="btn btn-info pull-left">View All</button></a>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Enter Customer Code" id="customer_code" name="customer_code">
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
                                        <th class="hidden-phone">REQ. DATE</th>
                                        <th class="hidden-phone">DESCRIPTION</th>
                                        <th class="hidden-phone">PRIORITY</th>
                                      <!--  <th>Action</th>-->
                                        <th class="hide_coloum">Test</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($get_req_service_data as $row) :
                                        $id=$row->cu_id;

                                        $ref_client_id=$row->ref_client_id;

                                        $res_clients= $this->db->query("select * from base_clients where ci_id='$ref_client_id'");
                                        foreach ($res_clients->result() as $row1) :
                                            $client_code=$row1->client_code;
                                            $client_name=$row1->client_name;
                                            $client_phone=$row1->client_phone;
                                            $ref_area_id=$row1->ref_area_id;
                                        endforeach;



                                        $res_area= $this->db->query("select * from base_areas where a_id='$ref_area_id'");
                                        foreach ($res_area->result() as $row2) :
                                            $area_name=$row2->area_name;
                                        endforeach;

                                        $request_date=$row->request_date;
                                        $service_description=$row->service_description;
                                        $service_priority=$row->service_priority;
                                        if($service_priority==1){
                                           $priority='Normal';
                                        }else if($service_priority==2){
                                             $priority='Moderate';
                                        }else if($service_priority==3){
                                             $priority='High';
                                        }else{
                                          $priority='';
                                        }
                                        ?>
                                    <tr class="gradeX">
                                        <td class="hidden-phone"><?php echo $client_code; ?></td>
                                        <td><?php echo $client_name; ?></td>
                                        <td class="hidden-phone"><?php echo $client_phone; ?></td>
                                        <td class="hidden-phone"><?php echo $area_name; ?></td>
                                        <td class="hidden-phone"><?php echo $request_date; ?></td>
                                        <td class="hidden-phone"><?php echo $service_description; ?></td>
                                        <td class="hidden-phone"><?php echo $priority; ?></td>
                                      <!--  <td>
                                            <button class="btn btn-primary btn-xs" onclick="editModal(<?=$id?>);"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="deleteModal(<?=$id?>);"><i class="fa fa-trash-o "></i></button>
                                        </td>-->
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

<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Model Confirmation</h4>
            </div>

            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('create_models/editModel');  ?>">

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Model Code *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Model Code" id="edit_model_code" name="edit_model_code">
                        </div>
                        <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Model Name *</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Enter Model Name" id="edit_model_name" name="edit_model_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Description *</label>
                        <div class="col-lg-9">
                            <textarea class="form-control"  id="edit_description" name="edit_description">Enter Description </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSuccess" class="col-sm-3 control-label col-lg-3">Status *</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="edit_status" name="edit_status"> <!-- input-sm m-bot15  -->
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
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
<!-- Modal -->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="<?=site_url('create_models/deleteModel')?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete Model Confirmation</h4>
                </div>
                <div class="modal-body">

                    Do You Want To Delete This Model?
                    <input type="hidden" id="delete_id" name="delete_id" />
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

</section>
</section>
<!--main content end-->

