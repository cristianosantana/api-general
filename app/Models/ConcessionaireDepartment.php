<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcessionaireDepartment extends Model
{
    use HasFactory;
    
    protected $table = 'concessionaire_departments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_concessionaire',
        'id_department',
    ];
}
