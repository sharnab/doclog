<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Route List
 */

Route::prefix('address')->namespace('Admin')->group(function (){
    Route::get('division_list', 'AddressController@divisionList');
    Route::get('district_list','AddressController@districtList');
    Route::get('union_list', 'AddressController@unionList');
    Route::get('upazila_list', 'AddressController@upazilaList');

    Route::get('district_by_division','AddressController@districtByDivision');
    Route::get('upazila_by_district', 'AddressController@upazilaByDistrict');
    Route::get('union_by_upazila', 'AddressController@unionByUpazila');
});



Route::prefix('admin')->middleware(['RoleBuzz', 'auth'])->group(function () {

    Route::get('permissions', 'Admin\Role\PermissionsController@index')->name('permissions');
    Route::get('permissions/create-group', 'Admin\Role\PermissionsController@create')->name('create_group');
    Route::post('permissions/store', 'Admin\Role\PermissionsController@store')->name('group_store');
    Route::get('permissions/build/{id}', 'Admin\Role\PermissionsController@buildPermission')->name('build_permission');
    Route::post('permissions/set/{id}', 'Admin\Role\PermissionsController@setPermission');
    Route::resource('permissions/menu', 'Admin\Role\MenuController');
    Route::get('/', 'Admin\DashboardController@index')->name('admin_dashboard');

    Route::resource('/userinfo', 'Admin\UserinfoController');

    /**
     * App User
     */

    //Route::resource('/religion', 'Admin\ReligionController');
    Route::get('/expatriate','Admin\ExpatriateController@index')->name('user');
    Route::get('/expatriate/create','Admin\ExpatriateController@create')->name('user_create');
    Route::post('/expatriate/create_basic_info','Admin\ExpatriateController@addBasicInfo')->name('basic_info_create');
    Route::post('/expatriate/store','Admin\ExpatriateController@store')->name('user_store');
    Route::get('/expatriate/{id}/edit','Admin\ExpatriateController@edit')->name('user_edit');
    Route::put('/expatriate/{id}/update','Admin\ExpatriateController@update')->name('user_update');
    Route::get('/expatriate/{id}/destroy','Admin\ExpatriateController@destroy')->name('user_destroy');
    Route::get('/expatriate/{id}/show','Admin\ExpatriateController@show')->name('user_show');


    /**
     * Religion creation
     */

    Route::resource('/religion', 'Admin\ReligionController');
    Route::get('/religion','Admin\ReligionController@index')->name('religion');
    Route::get('/religion/create','Admin\ReligionController@create')->name('religion_create');
    Route::post('/religion/store','Admin\ReligionController@store')->name('religion_store');
    Route::get('/religion/{id}/edit','Admin\ReligionController@edit')->name('religion_edit');
    Route::put('/religion/{id}/update','Admin\ReligionController@update')->name('religion_update');
    Route::get('/religion/{id}/destroy','Admin\ReligionController@destroy')->name('religion_destroy');

    /**
     * Language creation
     */

    Route::resource('/language', 'Admin\LanguageController');
    Route::get('/language','Admin\LanguageController@index')->name('language');
    Route::get('/language/create','Admin\LanguageController@create')->name('language_create');
    Route::post('/language/store','Admin\LanguageController@store')->name('language_store');
    Route::get('/language/{id}/edit','Admin\LanguageController@edit')->name('language_edit');
    Route::put('/language/{id}/update','Admin\LanguageController@update')->name('language_update');
    Route::get('/language/{id}/destroy','Admin\LanguageController@destroy')->name('language_destroy');

    /**
     * Skill creation
     */

    Route::resource('/skill', 'Admin\SkillController');
    Route::get('/skill','Admin\SkillController@index')->name('skill');
    Route::get('/skill/create','Admin\SkillController@create')->name('skill_create');
    Route::post('/skill/store','Admin\SkillController@store')->name('skill_store');
    Route::get('/skill/{id}/edit','Admin\SkillController@edit')->name('skill_edit');
    Route::put('/skill/{id}/update','Admin\SkillController@update')->name('skill_update');
    Route::get('/skill/{id}/destroy','Admin\SkillController@destroy')->name('skill_destroy');

    /**
     * Division creation
     */

    Route::resource('/division', 'Admin\DivisionController');
    Route::get('/division','Admin\DivisionController@index')->name('division');
    Route::get('/division/create','Admin\DivisionController@create')->name('division_create');
    Route::post('/division/store','Admin\DivisionController@store')->name('division_store');
    Route::get('/division/{id}/edit','Admin\DivisionController@edit')->name('division_edit');
    Route::put('/division/{id}/update','Admin\DivisionController@update')->name('division_update');
    Route::get('/division/{id}/destroy','Admin\DivisionController@destroy')->name('division_destroy');

    /**
     * District creation
     */

    //Route::resource('/division', 'Admin\DivisionController');
    Route::get('/district','Admin\DistrictController@index')->name('district');
    Route::get('/district/create','Admin\DistrictController@create')->name('district_create');
    Route::post('/district/store','Admin\DistrictController@store')->name('district_store');
    Route::get('/district/{id}/edit','Admin\DistrictController@edit')->name('district_edit');
    Route::put('/district/{id}/update','Admin\DistrictController@update')->name('district_update');
    Route::get('/district/{id}/destroy','Admin\DistrictController@destroy')->name('district_destroy');

    /**
     * City Corporation creation
     */

    //Route::resource('/division', 'Admin\DivisionController');
    Route::get('/citycorporation','Admin\CityCorporationController@index')->name('citycorporation');
    Route::get('/citycorporation/create','Admin\CityCorporationController@create')->name('citycorporation_create');
    Route::post('/citycorporation/store','Admin\CityCorporationController@store')->name('citycorporation_store');
    Route::get('/citycorporation/{id}/edit','Admin\CityCorporationController@edit')->name('citycorporation_edit');
    Route::put('/citycorporation/{id}/update','Admin\CityCorporationController@update')->name('citycorporation_update');
    Route::get('/citycorporation/{id}/destroy','Admin\CityCorporationController@destroy')->name('citycorporation_destroy');
    /**
     * Municipal creation
     */

    //Route::resource('/division', 'Admin\DivisionController');
    Route::get('/municipal','Admin\MunicipalController@index')->name('municipal');
    Route::get('/municipal/create','Admin\MunicipalController@create')->name('municipal_create');
    Route::post('/municipal/store','Admin\MunicipalController@store')->name('municipal_store');
    Route::get('/municipal/{id}/edit','Admin\MunicipalController@edit')->name('municipal_edit');
    Route::put('/municipal/{id}/update','Admin\MunicipalController@update')->name('municipal_update');
    Route::get('/municipal/{id}/destroy','Admin\MunicipalController@destroy')->name('municipal_destroy');

    /**
     * Union creation
     */

    //Route::resource('/division', 'Admin\DivisionController');
    Route::get('/union','Admin\UnionController@index')->name('union');
    Route::get('/union/create','Admin\UnionController@create')->name('union_create');
    Route::post('/union/store','Admin\UnionController@store')->name('union_store');
    Route::get('/union/{id}/edit','Admin\UnionController@edit')->name('union_edit');
    Route::put('/union/{id}/update','Admin\UnionController@update')->name('union_update');
    Route::get('/union/{id}/destroy','Admin\UnionController@destroy')->name('union_destroy');

    /**
     * Upazila creation
     */

    //Route::resource('/division', 'Admin\DivisionController');
    Route::get('/upazila','Admin\UpazilaController@index')->name('upazila');
    Route::get('/upazila/create','Admin\UpazilaController@create')->name('upazila_create');
    Route::post('/upazila/store','Admin\UpazilaController@store')->name('upazila_store');
    Route::get('/upazila/{id}/edit','Admin\UpazilaController@edit')->name('upazila_edit');
    Route::put('/upazila/{id}/update','Admin\UpazilaController@update')->name('upazila_update');
    Route::get('/upazila/{id}/destroy','Admin\UpazilaController@destroy')->name('upazila_destroy');

    /**
     * Educational Institute creation
     */

    //Route::resource('/division', 'Admin\DivisionController');
    Route::get('/education','Admin\EducationController@index')->name('education');
    Route::get('/education/create','Admin\EducationController@create')->name('education_create');
    Route::post('/education/store','Admin\EducationController@store')->name('education_store');
    Route::get('/education/{id}/edit','Admin\EducationController@edit')->name('education_edit');
    Route::put('/education/{id}/update','Admin\EducationController@update')->name('education_update');
    Route::get('/education/{id}/destroy','Admin\EducationController@destroy')->name('education_destroy');

    /**
     * Splash Screen creation
     */

    //Route::resource('/splashscreen', 'Admin\SplashScreenController');
    Route::get('/splashscreen','Admin\SplashScreenController@index')->name('splashscreen');
    Route::get('/splashscreen/create','Admin\SplashScreenController@create')->name('splashscreen_create');
    Route::post('/splashscreen/store','Admin\SplashScreenController@store')->name('splashscreen_store');
    Route::get('/splashscreen/{id}/edit','Admin\SplashScreenController@edit')->name('splashscreen_edit');
    Route::put('/splashscreen/{id}/update','Admin\SplashScreenController@update')->name('splashscreen_update');
    Route::get('/splashscreen/{id}/destroy','Admin\SplashScreenController@destroy')->name('splashscreen_destroy');

    /**
     * Customer type creation
     */
    Route::resource('/customertype', 'Admin\CustomerTypeController');

    /**
     * Bank creation
     */
    Route::get('/bank','Admin\BankController@index')->name('bank');
    Route::get('/bank/create','Admin\BankController@create')->name('bank_create');
    Route::post('/bank/store','Admin\BankController@store')->name('bank_store');
    Route::get('/bank/{id}/edit','Admin\BankController@edit')->name('bank_edit');
    Route::put('/bank/{id}/update','Admin\BankController@update')->name('bank_update');

    /**
     * Branch creation
     */
    Route::get('/branch','Admin\BranchController@index')->name('branch');
    Route::get('/branch/create','Admin\BranchController@create')->name('branch_create');
    Route::post('/branch/store','Admin\BranchController@store')->name('branch_store');
    Route::get('/branch/{id}/edit','Admin\BranchController@edit')->name('branch_edit');
    Route::put('/branch/{id}/update','Admin\BranchController@update')->name('branch_update');

    /**
     * Account Information creation
     */
    Route::get('/account_info','Admin\AccountInfoController@index')->name('account_info');
    Route::get('/account_info/create','Admin\AccountInfoController@create')->name('account_info_create');
    Route::post('/account_info/store','Admin\AccountInfoController@store')->name('account_info_store');
    Route::get('/account_info/{id}/edit','Admin\AccountInfoController@edit')->name('account_info_edit');
    Route::put('/account_info/{id}/update','Admin\AccountInfoController@update')->name('account_info_update');
    /**
     * Ajax requests
     */
    Route::get('/account_info/getBranchesByBank/{id}', 'Admin\AccountInfoController@getBranchesByBank')->name('branch_dropdown');

    /**
     * Country creation
     */
    Route::get('/country','Admin\CountryController@index')->name('country');
    Route::get('/country2','Admin\CountryController@index2')->name('country2');
    Route::get('/country3','Admin\CountryController@serverSideTable')->name('country3');
    //Route::post('allposts', 'PostController@allPosts' )->name('allposts');



    Route::get('/country/create','Admin\CountryController@create')->name('country_create');
    Route::post('/country/store','Admin\CountryController@store')->name('country_store');
    Route::get('/country/{id}/edit','Admin\CountryController@edit')->name('country_edit');
    Route::put('/country/{id}/update','Admin\CountryController@update')->name('country_update');
    Route::get('/country/{id}/destroy','Admin\CountryController@destroy')->name('country_destroy');


    /**
     * Discount creation
     */
    Route::get('/company','Admin\CompanyController@index')->name('company');
    Route::get('/company/create','Admin\CompanyController@create')->name('company_create');
    Route::post('/company/store','Admin\CompanyController@store')->name('company_store');
    Route::get('/company/{id}/edit','Admin\CompanyController@edit')->name('company_edit');
    Route::put('/company/{id}/update','Admin\CompanyController@update')->name('company_update');

    /**
     * Discount creation
     */
    Route::get('/discount','Admin\DiscountController@index')->name('discount');
    Route::get('/discount/create','Admin\DiscountController@create')->name('discount_create');
    Route::post('/discount/store','Admin\DiscountController@store')->name('discount_store');
    Route::get('/discount/{id}/edit','Admin\DiscountController@edit')->name('discount_edit');
    Route::put('/discount/{id}/update','Admin\DiscountController@update')->name('discount_update');

    /**
     * Customer creation
     */
    Route::get('/customer','Admin\CustomerController@index')->name('customer');
    Route::get('/customer/create','Admin\CustomerController@create')->name('customer_create');
    Route::post('/customer/store','Admin\CustomerController@store')->name('customer_store');
    Route::get('/customer/{id}/edit','Admin\CustomerController@edit')->name('customer_edit');
    Route::put('/customer/{id}/update','Admin\CustomerController@update')->name('customer_update');

    Route::match(['get', 'post'],'process_customer_data', 'Admin\CustomerController@process_customer_data')->name('process_customer_data')->middleware(['auth']);
    Route::match(['get', 'post'],'ajax_customer_table', 'Admin\CustomerController@ajax_customer_table')->name('ajax_customer_table')->middleware(['auth']);

    /**
     * Passenger creation
     */
    Route::get('/passenger','Admin\PassengerController@index')->name('passenger');
    Route::get('/passenger/create','Admin\PassengerController@create')->name('passenger_create');
    Route::post('/passenger/store','Admin\PassengerController@store')->name('passenger_store');
    Route::get('/passenger/{id}/edit','Admin\PassengerController@edit')->name('passenger_edit');
    Route::put('/passenger/{id}/update','Admin\PassengerController@update')->name('passenger_update');
    /**
     * Ajax requests
     */
    Route::get('/passenger/ajaxRequest', 'Admin\PassengerController@ajaxRequest');
    Route::post('/passenger/ajaxRequestPost', 'Admin\PassengerController@ajaxRequestPost');

    /**
     * Agency creation
     */
    Route::get('/agency','Admin\AgencyController@index')->name('agency');
    Route::get('/agency/create','Admin\AgencyController@create')->name('agency_create');
    Route::post('/agency/store','Admin\AgencyController@store')->name('agency_store');
    Route::get('/agency/{id}/show','Admin\AgencyController@show')->name('agency_show');
    Route::get('/agency/{id}/edit','Admin\AgencyController@edit')->name('agency_edit');
    Route::put('/agency/{id}/update','Admin\AgencyController@update')->name('agency_update');
    Route::get('/agency/{id}/destroy','Admin\AgencyController@destroy')->name('agency_destroy');

    /**
    * Passport creation
    */
    Route::get('/passport','Admin\PassportController@index')->name('passport');
    Route::get('/passport/create','Admin\PassportController@create')->name('passport_create');
    Route::post('/passport/store','Admin\PassportController@store')->name('passport_store');
    Route::get('/passport/{id}/show','Admin\PassportController@show')->name('passport_show');
    Route::get('/passport/{id}/edit','Admin\PassportController@edit')->name('passport_edit');
    Route::put('/passport/{id}/update','Admin\PassportController@update')->name('passport_update');
    Route::get('/passport/{id}/destroy','Admin\PassportController@destroy')->name('passport_destroy');

    /**
    * Training Center creation
    */
    Route::get('/training_center','Admin\TrainingCenterController@index')->name('training_center');
    Route::get('/training_center/create','Admin\TrainingCenterController@create')->name('training_center_create');
    Route::post('/training_center/store','Admin\TrainingCenterController@store')->name('training_center_store');
    Route::get('/training_center/{id}/show','Admin\TrainingCenterController@show')->name('training_center_show');
    Route::get('/training_center/{id}/edit','Admin\TrainingCenterController@edit')->name('training_center_edit');
    Route::put('/training_center/{id}/update','Admin\TrainingCenterController@update')->name('training_center_update');
    Route::get('/training_center/{id}/destroy','Admin\TrainingCenterController@destroy')->name('training_center_destroy');


    /**
     * Airline creation
     */
    Route::get('/airline','Admin\AirlineController@index')->name('airline');
    Route::get('/airline/create','Admin\AirlineController@create')->name('airline_create');
    Route::post('/airline/store','Admin\AirlineController@store')->name('airline_store');
    Route::get('/airline/{id}/edit','Admin\AirlineController@edit')->name('airline_edit');
    Route::put('/airline/{id}/update','Admin\AirlineController@update')->name('airline_update');

    /**
     * SalesExecutive creation
     */
    Route::get('/salesexecutive','Admin\SalesExecutiveController@index')->name('salesexecutive');
    Route::get('/salesexecutive/create','Admin\SalesExecutiveController@create')->name('salesexecutive_create');
    Route::post('/salesexecutive/store','Admin\SalesExecutiveController@store')->name('salesexecutive_store');
    Route::get('/salesexecutive/{id}/edit','Admin\SalesExecutiveController@edit')->name('salesexecutive_edit');
    Route::put('/salesexecutive/{id}/update','Admin\SalesExecutiveController@update')->name('salesexecutive_update');

    /**
     * Sector creation
     */
    Route::get('/sector','Admin\SectorController@index')->name('sector');
    Route::get('/sector/create','Admin\SectorController@create')->name('sector_create');
    Route::post('/sector/store','Admin\SectorController@store')->name('sector_store');
    Route::get('/sector/{id}/edit','Admin\SectorController@edit')->name('sector_edit');
    Route::put('/sector/{id}/update','Admin\SectorController@update')->name('sector_update');

    /**
     * Booking creation
     */
    Route::get('/booking','Admin\BookingController@index')->name('booking');
    Route::get('/booking/create','Admin\BookingController@create')->name('booking_create');
    Route::post('/booking/store','Admin\BookingController@store')->name('booking_store');
    Route::get('/booking/{id}/edit','Admin\BookingController@edit')->name('booking_edit');
    Route::put('/booking/{id}/update','Admin\BookingController@update')->name('booking_update');
    Route::get('/booking/passenger_dropdown','Admin\BookingController@passenger_dropdown')->name('passenger_dropdown');

    Route::get('/booking/show/{id}','Admin\BookingController@show');

    Route::get('/booking/get_ticket_code/{id}','Admin\BookingController@get_ticket_code')->name('get_ticket_code');
    /**
     * Visa Processing creation
     */
    Route::get('/visa_processing','Admin\VisaProcessingController@index')->name('visa_processing');
    Route::get('/visa_processing/create','Admin\VisaProcessingController@create')->name('visa_processing_create');
    Route::post('/visa_processing/store','Admin\VisaProcessingController@store')->name('visa_processing_store');
    Route::get('/visa_processing/{id}/edit','Admin\VisaProcessingController@edit')->name('visa_processing_edit');
    Route::put('/visa_processing/{id}/update','Admin\VisaProcessingController@update')->name('visa_processing_update');

    /**
     * SMS Content creation
     */
    Route::get('/sms_content','Admin\SmsContentController@index')->name('sms_content');
    Route::get('/sms_content/create','Admin\SmsContentController@create')->name('sms_content_create');
    Route::post('/sms_content/store','Admin\SmsContentController@store')->name('sms_content_store');
    Route::get('/sms_content/{id}/edit','Admin\SmsContentController@edit')->name('sms_content_edit');
    Route::put('/sms_content/{id}/update','Admin\SmsContentController@update')->name('sms_content_update');

    /**
     * SMS Gateway creation
     */
    Route::get('/sms_gateway','Admin\SmsGatewayController@index')->name('sms_gateway');
    Route::get('/sms_gateway/create','Admin\SmsGatewayController@create')->name('sms_gateway_create');
    Route::post('/sms_gateway/store','Admin\SmsGatewayController@store')->name('sms_gateway_store');
    Route::get('/sms_gateway/{id}/edit','Admin\SmsGatewayController@edit')->name('sms_gateway_edit');
    Route::put('/sms_gateway/{id}/update','Admin\SmsGatewayController@update')->name('sms_gateway_update');

    /**
     * Visa Info creation
     */
    Route::get('/visa_info','Admin\VisaInfoController@index')->name('visa_info');
    Route::get('/visa_info/create','Admin\VisaInfoController@create')->name('visa_info_create');
    Route::post('/visa_info/store','Admin\VisaInfoController@store')->name('visa_info_store');
    Route::get('/visa_info/{id}/edit','Admin\VisaInfoController@edit')->name('visa_info_edit');
    Route::put('/visa_info/{id}/update','Admin\VisaInfoController@update')->name('visa_info_update');

    /*
    * For the form views
    */
    Route::get('/sms_gateway/view1','Admin\SmsGatewayController@view1')->name('view1');
    Route::get('/sms_gateway/view2','Admin\SmsGatewayController@view2')->name('view2');
    Route::get('/sms_gateway/view3','Admin\SmsGatewayController@view3')->name('view3');

    /*
   * For the form views
   */
    Route::get('/sms_gateway/view1','Admin\SmsGatewayController@view1')->name('view1');
    Route::get('/sms_gateway/view2','Admin\SmsGatewayController@view2')->name('view2');
    Route::get('/sms_gateway/view3','Admin\SmsGatewayController@view3')->name('view3');

    /**
     * Cost Calculation
     */
    Route::get('/cost_calculation','Admin\CalculationController@index')->name('cost_calculation');
    Route::get('/get_commssion/{id}','Admin\CalculationController@get_commssion')->name('get_commssion');

    /**
     * Currency Info
     */
    Route::resource('currency','Admin\CurrencyInfoController');

    /**
     * Payment Method
     */
    Route::resource('payment_type','Admin\PaymentTypeController');

    /**
     * Payment Sources
     */
    Route::resource('payment_source','Admin\PaymentSourceController');

    /**
     * Collection Sources
     */
    Route::resource('collection','Admin\CollectionController');

    /**
     * Invoice Moduel
     */
    Route::get('generate_invoice/{sales_id?}','Admin\InvoiceController@create')->name('generate_invoice');
    Route::get('invoice/{sales_id}','Admin\InvoiceController@view')->name('invoice_view');
    Route::post('invoice/store','Admin\InvoiceController@store')->name('invoice_store');
    Route::get('invoice/show/{id}','Admin\InvoiceController@show')->name('invoice_view');

    /**
     * Sales Report for duration
     */
    Route::get('report/sales_by_duration','Admin\ReportSalesController@sales_by_duration');
    Route::get('report/sales_by_duration_excel','Admin\ReportSalesController@sales_by_duration_excel')->name('sales_by_duration_excel');

    Route::get('report/issue_ticket','Admin\ReportSalesController@issue_ticket');
    Route::get('report/money_receipt','Admin\ReportSalesController@money_receipt');

    Route::get('report/bangla_inbound_form','Admin\ReportSalesController@bangla_inbound_form');
    Route::get('report/english_inbound_form','Admin\ReportSalesController@english_inbound_form');
    Route::get('report/inbound_form_index','Admin\ReportSalesController@inbound_form_index');
    Route::match(['get','post'],'report/generate_inbound_form','Admin\ReportSalesController@generate_inbound_form')->name('generate_inbound_form');

    /**
     * Due report
     */
    Route::get('report/due_report','Admin\ReportDueController@due_report');
    Route::get('report/due_report_excel','Admin\ReportDueController@due_report_excel')->name('due_report_excel');

    Route::get('report/deposite_slip','Admin\ReportSalesController@deposite_slip');

    Route::get('report/bank_delivery','Admin\ReportSalesController@bank_delivery');
    /*
    * For the form views
    */
    Route::get('/iata/bank_form','Admin\IATAController@bank_form')->name('bank_form');
    Route::get('/iata/iata_form_input','Admin\IATAController@iata_form_input')->name('iata_form_input');
    Route::match(['get', 'post'],'/iata/generate_iata_form','Admin\IATAController@iata_form')->name('generate_iata_form');
    Route::get('/iata/sales_form','Admin\IATAController@sales_form')->name('sales_form');

    /**
     * Customer Consignment
     */
    Route::get('/consignment','Admin\ConsignmentController@index')->name('customer_consignment');
    Route::get('/consignment/create','Admin\ConsignmentController@create')->name('customer_consignment_create');
    Route::post('/consignment/store','Admin\ConsignmentController@store')->name('customer_consignment_store');
    Route::get('/consignment/{id}/edit','Admin\ConsignmentController@edit')->name('customer_consignment_edit');
    Route::put('/consignment/{id}/update','Admin\ConsignmentController@update')->name('customer_consignment_update');

    /**
     * Client Ledger
     */
    Route::get('report/client_ledger','Admin\ReportSalesController@client_ledger')->name('client_ledger');

    /**
     * Departure Sources
     */
     Route::get('departure/inbound','Admin\DepartureCardController@show_inbound')->name('show_inbound');
     Route::match(['get', 'post'],'departure/generate_inbound_form','Admin\DepartureCardController@generate_inbound_form')->name('generate_inbound_form');
     Route::get('departure/outbound','Admin\DepartureCardController@show_outbound')->name('show_outbound');
     Route::match(['get', 'post'],'departure/generate_departure_card','Admin\DepartureCardController@generate_departure_card')->name('generate_departure_card');
});


