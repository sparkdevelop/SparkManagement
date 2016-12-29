<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>火花后台</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 16px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	h{
		font-size: 22px;
		font-weight: bold;
	}
	</style>
</head>

<?php
$this->load->view('template/header.php');
?>

<div class="content">
        <p>

		<h>开发者注意</h><br />
			1、主要文件夹：application中的controllers、models、views文件夹，assets文件夹存放css\js\img文件。<br />
			2、每个开发者都把自己的文件放在对应的文件夹里，以免混在一起，不好辨认。<br />
			3、views里的template文件夹里存放了公共的模板，可直接用，不要再自己复制一个了。header里有一些公共的必用样式，如果有单独的样式，可在自己的文件中单独引用。<br />
			4、CI用户手册:<a href="http://codeigniter.org.cn/user_guide/index.html" target="_blank">http://codeigniter.org.cn/user_guide/index.html</a><br />
            5、本地开发时，更改下config/database.php里的数据库配置，且先下载git上的最新代码。
			<br />

		火花后台主要分为三大部分：数据分析、用户管理、内容管理。<br />
		目前都是针对wiki的数据，还未对论坛的数据进行分析。<br />
			<br />
		<h>数据分析</h><br />
		数据分析主要针对用户数据和词条数据做可视化呈现。目前的需求如下：<br />
		用户数据可视化包含：新增用户数、总用户数、活跃用户数随时间的变化<br />
		词条数据可视化包含：词条数、编辑数、访问数随时间的变化<br />

		开发者：沈丹阳、黄萌
		<br />
	    <br />
		<b>目前已实现：</b><br />
		1、获取新增用户数、总用户数随时间变化的值，并实现可视化；<br />
		2、获取总词条数、总编辑数、词条总访问数的值。<br />
		<br />
		<b>需完善：</b><br />
		1、折线图的体验优化：<br />
		*  横轴可左右平移；<br />
		* 横轴的时间显示超过7个点的数，能适应屏幕；<br />
		* 折线图上关键点的提示字符要友好，换成具体数值。<br />

		2、页面调整：<br />
		* 将折线图合并到用户增长列表页，因为他们是同一类型的数据，不用分两个页面；<br />
		* 细节样式调整。<br />

		3、代码调整：<br />
		* 既然用了框架，就要发挥框架的优势，像数据库连接，就要放在公共配置里，不要在自己的文件里写。<br />
		* 样式要与html代码分离，放在assets文件里的相应文件夹里。<br />
    	<br />

	    <b>仍待开发：</b><br />
		1、能对活跃用户进行分析；<br />
		2、能加入时间维度，对词条数、编辑数和访问数进行可视化；<br />
		3、热门搜索。<br />

     	<br />
		<h>用户管理</h><br />
		用户管理主要实现对wiki用户的查看、删除、分组、权限管理、消息发送、多个子系统间用户数据共享等功能。<br />

		开发者：谌利
		<br />
		<br />
		<b>目前已实现：</b><br />
		1、所有用户的列表；<br />
		2、用户的删除操作。<br />
		<br />
		<b>仍待开发：</b><br />
		1、多个子系统间的单点登录问题；<br />
		2、通过站内信或者邮件的形式给用户群发消息；<br />
		3、用户分组与权限管理。<br />
	    <br />
		<h>内容管理</h><br />
		内容管理主要实现对wiki词条的查看、删除、分组、权限管理、消息发送、多个子系统间用户数据共享等功能。<br />

		开发者：暂无<br />
	    <br />

	</p>

</div>

<?php
$this->load->view('template/footer.php');
?>