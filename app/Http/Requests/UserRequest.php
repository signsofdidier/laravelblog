<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'is_active' => 'required|in:0,1',
            'role_id' => 'required|array|exists:roles,id',
            'photo_id' => 'nullable|image|mimes:jpg, jpeg, png, gif|max:2048'
        ];
    }

        public function messages(){
            return [
                'name.required' => 'De naam is verplicht.',
                'email.required' => 'Het e-mailadres is verplicht.',
                'email.email' => 'Voer een geldig e-mailadres in.',
                'email.unique' => 'Dit e-mailadres is al in gebruik.',
                'role_id.required' => 'Selecteer minimaal 1 rol voor de gebruiker.',
                'role_id.*.exists' => '1 van de geselecteerde rollen bestaat niet.',
                'role_id.array' => 'De rollen moeten een lijst van ID\'s zijn.',
                'is_active.required' => 'Selecteer of de gebruiker actief is.',
                'photo_id.image' => 'De geüploade afbeelding moet een geldig afbeeldingsbestand zijn.',
            ];
        }
}
