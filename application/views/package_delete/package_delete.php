<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
    

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Tour Package
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
                                        <th >Package Title </th>
                                        <th >Package Country</th>
                                     

                                        <th >Package Amount</th>
                                        <th >Package Duration </th>
                                        <th >Package Image</th>
                                       
                                        <th>Action</th>
                                     
                                    <!--  <th >Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_user_data as $rowUser) :
                                        $tour_name=$rowUser->tour_name;
                                       
                                        $country=$rowUser->country;
                                        $amount=$rowUser->amount;
                                        $package=$rowUser->package;
                                        $img=$rowUser->img;
										$user_id=$rowUser->id;

                                        ?>
                                    <tr class="gradeX">
                                        <td ><?php echo $tour_name; ?></td>
                                        <td ><?php echo $country; ?></td>
										<td><?php echo $amount; ?></td>
                                        <td><?php echo $package; ?></td>
                                        
                                        <td >
										
										<img src="public/uploads/<?php echo $img; ?>" alt="Tour Image" style="width:100px;height:100px;">
										
										</td>
                                       
                                        <td>
                                           
                                         <button class="btn btn-danger btn-xs" onclick="deleteUser(<?=$user_id?>);"><i class="fa fa-trash-o "></i></button>
                                            

                                        </td>
                                     
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

<!-- modal -->
<!-- Modal -->
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="<?=site_url('package_delete/deleteUser')?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete Package Confirmation</h4>
                </div>
                <div class="modal-body">

                    Do You Want To Delete This Tour Package?
                    <input type="hidden" id="delete_user_id" name="delete_user_id" />
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

