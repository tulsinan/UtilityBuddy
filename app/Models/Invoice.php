<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Invoice extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;

    public $table = 'invoices';

    protected $dates = [
        'date',
        'date_due',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PAYMENT_STATUS_SELECT = [
        'pay_success' => 'Fully Paid',
        'pay_failure' => 'Not Paid',
        'pay_over'    => 'Overpaid',
    ];

    protected $fillable = [
        'utility_type_id',
        'utility_companyname_id',
        'account_number_id',
        'property_type_id',
        'date',
        'date_due',
        'amount',
        'description',
        'payment_status',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function utility_type()
    {
        return $this->belongsTo(UtilityCategory::class, 'utility_type_id');
    }

    public function utility_companyname()
    {
        return $this->belongsTo(UtilityCategory::class, 'utility_companyname_id');
    }

    public function account_number()
    {
        return $this->belongsTo(UtilityAccount::class, 'account_number_id');
    }

    public function property_type()
    {
        return $this->belongsTo(UtilityAccount::class, 'property_type_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateDueAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateDueAttribute($value)
    {
        $this->attributes['date_due'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}