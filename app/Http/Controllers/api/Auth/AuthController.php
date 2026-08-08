<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\registerRequest;
use App\Http\Requests\loginRequest as RequestsLoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use PHPUnit\Event\Code\Throwable;



class AuthController extends Controller
{
    public function register(registerRequest $request)
    {
        //On utlise une transaction lorsqu'on veut exécuter deu processus qui sont lié
        try {

            return  DB::transaction(function () use ($request) {
                $data = $request->validated();
                $data['password'] = Hash::make($data['password']);
                
                $user = User::create($data);

                $user['status']='acttive';


                $token = $user->createToken('auth_token')->plainTextToken;



                return response()->json([
                    'message' => 'Utilisateur créer avec succèss',
                    'data' => [
                        'user' => new UserResource($user),
                        'token' => $token
                    ]
                ]);
            });
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'le serveur est hs',
                "error" => $e
            ]);
        }
    }

    public function login(RequestsLoginRequest $request)
    {
       
        $user = User::query()->where('email', $request->email)->first();
        //si l'utilisateur n'est pas valide et que le mot de passe ne correspond pas
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Identifiant ou mot de passe invalide',

            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;



        return response()->json([
            'message' => 'connexion réussir avec succèss',
            'data' => [
                'user' => new UserResource($user),
                'token' => $token
            ]
        ]);
    }


    public function me(Request $request){
        return response()->json([
            'user'=>$request->user(),
        ]);

    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()?->delete();
        return response()->json([
            'message'=>'Utilisateur deconnecter avec succès !'
        ]);


    }
}
