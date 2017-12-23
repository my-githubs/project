<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $num = $request->input('num','10');
        $keywords = $request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $user = DB::table('user')
                ->where('username','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $user = DB::table('user')->paginate($num);
        }
        //解析模板
        return view('admin.user.index',['user'=>$user,'num'=>$num,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only(['username','password','email','phone']);
        //加密密码
        $data['password']=Hash::make($data['password']);
        //文件上传
        if($request->hasFile('profile')){
            //获取后缀
            $suffix=$request->file('profile')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./uploads'.date('Y-m-d');
            //移动文件
            $request->file('profile')->move($dir,$name);
            //获取文件夹路径
            $data['profile']=trim($dir.'/'.$name,'.');
        }
        //加入数据库
        if(DB::table('user')->insert($data)){
            return redirect('/user')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败');
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
        $user=DB::table('user')->where('id',$id)->first();
        return view('admin.user.edit',['user'=>$user]);
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
        //获取数据
        $data=$request->only(['username','email','phone']);
        //文件上传
        if($request->hasFile('profile')){
            //获取后缀
            $suffix=$request->file('profile')->extension();
            //创建一个随机文件名
            $name=uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir='./uploads'.date('Y-m-d');
            //移动文件
            $request->file('profile')->move($dir,$name);
            //获取文件夹路径
            $data['profile']=trim($dir.'/'.$name,'.');
        }
        if(DB::table('user')->where('id',$id)->update($data)){
            return redirect('/user')->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败');
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
        if(DB::table('user')->where('id',$id)->delete()){
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        }
    }

    public function signup()
    {
        return view('home.user.signup');
    }
    public function dosignup(Request $request)
    {
        //检测验证码是否正确
        $code = $request->vcode;
        if(session('vcode') != $code) {
            return back()->with('msg','验证码错误');
        }

        //获取用户的信息
        $data = $request->only(['username','phone','password']);
        $data['password'] = Hash::make($data['password']);
        $data['verify'] = str_random(30);

        //插入数据
        // dd($data);
        if(DB::table('user')->insert($data)) {
                // 发送一封激活邮件
                // Mail::send('emails.send', ['data'=>$data], function ($message) use ($data) {
                //     // 标题
                //     $message->subject('网站注册确认邮件');
                //      // 接收者
                //     $message->to($data['email']);
                // });

                return redirect('/login')->with('msg','注册成功');
            } else {
                return back()->with('msg','注册失败!!');
            }
        }
    public function login()
    {
        return view('home.user.login');
    }

    public function dologin(Request $request){

        //提取参数
        $data=$request->except(['_token']);
        // dd($data);die;
        //检测用户是否正确,根据用户名来查找用户信息
        $user=DB::table('user')->where('username',$data['username'])->first();
        if(empty($user)){
            return back()->with('msg','登录失败');
        }
        //校验密码
        if(Hash::check($data['password'],$user->password)){
            //密码前后对比,写入session
            session(['id'=>$user->id]);
            session(['username'=>$user->username]);
            //登录成功
            return redirect('/home')->with('msg','登录成功');
        }else{
            return back()->with('msg','登录失败');
        }
    }
        
    public function center()
    {
        return view('home.user.center');
    }
}
