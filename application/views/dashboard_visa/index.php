<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--state overview start-->
        <div class="border-head">
            <h3><B>Passport Receive</B></h3>
        </div>
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                 <a href="view_customer">
                <section class="panel">

                        <div class="symbol blue" >
                            <i class="fa fa-tags" ></i>
                        </div>
                        <div class="value">
                            <h1 class="">

                            </h1>
                            <p><B>View All</B></p>
                            <?php
                            $this->db->from('passport_makings');
                            $query = $this->db->get();
                            $rowcount = $query->num_rows();
                            ?>
                            <p><B style="color:blue;"><h4><?=$rowcount?></h4></B><a/></p>
                        </div>
                </section>
                </a>
            </div>
            <!--<div class="col-lg-3 col-sm-6">
                 <a href="create_zones">
                <section class="panel">

                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>CREATE ZONES</B></p>
                        <?php
                        $this->db->from('base_areas');
                        $query = $this->db->get();
                        $rowcount = $query->num_rows();
                        ?>

                        <p><B style="color:blue;"><h4><?=$rowcount?></h4></B><a/></p>
                    </div>
                </section>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                  <a href="add_employee">
                <section class="panel">

                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>ADD EMPLOYEE</B></p>
                        <?php
                        $this->db->from('base_employees');
                        $query = $this->db->get();
                        $rowcount = $query->num_rows();
                        ?>

                        <p><B style="color:blue;"><h4><?=$rowcount?></h4></B><a/></p>
                    </div>
                </section>
                </a>
            </div>
            <!-- <div class="col-lg-3 col-sm-6">
                 <section class="panel">
                     <div class="symbol blue">
                         <i class="fa fa-bar-chart-o"></i>
                     </div>
                     <div class="value">
                         <h1 class=" count4">
                             0
                         </h1>
                         <p>Total Profit</p>
                     </div>
                 </section>
             </div>-->
        </div>

       <!-- <div class="border-head">
            <h3><B>Customer Manipulation</B></h3>
        </div>
       <!-- <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                 <a href="add_customer">
                <section class="panel">

                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class="">

                        </h1>
                        <p><B>ADD CUSTOMER</B></p>
                        <?php
                        $this->db->from('base_clients');
                        $query = $this->db->get();
                        $rowcount = $query->num_rows();
                        ?>

                        <p><B style="color:blue;"><h4><?=$rowcount?></h4></B><a/></p>
                    </div>
                </section>
                     </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="add_service">
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-tags"></i>
                        </div>
                        <div class="value">
                            <h1 class=" ">

                            </h1>
                            <p><B>ADD SERVICE</B></p>
                            <?php
                            $this->db->where('service_status',0);
                            $this->db->from('base_service_custom');
                            $query = $this->db->get();
                            $rowcount = $query->num_rows();
                            ?>

                            <p><B style="color:blue;"><h4><?=$rowcount?></h4></B><a/></p>
                        </div>
                    </section>
                    </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                 <a href="add_completed_service">
                <section class="panel">

                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>ADD COMPLETED SERVICE</B></p>
                        <?php
                        $this->db->where('service_status',1);
                        $this->db->from('base_service_custom');
                        $query = $this->db->get();
                        $rowcount = $query->num_rows();
                        ?>

                        <p><B style="color:blue;"><h4><?=$rowcount?></h4></B></p>

                    </div>
                </section>
                     </a>
            </div>
            <!-- <div class="col-lg-3 col-sm-6">
                 <section class="panel">
                     <div class="symbol blue">
                         <i class="fa fa-bar-chart-o"></i>
                     </div>
                     <div class="value">
                         <h1 class=" count4">
                             0
                         </h1>
                         <p>Total Profit</p>
                     </div>
                 </section>
             </div>-->
        </div>
        <!--<div class="border-head">
            <h3><B>View All Activity</B></h3>
        </div>
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <a href="view_customer">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class="">

                        </h1>
                        <p><B>VIEW CUSTOMER</B><a/></p>

                        <?php
                        $this->db->from('base_clients');
                        $query = $this->db->get();
                        $rowcount = $query->num_rows();
                        ?>

                        <p><B style="color:blue;"><h4><?=$rowcount?></h4></B><a/></p>
                    </div>
                </section>
                    </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="view_service">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>VIEW SERVICE</B><a/></p>

                        <?php
                            $this->db->where('service_status',0);
                            $this->db->from('base_service_custom');
                            $query = $this->db->get();
                            $rowcount = $query->num_rows();
                            ?>

                            <p><B style="color:blue;"><h4><?=$rowcount?></h4></B><a/></p>
                    </div>
                </section>
                    </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="view_complete_service">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>VIEW COMPLETED SERVICE</B></p>

                       <?php
                        $this->db->where('service_status',1);
                        $this->db->from('base_service_custom');
                        $query = $this->db->get();
                        $rowcount = $query->num_rows();
                        ?>

                        <p><B style="color:blue;"><h4><?=$rowcount?></h4></B></p>

                    </div>
                </section>
                    </a>
            </div>
            <!-- <div class="col-lg-3 col-sm-6">
                 <section class="panel">
                     <div class="symbol blue">
                         <i class="fa fa-bar-chart-o"></i>
                     </div>
                     <div class="value">
                         <h1 class=" count4">
                             0
                         </h1>
                         <p>Total Profit</p>
                     </div>
                 </section>
             </div>-->
        </div>

       <!-- <div class="border-head">
            <h3><B>Reports</B></h3>
        </div>
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class="">

                        </h1>
                        <p><B>SEARCH BY ZONE</B></p>
                        <p><B style="color:blue;"></B><a/></p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>SEARCH BY DATE RANGE</B></p>
                        <p><B style="color:blue;"></B><a/></p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>GENERAL SERVICE REPORT</B></p>
                        <p><B style="color:blue;"></B><a/></p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class=" ">

                        </h1>
                        <p><B>REQUESTED SERVICE REPORTS</B></p>
                        <p><B style="color:blue;"></B><a/></p>
                    </div>
                </section>
            </div>
        </div>

        <div class="border-head">
            <h3><B>Newsletter Campaign</B></h3>
        </div>
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="value">
                        <h1 class="">

                        </h1>
                        <p><B>SEND NEWSLETTER</B></p>
                        <p><B style="color:blue;"></B><a/></p>
                    </div>
                </section>
            </div>



        </div>-->
        <!--state overview end-->

        <!-- <div class="row">
             <div class="col-lg-8">

                 <div class="border-head">
                     <h3>Earning Graph</h3>
                 </div>
                 <div class="custom-bar-chart">
                     <ul class="y-axis">
                         <li><span>100</span></li>
                         <li><span>80</span></li>
                         <li><span>60</span></li>
                         <li><span>40</span></li>
                         <li><span>20</span></li>
                         <li><span>0</span></li>
                     </ul>
                     <div class="bar">
                         <div class="title">JAN</div>
                         <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">FEB</div>
                         <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">MAR</div>
                         <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">APR</div>
                         <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                     </div>
                     <div class="bar">
                         <div class="title">MAY</div>
                         <div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">JUN</div>
                         <div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
                     </div>
                     <div class="bar">
                         <div class="title">JUL</div>
                         <div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">AUG</div>
                         <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">SEP</div>
                         <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">OCT</div>
                         <div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">NOV</div>
                         <div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
                     </div>
                     <div class="bar ">
                         <div class="title">DEC</div>
                         <div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
                     </div>
                 </div>

             </div>
             <div class="col-lg-4">

                 <div class="panel terques-chart">
                     <div class="panel-body chart-texture">
                         <div class="chart">
                             <div class="heading">
                                 <span>Friday</span>
                                 <strong>$ 57,00 | 15%</strong>
                             </div>
                             <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                         </div>
                     </div>
                     <div class="chart-tittle">
                         <span class="title">New Earning</span>
                         <span class="value">
                             <a href="#" class="active">Market</a>
                             |
                             <a href="#">Referal</a>
                             |
                             <a href="#">Online</a>
                         </span>
                     </div>
                 </div>



                 <div class="panel green-chart">
                     <div class="panel-body">
                         <div class="chart">
                             <div class="heading">
                                 <span>June</span>
                                 <strong>23 Days | 65%</strong>
                             </div>
                             <div id="barchart"></div>
                         </div>
                     </div>
                     <div class="chart-tittle">
                         <span class="title">Total Earning</span>
                         <span class="value">$, 76,54,678</span>
                     </div>
                 </div>

             </div>
         </div>-->


    </section>
</section>
<!--main content end-->