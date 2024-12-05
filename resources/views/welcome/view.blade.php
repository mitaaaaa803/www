<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看文章</title>
    <link rel="stylesheet" href="style.css">
    <!-- 引入 Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head> 
<style>
    .pepole{
        display: flex;
        justify-content: end;
    }
    .pepoleSpace{
        margin-left: 15px;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">查看文章</h2>
        <div class="mb-3">
            <label for="msg" class="fw-bold">內容:</label> 
            <p class="border p-3 bg-light rounded">{{ $issue->content }}</p>
        </div>
        
        <div class="pepole">
            <div class="mb-3">
                <label for="name" class="fw-bold pepoleSpace">姓名:</label> {{$issue->users_name}}
            </div>
            <div class="mb-3">
                <label for="mail" class="fw-bold pepoleSpace">信箱:</label> {{$issue->users_email}}
            </div>
        </div>

    @if(session()->has('user_id'))    
    <div class="text-end">
        <a href="/reply/{{ $issue->users_id }}"  class="btn btn-primary">留言回覆</a>
    </div>
    @else
    <div class="text-end">
        <a href="/reply/{{ $issue->users_id }}"  class="btn btn-primary disabled">留言回覆</a>
    </div> 
    @endif             
</div>

<div class="container mt-5">
    <!-- 顯示留言 -->
    <h3>留言列表</h3>    
        <ul class="list-group">
            @foreach ($replies as $reply)
                <li class="list-group-item">
                    <p>{{ $reply->users_name }}:</p>
                    <p>{{ $reply->content }}</p>
                    <div class="pepole">
                        <span class="pepoleSpace">信箱: {{ $reply->users_email }}</span>
                        <span class="pepoleSpace">新增時間: {{ $reply->created_at }}</span>
                    </div>   
                </li>
            @endforeach
        </ul>
</div>


<!-- 引入 Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>

