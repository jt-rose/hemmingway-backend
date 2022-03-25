<?php

namespace App\GraphQL\Mutations;

use App\Models\Mood;
use Illuminate\Validation\ValidationException;

class DeleteMood
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myMood = Mood::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myMood ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
