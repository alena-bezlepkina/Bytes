<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bytes extends Model
{
    protected $table = 'bytes';

    protected $fillable = [
        'byte0',
        'byte1',
        'byte2',
        'byte3',
        'byte4',
        'byte5',
        'byte6',
        'byte7'
    ];

    public function convertToDecimal()
    {
        return ($this->byte0 * 128) + ($this->byte1 * 64) + ($this->byte2 * 32) + ($this->byte3 * 16) + ($this->byte4 * 8) + ($this->byte5 * 4) + ($this->byte6 * 2)+($this->byte7 * 1);
    }
}
