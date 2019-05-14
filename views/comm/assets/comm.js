
function bs4pager(){
    $('.pagination').addClass('justify-content-center');
    $('.pagination').find('li').addClass('page-item');
    $('.pagination').find('a').addClass('page-link');
}

function jsactMenu(menuid){
    if(_cbase.jsrun.menuid){
        menuid = _cbase.jsrun.menuid;
    }else if(!menuid){
        var a = _cbase.run.mkv.replace('.','-').split('-');
        menuid = a[0];
    }
    var e = jsElm.jeID('idf_'+menuid); 
    if(e) e.className = 'active';
    // 处理链接
    $('.mod-section a').each(function(i, e) {
        var url = $(e).attr("href"); 
        if(url.indexOf('://')>0) $(e).attr("target",'_blank');
    });
}

// <b class="qrcode_tip" onMouseOver="qrurl_act(id,1)" onMouseOut="qrurl_act(id,0)">扫码<i class="qrcode_pic"></i></b
function qrurl_set(id,url){ 
    cls = 'qrcode_pic';
    if($('#'+cls+id).html().length>24) return;
    url = url.length>12 ? url : window.location.href;
    url = urlEncode(url);
    img = "<img src='"+_cbase.run.fbase+"?ajax-vimg&mod=qrShow&data="+url+"' width='180' height='180' />";
    $('#'+cls+id).html(lang('info.scan_to_phone')+'<br>'+img); // onload='imgShow(this,180,180)'
}
function qrurl_act(id,type,url){
    if(url) qrurl_set(id,url);
    if(type) $('#qrcode_pic'+id).show();
    else $('#qrcode_pic'+id).hide();
}

function digg(e){
    $('.fa-thumbs-o-up').each(function(i1, e1) {
        $(e1).css('cursor',"pointer").click(function(){ 
            var p = $(e1).parent(), id = $(p).prop('id'),
                url = '/plus/coms/digg.php?mod=wall&kid='+id+'&opfid=diggtop&lang='+_cbase.sys.lang; 
            $.ajax({     
                url:_cbase.run.roots+url, type:'get', async : false, //默认为true 异步     
                error:function(){
                    $(p).find('.add1').html('Server Error!').show().hide(2300); 
                },
                success:function(data){     
                    if(data=='success'){
                        var val = $(e1).html().replace(' ','');
                        $(e1).html(' '+(parseInt(val)+1));
                        data = '+1';
                    } //data = fid=='diggtop' ? '点赞成功！' : '吐槽成功！';
                    $(p).find('.add1').html(data).show().hide(2300);
                }  
            });
        });
    });
}
