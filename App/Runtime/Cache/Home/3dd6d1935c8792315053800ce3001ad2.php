<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>未来链项目详情</title>
    <link rel="shortcut icon" href="/Public/Home/images/titlelogo.icon"  type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/css/index.css">
    <link rel="stylesheet" href="/Public/Home/css/router.css">
    <link rel="stylesheet" href="/Public/Home/css/pages.css">
    <link rel="stylesheet" href="/Public/Home/css/ratingModel.css">
    <link rel="stylesheet" href="/Public/Home/css/wechat.css">
    <link rel="stylesheet" href="/Public/Home/css/wechat2.css">
    <link rel="stylesheet" href="/Public/Home/css/wechat3.css">

</head>
<body>

<div class="wl-layout" style="min-height:100%;background: #eaeaea;">
    <div class="mainCon">
        <div class="wl-header">
    <div class="wl-layout-container container">
        <div class="row">
            <div class="wl-header-wrapper col-xs-12">
                <a class="wl-header-brand" href="<?= U('Home/Index/index'); ?>" title="返回首页"><img src="/Public/Home/images/headerImg/logo.png" alt="返回首页"></a>
                <div class="wl-header-links">
                    <div class="wl-header-links__wrapper">
                        <a class="project_code" href="http://www.chaindc.com/index.php/Home/index/codeStatus" target="_blank"><span><div class="hidden-xs ratingDrop">项目进度</div></span></a>
                        <div class="wl-header-links__link wl-header-links__link--rating">
                            <div class="hidden-xs ratingDrop">评级模型</div>
                            <div class="ratingBox">
                                <span class="ratingArrow"></span>
                                <ul class="ratingContent">
                                    <li><a href="#/growUp1">ChainDC萌芽版 V1.0</a></li>
                                    <li><a href="#/growUp2">ChainDC成长版 V1.0</a></li>
                                    <!--<li><a href="#/growUp3">ChainDC成长版 V3.0</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <a class="wl-header-links__link wl-header-links__link--services" href="#/services">
                            <div class="hidden-xs">服务</div>
                        </a>
                        <a class="wl-header-links__link wl-header-links__link--about" href="#/about">
                            <div class="hidden-xs">关于我们</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!--每条数据的分页替换模板-->
        <div class="wl-project-pages">
            <div class="container">
                <div class="wl-project-pages_mainPart">
                    <div class="project-pages_mainPart_top">
                        <div class="project-pages_mainPart_top_left">
                            <div class="projectLogo">
                                <img src="<?= C('READ_PATH').$result['logo_path'];?>" alt="">
                            </div>
                            <div class="projectName"><?= $result['currency_name'];?></div>
                        </div>

                        <div class="project-pages_mainPart_top_right">
                            <div class="projectGrade">
                                <span class="projectDeepGrade">深度评级 ：</span>
                                <span class="projectGrade-"><?= $result['assessment'];?></span>
                            </div>
                            <!--<div class="projectUpLode">-->
                                <!--<img src="/Public/Home/images/download.png" alt="">-->
                                <!--<span>下载完整报告</span>-->
                            <!--</div>-->
                        </div>

                    </div>
                    <div class="pages_mainPart_bottom">
                        <table>
                            <th>总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;览</th>

                            <!--<tr>-->
                            <!--<td>项目类型：</td>-->
                            <!--<td><?php if($result['project_type']==1){echo "上层应用";}elseif($result['project_type']==2){echo "协议层";}else{echo "底层系统";}?></td>-->
                            <!--</tr>-->
                            <tr>
                                <td>风险评分：</td>
                                <td><?php if($result['risk_score']==1){echo "高";}elseif($result['risk_score']==2){echo "中";}else{echo "低";}?></td>
                            </tr>
                            <tr>
                                <td>投资潜力：</td>
                                <td><?= $result['multiple'];?>倍</td>
                            </tr>
                            <tr>
                                <td>市 值：</td>
                                <td><?= number_format($result['market'],1,'.',',');?>亿</td>
                            </tr>
                            <tr>
                                <td>摘 要：</td>
                                <td><?= $result['introduction']; ?></td>
                            </tr>
                            <tr>
                                <td>成 立：</td>
                                <td><?= $result['set_up']; ?></td>
                            </tr>
                            <tr>
                                <td>官 网：</td>
                                <td><a href="http://<?= $result['web'];?>"><?= $result['web'];?></a></td>
                            </tr>
                            <!--<tr>-->
                                <!--<td>社交链接：</td>-->
                                <!--<td>-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/twitter-icon.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/twitter-icon.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/twitter-icon.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/twitter-icon.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                <!--</td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                                <!--<td>交 易 所：</td>-->
                                <!--<td>-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/golos.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/golos.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/golos.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<a href="#"><img src="/Public/Home/images/golos.png" alt="" class="linksImg"></a>&ndash;&gt;-->
                                <!--</td>-->
                            <!--</tr>-->
                        </table>
                    </div>
                </div>

                <div class="wl-project-pages_introduce">
                    <div class="project-pages_introduce_tabBox">
                        <div class="project-pages_introduce_tab project-pages_introduce_tab_active">项目详情</div>
                        <!--<div class="project-pages_introduce_tab" >应用场景</div>-->
                        <!--<div class="project-pages_introduce_tab" >技术概要</div>-->
                        <!--<div class="project-pages_introduce_tab" >团队介绍</div>-->
                    </div>
                    <div class="project-pages_introduce_contentTotal">
                        <div class="project-pages_introduce_content project-pages_introduce_content-details">
                            <!--<div class="project-pages_introduce_content-details_top">-->
                            <!--<div class="row">-->
                            <!--<div class="col-md-2"><p>特点：</p></div>-->
                            <!--<div class="col-md-7">-->
                            <!--<p>—B2BX cryptocurrency流动性的聚合器边际交易,交易与实物交割和流动性分布的经纪公司。</p>-->
                            <!--<p>—B2BX将只关注机构客户:股市和crypto-exchanges,外汇和DMA经纪人,cryptocurrency经纪人和交换机、对冲基金和其他专业的市场参与者。</p>-->
                            <!--<p>—所有的参与者将由交易所和金融监管机构控制。</p>-->
                            <!--<p>—B2BX将提供评级的经纪人和作为瓜拉</p>-->
                            <!--</div>-->
                            <!--<div class="col-md-3"></div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="project-pages_introduce_content-details_bottom">-->
                            <!--<div class="row">-->
                            <!--<div class="col-md-2"></div>-->
                            <!--<div class="col-md-7">-->
                            <!--<p>最新消息</p>-->
                            <!--<table>-->
                            <!--<tr>-->
                            <!--<td class="project-pages_introduce_content-details_bottom_tdImg"><img src="/Public/Home/images/sonm.png" alt=""></td>-->
                            <!--<td>-->
                            <!--<p>Crystal Clear Services@crystal clear services</p>-->
                            <!--<p>Another exchange have listed @CCS_Crystal CCT token! CCT tokens now tradable on https://t.co/mUcKDYCrLI exchange https://t.co/e96zR3qUWF</p>-->
                            <!--<p>Sep 19</p>-->
                            <!--</td>-->
                            <!--<td><img src="/Public/Home/images/twitter-icon.png" alt=""></td>-->
                            <!--</tr>-->
                            <!--</table>-->
                            <!--</div>-->
                            <!--<div class="col-md-3"></div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <?= html_entity_decode($result['d_assessment']);?>
                        </div>
                        <div class="project-pages_introduce_content project-pages_introduce_content-scene"><?= $result['scene'];?></div>
                        <div class="project-pages_introduce_content project-pages_introduce_content-general"><?= $result['general'];?></div>
                        <div class="project-pages_introduce_content project-pages_introduce_content-team"><?= $result['team'];?></div>
                    </div>
                </div>

                <!--pages foot-->
                <!-- <div class="wl-project-pages_foot">
                     <div class="container">
                         <span>免责声明:</span>链调查是一家区块链第三方评级机构，链调查的评估仅供教育的目的,不是法律或金融的建议。与这些项目有关的任何问题将与链调查无关。感谢您使用链调查。
                     </div>
                 </div>-->
            </div>
        </div>
        <!--SPA替换标签-->
        <!--评估模型-->
