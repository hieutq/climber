<div id="contents_Left">
<div id="menu_box">
<ul id="nav">
<li><a href="./"><img src="./images/menu01.gif" width="150" height="33" class="hoverImg" /></a></li>
<li><a href="./?mode=content&pid=1"><img src="./images/menu02.gif" alt="軽金属学会" width="150" height="33" class="hoverImg" /></a>
<ul>
<?
print Jilm_Menu_Create(1);
?>
</ul>
</li>
<li><a href="./?mode=content&pid=12"><img src="./images/menu03.gif" alt="委員会" width="150" height="33" class="hoverImg" /></a>
<ul>
<?
print Jilm_Menu_Create(2);
?>
</ul>
</li>
<?php
$jilm_menu_30_status=Jilm_Menu_Get_Status(30);
 if ($jilm_menu_30_status == 0) : 
?>
<li><!-- <a href="#"> --><a href="./?mode=content&pid=219"><img src="./images/menu15.gif" alt="研究部会" width="150" height="33" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(30);
?>
</ul>
</li>
<?php endif; ?>
<li><a href="./?mode=content&pid=22"><img src="./images/menu04.gif" alt="支部活動" width="150" height="33" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(3);
?>
</ul>
</li>
<li><a href="./?mode=calendar_list"><img src="./images/menu06.gif" alt="行事カレンダー" width="150" height="33" class="hoverImg" /></a></li>
<li><a href="./?mode=content&pid=156"><img src="./images/menu07.gif" alt="講演大会・国際会議" width="150" height="33" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(6);
?>
</ul>
</li>
<li><a href="./?mode=content&pid=208"><img src="./images/menu08.gif" alt="シンポジウム・セミナー・基礎技術講座" width="150" height="43" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(7);
?>
</ul>
</li>

<li><a href="./?mode=content&pid=89"><img src="./images/menu09.gif" alt="会誌「軽金属」" width="150" height="33" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(8);
?>
</ul>
</li>

<li><a href="./?mode=booklist"><img src="./images/menu10.gif" alt="出版物" width="150" height="33" class="hoverImg" /></a></li>
<li><a href="./?mode=content&pid=90"><img src="./images/menu11.gif" alt="表彰・人材育成・インターンシップ" width="150" height="43" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(10);
?>
</ul>
</li>
<li><a href="./?mode=content&pid=59"><img src="./images/menu12.gif" alt="エッセイ・リンク・データベース" width="150" height="43" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(11);
?>
</ul>
</li>
<li><a href="./?mode=content&pid=211"><img src="./images/menu13.gif" alt="入会・会員" width="150" height="33" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(12);
?>
</ul>
</li>
<li><a href="./?mode=content&pid=210"><img src="./images/menu14.gif" alt="HPからの申込" width="150" height="33" class="hoverImg" /></a>
<ul>
<?php
print Jilm_Menu_Create(13);
?>
</ul>
</li>
</ul>
<div><img src="./images/menu_ft.gif" alt="" width="160" height="3" /></div>
</div>
</div>

<div class="crr"></div>
</div>
</div>
