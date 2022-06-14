<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Swipe;
use App\Models\Pair;
use App\Http\Requests\SwipeRequest;
class UserController extends Controller
{
    /**
     * Create or update swipe. If one and other user have like create pair
     */
    function swipe(SwipeRequest $request, User $user){
        $user->swipes()->updateOrCreate(
            [
                'user_swipe_id' => $request->user_id
            ],
            [
                'like' => $request->like,
            ]
        );

        if($request->like == 1){
            //chek if had swipe with other user
            $hadSwipe = Swipe::where([
                'user_id' => $request->user_id, 
                'user_swipe_id' => $user->id, 
                'like' => 1
            ])->exist();

            if($hadSwipe){
                //create pair
                $user->pairs()->create([
                    'user_swipe_id', $request->user_id
                ]);
            }
        }else{
            //chek if had pair and delete
            Pair::where([
                'user_id' => [$request->user_id, $user->id], 
                'user_swipe_id' => [$request->user_id, $user->id]
            ])->delete();
        }
        return response()->setStatusCode(200);
    }
}