<div class="growUpOne" style="display: none">
    <div class="container growUp">
        <div class="growUpMain">
            <div class="growUpTitle">
                <span>区块链评级模型ChainDC萌芽版 V1.0</span>
            </div>
            <div class="growUp1Intro">
                <p>我们已经给出了适用于成长期区块链项目评级的ChainDC成长版，现在推出ChainDC萌芽版。顾名思义，ChainDC萌芽版适用于萌芽期的区块链项目的评级。由于生命周期的不同，对成长期项目和萌芽期项目的测评，除了一些公共的维度外，还会有一些不同的维度。</p>
                <p>简单言之，例如在ChainDC成长版中，由于成长期的项目均已上线二级市场，因此我们可以直接的通过项目Token的交易所支持情况和价值稳定性来考察其市场项评分。但对萌芽期项目，由于大多数Token还未自由流通，因此自然原方法就行不通。</p>
                <p>同样道理，对于尚处萌芽期的项目，其由于还缺乏有效的观察时间，因此难以从里程碑完成情况上来考察团队的履约能力。</p>
                <p>ChainDC萌芽版的考察，将沿用部分SmartIC0的考察方式，如考察萌芽期的已有进度、考察是否有资金监管等。而同时，根据萌芽期项目的特点，我们考察其在萌芽期的实际进度，作为评判该项目质量的一个因素。并考虑到萌芽期项目通常会通过融资来获得运作资金，我们会考量其资金融资合理性、预算合理性、后续资金使用的监管有效性等。</p>
                <p>代币系统是区块链项目最大的魅力所在，不同与常规的项目，代币经济体系常贯穿于区块链项目的整个生命周期，因此代币经济体系的闭环完整性、内在价值推动性等，自然也在我们的考虑之列。</p>
                <p>而跟ChainDC成长版一致的是，我们依然会考察项目的热度和风险，且此二者依然作为独立维度的形式给出。也即会给出该二维度的评判，但评判结果独立给出，不融合到最终得分中。</p>
            </div>
            <div class="imgCon">
                <p>以下是ChainDC萌芽版 V1.0的详细结构图：</p>
                <div class="img_span">
                    <img src="/Public/Home/images/headerImg/mengy1.png" alt="" style="width: 100%">
                    <div class="mengya_title"  style="text-align: center;margin-bottom: 15px">
                        <span style="color: gray;font-size: 12px;border-bottom: 1px solid #ddd;padding: 10px;">ChainDC萌芽版 V1.0详细结构图</span>
                    </div>
                </div>
                <p>下面，我们直接进入ChainDC萌芽版 V1.0：</p>
                <hr>
            </div>
            <div class="MYPro">
                <p style="font-size: 20px;font-weight: bold">项目 （30%权重）</p>
                <p style="line-height: 50px;background-color: #f7f7f7;border-left: 4px solid gray;padding-left: 20px">该维度与ChainDC成长版一致</p>
                <p>从最开始的SmartIC0到现在，我们评测一个项目最首要关心的就是项目本身，这一点到现在依然不变。</p>
                <p style="font-weight: bold">1.1 【60分】战略定位</p>
                <p>
                    <span style="font-weight: bold"> 没有应用的生态，总归是毫无价值的。技术应当为应用服务，光谈底层和协议的生态，是迷失了方向的。</span>这一点我很认同，但当前区块链生态的实际情况是：底层和协议层尚不够完善，区块链大厦的根基还不足以支撑优秀上层应用的发展。
                </p>
                <p>区块链世界当前来到了黎明前的黑暗——底层设施在黑夜里如火如荼的开工建设，杀手级的应用却即将到来的朝阳，虽然它的到来是确定的，但现在的准备条件下，它确实还难以到来。</p>
                <p style="font-weight: bold">基于现阶段的形式，我们在战略定位这一维度，会较为看重那些关注于现阶段底层设施和中间层协议的区块链项目，对于定位为上层应用的项目，当前还无法给其太高的打分。</p>
                <p>我们会将项目的战略定位，划分为如下三个类型，并分别给出每个类型的得分。</p>
                <p>【0-60分】 - 底层设施</p>
                <p>我们认为，考虑到当前区块链生态的实际情况，底层设施类型的区块链项目最高可以获得60分，但实际的分数要根据项目的自身情况，并在行业需求的动态变化中来进行评判。</p>
                <p>举一个简单的例子，当前以以太坊为代表的区块链2.0应用普遍存在吞吐量过低的问题，所以如果某项目能有效解决此问题，那它可以在本维度得一个较高分。</p>
                <p>【0-60分】 - 中层协议</p>
                <p>但同样，盲目的鼓励底层设施的项目，这是不应该的。应当明确的是，当前区块链生态的中层协议和底层设施的建设，同样不健全。对于定位为成为区块链基础设施和上层应用间的轴承、或者说业务中间件的中层协议，其最高分亦可以获得60分，实际分数这也依赖于对项目自身情况的判断。</p>
                <p>同样一个例子，当前公链数目较多，很多不同公链之间差异很小。而如此多的公链，将用户分散为多个群体，不利于生态的发展。因此在当前阶段，跨链类型的协议，我们会给一个较高分，因为它有望彻底解决盘根错杂的各类公链群雄割据的局面。</p>
                <p>【0-30分】 - 上层应用</p>
                <p>如前文所述，在当前区块链中低层设施并不完善的现状下，我们并不十分认可那些专注于用区块链解决上层实际应用的项目。一定程度上我们认为，现在的区块链技术还很难有效的支撑上层的大规模应用。基于此，我们给出上层应用类型项目在本维度最高30分的限制。</p>
                <p style="font-weight: bold">1.2 项目必要性</p>
                <p>项目其存在的必要性，也是我们重点考量的。我们依据于区块链其最大的价值：去中心化和不可篡改性，根据项目的定位，结合目标场景对区块链的需求程度，评估出该项目的存在必要性。</p>
                <p>下文是我们划分的从高到低的三个梯度，每个梯度下方列出了满足该标准的判定标准（对于后两个维度，其判定标准中一个隐含条件是不满足上一个梯度的判定标准）：</p>
                <p>【20-40分】 - 十分必要</p>
                <ul>
                    <li>能极大提高原有行业的效率；</li>
                    <li>能颠覆原有行业的格局；</li>
                    <li>能催生新的行业。</li>
                </ul>
                <p>【10-20分】 - 一般必要</p>
                <ul>
                    <li>能一定程度提升原有行业的效率或者流通性；</li>
                    <li>能有望对原有行业格局造成影响。</li>
                </ul>
                <p>【0-10分】 - 无必要</p>
                <ul>
                    <li>该项目仅仅用于融资；</li>
                    <li>该项目无法对现有行业造成影响；</li>
                    <li>该项目所基于的需求十分不确定。</li>
                </ul>
            </div>
            <hr>
            <div class="MYTeam">
                <p style="font-size: 20px;font-weight: bold">团队 （30%权重）</p>
                <p style="line-height: 50px;background-color: #f7f7f7;border-left: 4px solid gray;padding-left: 20px">该维度与ChainDC成长版一致</p>
                <p>所有项目，最大的不确定因素是做项目的人。团队这一块至关重要，这在包括SmartIC0在内的所有评级模型中，我们都深刻践行了这一点。</p>
                <p>但SmartIC0 V1.2中对团队的考量存在问题的是，我们会考察执行团队的学历背景，可是英雄不问出处，对于一些已经通过实际过往成功的项目经历、职业经历证明了自身能力的人，考察其学历背景还有什么意义？</p>
                <p>因此我们决定，放弃对学历的考察，转而仅关注其过往职业、项目背景。但不同于SmartIC0的是，我们除了考察其团队的技术背景，还会考察团队的运营背景及行业资源。</p>
                <p style="font-weight: bold">2.1 技术团队</p>
                <p>技术团队的考察，我们将从区块链开发经验和常规软件技术开发经验两个角度来考察，并考察是否同时具备此二经验。</p>
                <p style="font-weight: bold;font-size: 14px">2.1.1 区块链开发经验</p>
                <p>我们将区块链开发经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    <span>【10-15分】 - 主导过成功的区块链项目的开发</span> <br>
                    <span>【5-10分】 - 参与过区块链项目的开发</span> <br>
                    <span>【0-5分】 - 未提及或无</span>
                </p>
                <p style="font-weight: bold;font-size: 14px">2.1.2 软件技术开发经验</p>
                <p>同样，我们将软件技术开发经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    <span>【10-15分】 - 主导过成功的软件项目的开发</span> <br>
                    <span>【5-10分】 - 参与项目的开发</span> <br>
                    <span>【0-5分】 - 未提及或无</span>
                </p>
                <p style="font-weight: bold;font-size: 14px">2.1.3 是否同时具备区块链技术和软件技术开发经验</p>
                <p>
                    <span>【10分】 - 同时具备</span> <br>
                    <span>【0分】 - 不同时具备</span>
                </p>
                <p>由于是否同时具备区块链技术和软件技术开发经验，这是一个对立的问题，而且不存在取值范围一说。因此，具备即得满分，不具备则不得分。</p>
                <p style="font-weight: bold">2.2 运营团队</p>
                <p>对于运营团队这块，除了考察团队运营人员的过往职业、项目背景外，还会重点考察他们在项目相关行业的资源情况。</p>
                <p style="font-weight: bold;font-size: 14px">2.2.1 公司或项目运作经验</p>
                <p>我们将项目运作经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    <span>【10-15分】 - 运作过较为成功的商业公司或者项目</span> <br>
                    <span>【5-10分】 - 运作过一般的商业公司或项目，或在较为成功的商业公司担任重要职位</span> <br>
                    <span>【0-5分】 - 未提及或者无</span>
                </p>
                <p style="font-weight: bold;font-size: 14px">2.2.2 行业资源背景</p>
                <p>同样，我们将行业资源背景划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    <span>【10-15分】 - 丰富的相关行业资源或在相关行业巨头担任过要职</span> <br>
                    <span>【5-10分】 - 一定的相关行业资源或在相关行业公司有从业经历</span> <br>
                    <span>【0-5分】 - 未提及或者无</span>
                </p>
                <p style="font-weight: bold;font-size: 14px">2.2.3 是否同时具备公司或项目运作经验和行业资源背景</p>
                <p>
                    <span>【10分】 - 同时具备</span> <br>
                    <span>【0分】 - 不同时具备</span>
                </p>
                <p style="font-weight: bold">2.3 投资人（及顾问，以下略）</p>
                <p>投资人这块的考察，和SmartIC0基本无二，也即将投资人根据影响力、过往投资案例等划分为三个梯度。分别为：</p>
                <p>
                    <span>【15-20分】 - 顶级投资人</span> <br>
                    <span>【5-15分】 - 普通投资人</span> <br>
                    <span>【0-5分】 - 未提及或者无</span>
                </p>
            </div>
            <hr>
            <div class="MYProgress">
                <p style="font-size: 20px;font-weight: bold">当前进度 （10%权重）</p>
                <p>该维度作为一个评判萌芽期项目质量的有效手段，从SmartIC0 V1.1沿用至今，一直没有太多变化。从评测质量上看，当前本维度的划分较为合理，确实做到了有效提高优质项目得分的同时，有效降低了空气项目得分的效果。</p>
                <p>如果说有什么维度是最直接体现团队靠谱程度的，那我们想应该是项目的进度。唯一遗憾的是，不少项目在进行代币众筹时基本无进度、或者说进度很少，少到只有一份PPT或者白皮书——这也是近期诸多项目最让人诟病和质疑的地方。</p>
                <p>说再多，不如实际动手做。良好的进度除了能直接反应团队的执行力之外，还能直接反应项目的可行性。我们根据业内常规的项目历程，将一个萌芽期区块链项目划分为五个阶段，每个阶段有一个对应的分数。</p>
                <p>【0-20分】- PPT（白皮书）阶段</p>
                <ul>
                    <li>该阶段的显著特征是，项目尚未实际动工，通常仅有一份白皮书或者类似的PPT文档，白皮书中规划着预计将于什么时间节点，完成什么事情。</li>
                </ul>
                <p>【20-40分】- Demo阶段</p>
                <ul>
                    <li>该阶段的显著特征是，产品已经有了一个演示用的Demo，这个Demo还远不能用于生产，但可以用来展示一些基本的概念。</li>
                </ul>
                <p>【40-60分】- 持续开发中或小规模测试阶段</p>
                <ul>
                    <li>Demo阶段过后，通常就走到持续开发中。开发过程中可能视情况会一次获多次进行内部测试，但此时用于测试的版本通常离白皮书中所规划的最终形态还有一定差距，甚至不排除某些核心功能都还未能完整提供。</li>
                </ul>
                <p>【60-80分】- 公测或小规模商业化阶段</p>
                <ul>
                    <li>当项目已经基本实现白皮书中的规划，或者后续增加的新规划也基本实现完成。产品形态已经趋于完整，整个服务已经可以以公测的形式对外开放，或者已经公测完毕、正在逐步的接入部分需求，那么就进入了这个阶段。本阶段的到来，代表着项目不再是一纸空谈，它已经基本落地，正在等待商业的检验。</li>
                </ul>
                <p>【80-100分】- 已有大规模营收或实际利润阶段</p>
                <ul>
                    <li>这个阶段自然是我们最期望看到的阶段，也即项目不但成功推出，而且产生了实际利润。虽然当前利润或许还不能让人满意，但至少说明它已经为市场所初步认可。这说明关于它是否可行的各类猜疑都已经被击碎，它的团队也展示出强大的执行力和良好的信用。这应当是一个萌芽期区块链项目的最佳进度阶段，尽管至今好像也没有一个能达到此要求。</li>
                </ul>
            </div>
            <hr>
            <div class="community">
                <p style="font-size: 20px;font-weight: bold">社区治理 （30%权重）</p>
                <p>“去中心化”作为区块链项目的核心特征之一，去除了中心化的运作方式，该项目将运作于由无数持币者组成的社区生态之上。良好的社区治理机制及效果，成了对区块链项目不可或缺的考评指标。</p>
                <p style="font-weight: bold">4.1 融资及预算披露</p>
                <p>萌芽期项目通常会通过筹资的方式来获得运作资金，筹资的对象自然是社区。因此，筹资金额和需求的匹配性、以及预算的详细及合理性，是我们不得不考察的因素之一。</p>
                <p>我们将此二级维度划分为如下几个梯度：</p>
                <p>【20-30分】 - 融资额合理且预算详细</p>
                <ul>
                    <li>融资额与项目实际需求较为匹配，且所公布出的预算详尽细致，十分合理。</li>
                </ul>
                <p>【10-20分】 - 融资额相对略多或预算较为模糊</p>
                <ul>
                    <li>融资额略多于项目真实需求（但不超过两倍），或者所公布的预算比较粗略，核心的资金分配较为含糊。</li>
                </ul>
                <p>【0-10分】 - 融资额与需要明显不匹配，或预算极为含糊</p>
                <ul>
                    <li>融资额大大超出项目真实需求，有较大圈钱嫌疑，或者预算极为含糊和不合理。</li>
                </ul>
                <p style="font-weight: bold">4.2 资金监管</p>
                <p>筹资完成后，是否能有有效且透明的资金监管制度，也是衡量一个项目能否健康发展的重要指标之一。根据资金监管的有效性和透明度，我们将该二级维度划分为如下几个梯度：</p>
                <p>【20-30分】 - 完善的外部监管机制</p>
                <ul>
                    <li>项目的资金使用情况，委托给第三方会计所等外部审计机构进行监督和披露。</li>
                </ul>
                <p>【10-20分】 - 完善的内部监管机制</p>
                <ul>
                    <li>虽然，没有委托给第三方，但基金或团队已经制定了较为完善且成制度的自我监督和披露方案。</li>
                </ul>
                <p>【0-10分】 - 无有效监管机制</p>
                <ul>
                    <li>白皮书或官网未找到有效的资金使用监督机制，且团队也没有对此作出说明。</li>
                </ul>
                <p style="font-weight: bold">4.3 代币升值逻辑</p>
                <p>散户参与区块链项目的众筹，所获得的是项目方发放的权益凭证，即Token。因此，项目的社区生态设计，是否能形成闭环代币升值激励逻辑，成为该项目可投资性测评的核心因素之一。</p>
                <p>根据现实情况，我们将本维度划分为如下几个梯度：</p>
                <p>【20-40分】 - 清晰且有效</p>
                <ul>
                    <li>项目的代币激励闭环逻辑十分清晰，且预计将对代币价值产生有效的推动激励。</li>
                </ul>
                <p>【10-20分】 - 一般清晰或有效性难以估量</p>
                <ul>
                    <li>项目的代币激励闭环逻辑较为晦涩或者不显著，其对代币价值的激励，预期较难产生强大推动效果。</li>
                </ul>
                <p>【0-10分】 - 无明显升值推动逻辑</p>
                <ul>
                    <li>项目并没有设计出代币激励逻辑，没有提及，或者也根本无法预期。</li>
                </ul>
            </div>
            <hr>
            <div class="MYRisk">
                <p style="font-size: 20px;font-weight: bold">独立维度：风险</p>
                <p>独立于上面的评级主模型，我们还将基于一些现实因素对区块链项目做风险评估。但由于不同的项目，其风险来源可能大相径庭，因此无法在模型中将此项有机的整合。</p>
                <p>举一个简单的例子，对于大热的EOS，虽然其CTO ByteMaster（BM）技术实力得到大家认可，但BM却有过频繁换岗的经历，坊间一度戏称其为“跑路CTO”。因此，技术团队的不稳固性成为EOS最大的风险所在。</p>
                <p>同样，扩容问题是长期困扰比特币生态的核心问题之一，而近几个月来，因为此问题导致比特币多次分叉，不但导致大家对比特币未来的信心备受打击，亦导致原本团结一致的社区被数次分裂为多个小团体。这些事件给原本十分确定的比特币的前景，带来一些风险。</p>
                <p>因此，风险这个独立维度，其不会去干扰上述模型对项目作出的最终评分，但会作为一种额外的补充来提醒大家，该项目可能在某些方面充满极大的不确定性。</p>
            </div>
            <hr>
            <div class="MYHot">
                <p style="font-size: 20px;font-weight: bold">独立维度：热度</p>
                <p>借鉴于行业的通常做法，我们亦会将项目的热度作为一个独立维度，纳入整体评估。</p>
                <p>项目的热度，主要统计渠道是网络媒体对项目的正面曝光度、社交媒体或投资者社群中项目的讨论热度等。热点直接表征着该项目的受关注程度，考虑到群体中尖锐型的意见总是能快速脱颖而出，能经手庞大社群监督且认可的区块链，其一定不会是太差的项目。</p>
            </div>
        </div>
    </div>
