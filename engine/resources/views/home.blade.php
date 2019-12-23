@extends('layouts.admint')

@section('content')
<div class="tb-content tb-style1">
    <div class="tb-height-b30 tb-height-lg-b30"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="tb-sectin-heading tb-style1">
                    <div class="tb-sectin-heading-left">
                        <h2 class="tb-section-title">Dashboard</h2>
                    </div>
                </div>
                <div class="tb-height-b10 tb-height-lg-b10"></div>
                <hr />
            </div>
        </div>
        <div class="tb-height-b30 tb-height-lg-b30"></div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-icon tb-icon-color1 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">supervisor_account</i>
                            </div>
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">10k</h3>
                                <div class="tb-iconbox-sub-heading">Users</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                <div class="tb-progress-lavel tb-style1 tb-success-color">
                                    <i class="material-icons-outlined">arrow_drop_up</i>5.5%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-icon tb-icon-color2 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">store</i>
                            </div>
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">6.2k</h3>
                                <div class="tb-iconbox-sub-heading">Revenue</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                <div class="tb-progress-lavel tb-style1 tb-style1 tb-success-color">
                                    <i class="material-icons-outlined">arrow_drop_up</i>5.5%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-icon tb-icon-color3 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">flag</i>
                            </div>
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">0.4</h3>
                                <div class="tb-iconbox-sub-heading">Conversion Rate</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                <div class="tb-progress-lavel tb-style1 tb-danger-color">
                                    <i class="material-icons-outlined">arrow_drop_down</i>5.5%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="tb-card tb-style1 text-center">
                    <div class="tb-card-body">
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                        <div class="tb-iconbox tb-style1">
                            <div class="tb-icon tb-icon-color4 tb-radious50 tb-flex">
                                <i class="material-icons-outlined">cloud</i>
                            </div>
                            <div class="tb-iconbox-text">
                                <h3 class="tb-iconbox-heading">16k</h3>
                                <div class="tb-iconbox-sub-heading">Sessions</div>
                                <div class="tb-height-b25 tb-height-lg-b25"></div>
                                <hr />
                                <div class="tb-progress-lavel tb-style1 tb-success-color">
                                    <i class="material-icons-outlined">arrow_drop_up</i>5.5%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
        </div>
        <div class="tb-height-b30 tb-height-lg-b30"></div>
        <div class="row">
            <div class="col-lg-9">
                <div class="tb-card tb-style1">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Overview</h2>
                        </div>
                        <div class="tb-card-heading-right">
                            <div class="tb-card-heading-right">
                                <div class="tb-custom-select-wrap tb-style1">
                                    <select name="#" class="tb-custom-select">
                                        <option value="classic-fit1">Last 7 days</option>
                                        <option value="classic-fit2">Last 30 days</option>
                                        <option value="classic-fit3">Last 3 Month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-fade-tabs tb-tabs tb-style1">
                            <ul class="tb-tab-links">
                                <li class="tb-active">
                                    <a href="#tab1">
                                        <span class="tb-tab-sub-heading">TOTAL USERS</span>
                                        <span class="tb-tab-heading">10k</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2">
                                        <span class="tb-tab-sub-heading">TOTAL USERS</span>
                                        <span class="tb-tab-heading">6.2k</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3">
                                        <span class="tb-tab-sub-heading">TOTAL USERS</span>
                                        <span class="tb-tab-heading">0.4k</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4">
                                        <span class="tb-tab-sub-heading">TOTAL USERS</span>
                                        <span class="tb-tab-heading">16k</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tb-tab-content">
                                <div id="tab1" class="tb-tab tb-active">
                                    <div class="tb-chart-wrap tb-style1">
                                        <div class="tb-chart-in">
                                            <canvas id="tb-chart1-type1"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab2" class="tb-tab">
                                    <div class="tb-chart-wrap tb-style1">
                                        <div class="tb-chart-in">
                                            <canvas id="tb-chart1-type2"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab3" class="tb-tab">
                                    <div class="tb-chart-wrap tb-style1">
                                        <div class="tb-chart-in">
                                            <canvas id="tb-chart1-type3"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab4" class="tb-tab">
                                    <div class="tb-chart-wrap tb-style1">
                                        <div class="tb-chart-in">
                                            <canvas id="tb-chart1-type4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-3">
                <div class="tb-card tb-style1">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Active Users</h2>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-view-card">
                            <div class="tb-padd-lr-30">
                                <div class="tb-height-b15 tb-height-lg-b15"></div>
                                <div class="tb-chart-heading tb-style1">
                                    <div class="tb-chart-heading-in">
                                        <h3>12</h3>
                                        <p>Page views per minute</p>
                                    </div>
                                </div>
                                <div class="tb-height-b15 tb-height-lg-b15"></div>
                                <hr />
                                <div class="tb-height-b20 tb-height-lg-b20"></div>
                                <div class="tb-chart-wrap tb-style2">
                                    <div class="tb-chart-in">
                                        <canvas id="tb-chart2-type1" height="96"></canvas>
                                    </div>
                                </div>
                                <div class="tb-height-b20 tb-height-lg-b20"></div>
                                <div class="tb-table tb-style2 table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Active Page</th>
                                                <th>Users</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>/demo/hotelluxe/</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>/demo/photosy/</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>/demo/magplus/</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>/demo/blogit/</td>
                                                <td>2</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- .tb-table -->
                            </div>
                            <div class="tb-height-b20 tb-height-lg-b20"></div>
                            <hr />
                            <a href="#" class="tb-btn tb-style2">REAL-TIME REPORT
                                <i class="material-icons-outlined">navigate_next</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-4">
                <div class="tb-card tb-style1 tb-height-100p">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Sessions by Country</h2>
                        </div>
                        <div class="tb-card-heading-right">
                            <a href="#" class="tb-btn tb-style1 tb-small">View All</a>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-graph">
                            <div class="tb-height-b20 tb-height-lg-b20"></div>
                            <div class="tb-svg-map tb-style1 tb-padding-lr30">
                                <div id="svg-usa" class="vmap-wrapper"></div>
                            </div>
                            <div class="tb-height-b20 tb-height-lg-b20"></div>
                        </div>
                        <div class="tb-progressbar-wrap tb-style1 tb-padding-lr30">
                            <div class="tb-single-progress">
                                <div class="tb-progress-heading">
                                    <h2 class="tb-progress-title">New York</h2>
                                    <div class="tb-progress-percentage"></div>
                                </div>
                                <div class="tb-progressbar" data-progress-percentage="30">
                                    <div class="tb-progressbar-in"></div>
                                </div>
                            </div>
                            <!-- .tb-single-progress -->
                            <div class="tb-single-progress">
                                <div class="tb-progress-heading">
                                    <h2 class="tb-progress-title">Texas</h2>
                                    <div class="tb-progress-percentage"></div>
                                </div>
                                <div class="tb-progressbar" data-progress-percentage="100">
                                    <div class="tb-progressbar-in"></div>
                                </div>
                            </div>
                            <!-- .tb-single-progress -->
                            <div class="tb-single-progress">
                                <div class="tb-progress-heading">
                                    <h2 class="tb-progress-title">South Dakota</h2>
                                    <div class="tb-progress-percentage"></div>
                                </div>
                                <div class="tb-progressbar" data-progress-percentage="60">
                                    <div class="tb-progressbar-in"></div>
                                </div>
                            </div>
                            <!-- .tb-single-progress -->
                            <div class="tb-single-progress">
                                <div class="tb-progress-heading">
                                    <h2 class="tb-progress-title">Washington</h2>
                                    <div class="tb-progress-percentage"></div>
                                </div>
                                <div class="tb-progressbar" data-progress-percentage="40">
                                    <div class="tb-progressbar-in"></div>
                                </div>
                            </div>
                            <!-- .tb-single-progress -->
                        </div>
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-8">
                <div class="tb-card tb-style1">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Top-selling Products</h2>
                        </div>
                        <div class="tb-card-heading-right">
                            <a href="#" class="tb-btn tb-style1 tb-small">View All</a>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-table tb-style1 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Item Type</th>
                                        <th>Item Sales</th>
                                        <th>Earnings</th>
                                        <th>Conversion Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon1.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon2.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon3.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon4.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon5.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon6.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon7.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="tb-table-icon-box">
                                                <img src="assets/img/icon/icon8.png" alt="icon" class="tb-table-icon" />
                                                <span class="tb-table-icon-text">MagPlus WordPress Theme</span>
                                            </div>
                                        </td>
                                        <td>WordPress</td>
                                        <td>24</td>
                                        <td>$1230</td>
                                        <td>4%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- .tb-table -->
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-4">
                <div class="tb-card tb-style1 tb-height-100p">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Ad Performance</h2>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-padding-lr30">
                            <div class="tb-height-b15 tb-height-lg-b15"></div>
                            <div class="tb-chart-heading tb-style2">
                                <div class="tb-chart-heading-in">
                                    <p>CLICKS</p>
                                    <h3>234</h3>
                                </div>
                                <div class="tb-chart-heading-in">
                                    <p>ORDERS</p>
                                    <h3>32</h3>
                                </div>
                            </div>
                            <div class="tb-height-b20 tb-height-lg-b20"></div>
                            <div class="tb-chart-wrap tb-style5">
                                <div class="tb-chart-in">
                                    <canvas id="tb-chart5"></canvas>
                                </div>
                                <div class="tb-height-b20 tb-height-lg-b20"></div>
                                <ul class="tb-line-stroke tb-style1 tb-type1 tb-mp0">
                                    <li>
                                        <span class="tb-stroke-circle tb-opacity1"></span>Clicks
                                    </li>
                                    <li>
                                        <span class="tb-stroke-circle tb-opacity5"></span>Orders
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tb-height-b25 tb-height-lg-b25"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-4">
                <div class="tb-card tb-style1 tb-height-100p">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Sessions by Device</h2>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-chart-wrap tb-style3">
                            <div class="tb-chart-inside">
                                <div class="tb-chart-in">
                                    <canvas id="tb-chart3" height="220" width="220"></canvas>
                                </div>
                                <div class="tb-active-device">
                                    <div class="tb-active-device-per">60 <span>%</span></div>
                                    <div class="tb-active-device-title">Desktop Views</div>
                                </div>
                            </div>
                            <div class="tb-height-b15 tb-height-lg-b15"></div>
                            <ul class="tb-circle-stroke tb-style1">
                                <li>
                                    <span class="tb-circle-color" data-bulet-color="#ffcc00"></span>
                                    <span class="tb-circle-label">Desktop</span>
                                </li>
                                <li>
                                    <span class="tb-circle-color" data-bulet-color="#ff9500"></span>
                                    <span class="tb-circle-label">Mobile</span>
                                </li>
                                <li>
                                    <span class="tb-circle-color" data-bulet-color="#ff3b30"></span>
                                    <span class="tb-circle-label">Tablet</span>
                                </li>
                                <li>
                                    <span class="tb-circle-color" data-bulet-color="#5856d6"></span>
                                    <span class="tb-circle-label">Miscellaneous</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-4">
                <div class="tb-card tb-style1 tb-height-100p">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Active Users</h2>
                        </div>
                        <div class="tb-card-heading-right">
                            <div class="tb-card-heading-right">
                                <div class="tb-custom-select-wrap tb-style1">
                                    <select name="#" class="tb-custom-select">
                                        <option value="classic-fit1">Last 7 days</option>
                                        <option value="classic-fit2">Last 30 days</option>
                                        <option value="classic-fit3">Last 3 Month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tb-card-body tb-padding-lr30">
                        <div class="tb-height-b20 tb-height-lg-b20"></div>
                        <div class="tb-chart-wrap tb-style6">
                            <div class="tb-chart-in">
                                <canvas id="tb-chart6"></canvas>
                            </div>
                            <div class="tb-height-b20 tb-height-lg-b20"></div>
                            <ul class="tb-line-stroke tb-style1 tb-type1 tb-mp0">
                                <li>
                                    <span class="tb-stroke-circle tb-opacity1"></span>Daily
                                </li>
                                <li>
                                    <span class="tb-stroke-circle tb-opacity7"></span>Weekly
                                </li>
                                <li>
                                    <span class="tb-stroke-circle tb-opacity4"></span>Monthly
                                </li>
                            </ul>
                        </div>
                        <div class="tb-height-b30 tb-height-lg-b30"></div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-9">
                <div class="tb-card tb-style1">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Acquisition</h2>
                        </div>
                        <div class="tb-card-heading-right">
                            <div class="tb-card-heading-right">
                                <div class="tb-card-heading-right">
                                    <div class="tb-custom-select-wrap tb-style1">
                                        <select name="#" class="tb-custom-select">
                                            <option value="classic-fit1">Last 7 days</option>
                                            <option value="classic-fit2">Last 30 days</option>
                                            <option value="classic-fit3">Last 3 Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-fade-tabs tb-tabs tb-style1 tb-type1">
                            <ul class="tb-tab-links">
                                <li class="tb-active">
                                    <a href="#tab11">
                                        <span class="tb-tab-heading">Acquisition</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab22">
                                        <span class="tb-tab-heading">Source/Medium</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab33">
                                        <span class="tb-tab-heading">Referrals</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tb-tab-content">
                                <div id="tab11" class="tb-tab tb-active">
                                    <div class="tb-chart-wrap tb-style4">
                                        <div class="tb-vertical-chart-wrap">
                                            <div class="tb-vertical-chart-list">
                                                <div class="tb-vertical-chart-graph">
                                                    <div class="tb-graph-col">30k</div>
                                                    <div class="tb-graph-col">25k</div>
                                                    <div class="tb-graph-col">20k</div>
                                                    <div class="tb-graph-col">15k</div>
                                                    <div class="tb-graph-col">10k</div>
                                                    <div class="tb-graph-col">8k</div>
                                                </div>
                                                <div class="tb-vertical-chart">
                                                    <div class="tb-vertical-chart-up" data-chart-up="85"
                                                        data-chart-label="Jan">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="15" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="25" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="70"
                                                        data-chart-label="Feb">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="85"
                                                        data-chart-label="Mar">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="75"
                                                        data-chart-label="Apr">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="90"
                                                        data-chart-label="May">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="80"
                                                        data-chart-label="Jun">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="15" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="15" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="95"
                                                        data-chart-label="Jul">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="80"
                                                        data-chart-label="Aug">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="100"
                                                        data-chart-label="Sep">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="20" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="20" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="70"
                                                        data-chart-label="Oct">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="60"
                                                        data-chart-label="Nov">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="90"
                                                        data-chart-label="Dec">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                </div><!-- .tb-vertical-chart -->
                                            </div>
                                            <ul class="tb-vertical-chart-stroke">
                                                <li data-cl-opacity="1"><span></span>Referral</li>
                                                <li data-cl-opacity="0.8"><span></span>Direct</li>
                                                <li data-cl-opacity="0.6"><span></span>Organic Search</li>
                                                <li data-cl-opacity="0.4"><span></span>Affiliates</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .tb-tab -->
                                <div id="tab22" class="tb-tab">
                                    <div class="tb-chart-wrap tb-style4">
                                        <div class="tb-vertical-chart-wrap">
                                            <div class="tb-vertical-chart-list">
                                                <div class="tb-vertical-chart-graph">
                                                    <div class="tb-graph-col">30k</div>
                                                    <div class="tb-graph-col">25k</div>
                                                    <div class="tb-graph-col">20k</div>
                                                    <div class="tb-graph-col">15k</div>
                                                    <div class="tb-graph-col">10k</div>
                                                    <div class="tb-graph-col">8k</div>
                                                </div>
                                                <div class="tb-vertical-chart">
                                                    <div class="tb-vertical-chart-up" data-chart-up="75"
                                                        data-chart-label="Jan">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="15" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="25" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="80"
                                                        data-chart-label="Feb">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="95"
                                                        data-chart-label="Mar">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="85"
                                                        data-chart-label="Apr">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="80"
                                                        data-chart-label="May">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="70"
                                                        data-chart-label="Jun">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="15" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="15" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="85"
                                                        data-chart-label="Jul">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="90"
                                                        data-chart-label="Aug">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="80"
                                                        data-chart-label="Sep">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="20" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="20" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="50"
                                                        data-chart-label="Oct">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="40"
                                                        data-chart-label="Nov">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="100"
                                                        data-chart-label="Dec">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                </div><!-- .tb-vertical-chart -->
                                            </div>
                                            <ul class="tb-vertical-chart-stroke">
                                                <li data-cl-opacity="1"><span></span>Referral</li>
                                                <li data-cl-opacity="0.8"><span></span>Direct</li>
                                                <li data-cl-opacity="0.6"><span></span>Organic Search</li>
                                                <li data-cl-opacity="0.4"><span></span>Affiliates</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .tb-tab -->
                                <div id="tab33" class="tb-tab">
                                    <div class="tb-chart-wrap tb-style4">
                                        <div class="tb-vertical-chart-wrap">
                                            <div class="tb-vertical-chart-list">
                                                <div class="tb-vertical-chart-graph">
                                                    <div class="tb-graph-col">30k</div>
                                                    <div class="tb-graph-col">25k</div>
                                                    <div class="tb-graph-col">20k</div>
                                                    <div class="tb-graph-col">15k</div>
                                                    <div class="tb-graph-col">10k</div>
                                                    <div class="tb-graph-col">8k</div>
                                                </div>
                                                <div class="tb-vertical-chart">
                                                    <div class="tb-vertical-chart-up" data-chart-up="65"
                                                        data-chart-label="Jan">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="15" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="25" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="60"
                                                        data-chart-label="Feb">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="95"
                                                        data-chart-label="Mar">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="65"
                                                        data-chart-label="Apr">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="80"
                                                        data-chart-label="May">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="70"
                                                        data-chart-label="Jun">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="15" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="15" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="85"
                                                        data-chart-label="Jul">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="90"
                                                        data-chart-label="Aug">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="70"
                                                        data-chart-label="Sep">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="20" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="20" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="20"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="40" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="80"
                                                        data-chart-label="Oct">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="100"
                                                        data-chart-label="Nov">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                    <div class="tb-vertical-chart-up" data-chart-up="50"
                                                        data-chart-label="Dec">
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Referral"
                                                            data-cl-height="0" data-cl-opacity="0.4"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Direct"
                                                            data-cl-height="0" data-cl-opacity="0.6"></div>
                                                        <div class="tb-vertical-chart-layer"
                                                            data-cl-name="Organic Search" data-cl-height="0"
                                                            data-cl-opacity="0.8"></div>
                                                        <div class="tb-vertical-chart-layer" data-cl-name="Affiliates"
                                                            data-cl-height="100" data-cl-opacity="1"></div>
                                                    </div>
                                                </div><!-- .tb-vertical-chart -->
                                            </div>
                                            <ul class="tb-vertical-chart-stroke">
                                                <li data-cl-opacity="1"><span></span>Referral</li>
                                                <li data-cl-opacity="0.8"><span></span>Direct</li>
                                                <li data-cl-opacity="0.6"><span></span>Organic Search</li>
                                                <li data-cl-opacity="0.4"><span></span>Affiliates</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .tb-tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col -->
            <div class="col-lg-3">
                <div class="tb-card tb-style1">
                    <div class="tb-card-heading">
                        <div class="tb-card-heading-left">
                            <h2 class="tb-card-title">Insights</h2>
                        </div>
                    </div>
                    <div class="tb-card-body">
                        <div class="tb-insights-card">
                            <div class="tb-padd-lr-30">
                                <div class="tb-height-b15 tb-height-lg-b15"></div>
                                <div class="tb-chart-heading tb-style3">
                                    <div class="tb-chart-heading-in">
                                        <h3>12,1300</h3>
                                        <p>People Engaged</p>
                                    </div>
                                    <div class="tb-progress-lavel tb-style1 tb-success-color">
                                        <i class="material-icons-outlined">arrow_drop_up</i>5.5%
                                    </div>
                                </div>
                                <div class="tb-height-b15 tb-height-lg-b15"></div>
                                <ul class="tb-insights-list tb-style1 tb-mp0">
                                    <li>
                                        <div class="tb-insights-text">
                                            <div class="tb-insights-title">12,030</div>
                                            <div class="tb-insights-subtitle">Views</div>
                                        </div>
                                        <div class="tb-insights-graph">
                                            <div class="tb-chart-wrap tb-style7">
                                                <div class="tb-chart-in">
                                                    <canvas id="tb-chart7-type1"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tb-insights-text">
                                            <div class="tb-insights-title">231</div>
                                            <div class="tb-insights-subtitle">Clicks</div>
                                        </div>
                                        <div class="tb-insights-graph">
                                            <div class="tb-chart-wrap tb-style7">
                                                <div class="tb-chart-in">
                                                    <canvas id="tb-chart7-type2"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tb-insights-text">
                                            <div class="tb-insights-title">54</div>
                                            <div class="tb-insights-subtitle">Orders</div>
                                        </div>
                                        <div class="tb-insights-graph">
                                            <div class="tb-chart-wrap tb-style7">
                                                <div class="tb-chart-in">
                                                    <canvas id="tb-chart7-type3"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tb-insights-text">
                                            <div class="tb-insights-title">$400</div>
                                            <div class="tb-insights-subtitle">Revenue</div>
                                        </div>
                                        <div class="tb-insights-graph">
                                            <div class="tb-chart-wrap tb-style7">
                                                <div class="tb-chart-in">
                                                    <canvas id="tb-chart7-type4"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr />
                            <a href="#" class="tb-btn tb-style2">MORE INSIGHTS <i
                                    class="material-icons-outlined">navigate_next</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container-fluid -->
    @include('layouts.footer')
</div>
@endsection
