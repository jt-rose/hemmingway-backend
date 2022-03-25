<?php

namespace App\GraphQL\Mutations;

use App\Models\Meal;
use Illuminate\Validation\ValidationException;

class DeleteMeal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myMeal = Meal::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myMeal ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
