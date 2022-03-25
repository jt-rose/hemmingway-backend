<?php

namespace App\GraphQL\Mutations;

use App\Models\Exercise;
use Illuminate\Validation\ValidationException;

class DeleteExercise
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myExercise = Exercise::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myExercise ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
