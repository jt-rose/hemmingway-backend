<?php

namespace App\GraphQL\Mutations;

use App\Models\Meal;
use Illuminate\Validation\ValidationException;

class UpdateMeal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myMeal = Meal::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $myMeal ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $myMeal->name = $args['input']['name'];
        $myMeal->category = $args['input']['category'];
        $myMeal->calories = $args['input']['calories'];
        $myMeal->date_of_meal = $args['input']['date_of_meal'];

        $myMeal->save();

        return $myMeal;
    }
}
