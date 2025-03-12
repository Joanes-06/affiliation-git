<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lastname', 
        'firstname', 
        'email', 
        'password', 
        'phone', 
        'ville', 
        'code_promo',
        'inviteur_id',
        'generation1_id',
        'generation2_id',
        'last_vcard_downloads'
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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
            'password' => 'hashed',
            'last_vcard_downloads' => 'array',
        ];
    }
    /**
     * Obtenir le lien de parrainage de l'utilisateur
     */
    public function getPromotionLinkAttribute()
    {
        return url('/register?code=' . $this->code_promo);
    }

    /**
     * Relation avec l'utilisateur qui a invité
     */
    public function inviteur()
    {
        return $this->belongsTo(User::class, 'inviteur_id');
    }

    /**
     * Relation avec les utilisateurs invités directement
     */
    public function invites()
    {
        return $this->hasMany(User::class, 'inviteur_id');
    }
}