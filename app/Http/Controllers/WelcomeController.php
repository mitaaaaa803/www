<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class WelcomeController extends Controller
{
    // 文章清單(首頁)
    public function index(Request $req){

        // 更改語言
        $locale = session('locale', 'zh_tw'); // 設session的變數為 $locale
        // echo $locale;
        App::setLocale($locale); // 該頁面要切換語言要做 App::setLocale()，將變數塞進去


        //選擇table
        $issues = \DB::select("select * from guests");

        // $member = DB::table('members')
        // ->select('users_id', 'email')
        // ->where([
        //     //用陣列方式寫法
        //     ['users_id',$session],
        // ])->first();

        // if($member){
        //     //驗證成功
        //     // session(['user_id' => $member->users_id]); 
            
        //     return view('welcome.index',['member' => $member, 'issues' => $issues]);
        // }else{
        //     return view('welcome.index',['issues' => $issues]);
        // }

        // echo App::getLocale();
        return view('welcome.index',['issues' => $issues]); //回傳 (welcome資料夾裡面的index檔,[issues' => $issues])
       

    }

    //查看該id的文章
    public function ViewComment(Request $req, $id){   

        $locale = session('locale', 'zh_tw');
        // echo $locale;
        App::setLocale($locale); 

        $issue = DB::table('guests')->where('users_id', $id)->first(); //指定guests這個table->查詢users_id等於$id->取第一筆資料 
        $replies = DB::table('reply')->where('guest_id', $id)->get();

        return view('welcome.view',['issue' => $issue, 'replies' => $replies]);
    }


    //回復文章留言表單
    public function ReplyComment(Request $req, $id ){

        return view('welcome.reply', ['id' => $id]);
    }

    //顯示該id的留言
    public function ReplyCommentSave(Request $req, $id){

        // 插入文章到資料庫
        DB::table('reply')
            ->insert //插入資料用 insert
            ([ 
            'guest_id' => $id,
            'users_name' =>$req->input('user_name'), //'資料表的欄位名稱'=> $req->input('form表單的name')
            'users_email' => $req->input('user_email'),
            'content' => $req->input('content'),
            'created_at' => now(),
            'updated_at' => now(),
            ]);

            return redirect()->route('view', ['id' => $id]);
    }


    //顯示新增文章表單
    public function AddComment(Request $req){

        // 開始 session
        // 設定 u_id 為變數 $session
        // 取到 user_id 的名字和信箱
        // 在 new 頁面顯示出來資料
        /* 說明 : session已經是該user_id，所以在路由不需要再帶入 {id} */

        session_start();

        $locale = session('locale', 'zh_tw');
        App::setLocale($locale); 

        $u_id = session('user_id');

        $member = DB::table('members')
        ->select('users_id', 'name', 'email')
        ->where([
            //用陣列方式寫法
            ['users_id',$u_id],
        ])->first();

        return view('welcome.new',['member' => $member]);

    }

    // 新增文章
    public function AddCommentSave(Request $req){

        /* 說明 : 我已經在新增文章表單的時候拿到 session 的 user_id
           所以在送出文章時
           也要寫入該 session 的 user_id，歸檔 */

        // 開始 session
        // 設定 u_id 為變數 $session
        // 將資料寫入該 session

        session_start();
        $u_id = session('user_id');
        // dd($u_id);

        $member = DB::table('members')
        ->select('users_id', 'name', 'email')
        ->where([
            //用陣列方式寫法
            ['users_id',$u_id],
        ])->first();
        // dd($member);
        

        // 插入文章到資料庫
        DB::table('guests')
            //插入資料用 insert
            ->insert ([ 
            'users_id' => $u_id,
            'users_name' => $req->input('name'), //'資料表的欄位名稱'=> $req->input('form表單的name')
            'users_email' => $req->input('email'),
            'title' => $req->input('title'),
            'content' => $req->input('content'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/')->with('success');
    }

    //修改文章(1. show該筆資料)
    public function EditComment(Request $req, $id){

        $locale = session('locale', 'zh_tw');
        App::setLocale($locale); 

        $issue = DB::table('guests')->where('users_id', $id)->first(); //指定guests這個table->查詢users_id等於$id->取第一筆資料 

        
        return view('welcome.edit',['issue' => $issue]);
    }

    //修改文章儲存(2. update該筆資料)
    public function EditCommentSave(Request $req, $id){

        $issue = DB::table('guests')->where('users_id', $id)->first(); 

        DB::table('guests')
            ->where('users_id', $id) //找到對應id
            ->update //更新資料
            ([
            'users_name' => $req->input('user_name'),
            'users_email' => $req->input('user_email'),
            'title' => $req->input('title'),
            'content' => $req->input('content'),
            'updated_at' => now(),
            ]);

        return redirect('/')->with('success');
    }

    //刪除文章
    public function DeleteComment(Request $req, $id){
        $issue = DB::table('guests')->where('users_id', $id)->delete(); 

        return redirect('/')->with('success');
    }

    //會員註冊
    public function MemberComment(Request $req){

        $locale = session('locale', 'zh_tw');
        App::setLocale($locale); 
        
        return view('welcome.member',[]);
    }

    public function MemberCommentSave(Request $req){

        $req->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //上傳檔案路徑
        $FilePath = null;
        if($req->hasFile('profile_picture')){
            $File = $req->file('profile_picture');
            $extension = $File -> getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension; //檔案的上傳名稱
            $FilePath = $File->storeAs('uploads/profile_pictures', $filename, 'public');

            // dd($FilePath);
        }

        // 插入會員到資料庫
        DB::table('members')
            ->insert
            ([ 
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'username' => $req->input('username'),
            'password' => $req->input('password'),
            'gender' => $req->input('gender'),
            'profile_picture' => $FilePath,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
            

            return redirect('/')->with('success');
    }

    //修改會員(1. show該筆會員)
    public function EditMemberComment(Request $req, $id){

        $locale = session('locale', 'zh_tw'); 
        // echo $locale;
        App::setLocale($locale);

        $member = DB::table('members')->where('users_id', $id)->first();

        return view('welcome.editMember', ['member' => $member]);

    }

    //修改會員儲存(2. update該筆會員資料)
    public function EditMemberCommentSave(Request $req, $id){
        
        $member = DB::table('members')->where('users_id', $id)->first(); 

        //上傳檔案路徑
        $FilePath = $member->profile_picture;
        
        if($req->profile_picture != ""){
            // dd($_FILES);
            $File = $req->file('profile_picture');
            $filename = time() . '_' . $File->getClientOriginalName();//檔案的上傳名稱
            $FilePath = $File->storeAs('uploads/profile_pictures', $filename, 'public');

            // dd($FilePath);
        }

        DB::table('members')
            ->where('users_id', $id) //找到對應id
            ->update //更新資料
            ([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'username' => $req->input('username'),
            'password' => $req->input('password'),
            'gender' => $req->input('gender'),
            'profile_picture' => $FilePath,
            'updated_at' => now(),
            ]);

        return redirect('/')->with('success');
    }

    //1.登入頁面顯示
    public function showLoginForm(Request $req){

        // 切換語言
        $locale = session('locale', 'zh_tw'); 
        // echo $locale;
        App::setLocale($locale);

        return view('welcome.login',[]);
    }

    //2.登入
    public function Login(Request $req){

        session_start();  // 開始 session

        $email = $req->input('email');
        $password = $req->input('password');

        $member = DB::table('members')  // 在 table('members') 裡面取'users_id', 'email', 'password 的資料
        ->select('users_id', 'email', 'password')
        ->where([
            //用陣列方式寫法
            ['email', $email],
            ['password', $password]
        ])->first();
        

        if($member){
            // 驗證成功
            session(['user_id' => $member->users_id]);  // 將 user_id 存入 table('members') 裡面
            
            return redirect('/')->with('success');
        }else{
            //驗證失敗
            return redirect('/login')->with('error');
        }        
    }

     //登出頁面顯示
    public function logout(Request $req){
        //清除資料
        session()->flush(); //可以選取要清掉的部分，不一定要全部清掉

        return redirect('/');
    }

    // 語言切換
    public function switchLang(Request $request)
    {
        session_start();

        $lang = $request->input('lang');
        $supportedLanguages = ['en', 'zh_tw']; 

        if (in_array($lang, $supportedLanguages)) {

            Session::put('locale', $lang);
            App::setLocale($lang);
        }

        // dd(session('locale'));
        // echo App::getLocale();
        // return redirect()->back();

        // $changeLang = [
        //     'guestbook' => trans('auth.guestbook'),
        //     'all_articles' => trans('auth.all_articles'),
        //     'new_article' => trans('auth.new_article'),
        //     'edit_member' => trans('auth.edit_member'),
        // ];

        // dd($changeLang);

        return redirect('/');
    }
}
