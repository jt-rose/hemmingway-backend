<?php

namespace App\GraphQL\Mutations;

use App\Models\WeightGoal;
use Illuminate\Validation\ValidationException;

class DeleteWeightGoal
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myWeightGoal = WeightGoal::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myWeightGoal ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
