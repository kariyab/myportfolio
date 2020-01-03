@extends('layouts.answer')

@section('title', '回答の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="post col-md-8 mx-auto mt-3">
                <div class="row">
                    <div class="question">
                        <p class="name">名前
                            {{ \Str::limit($bbs->name, 100) }}
                        </p>
                        <p class="date">
                            {{ $bbs->updated_at->format('Y年m月d日 H時i分s秒') }}
                        </p>
                        <p class="lang">
                            {{ \Str::limit($bbs->lang, 100) }}
                        </p>
                        <div class="body">
                            {{ \Str::limit($bbs->body, 250) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>回答新規作成</h2>
                <form action="{{ action('Vague\AnswerController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3" for="name">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="answer">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="answer" rows="10">{{ old('answer') }}</textarea>
                        </div>
                    </div>
                    <input id="bbs_id" name="bbs_id" type="hidden" value="{{ $bbs->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="col-md-8 mx-auto mt-3">
                @forelse($bbs->answers as $answer)
                    <div class="comment">
                        <div class="row">
                            <ul class="answer">
                                <li><div class="answer-name">名前
                                    {{ \Str::limit($answer->name, 50) }}
                                </div></li>
                                <li><div class="answer-date">
                                    {{ $answer->created_at->format('Y.m.d H:i') }}
                                </div></li>
                            </ul>
                            <div class="answer-body mt-8">
                                {{ \Str::limit($answer->answer, 500) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
        </div>
    </div>
@endsection