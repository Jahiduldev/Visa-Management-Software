<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Salary Process
                    </header>
                    <div class="panel-body">
                        <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="">
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">From *</label>
                                <div class="col-lg-4">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter From" id="date_from"  name="date_from" value="<?php
                                    if (isset($date_from)) {
                                        echo $date_from;
                                    } else {
                                        echo date('Y-m-d');
                                    }
                                    ?>" required>
                                </div>
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">To *</label>
                                <div class="col-lg-4">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter To" id="date_to"  name="date_to" value="<?php
                                    if (isset($date_to)) {
                                        echo $date_to;
                                    } else {
                                        echo date('Y-m-d');
                                    }
                                    ?>" required>
                                </div>

                            </div>

                            <button type="submit"  onclick="submitForm('<?php echo site_url('salary_process/salarySave'); ?>')" class="btn btn-primary pull-right col-lg-offset-1">Save</button>
                            <button type="submit"  onclick="submitForm('<?php echo site_url('salary_process/salaryProcess'); ?>')" class="btn btn-info pull-right ">Process</button>

                        </form>

                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        View Salary Process
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

                                        <th>Employee Id</th>
                                        <th>Employee Name</th>
                                        <th>Gross Salary</th>
                                        <th>Salary Add </th>
                                        <th>Salary deduct</th>
                                        <th>Net Payable Salary</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($get_employee_data as $row) :
                                        $id = $row->id;
                                        $emp_id = $row->emp_id;
                                        $emp_name = $row->emp_name;
                                        $gross_salary = $row->gross_salary;


                                        $salary_add = 0;
                                        $query_salary_add = $this->db->query("select sum(amount) as sum_amount from employee_salary_add where emp_id='$id' and (`date` between '$date_from' and '$date_to')");
                                        $result_salary_add = $query_salary_add->result();
                                        foreach ($result_salary_add as $row_add):
                                            $salary_add = $row_add->sum_amount;
                                        endforeach;


                                        $salary_deduct = 0;
                                        $query_salary_deduct = $this->db->query("select sum(amount) as sum_amount from employee_salary_deduct where emp_id='$id' and (`date` between '$date_from' and '$date_to')");
                                        $result_salary_deduct = $query_salary_deduct->result();
                                        foreach ($result_salary_deduct as $row_deduct):
                                            $salary_deduct = $row_deduct->sum_amount;
                                        endforeach;

                                        $payable = ($gross_salary + $salary_add) - $salary_deduct;
                                        ?>
                                        <tr>

                                            <td><?php echo $emp_id ?></td>
                                            <td><?php echo $emp_name ?></td>
                                            <td><?php echo $gross_salary ?></td>
                                            <td><?php echo $salary_add ?></td>
                                            <td><?php echo $salary_deduct ?></td>
                                            <td><?php echo $payable ?></td>

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
                        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('salary_add_type/editMenu'); ?>">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Type</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Type Name" id="edit_type_name" name="edit_type_name" class="form-control">
                                    <input type="hidden" id="edit_type_id" name="edit_type_id" />
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
