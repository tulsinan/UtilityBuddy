<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PaymentHistory extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;

    public $table = 'payment_histories';

    const PAYMENT_STATUS_SELECT = [
        'success' => 'Success',
        'fail'    => 'Fail',
    ];

    protected $dates = [
        'created_at',
        'payment_date',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'account_number_id',
        'invoice_date_id',
        'invoice_amount_id',
        'gateway_name_id',
        'payment_status',
        'created_at',
        'payment_date',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function account_number()
    {
        return $this->belongsTo(UtilityAccount::class, 'account_number_id');
    }

    public function invoice_date()
    {
        return $this->belongsTo(Invoice::class, 'invoice_date_id');
    }

    public function invoice_amount()
    {
        return $this->belongsTo(Invoice::class, 'invoice_amount_id');
    }

    public function gateway_name()
    {
        return $this->belongsTo(PaymentGateway::class, 'gateway_name_id');
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}