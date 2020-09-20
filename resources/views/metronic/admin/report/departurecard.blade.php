
<!DOCTYPE html>
<html>
<head>
        <title> GRASP Travels </title>
        <style>
        .table-bordered {
          border-collapse: collapse;
        }

        .table-bordered, .bordered-td, .bordered-tr {
          border: 1px solid black;
        }
        line {
          border-bottom: 1px #333 dotted;
          display: inline-block;
          width: 80%;
        }
        .dotted {
          border-bottom: 1px #333 dotted;
          padding-top: 15px;
          width: 92%;
        }
        .dottedUnderline {
            text-decoration: underline dotted;
            /*1px #333 ;*/
        }
        .title-tag{
            padding-right: 10px;
        }
        .table-data{
            padding: 5px;
        }
        .font-size{
            font-size: 20px;
        }
        </style>
</head>
<!-- BEGIN CONTAINER -->
<body>
<div class="page-container">

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <div class="row">
                            <div class="col-md-6">

                            </div>

                        </div>

                        <table border='0' style="width:90%" >

                            <tr>
                                <td style="text-align: center; width: 15%; padding-top: 5px; vertical-align: top;">
                                    <img src="{{ url('template/metronic/assets/admin/layout4/img/logo-ams.png') }}" class="logo-default" style="margin: 2px 0 0 -5px;width: 25%;margin-top: 4px;" />
                                </td>
                                <td colspan="11" style="font-size: 10px; padding-right: 25%">
                                    <img src="{{ url('template/metronic/assets/admin/layout4/img/govt_seal.png') }}" class="logo-default" style="width:12%; margin: 2px 0 0 45%; margin-top: 4px;" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" style="font-size: 12px; text-align: center"><?php echo 'গণপ্রজাতন্ত্রী বাংলাদেশ সরকার';?></td>
                            </tr>
                            <tr>
                                <td colspan="12" style="font-size: 12px; text-align: center"><?php echo "Govt. of the People's Republic of Bangladesh";?></td>
                            </tr>
                            <tr>
                                <td colspan="12" style="font-size: 12px; text-align: center"><?php echo '(বহির্গমন কার্ড/Departure Card)';?></td>
                            </tr>
                            <tr>
                                <td colspan="12" style="padding: 10px;"></td>
                            </tr>

                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    1.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    নাম<br/>
                                    Name
                                </td>
                                <td colspan="9" style="padding-top: 20px">
                                    <span class="dottedUnderline">Test Name</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    2.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    সেক্স<br/>
                                    Sex
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-4">
                                        <table class="table-bordered">
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td">পুরুষ<br/>Male</td>
                                                <td style="padding:0 10px 0 10px" class="table-data bordered-td font-size">&#10004;</td>
                                            </tr>
                                            <tr>
                                                <td class="table-data bordered-td">মহিলা<br/>Female</td>
                                                <td style="padding:0 10px 0 10px" class="table-data bordered-td">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td colspan="2" style="width: 30%" >&nbsp;</td>
                                <td style="padding-left: 15px; width: 5%">
                                    3.
                                </td>
                                <td colspan="2" style="width: 10%;">
                                    জন্ম তারিখ<br/>
                                    Date of Birth
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-2">
                                        <table class="table-bordered">
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td">Day</td>
                                                <td class="table-data bordered-td">Month</td>
                                                <td class="table-data bordered-td">Year</td>
                                            </tr>
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td" style="text-align: center;">27</td>
                                                <td class="table-data bordered-td" style="text-align: center;">05</td>
                                                <td class="table-data bordered-td" style="text-align: center;">1999</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    4.
                                </td>
                                <td colspan="2">
                                    জাতীয়তা<br/>
                                    Nationality
                                </td>
                                <td colspan="9" style="padding-top: 20px">
                                    <span class="dottedUnderline">Bangladeshi</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    5.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    পাসপোর্ট নম্বর<br/>
                                    Passport Number
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-4">
                                        <span class="dottedUnderline">BW0178291782</span>
                                    </div>
                                </td>
                                <td colspan="2" style="width: 30%" >&nbsp;</td>
                                <td style="padding-left: 15px; width: 5%">
                                    6.
                                </td>
                                <td colspan="2" style="width: 10%;">
                                    মেয়াদ উত্তীর্ণের তারিখ <br/>
                                    Expiry Date
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-2">
                                        <table class="table-bordered">
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td">Day</td>
                                                <td class="table-data bordered-td">Month</td>
                                                <td class="table-data bordered-td">Year</td>
                                            </tr>
                                            <tr class="bordered-tr">
                                                <td class="table-data  bordered-td" style="text-align: center;">27</td>
                                                <td class="table-data  bordered-td" style="text-align: center;">05</td>
                                                <td class="table-data  bordered-td" style="text-align: center;">1999</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    7.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    ফ্লাইট নম্বর<br/>
                                    Flight Number
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-4">
                                        <span class="dottedUnderline">A173281</span>
                                    </div>
                                </td>
                                <td colspan="2" style="width: 30%" >&nbsp;</td>
                                <td style="padding-left: 15px; width: 5%">
                                    8.
                                </td>
                                <td colspan="2" style="width: 10%;">
                                    প্রস্থানের তারিখ <br/>
                                    Date of Departure
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-2">
                                        <table class="table-bordered">
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td">Day</td>
                                                <td class="table-data">Month</td>
                                                <td class="table-data bordered-td">Year</td>
                                            </tr>
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td" style="text-align: center;">27</td>
                                                <td class="table-data bordered-td" style="text-align: center;">05</td>
                                                <td class="table-data bordered-td" style="text-align: center;">1999</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    9.
                                </td>
                                <td colspan="6">
                                    বাংলাদেশে অবস্থানকালীন ঠিকানা<br/>
                                    (বিদেশী নাগরিকের জন্য)</br/>
                                    Address in Bangladesh</br/>
                                    (For Foreigner)
                                </td>
                                <td colspan="5"  style="padding-top: 20px" class="dottedUnderline">
                                        Dami ng gustong kumuha
                                        Dyan na lang sa may bangketa
                                        Para di masyadong kita
                                        Ng mabeta kong paninda ko ohhhh
                                        Ano ba to ohhhh
                                        Binebenta ko ohhhh
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    10.
                                </td>
                                <td colspan="11">
                                    বাংলাদেশী নাগরিকের জন্য<br/>
                                    For Bangladeshi Citizen
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    a.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    ভিসা নম্বর<br/>
                                    Visa Number
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-4">
                                        <span class="dottedUnderline">878127</span>
                                    </div>
                                </td>
                                <td colspan="2" style="width: 30%" >&nbsp;</td>
                                <td style="padding-left: 15px; width: 5%">
                                    b.
                                </td>
                                <td colspan="2" style="width: 10%;">
                                    মেয়াদ উত্তীর্ণের তারিখ <br/>
                                    Date of Expiry
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-2">
                                        <table class="table-bordered">
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td">Day</td>
                                                <td class="table-data bordered-td">Month</td>
                                                <td class="table-data bordered-td">Year</td>
                                            </tr>
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td" style="text-align: center;">27</td>
                                                <td class="table-data bordered-td" style="text-align: center;">05</td>
                                                <td class="table-data bordered-td" style="text-align: center;">1999</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    c.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    ভিসা ধরণ <br/>
                                    Type of Visa
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-4">
                                        <span class="dottedUnderline">878127</span>
                                    </div>
                                </td>
                                <td colspan="2" style="width: 30%" >&nbsp;</td>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    d.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    ভ্রমণের উদ্দেশ্য<br/>
                                    Purpose of Visit
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-4">
                                        <span class="dottedUnderline">Tour</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 15px; width: 5%; text-align: center">
                                    e.
                                </td>
                                <td colspan="2" style="width: 10%">
                                    Mobile No. in Bangladesh
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-4">
                                        <span class="dottedUnderline">878127</span>
                                    </div>
                                </td>
                                <td colspan="7" style="width: 30%" >&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 30%" >&nbsp;</td>
                                <td colspan="3" style="padding-top: 100px; text-align: center;">
                                    ...............................<br/>
                                    যাত্রীর স্বাক্ষর<br/>
                                    Signature of Passenger
                                </td>
                                <td colspan="3" style="width: 30%" >&nbsp;</td>
                                <td colspan="3" style="padding-top: 100px; text-align: center;">
                                    ...............................<br/>
                                    সীল<br/>
                                    Seal
                                </td>
                                <td colspan="2" style="width: 30%" >&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 30%" >&nbsp;</td>
                                <td colspan="2" style="width: 10%;">
                                    তারিখ <br/>
                                    Date
                                </td>
                                <td colspan="2" style="padding-top: 20px">
                                    <div class="col-md-2">
                                        <table class="table-bordered">
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td">Day</td>
                                                <td class="table-data bordered-td">Month</td>
                                                <td class="table-data bordered-td">Year</td>
                                            </tr>
                                            <tr class="bordered-tr">
                                                <td class="table-data bordered-td" style="text-align: center;">27</td>
                                                <td class="table-data bordered-td" style="text-align: center;">05</td>
                                                <td class="table-data bordered-td" style="text-align: center;">1999</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
</body>
<!-- END CONTAINER -->

<!--
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#myTable').DataTable();
});
</script> -->
