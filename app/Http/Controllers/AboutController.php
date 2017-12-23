<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $num = $request->input('num',10);
        $keywords = $request->input('keywords','');
        if($request->has('keywords')) {
            $about = DB::table('about')
                ->where('name','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            $about = DB::table('about')->paginate($num);
        }
        return view('admin.about.index', [
            'about'=>$about,
            'keywords' => $keywords,
            'num' => $num
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        if($request->hasFile('thumb')) {
            $suffix = $request->file('thumb')->extension();
            $name = uniqid('img_').'.'.$suffix;
            $dir='./uploads/'.date('Y-m-d');
            $request->file('thumb')->move($dir, $name);
            $data['thumb']=trim($dir.'/'.$name,'.');
        }
        if(DB::table('about')->insert($data)) {
            return redirect('about')->with('msg','添加成功!');
        }else{
            return back()->with('msg','添加失败!');
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
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=DB::table('about')->where('id',$id)->first();
        return view('admin.about.edit',['about'=>$about]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->only(['thumb','name','content']);
        if($request->hasFile('thumb')) {
            $suffix = $request->file('thumb')->extension();
            $name = uniqid('img_').'.'.$suffix;
            $dir='./uploads/'.date('Y-m-d');
            $request->file('thumb')->move($dir, $name);
            $data['thumb']=trim($dir.'/'.$name,'.');
        }
        if(DB::table('about')->where('id',$id)->update($data)){
            return redirect('/about')->with('msg','更新成功!');
        }else{
            return back()->with('msg','更新失败!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table('about')->where('id',$id)->delete()) {
            return back()->with('msg','删除成功!');
        }else{
            return back()->with('msg','删除失败!');
        }
    }
    public function alist ()
    {
        $about=DB::table('about')->select('id','thumb','name','content')->paginate(4);
        return view('home.about.list',compact('about'));
    }
}
