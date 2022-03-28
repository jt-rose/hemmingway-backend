<?php

namespace App\GraphQL\Mutations;

use App\Models\DailyStepsGoal;
use Illuminate\Validation\ValidationException;

class DeleteDailyStepsGoal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myDSG = DailyStepsGoal::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myDSG ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