/**
 * Report Ajax Load
 */

Route::match(['get', 'post'],'sales_for_duration_ajax', 'Admin\ReportSalesController@sales_for_duration_ajax')->name('sales_for_duration_ajax')->middleware(['auth']);
Route::match(['get', 'post'],'due_report_ajax', 'Admin\ReportDueController@due_report_ajax')->name('due_report_ajax')->middleware(['auth']);


/**
 * Common Ajax load
 */
Route::get('getInvoice/{id}','Admin\CommonAjaxController@getInvoiceById')->middleware(['auth'])->name('getInvoice');
Route::get('getBranches/{id}','Admin\CommonAjaxController@getBranchesById')->middleware(['auth'])->name('getBranches');




Route::get('update','Admin\UpdatePassController@changePass')->name('upd_pass')->middleware(['auth']);
Route::post('reset','Admin\UpdatePassController@passwordChange')->name('reset_pass')->middleware(['auth']);



Route::get('checkpage',function (){
    return view('admin.userinfo.newpasschange');
});


Route::get('/', 'Auth\LoginController@login')->name('login');
Route::get('login', 'Auth\LoginController@login')->name('login');
// Route::get('register', 'Auth\RegisterController@register')->name('register');
// Route::post('register', 'Auth\RegisterController@create');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');



###Ajax Routes start here
//Route::post('ajax/devicebyasset', [
//    'uses' => 'Admin\CompanyDeviceController@getDeviceByAsset',
//    'as' => 'ajax.devicebyasset'
//]);
//Route::post('ajax/devicebyassetall', [
//    'uses' => 'Admin\CompanyDeviceController@getDeviceByAssetAll',
//    'as' => 'ajax.devicebyassetall'
//]);
//Route::post('ajax/devicebyassetcustomer', [
//    'uses' => 'Admin\CustomerDeviceController@getDeviceByAsset',
//    'as' => 'ajax.devicebyassetcustomer'
//]);
//Route::post('ajax/devicebyassetcustomerall', [
//    'uses' => 'Admin\CustomerDeviceController@getDeviceByAssetAll',
//    'as' => 'ajax.devicebyassetcustomerall'
//]);
