<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idanggota' => 'required|exists:anggotas,idanggota',
            'idbuku' => 'required|exists:tbbuku,idbuku',
            'tglpinjam' => 'required|date',
            'tglkembali' => 'required|date|after_or_equal:tglpinjam',
        ];
    }
}
