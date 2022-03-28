<?php

namespace App\GraphQL\Mutations;

use App\Models\UserWeight;
use Illuminate\Validation\ValidationException;

class UpdateUserWeight
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myUserWeight = UserWeight::where(['id' => $args['id'], 'user_id' => $args['input']['user_id']])->first();
        if (! $myUserWeight ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        $myUserWeight->weight_in_lbs = $args['input']['weight_in_lbs'];
        $myUserWeight->date_of_weight = $args['input']['date_of_weight'];
        $myUserWeight->note = $args['input']['note'];

        $myUserWeight->save();

        return $myUserWeight;
    }
}
