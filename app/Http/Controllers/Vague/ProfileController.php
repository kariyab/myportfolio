<?php

namespace App\Http\Controllers\Vague;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//model 後で追加

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if($cond_title != '') {
            $posts = Profile::where('name', 'LIKE', "%{$cond_title}%")->get();
        } else {
            $posts = Profile::all();
        }
        return view('user.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('user.profile.edit' ['profile_form => $profile']);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();
        
        $profile_history = new Profile_history;
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        
        return redirect('user/profile/');
    }
    
    public function delete(Request $request)
    {
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('user/profile/');
    }
}