</div>
<div class="growUpTwo" style="display: none">
    <div class="container growUp">
        <div class="growUpMain">
            <div class="growUpTitle">
                <span>区块链评级模型ChainDC成长版 V1.0</span>
            </div>
            <div class="structureImg">
                <p>ChainDC成长版 V1.0的详细结构图：</p>
                <img src="/Public/Home/images/headerImg/gu1.png" alt="">
                <div class="gu1Title"><span style="font-size: 12px">区块链评级模型ChainDC成长版 V1.0详细结构图</span></div>
                <p>读者一定注意到了“成长版”这几个字，是的，<span style="font-weight: bold">这代表该模型仅适用于评测萌芽期、成长期的区块联项目。而对于那些前期基础开发早已完成，项目声明阶段已经进化到大规模实际落地应用的，则并不适用</span>。不过就当前区块链生态而言，大部分项目都处于本阶段）——包括以太坊，因此本模型实质上对现阶段的大部分项目都适用。</p>
                <p><span style="font-weight: bold">我们之后会推出ChainDC成熟版</span>，该版本则适用于评测成长版不适用的项目，也就是那些基础功能开发完善、自身结构趋于稳定、当期那重心更多的关注在推动生态外围建设、推动生态内应用落地的项目。</p>
                <p>关于模型的由来，和的更多设计思路，请参见文首给出的那篇文章链接。</p>
                <p>下面，我们直接进入ChainDC成长版 V1.0：</p>
                <hr>
            </div>
            <div class="ratingPro">
                <p style="font-size: 20px;font-weight: bold">1 项目</p>
                <p>从最开始的SmartIC0到现在，我们评测一个项目最首要关心的就是项目本身，这一点到现在依然不变。</p>
                <p style="font-weight: bold">1.1 【60分】战略定位</p>
                <p><span style="font-weight: bold">没有应用的生态，总归是毫无价值的。技术应当为应用服务，光谈底层和协议的生态，是迷失了方向的。</span>这一点我很认同，但当前区块链生态的实际情况是：底层和协议层尚不够完善，区块链大厦的根基还不足以支撑优秀上层应用的发展。</p>
                <p>区块链世界当前来到了黎明前的黑暗——底层设施在黑夜里如火如荼的开工建设，杀手级的应用却即将到来的朝阳，虽然它的到来是确定的，但现在的准备条件下，它确实还难以到来。</p>
                <p style="font-weight: bold">基于现阶段的形式，我们在战略定位这一维度，会较为看重那些关注于现阶段底层设施和中间层协议的区块链项目，对于定位为上层应用的项目，当前还无法给其太高的打分。</p>
                <p>我们会将项目的战略定位，划分为如下三个类型，并分别给出每个类型的得分。</p>
                <p>【0-60分】 - 底层设施</p>
                <p>我们认为，考虑到当前区块链生态的实际情况，底层设施类型的区块链项目最高可以获得60分，但实际的分数要根据项目的自身情况，并在行业需求的动态变化中来进行评判。</p>
                <p>举一个简单的例子，当前以以太坊为代表的区块链2.0应用普遍存在吞吐量过低的问题，所以如果某项目能有效解决此问题，那它可以在本维度得一个较高分。</p>
                <p>【0-60分】 - 中层协议</p>
                <p>但同样，盲目的鼓励底层设施的项目，这是不应该的。应当明确的是，当前区块链生态的中层协议和底层设施的建设，同样不健全。对于定位为成为区块链基础设施和上层应用间的轴承、或者说业务中间件的中层协议，其最高分亦可以获得60分，实际分数这也依赖于对项目自身情况的判断。</p>
                <p>同样一个例子，当前公链数目较多，很多不同公链之间差异很小。而如此多的公链，将用户分散为多个群体，不利于生态的发展。因此在当前阶段，跨链类型的协议，我们会给一个较高分，因为它有望彻底解决盘根错杂的各类公链群雄割据的局面。</p>
                <p>【0-30分】 - 上层应用</p>
                <p>如前文所述，在当前区块链中低层设施并不完善的现状下，我们并不十分认可那些专注于用区块链解决上层实际应用的项目。一定程度上我们认为，现在的区块链技术还很难有效的支撑上层的大规模应用。基于此，我们给出上层应用类型项目在本维度最高30分的限制。</p>
                <p style="font-weight: bold">1.2 项目必要性</p>
                <p>项目其存在的必要性，也是我们重点考量的。我们依据于区块链其最大的价值：去中心化和不可篡改性，根据项目的定位，结合目标场景对区块链的需求程度，评估出该项目的存在必要性。</p>
                <p>下文是我们划分的从高到低的三个梯度，每个梯度下方列出了满足该标准的判定标准（对于后两个维度，其判定标准中一个隐含条件是不满足上一个梯度的判定标准）：</p>
                <p>【20-40分】 - 十分必要</p>
                <ul>
                    <li>能极大提高原有行业的效率；</li>
                    <li>能颠覆原有行业的格局；</li>
                    <li>能催生新的行业。</li>
                </ul>
                <p>【10-20分】 - 一般必要</p>
                <ul>
                    <li>能一定程度提升原有行业的效率或者流通性；；</li>
                    <li>能有望对原有行业格局造成影响。</li>
                </ul>
                <p>【0-10分】 - 无必要</p>
                <ul>
                    <li>该项目仅仅用于融资；</li>
                    <li>该项目无法对现有行业造成影响；</li>
                    <li>该项目所基于的需求十分不确定。</li>
                </ul>
            </div>
            <div class="ratingTeam">
                <p style="font-size: 20px;font-weight: bold">2 团队</p>
                <p>所有项目，最大的不确定因素是做项目的人。团队这一块至关重要，这在包括SmartICO在内的所有评级模型中，我们都深刻践行了这一点。</p>
                <p>但SmartIC0 V1.2中对团队的考量存在问题的是，我们会考察执行团队的学历背景，可是英雄不问出处，对于一些已经通过实际过往成功的项目经历、职业经历证明了自身能力的人，考察其学历背景还有什么意义？</p>
                <p>因此我们决定，放弃对学历的考察，转而仅关注其过往职业、项目背景。但不同于SmartICO的是，我们除了考察其团队的技术背景，还会考察团队的运营背景及行业资源。</p>
                <p style="font-weight: bold">2.1 技术团队</p>
                <p>技术团队的考察，我们将从区块链开发经验和常规软件技术开发经验两个角度来考察，并考察是否同时具备此二经验。</p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.1.1 区块链开发经验</p>
                <p>我们将区块链开发经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>【10-15分】 - 主导过成功的软件项目的开发 <br>
                    【5-10分】 - 参与项目的开发<br>
                    【0-5分】 - 未提及或无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.1.2 软件技术开发经验</p>
                <p>同样，我们将软件技术开发经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    【10-15分】 - 主导过成功的软件项目的开发 <br>
                    【5-10分】 - 参与项目的开发 <br>
                    【0-5分】 - 未提及或无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.1.3 是否同时具备区块链技术和软件技术开发经验</p>
                <p>
                    【10分】 - 同时具备 <br>
                    【0分】 - 不同时具备 <br>
                </p>
                <p>由于是否同时具备区块链技术和软件技术开发经验，这是一个对立的问题，而且不存在取值范围一说。因此，具备即得满分，不具备则不得分</p>
                <p style="font-weight: bold">2.2 运营团队</p>
                <p>对于运营团队这块，除了考察团队运营人员的过往职业、项目背景外，还会重点考察他们在项目相关行业的资源情况。</p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.2.1 公司或项目运作经验</p>
                <p>我们将项目运作经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    【10-15分】 - 运作过较为成功的商业公司或者项目 <br>
                    【5-10分】 - 运作过一般的商业公司或项目，或在较为成功的商业公司担任重要职位 <br>
                    【0-5分】 - 未提及或者无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.2.2 行业资源背景</p>
                <p>同样，我们将行业资源背景划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    【10-15分】 - 丰富的相关行业资源或在相关行业巨头担任过要职 <br>
                    【5-10分】 - 一定的相关行业资源或在相关行业公司有从业经历 <br>
                    【0-5分】 - 未提及或者无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.2.3 是否同时具备公司或项目运作经验和行业资源背景</p>
                <p>
                    【10分】 - 同时具备 <br>
                    【0分】 - 不同时具备
                </p>
                <p style="font-weight: bold">2.3 投资人（及顾问，以下略）</p>
                <p>投资人这块的考察，和SmartICO基本无二，也即将投资人根据影响力、过往投资案例等划分为三个梯度。分别为：</p>
                <p>
                    【15-20分】 - 顶级投资人 <br>
                    【5-15分】 - 普通投资人 <br>
                    【0-5分】 - 未提及或者无
                </p>
            </div>
            <div class="performance">
                <p style="font-size: 20px;font-weight: bold">3 履约能力</p>
                <p>与SmartIC0不同的是，对区块链的评级，我们将重点引入“履约能力”这个一级维度。</p>
                <p>相比较于IC0，区块链评级的主体是一个开发中、落地中甚至是商业推广中的区块链项目，其最先在白皮书中通常都会规划好大量的里程碑节点，比如到8月发布测试网络、12月发布主网、次年3月接入若干家应用等。而这些里程碑节点，本身也是项目融资时对大家做出的承诺。</p>
                <p>能否如期的完成里程碑承诺，表征着团队的执行力、信用，甚至也表征着该项目能否具体落地并得到商业市场的认可。</p>
                <p>我们具体从如下几个细维度来考评一个项目的履约能力：</p>
                <p style="font-weight: bold">3.1 白皮书规划节点履约情况</p>
                <p>【30-50分】 - 较好 <br>
                    如果白皮书中的所设立的几乎所有节点，项目方都能很好的如期履约，我们将认定该项目在本维度具备较好的履约能力。
                </p>
                <p>
                    【10-30分】 - 一般 <br>
                    如果白皮书中的所设立的重要时间节点，最终亦能较好的达成，只是时间点上常有小规模推延，我们将认定该项目方具备一般的履约能力。
                </p>
                <p>
                    【0-10分】 - 较差 <br>
                    如果不符合上述两点，也即白皮书中的时间节点，项目方长期无法完成，且也没有进一步的动向，我们将认定其具备较差的履约能力。
                </p>
                <p style="font-weight: bold">3.2 代码更新质量</p>
                <p>由于里程碑节点需要等到特定的时刻才能作出检验，因此在过程中，我们也会去不断的追踪考核项目方的实际开发质量。由于区块链项目的代码通常都开源，因此此维度最佳的做法就是考核其开源代码库的更新提交数量、及代码库的关注度等因子。</p>
                <p>【30-50分】 - 较好</p>
                <ul>
                    <li>代码库更新频率较好，基本每天都有提交；</li>
                    <li>有大量的新功能开发性质的提交；</li>
                    <li>代码库有多个人参与更新维护。</li>
                </ul>
                <p>【10-30分】 - 一般</p>
                <ul>
                    <li>代码库的更新频度较低。</li>
                    <li>较多比例的更新为维护性质的提交，较少的新增需求型提交；</li>
                    <li>参与更新代码的人数不多。</li>
                </ul>
                <p>【0-10分】 - 较差</p>
                <ul>
                    <li>找不到代码库，或者代码库中无有效代码；</li>
                    <li>代码库长期没有有效更新，或者有效更新极少。</li>
                    <li>代码库的更新大部分均为维护性质的提交，缺乏新增需求型的提交；</li>
                </ul>
            </div>
            <div class="ratingMarket">
                <p style="font-size: 20px;font-weight: bold">4 市场</p>
                <p>项目的市场表现，是一个非常有说服力的因素。在SmartIC0中对IC0考察市场维度时所采用的盈利模式、社区治理、团队过往经验等，这些考察方式都较为主观，而且难以量化。但对于区块链项目，其Token通常已经上线了二级市场，二级市场的受欢迎程度直接透出了该项目的市场受欢迎程度。因此，我们可以根据项目代币所被支持的交易所的数量和质量，来快速而准确的评判其市场接受程度。</p>
                <p>同时，除了考察项目的市场接受情况外，我们还要考察其市场接受的稳定性。因为部分通过短期操作来拉升市场接受度的项目，由于其本身质量不过硬，市场认知不可持续，所以价格会大涨大跌。这一点上，我们具体的考察方式为，考察代币在近段时间来价格的波动情况。</p>
                <p style="font-weight: bold">4.1 交易所支持</p>
                <p>我们将会对现有交易所做分类，现有的各交易所会被划分为三个档次，分别为：一流交易所、常规交易所、一般交易所。根据项目代币被支持的交易所数量，来对项目进行划分。</p>
                <p style="font-weight: bold">具体的交易所档次的评定列表，我们将另行给出。</p>
                <p>【30-50分】 - 支持度高</p>
                <ul>
                    <li>被至少两家一流交易所支持</li>
                </ul>
                <p>【10-30分】 - 支持度中</p>
                <ul>
                    <li>被至少一家一流交易所支持，或被至少五家常规交易所支持</li>
                </ul>
                <p>【0-10分】 - 支持度低</p>
                <ul>
                    <li>不满足以上条件</li>
                </ul>
                <p style="font-weight: bold">4.2 价值稳定性</p>
                <p>我们将以比特币为基准，考核该项目代币对比特币的汇率的变化，依据于变化值，对项目在本维度作出如下评判：</p>
                <p>【30-50分】 - 价值稳定上涨</p>
                <ul>
                    <li>该项目代币在过去一定周期内，对比特币汇率稳步上涨</li>
                </ul>
                <p>【10-30分】 价值稳定不变或者相对不稳定</p>
                <ul>
                    <li>该项目代币在过去一定周期内，对比特币汇率基本不变</li>
                    <li>该项目代币在过去一定周期内，对比特币汇率经常有较大波动</li>
                </ul>
                <p>【0-10分】 - 价值显著下落或相对非常不稳定</p>
                <ul>
                    <li>该项目代币在过去一定周期内，对比特币汇率持续下探</li>
                    <li>该项目代币在过去一定周期内，对比特币汇率经常大起大落</li>
                </ul>
            </div>
            <div class="ratingRisk">
                <p style="font-size: 20px;font-weight: bold">独立维度：风险</p>
                <p>独立于上面的评级主模型，我们还将基于一些现实因素对区块链项目做风险评估。但由于不同的项目，其风险来源可能大相径庭，因此无法在模型中将此项有机的整合。</p>
                <p>举一个简单的例子，对于大热的EOS，虽然其CTO ByteMaster（BM）技术实力得到大家认可，但BM却有过频繁换岗的经历，坊间一度戏称其为“跑路CTO”。因此，技术团队的不稳固性成为EOS最大的风险所在。</p>
                <p>同样，扩容问题是长期困扰比特币生态的核心问题之一，而近几个月来，因为此问题导致比特币多次分叉，不但导致大家对比特币未来的信心备受打击，亦导致原本团结一致的社区被数次分裂为多个小团体。这些事件给原本十分确定的比特币的前景，带来一些风险。</p>
                <p>因此，风险这个独立维度，其不会去干扰上述模型对项目作出的最终评分，但会作为一种额外的补充来提醒大家，该项目可能在某些方面充满极大的不确定性。</p>
            </div>
            <div class="ratingHot">
                <p style="font-size: 20px;font-weight: bold">独立维度：热度</p>
                <p>借鉴于行业的通常做法，我们亦会将项目的热度作为一个独立维度，纳入整体评估。</p>
                <p>项目的热度，主要统计渠道是网络媒体对项目的正面曝光度、社交媒体或投资者社群中项目的讨论热度等。热点直接表征着该项目的受关注程度，考虑到群体中尖锐型的意见总是能快速脱颖而出，能经手庞大社群监督且认可的区块链，其一定不会是太差的项目。</p>
            </div>
        </div>
    </div>
