<?php /*a:2:{s:47:"C:\wamp64\www\blog\view\admin\index\create.html";i:1660126549;s:46:"C:\wamp64\www\blog\view\admin\public\base.html";i:1660145264;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP6Demo-- 添加用户</title>

    <!-- 引入 Bootstrap CSS --> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/bootstrap.min.css" /> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/style.css" />

    <!-- 移动设备优先 --> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <!--导航-->
    <nav class="navbar navbar-light bg-light shadow-sm p-1">
        <a href=""></a>
        <div class="nav-item dropdown mr-2" >
            <a href="" class="dropdown-toggle nav-link text-secondary" data-toggle="dropdown"><?php echo session('admin'); ?></a>
            <div class="dropdown-menu">
                <a href="" class="dropdown-item">个人中心</a>
                <a href="<?php echo url('admin/logout'); ?>" class="dropdown-item">退出管理</a>
            </div>
        </div>
    </nav>
    <!--核心部分--> 
    <div class="container pt-5 mt-5"> 
        <div class="row"> 
            <div class="col-2 sidebar pt-2"> 
                <button class="btn btn-secondary mb-3 user">用户管理</button>           
                <button class="btn btn-secondary mb-3 auth">权限管理</button> 
                <button class="btn btn-secondary mb-3 repeat">喜好管理</button> 
                <button class="btn btn-secondary mb-3 role">角色管理</button> 
                <button class="btn btn-secondary mb-3 artical">文章管理</button> 
            </div> 
            <div class="col-9 main"> 
                
 <!--添加用户-->
 <form action="<?php echo url('admin/index'); ?>" method="post">
    <fieldset class="w-75">
        <!--用户名-->
        <div class="form-group row">
            <label for="username" class="col-2 col-form-label">用户名:</label>
            <div class="col-8">
            <input type="text" id="username" name="username" class="form-control" placeholder="请输入用户名">
            </div>
            <span class="col-2 text-danger col-form-label">*</span>
        </div>
        <!--密码-->
        <div class="form-group row">
            <label for="password" class="col-2 col-form-label">密码:</label>
            <div class="col-8">
            <input type="password" id="password" name="password" class="form-control" placeholder="请输入密码">
            </div>
            <span class="col-2 text-danger col-form-label">*</span>
        </div>
        <!--密码确认-->
        <div class="form-group row">
            <label for="passwordnot" class="col-2 col-form-label">密码确认:</label>
            <div class="col-8">
            <input type="password" id="passwordnot" name="passwordnot" class="form-control" placeholder="请输入密码确认">
            </div>
            <span class="col-2 text-danger col-form-label">*</span>
        </div>
        <!--性别-->
        <div class="form-group row">
            <label for="passwordnot" class="col-2 col-form-label">性别:</label>
            <div class="col-8">
                <label for="man" class="col-form-label col-2">
                    <input type="radio" id="man" name="gender" value="男" checked>
                    男
                </label>
                <label for="woman" class="col-form-label col-6">
                    <input type="radio" id="woman" name="gender" value="女">
                    女
                </label>
            </div>

        </div>
         <!--电子邮箱-->
        <div class="form-group row">
            <label for="email" class="col-2 col-form-label">电子邮箱:</label>
            <div class="col-8">
            <input type="text" id="email" name="email" class="form-control" placeholder="请输入电子邮箱">
            </div>
            <span class="col-2 text-danger col-form-label">*</span>
        </div>
        <!--爱好-->
        <div class="form-group row">
            <label for="content" class="col-2 col-form-label">爱好:</label>
            <div class="col-8">
            <input type="text" id="content" name="content" class="form-control" placeholder="请输入您的爱好">
            </div>
            
        </div>
        <!--协议-->
        <div class="form-group row">
            <label  class="col-2"></label>
            <div class="col-6">
                <label for="agree" >
                    <input type="checkbox" id="agree" name="agree"  >
                    <span class="col-form-label-sm ">我已阅读</span>
                </label>
            </div>
            <div class="col-2 text-right">
               <a href="<?php echo url('admin/index'); ?>">返回列表</a>
            </div>
        </div>
        <!--提交-->
        <div class="form-group row">
            <label class="col-2 col-form-label"></label>
            <div class="col-8">
                <input type="hidden" value="<?php echo token(); ?>" name="__token__">
            <button class="btn btn-success w-100">添加用户</button>
            </div>  
        </div>
        
    </fieldset>
</form>

            </div> 
        </div> 
    </div>
<!-- 引入 JS 文件 --> 
<script type="text/javascript" src="http://localhost:8000/src/blog/js/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" src="http://localhost:8000/src/blog/js/bootstrap.bundle.min.js"></script>



<script>
    $('.user').click(() => { 
        location.href='/admin/index.html'
    }) 
    $('.auth').click(() => { 
        location.href='/admin/auth.html'
    }) 
    $('.role').click(() => { 
        location.href='/admin/role.html'
    }) 
    $('.artical').click(() => { 
        location.href='/admin/artical.html'
    }) 
    $('.repeat').click(() => { 
        alert('自行扩展');
    }) 
</script>
</body>
</html>