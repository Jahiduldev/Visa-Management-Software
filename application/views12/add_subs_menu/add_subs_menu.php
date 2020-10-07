<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Sub Menu
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="SubMenuForm"  role="form" method="post"  action="<?php echo site_url('add_subs_menu/addSubsMenu');  ?>">
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Menu Name *</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="select_menu" id="select_menu"> <!-- input-sm m-bot15  -->
                                        <option value="">Select Menu</option>
                                        <?php
                                        foreach ($get_role_data as $row) :
                                            ?>
                                        <option value="<?=$row->menu_id; ?>"><?=$row->menu_name; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Sub Menu Name *</label>
                                <div class="col-lg-10">  
                                    <input type="text" class="form-control" placeholder="Enter Sub Menu Name" id="sub_menu_name" name="sub_menu_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Url *</label>
                                <div class="col-lg-10">  <input type="text" class="form-control" placeholder="Enter Url" id="url" name="url" ></div>
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
                        View Sub Menu
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
                                        <th class="hide_coloum">Sub Menu Id</th>
                                        <th class="hidden-phone">Menu Name</th>
                                        <th>Sub Menu Name</th>
                                        <th>Action</th>
                                     <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($get_sub_menu_data as $row) :
									$sub_menu_id=$row->sub_menu_id;
                                        $menu_id=$row->menu_id;
                                        $queryMenu = $this->db->query("SELECT * FROM menu WHERE menu_id='$menu_id'");
                                        foreach ($queryMenu->result() as $rowMenu) {
                                            $menu_name=$rowMenu->menu_name;
                                        }

                                        ?>
                                    <tr class="gradeX">
                                        <td class="hide_coloum"><?php echo $row->sub_menu_id ?></td>
                                        <td class="hidden-phone"><?php echo $menu_name ?></td>
                                        <td><?php echo $row->sub_menu_name ?></td>
                                        <td>
                                           
                                            <button class="btn btn-primary btn-xs" onclick="editSubMenu(<?=$sub_menu_id?>);"><i class="fa fa-pencil"></i></button>
                                         <button class="btn btn-danger btn-xs" onclick="deleteSubMenu(<?=$sub_menu_id?>);"><i class="fa fa-trash-o "></i></button>
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


<!-- Modal -->
        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Sub Menu Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('add_subs_menu/editSubMenu');  ?>">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Sub Menu Name</label>
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
		 <!-- Modal -->
        <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?=site_url('add_subs_menu/deleteSubMenu')?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete Menu Confirmation</h4>
                        </div>
                        <div class="modal-body">

                            Do You Want To Delete This  Sub Menu?
                            <input type="hidden" id="delete_sub_menu_id" name="delete_sub_menu_id" />
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
