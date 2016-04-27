@extends('public/index')


@section('menu')
    <ul class="nav nav-sidebar">
        <li><a href="{{ url('article') }}">文章管理</a></li>
        <li class="active"><a>编辑文章</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Export</a></li>
    </ul>
@stop


@section('content')
    <h1>编辑文章</h1>
    <form class="form-horizontal" method="post" action="/article/{{$article->id}}">
        {{ csrf_field() }}
        <input name="_method" value="PUT" type="hidden">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="title">标题</label>
            <div class="col-sm-8">
                <input value="{{$article->title}}" type="text" class="form-control" id="title" name="title" placeholder="标题">


                @if($errors->has('title'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('title')  }}</div>
                @endif
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label" for="abstract">摘要</label>
            <div class="col-sm-8">
                <input value="{{$article->abstract}}" type="text" class="form-control" id="abstract" name="abstract" placeholder="摘要">
                @if($errors->has('abstract'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('abstract')  }}</div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="content">内容</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="content" id="content">{{$article->content}}</textarea>
                @if($errors->has('content'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('content')  }}</div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@endsection
