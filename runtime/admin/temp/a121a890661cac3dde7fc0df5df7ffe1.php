<?php /*a:2:{s:46:"C:\wamp64\www\blog\view\admin\index\index.html";i:1660198192;s:46:"C:\wamp64\www\blog\view\admin\public\base.html";i:1660287691;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP6Demo-- 用户列表</title>

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
                
<!--搜索和表单-->
 <form action="<?php echo url('/admin/index'); ?>" class="pb-3">
    <div class="form-row">
        <div class="col-form-label">
            <label for="username">用户名：</label>
        </div>
        <div class="col-2">
            <input type="text" id="username" name="username" class="form-control" placeholder="查询的用户名">
        </div>
        <div class="col-form-label">
            <label for="email">邮箱：</label>
        </div>
        <div class="col-2">
            <input type="text" id="email" name="email" class="form-control" placeholder="查询的邮箱">
        </div>
        <div class="col-form-label">
            <label for="gender">性别：</label>
        </div>
        <div class="col-2">
            <select name="gender" id="gender" class="custom-select">
                <option selected value="">选择性别</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" >搜索</button>
            <a href="<?php echo url('/admin/index/create'); ?>" class="btn btn-success">添加用户</a>
        </div>
    </div>
</form>

<!--数据列表--> 
<table class="table table-bordered"> 
    <thead class="thead-light"> 
        <tr>
            <th class="text-center">ID</th> 
            <th>用户名</th> 
            <th class="text-center">性别</th> 
            <th >邮箱</th> 
            <th class="text-center">状态</th> 
            <th class="text-center <?php echo $orderTime=='desc' ? ''  :  'dropup'; ?>">
                <a href="<?php echo app\admin\common\Tool::url('create_time'); ?>create_time=<?php echo htmlentities($orderTime); ?>" class="text-secondary text-decoration-none dropdown-toggle">创建时间</a> 
            </th> 
            <th class="text-center">操作</th> 
        </tr>
    </thead>
    <tbody>
        <?php $empty = '
        <tr>
            <td colspan="7" class="text-center text-muted">没有数据</td>
        </tr>
        <tr>
            <td colspan="7" class="text-right"> <a href="index.html"><button class="btn btn-primary" >返回</button></a> 
            </td>
        </tr>
        '; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?>
        <tr>
            <!--模版部分，采用<volist>遍历显示数据；-->
            <td class="text-center"><?php echo htmlentities($obj['id']); ?></td>
            <td ><span data-toggle="tooltip" data-placement="right" title="<?php echo !empty($obj['hobby']['content']) ? htmlentities($obj['hobby']['content']) : ''; ?>"><?php echo htmlentities($obj['username']); ?></span></td>
            <td class="text-center"><?php echo htmlentities($obj['gender']); ?></td>
            <td ><?php echo htmlentities($obj['email']); ?></td>
            <td class="text-center">    
                <span class="badge btn-<?php echo htmlentities($obj['badge']); ?>"><?php echo htmlentities($obj['status']); ?></span>
            </td>
            <td><?php echo htmlentities($obj['create_time']); ?></td>
            <td class="text-center"> 
                <form action="<?php echo url('/admin/index/'.$obj['id']); ?>" method="post">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-danger btn-sm btn-delete" >删除</button> 
                    <a href="<?php echo url('/admin/index/'.$obj['id'].'/edit'); ?>" class="btn btn-warning btn-sm  ">修改</a>
                </form>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </tbody>
</table> 

<!--框架分页-->
<?php echo $list; ?>

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