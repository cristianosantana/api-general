<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'id',
        'name', 
        'acronym'
    ];

    public function getDepartments()
    {
        return $this->belongsToMany(Concessionaire::class, 'concessionaire_departments', 'id_department', 'id_concessionaire');
    }
}
