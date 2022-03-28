<?php

namespace App\GraphQL\Mutations;

use App\Models\DailyDistanceGoal;
use Illuminate\Validation\ValidationException;

class UpdateDailyDistanceGoal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myDDG = DailyDistanceGoal::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $myDDG ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $myDDG->goal_start_date = $args['input']['goal_start_date'];
        $myDDG->daily_goal_in_miles = $args['input']['daily_goal_in_miles'];
        $myDDG->note = $args['input']['note'];
        $myDDG->active = $args['input']['active'];

        $myDDG->save();

        return $myDDG;
    }
}
