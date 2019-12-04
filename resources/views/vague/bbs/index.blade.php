@extends('layouts.vague')

@section('title')
仮ページ
@endsection
<header>
    <div class="container">
        <div class="header-title-area">
            <h1 class="logo">制作中</h1>
            <p class="text-sub">表示テスト中。</p>
        </div>
    </div>
</header>
@section('content')
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
                                <th width="15%">投稿者</th>
                                <th width="10%">言語</th>
                                <th width="70%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $bbs)
                                <tr>
                                    <td>{{ \Str::limit($bbs->name, 100) }}</td>
                                    <td>{{ \Str::limit($bbs->lang, 100) }}</td>
                                    <td>{{ \Str::limit($bbs->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Vague\BbsController@edit', ['id' => $bbs->id]) }}" class="btn btn-primary">編集</a>
                                        </div>
                                        <form action="{{ action('Vague\BbsController@delete', $bbs->id) }}" id="form_{{ $bbs->id }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <a href="#" data-id="{{ $bbs->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
                                        </form>
                                    </td>
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