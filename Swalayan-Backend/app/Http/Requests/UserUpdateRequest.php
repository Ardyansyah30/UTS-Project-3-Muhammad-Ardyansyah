<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      "email" => 'required|email',
      "nik" => 'required|min:15|max:16',
      "nama" => 'required',
      "jenis_kelamin" => 'required',
      "tanggal_lahir" => 'required',
      "tempat_lahir" => 'required',
      "no_hp" => 'required',
      "kode_pos" => 'required',
      "alamat" => 'required',
      "img_url" => 'required'
    ];
  }

  protected function failedValidation(Validator $validator)
  {
      throw new HttpResponseException(response([
          'errors' => $validator->getMessageBag()
      ], 400));
  }
}
