@extends('layouts.vague')

@section('title', '回答の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="date">
            <td>{{ $bbs_form->updated_at->format('Y年m月d日 H時i分s秒') }}</td>
            <td>{{ \Str::limit($bbs_form->name, 100) }}</td>
            <td>{{ \Str::limit($bbs_form->lang, 100) }}</td>
            <td>{{ \Str::limit($bbs_form->body, 250) }}</td>
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
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="answer">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="answer" rows="20">{{ old('answer') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <input id="bbs_id" name="bbs_id" type="hidden" value=="{{ $bbs_form->bbs_id }}">
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection