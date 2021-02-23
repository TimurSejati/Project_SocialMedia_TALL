<?php

namespace App\Models;

use App\Models\Status;
use App\Models\User;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use Likeable;
    protected $with = ['user']; // Untuk menghindari n+1 problem
    protected $fillable = ['body', 'hash', 'parent_id', 'status_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
