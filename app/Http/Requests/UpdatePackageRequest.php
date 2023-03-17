<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePackageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'transaction_id' => 'required|string',
                'customer_name' => 'required|string',
                'customer_code' => 'required|string',
                'transaction_amount' => 'required|string',
                'transaction_discount' => 'string',
                'transaction_additional_field' => 'nullable|string',
                'transaction_payment_type' => 'required|string',
                'transaction_state' => 'required|string',
                'transaction_code' => 'required|string',
                'transaction_order' => 'required|integer',
                'location_id' => 'required|string',
                'organization_id' => 'required|integer',
                'created_at' => 'required|string',
                'updated_at' => 'required|string',
                'transaction_payment_type_name' => 'required|string',
                'transaction_cash_amount' => 'integer',
                'transaction_cash_change' => 'integer',
                'customer_attribute.Nama_Sales' => 'string',
                'customer_attribute.TOP' => 'string',
                'customer_attribute.Jenis_Pelanggan' => 'string',
                'connote.connote_id' => 'required|string',
                'connote.connote_number' => 'required|integer',
                'connote.connote_service' => 'required|string',
                'connote.connote_service_price' => 'required|integer',
                'connote.connote_amount' => 'required|integer',
                'connote.connote_booking_code' => 'nullable|string',
                'connote.connote_order' => 'required|integer',
                'connote.connote_state' => 'required|string',
                'connote.connote_state_id' => 'required|integer',
                'connote.zone_code_from' => 'required|string',
                'connote.zone_code_to' => 'required|string',
                'connote.surcharge_amount' => 'nullable|integer', //perlu di elaborasi
                'connote.transaction_id' => 'required|string',
                'connote.actual_weight' => 'required|integer',
                'connote.volume_weight' => 'integer',
                'connote.chargeable_weight' => 'required|integer',
                'connote.created_at' => 'required|string',
                'connote.updated_at' => 'required|string',
                'connote.organization_id' => 'required|integer',
                'connote.location_id' => 'required|string',
                'connote.connote_total_package' => 'required|string',
                'connote.connote_surcharge_amount' => 'string',
                'connote.connote_sla_day' => 'required|string',
                'connote.location_name' => 'required|string',
                'connote.location_type' => 'required|string',
                'connote.source_tariff_db' => 'required|string',
                'connote.id_source_tariff' => 'required|string',
                'connote.pod' => 'nullable|string',
                'connote.history' => 'array',
                'connote_id' => 'required|string',
                'origin_data.customer_name' => 'required|string',
                'origin_data.customer_address' => 'required|string',
                'origin_data.customer_email' => 'nullable|string',
                'origin_data.customer_phone' => 'required|string',
                'origin_data.customer_address_detail' => 'nullable|string',
                'origin_data.customer_zip_code' => 'string',
                'origin_data.customer_zip_code' => 'string',
                'origin_data.zone_code' => 'string',
                'origin_data.organization_id' => 'integer',
                'origin_data.location_id' => 'string',
                'destination_data.customer_name' => 'required|string',
                'destination_data.customer_address' => 'required|string',
                'destination_data.customer_email' => 'nullable|string',
                'destination_data.customer_phone' => 'required|string',
                'destination_data.customer_address_detail' => 'nullable|string',
                'destination_data.customer_zip_code' => 'string',
                'destination_data.customer_zip_code' => 'string',
                'destination_data.zone_code' => 'string',
                'destination_data.organization_id' => 'integer',
                'destination_data.location_id' => 'string',
                'koli_data.*.koli_length' => 'integer',
                'koli_data.*.awb_url' => 'required|string',
                'koli_data.*.created_at' => 'required|string',
                'koli_data.*.koli_chargeable_weight' => 'required|integer',
                'koli_data.*.koli_width' => 'integer',
                'koli_data.*.koli_surcharge' => 'array',
                'koli_data.*.koli_height' => 'integer',
                'koli_data.*.updated_at' => 'string',
                'koli_data.*.koli_description' => 'string',
                'koli_data.*.koli_formula_id' => 'nullable|integer',
                'koli_data.*.connote_id' => 'string',
                'koli_data.*.koli_volume' => 'integer',
                'koli_data.*.koli_weight' => 'required|integer',
                'koli_data.*.koli_id' => 'required|string',
                'koli_data.*.koli_custom_field.awb_sicepat' => 'nullable|string',
                'koli_data.*.koli_custom_field.harga_barang' => 'nullable|integer',
                'koli_data.*.koli_code' => 'required|string',
                'custom_field.catatan_tambahan' => 'string',
                'currentLocation.name' => 'required|string',
                'currentLocation.code' => 'required|string',
                'currentLocation.code' => 'required|string',
            ];
        } else {
            return [
                'transaction_id' => 'sometimes|required|string',
                'customer_name' => 'sometimes|required|string',
                'customer_code' => 'sometimes|required|string',
                'transaction_amount' => 'sometimes|required|string',
                'transaction_discount' => 'sometimes|string',
                'transaction_additional_field' => 'sometimes|nullable|string',
                'transaction_payment_type' => 'sometimes|required|string',
                'transaction_state' => 'sometimes|required|string',
                'transaction_code' => 'sometimes|required|string',
                'transaction_order' => 'sometimes|required|integer',
                'location_id' => 'sometimes|required|string',
                'organization_id' => 'sometimes|required|integer',
                'created_at' => 'sometimes|required|string',
                'updated_at' => 'sometimes|required|string',
                'transaction_payment_type_name' => 'sometimes|required|string',
                'transaction_cash_amount' => 'sometimes|integer',
                'transaction_cash_change' => 'sometimes|integer',
                'customer_attribute.Nama_Sales' => 'sometimes|string',
                'customer_attribute.TOP' => 'sometimes|string',
                'customer_attribute.Jenis_Pelanggan' => 'sometimes|string',
                'connote.connote_id' => 'sometimes|required|string',
                'connote.connote_number' => 'sometimes|required|integer',
                'connote.connote_service' => 'sometimes|required|string',
                'connote.connote_service_price' => 'sometimes|required|integer',
                'connote.connote_amount' => 'sometimes|required|integer',
                'connote.connote_booking_code' => 'sometimes|nullable|string',
                'connote.connote_order' => 'sometimes|required|integer',
                'connote.connote_state' => 'sometimes|required|string',
                'connote.connote_state_id' => 'sometimes|required|integer',
                'connote.zone_code_from' => 'sometimes|required|string',
                'connote.zone_code_to' => 'sometimes|required|string',
                'connote.surcharge_amount' => 'sometimes|nullable|integer', //perlu di elaborasi
                'connote.transaction_id' => 'sometimes|required|string',
                'connote.actual_weight' => 'sometimes|required|integer',
                'connote.volume_weight' => 'sometimes|integer',
                'connote.chargeable_weight' => 'sometimes|required|integer',
                'connote.created_at' => 'sometimes|required|string',
                'connote.updated_at' => 'sometimes|required|string',
                'connote.organization_id' => 'sometimes|required|integer',
                'connote.location_id' => 'sometimes|required|string',
                'connote.connote_total_package' => 'sometimes|required|string',
                'connote.connote_surcharge_amount' => 'sometimes|string',
                'connote.connote_sla_day' => 'sometimes|required|string',
                'connote.location_name' => 'sometimes|required|string',
                'connote.location_type' => 'sometimes|required|string',
                'connote.source_tariff_db' => 'sometimes|required|string',
                'connote.id_source_tariff' => 'sometimes|required|string',
                'connote.pod' => 'sometimes|nullable|string',
                'connote.history' => 'sometimes|array',
                'connote_id' => 'sometimes|required|string',
                'origin_data.customer_name' => 'sometimes|required|string',
                'origin_data.customer_address' => 'sometimes|required|string',
                'origin_data.customer_email' => 'sometimes|nullable|string',
                'origin_data.customer_phone' => 'sometimes|required|string',
                'origin_data.customer_address_detail' => 'sometimes|nullable|string',
                'origin_data.customer_zip_code' => 'sometimes|string',
                'origin_data.customer_zip_code' => 'sometimes|string',
                'origin_data.zone_code' => 'sometimes|string',
                'origin_data.organization_id' => 'sometimes|integer',
                'origin_data.location_id' => 'sometimes|string',
                'destination_data.customer_name' => 'sometimes|required|string',
                'destination_data.customer_address' => 'sometimes|required|string',
                'destination_data.customer_email' => 'sometimes|nullable|string',
                'destination_data.customer_phone' => 'sometimes|required|string',
                'destination_data.customer_address_detail' => 'sometimes|nullable|string',
                'destination_data.customer_zip_code' => 'sometimes|string',
                'destination_data.customer_zip_code' => 'sometimes|string',
                'destination_data.zone_code' => 'sometimes|string',
                'destination_data.organization_id' => 'sometimes|integer',
                'destination_data.location_id' => 'sometimes|string',
                'koli_data.*.koli_length' => 'sometimes|integer',
                'koli_data.*.awb_url' => 'sometimes|required|string',
                'koli_data.*.created_at' => 'sometimes|required|string',
                'koli_data.*.koli_chargeable_weight' => 'sometimes|required|integer',
                'koli_data.*.koli_width' => 'sometimes|integer',
                'koli_data.*.koli_surcharge' => 'sometimes|array',
                'koli_data.*.koli_height' => 'sometimes|integer',
                'koli_data.*.updated_at' => 'sometimes|string',
                'koli_data.*.koli_description' => 'sometimes|string',
                'koli_data.*.koli_formula_id' => 'sometimes|nullable|integer',
                'koli_data.*.connote_id' => 'sometimes|string',
                'koli_data.*.koli_volume' => 'sometimes|integer',
                'koli_data.*.koli_weight' => 'sometimes|required|integer',
                'koli_data.*.koli_id' => 'sometimes|required|string',
                'koli_data.*.koli_custom_field.awb_sicepat' => 'sometimes|nullable|string',
                'koli_data.*.koli_custom_field.harga_barang' => 'sometimes|nullable|integer',
                'koli_data.*.koli_code' => 'sometimes|required|string',
                'custom_field.catatan_tambahan' => 'sometimes|string',
                'currentLocation.name' => 'sometimes|required|string',
                'currentLocation.code' => 'sometimes|required|string',
                'currentLocation.code' => 'sometimes|required|string',
            ];
        }
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
            'meta' => [
                'success'   => false,
                'message'   => $validator->errors()->first(),
                'pagination' => null
            ],
            'data' => []
        ]));
    }
}
