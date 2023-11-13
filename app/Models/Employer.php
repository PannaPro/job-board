<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = ['company_name'];
    
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
