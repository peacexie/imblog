<?php
namespace imcat\comm;

use imcat\basJscss;

/*
公共模板扩展函数
*/ 
class texBase{

    static function init($obj){
        //global $_cbase;
    }
    
    static function pend(){
        $tpl = cfg('tpl');
        $base = $tpl['tplpend'];
        $ext = $tpl['tplpext'];
        $base || $base = 'jcron,jstag';
        $js = '';
        strstr($base,'jcron') && $js .= "setTimeout(\"jcronRun()\",3700);\n";
        strstr($base,'jstag') && $js .= "jtagSend();\n";
        $ext && $js .= "$ext;\n";
        if($js) echo basJscss::jscode("\n$js")."\n";
    }

    # ---------------------------------------------------------

}
