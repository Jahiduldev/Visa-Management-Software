<!--main content start-->
<style type="text/css">
tfoot {
    display: table-header-group;
}
</style>
<section id="main-content">
    <section class="wrapper site-min-height">


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        View All Advance Search
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" target="_blank" id="addCustomerForm"  role="form" method="post"  action="<?php echo site_url('view_advance_search/print_page');  ?>">
                         <div class="form-group">
                                        <button type="submit" class="btn btn-info pull-right" style="margin-right: 15px;">Print</button>
                                    </div>
                            
                        <div class="adv-table">
                            <table id="example" class="display dataTable" role="grid" aria-describedby="example_info" style="width: 100%;" width="100%" cellspacing="0">


                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 111px;color:blue" aria-sort="ascending" >All<br><input type="checkbox" name="chkall" id="chkall" ></th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 50px;color:blue" >Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >PASSPORT NO.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue"  >ID NO.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >VISA NO.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >REFERENCE NAME</th>

                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 50px;color:blue" >Broker Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Broker Mobile Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue"  >Reference Mobile Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Sponsor Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Passport Site</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Note</th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Action</th>
                                    </tr>

                                </thead>

                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1"><input placeholder="Sl" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Name" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="PASSPORT NO." type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="ID NO." type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="VISA NO." type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="REFERENCE NAME" type="text"></th>

                                        <th rowspan="1" colspan="1"><input placeholder="Broker Name" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Broker Mobile Number" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Reference Mobile Number" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Sponsor Name" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Gender" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Passport Site" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Note" type="text"></th>
										 <th rowspan="1" colspan="1"><input placeholder="Action" type="text"></th>
										 
                                    </tr>
                                </tfoot>
                                

                                <tbody>

                                    <?php
                                    foreach($passport_makings_data as $row):
                                        $id= $row->id;
                                        $name= $row->name;
                                        $passport_no= $row->passport_no;
                                        $basic_id_number= $row->basic_id_number;
                                        $basic_visa_number= $row->basic_visa_number;
                                        $reference_name= $row->reference_name;

                                        $broker_name= $row->broker_name;
                                        $broker_mobile_number= $row->broker_mobile_number;
                                        $reference_mobile_number= $row->reference_mobile_number;
                                        $okala_sponsor_name= $row->okala_sponsor_name;
                                        $basic_passport_type= $row->basic_passport_type;
                                        $basic_receive_site= $row->basic_receive_site;
                                        $basic_note= $row->basic_note;
                                        ?>

                                    <tr role="row" class="odd">
                                        <td><input type="checkbox" id="chk<?=$id?>" name="chk<?=$id?>" value="<?=$id?>"></td>
                                        <td><?=$name?></td>
                                        <td><?=$passport_no?></td>
                                        <td><?=$basic_id_number?></td>
                                        <td><?=$basic_visa_number?></td>
                                        <td><?=$reference_name?></td>

                                        <td><?=$broker_name?></td>
                                        <td><?=$broker_mobile_number?></td>
                                        <td><?=$reference_mobile_number?></td>
                                        <td><?=$okala_sponsor_name?></td>
                                        <td><?=$basic_passport_type?></td>
                                        <td><?=$basic_receive_site?></td>
                                        <td><?=$basic_note?></td>
										
										<td><a href="<?php echo site_url('view_customer/getDataByIdNewEdit/'. $id); ?>" target="_blank"><button class="btn btn-success" type="button">Edit</button></a>
										 <a href="<?php echo site_url('view_customer/getDataById/'. $id); ?>" target="_blank"> <button class="btn btn-info btn-xs" type="button" ><i class="fa fa-pencil">View</i></button> </a>
										</td>
									

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
</form>
                    </div>
                </section>
            </div>
        </div>




    </section>
</section>
<!--main content end-->






<!-- modal -->

