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
        <h2 class="mb-4">{{trans('auth.member_registration')}}</h1>

        <div class="mb-3">
            <label for="name" class="form-label">{{trans('auth.name')}} :</label>
            <input type="text" id="name" name="name" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">{{trans('auth.mail')}} :</label>
            <input type="email" id="mail" name="email" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">{{trans('auth.account')}} :</label>
            <input type="" id="" name="username" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="msg" class="form-label">{{trans('auth.password')}} :</label>
            <input type="password" id="" name="password" class="form-control" required/>
        </div>
      
        <div class="mb-3">
            <label class="form-label">{{trans('auth.gender')}} :</label>
            <input type="radio"  class="form-check-input" id="male" name="gender" value="male" checked required />

            <label for="male" class="form-check-label">{{trans('auth.male')}}</label>
            <input type="radio"  class="form-check-input" id="female" name="gender" value="female" required/>

            <label for="female" class="form-check-label">{{trans('auth.female')}}</label>
            <input type="radio"  class="form-check-input" id="other" name="gender" value="other" required />

            <label for="other" class="form-check-label">{{trans('auth.other')}}</label>
        </div>

        <div class="mb-3">
            <label for="profile_picture" class="form-label">{{ trans('auth.headshot') }}:</label>

            <div class="custom-file-upload d-flex align-items-center gap-3">
                <!-- 自訂檔案選擇按鈕 -->
                <label for="profile_picture" class="btn btn-outline-primary">
                    {{ trans('auth.choose_file') }}
                </label>

                <!-- 隱藏的檔案輸入框 -->
                <input type="file" id="profile_picture" name="profile_picture" style="display: none;" required>

                <!-- 顯示檔案名稱的區塊 -->
                <span id="file-name" class="text-secondary">
                    {{ trans('auth.no_file_chosen') }}
                </span>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">{{trans('auth.send')}}</button>
        </div>
    </form>
</div>   

<script>
    document.getElementById('profile_picture').addEventListener('change', function(){

        const fileName = this.files[0]?.name? || '{{ trans('auth.no_file_chosen') }}';
        document.getElementById('file-name').textContent = fileName;
    });
</script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>


