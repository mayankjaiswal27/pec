<?php

// app/Models/UserResponse.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'response'];

    // Define relationships or additional methods if needed
}
