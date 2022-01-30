<?php

namespace App\Models;

use App\Helpers\Math;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_url',
        'code',
        'requested_count',
        'used_count',
    ];

    public function getCode()
    {
        if ($this->id === null) {
            throw new  \App\Exceptions\CodeGenerationException;
        }
        return (new Math)->toBase($this->id);
    }

    public static function byCode($code)
    {
        return static::where('code', $code);
    }

    public function shortenedUrl()
    {
        if ($this->code === null) {
            return null;
        }
        return env("APP_URL") . $this->code;
    }
}
