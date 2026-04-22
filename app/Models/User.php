<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'profile_image',
        'cover_image',
        'city',
        'country',
        'about_me',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role'              => \App\Enums\Role::class,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function profileImageUrl()
    {
        return Storage::url($this->profile_image ? $this->profile_image : "users/user-default.png");
    }

    public function coverImageUrl()
    {
        return Storage::url($this->cover_image);
    }

    public static function makeDirectory()
    {
        $directory = 'users';
        Storage::makeDirectory($directory);
        return $directory;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasCoverImage()
    {
        return ! ! $this->cover_image;
    }

    public function social()
    {
        return $this->hasOne(Social::class)->withDefault(); // , "id_user", "_id");
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function url()
    {
        return route('author.show', $this->username);
    }

    public function inlineProfile()
    {
        return collect([
            $this->name,
            trim(join("/", [$this->city, $this->country]), "/"),
            "Member since " . $this->created_at->toFormattedDateString(),
            $this->getImagesCount(),
        ])->filter()->implode(" • ");
    }

    public function getImagesCount()
    {
        $imagesCount = $this->images()->published()->count();
        return $imagesCount . ' ' . str()->plural('image', $imagesCount);
    }

    public function updateSettings($data)
    {
        $this->update($data['user']);
        $this->updateSocialProfile($data['social']);
        $this->updateOptions($data['options']);
    }

    protected function updateOptions($options)
    {
        $this->setting()->update($options);

        // This ensures that even if the 'booted' method missed them,
        // the record is created when they hit 'Save'.
        // return $this->setting()->updateOrCreate(
        //     ['user_id' => $this->id],
        //     $options
        // );
    }

    protected function updateSocialProfile($social)
    {
        Social::updateOrCreate(
            ['user_id' => $this->id],
            $social
        );
    }

    public function setting()
    {
        // return $this->hasOne(Setting::class)->withDefault();
        return $this->hasOne(Setting::class)->withDefault([
            'email_notification' => [
                'new_comment' => 1,
                'new_image'   => 1,
            ],
        ]);
    }

    protected static function booted()
    {
        static::created(function ($user) {
            $user->setting()->create([
                "email_notification" => [
                    "new_comment" => 1,
                    "new_image"   => 1,
                ],
            ]);
        });
    }
}
