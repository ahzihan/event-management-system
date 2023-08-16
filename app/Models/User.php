<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    protected $fillable=['firstName','lastName','email','mobile','password','otp'];
    protected $attributes=[
        'otp'=>'0',
    ];

    public function events():HasMany
    {
        return $this->hasMany(Event::class);
    }

}
