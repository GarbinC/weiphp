<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|WeiPHP管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css?v=<?php echo SITE_VERSION;?>" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css?v=<?php echo SITE_VERSION;?>" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css?v=<?php echo SITE_VERSION;?>" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css?v=<?php echo SITE_VERSION;?>" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/store.css?v=<?php echo SITE_VERSION;?>" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css?v=<?php echo SITE_VERSION;?>" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js?v=<?php echo SITE_VERSION;?>"></script>
    <!--<![endif]-->
    
	<link rel="stylesheet" href="/Public/Admin/js/codemirror/codemirror.css?v=<?php echo SITE_VERSION;?>" />
	<link rel="stylesheet" href="/Public/Admin/js/codemirror/theme/<?php echo C('codemirror_theme');?>.css?v=<?php echo SITE_VERSION;?>" />
	<style>
		.CodeMirror,#preview_window{
			width:700px;
			height:500px;
		}
		#preview_window.loading{
			background: url('/Public/static/thinkbox/skin/default/tips_loading.gif') no-repeat center;
		}

		#preview_window textarea{
			display: none;
		}
	</style>

</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo" <?php if(C('SYSTEM_LOGO')) { ?> style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('<?php echo C('SYSTEM_LOGO');?>') no-repeat " <?php } ?>></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('Home/Index/main');?>">返回前台</a></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
	<div class="main-title cf">
		<h2>插件快速创建</h2>
	</div>
	<!-- 表单 -->
	<form id="form" action="<?php echo U('build');?>" method="post" class="form-horizontal doc-modal-form">
		<div class="form-item">
			<label class="item-label"><span class="must">*</span>标识名 <span class="check-tips">（插件的英文字，只能英文字母，不能有数字，下划线等，多个单词组合时首字母大写，如 UserCenter）</span></label>
			<div class="controls">
				<input type="text" class="text input-large" name="info[name]" value="Example">
			</div>
		</div>
		<div class="form-item">
			<label class="item-label">插件名<span class="check-tips">（插件中文名）</span></label>
			<div class="controls">
				<input type="text" class="text input-large" name="info[title]" value="示列">
			</div>
		</div>
		<div class="form-item">
			<label class="item-label">版本<span class="check-tips">（请输入插件版本）</span></label>
			<div class="controls">
				<input type="text" class="text input-large" name="info[version]" value="0.1">
			</div>
		</div>
		<div class="form-item">
			<label class="item-label">作者<span class="check-tips">（请输入插件作者）</span></label>
			<div class="controls">
				<input type="text" class="text input-large" name="info[author]" value="无名">
			</div>
		</div>
		<div class="form-item">
			<label class="item-label">描述<span class="check-tips">（请输入描述）</span></label>
			<div class="controls">
				<label class="textarea input-large">
					<textarea name="info[description]">这是一个临时描述</textarea>
				</label>
			</div>
		</div>
		<div class="form-item">
			<label class="item-label">安装后是否启用</label>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="info[status]" value="1" checked />
				</label>
			</div>
		</div>
		<div class="form-item">
			<label class="item-label">是否需要配置<span class="check-tips">（如插件有配置参数，则选择是<?php if($type == 1): ?>，如：<a href="<?php echo addons_url ( 'UserCenter://UserCenter/config' );?>" target="_blank">微信用户插件的配置</a><?php endif; ?> ）</span></label>
			<div class="controls">
				<label class="checkbox"><input type="checkbox" id="has_config" name="has_config" value="1" /></label>
				<label class="textarea input-large has_config hidden">
					<textarea class="textarea" name="config">
