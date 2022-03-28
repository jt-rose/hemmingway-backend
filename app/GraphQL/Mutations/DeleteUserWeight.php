<?php

namespace App\GraphQL\Mutations;

use App\Models\UserWeight;
use Illuminate\Validation\ValidationException;

class DeleteUserWeight
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myUserWeight = UserWeight::where(['id' => $args['id'], 'user_id' => $args['user_id']])->delete();
        if (! $myUserWeight ) {
            throw ValidationException::withMessages([
                'user_id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
