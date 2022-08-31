<?php /*a:1:{s:47:"C:\wamp64\www\blog\view\admin\artical\edit.html";i:1660227982;}*/ ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>TP6Demo--修改文章</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="<?php echo url('/admin/artical/'.$obj['id']); ?>" method="post">
    <input type="hidden" name="_method" value="put">
    <div class="panel panel-success">
        <div class="panel-heading ">
                <h3 class="panel-title ">发布帖子</h3>
        </div>

        <div class="panel-body">
            <!--*作者-->
            <div class="form-group row">
                <div class="col-xs-12">
                    <input type="text" class="form-control" id="authname"  name="authname" value="管理员：<?php echo session('admin'); ?> 你好！" disabled>
                </div>
            </div>
            <!---标题-->
            <div class="form-group row">
                <div class="col-xs-12">
                    <input type="text" class="form-control" id="tittle" name="tittle" placeholder="请输入标题" value="<?php echo htmlentities($obj['tittle']); ?>">
                </div>
            </div>
            <!---内容-->
            <div class="form-group row">
                <div class="col-xs-12">
                    <textarea class="form-control" rows="3" placeholder="请输入内容" id="contents" name="contents"  ><?php echo htmlentities($obj['contents']); ?></textarea>
                </div>
            </div>
            <!--返回-->
            <div class="form-group row">
                <label  class="col-2"></label>

                <div class="col-4 text-right">
                <a href="<?php echo url('/admin/artical'); ?>">返回列表</a>
                </div>
            </div>
            <!---提交-->
            <div class="form-group row right">
                <div class="col-xs-10 text-center">
                    <input type="hidden" value="<?php echo token(); ?>" name="__token__">
                    <button type="submit" class="btn btn-primary btn-click">修改文章</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript"> 
    $('.btn-click').click(() => { 
        let flag = confirm('确认修改这篇文章！！！'); 
        return flag ? true : false; 
    }) 
</script>
</body>