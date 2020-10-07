<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
       


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Indirect  Expense
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" id="addUserForm"  role="form" method="post"  action="<?php echo site_url('indirect_expense/addIndirectExpense'); ?>" enctype="multipart/form-data">

                         
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Expense Type*</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="expense_type" name="expense_type" required> <!-- input-sm m-bot15  -->
                                        <option value="">Expense Type</option>
                                        <?php
                                        foreach ($get_indirect_expense_type_data as $row) :
                                            ?>
                                            <option value="<?= $row->id; ?>"><?= $row->type; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                   
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Amount*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="amount"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Note*</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" placeholder="Enter Note" id="note" name="note" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Date*</label>
                                <div class="col-lg-10">
                                    <input type="text" class="default-date-picker form-control" placeholder="Enter Date" id="deduct_date"  name="deduct_date" required>
                                </div>
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


