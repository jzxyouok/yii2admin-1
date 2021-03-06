
<style type="text/css">
#carousel-example-generic .carousel-inner img{
    width: 1200px;
    height: 400px;
}
#carousel-example-captions .carousel-inner img{
    width: 740px;
    height: 290px;
}
#carousel-example-generic01 .carousel-inner img{
    width: 385px;
    height: 253px;
}
#carousel-example-generic01  .pre_next{
    position: absolute;
    right: 0px;
    top: -55px;
    font-size: 30px;

}
#carousel-example-generic01  .pre_next a{
    color: #000;
}
#carousel-example-generic01  .pre_next a:hover{
    color: #ccc;
}
#carousel-example-generic01 .price{
    position: absolute;
    right: 7px;
    top: 14px;
}

#carousel-example-captions02 .carousel-control{
    left: 170px;
}
#carousel-example-captions02 .item img{
    height: 408px;
}

.carousel-inner {
    position: relative;
    width: 1200px;
    overflow: hidden;
    margin: 0 auto;
}
</style>
<!--banner-->
<?php if($ad_list):?>
<div id="carousel-example-generic" class="carousel slide ban" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
            <?php foreach ($ad_list as $k => $g) :?>
            <li data-target="#carousel-example-generic" data-slide-to="<?=$k?>" class="<?=$k==0?'active':''?>"></li>
            <?php endforeach;?>
    </ol>
    <div role="listbox" class="carousel-inner">
        <?php foreach ($ad_list as $k => $g) :?>
            <div class="item <?=$k==0?'active':''?>">
                <a href="<?=$g['url']?>" target='_blank'>
                    <img src="<?=$g['image']?>">
                </a>
            </div>
        <?php endforeach;?>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left.png"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon-chevron-right" aria-hidden="true"><img src="/bootstrap/images/right.png"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php endif;?>
<!--房间选择与滑动-->

