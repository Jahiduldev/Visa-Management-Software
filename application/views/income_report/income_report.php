<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- <div class="row">
             <div class="col-lg-12">
                 <section class="panel">
                     <header class="panel-heading">
                         Add Indirect Expense Type
                     </header>
                     <div class="panel-body">
                         <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="<?php echo site_url('indirect_expense_type/addMenu'); ?>">
                             <div class="form-group">
                                 <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Type *</label>
                                 <div class="col-lg-10">
                                     <input type="text" class="form-control" placeholder="Enter Type Name" id="type" name="type" minlength="2" required>
                                 </div>
                             </div>
 
                             <button type="submit" class="btn btn-info pull-right">Submit</button>
                         </form>
 
                     </div>
                 </section>
             </div>
         </div>-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Expense Report
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

                                        <th>Income Type</th>
                                        <th>Amount</th>
                                        <th>Note</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                     <!--  <th class="hide_coloum">Test</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($get_indirect_income_data as $row) :
                                        $id = $row->id;
                                        $income_type = $row->income_type;
                                        $amount = $row->amount;
                                        $note = $row->note;
                                        $date = $row->date;

                                        $query_1 = $this->db->query("select * from indirect_income_type where id='$income_type'");
                                        $result_1 = $query_1->result();
                                        foreach ($result_1 as $row_add):
                                            $type = $row_add->type;
                                            
                                        endforeach;
                                        ?>
                                        <tr class="gradeX">

                                            <td><?php echo $type ?></td>
                                            <td><?php echo $amount ?></td>
                                            <td><?php echo $note ?></td>
                                            <td><?php echo $date ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-xs" onclick="editMenu(<?= $id ?>);"><i class="fa fa-pencil"></i></button>                                            
                                             <!-- <button class="btn btn-danger btn-xs" onclick="deleteMenu(<?//=$id?>);"><i class="fa fa-trash-o "></i></button>-->            
                                            </td>
                                        </tr>

<?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?= site_url('add_menu/deleteMenu') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete Menu Confirmation</h4>
                        </div>
                        <div class="modal-body">

                            Do You Want To Delete This Menu?
                            <input type="hidden" id="delete_menu_id" name="delete_menu_id" />
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

        <!-- Modal -->
        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Type Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('income_report/editMenu'); ?>">
                          
                                    <div class="form-group">
                                <label for="inputSuccess" class="col-lg-3 col-sm-3 control-label">Income Type*</label>
                                <div class="col-lg-9">
                                    <select class="form-control" id="edit_income_type_name" name="edit_income_type_name" required> <!-- input-sm m-bot15  -->
                                        <option value="">Income Type</option>
                                        <?php
                                        foreach ($get_indirect_income_type_data as $row) :
                                            ?>
                                            <option value="<?= $row->id; ?>"><?= $row->type; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                   <input type="hidden" id="edit_income_type_id" name="edit_income_type_id" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Amount</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Type Name" id="edit_amount" name="edit_amount" class="form-control">
                                  
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Note</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Type Name" id="edit_note" name="edit_note" class="form-control">
                                  
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

    </section>
</section>
<!--main content end-->
