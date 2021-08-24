<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh">
<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115734355-1"></script>
  <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());
   gtag('config', 'UA-115734355-1');
  </script>
  <title><?php $this->archiveTitle(array(
      'category' => _t('分类 %s 下的文章'),
      'search'  => _t('包含关键字 %s 的文章'),
      'tag'    => _t('标签 %s 下的文章'),
      'author'  => _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title() ?></title>
  <!-- 使用url函数转换相关路径 -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
  <!-- 通过自有函数输出HTML头部信息 -->
  <?php $this->header(); ?>
  <style>
    body:before{ background:url( <?php echo getBingImage() ?> ) center 0 no-repeat; background-size:cover;}
  </style>
</head>
<body>
<header id="header">
  <div class="container">
      <div class="site-name">
      <?php if ($this->options->logoUrl): ?>
        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
          <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
        </a>
        <div><?php $this->options->title() ?></div>
      <?php else: ?>
        <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
    	  <p class="description"><?php $this->options->description() ?></p>
      <?php endif; ?>
      </div>

      <div class="site-nav">
        <nav id="nav-menu" class="clearfix">
          <a <?php if($this->is('index')): ?>class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php if($this->is('index')){_e('博客');}else{_e('首页');} ?></a>
          <a href="https://sxlf.org" title="伤心凉粉的微博">微博</a>
         <?php 
         $this->archiveTitle(array(
      'category' => _t('%s'),
      'search'  => _t('搜索[%s]的结果'),
      'tag'    => _t('%s'),
      'author'  => _t('%s')
    ), '<a href="" class="current title">', '</a>');
    ?>
          <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
          <?php while($pages->next()): ?>
          <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
          <?php endwhile; ?>
        </nav>
      </div>
  </div>
</header><!-- end #header -->
<div id="body">
  <div class="container">