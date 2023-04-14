<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [''];

    const STATUS_DEFAULT = 1;
    const STATUS_CONFIRM = 2;
    const STATUS_WAIT_FOR_PAY = 3;
    const STATUS_PAID = 4;
    const STATUS_CANCEL = -1;

    public $statusConfig = [
        self::STATUS_DEFAULT => [
            'name' => 'Khởi tạo',
            'status' => self::STATUS_DEFAULT
        ],
        self::STATUS_CONFIRM => [
            'name' => 'Đã xác nhận',
            'status' => self::STATUS_CONFIRM
        ],
        self::STATUS_WAIT_FOR_PAY => [
            'name' => 'Chờ thanh toán',
            'status' => self::STATUS_WAIT_FOR_PAY
        ],
        self::STATUS_PAID => [
            'name' => 'Đã thanh toán',
            'status' => self::STATUS_PAID
        ],
        self::STATUS_CANCEL => [
            'name' => 'Huỷ đơn',
            'status' => self::STATUS_CANCEL
        ],
    ];

    const STATUS_SHIPPING_DEFAULT = 1;
    const STATUS_SHIPPING_WAITING = 2; // chờ lấy hàng
    const STATUS_SHIPPING_WAREHOUSE = 3; // đơn hàng đang ở kho
    const STATUS_SHIPPING_DELIVERING = 4; // đang giao
    const STATUS_SHIPPING_SUCCESS = 5; // hoàn thành
    const STATUS_SHIPPING_CANCEL = -1; // huỷ

    public $statusShippingConfig = [
        self::STATUS_SHIPPING_DEFAULT => [
            'name' => 'Khởi tạo',
            'status' => self::STATUS_SHIPPING_DEFAULT
        ],
        self::STATUS_SHIPPING_WAITING => [
            'name' => 'Chờ lấy hàng',
            'status' => self::STATUS_SHIPPING_WAITING
        ],
        self::STATUS_SHIPPING_WAREHOUSE => [
            'name' => 'Đơn hàng ở kho',
            'status' => self::STATUS_SHIPPING_WAREHOUSE
        ],
        self::STATUS_SHIPPING_DELIVERING => [
            'name' => 'Đang giao hàng',
            'status' => self::STATUS_SHIPPING_DELIVERING
        ],
        self::STATUS_SHIPPING_SUCCESS => [
            'name' => 'Hoàn thành',
            'status' => self::STATUS_SHIPPING_SUCCESS
        ],
        self::STATUS_SHIPPING_CANCEL => [
            'name' => 'Huỷ đơn',
            'status' => self::STATUS_SHIPPING_CANCEL
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->statusConfig, []);
    }

    public function getStatusShippingConfig()
    {
        return Arr::get($this->shipping_status, $this->statusShippingConfig, []);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'order_id');
    }
}
