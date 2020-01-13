<?php

namespace App\Http\Controllers\Vague;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Bbs;
use App\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BbsController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user($request->id);
        
        return view('vague.bbs.create', ['user' => $user]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Bbs::$rules);
        $bbs = new Bbs;
        $form = $request->all();
        
        unset($form['_token']);
        $bbs->fill($form);
        $bbs->save();
        
        return redirect('/');
    }
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $cond_lang = $request->cond_lang;
        if ($cond_lang != '') {
            $posts = Bbs::where('lang', 'LIKE', "%{$cond_lang}%")->get();
        } else {
            $posts = Bbs::all()->sortByDesc('updated_at');
        }
        return view('vague.bbs.index', ['posts' => $posts, 'cond_lang' => $cond_lang, 'user' => $user]);
    }
    
    public function edit(Request $request)
    {
        $bbs = Bbs::find($request->id);
        if (empty($bbs)) {
            abort(404);
        }
        return view('vague.bbs.edit', ['bbs_form' => $bbs]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Bbs::$rules);
        $bbs = Bbs::find($request->id);
        $bbs_form = $request->all();
        
        unset($bbs_form['_token']);
        $bbs->fill($bbs_form)->save();
        
        $history = new History;
        $history->bbs_id = $bbs->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('/');
    }
    
    public function delete(Request $request)
    {
        $this->authorize('delete', $request);
        $bbs = Bbs::find($request->id);
        $bbs->delete();
        
        return redirect('/');
    }
}
