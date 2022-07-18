<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class SocialiteConnexion extends Component
{

    public $provider;
    public $redirect="dashboard";

    public function mount($provider)
    {
        $this->provider = $provider;
       
    }
     public function socialiteRedirect( $provider){
 
        return Socialite::driver($provider)->redirect();
     }

     public function socialiteCallback($provider){

        $user_socialite = Socialite::driver($provider)->stateless()->user();

        if($user_socialite){
            $user = User::where('email', $user_socialite->email)->first();
            if($user){
                auth()->login($user);
                return redirect($this->redirect)->with('success', 'Bonjour '.$user->name .' vous êtes connecté avec succès!');
            }else{
                $user = User::updateOrCreate(['provider_id'=>$user_socialite->id],[
                    'name' => $user_socialite->name,
                    'email' => $user_socialite->email,
                    'avatar' => $user_socialite->avatar,
                    'provider_token' => $user_socialite->token,
                    'provider_token_refresh' => $user_socialite->refreshToken,
                    'password' => bcrypt($user_socialite->token),
                ]);
                auth()->login($user);
                
                return redirect($this->redirect)->with('success', 'Bonjour '.$user->name.' bienvenue à votre espace, vous etes connecté avec succès'); //redirect to dashboard
            }
        }
        
     }
    public function render()
    {
        return view('livewire.back.socialite-connexion');
    }
}
