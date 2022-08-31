<?php /*a:2:{s:48:"C:\wamp64\www\blog\view\index\artical\index.html";i:1660285879;s:46:"C:\wamp64\www\blog\view\index\public\base.html";i:1660288062;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP6Demo-- 最新文章</title>
    <!-- 引入 Bootstrap CSS --> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/bootstrap.min.css" /> 
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/style.css" />
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/iconfont.css.css" />
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/common.css" />
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/src/blog/css/style1.css" />


    <script type="text/javascript" src="http://localhost:8000/src/blog/js/selector.js.js"></script>
    <script type="text/javascript" src="http://localhost:8000/src/blog/js/index.js"></script>
	<style>
		.pagination { 	
			padding-top: 20px;
			list-style: none; 
			margin: 0;
   			padding-left: 222px;
		}
		.pagination li { 
			display: inline-block; 
			padding: 8px; }
		.pagination > li > a{
			color: black;
		}
    	.pagination > li > span {
        	color: black;
			
    	}
	</style>
    
    <!-- 移动设备优先 --> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<!--oncontextmenu="return false"-->
<body ondragstart="return false" onselectstart="return false" onselect="document.selection.empty()">
    <!--导航-->
        <header>
			<div class="header-box">
				<p>		
					“欢迎来到Leo的博客！！！”<br/>

				</p>
				<div class="box">
					<div class="light"></div>
					<span class="box1">
						<div class="star">
							<div class="srT sr1"></div>
							<div class="srL sr2"></div>
							<div class="srL sr3"></div>
							<div class="srT sr4"></div>
							<div class="spot"></div>
						</div>
					</span>
					<span class="box2">
						<div class="star">
							<div class="srT sr1="></div>
							<div class="srL sr2"></div>
							<div class="srL sr3"></div>
							<div class="srT sr4"></div>
							<div class="spot"></div>
						</div>
					</span>
				</div>
				<div class="album r">
					<img src="/src/blog/img/MY.png" alt="相册"/>
				</div>

			</div>
		</header>
		<nav class="nav">
			<ul>
				<li class="current index">首页</a></li>
				<li class="artical">最新文章</a></li>
				<li class="repeat">资源共享</a></li>
				<li class="repeat">博主动态</a></li>
				<li class="repeat">关于Leo</a></li>
			</ul>
		</nav>
		<div class="embellish">
			<a class="rocket"></a>
			<div class="aside"></div>
		</div>
		<section>
		
		

		<article>
			<aside class="left-box l">
				<div class="art Label clearfix">
					<h2 class="art-txt"> <em class="iconfont icon-biaoqian "></em> <span>热门标签</span> </h2>
					<div> 
						<a class="btn label" href="#">Laiyu</a><a class="btn label" href="#">Vue</a>
						<a class="btn label" href="#">ThinkPHP6</a><a class="btn label" href="#">Java</a>
						<a class="btn label" href="#">后台管理</a><a class="btn label" href="#">Bootstrap</a>
						<a class="btn label" href="#">PHP</a><a class="btn label" href="#" >React</a>
					</div>
				</div>

				<div class="art Follow clearfix">
					<h2 class="art-txt"> <em class="iconfont icon-xing "></em> <span>关注博主</span> </h2>
					<div class="two-code">
						<img src="/src/blog/img/vx.jpg" alt="扫一扫，关注我哦">
						<p class="sao-txt">扫一扫二维码，关注博主！</p>
					</div>
				</div>
				<div class="art Link mt20 clearfix">
					<h2 class="art-txt"> <em class="iconfont icon-lianjie"></em> <span>友情链接</span> </h2>
					<ul class="fri-link">
						<li><a href="https://www.w3school.com.cn/" target="_blank" rel="nofollow">w3school</a></li>
						<li><a href="https://www.runoob.com/" target="_blank" rel="nofollow">菜鸟联盟</a></li>
						<li><a href="https://www.bejson.com/default.htm" target="_blank" rel="nofollow">在线json工具</a></li>
						<li><a href="https://cli.im/" target="_blank" rel="nofollow">草料二维码</a></li>
						<li><a href="https://www.iconfont.cn/" target="_blank" rel="nofollow">阿里巴巴矢量图库</a></li>
						<li><a href="https://www.aliyun.com/minisite/goods?userCode=2ebbhwss&share_source=copy_link&accounttraceid=b858bc8681db48cbaf2622a59c53bf8dutwv" target="_blank" rel="nofollow">阿里云小站</a></li>
					</ul>
				</div>
			</aside>
			
    <div class="art-right r">
        <h2 class="art-txt">&nbsp;&nbsp;<em class="iconfont icon-wifi"></em> <span>最新文章</span></h2>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?>
        <div class="art-model">
            <h3><a href="#" ><?php echo htmlentities($obj['tittle']); ?></a></h3>
            <p class="dateview"><span><?php echo htmlentities($obj['create_time']); ?></span> <span>作者：<?php echo htmlentities($obj['authname']); ?></span></p>
            <dl class="img-txt">
                <dt>
                    <img src="/src/blog/img/at5.png" >
                </dt>
                <dd>
                    <p class="deatil"><?php echo htmlentities($obj['contents']); ?></p>
                    <a href="#" class="btn  c-fff" >查看全文</a>
                </dd>
            </dl>
        </div>
        <?php endforeach; endif; else: echo "$empty" ;endif; ?>
        
        <!--框架分页-->
        <div > <?php echo $list; ?></div>
        
    </div>
    

		</article>
		</section>
        <footer class="clearfix"><p>© Copyright 2022 All Rights Reserved Power by Leo | V1.0</p></footer>
    <!-- 引入 JS 文件 --> 
    <script type="text/javascript" src="http://localhost:8000/src/blog/js/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="http://localhost:8000/src/blog/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="http://localhost:8000/src/blog/js/common.js"></script>
    
    <script>
        $('.index').click(() => { 
            location.href='index/index.html'
        }) 
        $('.artical').click(() => { 
            location.href='/index/artical.html'
        }) 
        $('.repeat').click(() => { 
            alert('正在扩展');
        }) 
    </script>
</body>
</html>