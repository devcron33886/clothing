<?php

namespace App\Models;

use Cknow\Money\Money;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingType extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'shipping_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function formattedPrice(): Money
    {
        return Money::RWF($this->price);
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
