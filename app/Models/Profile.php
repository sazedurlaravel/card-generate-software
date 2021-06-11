<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'comments',
    //     'user_id',
    //     'company_prefix',
    //     'status',
    // ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function pouroshova(){
        return $this->belongsTo('App\Models\Pouroshova');
    }

    public function union(){
        return $this->belongsTo('App\Models\Union');
    }

    public function cards(){
        return $this->hasMany('App\Models\Card');
    }
}
