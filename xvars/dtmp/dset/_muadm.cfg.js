
var admNavTab = ',m1main,m1adv,m1tool,m1adm';
var admNavName = ',主营,广告,工具,架设';
var admNavIcon = ',heart,link,gavel,cogs';
var admHtmTop = '<a class=\"atm_m1main\" onclick=\"admSetTab(\'m1main\')\"> <i class=\'fa fa-heart\'></i> 主营</a><a class=\"atm_m1adv\" onclick=\"admSetTab(\'m1adv\')\"> <i class=\'fa fa-link\'></i> 广告</a><a class=\"atm_m1tool\" onclick=\"admSetTab(\'m1tool\')\"> <i class=\'fa fa-gavel\'></i> 工具</a><a class=\"atm_m1adm\" onclick=\"admSetTab(\'m1adm\')\"> <i class=\'fa fa-cogs\'></i> 架设</a>';
var admHtmLeft = '<div id=\'left_m1main\'><ul class=\'adf_mnu2\' id=\'left_m2info\'><li class=\'adf_dir\'> <i class=\'fa fa-institution\'></i> 博客管理</li><li id=\'left_m3blog\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=info\' target=\'adf_main\'>博客文章</a> - <a onClick=\"admJsClick(this)\">增加</a></li><li id=\'left_m3brem\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=irem\' target=\'adf_main\'>博客评论</a> - <a href=\'?#admin-catalog&mod=info\' target=\'_frame\'>栏目</a></li><li id=\'left_m3mood\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=wall&part=mood\' target=\'adf_main\'>心情墙</a> - <a href=\'?dops-a&mod=wall&view=form&part=mood\' target=\'adf_main\'>增加</a></li><li id=\'left_m3wish\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=wall&part=wish\' target=\'adf_main\'>许愿墙</a> - <a href=\'?dops-a&mod=wall&view=form&part=wish\' target=\'adf_main\'>增加</a></li><li id=\'left_m3word\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=wall&part=word\' target=\'adf_main\'>小语墙</a> - <a href=\'?dops-a&mod=wall&view=form&part=word\' target=\'adf_main\'>增加</a></li></ul><ul class=\'adf_mnu2\' id=\'left_m2else\'><li class=\'adf_dir\'> <i class=\'fa fa-folder-open-o\'></i> 其他互动</li><li id=\'left_m3about\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=about\' target=\'adf_main\'>站点介绍</a> - <a onClick=\"admJsClick(this)\">增加</a></li><li id=\'left_m3gbook\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=gbook\' target=\'adf_main\'>网站留言管理</a></li><li id=\'left_m3notea\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=notea\' target=\'adf_main\'>笔记管理</a> - <a onClick=\"admJsClick(this)\">发布</a></li></ul></div><div id=\'left_m1adv\'><ul class=\'adf_mnu2\' id=\'left_adtext\'><li class=\'adf_dir\'><i class=\'fa fa-folder-open-o\'></i> <a href=\'?dops-a&amp;mod=adtext\' target=\'adf_main\'>文字连接</a></li><li id=\'left_athom\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adtext&stype=athom\' target=\'adf_main\'>首页广告</a> - <a onclick=\"admJsClick(this)\">增加</a></li><li id=\'left_atinn\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adtext&stype=atinn\' target=\'adf_main\'>通用内页</a> - <a onclick=\"admJsClick(this)\">增加</a></li><li id=\'left_atdel\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adtext&stype=atdel\' target=\'adf_main\'>[回收站]</a> - <a onclick=\"admJsClick(this)\">增加</a></li></ul><ul class=\'adf_mnu2\' id=\'left_adpic\'><li class=\'adf_dir\'><i class=\'fa fa-folder-open-o\'></i> <a href=\'?dops-a&amp;mod=adpic\' target=\'adf_main\'>图片连接</a></li><li id=\'left_aphom\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adpic&stype=aphom\' target=\'adf_main\'>首页广告</a> - <a onclick=\"admJsClick(this)\">增加</a></li><li id=\'left_apinn\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adpic&stype=apinn\' target=\'adf_main\'>通用内页</a> - <a onclick=\"admJsClick(this)\">增加</a></li><li id=\'left_apdel\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adpic&stype=apdel\' target=\'adf_main\'>[回收站]</a> - <a onclick=\"admJsClick(this)\">增加</a></li></ul><ul class=\'adf_mnu2\' id=\'left_adfavor\'><li class=\'adf_dir\'><i class=\'fa fa-folder-open-o\'></i> <a href=\'?dops-a&amp;mod=adfavor\' target=\'adf_main\'>网址收藏</a></li><li id=\'left_afadmin\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adfavor&stype=afadmin\' target=\'adf_main\'>后台公用</a> - <a onclick=\"admJsClick(this)\">增加</a></li><li id=\'left_afauser\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adfavor&stype=afauser\' target=\'adf_main\'>管理员用</a> - <a onclick=\"admJsClick(this)\">增加</a></li><li id=\'left_afmemc\'><i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&amp;mod=adfavor&stype=afmemc\' target=\'adf_main\'>会员中心</a> - <a onclick=\"admJsClick(this)\">增加</a></li></ul></div><div id=\'left_m1tool\'><ul class=\'adf_mnu2\' id=\'left_m2sys\'><li class=\'adf_dir\'> <i class=\'fa fa-folder-open-o\'></i> 系统工具</li><li id=\'left_m3catch\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-update\' target=\'adf_main\'>系统缓存</a> - <a href=\'?admin-static\' target=\'adf_main\'>静态</a></li><li id=\'left_m3self\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-uinfo\' target=\'adf_main\'>个人资料</a> - <a href=\'?admin-uinfo&view=passwd\' target=\'adf_main\'>密码</a></li><li id=\'left_m3env\'> <i class=\'fa fa-file-text-o\'></i> <a target=\'adf_main\' href=\"?admin-ediy&part=binfo\">基础环境</a> \r\n- <a target=\'adf_main\' href=\"?admin-ediy&part=check\">检测</a></li><li id=\'left_m3ediy\'> <i class=\'fa fa-file-text-o\'></i> <a target=\'adf_main\' href=\"?admin-ediy&part=exdiy\">DIY配置</a> \r\n- <a target=\'adf_main\' href=\"?admin-ediy&part=search\">搜索</a></li></ul><ul class=\'adf_mnu2\' id=\'left_m2data\'><li class=\'adf_dir\'> <i class=\'fa fa-folder-open-o\'></i> 数据工具</li><li id=\'left_m3plan\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?apis-cron_plan\' target=\'adf_main\'>计划任务</a> - <a href=\'?apis-jifen_plan\' target=\'adf_main\'>积分</a></li></ul><ul class=\'adf_mnu2\' id=\'left_m2fav\'><li class=\'adf_dir\'> <i class=\'fa fa-folder-open-o\'></i> 我的收藏</li><li id=\'left_m3favor\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=adfavor&view=vself\' target=\'adf_main\'>网址收藏</a> - <a href=\'http://txmao.txjia.com/dev.php\' target=\'_blank\'>帮助</a></li></ul></div><div id=\'left_m1adm\'><ul class=\'adf_mnu2\' id=\'left_m2stru\'><li class=\'adf_dir\'> <i class=\'fa fa-gear\'></i> 超管架构</li><li id=\'left_m3model\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-groups\' target=\'adf_main\'>模块架设</a> - <a href=\'?admin-upgrade&mod=extend\' target=\'adf_main\'>扩展</a></li><li id=\'left_m3auser\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?dops-a&mod=adminer\' target=\'adf_main\'>管理员</a> - <a onClick=\"admJsClick(this)\">添加</a></li><li id=\'left_m3catalog\'> <i class=\'fa fa-file-text-o\'></i> <a target=\'adf_main\' href=\"?admin-catalog\" title=\"文档栏目\">栏目管理</a> \r\n- \r\n<a target=\'adf_main\' href=\"?admin-catalog&mod=adpic\" title=\"广告栏目\">广告</a></li><li id=\'left_m3relat\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-types&mod=gredu\' target=\'adf_main\'>类别管理</a> - <a href=\'?admin-types&mod=hinfo\' target=\'adf_main\'>推荐</a></li><li id=\'left_m3amenu\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-menus\' target=\'adf_main\'>菜单导航配置</a></li><li id=\'left_m3grade\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-grade\' target=\'adf_main\'>等级权限设置</a></li></ul><ul class=\'adf_mnu2\' id=\'left_m2adt\'><li class=\'adf_dir\'> <i class=\'fa fa-gavel\'></i> 超管工具</li><li id=\'left_m3paras\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-paras\' target=\'adf_main\'>核心参数</a> - <a href=\'?admin-parex\' target=\'adf_main\'>扩展</a></li><li id=\'left_m3dbs\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'/peace/imcat/imblog/root/tools/adbug/dbadm.php\' target=\'_blank\'>数据库</a> - <a href=\'?admin-db_act\' target=\'adf_main\'>管理</a></li><li id=\'left_m3safes\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-paras&mod=prsafe\' target=\'adf_main\'>安全参数</a> - <a href=\'?admin-rlogs&mod=syact\' target=\'adf_main\'>日志</a></li><li id=\'left_m3upver\'> <i class=\'fa fa-file-text-o\'></i> <a href=\'?admin-upgrade\' target=\'adf_main\'>系统升级</a> - <a href=\'?admin-upgrade&mod=import\' target=\'adf_main\'>导入</a></li></ul></div>';