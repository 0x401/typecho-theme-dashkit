<?php
/**
 * 参考 https://dashkit.goodthemes.co
 *
 * @package Dashkit
 * @author 0x400
 * @version 1.0
 * @link https://0x400.net
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div id="main" role="main">
  <?php while ($this->next()): ?>
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
      <h2 class="post-title" itemprop="name headline"><a itemprop="url"
                                                         href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
      </h2>
      <ul class="post-meta">
        <li><span class="title">发表于：</span>
          <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
        </li>
        <li><span class="title">分类：</span><?php $this->category(','); ?></li>
        <li><?php Views_Plugin::theViews('<span class="title">访问：</span>', '&nbsp;次'); ?></li>
      </ul>
      <div class="post-content" itemprop="articleBody">
        <?php $this->content('- 阅读剩余部分 -'); ?>
      </div>
    </article>
  <?php endwhile; ?>

  <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
