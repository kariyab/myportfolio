<?php

namespace App\Http\Controllers\Vague;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Bbs;
use App\History;
use App\Answer;
use App\Answer_history;
use Carbon\Carbon;

class AnswerController extends Controller
{
    public function add(Request $request)
    {
        $bbs = Bbs::find($request->id);
        
        return view('vague.answer.create', ['bbs_form' => $bbs]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Answer::$rules);
        $answer = new Answer;
        $form = $request->all();
        
        unset($form['_token']);
        $answer->fill($form);
        $answer->save();
        
        return redirect('/');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, Answer::$rules);
        
        $post = Post::findOrFail($params['bbs_id']);
        $post->answers()->create($params);
        
        return redirect()->route('vague.answer.show', ['post' => $post,]);
    }
    
    public function index(Request $request)
    {
        $cond_answer = $request->cond_answer;
        if ($cond_answer != '') {
            $posts = Answer::where('answer', 'LIKE', "%{$cond_answer}%")->get();
        } else {
            $posts = Answer::all()->sortByDesc('updated_at');
        }
        return view('vague.answer.index', ['posts' => $posts, 'cond_answer' => $cond_answer]);
    }
    
    public function edit(Request $request)
    {
        $answer = Answer::find($request->id);
        if (empty($answer)) {
            abort(404);
        }
        return view('vague.answer.edit', ['answer_form' => $answer]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Answer::$rules);
        $answer = Answer::find($request->id);
        $answer_form = $request->all();
        
        unset($answer_form['_token']);
        $answer->fill($answer_form)->save();
        
        $history = new History;
        $history->answer_id = $answer->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('/');
    }
    
    public function delete(Request $request)
    {
        $answer = Answer::find($request->id);
        $answer->delete();
        
        return redirect('/');
    }
}
