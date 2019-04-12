<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner'
    ];
}
