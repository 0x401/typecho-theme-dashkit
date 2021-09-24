<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main" role="main">
  <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
    <p>你想查看的页面已被转移或删除了, 要不要搜索看看</p>
    <form method="post">
      <p><input type="text" name="s" class="text" autofocus/></p>
      <p>
        <button type="submit" class="submit">搜索</button>
      </p>
    </form>
  </article>
</div><!-- end #main-->
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
