<?php

namespace App\GraphQL\Mutations;
use Illuminate\Validation\ValidationException;
use App\Models\Exercise;

class UpdateExercise
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myExercise = Exercise::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $myExercise ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $myExercise->name = $args['input']['name'];
        $myExercise->minutes = $args['input']['minutes'];
        $myExercise->calories = $args['input']['calories'];
        $myExercise->date_of_exercise = $args['input']['date_of_exercise'];
        $myExercise->steps = $args['input']['steps'];
        $myExercise->distance_in_miles = $args['input']['distance_in_miles'];

        $myExercise->save();

        return $myExercise;
    }
}
