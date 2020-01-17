@extends('layouts.vague')

@section('title')
vague【ヴェイグ】
@endsection

@section('content')
<div class="title-area">
    <h1 class="logo">ヴェイグ</h1>
    <p class="text-sub">
        プログラミング初心者向けQ&A<br>
        理解するためのきっかけを見つけよう。<br>
    </p>
</div>
    <div class="container">
        <div class="row">
            <h2>質問一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Vague\BbsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Vague\BbsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">言語</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_lang" value="{{ $cond_lang }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-bbs col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="15%">日時</th>
                                <th width="15%">投稿者</th>
                                <th width="10%">言語</th>
                                <th width="40%">本文</th>
                                <th width="15%">回答数</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <div class="date">
                                        {{ $post->updated_at->format('Y年m月d日 H時i分s秒') }}
                                        </div>
                                    </td>
                                    <td>{{ \Str::limit($post->name, 100) }}</td>
                                    <td>{{ \Str::limit($post->lang, 100) }}</td>
                                    <td>{{ \Str::limit($post->body, 250) }}</td>
                                    <td>
                                        @if ($post->answers->count())
                                        <span class="badge badge-primary">
                                            コメント {{ $post->answers->count() }}件
                                        </span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <div class="col-md-4">
                                            <a href="{{ action('Vague\AnswerController@create', ['id' => $post->id]) }}" class="btn btn-primary">詳細</a>
                                        </div>
                                    </td>
                                    @if (Auth::check()) {
                                        @if ($post->user_id == $user->id)
                                    }
                                    <td>
                                        <a href="{{ action('Vague\BbsController@edit', ['id' => $post->id]) }}" class="btn btn-primary">編集</a>
                                    </td>
                                    <td>
                                        <form action="{{ action('Vague\BbsController@delete') }}" id="form_{{ $post->id }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('post') }}
                                            <input type="hidden" name="deleteId" value="{{ $post->id }}">
                                            <a href="#" data-id="{{ $post->id }}" class="btn btn-danger" onclick="deletePost(this);">削除</a>
                                        </form>
                                    </td>
                                    @endif
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもよろしいですか?')) {
                document.getElementById('form_' + e.dataset.id).submit();
            }
        }
    </script>
    </div>
@endsection