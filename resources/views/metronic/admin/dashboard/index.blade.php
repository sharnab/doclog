@extends('layouts.admin')
@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-2 mr-5">Dashboard</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->

										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->

								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Notice-->

                                <!--end::Notice-->
                                <div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">Expatriate By Division</h3>
												</div>
											</div>
											<div class="card-body">
												<div id="kt_gchart_3" style="height:500px;"></div>
											</div>
										</div>
										<!--end::Card-->
									</div>
{{--									<div class="col-lg-6">--}}
{{--										<!--begin::Card-->--}}
{{--										<div class="card card-custom gutter-b">--}}
{{--											<div class="card-header">--}}
{{--												<div class="card-title">--}}
{{--													<h3 class="card-label">Expatriate By Bangladesh Division</h3>--}}
{{--												</div>--}}
{{--											</div>--}}
{{--											<div class="card-body">--}}
{{--												<div id="kt_gchart_4" style="height:500px;"></div>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<!--end::Card-->--}}
{{--									</div>--}}
								</div>
								<!--begin::Row-->
{{--								<div class="row">--}}
{{--									<div class="col-lg-6">--}}
{{--										<!--begin::Card-->--}}
{{--										<div class="card card-custom gutter-b">--}}
{{--											<div class="card-header">--}}
{{--												<div class="card-title">--}}
{{--													<h3 class="card-label">Column Chart 1</h3>--}}
{{--												</div>--}}
{{--											</div>--}}
{{--											<div class="card-body">--}}
{{--												<div id="kt_gchart_1" style="height:500px;"></div>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<!--end::Card-->--}}
{{--									</div>--}}
{{--									<div class="col-lg-6">--}}
{{--										<!--begin::Card-->--}}
{{--										<div class="card card-custom gutter-b">--}}
{{--											<div class="card-header">--}}
{{--												<div class="card-title">--}}
{{--													<h3 class="card-label">Column Chart 2</h3>--}}
{{--												</div>--}}
{{--											</div>--}}
{{--											<div class="card-body">--}}
{{--												<div id="kt_gchart_2" style="height:500px;"></div>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--										<!--end::Card-->--}}
{{--									</div>--}}
{{--								</div>--}}
								<!--end::Row-->
								<!--begin::Row-->

								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">Remittance History by Month</h3>
												</div>
											</div>
											<div class="card-body">
												<div id="kt_gchart_5" style="height:500px;"></div>
											</div>
										</div>
										<!--end::Card-->
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
@endsection
