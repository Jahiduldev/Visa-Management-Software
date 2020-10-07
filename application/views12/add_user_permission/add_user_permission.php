<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add User Permission
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post"  action="<?= site_url('add_user_permission/addUserPermission');  ?>">
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Select Role *</label>
                                <div class="col-lg-10">
                                    <select class="form-control m-bot15" name="select_role">
                                    
                                        <?php
                                        foreach ($user_role_data as $row) :
                                            if($role_id==$row->role_id):
                                                ?>
                                        <option value="<?=$row->role_id; ?>" onclick="getPermission(<?=$row->role_id; ?>)" selected><?=$row->role_name; ?></option>
                                            <?php
                                            else:
                                                ?>
                                        <option value="<?=$row->role_id; ?>" onclick="getPermission(<?=$row->role_id; ?>)"><?=$row->role_name; ?></option>
                                            <?php
                                            endif;
                                            ?>

                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                            <div id="permission_data">
                                <?php
                                $queryMenu = $this->db->query("SELECT * FROM menu");
                                foreach ($queryMenu->result() as  $rowmenu):
                                    $menu_id =$rowmenu->menu_id;
                                    $querySubMenu = $this->db->query("SELECT * FROM subs_menu WHERE menu_id='$menu_id'");
                                    if($querySubMenu->num_rows()):
                                        ?>
                                <div class="form-group">
                                    <label for="inputSuccess" class="col-sm-2 control-label col-lg-2"><?php echo $rowmenu->menu_name; ?></label>
                                    <div class="col-lg-10">
                                                <?php
                                                foreach ($querySubMenu->result() as  $rowsubmenu):
                                                    $sub_menu_id = $rowsubmenu->sub_menu_id;
                                                    $sub_menu_name = $rowsubmenu->sub_menu_name;
                                                    $queryPermission = $this->db->query("SELECT * FROM permission WHERE sub_menu_id='$sub_menu_id' AND role_id='$role_id'");

                                                    if($queryPermission->num_rows()):
                                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="<?= $sub_menu_id;?>" id="sub_menu<?= $sub_menu_id;?>" name="sub_menu<?= $sub_menu_id; ?>" checked>
                                                                <?= $sub_menu_name; ?>
                                            </label>
                                        </div>
                                                    <?php
                                                    else:
                                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="<?= $sub_menu_id;?>" id="sub_menu<?= $sub_menu_id;?>" name="sub_menu<?= $sub_menu_id; ?>">
                                                                <?= $sub_menu_name; ?>
                                            </label>
                                        </div>
                                                    <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                    </div>
                                </div>
                                    <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<!--main content end-->

<script type="text/javascript">
    function getPermission(role_id){
        var role_id=role_id;
        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_user_permission/getUserPermission');  ?>",
            data: {'role_id':role_id,'action':'getPermission'} ,
            success: function(data) {
                //   alert(data);
                $('#permission_data').html(data);
            }
        });
    }
</script>
