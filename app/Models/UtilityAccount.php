<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class UtilityAccount extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;

    public $table = 'utility_accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ACCOUNT_STATUS_SELECT = [
        'active'     => 'Active',
        'inactive'   => 'Inactive',
        'terminated' => 'Terminated',
        'suspended'  => 'Suspended',
    ];

    protected $fillable = [
        'utility_type_id',
        'utility_name_id',
        'account_number',
        'account_name',
        'account_phone',
        'property_type',
        'account_status',
        'address_line_1',
        'address_line_2',
        'town',
        'city',
        'state',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    const PROPERTY_TYPE_SELECT = [
        'domestic'         => 'Domestic',
        'commercial'       => 'Commercial',
        'industrial'       => 'Industrial',
        'mining'           => 'Mining',
        'street_lighting'  => 'Street Lighting',
        'agriculture'      => 'Specific Agriculture',
        'government'       => 'Government Department',
        'place_of_worship' => 'Place of Worship',
        'charity'          => 'Charitable Organization',
    ];

    const STATE_SELECT = [
        'Johor'           => 'Johor',
        'Kedah'           => 'Kedah',
        'Kelantan'        => 'Kelantan',
        'Malacca'         => 'Malacca',
        'Negeri Sembilan' => 'Negeri Sembilan',
        'Pahang'          => 'Pahang',
        'Penang'          => 'Penang',
        'Perak'           => 'Perak',
        'Perlis'          => 'Perlis',
        'Sabah'           => 'Sabah',
        'Sarawak'         => 'Sarawak',
        'Selangor'        => 'Selangor',
        'Terengganu'      => 'Terengganu',
        'Kuala Lumpur'    => 'Kuala Lumpur',
        'Labuan'          => 'Labuan',
        'Putrajaya'       => 'Putrajaya',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function utility_type()
    {
        return $this->belongsTo(UtilityCategory::class, 'utility_type_id');
    }

    public function utility_name()
    {
        return $this->belongsTo(UtilityCategory::class, 'utility_name_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}