<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserJob;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class UserController extends Controller
{
use ApiResponser;
private $request;
public function __construct(Request $request)
{ 
$this->request = $request;
}
public function getUsers(){
$users = User::all();
return $this->successResponse($users); 
}
public function index(){
$users = User::all();
return $this->successResponse($users); 
}
public function add (Request $request){

$rules = [
    'username' => 'required|string|unique:users,username|max:20',
    'password' => 'required|string|min:6|max:20',
    'gender' => 'required|in:male,female',
    'jobID' => 'required|integer|exists:user_job,jobID',];

$this->validate($request,$rules);

$userJob = UserJob::findOrFail($request->jobID);
$user= User::create($request->all());
return $this->successResponse($user, 201);

}

public function show($id){
$user = User::where('id', $id)->first();
if (!$user){
return $this->errorResponse("user not found", 404);
}
return $this->successResponse($user);
}

public function delete($id){
$user = User::where('id', $id)->first();
if ($user){
$user->delete();
return $this->successResponse(["message"=>"user deleted successfully"]);   
}
return $this->errorResponse("user not found", 404);
}

public function update($id, Request $request){
$user = User::where('id', $id)->first();
if (!$user){
return $this->errorResponse("user not found", 404);
}
$rules = [
    'username' => 'required|string|unique:users,username,'.$id.'|max:20',
    'password' => 'required|string|min:6|max:20',
    'gender' => 'required|in:male,female',
    'jobID' => 'required|integer|exists:user_job,jobID',
];
$this->validate($request,$rules);

$user->update($request->all());
return $this->successResponse(["message"=>"user updated successfully"]);
}
}