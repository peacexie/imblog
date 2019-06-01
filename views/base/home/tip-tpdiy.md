

### 模板指引


#### 模板目录

* /views/      - 项目模板:总目录
* /views/adm/  - 后台管理模板
* /views/base/ - 基础工具模板，如:map,动态js/css,工具等
* /views/comm/ - 博客展示模板（默认/安装时决定中英文）

模板目录详情，以`功能演示版`为例，其他类似

* /views/comm/\_config/ - 功能演示版配置
* /views/comm/\_ctrls/  - 控制器方法扩展代码
* /views/comm/assets/   - 资源目录，如css,js,images
* /views/comm/about/    - 介绍模块模板
* /views/comm/home/     - 首页模板/公共区块，如头尾等
* /views/comm/info/     - 留言/导航等杂项模板
* /views/comm/wall/     - 便笺墙模板
* /views/comm/home/_head.htm - 公共头文件
* /views/comm/home/_foot.htm - 公共尾文件
* /views/comm/home/mhome.htm - 首页模板

导航首页相关文件目录

* /views/base/home/              - 首页/跳转 相关总目录
* /views/base/home/tips.htm      - 本说明模板
* /views/base/home/\_layout.htm  - 首页布局（预留）
* 首页跳转更多DIY，修改控制器文件 `/views/base/_ctrls/homeCtrl.php` 内的 `homeAct()` 方法
