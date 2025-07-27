<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $objUser = User::all();
        return response()->json($objUser);
    }
    public function store(Request $request)
    {
        $email = $request->email;
       
        $user_data = User::where('email', $email)->first();
        if ($user_data) {
            return response()->json([
                'message' => 'Email already exists',
            ], 400);
        }
        $objUser = new User();
        $objUser->name = $request->name;
        $objUser->email = $email;
        $objUser->password = Hash::make($request->password);
        $objUser->account_type_id = $request->account_type_id;
        $objUser->save();
        return response()->json([
            'data'=>$objUser,
            'message'=>'User Signup Successfully',
        ]);
    }
    public function show($id)
    {
        $objUser = User::find($id);
        return response()->json($objUser);
    }
    public function update(Request $request, $id)
    {
        $objUser = User::find($id);
        $objUser->name = $request->name;
        $objUser->email = $request->email;
        $objUser->password = Hash::make($request->password);
        $objUser->account_type_id = $request->account_type_id;
        $objUser->save();
        return response()->json([
            'data'=>$objUser,
            'message'=>'User Updated Successfully',
        ]);
    }
    public function destroy($id)
    {
        $objUser = User::find($id);
        $objUser->delete();
        return response()->json($objUser);
    }
    public function user_contest($id)
    {
        $objUser = User::find($id);
        $objUser->contests()->get();
        return response()->json($objUser);
    }
    public function user_contest_question($id)
    {
        $objUser = User::find($id);
        $objUser->contests()->get();
        $objUser->contests()->questions()->get();
        return response()->json($objUser);
    }
    public function user_contest_question_option($id)
    {
        $objUser = User::find($id);
        $objUser->contests()->get();
        $objUser->contests()->questions()->get();
        $objUser->contests()->questions()->options()->get();
        return response()->json($objUser);
    }
    public function user_contest_question_option_answer($id)
    {
        $objUser = User::find($id);
        $objUser->contests()->get();
        $objUser->contests()->questions()->get();
        $objUser->contests()->questions()->options()->get();
        $objUser->contests()->questions()->options()->answers()->get();
        return response()->json($objUser);
    }
    public function user_contest_question_option_answer_score($id)
    {
        $objUser = User::find($id);
        $objUser->contests()->get();
        $objUser->contests()->questions()->get();
        $objUser->contests()->questions()->options()->get();
        $objUser->contests()->questions()->options()->answers()->get();
        $objUser->contests()->questions()->options()->answers()->score()->get();
        return response()->json($objUser);
    }
    public function user_join_contest($id)
    {
        $objUser = User::find($id);
        $objUser->contests()->get();
        return response()->json($objUser);
    }

    
}
