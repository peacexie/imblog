<?php
namespace imcat\comm;

use imcat\basReq;
use imcat\comFiles;
use imcat\extMkdown;
use imcat\exvFtree;
use imcat\safComm;
use imcat\usrPerm;
use imcat\vopComp;
use imcat\vopUrl;

class ftreeCtrl{

    public $acts = [
        'edit' => '修改资料',
        'addf' => '添加父亲',
        'addm' => '添加母亲',
        'addc' => '添加配偶',
        'addb' => '添加儿子',
        'addg' => '添加女儿',
    ];

    public $part = ''; // 分段 8,demo,test
    public $extab = ''; // 分表 0,main,exdemo

    public $sid = '';
    public $sess = '';

    function __construct($ucfg=array(), $vars=array()){
        $this->ucfg = $ucfg;
        $this->vars = $vars;
        vopUrl::jumpr();
        $tmp = array('mod','key','view');
        foreach ($tmp as $k0) {
            $$k0 = empty($this->ucfg[$k0]) ? '' : $this->ucfg[$k0];
        }
        # ------------------
        $this->sid = 'ftree_'.usrPerm::getSessid();
        $this->sess = empty($_SESSION[$this->sid]) ? '' : $_SESSION[$this->sid];
        $acts = array_keys($this->acts); $acts[] = 'save';
        $f1 = in_array($key, $acts); 
        $f2 = empty($this->sess) || !empty($_SESSION['ftuser_myids']);
        if($f2 && $f1){ // 没有权限
            header("Location:./ftree-login-to01");
        }
        if(!empty($this->sess) && !empty($_SESSION['ftnow_part']) && !empty($_SESSION['ftnow_extab'])){ // 有效登陆
            $this->part = $_SESSION['ftnow_part'];
            $this->extab = $_SESSION['ftnow_extab'];
        }else{
            $this->part = 'demo';
            $this->extab = 'exdemo';
        }
        exvFtree::$part = $this->part;
        exvFtree::$extab = empty($this->extab) ? 'main' : $this->extab;
    }

