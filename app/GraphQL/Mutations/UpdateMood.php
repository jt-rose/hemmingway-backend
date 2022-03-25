<?php

namespace App\GraphQL\Mutations;

use App\Models\Mood;
use Illuminate\Validation\ValidationException;

class UpdateMood
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myMood = Mood::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $myMood ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $myMood->stress_level = $args['input']['stress_level'];
        $myMood->mood_type = $args['input']['mood_type'];
        $myMood->meditated = $args['input']['meditated'];
        $myMood->date_of_mood = $args['input']['date_of_mood'];
        $myMood->note = $args['input']['note'];

        $myMood->save();

        return $myMood;
    }
}
