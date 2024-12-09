<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改會員</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        .custom-file-upload {
            display: inline-block;
            gap: 10px;
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        .custom-file-upload .btn {
            cursor: pointer;
            /* padding: 10px 20px; */
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>

</head>

<div class="container mt-5">
    <!-- form 表單都需要加 enctype -->
    <form action="/editMember/{{ $member->users_id }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <h2 class="mb-4">{{trans('auth.modify_member_information')}}</h2>

        <div class="mb-3">
            <label for="name" class="form-label">{{trans('auth.name')}} :</label> 
            <input type="text" id="name" name="name" class="form-control" value="{{ $member->name }}" required/>

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{trans('auth.mail')}} :</label>
            <input type="email" id="mail" name="email" class="form-control" value="{{$member->email}}" required/>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">{{trans('auth.account')}} :</label> 
            <input type="" id="username" name="username" class="form-control" value="{{$member->username}}" required/>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{trans('auth.password')}} :</label> 
            <input type="password" id="password" name="password" class="form-control" value="{{$member->password}}" required/>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">{{trans('auth.gender')}} :</label> 
            <input type="radio" id="male" name="gender" value="male" class="form-check-input"
                {{ $member->gender === 'male' ? 'checked' : '' }} required />

            <label for="male" class="form-check-label">{{trans('auth.male')}}</label>
            <input type="radio" id="female" name="gender" value="female" class="form-check-input"
                {{ $member->gender === 'female' ? 'checked' : '' }} required/>

            <label for="female" class="form-check-label">{{trans('auth.female')}}</label>
            <input type="radio" id="gender" name="gender" value="other" class="form-check-input"
                {{ $member->gender === 'other' ? 'checked' : '' }} required/>

            <label for="other" class="form-check-label">{{trans('auth.other')}}</label>
        </div>
        
        <div class="mb-3">
            <label for="profile_picture" class="form-label">{{trans('auth.headshot')}} :</label>
                        <!-- 路徑 : storage/ -->
            <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="Profile Picture" width="100"/>
            
            <div class="custom-file-upload">
                <label for="profile_picture" class="btn btn-primary">
                    {{ trans('auth.choose_file') }}
                </label>
                <input type="file" id="profile_picture" name="profile_picture" style="display: none;" required> <!-- 為預設按鈕 隱藏起來 -->
                <span id="file-name">{{ trans('auth.no_file_chosen') }}</span>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">{{trans('auth.update')}}</button> 
        </div>
        

</form>
</div>

<script>

    document.getElementById('profile_picture').addEventListener('change', function () {
    
        const fileName = this.files[0]?.name || '{{ trans('auth.no_file_chosen') }}';
        document.getElementById('file-name').textContent = fileName;

    });

// document.getElementById('profile_picture')
// id="profile_picture" 是的檔案上傳輸入元素。

// .addEventListener('change', function () {})
// 為事件監聽功能， change 事件，change 事件在使用者選擇檔案"後"觸發
// this.files[0] 為檔案的列表(陣列)，<input type="file"> 預設是只能選取一個檔案

// ?.（可選鏈結運算子）
// this.files[0]?.name 的意思是 ->「如果 files[0] 存在，則取它的 name 屬性（檔案名稱）；否則返回 undefined」。
// || '{{ trans('auth.no_file_chosen') }}' -> 如果 files[0]?.name 的值是 undefined（表示沒有選擇檔案），則使用 trans('auth.no_file_chosen') 翻譯字串作為預設值。

// document.getElementById('file-name')
// 抓取 HTML 中 id="file-name" 的元素。

// .textContent = fileName
// 將上一步取得的檔案名稱或預設文字設為此元素的文字內容，動態更新頁面。



</script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

