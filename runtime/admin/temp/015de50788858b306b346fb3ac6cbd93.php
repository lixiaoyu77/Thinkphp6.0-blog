<?php /*a:2:{s:44:"C:\wamp64\www\blog\view\admin\auth\edit.html";i:1660144763;s:46:"C:\wamp64\www\blog\view\admin\public\base.html";i:1660123290;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP6Demo-- 修改权限</title>

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
                <button class="btn btn-secondary mb-3 repeat">书籍管理</button> 
            </div> 
            <div class="col-9 main"> 
                
 <!--添加管理UI-->
 <form action="<?php echo url('/admin/auth/'.$obj['id']); ?>" method="post">
    <input type="hidden" name="_method" value="put">
    <fieldset class="w-75">
        <!--管理员-->
        <div class="form-group row">
            <label for="name" class="col-2 col-form-label">管理员:</label>
            <div class="col-8">
            <input type="text" id="name" name="name" class="form-control" disabled value="<?php echo htmlentities($obj['name']); ?>">
            </div>
            <span class="col-2 text-danger col-form-label">*</span>
        </div>
        <!--密码-->
        <div class="form-group row">
            <label for="newpassword" class="col-2 col-form-label">新密码:</label>
            <div class="col-8">
            <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="请输入新密码">
            </div>
            <span class="col-2 text-danger col-form-label">*</span>
        </div>
        <!--权限范围-->
        <div class="form-group row">
            <label for="password" class="col-2 col-form-label">修改权限:</label>
            <div class="col-8">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ol): $mod = ($i % 2 );++$i;?>
                <label for="<?php echo htmlentities($ol['id']); ?>" class="col-form-label" >
                    
                    <input type="checkbox" id="<?php echo htmlentities($ol['id']); ?>" name='role[]' value="<?php echo htmlentities($ol['id']); ?>"  <?php if(is_array($alist) || $alist instanceof \think\Collection || $alist instanceof \think\Paginator): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> <?php echo $ol['id']==$vo['role_id'] ? 'checked'  :  ''; ?>  <?php endforeach; endif; else: echo "" ;endif; ?> >
                    
                    <span class="col-form-label-sm"><?php echo htmlentities($ol['type']); ?></span>
                    
                </label>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <span class="col-2 text-danger col-form-label">*</span>
        </div>
        <!--协议-->
        <div class="form-group row">
            <label  class="col-2"></label>
            <div class="col-6">

            </div>
            <div class="col-2 text-right">
               <a href="<?php echo url('/admin/auth'); ?>">返回列表</a>
            </div>
        </div>
        <!--提交-->

        <div>
            
                
            
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label"></label>
            <div class="col-8">
                <input type="hidden" value="<?php echo token(); ?>" name="__token__">
            <button class="btn btn-success w-100">修改管理</button>
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
    $('.repeat').click(() => { 
        alert('自行扩展');
    }) 
</script>
</body>
</html>