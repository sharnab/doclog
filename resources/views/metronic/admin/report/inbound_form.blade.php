@extends('layouts.admin')
@section('extra_css')

<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0 10px 0 10px;  /* this affects the margin in the printer settings */
}
</style>
{{--<link href="../../../template/metronic/assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>--}}
<style type="text/css">
    #last_hr{
        page-break-after  : always;
    }

    #last_hr:last-child{
        page-break-after  : avoid;
    }

    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }

    table, tr, td{
        padding: 5px;
    }

    #invoice td, #invoice th {
      padding: 8px;
    }

    #invoice tr:nth-child(odd){background-color: #f2f2f2;}

    #invoice tr:hover {background-color: #ddd;}

    #invoice th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }


    #main_table th {
        text-align: center;
    }

    #invoice, #total {
        border: 1px solid #f2f2f2;
    }

    .page-content, .page-container{
        background-color: white;
    }

    #total td, #total th {
      padding: 8px;
    }

    #total tr:nth-child(odd){background-color: #f2f2f2;}

    #total tr:hover {background-color: #ddd;}

    #total th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }

    .different{
        background-color: #cacaca;
    }
</style>
@endsection

@section('content')
{{--    <link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">--}}
{{--    <!-- BEGIN PAGE HEAD -->--}}
{{--    <div class="page-head">--}}
{{--        <!-- BEGIN PAGE TITLE -->--}}
{{--        <div class="page-title">--}}
{{--            <h1>Invoice</h1>--}}
{{--        </div>--}}
{{--        <!-- END PAGE TITLE -->--}}

{{--    <!-- END PAGE HEAD -->--}}
{{--    </div>--}}
{{--    <!-- END PAGE HEAD -->--}}
{{--    <!-- BEGIN PAGE BREADCRUMB -->--}}
{{--    <ul class="page-breadcrumb breadcrumb">--}}
{{--        <li>&nbsp;</li>--}}
{{--    </ul>--}}
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="portlet light">
        <div class="portlet-body">
        <div class="invoice" style="border: 0px solid black">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-12" style="font-size: 15px; font-weight: 700; text-align: center">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</div>
                    <div class="col-xs-12" style="font-size: 12px; text-align: center">তফসিল-১</div>
                    <div class="col-xs-12" style="font-size: 12px; text-align: center">(বিধি - ৩(৪), ৮(১), ৮(২) ও বিধি ৮(৩) দ্রষ্টব্য)</div>
                    <div class="col-xs-12" style="font-size: 12px; text-align: center">(ব্যাগেজ ঘোষণীপত্র ফরম)</div>
                    <div class="col-xs-12" style="font-size: 12px; text-align: center">(প্রযােজ্য অংশে টিক চিহ্ন দিন)</div>
                    <div class="col-xs-12">&nbsp;</div>

                    <div class="col-xs-12">
                        <table border='0' style="width: 100%">
                            <tr>
                                <td style="font-size: 10px; width: 30%; padding-left: 5px">১. যাত্রীর নাম</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->given_name }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; width: 30%; padding-left: 5px">২. পাসপাের্ট নং</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->passport_no }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; width: 30%; padding-left: 5px">৩. ফাইট নং ও তারিখ</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->flight_number }}<br />{{ date('d M, Y', strtotime($content->travel_date)) }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; width: 30%; padding-left: 5px">৪. জাতীয়তা</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->name }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-size: 10px; width: 30%; padding-left: 5px">৫. আপনি বিগত তিন মাসে যে সকল দেশ ভ্রমণ করেছেন :</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">দেশের নাম</td>
                                <td style="font-size: 10px; width: 80%; padding-left: 5px; text-align: center">ভ্রমণের তারিখ </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">(ক) __________________________</td>
                                <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">(খ) __________________________</td>
                                <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">(গ) __________________________</td>
                                <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                            </tr>
                            <tr>
                                <td colspan='3' style="font-size: 10px; width: 30%; padding-left: 5px"><u>৬. অনুগ্রহপূর্বক নিম্নলিখিত প্রশ্ন গুলাে মনােযােগ সহকারে পড়ুন এবং উত্তর দিন:</u></td>
                            </tr>
                        </table>
                        <table border='0' style="width: 100%">
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 50%; padding-left: 5%; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black">
                                    (ক) আপনার কাছে সংযুক্ত তুফসিল-২ এ বিত্ৰ শুকুর উত্তর আরোপযােগ্য আমদানি নিষিদ্ধ পণ্য আছে কি? <br />
                                    [দ্রষ্টব্যঃ যদি থাকে শুল্ক-কর পরিশোধের জন্য কর্তব্যরত কাস্টমস কর্মকর্তার সাথে যোগাযােগ করুন।

                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-top: 1px solid black; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তর:</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black">
                                    (খ) আপনার কাছে ৫,০০০ টাকা (পাঁচ হাজার) মার্কিন ডলারের অতিরিক্ত বা তাহার সমপরিমাণ অর্থের অধিক কোন বৈদেশিক মুদ্রা আছে কি? <br />
                                    [দ্রষ্টব্যঃ উল্লিখিত পরিমাণের অধিক বৈদেশিক মুদ্রা থাকিলে তাহার বিবরণ এফএমজে ফরম-এ ঘােষণা প্রদানের জন্য
                                        কর্তব্যরত কাস্টমস্ কর্মকর্তার সাথে যােগাযােগ করুন।

                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তরঃ</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black; padding-top: 0px; padding-bottom: 0px">
                                     (i) স্বর্ণ বা রৌপ্যের তৈরী অলংকার (শুল্ক করমুক্ত সীমার উর্ধ্বে)
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তরঃ</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black; padding-top: 0px; padding-bottom: 0px; vertical-align: top">
                                    (ii) স্বর্ণ বা রৌপ্যের বার বা পিত্ত
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px; vertical-align: top; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তরঃ</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black">
                                    (গ) আপনার সঙ্গে আনা হয় নাই এমন কোন ব্যাপ, স্যুটকেস, টাংক, কার্টন ইত্যাদি আছে কি? <br />
                                    [দ্রিষ্টব্যঃ যদি থাকে তাহলে তার এয়ারওয়ে বিল/বিল অব লেডিং নম্বর ও তারিখ]
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-top: 1px solid black; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তরঃ</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black">
                                    (ঘ) মাংস এবং মাংস দ্বারা তৈরী পণ্য/ডেইরী প্রােডাক্টস/মাছ/পােলট্রি প্রােডাক্টস।

                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-right: 1px solid black;">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তরঃ</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black">
                                    (ঙ) বীজ/গাছের চারা/ফলমূল/ফুল/অন্যান্য উদ্ভিদ পন্য
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-right: 1px solid black;">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তরঃ</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black">
                                    (চ) দুই এর অধিক সেলুলার ফোন
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-bottom: 1px solid black; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">উত্তরঃ</td>
                                            <td style="font-size: 10px">আছে</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px"></td>
                                            <td style="font-size: 10px; padding-left: 25px">নাই</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table border='0' style="width: 100%">
                            <tr>
                                <td style="font-size: 10px; width: 30%; padding-left: 5px">৭, ব্যাগেজের সংখ্যা</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; width: 30%; padding-left: 5px">৮. কোন দেশ হইতে আগমন</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-size: 10px; width: 30%; padding-left: 5px">
                                    উপরের কোন প্রশ্নের জবাৰ যদি “হ্যা হয়, তাহলে অনুগ্রহ করে রেড চ্যানেলে কর্তব্যরত কর্মকর্তাকে অবহিত।
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12" style="padding-top: 8%">
                        <table style="width: 100%">
                            <tr>
                                <th style="font-size: 10px; width: 3%; padding-left: 5px; text-align: center"><br />&nbsp;</th>
                                <th style="font-size: 10px; width: 30%; padding-left: 5px; border-top: 1px solid black; text-align: center"><b>স্বাক্ষর</b><br />(রেভিনিউ অফিসার অব কাস্টমস)</th>
                                <th style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center"><br />&nbsp;</th>
                                <th style="font-size: 10px; width: 30%; padding-left: 5px; border-top: 1px solid black; text-align: center"><b>যাত্রীর স্বাক্ষর</b><br />(পাসপোর্ট অনুসারে)</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-9" style="text-align: right">&nbsp;</div>
                    <div class="col-xs-3" style="font-size: 11px; padding-left: 3%; padding-right: 0px; padding-top: 5px;">
                        তারিখঃ
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr id="last_hr">
<div class="portlet light" style="padding-top: 2%">
    <div class="portlet-body">
    <div class="invoice" style="border: 0px solid black">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-12" style="font-size: 15px; font-weight: 700; text-align: center">Government of the People Republic of Bangladesh</div>
                <div class="col-xs-12" style="font-size: 12px; text-align: center">Schedule - 1</div>
                <div class="col-xs-12" style="font-size: 12px; text-align: center">[See Rule 3(4), 8(1),8(2) & Rule 4(3)]</div>
                <div class="col-xs-12" style="font-size: 12px; text-align: center">(Baggage Declaration Form)</div>
                <div class="col-xs-12" style="font-size: 12px; text-align: center">(Please tick mark where applicable)</div>
                <div class="col-xs-12">&nbsp;</div>

                <div class="col-xs-12">
                    <table border='0' style="width: 100%">
                        <tr>
                            <td style="font-size: 10px; width: 30%; padding-left: 5px">1. Name of the Passenger</td>
                            <td style="padding-left: 5px; width: 1%">:</td>
                            <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->given_name }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px; width: 30%; padding-left: 5px">2. Passport Number</td>
                            <td style="padding-left: 5px; width: 1%">:</td>
                            <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->passport_no }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px; width: 30%; padding-left: 5px">3. Flight No.& Date</td>
                            <td style="padding-left: 5px; width: 1%">:</td>
                            <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->flight_number }}<br />{{ date('d M, Y', strtotime($content->travel_date)) }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px; width: 30%; padding-left: 5px">4. Nationality</td>
                            <td style="padding-left: 5px; width: 1%">:</td>
                            <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">{{ $content->name }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size: 10px; width: 30%; padding-left: 5px">5. Country Where you have travelled for the last three months: Name of the country</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">Name of the country</td>
                            <td style="font-size: 10px; width: 80%; padding-left: 5px; text-align: center">Travel Date</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">(a) __________________________</td>
                            <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">(b) __________________________</td>
                            <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">(c) __________________________</td>
                            <td colspan="2" style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                        </tr>
                        <tr>
                            <td colspan='3' style="font-size: 10px; width: 30%; padding-left: 5px"><u>6. Please read the questions attentively and answer:</u></td>
                        </tr>
                    </table>
                    <table border='0' style="width: 100%">
                        <tr>
                            <td colspan="6" style="font-size: 10px; width: 50%; padding-left: 5%; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black">
                                (a) Do you have any goods which are dutiable as described on Attached Schedule-2?<br />
                                [N.B.: If any, please contact Customs Officer on duty, for paying duties and taxes]
                            </td>
                            <td style="width:27%; padding-left: 5%; vertical-align: top; border-top: 1px solid black; border-right: 1px solid black">
                                <table>
                                    <tr>
                                        <td style="font-size: 10px">Answer:</td>
                                        <td style="font-size: 10px">Yes</td>
                                        <td style="font-size: 10px; border: 1px solid black; width: 20%"></td>
                                        <td style="font-size: 10px; font-size: 10px; padding-left: 25px">No</td>
                                        <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; padding-top: 0px; padding-bottom: 0px; border-left: 1px solid black">
                                (i) Prohi Bited Articles
                            </td>
                            <td style="width:27%; padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-right: 1px solid black">
                                <table>
                                    <tr>
                                        <td style="font-size: 10px">Answer:</td>
                                        <td style="font-size: 10px">Yes</td>
                                        <td style="border: 1px solid black; width: 20%"></td>
                                        <td style="font-size: 10px; padding-left: 25px">No</td>
                                        <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; padding-top: 0px; padding-bottom: 0px; vertical-align: top; border-left: 1px solid black">
                                (ii) Silver/Gold Jewellery (over free alowance)
                            </td>
                            <td style="width:27%; padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px; vertical-align: top; border-right: 1px solid black">
                                <table>
                                    <tr>
                                        <td style="font-size: 10px">Answer:</td>
                                        <td style="font-size: 10px">Yes</td>
                                        <td style="border: 1px solid black; width: 20%"></td>
                                        <td style="font-size: 10px; padding-left: 25px">No</td>
                                        <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; padding-top: 0px; padding-bottom: 0px; vertical-align: top; border-left: 1px solid black">
                                (iii) Gold/Silver Bar or Bullton
                            </td>
                            <td style="width:27%; padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px; vertical-align: top; border-right: 1px solid black">
                                <table>
                                    <tr>
                                        <td style="font-size: 10px">Answer:</td>
                                        <td style="font-size: 10px">Yes</td>
                                        <td style="border: 1px solid black; width: 20%"></td>
                                        <td style="font-size: 10px; padding-left: 25px">No</td>
                                        <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black">
                                    (b) Do you have foreign currence more than Answer: US$ 5,000/- or equivalent in any other
                                    foreign currency? <br />
                                    [N.B.: If you possess foreign currency more than stated above, please contact Customs Officer on duty to declare the currency in
                                    FMJ Form]
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-right: 1px solid black;">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">Answer:</td>
                                            <td style="font-size: 10px">Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td style="font-size: 10px; padding-left: 25px">No</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black">
                                    (c) Do you have any unaccompanied baggage?<br />
                                    [N.B.: Airways Bill/Bill of lading no.& date, If any]
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-top: 1px solid black; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">Answer:</td>
                                            <td style="font-size: 10px">Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td style="font-size: 10px; padding-left: 25px">No</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black">
                                    (d) Meat & Meat Products/Dairy Products/Fish/Poultry Products
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-right: 1px solid black;">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">Answer:</td>
                                            <td style="font-size: 10px">Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td style="font-size: 10px; padding-left: 25px">No</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-left: 1px solid black">
                                    (e) Seeds/Plants/Fruits/Flowers/other Planting material
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-right: 1px solid black;">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">Answer:</td>
                                            <td style="font-size: 10px">Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td style="font-size: 10px; padding-left: 25px">No</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="font-size: 10px; width: 30%; padding-left: 5%; border-right: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black">
                                    (f) Over 02 (two) cellular phone
                                </td>
                                <td style="width:27%; padding-left: 5%; vertical-align: top; border-bottom: 1px solid black; border-right: 1px solid black">
                                    <table>
                                        <tr>
                                            <td style="font-size: 10px">Answer:</td>
                                            <td style="font-size: 10px">Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td style="font-size: 10px; padding-left: 25px">No</td>
                                            <td style="border: 1px solid black; width: 20%; padding-left: 10px; font-size: 18px">&#10004;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tr>
                    </table>
                    <table border='0' style="width: 100%">
                        <tr>
                            <td style="font-size: 10px; width: 30%; padding-left: 5px">7. Number of Baggage</td>
                            <td style="padding-left: 5px; width: 1%">:</td>
                            <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px; width: 30%; padding-left: 5px">8. Country from where coming</td>
                            <td style="padding-left: 5px; width: 1%">:</td>
                            <td style="font-size: 10px; width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size: 10px; width: 30%; padding-left: 5px">
                                Please report to customs officer at the Red Channel counter in case answer to any of the above questions are 'yes'.
                            </td>
                        </tr>
                    </table>
                </div>

                {{-- <div class="col-xs-12">&nbsp;</div> --}}
                <div class="col-xs-12" style="padding-top: 8%">
                    <table style="width: 100%">
                        <tr>
                            <th style="font-size: 10px; width: 3%; padding-left: 5px; text-align: center"><br />&nbsp;</th>
                            <th style="font-size: 10px; width: 30%; padding-left: 5px; border-top: 1px solid black; text-align: center"><b>Signature</b><br />(Revenue officer of Customs)</th>
                            <th style="font-size: 10px; width: 30%; padding-left: 5px; text-align: center"><br />&nbsp;</th>
                            <th style="font-size: 10px; width: 30%; padding-left: 5px; border-top: 1px solid black; text-align: center"><b>Signature of the Passenger</b><br />(according to passport)</th>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-9" style="text-align: right">&nbsp;</div>
                <div class="col-xs-3" style="font-size: 11px; padding-left: 3%; padding-right: 0px; padding-top: 5px;">
                    Date:
                </div>
            </div>
    </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-xs-12 invoice-block text-center" style="padding-top: 40px">
        <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
            Print <i class="fa fa-print"></i>
        </a>
    </div>
</div>
<div style="padding-bottom: 2%">&nbsp;</div>
    <!-- END PAGE CONTENT-->

@endsection
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });
</script>
@endsection