    function loginAct(){
        $tmp = array('mod','key','view');
        foreach ($tmp as $k0) {
            $$k0 = $this->ucfg[$k0];
        }
        $remsg = '请输入登录信息!';
        if($view=='to01'){
            $remsg = '请登录管理员后再操作!'; // (>修改/+父母/+配偶/+子女)
       }elseif($view=='to02'){
            $remsg = '请登录切换!';
       }elseif($view=='to03'){
            $remsg = '没有权限!';
        }elseif($view=='out'){
            $_SESSION[$this->sid] = '';
            $_SESSION['ftuser_parts'] = '';
            $_SESSION['ftuser_myids'] = '';
            $_SESSION['ftnow_part'] = '';
            $_SESSION['ftnow_extab'] = '';
            $remsg = '登出成功，只能看`演示区`数据!';
        }elseif($view=='in'){
            $fm = basReq::arr('fm');
            $vcode = basReq::val('vcode');
            $remsg = '请输入登录信息!';
            
            //echo $vcode; dump($fm);
            if(!empty($fm['name']) && !empty($vcode) && !empty($fm['pass']) ){
                $vre = safComm::formCVimg('vsms4', $vcode, 'check', 600);
                if($vre){
                    $remsg = "登录信息错误(1)[$vre]!";
                }else{
                    $whr1 = "ukey='".$fm['name']."' AND upass='".$fm['pass']."'";
                    if(preg_match("/[a-z]+\.\d+/i",$fm['name'])){ // demo.125
                        $tmp = explode('.',$fm['name']);
                        $group = db()->table('ftree_part')->where("part='$tmp[0]'")->find();
                        if($group){
                            $whr2 = "kid='".$tmp[1]."' AND kno='".$fm['pass']."'";
                            $tab = 'ftree_'.$group['extab'];
                            $row = db()->table($tab)->where($whr2)->find();
                            if($row){
                                $remsg = '登录成功!';
                                $this->sess = $_SESSION[$this->sid] = $fm['name'];
                                $_SESSION['ftnow_part'] = $_SESSION['ftuser_parts'] = $tmp[0];
                                $_SESSION['ftnow_extab'] = $group['extab'];
                                $ids = $row['kid'].','.$row['did'].','.$row['mid'].','.$row['mates'];
                                $ida = array_filter(explode(',',$ids));
                                $_SESSION['ftuser_myids'] = implode(',',$ids);
                                header("Location:./ftree.".$tmp[1]);
                                die();
                            }else{
                                $remsg = "登录信息错误(4)[{$fm['name']}]!";
                            }
                        }else{
                            $remsg = "登录信息错误(3)[{$fm['name']}]!";
                        }
                    }elseif($row=db()->table('ftree_user')->where($whr1)->find()){
                        $remsg = '登录成功，请选择数据区查看!';
                        $this->sess = $_SESSION[$this->sid] = $fm['name'];
                        $_SESSION['ftuser_parts'] = $row['parts'];
                        if($row['parts'] && !strpos($row['parts'],',')){
                            header("Location:./ftree-go-".$row['parts']);
                            die();
                        } // 如果只有一个parts,go ??? 
                    }else{
                        $remsg = "登录信息错误(2)[{$fm['name']}]!";
                    }
                }
            }else{
                $remsg = '请输入登录信息!';
            }
        }elseif(!empty($this->sess)){
            $remsg = "`{$this->sess}`已登录，请选择数据区或`<a href='./ftree-login-out'>登出</a>`!";
        }
        $re['vars']['remsg'] = $remsg;
        $re['vars']['part'] = db()->table('ftree_part')->select();
        $re['newtpl'] = 'ftree/login';
        return $re;
    }
    function goAct(){
        $tmp = array('mod','key','view');
        foreach ($tmp as $k0) {
            $$k0 = $this->ucfg[$k0];
        }
        if($view){
            if(empty($this->sess)){ // 登录切换
                header("Location:./ftree-login-to02");
                die();
            } 
            $rp = db()->table('ftree_part')->where("part='$view'")->find();
            $tabs = empty($_SESSION['ftuser_parts']) ? $view : $_SESSION['ftuser_parts'];
            $taba = explode(',',$tabs);
            if($rp && in_array($view,$taba)){ // 验证:存在+有权限
                $_SESSION['ftnow_part'] = $view;
                $_SESSION['ftnow_extab'] = empty($rp['extab']) ? 'main' : $rp['extab'];
                header("Location:./ftree-list");
                die();
            }else{
                header("Location:./ftree-login-to03");
                die();
            }
        }else{
            header("Location:./ftree-login");
            die();
        }

    }

    function listAct(){
        $ids = empty($_SESSION['ftuser_myids']) ? '' : $_SESSION['ftuser_myids'];
        $re['vars']['list'] = exvFtree::getList($ids);
        return $re;
    }

    function saveAct(){
        $act = basReq::val('act');
        $kid = basReq::val('kid');
        $fm = basReq::arr('fm');
        $reid = exvFtree::rowActs($fm,$kid,$act);
        $urlp = is_numeric($reid) ? "&eid=$reid" : '';
        header("Location:./ftree-list&kw=$kid$urlp");
        die();
    }

    // _defAct
    function _defAct(){
        $acts = $this->acts;
        $res = []; $row = null;
        if(isset($acts[$this->ucfg['key']])){
            $res['newtpl'] = 'ftree/edit';
            if($this->ucfg['view']){
                $row = exvFtree::dbNow($this->ucfg['view']);
                if(!$row){
                    header("Location:./ftree");
                    die();
                }
                /*if(!empty($row['part']) && $_SESSION['ftnow_part']!=$row['part']){
                    #header("Location:./ftree-login-to0x");
                }*/
            }elseif(empty($_SESSION['ftuser_parts'])){
                $row['kid'] = '(0)';
                $row['name'] = '(增加)';
                $row['sex'] = '女';
            }else{
                header("Location:./ftree-login-to03");
                die();
            }
        }else{
            return;
        }
        $vars['row'] = $row;
        $vars['prs'] = exvFtree::getPair($row, 1); // 父母资料
        $vars['mts'] = self::dmts($row); // mates资料
        $vars['suns'] = exvFtree::getSuno($row); // 仅自己的子女
        $vars['acts'] = $acts;
        $res['vars'] = $vars; // dump($vars['prs']);
        return $res;
    }

