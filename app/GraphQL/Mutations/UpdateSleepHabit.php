<?php

namespace App\GraphQL\Mutations;

use App\Models\SleepHabit;
use Illuminate\Validation\ValidationException;

class UpdateSleepHabit
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $mySleepHabit = SleepHabit::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $mySleepHabit ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $mySleepHabit->quality = $args['input']['quality'];
        $mySleepHabit->amount = $args['input']['amount'];
        $mySleepHabit->note = $args['input']['note'];
        $mySleepHabit->date_of_sleep = $args['input']['date_of_sleep'];

        $mySleepHabit->save();

        return $mySleepHabit;
    }
}
