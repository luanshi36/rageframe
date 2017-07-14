<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\left\MainLeftWidget;
use backend\widgets\notify\NotifyWidget;
use backend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<html>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->params['siteTitle']?></title>
    <link rel="shortcut icon" href="favicon.ico">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link href="/resource/backend/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/resource/backend/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/resource/backend/css/animate.min.css" rel="stylesheet">
    <link href="/resource/backend/css/style.min.css?v=4.0.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<?php $this->beginBody() ?>
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                                <img src="<?php echo !empty($user['head_portrait']) ? $user['head_portrait'] : "/resource/backend/img/profile.jpg" ?>" class="img-circle" width="64" height="64" id="head_portrait">
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs">
                                   <strong class="font-bold"><?php echo $user['username'] ?></strong>
                               </span>
                                <span class="text-muted text-xs block">
                                    <?php if($user['id'] == Yii::$app->params['adminAccount']){ ?>
                                        超级管理员
                                    <?php }else{ ?>
                                        <?php echo isset($user['assignment']['item_name']) ? $user['assignment']['item_name'] : '游客' ?>
                                    <?php } ?>
                                    <b class="caret"></b>
                                </span>
                                </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li>
                                <a class="J_menuItem" href="<?= Url::to(['sys/manager/personal'])?>"  onclick="$('body').click();">个人中心</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?= Url::to(['sys/manager/up-passwd'])?>"  onclick="$('body').click();">修改密码</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?= Url::to(['sys/cache/clear'])?>"  onclick="$('body').click();">清除缓存</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?= Url::to(['site/logout'])?>" data-method="post">安全退出</a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element"><?php echo Yii::$app->params['acronym']?>
                    </div>
                </li>
                <?= MainLeftWidget::widget() ?>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <?= NotifyWidget::widget() ?>
                    <li class="hidden-xs">
                        <a href="<?= Yii::$app->request->hostInfo ?>" target="_blank"><i class="fa fa-bookmark"></i>前台</a>
                    </li>
                    <li class="dropdown">
                        <a class="J_menuItem"  href="<?= Url::to(['sys/system/index'])?>">
                            <i class="fa fa-sitemap"></i>系统
                        </a>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a class="right-sidebar-toggle" aria-expanded="false">
                            <i class="fa fa-tasks"></i>主题
                        </a>
                    </li>
                    <li class="hidden-xs">
                        <select class="form-control">
                            <option selected value="zh-Cn">简体中文</option>
                        </select>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i></button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a></li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a></li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="<?= Url::to(['site/logout'])?>" data-method="post" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?= Url::to(['main/system'])?>" frameborder="0" data-id="index_v1.html" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right"><?= Yii::$app->config->info('WEB_COPYRIGHT_ALL') ?></div>
        </div>
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar">
        <div class="sidebar-container">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="skin-setttings">
                        <div class="title">主题设置</div>
                        <div class="setings-item">
                            <span>收起左侧菜单</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                    <label class="onoffswitch-label" for="collapsemenu">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>固定顶部</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                    <label class="onoffswitch-label" for="fixednavbar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>固定宽度</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                    <label class="onoffswitch-label" for="boxedlayout">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="title">皮肤选择</div>
                        <div class="setings-item default-skin nb">
                            <span class="skin-name ">
                                 <a href="#" class="s-skin-0">
                                     默认皮肤
                                 </a>
                            </span>
                        </div>
                        <div class="setings-item blue-skin nb">
                            <span class="skin-name ">
                                <a href="#" class="s-skin-1">
                                    蓝色主题
                                </a>
                            </span>
                        </div>
                        <div class="setings-item yellow-skin nb">
                            <span class="skin-name ">
                                <a href="#" class="s-skin-3">
                                    黄色/紫色主题
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--右侧边栏结束-->
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

