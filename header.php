<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh">
<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php $this->archiveTitle(array(
      'category' => '分类[%s]下的文章',
      'search' => '包含关键字[%s]的文章',
      'tag' => '标签[%s]下的文章',
      'author' => '[%s]发布的文章'
    ), '', ' - '); ?><?php $this->options->title() ?></title>
  <!-- 使用url函数转换相关路径 -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
  <!-- 通过自有函数输出HTML头部信息 -->
  <?php $this->header(); ?>
  <style>
    body{
      background:url("https://www.bing.com/th?id=OHR.PorkiesTrail_ROW8343655250_1920x1080.jpg&rf=LaDigue_1920x1080.jpg") fixed center  no-repeat;
      background-size: cover;
    }
  </style>
</head>
<body>
<header id="header">
  <div class="container">
    <div class="site-name">
      <?php if ($this->options->logoUrl): ?>
        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
          <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>"/>
        </a>
      <?php else: ?>
        <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
      <?php endif; ?>
      <h1><?php $this->options->title() ?></h1>
    </div>

      <nav>
        <a <?php if ($this->is('index')): ?>class="current"<?php endif; ?>
           href="<?php $this->options->siteUrl(); ?>"><?php if ($this->is('index')) {echo '博客';} else { echo '首页';} ?></a>
        <a href="https://sxlf.org" title="伤心凉粉的微博">微博</a>
        <?php
        $this->archiveTitle(array(
          'category' => '%s',
          'search' => '搜索[%s]的结果',
          'tag' => '%s',
          'author' => '%s'
        ), '<a href="" class="current title">', '</a>');
        ?>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while ($pages->next()): ?>
          <a<?php if ($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>
            href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
      </nav>
  </div>
</header><!-- end #header -->
<div id="body">
  <div class="container">