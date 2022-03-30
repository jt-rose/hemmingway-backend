<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Validation\ValidationException;

class UpdateUser
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $myUser = User::where(['id' => $args['id']])->first();
        if (! $myUser ) {
            throw ValidationException::withMessages([
                'id' => ['No matching record for this user']
            ]);
        }
        $myUser->name = $args['name'];
        $myUser->email = $args['email'];
        $myUser->gender = $args['gender'];
        $myUser->birthday = $args['birthday'];
        $myUser->height_in_inches = $args['height_in_inches'];

        $myUser->save();

        return $myUser;
    }
}
