<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改會員</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<div class="container mt-5">
    <!-- form 表單都需要加 enctype -->
    <form action="/editMember/{{ $member->users_id }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <h2 class="mb-4">修改會員資料</h2>

        <div class="mb-3">
            <label for="name" class="form-label">名字:</label> 
            <input type="text" id="name" name="name" class="form-control" value="{{ $member->name }}" required/>

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">信箱:</label>
            <input type="email" id="mail" name="email" class="form-control" value="{{$member->email}}" required/>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">帳號:</label> 
            <input type="" id="username" name="username" class="form-control" value="{{$member->username}}" required/>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">密碼:</label> 
            <input type="password" id="password" name="password" class="form-control" value="{{$member->password}}" required/>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">性別:</label> 
            <input type="radio" id="male" name="gender" value="male" class="form-check-input"
                {{ $member->gender === 'male' ? 'checked' : '' }} required />

            <label for="male" class="form-check-label">男</label>
            <input type="radio" id="female" name="gender" value="female" class="form-check-input"
                {{ $member->gender === 'female' ? 'checked' : '' }} required/>

            <label for="female" class="form-check-label">女</label>
            <input type="radio" id="gender" name="gender" value="other" class="form-check-input"
                {{ $member->gender === 'other' ? 'checked' : '' }} required/>

            <label for="other" class="form-check-label">其他</label>
        </div>
        
        <div class="mb-3">
            <label for="profile_picture" class="form-label">大頭照:</label>
                        <!-- 路徑 : storage/ -->
            <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="Profile Picture" width="100"/>
            <input type="file" name="profile_picture" class="" required>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">更新</button> 
        </div>
        

</form>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

