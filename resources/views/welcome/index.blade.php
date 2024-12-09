<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<style>
    .btn-secondary {
        background-color: #cccccc !important;
        color: #666666 !important;
        border: none !important;
        cursor: not-allowed; 
}
</style>

    <header class="bg-light py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h2>{{ trans('auth.all_articles') }}</h2>
            <div>
                @if(session()->has('user_id'))
                <a href="/new/" class="btn btn-primary me-2">{{ trans('auth.new_article') }}</a>
                @else
                <a href="/new/" class="btn btn-secondary disabled">{{ trans('auth.new_article') }}</a>
                @endif

                @if(session()->has('user_id'))
                <a href="/editMember/{{ session('user_id') }}" class="btn btn-primary me-2">{{ trans('auth.edit_member') }}</a>
                @else
                <a href="/editMember/{{ session('user_id') }}" class="btn btn-secondary disabled">{{ trans('auth.edit_member') }}</a>
                @endif

                @if(session()->has('user_id'))
                <a href="/logout/" class="btn btn-success" onclick="return confirmLogout()">{{ trans('auth.logout') }}</a>
                @else
                <a href="/login/" class="btn btn-success">{{trans('auth.login')}}</a>
                @endif

                <!-- 切換語言 -->
                <form action="{{ route('switchLang') }}" method="POST" class="d-inline">
                @csrf
                    <select name="lang" onchange="this.form.submit()" class="form-select d-inline-block w-auto">
                        <option value="zh_tw" {{ session('locale') === 'zh_tw' ? 'selected' : '' }}>繁體中文</option>
                        <option value="en" {{ session('locale') === 'en' ? 'selected' : '' }}>English</option>
                    </select>
                </form>

            
            </div>
        </div>
    </header>
    
    <div class="container">   
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <td>{{ trans('auth.name') }}</td>
                    <td>{{ trans('auth.title') }}</td>
                    <td>{{ trans('auth.last_updated') }}</td>
                    <td></td>
                </tr>
            </thead>
            
            <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td>{{$issue->users_name}}</td>     <!-- 資料庫有 users_name、users_email、title、content、created_at、updated_at -->    
                    <td>{{$issue->title}}</td>          <!-- 我只需顯示的欄位只有 users_name、title、updated_at-->
                    <td>{{$issue->updated_at}}</td>
                    <td>
                        <a href="/view/{{ $issue->users_id }}" class="btn btn-info btn-sm me-1">{{ trans('auth.view') }}</a>
                        
                        @if(session('user_id') == $issue->users_id)                       
                        <a href="/edit/{{ $issue->users_id }}"  class="btn btn-info btn-sm me-1">{{ trans('auth.edit') }}</a>   <!-- 跳轉到 "/edit/頁面"，根據{{ $issue->users_id }}把資料顯示出來 -->
                        @else
                        <a href="/edit/{{ $issue->users_id }}"  class="btn btn-info btn-sm me-1 btn-secondary disabled">{{ trans('auth.edit') }}</a>
                        @endif

                        @if(session('user_id') == $issue->users_id)
                        <a href="/delete/{{ $issue->users_id }}" class="btn btn-danger btn-sm" onclick="return confirmDelete()">{{ trans('auth.delete') }}</a>     
                        @else
                        <a href="/delete/{{ $issue->users_id }}" class="btn btn-danger btn-sm btn-secondary disabled">{{ trans('auth.delete') }}</a>     
                        @endif
                    </td>
                </tr>
            @endforeach 


        </table>  
    </div>


    <script>
        function confirmLogout(){

            const logoutMessage = @json(trans('auth.logout_confirm')); // 轉換成json格式
            
            return confirm(logoutMessage);
        }

        function confirmDelete(){

            const deleteMessage = @json(trans('auth.delete_confirm'));

            return confirm(deleteMessage);

        }
    </script>
    
    <script src="script.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>

<!-- 筆記 -->
<!-- 增加 小老鼠include('welcome._index_list')-->
<!-- 把 welcome._index_list 的內容 view 出來-->

