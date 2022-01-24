<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Task;

class UserController extends Controller
{
  public function login(Request $request)
  {
    $email=$request->input('email');
    $password=$request->input('password');
    $new=User::where('email',$email)->get()->first();
    if(Hash::check($password,$new->password))
    {
      $username=($new->fname)." ".($new->lname);
      $request->session()->put('status','logged in');
      $request->session()->put('fname',$new->fname);
      $request->session()->put('username',$username);
      $request->session()->put('id',$new->id);
      return redirect()->route('history');
    }
    else {
      return redirect()->route('login')->with('error','Wrong Password');
    }
  }

  public function signup(Request $request)
  {
    $fname=$request->input('fname');
    $lname=$request->input('lname');
    $email=$request->input('email');
    $password=$request->input('password');
    $hashed=Hash::make($password);
    //creating new user
    $user=new User;
    $user->fname=$fname;
    $user->lname=$lname;
    $user->email=$email;
    $user->password=$hashed;
    $user->save();
    return redirect()->route('login')->with('success','Now Login');
  }

  public function savetask(Request $request)
  {
    $taskname=$request->input('taskname');
    $duedate=$request->input('duedate');
    $des=$request->input('description');
    $userid = $request->session()->get('id');
    $task=new Task;
    $task->userid=$userid;
    $task->name=$taskname;
    $task->description=$des;
    $task->done="Not Done";
    $task->duedate=$duedate;
    $task->save();
    $request->session()->flash('success', 'Task was stored');
    return redirect()->route('task');
  }

  public function taskdone(Request $request,$id)
      {
        Task::where('id',$id)->update(['done'=>'Done']);
        $request->session()->flash('success','Task Marked as Done');
        return redirect()->route('task');
      }

public function logout(Request $request)
{
  $request->session()->flush();
  return redirect()->route('login');
}



}
