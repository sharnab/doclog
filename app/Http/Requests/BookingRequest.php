<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "booking_date"          => "required",
            "airlines_id"           => "required",
            "passenger_id"          => "required",
            "ticket_type"           => "required",
            "ticket_number"         => "required",
//            "flight_number"         => "required",
//            "visiting_purpose"      => "required",
            "sector_id"             => "required",
            "base_fare"             => "required",
            "tax"                   => "required",
            "ait"                   => "required",
            "airlines_vat"          => "required",
            "total_fare"            => "required",
//            "customer_charged"      => "required",
            "payable_amount"        => "required",
            // "actual_payable_amount" => "required",
            // "paid_amount"           => "required",
            "agency_id"             => "required",
//            "issue_type"            => "required",
            "reference_id"          => "required",
            "staff_id"              => "required",
            "active_status"         => "required",
            "image"                 => "image|mimes:jpeg,png,jpg,gif,svg|max:5120",
        ];
    }
}