</div>
<div class="growUpThree" style="display: none">
    <div class="container growUp">
        <div class="growUpMain">
            <div class="growUpTitle">
                <span>区块链评级模型ChainDC成长版 V3.0</span>
            </div>
            <div class="structureImg">
                <p>ChainDC成长版 V1.0的详细结构图：</p>
                <img src="/Public/Home/images/headerImg/gu1.png" alt="">
                <div class="gu1Title"><span style="font-size: 12px">区块链评级模型ChainDC成长版 V1.0详细结构图</span></div>
                <p>读者一定注意到了“成长版”这几个字，是的，<span style="font-weight: bold">这代表该模型仅适用于评测萌芽期、成长期的区块联项目。而对于那些前期基础开发早已完成，项目声明阶段已经进化到大规模实际落地应用的，则并不适用</span>。不过就当前区块链生态而言，大部分项目都处于本阶段）——包括以太坊，因此本模型实质上对现阶段的大部分项目都适用。</p>
                <p><span style="font-weight: bold">我们之后会推出ChainDC成熟版</span>，该版本则适用于评测成长版不适用的项目，也就是那些基础功能开发完善、自身结构趋于稳定、当期那重心更多的关注在推动生态外围建设、推动生态内应用落地的项目。</p>
                <p>关于模型的由来，和的更多设计思路，请参见文首给出的那篇文章链接。</p>
                <p>下面，我们直接进入ChainDC成长版 V1.0：</p>
                <hr>
            </div>
            <div class="ratingPro">
                <p style="font-size: 20px;font-weight: bold">1 项目</p>
                <p>从最开始的SmartIC0到现在，我们评测一个项目最首要关心的就是项目本身，这一点到现在依然不变。</p>
                <p style="font-weight: bold">1.1 【60分】战略定位</p>
                <p><span style="font-weight: bold">没有应用的生态，总归是毫无价值的。技术应当为应用服务，光谈底层和协议的生态，是迷失了方向的。</span>这一点我很认同，但当前区块链生态的实际情况是：底层和协议层尚不够完善，区块链大厦的根基还不足以支撑优秀上层应用的发展。</p>
                <p>区块链世界当前来到了黎明前的黑暗——底层设施在黑夜里如火如荼的开工建设，杀手级的应用却即将到来的朝阳，虽然它的到来是确定的，但现在的准备条件下，它确实还难以到来。</p>
                <p style="font-weight: bold">基于现阶段的形式，我们在战略定位这一维度，会较为看重那些关注于现阶段底层设施和中间层协议的区块链项目，对于定位为上层应用的项目，当前还无法给其太高的打分。</p>
                <p>我们会将项目的战略定位，划分为如下三个类型，并分别给出每个类型的得分。</p>
                <p>【0-60分】 - 底层设施</p>
                <p>我们认为，考虑到当前区块链生态的实际情况，底层设施类型的区块链项目最高可以获得60分，但实际的分数要根据项目的自身情况，并在行业需求的动态变化中来进行评判。</p>
                <p>举一个简单的例子，当前以以太坊为代表的区块链2.0应用普遍存在吞吐量过低的问题，所以如果某项目能有效解决此问题，那它可以在本维度得一个较高分。</p>
                <p>【0-60分】 - 中层协议</p>
                <p>但同样，盲目的鼓励底层设施的项目，这是不应该的。应当明确的是，当前区块链生态的中层协议和底层设施的建设，同样不健全。对于定位为成为区块链基础设施和上层应用间的轴承、或者说业务中间件的中层协议，其最高分亦可以获得60分，实际分数这也依赖于对项目自身情况的判断。</p>
                <p>同样一个例子，当前公链数目较多，很多不同公链之间差异很小。而如此多的公链，将用户分散为多个群体，不利于生态的发展。因此在当前阶段，跨链类型的协议，我们会给一个较高分，因为它有望彻底解决盘根错杂的各类公链群雄割据的局面。</p>
                <p>【0-30分】 - 上层应用</p>
                <p>如前文所述，在当前区块链中低层设施并不完善的现状下，我们并不十分认可那些专注于用区块链解决上层实际应用的项目。一定程度上我们认为，现在的区块链技术还很难有效的支撑上层的大规模应用。基于此，我们给出上层应用类型项目在本维度最高30分的限制。</p>
                <p style="font-weight: bold">1.2 项目必要性</p>
                <p>项目其存在的必要性，也是我们重点考量的。我们依据于区块链其最大的价值：去中心化和不可篡改性，根据项目的定位，结合目标场景对区块链的需求程度，评估出该项目的存在必要性。</p>
                <p>下文是我们划分的从高到低的三个梯度，每个梯度下方列出了满足该标准的判定标准（对于后两个维度，其判定标准中一个隐含条件是不满足上一个梯度的判定标准）：</p>
                <p>【20-40分】 - 十分必要</p>
                <ul>
                    <li>能极大提高原有行业的效率；</li>
                    <li>能颠覆原有行业的格局；</li>
                    <li>能催生新的行业。</li>
                </ul>
                <p>【10-20分】 - 一般必要</p>
                <ul>
                    <li>能一定程度提升原有行业的效率或者流通性；；</li>
                    <li>能有望对原有行业格局造成影响。</li>
                </ul>
                <p>【0-10分】 - 无必要</p>
                <ul>
                    <li>该项目仅仅用于融资；</li>
                    <li>该项目无法对现有行业造成影响；</li>
                    <li>该项目所基于的需求十分不确定。</li>
                </ul>
            </div>
            <div class="ratingTeam">
                <p style="font-size: 20px;font-weight: bold">2 团队</p>
                <p>所有项目，最大的不确定因素是做项目的人。团队这一块至关重要，这在包括SmartICO在内的所有评级模型中，我们都深刻践行了这一点。</p>
                <p>但SmartIC0 V1.2中对团队的考量存在问题的是，我们会考察执行团队的学历背景，可是英雄不问出处，对于一些已经通过实际过往成功的项目经历、职业经历证明了自身能力的人，考察其学历背景还有什么意义？</p>
                <p>因此我们决定，放弃对学历的考察，转而仅关注其过往职业、项目背景。但不同于SmartICO的是，我们除了考察其团队的技术背景，还会考察团队的运营背景及行业资源。</p>
                <p style="font-weight: bold">2.1 技术团队</p>
                <p>技术团队的考察，我们将从区块链开发经验和常规软件技术开发经验两个角度来考察，并考察是否同时具备此二经验。</p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.1.1 区块链开发经验</p>
                <p>我们将区块链开发经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>【10-15分】 - 主导过成功的软件项目的开发 <br>
                    【5-10分】 - 参与项目的开发<br>
                    【0-5分】 - 未提及或无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.1.2 软件技术开发经验</p>
                <p>同样，我们将软件技术开发经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    【10-15分】 - 主导过成功的软件项目的开发 <br>
                    【5-10分】 - 参与项目的开发 <br>
                    【0-5分】 - 未提及或无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.1.3 是否同时具备区块链技术和软件技术开发经验</p>
                <p>
                    【10分】 - 同时具备 <br>
                    【0分】 - 不同时具备 <br>
                </p>
                <p>由于是否同时具备区块链技术和软件技术开发经验，这是一个对立的问题，而且不存在取值范围一说。因此，具备即得满分，不具备则不得分</p>
                <p style="font-weight: bold">2.2 运营团队</p>
                <p>对于运营团队这块，除了考察团队运营人员的过往职业、项目背景外，还会重点考察他们在项目相关行业的资源情况。</p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.2.1 公司或项目运作经验</p>
                <p>我们将项目运作经验划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    【10-15分】 - 运作过较为成功的商业公司或者项目 <br>
                    【5-10分】 - 运作过一般的商业公司或项目，或在较为成功的商业公司担任重要职位 <br>
                    【0-5分】 - 未提及或者无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.2.2 行业资源背景</p>
                <p>同样，我们将行业资源背景划分为三个梯度，来对此维度进行考核。三个梯度的打分范围和判定依据分别为：</p>
                <p>
                    【10-15分】 - 丰富的相关行业资源或在相关行业巨头担任过要职 <br>
                    【5-10分】 - 一定的相关行业资源或在相关行业公司有从业经历 <br>
                    【0-5分】 - 未提及或者无
                </p>
                <p style="font-weight:600;color:#2f2f2f;font-size: 14px">2.2.3 是否同时具备公司或项目运作经验和行业资源背景</p>
                <p>
                    【10分】 - 同时具备 <br>
                    【0分】 - 不同时具备
                </p>
                <p style="font-weight: bold">2.3 投资人（及顾问，以下略）</p>
                <p>投资人这块的考察，和SmartICO基本无二，也即将投资人根据影响力、过往投资案例等划分为三个梯度。分别为：</p>
                <p>
                    【15-20分】 - 顶级投资人 <br>
                    【5-15分】 - 普通投资人 <br>
                    【0-5分】 - 未提及或者无
                </p>
            </div>
            <div class="performance">
                <p style="font-size: 20px;font-weight: bold">3 履约能力</p>
                <p>与SmartIC0不同的是，对区块链的评级，我们将重点引入“履约能力”这个一级维度。</p>
                <p>相比较于IC0，区块链评级的主体是一个开发中、落地中甚至是商业推广中的区块链项目，其最先在白皮书中通常都会规划好大量的里程碑节点，比如到8月发布测试网络、12月发布主网、次年3月接入若干家应用等。而这些里程碑节点，本身也是项目融资时对大家做出的承诺。</p>
                <p>能否如期的完成里程碑承诺，表征着团队的执行力、信用，甚至也表征着该项目能否具体落地并得到商业市场的认可。</p>
                <p>我们具体从如下几个细维度来考评一个项目的履约能力：</p>
                <p style="font-weight: bold">3.1 白皮书规划节点履约情况</p>
                <p>【30-50分】 - 较好 <br>
                    如果白皮书中的所设立的几乎所有节点，项目方都能很好的如期履约，我们将认定该项目在本维度具备较好的履约能力。
                </p>
                <p>
                    【10-30分】 - 一般 <br>
                    如果白皮书中的所设立的重要时间节点，最终亦能较好的达成，只是时间点上常有小规模推延，我们将认定该项目方具备一般的履约能力。
                </p>
                <p>
                    【0-10分】 - 较差 <br>
                    如果不符合上述两点，也即白皮书中的时间节点，项目方长期无法完成，且也没有进一步的动向，我们将认定其具备较差的履约能力。
                </p>
                <p style="font-weight: bold">3.2 代码更新质量</p>
                <p>由于里程碑节点需要等到特定的时刻才能作出检验，因此在过程中，我们也会去不断的追踪考核项目方的实际开发质量。由于区块链项目的代码通常都开源，因此此维度最佳的做法就是考核其开源代码库的更新提交数量、及代码库的关注度等因子。</p>
                <p>【30-50分】 - 较好</p>
                <ul>
                    <li>代码库更新频率较好，基本每天都有提交；</li>
                    <li>有大量的新功能开发性质的提交；</li>
                    <li>代码库有多个人参与更新维护。</li>
                </ul>
                <p>【10-30分】 - 一般</p>
                <ul>
                    <li>代码库的更新频度较低。</li>
                    <li>较多比例的更新为维护性质的提交，较少的新增需求型提交；</li>
                    <li>参与更新代码的人数不多。</li>
                </ul>
                <p>【0-10分】 - 较差</p>
                <ul>
                    <li>找不到代码库，或者代码库中无有效代码；</li>
                    <li>代码库长期没有有效更新，或者有效更新极少。</li>
                    <li>代码库的更新大部分均为维护性质的提交，缺乏新增需求型的提交；</li>
                </ul>
            </div>
            <div class="ratingMarket">
                <p style="font-size: 20px;font-weight: bold">4 市场</p>
                <p>项目的市场表现，是一个非常有说服力的因素。在SmartIC0中对IC0考察市场维度时所采用的盈利模式、社区治理、团队过往经验等，这些考察方式都较为主观，而且难以量化。但对于区块链项目，其Token通常已经上线了二级市场，二级市场的受欢迎程度直接透出了该项目的市场受欢迎程度。因此，我们可以根据项目代币所被支持的交易所的数量和质量，来快速而准确的评判其市场接受程度。</p>
                <p>同时，除了考察项目的市场接受情况外，我们还要考察其市场接受的稳定性。因为部分通过短期操作来拉升市场接受度的项目，由于其本身质量不过硬，市场认知不可持续，所以价格会大涨大跌。这一点上，我们具体的考察方式为，考察代币在近段时间来价格的波动情况。</p>
                <p style="font-weight: bold">4.1 交易所支持</p>
                <p>我们将会对现有交易所做分类，现有的各交易所会被划分为三个档次，分别为：一流交易所、常规交易所、一般交易所。根据项目代币被支持的交易所数量，来对项目进行划分。</p>
                <p style="font-weight: bold">具体的交易所档次的评定列表，我们将另行给出。</p>
                <p>【30-50分】 - 支持度高</p>
                <ul>
                    <li>被至少两家一流交易所支持</li>
                </ul>
                <p>【10-30分】 - 支持度中</p>
                <ul>
                    <li>被至少一家一流交易所支持，或被至少五家常规交易所支持</li>
                </ul>
                <p>【0-10分】 - 支持度低</p>
                <ul>
                    <li>不满足以上条件</li>
                </ul>
                <p style="font-weight: bold">4.2 价值稳定性</p>
                <p>我们将以比特币为基准，考核该项目代币对比特币的汇率的变化，依据于变化值，对项目在本维度作出如下评判：</p>
                <p>【30-50分】 - 价值稳定上涨</p>
                <ul>
                    <li>该项目代币在过去一定周期内，对比特币汇率稳步上涨</li>
                </ul>
                <p>【10-30分】 价值稳定不变或者相对不稳定</p>
                <ul>
                    <li>该项目代币在过去一定周期内，对比特币汇率基本不变</li>
                    <li>该项目代币在过去一定周期内，对比特币汇率经常有较大波动</li>
                </ul>
                <p>【0-10分】 - 价值显著下落或相对非常不稳定</p>
                <ul>
                    <li>该项目代币在过去一定周期内，对比特币汇率持续下探</li>
                    <li>该项目代币在过去一定周期内，对比特币汇率经常大起大落</li>
                </ul>
            </div>
            <div class="ratingRisk">
                <p style="font-size: 20px;font-weight: bold">独立维度：风险</p>
                <p>独立于上面的评级主模型，我们还将基于一些现实因素对区块链项目做风险评估。但由于不同的项目，其风险来源可能大相径庭，因此无法在模型中将此项有机的整合。</p>
                <p>举一个简单的例子，对于大热的EOS，虽然其CTO ByteMaster（BM）技术实力得到大家认可，但BM却有过频繁换岗的经历，坊间一度戏称其为“跑路CTO”。因此，技术团队的不稳固性成为EOS最大的风险所在。</p>
                <p>同样，扩容问题是长期困扰比特币生态的核心问题之一，而近几个月来，因为此问题导致比特币多次分叉，不但导致大家对比特币未来的信心备受打击，亦导致原本团结一致的社区被数次分裂为多个小团体。这些事件给原本十分确定的比特币的前景，带来一些风险。</p>
                <p>因此，风险这个独立维度，其不会去干扰上述模型对项目作出的最终评分，但会作为一种额外的补充来提醒大家，该项目可能在某些方面充满极大的不确定性。</p>
            </div>
            <div class="ratingHot">
                <p style="font-size: 20px;font-weight: bold">独立维度：热度</p>
                <p>借鉴于行业的通常做法，我们亦会将项目的热度作为一个独立维度，纳入整体评估。</p>
                <p>项目的热度，主要统计渠道是网络媒体对项目的正面曝光度、社交媒体或投资者社群中项目的讨论热度等。热点直接表征着该项目的受关注程度，考虑到群体中尖锐型的意见总是能快速脱颖而出，能经手庞大社群监督且认可的区块链，其一定不会是太差的项目。</p>
            </div>
        </div>
    </div>
