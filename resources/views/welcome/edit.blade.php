<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改文章</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<div class="container mt-5">
     <h2 class="mb-4">{{trans('auth.update_article')}}</h2>

    <form method="POST" action="/edit/{{ $issue->users_id }}" enctype="multipart/form-data">
        @csrf <!-- @csrf 為保護機制 -->

        <div class="mb-3 disabled">
            <label for="name" class="form-label">{{trans('auth.name')}} :</label>
            <input type="text" id="name" name="user_name" class="form-control" value="{{$issue->users_name}}" required/>
        </div>

        <div class="mb-3">
            <label for="mail" class="form-label">{{trans('auth.mail')}} :</label>
            <input type="email" id="mail" name="user_email" class="form-control" value="{{$issue->users_email}}" required/>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">{{trans('auth.title')}} :</label>
            <input type="" id="title" name="title" class="form-control" value="{{$issue->title}}" required/>
        </div>

        <div class="mb-3">
            <label for="msg" class="form-label">{{trans('auth.content')}} :</label>
            <textarea id="msg" name="content" class="form-control" required>{{ $issue->content }}</textarea>
        </div>
        
        @if(session('user_id') == $issue->users_id)
        <div class="text-end">
            <button type="submit" class="btn btn-primary">{{trans('auth.update')}}</button>  
        </div>
        @else
        <div class="text-end">
            <button type="submit" class="btn btn-primary disabled">{{trans('auth.update')}}</button>  
        </div>
        @endif

    </form>
</div>
   


<script src="script.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>



