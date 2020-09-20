@extends('layouts.admin')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link href="{{url('template/metronic')}}/assets/admin/pages/css/pricing-table.css" rel="stylesheet" type="text/css"/> -->
<style type="text/css">
.kt-timeline-v2{position:relative}
.kt-timeline-v2:before{content:'';position:absolute;left:4.85rem;width:0.214rem;top:5px;bottom:5px;height:calc(100% - 5px);background-color:#E7E9F5}
.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item{display:table;position:relative;margin-bottom:1.75rem}
.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item .kt-timeline-v2__item-time{display:table-cell;font-size:1.3rem;font-weight:500;vertical-align:top;position:absolute;padding-top:0.18rem;color:#a7abc3}
.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item .kt-timeline-v2__item-cricle{border-radius:50%;border:0.89rem solid white;z-index:1;top:0.2rem;left:4.12rem;position:relative}
.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item .kt-timeline-v2__item-cricle>i{font-size:1.78rem;top:-0.93rem;left:-0.57rem;position:absolute}
.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item .kt-timeline-v2__item-text{display:table-cell;vertical-align:top;font-size:1.2rem;padding:0.35rem 0 0 5rem;color:#a7abc3}
/*.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item .kt-timeline-v2__item-text.kt-timeline-v2__item-text--bold{font-size:1.2rem;font-weight:500;padding-top:0.21rem;color:#a7abc3}*/
/*.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item .kt-timeline-v2__item-text>span{font-weight:700}*/
.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item .kt-list-pics{display:table-cell;vertical-align:top}
.kt-timeline-v2 .kt-timeline-v2__items .kt-timeline-v2__item:last-child{margin-bottom:0}

.kt-font-success{color:#1dc9b7 !important}
.kt-font-danger{color:#fd397a !important}
.kt-font-info{color:#5578eb !important}
.kt-font-brand{color:#5d78ff !important}

.kt-font-refrigerator{color: #578ebe}
.kt-font-deliveryvan{color: #f2784b}
.kt-font-warehouse{color: #8775a7}
.kt-font-waterpurifier{color: #3faba4}


.pricing {
  position: relative;
  margin-bottom: 15px;
  border: 3px solid #eee;
  background: white;
}

.pricing-active {
  border: 3px solid #67809F;
  margin-top: -10px;
  box-shadow: 7px 7px rgba(54, 215, 172, 0.2);
}

.pricing:hover {
  border: 3px solid #67809F;
}

.pricing:hover h4 , .pricing:hover h4 a {
  color: #6780B6;
}

.pricing-head {
  text-align: center;
}

.pricing-head h3,
.pricing-head h4 {
  margin: 0;
  line-height: normal;
}

.pricing-head h3 span,
.pricing-head h4 span {
  display: block;
  margin-top: 5px;
  font-size: 14px;
  font-style: italic;
}

.pricing-head h3 {
  font-weight: 300;
  color: #fafafa;
  padding: 12px 0;
  font-size: 27px;
  background: #67809F;
  border-bottom: solid 1px #41b91c;
}

.pricing-head h4 {
  color: #bac39f;
  padding: 5px 0;
  font-size: 54px;
  font-weight: 300;
  background: #fbfef2;
  border-bottom: solid 1px #f5f9e7;
}

.pricing-head h4 a{
  color: #bac39f;
}

.pricing-head-active h4 {
  color: #6780B6;
}

.pricing-head h4 i {
  top: -8px;
  font-size: 28px;
  font-style: normal;
  position: relative;
}

.pricing-head h4 span {
  top: -10px;
  font-size: 14px;
  font-style: normal;
  position: relative;
}

/*Pricing Content*/
.pricing-content li {
  color: #5f5b5b;
  font-size: 14px;
  padding: 7px 15px;
  border-bottom: solid 1px #f5f9e7;
}

.pricing-content li i {
  top: 2px;
  color: #6780B6;
  font-size: 16px;
  margin-right: 5px;
  position: relative;
}

.pricing-content li span {
    width: 70%;
    position: absolute;
}

/*Pricing Footer*/
.pricing-footer {
  color: #777;
  font-size: 11px;
  line-height: 17px;
  text-align: center;
  padding: 0 20px 19px;
}

/*Priceing Active*/
.price-active,
.pricing:hover {
  z-index: 9;
}

.price-active h4 {
  color: #36d7ac;
}

.no-space-pricing .pricing:hover {
  transition: box-shadow 0.2s ease-in-out;
}

.no-space-pricing .price-active .pricing-head h4,
.no-space-pricing .pricing:hover .pricing-head h4 {
  color: #36d7ac;
  padding: 15px 0;
  font-size: 80px;
  transition: color 0.5s ease-in-out;
}


</style>

@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Dashboard</h1>
        </div>
        <!-- END PAGE TITLE -->

    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <!-- <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li> -->
        <li>
            <a href="{{ url('admin') }}">Dashboard</a>
        </li>

    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">

	<div class="col-md-12">

        </div>
    </div>
@endsection
