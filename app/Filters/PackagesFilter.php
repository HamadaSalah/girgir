<?php

namespace App\Filters;

use Closure;

class PackagesFilter
{
    public function handle($request, Closure $next)
    {
        $query = $next($request);

        if(!empty(request('cat_ids'))) {
            $query->whereHas('category', function($query){
                $query->whereIn('id', request('cat_ids'));
            });
        }

        if(!empty(request('cost'))) {
            $query->where('cost', '<=', (int)request('cost'));
        }

        // if(!empty(request('description'))) {
        //     $query->whereIn('description', 'LIKE', '%' . request('description') . '%');
        // }

        return $query;
    }
}
