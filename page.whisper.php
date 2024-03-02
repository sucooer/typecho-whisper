<?php
/**
 * 即刻
 * @author 即刻学术 www.ijkxs.com
 * @package custom
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->need('module/head.php'); ?>
	<link rel="stylesheet" href="//cdn.staticfile.org/Swiper/5.4.5/css/swiper.min.css" />
	<script src="//cdn.staticfile.org/Swiper/5.4.5/js/swiper.min.js"></script>
	<script src="https://fastly.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
	<link rel="stylesheet" href="<?= joe\theme_url('assets/css/joe.index.css'); ?>">
	<script src="<?= joe\theme_url('assets/js/joe.index.js'); ?>"></script>
	
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta itemprop="image" content="https://cdn.jsdelivr.net/gh/gogobody/PicsumPlaceholder/img/536_354_webp/79.webp">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=6.0, minimum-scale=1.0, shrink-to-fit=no, viewport-fit=cover">

    <!-- favicon图标 -->
    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/npm/typecho_joe_theme@4.3.5/assets/img/favicon.ico">
    <!-- Typecho自有函数 -->
    <meta name="description" content="即刻">
    <meta name="generator" content="Typecho 1.2/18.1.29">
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

    <!-- 网站标题 -->
    <title>即刻</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap-grid.min.css"
          media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.7.2/animate.min.css" media="all">

<!--    <link rel="stylesheet" href="http://localhost/usr/themes/Typecho-Joe-Theme/assets/css/joe.min.css" media="all">-->
<!--    <link rel="stylesheet" href="http://localhost/usr/themes/Typecho-Joe-Theme/assets/css/joe.responsive.min.css" media="all">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gogobody/Modify_Joe_Theme/assets/css/OwO.min.css"
          media="all" onload="this.media='all'; this.onload=null;">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('times/assets/dycomment.min.css'); ?>"
          media="all" onload="this.media='all'; this.onload=null;">

</head>
<body>
    <div id="Joe">
        <?php $this->need('module/header.php'); ?>
        <div class="joe_container">
            <div class="joe_main">
            	<div class="joe_index">
					<section>
                    <!-- 主体 -->
                        <section class="container j-post">
                            <section class="j-adaption">
                                <?php $this->need('module/batten.php'); ?>
                                <?php $this->need('times/dycomment.php'); ?>
                            </section>
                        </section>
                    </section>			
				</div>
            </div>
            <?php $this->need('module/aside.php'); ?>
        </div>
        <?php $this->need('module/footer.php'); ?>
    </div>
<script src="https://cdn.todsay.com/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.todsay.com/npm/typecho_joe_theme@4.4.5/assets/js/OwO.min.js"></script>

<script>
    function changeURLArg(url,arg,arg_val){
        let pattern=arg+'=([^&]*)';
        let replaceText=arg+'='+arg_val;
        if(url.match(pattern)){
            let tmp='/('+ arg+'=)([^&]*)/gi';
            tmp=url.replace(eval(tmp),replaceText);
            return tmp;
        }else{
            if(url.match('[\?]')){
                return url+'&'+replaceText;
            }else{
                return url+'?'+replaceText;
            }
        }
    }
    let DyComment ={
        /* 初始化owo标签 */
        init_owo() {
            if ($('#OwO_Container').length === 0) return;
            new OwO({
                logo: 'OωO表情',
                container: document.getElementsByClassName('OwO')[0],
                target: document.getElementsByClassName('OwO-textarea')[0],
                api: '<?php $this->options->themeUrl('times/assets/owo.json')?>',
                position: 'down',
                width: '100%',
                maxHeight: '250px'
            });

            $(document).bind('click', function () {
                $('.OwO').removeClass('OwO-open');
            });
        },
        /* 初始化即刻发布 */
        init_dynamic_verify() {
            let _this = this;
            $('#j-dynamic-form').off('submit').on('submit', function (e) {
                // e.preventDefault();
                let btn = $("#j-dynamic-form .form-foot button")
                if ($('#j-dynamic-form-text').val().trim() === '') {
                    return alert('请输入发表内容');
                }
                if ($(this).attr('data-disabled')) return;
                $(this).attr('data-disabled', true);
                btn.text("发表中...")

                // $.ajax({
                //     url: $(this).attr('action'),
                //     type: 'post',
                //     data: $(this).serializeArray(),
                //     success: res => {
                //         let arr = [],
                //             str = '';
                //         arr = $(res).contents();
                //         Array.from(arr).forEach(_ => {
                //             if (_.parentNode.className === 'container') str = _;
                //         });
                //         if (!/TypechoJoeTheme/.test(res)) {
                //
                //             alert(str.textContent || '');
                //             $('#j-dynamic-form-text').val('')
                //             $(this).removeAttr('data-disabled');
                //         } else {
                //             let url = location.href;
                //             url = changeURLArg(url, 'jscroll', 'comments');
                //
                //             alert('发表成功！');
                //
                //         }
                //         btn.text("立即发表")
                //     },
                //     error:res =>{
                //         btn.text("立即发表")
                //     }
                // });
            });
        }
    }
    $(document).ready(function () {
        /* 点击评论按钮显示隐藏评论区域 */
        $('.j-comment-reply').unbind('click').bind('click', function (e) {
            e.stopPropagation();
            $(this).parents('li').find('.j-dynamic-reply').toggle();
        });
        DyComment.init_owo()
        DyComment.init_dynamic_verify()
    })
</script>
</body>
</html>

