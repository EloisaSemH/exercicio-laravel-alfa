<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'uuid',
        'name',
        'contact',
        'email'
    ];

    public function setEmailAttribute(string $value)
    {
        $this->attributes['email'] = mb_strtolower($value);
    }
}
