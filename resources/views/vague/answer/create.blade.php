@extends('layouts.vague')

@section('title', '回答の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="post col-md-8 mx-auto mt-3">
                <div class="row">
                    <div class="text col-md-6">
                        <div class="date">
                            {{ $bbs->updated_at->format('Y年m月d日 H時i分s秒') }}
                        </div>
                        <div class="name">
                            {{ \Str::limit($bbs->name, 100) }}
                        </div>
                        <div class="lang">
                            {{ \Str::limit($bbs->lang, 100) }}
                        </div>
                        <div class="body">
                            {{ \Str::limit($bbs->body, 250) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @forelse($bbs->answers as $answer)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $answer->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($answer->name)) !!}
                        </p>
                        <p class="mt-2">
                            {!! nl2br(e($answer->answer)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
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
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="answer">本文</label>
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
    </div>
@endsection