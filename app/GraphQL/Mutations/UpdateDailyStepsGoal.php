<?php

namespace App\GraphQL\Mutations;

use App\Models\DailyStepsGoal;
use Illuminate\Validation\ValidationException;

class UpdateDailyStepsGoal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myDSG = DailyStepsGoal::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $myDSG ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $myDSG->goal_start_date = $args['input']['goal_start_date'];
        $myDSG->daily_goal_in_steps = $args['input']['daily_goal_in_steps'];
        $myDSG->note = $args['input']['note'];
        $myDSG->active = $args['input']['active'];

        $myDSG->save();

        return $myDSG;
    }
}
