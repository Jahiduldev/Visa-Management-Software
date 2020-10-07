<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php

                    $role_id=  $this->session->userdata('role_id');
                    if($role_id==3):
                        $display= "style='display:none;'";
                    else:
                        $display= "";
                    endif;
                    ?>
                    <header class="panel-heading">
                        Credit Management Report

                    </header>
                    <?php
                    $date = date('Y-m-d');
                    $date_str = $date;
                    $date_end = $date;

                    ?>
                    <div class="panel-body">
                        <form role="form" class="cmxform form-horizontal tasi-form" method="post"  id="RoleForm" action="<?php echo site_url('shop_wise_report/getReport');  ?>">

                            <div class="form-group" <?=$display;?>>
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">User</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="user" name="user"> <!-- input-sm m-bot15  -->
                                        <option value="all">All</option>
                                        <?php
                                        foreach ($get_user_data as $row) :
                                            if($select_user==$row->user_id):
                                                    ?>
                                        <option value="<?=$row->user_id; ?>" selected><?=$row->user_name; ?></option>
                                        <?php
                                        else:
                                            ?>
                                          <option value="<?=$row->user_id; ?>"><?=$row->user_name; ?></option>
                                        <?php

                                                endif;
                                            ?>
                                      
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">From Date</label>
                                <div class="col-lg-4">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter From Date" id="date_from"  name="date_from" value="<?php
                                    echo $date_from;
                                           ?>">
                                </div>
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">To Date</label>
                                <div class="col-lg-4">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter To Date" id="date_to"  name="date_to" value="<?php


                                    echo $date_to;
                                           ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </form>

                    </div>
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Credit Management Report
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
                                        <th>User Name</th>
                                        <th >Amount</th>
                                        <th class="hidden-phone">Join Date</th>
                                        <th class="hidden-phone">Date Time</th>



<!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $date = date('Y-m-d');
                                    if($select_user=='all'):
                                        $query_str="select * from user";
                                    else:
                                        $query_str="select * from user where user_id='$select_user'";
                                    endif;
                                    $query_emp=$this->db->query($query_str);
                                    $result_emp=$query_emp->result();
                                    if(count($result_emp)>0):
                                        foreach($result_emp as $rowemp):
                                            $emp_id=$rowemp->user_id;
                                            $query_emp_att=$this->db->query("select `c`.`id`,`u`.`user_name`,`c`.`amount`,`c`.`joining_date`,`c`.`date_time`  from `credit_management` as `c` join `user` as `u` on `c`.`user_id`=`u`.`user_id` where `c`.`user_id`='$emp_id' and (`c`.`date_time` between '$date_from' and '$date_to')");
                                            $result_emp_att=$query_emp_att->result();
                                            if(count($result_emp_att)>0):
                                                foreach($result_emp_att as $rowempatt):
                                                    $id=$rowempatt->id;
                                                    $user_name=$rowempatt->user_name;
                                                    $amount=$rowempatt->amount;
                                                    $joining_date=$rowempatt->joining_date;
                                                    $date_time=$rowempatt->date_time;
                                                    ?>

                                    <tr class="gradeX">
                                        <td><?php echo  $user_name;  ?></td>

                                        <td ><?php echo$amount;  ?></td>

                                        <td class="hidden-phone"><?php echo  $joining_date;  ?></td>
                                        <td class="hidden-phone"><?php echo  $date_time;  ?></td>

                                    </tr>

                                                <?php

                                                endforeach;
                                            endif;
                                        endforeach;
                                    endif;  ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Attendance Picture</h4>
            </div>
            <div class="modal-body">

                <img id="pro_img" width=100%;height=auto; />

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <!-- <button class="btn btn-success" type="button">Submit</button>-->
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!--main content end-->
<script type="text/javascript">
    function getEmployee(shop_id){
        var shop_id=shop_id;
        $.ajax({
            type: "Post",
            url: "<?php echo site_url('shop_wise_report/getEmployee');  ?>",
            data: {'shop_id':shop_id} ,
            success: function(data) {
                //alert(data);
                $('#select_employee').html(data);
            }
        });
    }

    function showImg(img_name){
        var url="<?php echo  $base_url."/public/uploads/attendance/";  ?>"+img_name;

        $("#pro_img").attr("src",url);
        $("#myModal").modal();
    }
</script>