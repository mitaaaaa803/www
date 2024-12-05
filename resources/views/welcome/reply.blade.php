<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>回復文章留言表單</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<div class="container mt-5">
    <h2 class="mb-4">輸入留言</h2>

    <form action="/reply/{{ $id }}" method="POST" encType="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">姓名:</label>
            <input type="text" id="name" name="user_name" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">信箱:</label>
            <input type="email" id="mail" name="user_email" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="msg" class="form-label">內容:</label>
            <textarea name="content" placeholder="輸入留言..." class="form-control" required></textarea>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">送出</button>
        </div>
        
    </form>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>