<div class="switch_slide">
    <!--房间选择-->
    <div class="sy_switch">
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#guestroom" data-toggle="tab">客房</a></li>
            <li><a href="#sailing" data-toggle="tab">帆船</a></li>
            <li><a href="#dive" data-toggle="tab">潜水</a></li>
            <li><a href="#sea" data-toggle="tab">海钓</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active items" id="guestroom">
                <section id="demo_position">
                    <div class="input-append date form_datetime6 w_120" data-picker-position="bottom-left">
                        <p>入住日期</p>
                        <div class="border">
                            <input class="stime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d',time()+60*60*24)?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime6 w_120" data-picker-position="bottom-left">
                        <p>退房日期</p>
                        <div class="border">
                            <input class="etime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d',time()+60*60*(24+24))?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append  w_120 fz" data-picker-position="bottom-left">
                        <p>类型</p>
                        <select class="form-control goodid" name="aid" >
                            <?php foreach (\backend\models\Shop::lists(1) as $v): ?>
                            <option value="<?=$v['id']?>"><?=$v['title']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>数量</p>
                        <select class="form-control num">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </section>
                <a href="javascript:;" class="tijiao goumai">购 买</a>
                <a href="javascript:;" class="tijiao gouwuche" style="background:#e50014;">加入购物车</a>
            </div>
            <div class="tab-pane fade items" id="sailing">
                <section id="demo_position">
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>开始日期</p>
                        <div class="border">
                            <input class="stime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d H:00',time()+60*60*24)?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>结束日期</p>
                        <div class="border">
                            <input class="etime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d H:00',time()+60*60*(24+24))?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append  w_120 fz" data-picker-position="bottom-left">
                        <p>商品类型</p>
                        <select class="form-control goodid" name="aid" >
                            <?php foreach (\backend\models\Shop::lists(2) as $v): ?>
                                <option value="<?=$v['id']?>"><?=$v['title']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>数量</p>
                        <select class="form-control num">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </section>
                <a href="javascript:;" class="tijiao goumai">购 买</a>
                <a href="javascript:;" class="tijiao gouwuche" style="background:#e50014;">加入购物车</a>
            </div>
            <div class="tab-pane fade items" id="dive">
                <section id="demo_position">
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>开始日期</p>
                        <div class="border">
                            <input class="stime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d H:00',time()+60*60*24)?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>结束日期</p>
                        <div class="border">
                            <input class="etime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d H:00',time()+60*60*(24+24))?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append  w_120 fz" data-picker-position="bottom-left">
                        <p>类型</p>
                        <select class="form-control goodid" name="aid" >
                            <?php foreach (\backend\models\Shop::lists(3) as $v): ?>
                                <option value="<?=$v['id']?>"><?=$v['title']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>数量</p>
                        <select class="form-control num">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </section>
                <a href="javascript:;" class="tijiao goumai">购 买</a>
                <a href="javascript:;" class="tijiao gouwuche" style="background:#e50014;">加入购物车</a>
            </div>
            <div class="tab-pane fade items" id="sea">
                <section id="demo_position">
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>开始日期</p>
                        <div class="border">
                            <input class="stime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d H:00',time()+60*60*24)?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>结束日期</p>
                        <div class="border">
                            <input class="etime" size="16" readonly="readonly" type="text" value="<?=date('Y-m-d H:00',time()+60*60*(24+24))?>">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append w_120 fz" data-picker-position="bottom-left">
                    <p>类型</p>
                        <select class="form-control goodid" name="aid" >
                            <?php foreach (\backend\models\Shop::lists(4) as $v): ?>
                                <option value="<?=$v['id']?>"><?=$v['title']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>数量</p>
                        <select class="form-control num">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </section>
                <a href="javascript:;" class="tijiao goumai">购 买</a>
                <a href="javascript:;" class="tijiao gouwuche" style="background:#e50014;">加入购物车</a>
            </div>
        </div>
    </div>
    <!--滑动-->

    <div id="carousel-example-captions" class="carousel slide bann_switch" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php if($ad2_list):?>
            <?php foreach ($ad2_list as $k => $g) :?>
            <div class="item <?=$k==0?'active':''?>">
                <a href="<?=$g['url']?>" target='_blank'>
                    <img src="<?=$g['image']?>" data-holder-rendered="true" class="bann_switch_img">
                </a>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
            <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left.png"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
            <span class="glyphicon-chevron-right" aria-hidden="true"><img src="/bootstrap/images/right.png"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--滑动结束-->
</div>
<div class="xian"></div>
<!--最新推荐-->
<div class="tj">
    <h2>最&nbsp;新&nbsp;推&nbsp;荐</h2>
    <p>帆海汇各版块主推项目入口、帆海汇各版块主推项目入口、帆海汇各版块主推项目入口
帆海汇各版块主推项目入口帆海汇各版块主推项目</p>
</div>
<!--最新推荐滚动图-->
<div class="recommended_top">
    <span class="recommended_top_span">选择</span>
    <div class="input-append">
        <select class="form-control" id='recommend_select'>
            <option value="all">所有</option>
            <option value="active">活动</option>
            <option value="package">套餐</option>
        </select>
    </div>
</div>
<div id="carousel-example-generic01" class="carousel slide recommended" data-ride="carousel" style="position:relative;overflow: initial;">
    <div class="carousel-inner" role="listbox">
    </div>
    <div class="pre_next">
        <a class="" href="#carousel-example-generic01" role="button" data-slide="prev">
            <!-- <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left01.png"></span> -->
            <span class="glyphicon-chevron-left" aria-hidden="true"> < </span>
        </a>
        <a class="" href="#carousel-example-generic01" role="button" data-slide="next">
            <!-- <span class="glyphicon-chevron-right" aria-hidden="true"><img src="/bootstrap/images/right01.png"></span> -->
            <span class="glyphicon-chevron-right" aria-hidden="true"> > </span>
        </a>
    </div>
</div>
<div class="xian"></div>
<!--爱正能量-->
<div class="tj">
    <h2>爱&nbsp;·&nbsp;运&nbsp;动&nbsp;·&nbsp;正&nbsp;能&nbsp;量</h2>
    <p>特色介绍：用最简短的一段话阐述帆海汇各版块的特色项目<br>
