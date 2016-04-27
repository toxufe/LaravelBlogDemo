
@extends('public/index')

@section('menu')
    <ul class="nav nav-sidebar">
        <li class="active"><a>文章管理</a></li>
        <li><a href="{{ url('article/create')  }}">发表文章</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Export</a></li>
    </ul>
@stop

@section('content')
    <h2>{{ $article->title  }} <span class="small">作者：{{ $article->user->name }}</span></h2>
    <hr>
    <blockquote>
        {{ $article->abstract }}
    </blockquote>


    <p>
        {{ $article->content }}
    </p>
@endsection



