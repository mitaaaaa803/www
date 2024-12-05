<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 24rem;">
        <form method="POST" action="/login" encType="multipart/form-data">
            @csrf <!-- CSRF 防禦 -->
            <h2 class="text-center mb-4">登入</h2>
            <div class="mb-3">
                <label for="email" class="form-label">信箱</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="輸入你的信箱..." required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">密碼</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="輸入你的密碼..." required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                <label class="form-check-label" for="rememberMe">記住我</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">登入</button>
        </form>
        <div class="text-center mt-3">
            <p class="mb-0">我還不是會員？<a href="/member/" class="text-primary">立即註冊</a></p>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
