<?php

namespace App\GraphQL\Mutations;

use App\Models\DailyDistanceGoal;
use Illuminate\Validation\ValidationException;

class DeleteDailyDistanceGoal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myDDG = DailyDistanceGoal::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myDDG ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
