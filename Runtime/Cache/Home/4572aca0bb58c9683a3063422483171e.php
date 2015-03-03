<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="遵循Apache2开源协议,免费提供使用,微信功能插件化开发,多公众号管理,配置简单" name="keywords"/>
<meta content="weiphp 简洁强大开源的微信公众平台开发框架微信功能插件化开发,多公众号管理,配置简单" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!---蓝锂002适配修改 QQ:125682133--->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript">
var  STATIC = "/Public/static";
var  ROOT = "";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content">这是内容</div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>"><img height="45" src="<?php if(C('SYSTEM_LOGO')) { echo C('SYSTEM_LOGO'); }else{ ?>/Public/Home/images/top_logo.png?v=<?php echo SITE_VERSION;?> <?php } ?>" title="<?php echo C('WEB_SITE_TITLE');?>"/></a>
            
            
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<li class="dropdown">						     
                             <!-- 显示代码bug修改 -->
							 <?php if($mp_ids_list > 0): if(!empty($$member_public["public_name"])): ?><a href="<?php echo U('home/MemberPublic/lists');?>" class="dropdown-toggle login-nav" data-toggle="dropdown" title="公众号管理">公众号管理								
									  <b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>							
								  <?php if(empty($$member_public["public_name"])): ?><a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" title="<?php echo ($member_public["public_name"]); ?>"><?php echo (msubstr_local($member_public["public_name"],0,5,'utf-8')); ?><b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>		
							 <?php else: ?>
							     <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" title="未设置公众号"><font color="red">未设置公众号</font>						
									  <b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>
                            <ul class="dropdown-menu" style="display:none">
							    <!-- 显示代码bug修改 	
								  <li><a href="<?php echo U('home/MemberPublic/lists');?>">公众号管理</a></li>	
								-->									
                                <?php if(is_array($member_public_list)): $i = 0; $__LIST__ = $member_public_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/MemberPublic/changPublic','id='.$vo['id']);?>" title="<?php echo ($vo["public_name"]); ?>"><?php echo (msubstr_local($vo["public_name"],0,5,'utf-8')); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style=""><?php echo get_username();?> <b class="pl_5 fa fa-sort-down"></b></a>
                            <ul class="dropdown-menu" style="display:none">
                                <li><a href="<?php echo U('Admin/index/index');?>">后台管理</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login')); } if(isset($_GET['sidenav'])){ $navClass[$_GET['sidenav']] = 'active'; }else{ $m = strtolower(MODULE_NAME); $c = strtolower(CONTROLLER_NAME); $a = strtolower(ACTION_NAME); $navClass[$m] = $navClass[$m.'_'.$c] = $navClass[$m.'_'.$c.'_'.$a] = 'active'; $ad = ucfirst ( parse_name ( $_REQUEST['_addons'], 1 ) ); $cl = ucfirst ( parse_name ( $_REQUEST['_controller'], 1 ) ); $navClass[$ad] = $navClass[$ad.'_'.$cl] = 'active'; } $addonList = D ( 'Addons' )->getWeixinList (false, array(), true); $categorys = M ( 'addon_category' )->order ( 'sort asc, id desc' )->select (); foreach($categorys as &$cate){ foreach($addonList as $k=>$a){ if($cate['id']==intval($a['cate_id'])){ $cate['addons'][] = $a; unset($addonList[$k]); } } } ?>
