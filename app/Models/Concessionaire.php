<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concessionaire extends Model
{
    use HasFactory;


    protected $table = 'concessionaires';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'cnpj',
    ];

    public function getconcessionaires()
    {
        return $this->belongsToMany(Department::class, 'concessionaire_departments', 'id_concessionaire', 'id_department');
    }
}