</div>
<!--SPA替换标签-->
<div class="wl-services">
    <div class="wl-block">
        <div class="wl-container container">
            <div class="row">
                <div class="col-md-11">
                    <div class="wl_title"><span>服务</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="wl-section wl-section-info">
                        <p>链调查是一家区块链评级机构。在今年，我们的专家获得了大量独特的经验，分析了他们的区块链项目。在筹款阶段，我们准确地监测和检查创业公司的商业模式，产品和技术趋势。我们非常详细地关注市场动态和投资者的行为，使我们能够提供独特的专业服务。</p>

                        <p>对于项目：</p>
                        <p>链调查为准备运行区块链的项目提供以下服务，以及考虑投资块式创业公司的投资者。</p>
                        <p>审计 - 对将要运行的区块链项目的综合分析，可能会损害投资成功的机会。目标是消除项目缺陷，增加投资额;</p>
                        <p>评估 - 链调查专家对项目投资吸引力的独立意见。目标是通过开放示范和第三方专业确认项目的可靠性和前景展望吸引新投资者;</p>
                        <p>筹款完成后的项目审计 - 项目创建的筹资只是向投资者宣布的商业计划的产品构建和实施的第一步。为投资者和整个社区提供有关未来项目开发的独立客观信息同样重要，这将显示创业公司的开放性和透明度。此后，这一步将有助于增加资金，并与合作伙伴建立关系。目标是建立对项目的信任，长期获得良好声誉。</p>
                        <p>更详细地说：</p>
                        <p>审计</p>
                        <p>对将要运行区块链的项目的综合分析可能会损害投资成功的机会。审计允许对项目获得客观的专业意见，这将有助于确定可能阻碍成功实施团队宣布的任务的缺陷，从而不能满足投资者的期望。</p>
                        <p>在筹资过程中，潜在投资者或集体社区可能会发现缺点，这将对团队声誉产生不利影响，并伤害筹集资金的机会。此外，这可能导致公众丧失项目创始人的声誉。</p>
                        <p> 为避免这种问题，链调查小组分析了项目的缺点，并就如何解决这些问题提出了建议（如果有客观的机会）。</p>

                        <p>评级审查</p>
                        <p>评级审查是链调查专家对项目投资吸引力的独立意见。该项目与审计类似。</p>
                        <p>根据评估报告的编制结果，该项目的投资吸引力评级。评级评估还描述了项目的所有优点和缺点。</p>
                        <p> 评级评估允许投资者说服项目创始人的开放和承诺以及履行其义务的能力。</p>
                        <p>出版该项目的评级审查可以大大帮助项目吸引用户，因为它使他们能够更加熟悉公司和产品。此外，用户喜欢独立的分析意见，在媒体上付费文章。</p>
                        <p>筹资完成后的项目审核</p>
                        <p>对运行筹资的项目的审计支持与传统业务有许多独特和具体的差异。这是因为资金流动，服务（产品）功能的重要部分和项目开发的业务计划都建立在块链技术和加密功能的特征上。</p>

                        <p>我们的专家为块链项目提供全面的审核支持，包括以下内容：</p>

                        <p>分析项目的财务状况</p>
                        <p>动态的产品创作</p>
                        <p>分析项目的市场地位</p>
                        <p>该项目与其他玩家的竞争地位</p>
                        <p>计算回报的动力，达到盈利能力</p>
                        <p>预测项目的利润水平</p>
                        <p>收集有关品牌力量的信息</p>
                        <p>审计支持是根据项目披露的信息和独立市场调查提供的。我们向社区提供关于项目状况的独立报告，并得到有关分析和数学调查结果的支持。</p>

                        <p>投资者：</p>
                        <p>创业投资者对投资者的投资吸引力的独立意见。本分析包括以下几个方面的分析：</p>

                        <p>关于财务和商业模式的可持续性和产生利润的意见</p>
                        <p>对项目发展规划的客观有效性的意见（路线图分析）</p>
                        <p>分析竞争环境</p>
                        <p>审查项目的竞争优势</p>
                        <p>分析项目进入市场细分的动态</p>
                        <p>分析项目组</p>
                        <p>分析MVP，产品代码或其碎片</p>
                        <p>根据分析结果，向投资者提供有关该项目的详细的专家报告，描述了创业发展的所有风险和前景。</p>

                        <p>可以根据个人要求提供所有阶段的投资交易支持。</p>

                        <p>对于所有问题，请联系 weilailian@163.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wl-aboutUs">
    <div class="wl-block">
        <div class="wl-container container">
            <div class="row">
                <div class="col-md-11">
                    <div class="wl_title"><span>关于我们</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="wl-section wl-section-info">
                        <p>链调查（ChainDC.com）是一家针对区块链项目可投资性的、进行独立且客观的分析研究的评级机构。我们会主动对世界范围给各个较为知名的区块链项目，进行包括但不限于团队背景调查、项目可行性、市场前景、项目持续开发进度情况等多维度的详尽调查，并依据于此发布评级报告。</p>
                        <p>我们对项目进行评级时，所依据的是我们自主推出的区块链项目评级数学模型（很快会公开发布）。该数学模型力求客观、科学且全面。对于评级所依据的数据，全部来自项目自身所发布的信息、或者公开渠道内我们可以获取到的信息。但不表示所有信息都会纳入考虑，实际上，我们只采用那些具备客观性、可很好量化的数据，从而避免主观因素对评级结果带来干扰。简单言之即：所有依赖数据均为客观、可量化数据，且对于同一份数据，依据于我们的模型，无论让谁来负责实际评级，其结果都将一致——即数据相同，则结果必然相同。</p>
                        <div class="SmartICOBox">
                            <img src="/Public/Home/images/headerImg/SmartICOV1.2.png" alt="" class="smartICO">
                            <span>SmartICO V1.2版本</span>
                        </div>
                        <p>链调查团队由币圈著名意见领袖、微信公众号“未来虚拟币”负责人王大炮创立，专注于区块链信用评级和投资者服务，现已成为国内领先的区块链专业评级机构，在业界享有极高的知名度。公司最早起源于微信公众号“未来虚拟币”，最初公众号以客观、中立的第三方ico评级报告闻名于业内，现响应国家政策，转型专注于区块链评级。</p>
                        <p>王大炮为中山大学计算机硕士、前阿里巴巴无线事业部某架构组成员（非架构师），10年接触比特币，自13年起开始重度参与国内币圈、链圈生态建设。其为国内比特币早期布道者之一，曾多次接受新闻媒体采访，包括但不限于《证券时报》、36kr、新京报、中新社等。其于17年7月份公开推出全球首个ICO评级模型SmartICO，并依据于该模型，持续发布对几乎所有热门项目的专业评级。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<!--footer-->
