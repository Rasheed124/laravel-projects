<?php
namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function authId()
    {
        $user = Auth::user();

        return $user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'social.*'                     => 'nullable|url',
            'options.disable_comments'     => 'boolean',
            'options.moderate_comments'    => 'boolean',
            'options.email_notification.*' => 'nullable',
            'user.username'                => 'required|max:30|unique:users,username,' . Auth::id(),
            'user.name'                    => 'required|string',
            'user.profile_image'           => 'nullable|image',
            'user.cover_image'             => 'nullable|image',
            'user.city'                    => 'nullable|string',
            'user.country'                 => 'nullable|string',
            'user.about_me'                => 'nullable|string',
            'account.email'                => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::id())],
            'account.password'             => [
                Rule::requiredIf(
                    $this->account['email'] !== Auth::user()->email || ! empty($this->account['new_password']),
                    function ($attribute, $value, $fail) {
                        if (! empty($value) && Hash::check($value, Auth::user()->password)) {
                            $fail("The password is incorrect");
                        }
                    }
                ),
            ],
            'account.new_password'         => 'confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'social.facebook'      => 'facebook',
            'social.twitter'       => 'twitter',
            'social.instagram'     => 'instagram',
            'social.website'       => 'website',
            'user.username'        => 'username',
            'user.name'            => 'name',
            'user.profile_image'   => 'profile image',
            'user.cover_image'     => 'cover image',
            'user.city'            => 'city',
            'user.country'         => 'country',
            'user.about_me'        => 'about me',
            'account.email'        => 'email',
            'account.password'     => 'current password',
            'account.new_password' => 'new password',

        ];
    }

    public function getData()
    {

        $data = $this->validated();

        $directory = User::makeDirectory();
        $directory = $directory . "/user-" . Auth::id();

        if ($this->hasFile('user.profile_image')) {
            $data['user']['profile_image'] = $this->file('user.profile_image')->store($directory, 'public');
        }

        if ($this->hasFile('user.cover_image')) {
            $data['user']['cover_image'] = $this->file('user.cover_image')->store($directory, 'public');
        }

        if (! empty($data['account']['password'])) {
            $data['user']['email'] = $data['account']['email'];
        }

        if (! empty($data['account']['new_password'])) {
            $data['user']['password'] = Hash::make($data['account']['new_password']);
        }

        unset($data['account']);

        return $data;
    }
}
