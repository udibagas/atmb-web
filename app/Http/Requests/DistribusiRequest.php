<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistribusiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'atm_id' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'nama_petugas' => 'required',
            'telpon_petugas' => 'required',
        ];
    }
}
