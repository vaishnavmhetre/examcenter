<?php
/**
 * Created by PhpStorm.
 * User: stevenson
 * Date: 10/1/18
 * Time: 12:24 AM
 */

namespace App\Helpers;


use App\User;
use Ramsey\Uuid\Uuid;

trait UuidGen
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            do
                $newId = Uuid::uuid4();
            while(User::find($newId) != null);

            $model->{$model->getKeyName()} = $newId;
        });
    }
}