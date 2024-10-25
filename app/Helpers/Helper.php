<?php

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Str;

if (!function_exists('detectModelPath')) {
    function detectModelPath($type): string
    {
        return "App\\Models\\" . Str::ucfirst(Str::singular($type));
    }
}

if (!function_exists('handleTrans')) {
    function handleTrans($trans = '', $return = null, $lang = null)
    {
        if (empty($trans)) {
            return '---';
        }

        app()->setLocale($lang ?? app()->getLocale());

        $key = Str::snake($trans);

        if ($return === null) {
            $return = $trans;
        }

        return Str::startsWith(__("api.$key"), 'api.') ? $return : __("api.$key");
    }
}

if (!function_exists('getModelKey')) {
    function getModelKey(?string $className = null): ?string
    {
        if (!$className) return null;
        $shortName = class_basename($className);

        return strtolower(Str::snake($shortName));
    }
}

if (!function_exists('categories')) {
    function categories()
    {
       return Category::take(6)->get();
    }
}
if (!function_exists('cartCount')) {
    function cartCount()
    {
        if(auth()->user()) {
            return Cart::where('user_id', auth()->user()->id)->count();
        }
        return 0;
    }
}



?>