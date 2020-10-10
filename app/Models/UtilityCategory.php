<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class UtilityCategory extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'utility_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const UTILITY_TYPE_SELECT = [
        'electricity' => 'Electricity',
        'water'       => 'Water',
        'gas'         => 'Gas',
    ];

    protected $fillable = [
        'utility_type',
        'utility_name',
        'utility_website',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}