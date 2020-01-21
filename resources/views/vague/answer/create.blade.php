@extends('layouts.answer')

@section('title', '回答一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="card col-md-10 mx-auto">
            <div class="card-header">
                <div class="name">名前
                    {{ \Str::limit($bbs->name, 100) }}
                </div>
                <div class="lang">&emsp;
                    {{ \Str::limit($bbs->lang, 100) }}
                </div>
                <div class="date">&ensp;
                    {{ $bbs->updated_at->format('Y年m月d日 H時i分s秒') }}
                </div>
            </div>
            <div class="card-body">
                {{ \Str::limit($bbs->body, 250) }}
            </div>
        </div>
    </div>
    <hr color="#c0c0c0">
    <div class="row">
        <div class="col-md-10 mx-auto">
            @if(Auth::check())
            <h2>回答新規作成</h2>
            @endif
            <form action="{{ action('Vague\AnswerController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                @if(Auth::check())
                <div class="new-comment">
                    <div class="form-group row">
                        <div class="name-name">
                            <label class="col-md-auto" for="name">名前</label>
                            <div class="col-md-10">
                                <span class="user-name"> {{ Auth::user()->name }} </span>
                                <input type="hidden" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="answer">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="answer" rows="10">{{ old('answer') }}</textarea>
                        </div>
                    </div>
                    <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
                    <input id="bbs_id" name="bbs_id" type="hidden" value="{{ $bbs->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                    @endif
                </div>
            </form>
        </div>
    </div>
    <hr color="#c0c0c0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="answers">
                    @forelse($bbs->answers as $answer)
                    <div class="card">
                        <div class="card-header">
                            <div class="name">名前&ensp;
                                {{ \Str::limit($answer->name, 50) }}
                            </div>
                            <div class="date">
                                {{ $answer->created_at->format('Y.m.d H:i') }}
                            </div>
                        </div>
                        <div class="card-body">
                            {{ \Str::limit($answer->answer, 500) }}
                        </div>
                    </div>
                    @empty
                    <p>コメントはまだありません。</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection