
@extends('public/index')

@section('menu')
    <ul class="nav nav-sidebar">
        <li class="active"><a>文章管理</a></li>
        <li><a href="article/create">发表文章</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Export</a></li>
    </ul>
@stop

@section('content')
    <table class="table table-bordered">
        <tr>
            <td>
                <input id="select_all" type="checkbox">
                <button class="btn btn-danger btn-xs delete_btn">删除</button>
            </td>
            <td>id</td>
            <td>标题</td>
            <td>操作</td>
        </tr>


        @forelse($articles as $k=>$v)
        <tr>
            <td><input name="check" value="{{ $v->id }}" type="checkbox"></td>
            <td>{{ $v->id  }}</td>
            <td>{{ $v->title  }}</td>
            <td><a href="{{ url('article/'.$v->id) }}">详情</a> <a href="{{ url('article/'.$v->id.'/edit') }}">编辑</a></td>
        </tr>
        @empty
            <tr><td colspan="4">不能显示更多的内容了哦~~~</td></tr>
        @endforelse
    </table>
@endsection

@section('script')
    <script>
        @if(Session::has('ok'))
            alert('{{ Session::get('ok') }}');
        @endif

        $("#select_all").click(function(){
            $("input[name=check]").prop('checked',$(this).prop('checked'));
        });

            $(".delete_btn").click(function(){
              if(confirm('确认删除文章？')){
                var ids=[];//要删除的id组
                $("input[name=check]:checked").each(function(){
                    ids.push($(this).val());
                });

                  $.post("article/delete",{ids:ids},function(result){
                     if(result){
                         //删除该行数据
                         $("input[name=check]:checked").parent().parent().remove();
                     }
                  });
              }
            });


    </script>
@stop

