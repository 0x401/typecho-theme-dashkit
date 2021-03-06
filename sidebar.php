<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="secondary" role="complementary">
  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title">热门文章</h3>
      <ul class="widget-list recent">
        <?php getHotPosts(); ?>
      </ul>
    </section>
  <?php endif; ?>
  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title">最新文章</h3>
      <ul class="widget-list recent">
        <?php $this->widget('Widget_Contents_Post_Recent')
          ->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?>
      </ul>
    </section>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title">最近回复</h3>
      <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while ($comments->next()): ?>
          <li><a
              href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?>
          </li>
        <?php endwhile; ?>
      </ul>
    </section>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title">分类</h3>
      <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list cat'); ?>
    </section>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title">归档</h3>
      <ul class="widget-list month">
        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 m 月')
          ->parse('<li><a href="{permalink}" title="{title}">{date}</a></li>'); ?>
      </ul>
    </section>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title">其它</h3>
      <ul class="widget-list other">
        <?php if ($this->user->hasLogin()): ?>
          <li class="last"><a href="<?php $this->options->adminUrl(); ?>">进入后台 (<?php $this->user->screenName(); ?>)</a>
          </li>
          <li><a href="<?php $this->options->logoutUrl(); ?>">退出</a></li>
        <?php else: ?>
          <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>">登录</a></li>
        <?php endif; ?>
        <li><a href="<?php $this->options->feedUrl(); ?>">文章 RSS</a></li>
        <li><a href="<?php $this->options->commentsFeedUrl(); ?>">评论 RSS</a></li>
        <li><a href="http://www.typecho.org">Typecho</a></li>
      </ul>
    </section>
  <?php endif; ?>

</div><!-- end #sidebar -->