以下为各项目的入口，包括俱乐部、培训、活动</p>
</div>
<!--爱正能量-->
<div class="w_1200">
    <div class="exercise_bg">
        <div class="exercise_bg01">
            <h3>帆海汇俱乐部：</h3>
            <p>帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，
双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，
还是商务洽谈等都可以满足您的需要。 </p>

<p>帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议
或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，
将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 </p>
            <a href="/article/index?cid=1">详&nbsp;情</a>
        </div>
        <div class="exercise_bg02"></div>
        <div class="exercise_cen">
            <div id="carousel-example-captions02" class="carousel slide exercise_cen" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="">
                            <img src="/bootstrap/images/lunbo.jpg" data-holder-rendered="true" class="exercise_cen_img">
<!--                             <div class="carousel-caption">
                            <h3>悠长假期住宿优惠</h3>
                            <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p></div>-->
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="/bootstrap/images/lunbo.jpg" data-holder-rendered="true" class="exercise_cen_img">
<!--                             <div class="carousel-caption">
                            <h3>悠长假期住宿优惠</h3>
                            <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p></div> -->
                        </a>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-captions02" role="button" data-slide="prev">
                        <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left.png"></span>
                        <span class="sr-only">Previous</span></a>
                  </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {

        /* 立即购买，跳转到结算页 */
        $('.goumai').click(function () {
            clearCart();
            addCart(this,1);
        });
        /* 加入购物车 */
        $('.gouwuche').click(function () {
            addCart(this,0);

        });
    });
    /* 清空购物车 */
    function clearCart() {
        $.ajax({
            async: false, //同步
            type: "GET",
            url: "<?=\yii\helpers\Url::to(['order/clear'])?>",
            success: function(data){

            }
        });
    }
    /* 添加或修改购物车 */
    function addCart(that,isjp) {
        var item = $(that).parents('.items');

        var id  = parseInt(item.find('.goodid').val());
        var stime  = item.find('.stime').val();
        var etime  = item.find('.etime').val();
        if(etime==stime){
            alert('开始时间与结束时间不能相同');
            return;
        }
        var num   = parseInt(item.find('.num').val());

        var t1 = new Date(stime);
        var t2 = new Date(etime);console.log(t1.getTime());console.log(t2.getTime());console.log(num);
        if(num > 0 && t1.getTime() < t2.getTime()){
            $.ajax({
                async: false, //同步
                type: "GET",
                url: "<?=\yii\helpers\Url::to(['order/cart'])?>",
                data: {type:"shop",aid:id,stime:stime,etime:etime,num:num},
                success: function(data){
                    if(data.code != 0){
                        layer.alert(data.msg);
                    } else {
                        if(isjp == 1){
                            window.location.href = '/order';
                        } else {
                            layer.alert('已加入购物车');
                        }
                    }
                }
            });
        }
    }


    function changeRecommd(type){
        if(!type){
            type='all';
        }
        var data = <?php echo json_encode($recommd); ?>;
        var html = '<item class="item active">';
        var item_data = data[type];
        for (var i = 0; i < item_data.length; i++) {
            if(item_data[i].category_id){
                var url = '/article/show?id='+item_data[i]['id'];
            }else{
                var url = "/shop/detail?id="+item_data[i]['id'];
            }
            var price_html='';
            if(item_data[i]['price']){
                price_html = '<span class="price">￥'+item_data[i]['price']+'</span>';
            }
            html += '<div class="w_385"><a href="'+url+'"><img src="'+item_data[i]['cover']+'" data-holder-rendered="true"><div class="carousel-caption"><h3>'+item_data[i]['title']+price_html+'</h3><p>'+item_data[i]['description']+'</p></div></a></div>';
            if((i+1)%6==0 && i<item_data.length-1){
                html += '</item>';
                html += '<item class="item">';
            }
        };
        html += '</item>';
        
        $('#carousel-example-generic01 .carousel-inner').html(html);

    }
    changeRecommd()
    $('#recommend_select').change(function(){
        var type = $(this).val();
        changeRecommd(type);
    })
</script>
