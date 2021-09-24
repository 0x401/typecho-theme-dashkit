<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
  exit;
}

function themeConfig($form)
{
  $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', null, null, '站点 LOGO 地址', '在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO');
  $form->addInput($logoUrl);

  $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
    array('ShowHotPosts' => '显示热门文章',
      'ShowRecentPosts' => '显示最新文章',
      'ShowRecentComments' => '显示最近回复',
      'ShowCategory' => '显示分类',
      'ShowArchive' => '显示归档',
      'ShowOther' => '显示其它杂项'),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), '侧边栏显示');

  $form->addInput($sidebarBlock->multiMode());
}

function getBingImage()
{
  //$con = mysqli_connect("127.0.0.1", "xx", "xx", "xx") or die(mysqli_connect_error());
  //$sql = "select `url` from `bing` where `date`='" . date('Y-m-d') . "'";
  //$query = mysqli_query($con, $sql) or die(mysqli_error($con));
  //$result = mysqli_fetch_array($query);
  //mysqli_close($con);
  //$bing = $result[0];
  $bing = '';
  if ($bing == 'https://www.bing.com' || empty($bing)) {
    $bing = 'https://www.bing.com/th?id=OHR.ElbeBastei_ZH-CN9708654240_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp';
  }
  return $bing;

}

function getHotPosts($limit = 5, $sortBy = 'views')
{
  $minView = [
    'views' => 100,
    'commentsNum' => 5,
  ];
  $archive = Typecho_Widget::widget('Widget_Archive');
  $db = Typecho_Db::get();
  $select = $db->select()->from('table.contents')
    ->where('table.contents.type = ?', 'post')
    ->where('table.contents.status = ?', 'publish')
    ->limit($limit)
    ->order("table.contents.$sortBy", Typecho_Db::SORT_DESC)
    ->where("table.contents.$sortBy >= ?", $minView["$sortBy"]);
  $rows = $db->fetchAll($select);
  foreach ($rows as $row) {
    $row = $archive->filter($row);
    echo '<li><a ' . $linkClass . 'href="' . $row['permalink'] . '" title="' . $row['title'] . '">' . $row['title'] . '</a></li>';
  }
}
