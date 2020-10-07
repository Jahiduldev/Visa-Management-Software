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
                        Details Report Advance Search
                    </header>
                    <div class="panel-body">
                        <form class="cmxform form-horizontal tasi-form" target="_blank"  id="addCustomerForm"  role="form" method="post"  action="<?php echo site_url('detail_report_advance_search/print_page');  ?>">
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

<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Sponsor Name</th>
                                       
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Enjaz</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue"  >Okala</th>
                                        
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Fitcard</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Embasy</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Fingering</th>
                                        
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Gender</th>  

<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100px;color:blue" >Passport Site</th>                                      
                                        
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
                                        <th rowspan="1" colspan="1"><input placeholder="Sponsor Name" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Gender" type="text"></th>
                                        <th rowspan="1" colspan="1"><input placeholder="Passport Site" type="text"></th>
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
                                        
                                        $enzaz_mufa_number= $row->enzaz_mufa_number;
                                         if($enzaz_mufa_number=="" || $enzaz_mufa_number==NULL) {
                                $val2 = "<p style='color:red;'>Incomplete</p>";
                            }
                            else {
                                $val2 = "<p style='color:green;'>Complete</p>";
                            }
                                        
                                        
                                  $okala_status= $row->okala_status;
                                  if($okala_status=="Receive") {
                                $val4 = "<p style='color:green;'>Complete</p>";
                            }
                            else {
                                $val4 = "<p style='color:red;'>Incomplete</p>";
                            }
                            
                            
                             $fit_receive_receive_date= $row->fit_receive_receive_date;
                             if($fit_receive_receive_date=="" || $fit_receive_receive_date==NULL) {
                                $val6 = "<p style='color:red;'>Incomplete</p>";
                            }
                            else {
                                $val6 = "<p style='color:green;'>Complete</p>";
                            }
                            
                            
                            $embassy_visa_stamping_status= $row->embassy_visa_stamping_status;
                             if($embassy_visa_stamping_status !='Complete' || $embassy_visa_stamping_status==NULL) {
                                $val8 = "<p style='color:red;'>Incomplete</p>";
                            }
                            else {
                                $val8 = "<p style='color:green;'>Complete</p>";
                            }
                            
                            
                             $basic_fingering= $row->basic_fingering;
                             if($val9=="Receive") {
                                $val10 = "<p style='color:green;'>Complete</p>";

                            }
                            else {
                                $val10 = "<p style='color:red;'>Incomplete</p>";
                            }
                                        
                                        
                                        ?>

                                    <tr role="row" class="odd">
                                        <td><input type="checkbox" id="chk<?=$id?>" name="chk<?=$id?>" value="<?=$id?>"></td>
                                        <td><?=$name?></td>
                                        <td><?=$passport_no?></td>
                                        <td><?=$basic_id_number?></td>
                                        <td><?=$basic_visa_number?></td>
                                        <td><?=$reference_name?></td>
                                        <td><?=$broker_name?></td>
                                        <td><?=$okala_sponsor_name?></td>
                                        <td><?=$val2?></td>
                                        <td><?=$val4?></td>
                                        
                                        <td><?=$val6?></td>
                                        <td><?=$val8?></td>
                                        <td><?=$val10?></td>
                                        <td><?=$basic_passport_type?></td>
                                        <td><?=$basic_receive_site?></td>
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

