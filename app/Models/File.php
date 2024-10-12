<?php

namespace App\Models;

use App\Services\UploadService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    public bool $inPermission = true;

    protected $fillable = ['name', 'path', 'fileable_id', 'fileable_type' ];

    protected $appends = ['type'];

    /*
     |--------------------------------------------------------------------------
     | Custom Attributes
     |--------------------------------------------------------------------------
    */
    public function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value ?: request('path')?->getClientOriginalName()
        );
    }

    public function path(): Attribute
    {
        return Attribute::make(
            get: fn($value) => UploadService::url($value),
//            set: fn($value) => !empty($value) ? UploadService::store($value) : $this->path
        );
    }

    public function getTypeAttribute(): string
    {
        return handleTrans(getModelKey($this->fileable_type));
    }

    /*
     |--------------------------------------------------------------------------
     | Relations methods
     |--------------------------------------------------------------------------
    */
    /**
     * @return MorphTo
     */
    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }


        /*
     |--------------------------------------------------------------------------
     | File URL Mutator
     |--------------------------------------------------------------------------
    */
    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return asset($this->path);
    }

}
