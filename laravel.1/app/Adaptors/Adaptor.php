<?php


namespace App\Adaptors;

use App\User;
use Laravel\Socialite\Two\User as UserOAuth;


class Adaptor
{
    public function getUserBySocId(UserOAuth $user, string $socName) {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if (is_null($userInSystem)) {
            $userInSystem = new User();

            if($socName=='vk'){
            $userInSystem->fill([
                'name' => !empty($user->getName())? $user->getName(): '',
                'email' => $user->accessTokenResponseBody['email'],
                'password' => '',
                'id_in_soc' => !empty($user->getId())? $user->getId(): '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
            ]);
            }
           if($socName == 'gitHub'){
                $userInSystem->fill([
                    'name' => !empty($user->getNickname())? $user->getNickname(): '',
                    'email' => $user->getEmail(),
                    'password' => '',
                    'id_in_soc' => !empty($user->getId())? $user->getId(): '',
                    'type_auth' => 'gitHub',
                    'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
                ]);

            }

            $userInSystem->save();
        }
        return $userInSystem;
    }
}