<div id="main-container" class="container">
	<div class="sidebar">
    	<ul class="sidenav">
          <li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square"></b>帐号管理</a>
              <ul class="sidenav_sub" style="display:none">
                  <li class="<?php echo ($navClass['home_memberpublic']); ?>"> <a href="<?php echo U('Home/MemberPublic/lists');?>">公众号管理 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_index_main']); ?>"> <a href="<?php echo U('Home/Index/main');?>">插件管理 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_creditconfig_lists']); ?>"> <a href="<?php echo U('Home/CreditConfig/lists');?>">积分配置 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_keyword']); ?>"> <a href="<?php echo U('Home/Keyword/lists');?>">关键词维护 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_cascade']); ?>"> <a href="<?php echo U('Home/Cascade/lists');?>">级联数据管理 </a> <b class="active_arrow"></b></li>
             </ul>
          </li>
          
          <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square"></b><?php echo ($ca["title"]); ?></a>
              <ul class="sidenav_sub" style="display:none">
                  <?php if(is_array($ca["addons"])): $i = 0; $__LIST__ = $ca["addons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> 
                      <i class="icon-chevron-right"><?php if(!empty($vo['icon'])) { ?> <img src="<?php echo ($vo["icon"]); ?>" /> <?php } ?> </i>
                      <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ul>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
          
          <li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square "></b>其它功能</a>
              <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> 
              <i class="icon-chevron-right"><?php if(!empty($vo['icon'])) { ?> <img src="<?php echo ($vo["icon"]); ?>" /> <?php } ?> </i>
              <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
          </li>
        </ul>
  </div>
<div class="main_body">
	
  <script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
  <!-- 标签页导航 -->
  <div class="span9 page_message">
    <section id="contents">
      <ul class="tab-nav nav">
        <li class=""><a href="<?php echo U('lists');?>">投票列表</a></li>
        <li class="current"><a href="###">编辑投票<b class="arrow fa fa-sort"></b></a></li>
      </ul>
      <div class="tab-content"> 
        <!-- 表单 -->
        <form id="form" action="<?php echo U('edit?model='.$model['id']);?>" method="post" class="form-horizontal">
          <!-- 基础文档模型 -->
          <?php $_result=parse_config_attr($model['field_group']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?><div id="tab<?php echo ($key); ?>" class="tab-pane <?php if(($key) == "1"): ?>in<?php endif; ?>
              tab<?php echo ($key); ?>">
              <?php if(is_array($fields[$key])): $i = 0; $__LIST__ = $fields[$key];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; if($field['is_show'] == 4): ?><input type="hidden" class="text input-large" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php endif; ?>
                <?php if($field['is_show'] == 1 || $field['is_show'] == 3 || ($field['is_show'] == 5 && I($field['name']) )): ?><div class="form-item cf">
                    <label class="item-label"><?php echo ($field['title']); ?><span class="check-tips">
                      <?php if(!empty($field['remark'])): ?>（<?php echo ($field['remark']); ?>）<?php endif; ?>
                      </span></label>
                    <div class="controls">
                      <?php switch($field["type"]): case "num": ?><input type="text" class="text input-medium" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php break;?>
                        <?php case "string": ?><input type="text" class="text input-large" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php break;?>
                        <?php case "textarea": ?><label class="textarea input-large">
                            <textarea name="<?php echo ($field["name"]); ?>"><?php echo ($data[$field['name']]); ?></textarea>
                          </label><?php break;?>
                        <?php case "datetime": ?><input type="text" name="<?php echo ($field["name"]); ?>" class="text input-large time" value="<?php echo (time_format($data[$field['name']])); ?>" placeholder="请选择时间" /><?php break;?>
                        <?php case "bool": ?><select name="<?php echo ($field["name"]); ?>">
                            <?php $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" 
                              <?php if(($data[$field['name']]) == $key): ?>selected<?php endif; ?>
                              ><?php echo ($vo); ?>
                              </option><?php endforeach; endif; else: echo "" ;endif; ?>
                          </select><?php break;?>
                        <?php case "select": ?><select name="<?php echo ($field["name"]); ?>">
                            <?php $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" 
                              <?php if(($data[$field['name']]) == $key): ?>selected<?php endif; ?>
                              ><?php echo ($vo); ?>
                              </option><?php endforeach; endif; else: echo "" ;endif; ?>
                          </select><?php break;?>
                        <?php case "radio": $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item">
                            <input type="radio" value="<?php echo ($key); ?>" class="regular-radio" id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" 
                              <?php if(($data[$field['name']]) == $key): ?>checked="checked"<?php endif; ?>
                              /> <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo ($vo); ?>
                           </div><?php endforeach; endif; else: echo "" ;endif; break;?>
                        <?php case "checkbox": $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label class="checkbox"> <input type="checkbox" value="<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>[]" 
                              <?php if(in_array(($key), is_array($data[$field['name']])?$data[$field['name']]:explode(',',$data[$field['name']]))): ?>checked="checked"<?php endif; ?>
                              ><?php echo ($vo); ?> </label><?php endforeach; endif; else: echo "" ;endif; break;?>
                        <?php case "editor": ?><label class="textarea" style="width:600px">
                            <textarea name="<?php echo ($field["name"]); ?>"><?php echo ($data[$field['name']]); ?></textarea>
                            <?php echo hook('adminArticleEdit', array('name'=>$field['name'],'value'=>$data[$field['name']]));?> </label><?php break;?>
                        <?php case "picture": ?><div class="controls uploadrow" title="点击修改图片">
                            <input type="file" id="upload_picture_<?php echo ($field["name"]); ?>">
                            <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                            
                            <div class="upload-img-box" rel="img">
                              <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img width="120" height="120" src="<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                            </div>
                          </div>
                         
                          <script type="text/javascript">
								//上传图片
							    /* 初始化上传插件 */
								$("#upload_picture_<?php echo ($field["name"]); ?>").uploadify({
							        "height"          : 120,
							        "swf"             : "/Public/static/uploadify/uploadify.swf",
							        "fileObjName"     : "download",
							        "buttonText"      : "上传图片",
							        "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
							        "width"           : 120,
							        'removeTimeout'	  : 1,
							        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
							        "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>
							    });
								function uploadPicture<?php echo ($field["name"]); ?>(file, data){
							    	var data = $.parseJSON(data);
							    	var src = '';
							        if(data.status){
							        	$("#cover_id_<?php echo ($field["name"]); ?>").val(data.id);
							        	src = data.url || '' + data.path;
							        	$("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(
							        		'<div class="upload-pre-item"><img width="120" height="120" src="' + src + '"/></div>'
							        	);
										$('.weixin-cover-pic').attr('src',src);
							        } else {
							        	updateAlert(data.info);
							        	setTimeout(function(){
							                $('#top-alert').find('.close').click();
							                $(that).removeClass('disabled').prop('disabled',false);
							            },1500);
							        }
							    }
								</script><?php break;?>
                        <?php case "file": ?><div class="controls uploadrow">
                          	
                                <input type="file" id="upload_file_<?php echo ($field["name"]); ?>">
                                <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                                <div class="upload-img-box">
                                  <?php if(isset($data[$field['name']])): ?><div class="upload-pre-file"><span class="upload_icon_all"></span><?php echo (get_table_field($data[$field['name']],'id','name','File')); ?></div><?php endif; ?>
                                </div>
                             
                          </div>
                          <script type="text/javascript">
								//上传图片
							    /* 初始化上传插件 */
								$("#upload_file_<?php echo ($field["name"]); ?>").uploadify({
							        "height"          : 120,
							        "swf"             : "/Public/static/uploadify/uploadify.swf",
							        "fileObjName"     : "download",
							        "buttonText"      : "上传附件",
							        "uploader"        : "<?php echo U('File/upload',array('session_id'=>session_id()));?>",
							        "width"           : 120,
							        'removeTimeout'	  : 1,
							        "onUploadSuccess" : uploadFile<?php echo ($field["name"]); ?>
							    });
								function uploadFile<?php echo ($field["name"]); ?>(file, data){
									var data = $.parseJSON(data);
							        if(data.status){
							        	var name = "<?php echo ($field["name"]); ?>";
							        	$("input[name="+name+"]").val(data.id);
							        	$("input[name="+name+"]").parent().find('.upload-img-box').html(
							        		"<div class=\"upload-pre-file\"><span class=\"upload_icon_all\"></span>" + data.name + "</div>"
							        	);
							        } else {
							        	updateAlert(data.info);
							        	setTimeout(function(){
							                $('#top-alert').find('button').click();
							                $(that).removeClass('disabled').prop('disabled',false);
							            },1500);
							        }
							    }
								</script><?php break;?>
                        <?php default: ?>
                        <input type="text" class="text input-large" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php endswitch;?>
                    </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              <div class="form-item cf">
                    <label class="item-label">文字/图片投票<span class="check-tips">
                                            </span></label>
                    <div class="controls">
                      <div class="check-item">
                              <input type="radio" name="is_img" value="0" class="regular-radio" id="is_img_0" <?php if($data[is_img]==0): ?>checked<?php endif; ?> onClick="changeOption()"><label for="is_img_0"> </label>
                              文字投票
                           </div>
                           <div class="check-item">   
                              <input type="radio" name="is_img" value="1" class="regular-radio" id="is_img_1" <?php if($data[is_img]==1): ?>checked<?php endif; ?> onClick="changeOption()">
                              <label for="is_img_1"> </label>图片投票   
                        
                        </div>
                     </div>
                  </div>
            </div>
                          <!--选项--->
<div class="form-item cf">
<label class="item-label">选项<span class="check-tips"> </span></label>
<div class="controls">
<div id="option_list">
	<table id="option_list" class="add_list_table" cellpadding="0" cellspacing="1">
      
      <tr class="add_list add_list_head" <?php if(empty($option_list)): ?>style="display:none"<?php endif; ?>>
      	<td class="pic_td">图片</td>
        <td>标题</td>
        <td>排序</td>
        <td>操作</td>
      </tr>
  <?php if(is_array($option_list)): $i = 0; $__LIST__ = $option_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="add_list">
     	<td class="pic_td">
        <div class="uploadrow" title="更改图片">
        <input type="file" class="uploadImage" id="uploadImage_exist_<?php echo ($vo["id"]); ?>" rel="<?php echo ($vo["id"]); ?>">
        <input type="hidden" name="image[<?php echo ($vo["id"]); ?>]" id="cover_id_<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["image"]); ?>" />
        <div class="upload-img-box">
          <?php if(!empty($vo["image"])): ?><div class="upload-pre-item"><img width="120" height="120" src="<?php echo (get_cover($vo["image"],'path')); ?>"/></div><?php endif; ?>
        </div>
        </div>
        </td>
        <td>
        <input type="text" value="<?php echo ($vo["name"]); ?>" name="name[<?php echo ($vo["id"]); ?>]" class="text input-large" style="width:250px">&nbsp;
        </td>
        <td>
        <input type="text" value="<?php echo ($vo["order"]); ?>" name="order[<?php echo ($vo["id"]); ?>]" class="optionSort text input-large" style="width:80px">&nbsp;
        </td>
        <td>
        <a href="javascript:;" onClick="delOpt(this)" class="fr btn btn-yellow" >删除</a>
        </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  	</table>
  </div>
  <p><a href="javascript:;" class="btn btn-yellow mt_10 mb_10" onClick="addOpt()" >增加选项</a></p>
  <div id="top-alert" class="fixed alert alert-error" style="display: none;">
  <button class="close fixed" style="margin-top: 4px;">&times;</button>
  <div class="alert-content">这是内容</div>
  </div>
</div>
<script type="text/javascript">
//上传图片
/* 初始化上传插件 */
var node = '';
function initPuls(){
	$(".uploadImage").each(function(index, obj) {
		var id = $(obj).attr('rel');
		if(id>0)
			node = '#uploadImage_exist_'+id;
		else
		    node = '#uploadImage_'+(0-id);
		
		$(node).uploadify({
			"height"          : 120,
			"swf"             : "/Public/static/uploadify/uploadify.swf",
			"fileObjName"     : "download",
			"buttonText"      : "上传图片",
			"uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
			"width"           : 120,
			'removeTimeout'	  : 1,
			'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
			"onUploadSuccess" : function(file, data, response) {
                uploadPictureimage(file, data, id);
            }
	    });
	});
}

function uploadPictureimage(file, data, id){
	var data = $.parseJSON(data);
	var src = '';
	if(data.status){
		$("#cover_id_"+id).val(data.id);
		src = data.url || '' + data.path;
		$("#cover_id_"+id).parent().find('.upload-img-box').html(
			'<div class="upload-pre-item"><img width="120" height="120" src="' + src + '"/></div>'
		);
	} else {
		updateAlert(data.info);
		setTimeout(function(){
			$('#top-alert').find('button').click();
			$(that).removeClass('disabled').prop('disabled',false);
		},1500);
	}
}

function addOpt(){
	var i = 1;
	$('.optionSort').each(function(){i++;});
	var id = 0-i;
	
	var html = '<tr class="add_list"><td class="pic_td"><div class="uploadrow" title="更改图片">'
		+'<input type="file" class="uploadImage" id="uploadImage_'+i+'" rel="'+id+'"/>'
		+'<input type="hidden" name="image['+id+']" id="cover_id_'+id+'"/>'
		+'<div class="upload-img-box"></div>'
		+'</div></td><td>'
		+'<input type="text" value="" name="name['+id+']" class="text input-large" style="width:250px">'
		+'</td><td>'
		+'<input type="text" value="'+i+'" name="order['+id+']" class="optionSort text input-large" style="width:80px">&nbsp;'
		+'</td><td>'
		+'<a href="###" onClick="delOpt(this)" class="fr btn btn-yellow" >删除</a></td></tr>';
	$('#option_list').append(html);
	initPuls(); 
    changeOption();
	$('.add_list_head').show();
}
function delOpt(obj){
	$(obj).parents('tr').remove();
}
function changeOption(){
	var val = $('input[name="is_img"]:checked').val();
	console.log(val);
	if(val!=1){
	   $('.uploadify').each(function() {
          if($(this).attr('id')!='upload_picture_picurl') $(this).hide();
       });
	   $('.upload-img-box').each(function() {
          if($(this).attr('rel')!='img') $(this).hide();
       });
	    $('.pic_td').hide();
	}else{
	   $('.uploadify').each(function() {
          $(this).show();
       });	
	   $('.upload-img-box').each(function() {
          $(this).show();
       });	   
	    $('.pic_td').show();	
	}
}
$(function(){ 
   initPuls(); 
   changeOption(); 
});
</script> 
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="form-item cf">
            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
          </div>
        </form>
        <!-- 预览 -->
        <!--通用的微信预览模板-->
<!--头部标题栏-->
<!--鉴于样式title放进具体每块模块-->
<!--CSS模块-->
<div class="weixin-preview">
	<p class="preview-tips">微信回复预览</p>
	<div class="weixin-box">
	<p class="weixin-title"></p>
    <div class="weixin-cover"><img class="weixin-cover-pic" src=""/></div>
    <p class="weixin-content">
    	
    </p>
</div>
<script type="text/javascript">
$('.tab-content').addClass('has-weixinpreivew');
if($('input[name="title"]').val()!=undefined){
	$('.weixin-title').html($('input[name="title"]').val());
}else{
	$('.weixin-title').html($('input[name="config[title]"]').val());
}
if($('textarea[name="content"]').val()!=undefined){
	$('.weixin-content').html($('textarea[name="content"]').val());
}else if($('textarea[name="intro"]').val()!=undefined){
	$('.weixin-content').html($('textarea[name="config[intro]"]').val());
	}else{
	$('.weixin-content').html($('textarea[name="config[info]"]').val());	
}
var weixin_cover_picurl = $('#cover_id_picurl').next().find('img').attr('src');
if(weixin_cover_picurl==undefined)weixin_cover_picurl=$('#cover_id_cover').next().find('img').attr('src');
if($('#cover_id_cover').val()==undefined && $('#cover_id_picurl').val()==undefined){
	$('.weixin-preview').hide();
	}
if(weixin_cover_picurl==undefined || weixin_cover_picurl==""){
	$('.weixin-cover-pic').attr('src',"/Public/Home/images/no_cover.png");
}else{
	$('.weixin-cover-pic').attr('src',weixin_cover_picurl);
}
$('input[name="title"]').keyup(function(){
	$('.weixin-title').html($(this).val());
	});
$('textarea[name="content"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="info"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="intro"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
</script>  
      </div>
    </section>
  </div>
  </div>

</div>
</div>
	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部
    ================================================== -->
<footer class="footer">
      <div class="container">
          <p>
          	<a href="<?php echo U('Home/Index/about');?>" target="_blank">关于我们</a>  |  
            <a href="<?php echo U('home/index/help');?>" target="_blank">使用说明</a>   |   
            本系统由<a href="http://www.weiphp.cn" target="_blank">weiphp</a>强力驱动
            </p>
      </div>
</footer>

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

<link href="/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<?php if(C('COLOR_STYLE')=='blue_color') echo '
<link href="/Public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
'; ?>
<link href="/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
<script type="text/javascript">
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    showTab();
});
</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>