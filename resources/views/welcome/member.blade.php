<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<div class="container mt-5">
    <!-- form 表單都需要加 enctype -->
    <form action="/member/" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="mb-4">會員註冊</h1>

        <div class="mb-3">
            <label for="name" class="form-label">姓名:</label>
            <input type="text" id="name" name="name" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">信箱:</label>
            <input type="email" id="mail" name="email" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">帳號:</label>
            <input type="" id="" name="username" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="msg" class="form-label">密碼:</label>
            <input type="password" id="" name="password" class="form-control" required/>
        </div>
      
        <div class="mb-3">
            <label class="form-label">性別:</label>
            <input type="radio"  class="form-check-input" id="male" name="gender" value="male" checked required />

            <label for="male" class="form-check-label">男</label>
            <input type="radio"  class="form-check-input" id="female" name="gender" value="female" required/>

            <label for="female" class="form-check-label">女</label>
            <input type="radio"  class="form-check-input" id="other" name="gender" value="other" required />

            <label for="other" class="form-check-label">其他</label>
        </div>

        <div class="mb-3">
            <label for="myfile" class="form-label">選擇大頭照:</label>
            <input type="file" name="profile_picture" class="form-control" required>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">送出</button>
        </div>
    </form>
</div>   

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>


