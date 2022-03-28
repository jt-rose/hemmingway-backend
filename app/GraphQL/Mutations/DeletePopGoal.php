<?php

namespace App\GraphQL\Mutations;

use App\Models\PopGoal;
use Illuminate\Validation\ValidationException;

class DeletePopGoal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myPopGoal = PopGoal::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myPopGoal ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
