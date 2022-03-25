<?php

namespace App\GraphQL\Mutations;

use App\Models\SleepHabit;
use Illuminate\Validation\ValidationException;

class DeleteSleepHabit
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $mySleepHabit = SleepHabit::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $mySleepHabit ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
