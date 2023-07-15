<?php
namespace App\Http\Services;
use App\Models\User;
use App\Models\UserSocial;
use Laravel\Socialite\Two\User as ProviderUser;
class SocialAccountsService
{
    public function findOrCreate(ProviderUser $providerUser, string $provider): User
    {
        $linkedSocialAccount = UserSocial::where('service', $provider)
            ->where('service_id', $providerUser->getId())
            ->first();
        if ($linkedSocialAccount) {
            return $linkedSocialAccount->user;
        } else {
            $user = null;
            if ($email = $providerUser->getEmail()) {
                $user = User::where('email', $email)->first();
            }
            if (! $user) {
                $user = User::create([
                    'name' => $providerUser->getName(),
                    'last_name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                ]);
            }
            $user->social()->create([
                'service_id' => $providerUser->getId(),
                'service' => $provider,
            ]);
            return $user;
        }
    }
}