&lt;?php
return array(
	'random'=>array(//配置在表单中的键名 ,这个会是config[random]
		'title'=>'是否开启随机:',//表单的文字
		'type'=>'radio',		 //表单的类型：text、textarea、checkbox、radio、select等
		'options'=>array(		 //select 和radion、checkbox的子选项
			'1'=>'开启',		 //值=>文字
			'0'=>'关闭',
		),
		'value'=>'1',			 //表单的默认值
	),
);
					</textarea>
				</label>
				<input type="text" class="text input-large has_config hidden" name="custom_config">
				<span class="check-tips has_config hidden">自定义模板,注意：自定义模板里的表单name必须为config[name]这种，获取保存后配置的值用$data.config.name</span>
			</div>
		</div>
        <?php if($type != 1): ?><div class="form-item">
			<div class="controls">
				<label class="item-label">是否需要外部访问</label>
				<input type="checkbox" class="checkbox" name="has_outurl" value="1" />
			</div>
		</div>        
		<div class="form-item">
			<label class="item-label">实现的钩子方法</label>
			<div class="controls">
				<select class="select" name="hook[]" size="10" multiple required>
					<?php if(is_array($Hooks)): $i = 0; $__LIST__ = $Hooks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>" title="<?php echo ($vo["description"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</div>
		<div class="form-item">
			<label class="item-label">是否需要管理列表<span class="check-tips">（如插件数据有管理列表，则选择是）</span></label>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" id="has_adminlist" name="has_adminlist" value="1" />勾选，扩展里已装插件管理列表会出现插件名的列表菜单，如系统的附件
				</label>
				<label class="textarea input-large has_adminlist hidden">
					<textarea name="admin_list">
'model'=>'Example',		//要查的表
			'fields'=>'*',			//要查的字段
			'map'=>'',				//查询条件, 如果需要可以再插件类的构造方法里动态重置这个属性
			'order'=>'id desc',		//排序,
			'listKey'=>array( 		//这里定义的是除了id序号外的表格里字段显示的表头名
				'字段名'=>'表头显示名'
			),
					</textarea>
				</label>
				<input type="text" class="text has_adminlist hidden" name="custom_adminlist">
				<span class="check-tips block has_adminlist hidden">自定义模板,注意：自定义模板里的列表变量为$_list这种,遍历后可以用listkey可以控制表头显示,也可以完全手写，分页变量用$_page</span>
			</div>
		</div>
        <?php else: ?>
        <input type="hidden" name="has_outurl" value="1" />
        <input type="hidden" name="hook[]" value="weixin" />
		<div class="form-item">
			<label class="item-label">是否需要管理列表</label>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" id="has_adminlist" name="has_adminlist" value="1" />如插件数据有管理列表，则选择是，如：<a href="<?php echo addons_url ( 'UserCenter://UserCenter/lists' );?>" target="_blank">微信用户插件的管理列表</a>
				</label>				
			</div>
		</div><?php endif; ?>
		<div class="form-item">
            <input type="hidden" name="type" value="<?php echo (intval($type)); ?>" />
			<button class="btn btn-return" type="button" id="preview">预 览</button>
			<button class="btn ajax-post_custom submit-btn" target-form="form-horizontal" id="submit">确 定</button>
			<button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
		</div>
	</form>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.weiphp.cn" target="_blank">WeiPHP</a>管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/index.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href$='" + url + "']").parent().addClass("current");
			
            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
	<script type="text/javascript" src="/Public/Admin/js/codemirror/codemirror.js?v=<?php echo SITE_VERSION;?>"></script>
	<script type="text/javascript" src="/Public/Admin/js/codemirror/xml.js?v=<?php echo SITE_VERSION;?>"></script>
	<script type="text/javascript" src="/Public/Admin/js/codemirror/javascript.js?v=<?php echo SITE_VERSION;?>"></script>
	<script type="text/javascript" src="/Public/Admin/js/codemirror/clike.js?v=<?php echo SITE_VERSION;?>"></script>
	<script type="text/javascript" src="/Public/Admin/js/codemirror/php.js?v=<?php echo SITE_VERSION;?>"></script>

	<script type="text/javascript" src="/Public/static/thinkbox/jquery.thinkbox.js?v=<?php echo SITE_VERSION;?>"></script>

	<script type="text/javascript">
		function bindShow(radio_bind, selectors){
			$(radio_bind).click(function(){
				$(selectors).toggleClass('hidden');
			})
		}

		//配置的动态
		bindShow('#has_config','.has_config');
		bindShow('#has_adminlist','.has_adminlist');

		$('#preview').click(function(){
			var preview_url = '<?php echo U("preview");?>';
			//console.log($('#form').serialize());
			$.post(preview_url, $('#form').serialize(),function(data){
				$.thinkbox('<div id="preview_window" class="loading"><textarea></textarea></div>',{
					afterShow:function(){
						var codemirror_option = {
							lineNumbers   :true,
							matchBrackets :true,
							mode          :"application/x-httpd-php",
							indentUnit    :4,
							gutter        :true,
							fixedGutter   :true,
							indentWithTabs:true,
							readOnly	  :true,
							lineWrapping  :true,
							height		  :500,
							enterMode     :"keep",
							tabMode       :"shift",
							theme: "<?php echo C('CODEMIRROR_THEME');?>"
						};
						var preview_window = $("#preview_window").removeClass(".loading").find("textarea");
						var editor = CodeMirror.fromTextArea(preview_window[0], codemirror_option);
						editor.setValue(data);
						$(window).resize();
					},

					title:'预览插件主文件',
					unload: true,
					actions:['close'],
					drag:true
				});
			});
			return false;
		});

		$('.ajax-post_custom').click(function(){
	        var target,query,form;
	        var target_form = $(this).attr('target-form');
	        var check_url = '<?php echo U('checkForm');?>';
			$.ajax({
			   type: "POST",
			   url: check_url,
			   dataType: 'json',
			   async: false,
			   data: $('#form').serialize(),
			   success: function(data){
			    	if(data.status){
    			        if( ($(this).attr('type')=='submit') || (target = $(this).attr('href')) || (target = $(this).attr('url')) ){
				            form = $('.'+target_form);
				            if ( form.get(0).nodeName=='FORM' ){
				                target = form.get(0).action;
				                query = form.serialize();
				            }else if( form.get(0).nodeName=='INPUT' || form.get(0).nodeName=='SELECT' || form.get(0).nodeName=='TEXTAREA') {
				                query = form.serialize();
				            }else{
				                query = form.find('input,select,textarea').serialize();
				            }
				            $.post(target,query).success(function(data){
				                if (data.status==1) {
				                    if (data.url) {
				                        updateAlert(data.info + ' 页面即将自动跳转~','alert-success');
				                    }else{
				                        updateAlert(data.info + ' 页面即将自动刷新~');
				                    }
				                    setTimeout(function(){
				                        if (data.url) {
				                            location.href=data.url;
				                        }else{
				                        	location.reload();
				                        }
				                    },1500);
				                }else{
				                    updateAlert(data.info);
				                }
				            });
				        }
			    	}else{
			    		updateAlert(data.info);
					}
			   }
			});

	        return false;
	    });

	    //导航高亮
		<?php if($type==1) { ?>
	    $('.side-sub-menu').find('a[href="<?php echo U('Addons/weixin');?>"]').closest('li').addClass('current');
		<?php } else { ?>
	    $('.side-sub-menu').find('a[href="<?php echo U('Addons/index');?>"]').closest('li').addClass('current');
		<?php } ?>
	</script>

</body>
</html>