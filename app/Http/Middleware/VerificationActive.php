<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificationActive
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user(); 
        if($user == null){
            return response()->json([
                'message'=>'vous devriez vous authentifier'
            ],Response::HTTP_UNAUTHORIZED );
        }
        //Ici  on verifie si l'utilisateur est active
        if($user['status'] !== 'active' ){
            return response()->json([
                'message'=>'Votre sessions a été désactiver'
            ], RESPONSE::HTTP_FORBIDDEN);
        }
    
        return $next($request);
    }
}
