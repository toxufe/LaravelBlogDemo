<?php

namespace Jingeryu\Http\Controllers;

use Illuminate\Http\Request;

use Jingeryu\Http\Requests;
use Jingeryu\Http\Requests\ArticleRequest;
use Jingeryu\Article;

class ArticleController extends Controller
{
    function __construct()
    {
        //中间件设置 排除首页和文章展示的用户验证
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //dd($request->all());
       // 12.    $request->user()->tasks()->create([13.        'name' => $request->name,14.    ]);




        //$article = Article::create($request->all());
        $article = $request->user()->articles()->create($request->all());
        if($article){
            return redirect('/article')->with(['ok'=>'发表成功']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $article = Article::FindOrFail($id);
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::FindOrFail($id);//查询一条数据
        return view('article/edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        //$num = Article::where('id','=',$id)->update($request->input());
        //dd($request->all());


        $article = Article::findOrFail($id);
        $num= $article->update($request->all());
       // return redirect('/articles');

        if($num){
            return redirect('/article')->with(['ok'=>'更新成功']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request)
    {
        $ids = $request->ids;
        $num = Article::wherein('id',$ids)->delete();
        dd($num);
    }
}
