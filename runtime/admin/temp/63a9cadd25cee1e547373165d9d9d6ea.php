<?php /*a:2:{s:45:"C:\wamp64\www\blog\view\admin\role\index.html";i:1660181332;s:46:"C:\wamp64\www\blog\view\admin\public\base.html";i:1660287691;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP6Demo-- 角色列表</title>

    <!-- 引入 Bootstrap CSS --> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/bootstrap.min.css" /> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/style.css" />
    <style>
		.pagination { 

			list-style: none; 
			margin: 0;
   			padding-left: 270px;
		}
		.pagination li { 
			
			display: inline-block; 
			padding: 8px; }
	</style>
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
                
        <table class="table table-bordered"> 
                    <thead class="thead-light"> 
                        <tr>
                            <th class="text-center">ID</th> 
                            <th>角色名</th> 
                            <th >模块地址</th> 
                
                            <th class="text-center">操作</th> 
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($list as $obj) {?>
                        <tr>
                            <td class="text-center"><?=$obj['id']?></td>
                            <td ><?=$obj['type']?></td>
                            <td ><?=$obj['uri']?></td>
                           
                            <td class="text-center"> 
                                <form action="<?php echo url('/auth/'.$obj['id']); ?>" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-danger btn-sm btn-delete" >删除</button> 
                                    <a href="<?php echo url('/auth/'.$obj['id'].'/edit'); ?>" class="btn btn-warning btn-sm  ">修改</a>
                                </form>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
        </table> 

            </div> 
        </div> 
    </div>
<!-- 引入 JS 文件 --> 
<script type="text/javascript" src="http://localhost:8000/src/blog/js/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" src="http://localhost:8000/src/blog/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript"> 
    $('.btn-delete').click(() => { 
        let flag = confirm('真的要删除这条数据吗？'); 
        return flag ? true : false; 
    }) 
    $('[data-toggle="tooltip"]').tooltip();
</script>


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