<?php

namespace App\Models;

use App\Notifications\OrderStatusNotification;
use Cknow\Money\Money;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Notification;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Pending' => 'Pending',
        'Processing' => 'Processing',
        'On Way' => 'On Way',
        'Delivered' => 'Delivered',
        'Cancelled' => 'Cancelled',
        'Paid' => 'Paid',
    ];

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(ShippingType::class, 'shipping_id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function setOrderNo(string $prefix = 'ORD'.'-', $pad_string = '0', int $len = 8)
    {
        $orderNo = $prefix.str_pad($this->id, $len, $pad_string, STR_PAD_LEFT);
        $this->order_no = $orderNo;
        $this->update();
    }

    public static function booting()
    {
        self::updated(function (Order $order) {
            if ($order->isDirty('status') && in_array($order->status, ['Pending', 'Processing', 'On Way', 'Delivered', 'Cancelled', 'Paid'])) {
                Notification::route('mail', $order->email)->notify(new OrderStatusNotification($order->status));
            }
        });
    }

    public function formattedTotal():Money
    {
        return  Money::RWF($this->total);
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
