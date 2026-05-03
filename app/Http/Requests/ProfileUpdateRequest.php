<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            
            // New Profile Fields
            'username'     => ['nullable', 'string', 'max:50', Rule::unique(User::class)->ignore($this->user()->id)],
            'about_me'     => ['nullable', 'string', 'max:1000'],
            'country'      => ['nullable', 'string', 'max:100'],
            'city'         => ['nullable', 'string', 'max:100'],
            'phone'        => ['nullable', 'string', 'max:20'],
            'website'      => ['nullable', 'url', 'max:255'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            
            // Validating Social Links (JSON/Array)
            'social_links'           => ['nullable', 'array'],
            'social_links.facebook'  => ['nullable', 'url'],
            'social_links.twitter'   => ['nullable', 'url'],
            'social_links.linkedin'  => ['nullable', 'url'],
            'social_links.instagram' => ['nullable', 'url'],
        ];
    }
}