<?php /*a:1:{s:47:"C:\wamp64\www\blog\view\admin\public\toast.html";i:1659342648;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- 引入 Bootstrap CSS --> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/bootstrap.min.css" /> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/style.css" />

    <!-- 移动设备优先 --> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <!--简易提示--> 
<div class="d-flex vw-100 vh-100 bg-light justify-content-center align-items-center">
   <div class="toast show mb-5 pl-3 pr-3">
       <div class="toast-header">
           <strong>● 系统提示</strong>
       </div>
       <div class="toast-body">
           <ol class="text-danger">
               <?php if(is_array($infos) || $infos instanceof \think\Collection || $infos instanceof \think\Paginator): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
               <li><?php echo htmlentities($item); ?></li>
               <?php endforeach; endif; else: echo "" ;endif; ?>
           </ol>
           <a href="<?php echo htmlentities($url_path); ?>" class="btn btn-primary btn-sm w-100"><?php echo htmlentities($url_text); ?></a>
       </div>
   </div>
</div>
    <!-- 引入 JS 文件 --> 
    <script type="text/javascript" src="http://localhost:8000/src/blog/js/jquery-3.3.1.min.js"></script> <script type="text/javascript" src="http://localhost:8000/src/blog/js/bootstrap.bundle.min.js"></script>
</body>
</html>