<div class="wl-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 wl-footer-left">
                <div class="wl-footer-about hidden-xs hidden-sm hidden-md"><a href="#/about">关于我们</a></div>
                <!--<div><span></span></div>-->
                <div  id="wl-footer-rating" class="wl-footer-rating hidden-xs hidden-sm hidden-md" data-toggle="modal" data-target="#myModal">申请评估</div>
                <!--<div><span></span></div>-->
                <div class="wl-footer-email ">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：service@chaindc.com</div>
                <!--<div><span></span></div>-->
                <div class="wl-footer-discuss ">电报讨论群：<a href="https://t.me/DapaoChainGroup" target="_blank">https://t.me/DapaoChainGroup</a></div>
                <!--<div><span></span></div>-->
                <div class="wl-footer-notice ">电报公告群：<a href="https://t.me/DapaoChannel" target="_blank">https://t.me/DapaoChannel</a></div>
            </div>
            <div class="col-sm-3 wl-footer-right hidden-sm hidden-xs">
                <span><a href="<?= U('Admin/Public/login'); ?>"> © 2016-2017 Chaindc All rights reserved</a></span>
            </div>
        </div>
    </div>
</div>
<!--modal-->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true" class="modal_close">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">获得评级</h4>
                <div class="modal-title-subtitle">询价</div>
            </div>

            <div class="modal-body">
                <form class="modal_form" data-h5-instanceid="2" novalidate="novalidate" action="#" method="post">
                    <div class="modal_row">
                        <label class="modal_label">输入名称/网站
                            <div class="modal_required"></div>
                        </label>
                        <input type="text" name="title" required="required" class="modal_input ui-state-error h5-active" ></div>
                    <div class="modal_row">
                        <label class="modal_label">联系人
                            <div class="modal_required"></div>
                        </label>
                        <input type="text" name="name" required="required" class="modal_input"></div>
                    <div class="modal_row">
                        <label class="modal_label">邮箱
                            <div class="modal_required"></div>
                        </label>
                        <input type="email" name="email" required="required" class="modal_input"></div>
                    <div class="modal_row">
                        <label class="modal_label">咨询
                            <div class="modal_required"></div>
                        </label>
                        <textarea rows="6" name="enquiry" placeholder="输入您感兴趣的问题" required="required" class="modal_textarea"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="modal-btn btn btn-primary">提交</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--modal-->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true" class="modal_close">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Get Rating</h4>
                <div class="modal-title-subtitle">make an enquiry</div>
            </div>

            <div class="modal-body">
                <form class="modal_form" data-h5-instanceid="2" novalidate="novalidate" action="#" method="post">
                    <div class="modal_row">
                        <label class="modal_label">Startup name/website
                            <div class="modal_required"></div>
                        </label>
                        <input type="text" name="name" required="required" class="modal_input ui-state-error h5-active" ></div>
                    <div class="modal_row">
                        <label class="modal_label">Contact person
                            <div class="modal_required"></div>
                        </label>
                        <input type="text" name="person" required="required" class="modal_input"></div>
                    <div class="modal_row">
                        <label class="modal_label">Email
                            <div class="modal_required"></div>
                        </label>
                        <input type="email" name="email" required="required" class="modal_input"></div>
                    <div class="modal_row">
                        <label class="modal_label">Enquiry
                            <div class="modal_required"></div>
                        </label>
                        <textarea rows="6" name="enquiry" placeholder="What are you interested in ?" required="required" class="modal_textarea"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="modal-btn btn btn-primary">提交</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/router.js"></script>
<script src="/Public/Home/js/index.js"></script>
<script src="/Public/Home/js/pages.js"></script>