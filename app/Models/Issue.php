<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_date',
        'returned_date',
        'status'
    ];

    public function book(){
        return $this->belongsTo(Book::class,'book_id');
    }
}
