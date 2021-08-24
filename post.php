<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div  id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta">
            <li><span class="title">发表于：</span><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
          <li class="modified"><span class="title">更新于：</span><time datetime="<?php echo date('c',$this->modified);?>" itemprop="dateModified"><?php echo date('Y-m-d', $this->modified);?></time></li>
          <li><span class="title">分类：</span><?php $this->category(','); ?></li>
            <li><?php Views_Plugin::theViews('<span class="title">访问：</span>','&nbsp;次'); ?></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <?php if ($this->tags): ?>
        <p itemprop="keywords" class="tags">标签：<?php $this->tags(', ', true, 'none'); ?></p>
        <?php endif ?>
    </article>

    <?php /* $this->need('comments.php'); */?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
