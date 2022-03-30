<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Validation\ValidationException;

class DeleteUser
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myUser = User::where(['id' => $args['id']])->delete();
        if (! $myUser ) {
            throw ValidationException::withMessages([
                'id' => ['No matching record for this user']
            ]);
        }
        return true;
    }
}
