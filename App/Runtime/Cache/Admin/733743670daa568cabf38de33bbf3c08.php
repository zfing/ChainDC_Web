<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <link rel="shortcut icon" href="/Public/Home/images/titlelogo.icon"  type="image/x-icon">
    <link rel="stylesheet" href="/Public/Admin/css/index.css">
    <link rel="stylesheet" href="/Public/Admin/css/evaluated.css">
    <link rel="stylesheet" href="/Public/Admin/css/EvaluatedStandard.css">
    <link rel="stylesheet" href="/Public/Admin/css/logoManage.css">
    <script src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Admin/js/index.js"></script>
    <script src="/Public/Admin/js/contentProject.js"></script>
    <script src="/Public/Admin/js/logoManage.js"></script>
</head>
<body>
<div class="wl-manage-layout">
    <div class="wl-header">
        <div class="manage-logo manage-headerLeft">
            <img src="/Public/Admin/images/indexImg/logo.png" alt="">
        </div>
        <div class="manage-headerRight">
            <div class="manage-title">
                <span>后台管理系统</span>
            </div>
            <div class="manage-user">
                <div class="manage-user-login">
                    <img src="/Public/Admin/images/indexImg/ceshi.png" alt="">
                    <span class="quit">退出</span>
                </div>
                <div class="split"></div>
                <div class="manage-user-toggle">
                    <span class="toggleUser">切换账号</span>
                </div>
            </div>
        </div>
    </div>

    <div class="wl-main">
        <div class="main-nav">
            <ul>
                <a class="TabNav navStyle " href="#TabNavPage0">
                    <li>
                        <img class="navBg0" src="/Public/Admin/images/indexImg/rating1_selected.png"/>
                        <span>项目数据</span>
                    </li>
                </a>
                <a class="TabNav" href="#TabNavPage1">
                    <li>
                        <img class="navBg1" src="/Public/Admin/images/indexImg/rating2.png"/>
                        <span>采访与公告</span>
                    </li>
                </a>
                <a class="TabNav" href="#TabNavPage2">
                    <li >
                        <img class="navBg2" src="/Public/Admin/images/indexImg/add.png" />
                        <span>添加项目</span>
                    </li>
                </a>
                <!--<a class="TabNav" href="#TabNavPage3">
                    <li>
                        <img class="navBg3" src="/Public/Admin/images/indexImg/setting.png"/>
                        <span>评估标准</span>
                    </li>
                </a>-->
                <a class="TabNav" href="#TabNavPage3">
                    <li>
                        <img class="navBg3" src="/Public/Admin/images/indexImg/logo_setting.png"/>
                        <span>图标管理</span>
                    </li>
                </a>
            </ul>
        </div>
        <div class="main-content">
            <!--切换页面-->

            <div class="content-project evaluated">

             <!--   <div class="wl-project-filter">
                        <span class="select2 select2-container select2-container&#45;&#45;wl select2-container&#45;&#45;below">
                            <span class="selection">
                                <span class="select2-selection select2-selection&#45;&#45;single">
                                    <span class="select2-selection__rendered" title="点击搜索">
                                        <span class="select2-selection__placeholder">按名称搜索</span>
                                    </span>
                                </span>
                            </span>
                            &lt;!&ndash;点击搜索的下拉框集合&ndash;&gt;
                            <span style="display: none" class="select_box">
                                <span class="search_options_box">
                                    <span class="search_input">
                                        <input type="search" class="search_input_focus">
                                    </span>
                                    <span class="search_results">
                                        <ul class="select-results_options">

                                               <li class="select-results_option">
                                                <div class="search-result_item">
                                                    <div class="search-result_item_logo" style="background-image: url('images/taas.png')"></div>
                                                    <div class="search-result_item_text">
                                                        <div class="search-result_item_text-name">searchTextName</div>
                                                        <div class="search-result_item_text-category">searchTextCategory</div>
                                                    </div>
                                                </div>
                                            </li>
                                               <li class="select-results_option">
                                                <div class="search-result_item">
                                                    <div class="search-result_item_logo" style="background-image: url('images/taas.png')"></div>
                                                    <div class="search-result_item_text">
                                                        <div class="search-result_item_text-name">afsfas</div>
                                                        <div class="search-result_item_text-category">searchTextCategory</div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </span>

                                </span>
                            </span>
                        </span>
                    </div>-->

                <div class="tab-lists">
                    <div class="tab-list">
                        <span>所有数据</span>
                        <table class="wl-projects-table ">
                            <thead class="wl-projects-table__head">
                            <tr class="wl-projects-table__row">
                                <th class="wl-projects-table__name-info js-sort-table" data-sort="name">名称</th>
                                <!--<th class="wl-projects-table__info js-sort-table" data-sort="hype">类型</th>-->
                                <th class="wl-projects-table__info js-sort-table" data-sort="risk">热度</th>
                                <th class="wl-projects-table__info js-sort-table" >风险</th>
                                <th class="wl-projects-table__info js-sort-table" data-sort="depth">深度评估</th>
                                <th class="js-sort-table" data-sort="start">价格(￥)</th>
                                <th class="js-sort-table js-sort-table_price" data-sort="end" title="当前市值">当前市值(￥)</th>
                                <th class="js-sort-table js-sort-table_price" title="预估半年市值">预估市值(￥)</th>
                                <th class="wl-projects-table__info wl-projects-table__investment-info js-sort-table" data-sort="potential" title="预估半年潜力">预估潜力</th>
                                <th class="">项目评估</th>
                                <th class="">管理</th>
                            </tr>
                            </thead>
                            <tbody class="wl-projects-table__body1">

                            <?php foreach($result as $v){ ?>
                            <tr class="wl-projects-table__row">
                                <td class="wl-project-name js-sort-class-name" style="background-image:url('<?= C('READ_PATH').$v['logo_path']; ?>')"><?= $v['currency_name']; ?></td>
                                <!--<td class="wl-project-hypeScore js-sort-class-hype">-->
                                    <!--<div class="wl-project-wrapper"><?php if($v['project_type']==1){echo "上层应用";}elseif($v['project_type']==2){echo "协议层";}else{echo "底层系统";} ?></div>-->
                                <!--</td>-->
                                <td class="wl-project-riskScore js-sort-class-risk">
                                    <div class="wl-project-wrapper"><?php if($v['ishot']==1){echo "高";}elseif($v['ishot']==2){echo "中";}else{echo "低";} ?></div>
                                </td>

                                <td class="wl-project-riskScore js-sort-class-risk">
                                    <div class="wl-project-wrapper"><?php if($v['risk_score']==1){echo "高";}elseif($v['risk_score']==2){echo "中";}else{echo "低";} ?></div>
                                </td>
                                <td class="wl-project-investScore js-sort-class-potential">
                                    <div class="wl-project-wrapper">
                                        <div class="wl-project-investScore__value"><?php if($v['assessment']=='A'){echo "A（投资级）";}elseif($v['assessment']=='B'){echo "B（投资级）";}elseif($v['assessment']=='C'){echo "C（投资级）";}elseif($v['assessment']=='D'){echo "D（投机级）";}else{echo "E（投机级）";} ?></div>
                                    </div>
                                </td>
                                <td class="wl-project-rating js-sort-class-depth">
                                    <div class="wl-project-wrapper">
                                        <div class="wl-project-rating__value" title="<?php if($v['last_updated']==0){echo '暂无';}else{echo '更新时间:'.date('Y-m-d H:i:s', $v['last_updated']);} ?>">
                                            <span><?php if($v['price_cny']==0){ echo "暂无";}else{echo number_format($v['price_cny'],2,'.',',');} ?></span>
                                            <!--<div class="wl-project-whiteBook"></div>-->
                                        </div>
                                    </div>
                                </td>
                                <td class="wl-project-date js-sort-class-start">
                                    <div class="wl-project-wrapper">
                                        <div class="wl-project-date__start" title="<?php if($v['last_updated']==0){echo '暂无';}else{echo '更新时间:'.date('Y-m-d H:i:s', $v['last_updated']);} ?>">
                                            <div class="wl-project-date__value"><?php if($v['market_cap_cny']==0){echo "暂无";}else{echo number_format(FormatMoney($v['market_cap_cny']),1,'.',',').'亿';} ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="wl-project-date js-sort-class-end">
                                    <div class="wl-project-wrapper">
                                        <div class="wl-project-date__end">
                                            <div class="wl-project-date__value"><?= number_format($v['emarket'],1,'.',',').'亿'; ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="wl-project-price">
                                    <div class="wl-project-wrapper">
                                        <div class="wl-project-date__end">
                                            <div class="wl-project-date__value"><?php if($v['market_cap_cny']==0){echo "暂无";}else{echo number_format($v['emarket']/FormatMoney($v['market_cap_cny']),1,'.',',').'倍';} ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="wl-project-links">
                                    <div class="wl-project-wrapper">
                                        <!--<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('../images/indexImg/rating1_selected.png')" target="_blank"></a>-->
                                        <!--<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('images/twitter-icon.png')" target="_blank"></a>-->
                                        <a href="<?= $v['d_a_href']; ?>"><?= $v['d_a']; ?></a>
                                    </div>
                                </td>
                                <td class="wl-project-logo">
                                    <div class="logoManage">
                                        <span><a href="<?= U('Admin/Admin/upd',array('currency_id'=>$v['currency_id']),false); ?>">更新</a></span>
                                        <span><a href="<?= U('Admin/Admin/del',array('currency_id'=>$v['currency_id']),false); ?>">删除</a></span>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

            <div style="display: none" class="content-project NotEvaluated">
                <a href="<?= U('Admin/Interview/Add'); ?>">添加采访</a>
                <table border="1" rules="all" width="600">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>add_time</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($interview as $iv){ ?>
                    <tr>
                        <td><?= $iv['iv_id']; ?></td>
                        <td><?= $iv['title']; ?></td>
                        <td><?= date('Y-m-d H:i:s',$iv['add_time']); ?></td>
                        <td><a href="<?= U('Admin/Interview/Upd',array('iv_id'=>$iv['iv_id']),false); ?>">更新</a> <a href="<?= U('Admin/Interview/Del',array('iv_id'=>$iv['iv_id']),false); ?>">删除</a></td>
                    </tr>
                    <?php } ?>
                </table><br>
                <a href="<?= U('Admin/Notic/Add'); ?>">添加公告</a>
                <table border="1" rules="all" width="600">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>add_time</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($notic as $no){ ?>
                    <tr>
                        <td><?= $no['no_id']; ?></td>
                        <td><?= $no['title']; ?></td>
                        <td><?= date('Y-m-d H:i:s',$no['add_time']); ?></td>
                        <td><a href="<?= U('Admin/Notic/Upd',array('no_id'=>$no['no_id']),false); ?>">更新</a> <a href="<?= U('Admin/Notic/Del',array('no_id'=>$no['no_id']),false); ?>">删除</a></td>
                    </tr>
                    <?php } ?>
                </table>
         <!--       <div class="wl-project-filter">
                        <span class="select2 select2-container select2-container&#45;&#45;wl select2-container&#45;&#45;below">
                            <span class="selection">
                                <span class="select2-selection select2-selection&#45;&#45;single">
                                    <span class="select2-selection__rendered" title="点击搜索">
                                        <span class="select2-selection__placeholder">按名称搜索</span>
                                    </span>
                                </span>
                            </span>
                            &lt;!&ndash;点击搜索的下拉框集合&ndash;&gt;
                            <span style="display: none" class="select_box">
                                <span class="search_options_box">
                                    <span class="search_input">
                                        <input type="search" class="search_input_focus">
                                    </span>
                                    <span class="search_results">
                                        <ul class="select-results_options">

                                               <li class="select-results_option">
                                                <div class="search-result_item">
                                                    <div class="search-result_item_logo" style="background-image: url('images/taas.png')"></div>
                                                    <div class="search-result_item_text">
                                                        <div class="search-result_item_text-name">searchTextName</div>
                                                        <div class="search-result_item_text-category">searchTextCategory</div>
                                                    </div>
                                                </div>
                                            </li>
                                               <li class="select-results_option">
                                                <div class="search-result_item">
                                                    <div class="search-result_item_logo" style="background-image: url('images/taas.png')"></div>
                                                    <div class="search-result_item_text">
                                                        <div class="search-result_item_text-name">afsfas</div>
                                                        <div class="search-result_item_text-category">searchTextCategory</div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </span>

                                </span>
                            </span>
                        </span>
                </div>-->
                <!--<div class="tab-lists">-->
                    <!--<div class="tab-list">-->
                        <!--<span>未评估</span>-->
                        <!--<table class="wl-projects-table ">-->
                            <!--<thead class="wl-projects-table__head">-->
                            <!--<tr class="wl-projects-table__row">-->
                                <!--<th class="wl-projects-table__name-info js-sort-table" data-sort="name">名称</th>-->
                                <!--<th class="wl-projects-table__info js-sort-table" data-sort="hype">类型</th>-->
                                <!--<th class="wl-projects-table__info js-sort-table" data-sort="risk">热度</th>-->
                                <!--<th class="wl-projects-table__info js-sort-table" >风险</th>-->
                                <!--<th class="wl-projects-table__info js-sort-table" data-sort="depth">深度评估</th>-->
                                <!--<th class="js-sort-table" data-sort="start">价格(￥)</th>-->
                                <!--<th class="js-sort-table js-sort-table_price" data-sort="end" title="当前市值">当前市值(￥)</th>-->
                                <!--<th class="js-sort-table js-sort-table_price" title="预估半年市值">预估市值(￥)</th>-->
                                <!--<th class="wl-projects-table__info wl-projects-table__investment-info js-sort-table" data-sort="potential" title="预估半年潜力">预估潜力</th>-->
                                <!--<th class="">交易所</th>-->
                                <!--<th class="">管理</th>-->
                            <!--</tr>-->
                            <!--</thead>-->
                            <!--<tbody class="wl-projects-table__body1">-->

                            <!--<?php foreach($res as $vu){ ?>-->
                            <!--<tr class="wl-projects-table__row">-->
                                <!--<td class="wl-project-name js-sort-class-name" style="background-image:url('<?= C('READ_PATH').$vu['logo_path']; ?>')"><?= $vu['currency_name']; ?></td>-->
                                <!--<td class="wl-project-hypeScore js-sort-class-hype">-->
                                    <!--<div class="wl-project-wrapper"><?php if($vu['project_type']==1){echo "上层应用";}elseif($vu['project_type']==2){echo "协议层";}else{echo "底层系统";} ?></div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-riskScore js-sort-class-risk">-->
                                    <!--<div class="wl-project-wrapper"><?php if($vu['ishot']==1){echo "高";}elseif($vu['ishot']==2){echo "中";}else{echo "低";} ?></div>-->
                                <!--</td>-->

                                <!--<td class="wl-project-riskScore js-sort-class-risk">-->
                                    <!--<div class="wl-project-wrapper"><?php if($vu['risk_score']==1){echo "高";}elseif($vu['risk_score']==2){echo "中";}else{echo "低";} ?></div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-investScore js-sort-class-potential">-->
                                    <!--<div class="wl-project-wrapper">-->
                                        <!--<div class="wl-project-investScore__value"><?php if($vu['assessment']=='A'){echo "A（投资级）";}elseif($vu['assessment']=='B'){echo "B（投资级）";}elseif($vu['assessment']=='C'){echo "C（投资级）";}elseif($vu['assessment']=='D'){echo "D（投机级）";}else{echo "E（投机级）";} ?></div>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-rating js-sort-class-depth">-->
                                    <!--<div class="wl-project-wrapper">-->
                                        <!--<div class="wl-project-rating__value" title="<?php if($vu['last_updated']==0){echo '暂无';}else{echo '更新时间:'.date('Y-m-d H:i:s', $vu['last_updated']);} ?>">-->
                                            <!--<span><?php if($vu['price_cny']==0){ echo "暂无";}else{echo number_format($vu['price_cny'],2,'.',',');} ?></span>-->
                                            <!--&lt;!&ndash;<div class="wl-project-whiteBook"></div>&ndash;&gt;-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-date js-sort-class-start">-->
                                    <!--<div class="wl-project-wrapper">-->
                                        <!--<div class="wl-project-date__start" title="<?php if($vu['last_updated']==0){echo '暂无';}else{echo '更新时间:'.date('Y-m-d H:i:s', $vu['last_updated']);} ?>">-->
                                            <!--<div class="wl-project-date__value"><?php if($vu['market_cap_cny']==0){echo "暂无";}else{echo number_format(FormatMoney($vu['market_cap_cny']),1,'.',',').'亿';} ?></div>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-date js-sort-class-end">-->
                                    <!--<div class="wl-project-wrapper">-->
                                        <!--<div class="wl-project-date__end">-->
                                            <!--<div class="wl-project-date__value"><?= number_format($vu['emarket'],1,'.',',').'亿'; ?></div>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-price">-->
                                    <!--<div class="wl-project-wrapper">-->
                                        <!--<div class="wl-project-date__end">-->
                                            <!--<div class="wl-project-date__value"><?php if($vu['market_cap_cny']==0){echo "暂无";}else{echo number_format($vu['emarket']/FormatMoney($vu['market_cap_cny']),1,'.',',').'倍';} ?></div>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-links">-->
                                    <!--<div class="wl-project-wrapper">-->
                                        <!--&lt;!&ndash;<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('../images/indexImg/rating1_selected.png')" target="_blank"></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('images/twitter-icon.png')" target="_blank"></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('images/twitter-icon.png')" target="_blank"></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('images/twitter-icon.png')" target="_blank"></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('images/twitter-icon.png')" target="_blank"></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('images/twitter-icon.png')" target="_blank"></a>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<a href="http://www.baidu.com" class="wl-project-link" style="background-image:url('images/twitter-icon.png')" target="_blank"></a>&ndash;&gt;-->
                                        <!--<?php foreach(json_decode($vu['exchange']) as $value){ foreach($logo as $lg){ if($lg['keyword']==explode('.',$value)[1]){ ?>-->
                                        <!--<a href="<?= $value; ?>" class="wl-project-link" title="<?= explode('.',$value)[1]; ?>" style="background-image:url('<?= C('READ_LOGO').$lg['logo_adress']; ?>')"></a>-->
                                        <!--<?php }}} ?>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <!--<td class="wl-project-logo">-->
                                    <!--<div class="logoManage">-->
                                        <!--<span><a href="<?= U('Admin/Admin/upd',array('currency_id'=>$vu['currency_id']),false); ?>">更新</a></span>-->
                                        <!--<span><a href="<?= U('Admin/Admin/del',array('currency_id'=>$vu['currency_id']),false); ?>">删除</a></span>-->
                                    <!--</div>-->
                                <!--</td>-->
                            <!--</tr>-->
                            <!--<?php } ?>-->

                            <!--</tbody>-->

                        <!--</table>-->
                    <!--</div>-->
                <!--</div>-->
            </div>

            <div style="display: none" class="content-project addProject">
                <form action="/index.php/Admin/Admin/add" method="post" enctype="multipart/form-data">
                    <div class="main-container">
                        <div class="main-container-title">添加项目</div>

                        <div class="main-container-top">
                            <div class="main-project-name">
                                <span>项目名称</span>
                                <input type="text" name="currency_name" class="proName">
                            </div>
                            <div class="main-project-name">
                                <span>github名称</span>
                                <input type="text" name="project_name" class="allName">&nbsp;<tishi>需要爬取数据的GitHub地址后缀 如:https://github.com/bitcoin中的bitcoin</tishi>
                            </div>
                            <div class="main-project-currency">
                                <span>币种名称</span>
                                <input type="text" name="currency" class="currency">&nbsp;<tishi>正确填写获取接口数据(当前价格和当前市值) 如:BTC为项目bitcoin</tishi>
                            </div>
                            <div class="main-project-introduction">
                                <span>项目简介</span>
                                <input type="text" name="introduction" class="introduction">
                            </div>
                            <div class="main-project-logo">
                                <span>项目logo</span>
                                <div class="main-project-logoBox">
                                    <div id="preview">
                                        <img id="imghead"  border=0 src='/Public/Admin/images/indexImg/setting.png'>
                                    </div>
                                    <div class="fileInputContainer">
                                        <input type="file" class="fileInput" name="logo_path" onchange="previewImage(this)" />
                                    </div>
                                </div>
                            </div>
                            <!--<div class="main-project-type">-->
                                <!--<span>项目类型</span>-->
                                <!--<div>-->
                                    <!--<label for="proType1" class="proType">上层应用<input id="proType1" type="radio" name="project_type" value="1" ></label>-->
                                    <!--<label for="proType2" class="proType">协 议 层<input id="proType2" type="radio" name="project_type" value="2" ></label>-->
                                    <!--<label for="proType3" class="proType">底层系统<input id="proType3" type="radio" name="project_type" value="3" ></label>-->
                                <!--</div>-->
                            <!--</div>-->
                        </div>

                        <div class="main-container-bottom">
                            <div>
                                <span class="project-titleName">项目热度</span>
                                <div class="container-bottom-right main-project-hot">
                                    <label for="proHot1" class="proHot">高<input id="proHot1" type="radio" name="ishot" value="1"></label>
                                    <label for="proHot2" class="proHot">中<input id="proHot2" type="radio" name="ishot" value="2"></label>
                                    <label for="proHot3" class="proHot">低<input id="proHot3" type="radio" name="ishot" value="3"></label>
                                    <label for="proHot4" class="proHot">暂无<input id="proHot4" type="radio" name="ishot" value="4"></label>
                                </div>
                            </div>
                            <div>
                                <span class="project-titleName">项目风险</span>
                                <div class="container-bottom-right main-project-risk">

                                    <label for="proRisk1" class="proRisk">高<input id="proRisk1" type="radio" name="risk_score" value="1"></label>

                                    <label for="proRisk2" class="proRisk">中<input id="proRisk2" type="radio" name="risk_score" value="2"></label>

                                    <label for="proRisk3" class="proRisk">低<input id="proRisk3" type="radio" name="risk_score" value="3"></label>

                                    <label for="proRisk4" class="proRisk">暂无<input id="proRisk4" type="radio" name="risk_score" value="4"></label>
                                </div>
                            </div>
                            <div>
                                <span class="project-titleName">深度评估</span>
                                <div class="container-bottom-right main-project-deepRating">
                                    <label for="proDeepRating1" class="proDeepRating">A（投资级）<input id="proDeepRating1" type="radio" name="assessment" value="A"></label>

                                    <label for="proDeepRating2" class="proDeepRating">B（投资级）<input id="proDeepRating2" type="radio" name="assessment" value="B"></label>

                                    <label for="proDeepRating3" class="proDeepRating">C（投资级）<input id="proDeepRating3" type="radio" name="assessment" value="C"></label>

                                    <label for="proDeepRating4" class="proDeepRating">D（投机级）<input id="proDeepRating4" type="radio" name="assessment" value="D"></label>

                                    <label for="proDeepRating5" class="proDeepRating">E（投机级）<input id="proDeepRating5" type="radio" name="assessment" value="E"></label>

                                    <label for="proDeepRating6" class="proDeepRating">未评估<input id="proDeepRating6" type="radio" name="assessment" value="F"></label>
                                </div>
                            </div>
                            <!--<div>-->
                                <!--<span class="project-titleName">深度评估报告</span>-->
                                <!--<div class="container-bottom-right main-project-ratingBook">-->
                                    <!--<div class="upload">-->
                                        <!--<input type="file" class="uploadInput">-->
                                        <!--<img src="/Public/Admin/images/indexImg/text.png"/>-->
                                        <!--<span>点击上传</span>-->
                                    <!--</div>-->

                                    <!--&lt;!&ndash;<div class="ratingBook-operation">&ndash;&gt;-->
                                    <!--&lt;!&ndash;<span class="operation">预览</span>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class="operation-split"></div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<span class="operation">下载</span>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class="operation-split"></div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<span class="operation">删除</span>&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div>-->
                                <!--<span class="project-titleName">市值(￥)</span>-->
                                <!--<div class="container-bottom-right">-->
                                    <!--<input type="text" class="marketValue" name="marketValue">-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div>-->
                                <!--<span class="project-titleName">当前价格(￥)</span>-->
                                <!--<div class="container-bottom-right">-->
                                    <!--<input type="text" class="curPrice" name="curPrice">-->
                                <!--</div>-->
                            <!--</div>-->
                            <div>
                                <span class="project-titleName">预估市值</span>
                                <div class="container-bottom-right">
                                    <input type="text" class="estimatePrice" name="emarket">
                                </div>
                            </div>
                            <!--<div>-->
                                <!--<span class="project-titleName">预估潜力</span>-->
                                <!--<div class="container-bottom-right main-project-potential">-->

                                    <!--<label for="proPotential1" class="proPotential">高<input id="proPotential1" type="radio" name="proPotential" value="高"></label>-->

                                    <!--<label for="proPotential2" class="proPotential">中<input id="proPotential2" type="radio" name="proPotential" value="中"></label>-->

                                    <!--<label for="proPotential3" class="proPotential">低<input id="proPotential3" type="radio" name="proPotential" value="低"></label>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div style="display: flex">-->
                                <!--<span class="project-titleName">交易所</span>-->
                                <!--<div style="flex: 1" class="container-bottom-right">-->
                                    <!--<div class="ExchangeBox"><div class="Exchange">-->
                                        <!--&lt;!&ndash; <div class="main-project-logoBox">-->
                                             <!--<div id="preview1">-->
                                                 <!--<img src="../images/indexImg/link.png" id="imghead1"  class="ExchangeLink"/>-->
                                             <!--</div>-->
                                             <!--<div class="fileInputContainer1" >-->
                                                 <!--<input type="file" class="fileInput1" name="linksImg" onchange="previewImage1(this)" />-->
                                             <!--</div>-->
                                         <!--</div>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<img src="../images/indexImg/link.png" id="imghead1"  class="ExchangeLink"/>&ndash;&gt;-->
                                        <!--<label class="linkAddress">链接地址:</label><input type="text" class="linkFocus" name="exchange[]">-->
                                        <!--&lt;!&ndash;<img class="deleteExchange" src="/Public/Admin/images/indexImg/delete.png"/>&ndash;&gt;-->
                                    <!--</div>-->
                                    <!--</div>-->
                                    <!--<input type="button" class="addExchange" value="+添加交易所">-->

                                <!--</div>-->

                            <!--</div>-->
                            <!--<div>-->
                                <!--<span class="project-titleName">项目状态</span>-->
                                <!--<div class="container-bottom-right RatingStatus">-->

                                    <!--<label for="proRatingStatus1" class="proRatingStatus">已评估<input id="proRatingStatus1" type="radio" name="state" value="1"></label>-->
                                    <!--<label for="proRatingStatus2" class="proRatingStatus">未评估<input id="proRatingStatus2" type="radio" name="state" value="2"></label>-->
                                <!--</div>-->
                            <!--</div>-->
                        </div>

                        <div class="project-info-operation">
                            <span></span>
                            <div class="info-operation">
                                <input type="reset" value="取消">
                                <input type="submit" value="保存" onclick="return postComment()">
                            </div>
                        </div>

                    </div>
                </form>
            </div>

         <!--   <div style="display: none" class="content-project EvaluatedStandard">
                <div class="main-container">
                    <div class="main-container-title">评估标准设置</div>
                    <div class="Standard-project Standard-project-type">
                        <span>
                            <div class="project-typeBorder"></div>
                            <span class="project-textType">项目类型</span>
                        </span>

                        <div class="Standard-project-typeSet">
                            <div class="project-selectSet">
                                <input type="button" value="底层系统">
                                <input type="button" value="协议层">
                                <input type="button" value="上层应用">
                            </div>
                            <div class="project-operationSet">
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_add.png" alt="">
                                    添加类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_reduce.png" alt="">
                                    删减类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_delete.png" alt="">
                                    删除本条
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="Standard-project Standard-project-hot">
                        <span>
                            <div class="project-typeBorder"></div>
                            <span class="project-textType">项目热度</span>
                        </span>

                        <div class="Standard-project-typeSet">
                            <div class="project-selectSet">
                                <input type="button" value="高">
                                <input type="button" value="中">
                                <input type="button" value="低">
                            </div>
                            <div class="project-operationSet">
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_add.png" alt="">
                                    添加类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_reduce.png" alt="">
                                    删减类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_delete.png" alt="">
                                    删除本条
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="Standard-project Standard-project-potential">
                        <span>
                            <div class="project-typeBorder"></div>
                            <span class="project-textType">投资潜力</span>
                        </span>

                        <div class="Standard-project-typeSet">
                            <div class="project-selectSet">
                                <input type="button" value="高">
                                <input type="button" value="中">
                                <input type="button" value="低">
                            </div>
                            <div class="project-operationSet">
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_add.png" alt="">
                                    添加类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_reduce.png" alt="">
                                    删减类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_delete.png" alt="">
                                    删除本条
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="Standard-project Standard-project-deep">
                        <span>
                            <div class="project-typeBorder"></div>
                            <span class="project-textType">深度评估</span>
                        </span>

                        <div class="Standard-project-typeSet">
                            <div class="project-selectSet">
                                <input type="button" value="A(投资级)">
                                <input type="button" value="B(投资级)">
                                <input type="button" value="C(投资级)">
                                <input type="button" value="D(投机级)">
                                <input type="button" value="E(投机级)">
                            </div>
                            <div class="project-operationSet">
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_add.png" alt="">
                                    添加类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_reduce.png" alt="">
                                    删减类型
                                </span>
                                <span>
                                    <img src="/Public/Admin/images/ratingImg/rating_delete.png" alt="">
                                    删除本条
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="Standard-project Standard-project-add">
                        <span class="project-addStandard">
                             <img src="/Public/Admin/images/ratingImg/rating_added.png" alt="">
                            添加评估标准
                        </span>
                    </div>
                </div>
            </div>-->

            <div style="display: none" class="content-project logoIconManage">
                <div class="main-container">
                    <div class="main-logoMan">
                        <div class="main-container-title newIcon">图标管理</div>
                        <div class="addNewIcon">
                            <span class="addNewIconImg">+添加新图标</span>
                            <div class="addNewIconBox">
                                <div class="addNewImgArrow"></div>
                                <form action="/index.php/Admin/Admin/add_logo" method="post" enctype="multipart/form-data">
                                   <!-- <div class="IconNameImg">
                                        <input type="text" class="NewIconName" placeholder=" 添加新图标输入名称" name="keyword">
                                        <input type="file" class="NewIconImg" name="logo_adress" id="uploadFile">
                                        <div class="NewIconUpload">上传图片文件（悬停显示文件名）</div>
                                    </div>
                                    <div class="NewIconOperation">
                                        <input type="reset" value="关闭" class="addIconCancel">
                                        <input type="button" value="确定" class="addIconSubmit">
                                    </div>-->
                                    <div class="IconNameImg">
                                        <input type="text" class="NewIconName" placeholder=" 添加新图标输入名称" name="keyword" >
                                        <input type="file" class="NewIconImg" name="logo_adress">
                                        <div class="NewIconUpload">上传图片文件（悬停显示文件名）</div>
                                    </div>
                                    <div class="NewIconOperation">
                                        <input type="reset" value="关闭" >
                                        <input type="submit" value="确定" >
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="logoCounts">
                        <thead>
                        <tr class="logoCountsTitle">
                            <th>序号</th>
                            <th>名称</th>
                            <th>logo</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <?php foreach($logo as $k =>$lv){ ?>
                        <tr class="logoCountsContent">
                            <td><?= $k+1; ?></td>
                            <td><?= $lv['keyword']; ?></td>
                            <td>
                                <img src="<?= C('READ_PATH').$lv['logo_adress']; ?>"/>
                            </td>
                            <td>
                                <div class="logoOperation">
                                    <span class="logoOperationUpdate">更新</span>
                                    <span><a href="<?= U('Admin/Admin/del_logo',array('id'=>$lv['id']),false); ?>">删除</a></span>
                                </div>
                            </td>
                            <td class="addNewIconUpload">
                                <div class="addNewIconArrow"></div>
                                <form action="/index.php/Admin/Admin/upd_logo" method="post" enctype="multipart/form-data">
                                    <div class="IconNameImg">
                                        <input type="hidden" name="id" value="<?= $lv['id']; ?>">
                                        <input type="text" class="NewIconName" value="<?= $lv['keyword']; ?>" placeholder="<?= $lv['keyword']; ?>">
                                        <input type="file" class="NewIconImg uploadFile">
                                        <div class="NewIconUpload">上传图片文件（悬停显示文件名）</div>
                                    </div>
                                    <div class="NewIconOperation">
                                        <input type="reset" value="关闭" class="addIconCancel">
                                        <input type="submit" value="确定" class="addIconSubmit">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</body>


<script type="text/javascript">
//    <!--更换logo函数-->
    function previewImage(file)
    {
        var MAXWIDTH  = 100;
        var MAXHEIGHT = 100;
        var div = document.getElementById('preview');
        if (file.files && file.files[0])
        {
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            var reader = new FileReader();
            reader.onload = function(evt){img.src = evt.target.result;};
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";
        }
    }
 /*   function previewImage1(file)
    {
    var MAXWIDTH  = 100;
    var MAXHEIGHT = 100;

    var div1 = document.getElementById('preview1');
    if (file.files && file.files[0])
    {

        div1.innerHTML = '<img id=imghead1>';

        var img1 = document.getElementById('imghead1');

        var reader1 = new FileReader();

        reader1.onload = function(evt){img1.src = evt.target.result;};

        reader1.readAsDataURL(file.files[0]);
    }
    else
    {
        var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
        file.select();
        var src = document.selection.createRange().text;

        div1.innerHTML = '<img id=imghead1>';

        var img1 = document.getElementById('imghead1');

        img1.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
        var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
        status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);

        div1.innerHTML = "<div id=divhead1 style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";
    }
}
*/
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){
        var param = {top:0, left:0, width:width, height:height};
        if( width>maxWidth || height>maxHeight )
        {
            rateWidth = width / maxWidth;
            rateHeight = height / maxHeight;
            if( rateWidth > rateHeight )
            {
                param.width =  maxWidth;
                param.height = Math.round(height / rateWidth);
            }else
            {
                param.width = Math.round(width / rateHeight);
                param.height = maxHeight;
            }
        }
        param.left = Math.round((maxWidth - param.width) / 2);
        param.top = Math.round((maxHeight - param.height) / 2);
        return param;
    }

//判断语句（添加项目）
function postComment() {
    var proName = $('.proName').val();
    var currency = $('.currency').val();
    var introduction = $('.introduction').val();


    if(proName == ''){
        alert('项目名称不能为空');
        return false;
    }else if(currency == ''){
        alert('币种名称不能为空');
        return false;
    }else if(introduction == ''){
        alert('公司简介不能为空');
        return false;
    }
    //验证url网址


    var linkFocusS =$('.linkFocus');
    for(var i = 0;i<linkFocusS.length;i++){
        if(linkFocusS[i].value) {
            var str=linkFocusS[i].value;
            var Expression=/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
            var objExp=new RegExp(Expression);

            if(objExp.test(str) != true){

                alert("有网址格式错误！请检查");
                return false;
            }

        }
    }

}
</script>

</html>