    function _detailAct(){
        $tmp = array('mod','key','view');
        foreach ($tmp as $k0) {
            $$k0 = $this->ucfg[$k0];
        }
        $res = ['newtpl'=>'ftree/detail', 'vars'=>['abc'=>[]]];
        $row = exvFtree::dbNow($key); 
        if(!$row){ return $res;}  
        $vars['row'] = $row;
        $vars['pr0'] = exvFtree::getPair($row); // 父母
        $vars['prd'] = exvFtree::getPair($vars['pr0']['did']); // 爷奶
        $vars['prm'] = exvFtree::getPair($vars['pr0']['mid']); // (外)公婆
        $vars['abc'] = exvFtree::getAbcs($row, $view); // 同辈(兄弟姐妹)/子辈/孙辈
        $res['vars'] = $vars;
        return $res;
    }
    // 配偶数组
    static function dmts($row){
        $res = [];
        if(empty($row['mates'])) return $res;
        $ma = explode(',',$row['mates']); 
        foreach($ma as $m1){ if($m1){
            $res[] = exvFtree::dbNow($m1);
        } }
        return $res;
    }
    static function vhref($kid){
        $ids = empty($_SESSION['ftuser_myids']) ? [] : explode(',',$_SESSION['ftuser_myids']);
        $href = "href='./ftree.{$kid}'";
        if(empty($ids)){
            return $href;
        }else{
            return in_array($kid,$ids) ? $href : '';
        }
        
    }
    // 显示父母链接(列表)
    static function vp2($pr0){
        foreach (['d','m'] as $k) {
            $itm = $pr0[$k.'id'];
            if(empty($itm)){
                $str = '<a>'.($k=='d'?'父':'母').'?</a>';
            }else{
                $str = "<a ".self::vhref($itm['kid']).">{$itm['name']}</a>";
            }
            $kk = "a$k"; $$kk = $str;
        }
        return "$ad+$am";
    } // <a>{=$pr0['did']['name']}</a>+<a>{=$pr0['mid']['name']}</a>
    // 显示单个人资料(详情)
    static function vc1($row, $def=''){
        if(is_numeric($row)){ $row=exvFtree::dbNow($row); }
        if(empty($row)){ return "<p>{}</p>$def(?)"; } //称呼(?)
        $ust = ['suns1','suns2','suns3','kno','part',
            'aip','atime','auser','eip','etime','euser'];
        foreach($ust as $uk){ unset($row[$uk]); }
        $str = "<p>".json_encode($row,JSON_UNESCAPED_UNICODE)."</p>\n";
        if(empty($row)){
            $str .= "$def(?)\n"; //称呼(?)
        }else{
            $sbd = self::vage($row);
            $cur = $def==$row['kid'] ? "class='cur'" : self::vhref($row['kid']);
            $str .= "<a id='r{$row['kid']}' $cur>{$row['name']}</a>\n";    
            $sbd && $str .= "<i class='c1'>$sbd</i>\n";
            $str .= "<i class='c2'>&gt;</i>\n";
        }
        return $str;
    }                
    // 显示年龄(提示)
    static function vage($row=[]){
        $y1 = intval($row['birth']);
        $y2 = intval($row['death']);
        $y0 = date('Y');
        if($y1 && $y2 && $y2<$y0 && $y2-$y1>20){
            $yd = $y2-$y1;
            return "<b title='($yd)岁$y1~$y2'>$yd</b>";
        }else{ //if($y1>0){
            $y1 = empty($row['birth']) ? '?' : $row['birth'];
            $y2 = empty($row['death']) ? '?' : $row['death'];
            return "$y1~$y2"=='?~?' ? '' : "<b title='$y1~$y2'>~</b>";
        }
    }

    function homeAct(){
        $re['newtpl'] = 'ftree/mhome'; // 模板
        return $re;
    }
    function fuwuAct(){
        $re['newtpl'] = 'ftree/mhome'; // 模板
        $re['vars']['extitle'] = '服务';
        return $re;
    }

    /*function mdhtml($fp){
        $fp = DIR_VIEWS."/comm/ftree/$fp.md";
        $data = comFiles::get($fp,1); # vopComp::incBlock('{inc:"ftree/$fp"}'); #
        $re['vars']['html'] = extMkdown::pdext($data,0);
        $re['newtpl'] = 'ftree/mhome'; // 模板
        return $re;
    }*/

}

/*
    $re['vars']['name'] = $name; // 变量
    $re['tplorg'] = 'umod/step-vtplorg'; // 模板
    $re['newtpl'] = 'ftree/mhome'; // 模板
    return $re;
*/
