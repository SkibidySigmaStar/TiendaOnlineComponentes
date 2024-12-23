<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;

class Account extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'accounts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'role_id',
        'username',
        'email',
        'password',
        'picture_profile',
        'state',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relación con el modelo Employee. (uno-uno)
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'account_id');
    }

    // Relación con el modelo Client (uno a uno)
    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'account_id');
    }

    //Relación con el modelo Role (uno-muchos)
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


    //PARA LA AUTENTICACION
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getAttribute('id');
    }

    public function getAuthPassword()
    {
        return $this->getAttribute('password');
    }

    public function getAuthPasswordName()
    {
        return 'password';
    }

    public function getRememberToken()
    {
        return $this->getAttribute('remember_token');
    }

    public function setRememberToken($value)
    {
        $this->setAttribute('remember_token', $value);
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
