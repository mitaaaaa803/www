<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增文章</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<div class="container mt-5">
    <form action="/new/{{ $member->users_id }}" method="post" encType="multipart/form-data">
        @csrf
        <h2 class="mb-4">{{ trans('auth.new_article') }}</h1>

        <div class="mb-3">
            <label for="name" class="form-label">{{trans('auth.name')}} :</label>
            <input type="text" class="form-control" id="name" name="name" id="exampleFormControlInput1" value="{{ $member->name }}" required/>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">{{trans('auth.mail')}} :</label>
            <input type="email" class="form-control" id="mail" name="email" id="exampleFormControlInput1" value="{{ $member->email }}" required/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">{{trans('auth.title')}} :</label>
            <input type="" class="form-control" id="title" name="title" id="exampleFormControlInput1" required/>
        </div>
        <div class="mb-3">
            <label for="msg" class="form-label">{{trans('auth.content')}} :</label>
            <textarea id="msg" class="form-control" name="content" id="exampleFormControlInput1" required></textarea>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">{{trans('auth.send')}}</button>
        </div>
    </form>
</div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>

<!-- 筆記 -->
<!-- 增加 小老鼠include('welcome._index_list')-->
<!-- 把 welcome._index_list 的內容 view 出來-->

