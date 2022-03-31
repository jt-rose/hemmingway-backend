<?php

namespace App\GraphQL\Mutations;

use App\Models\WeightGoal;
use Illuminate\Validation\ValidationException;

class UpdateWeightGoal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myWeightGoal = WeightGoal::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $myWeightGoal ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $myWeightGoal->goal_in_lbs = $args['input']['goal_in_lbs'];
        $myWeightGoal->goal_start_date = $args['input']['goal_start_date'];
        $myWeightGoal->note = $args['input']['note'];
        $myWeightGoal->active = $args['input']['active'];
        $myWeightGoal->goal_pace = $args['input']['goal_pace'];

        $myWeightGoal->save();

        return $myWeightGoal;
    }
}