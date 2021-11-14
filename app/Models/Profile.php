<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Profile extends Model
    {
        use HasFactory;

        protected $table = 'profiles';
        protected $guarded = [];
//        protected $fillable = ['name', 'email', 'description', 'user_id'];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }
