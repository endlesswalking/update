<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言總覽</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript">
</script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	#container{ width:1024px; height:auto; font-family:"微軟正黑體";
		}
	#header{ width:auto; height:auto; float:left;	
		}
	#sider{ clear:both; width:auto; height:auto; float:right; margin-top:5px;
		}
	#content{ width:900px; height:auto; float:left;
		}
	#footer{ clear:both;
		}
	a{ text-decoration:none;}

</style>
</head>

<body>
<center>
    <div id="container">
        <div id="header"><img src="path.jpg" width=1024px;  />
        <br /><br /><br />
        </div>

        <div id="sider">
        	<table border="1px" cellspacing="0" width="90px" style="font-size:16px; text-align:center" bordercolor="#FF0000">
            	<a href="logout.php"><font size="+2" color="#FF0000"> 登出</font></a>
            </table>
            <br/>
        	<font size="+1">&nbsp;聯絡我們</font><br/><br/>
        	<table border="1px" cellspacing="0" width="120px" style="font-size:16px; text-align:center">
  				<tr>
    				<td><img src="picture/1378581_528421693903015_557834180_n.jpg" width="114px" height="114px" align="top" />
    					<p>職位 : 場器長</p>
   					 	<p>系級 : 105級</p>
    					<p>姓名 : <a href="https://www.facebook.com/he.r.huang.1"; target=_blank; style="color:#00F">黃河榮</a></p>
				  </td>
				</tr>
  				<tr>
   					<td ><img src="picture/268081_103286769768169_7429595_n.jpg" width="114px" height="114px" alt="丞崇寧頭貼" />
                    	<p>職位 : 場器長</p>
    					<p>系級 : 105級</p>
    					<p>姓名 : <a href="https://www.facebook.com/profile.php?id=100002605394257
					"; target=_blank; style="color:#00F">程崇寧</a></p>
</td>
  </tr>
  </table>
        </div>

        <div id="content">
			<ul id="MenuBar1" class="MenuBarHorizontal">
           		<li><a class="MenuBarItemSubmenu">會員管理</a>
                	<ul>
						<li><a href="totalMember.php">會員總覽</a></li>
						<li><a href="addMember.php">新增會員</a></li>
						<li><a href="deleteMember.php">刪除會員</a></li>
						<li><a href="updateMember.php">修改會員資料</a></li>
					</ul>
                </li>
                
                <li><a class="MenuBarItemSubmenu">物品管理</a>
                	<ul>
						<li><a href="totalEquipment.php">物品總覽</a></li>
						<li><a href="addEquipment.php">新增物品</a></li>
						<li><a href="deleteEquipment.php">刪除物品</a></li>
                        <li><a href="updateEquipment.php">修改物品資料</a></li>
					</ul>
                </li>
                
                <li><a class="MenuBarItemSubmenu">留言管理</a>
                	<ul>
						<li><a href="totalArticle.php">留言總覽</a></li>
						<li><a href="deleteArticle.php">刪除留言</a></li>
					</ul>
                </li>
        
			</ul>
			<script type="text/javascript">
			var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
			</script>
            <div><br><br><br>
            <P>
           <form action="totalArticle.php" method="post">
            請點選類別:
            <input name="class" type="radio" value="BB001">書
            <input name="class" type="radio" value="BB002">電腦
            <input name="class" type="radio" value="BB003">會議室
            <input name="class" type="radio" value="BB004">電器
            <input name="class" type="radio" value="BB005">音效設備
            <input name="class" type="radio" value="BB006">日常用品
            <input type="submit" value="送出" />
            </form>
			</p>
            
            <?php	
				if(isset($_POST["class"]))
				{
					$class = $_POST["class"];
	
					date_default_timezone_set('Asia/Taipei');
					$nowTime = date("Y-m-d H:i:s");
		
					@ $bool = mysql_connect('127.0.0.1','group11','group11');
					@ mysql_select_db('group11');
					@ mysql_set_charset('utf8');
					@ $query = mysql_query("SELECT aId,sName,title,time 
					                        FROM article JOIN student ON article.sId = student.sId 						                                            WHERE bNo='$class'");
					$row = mysql_num_rows($query);
					if($row == 0)
					{
						?><br><?php
						echo "目前尚無留言";
					}
					else
					{
						$field = mysql_num_fields($query);
						$i=0; $j=0;
						?>
						<table border="1" cellspacing="0">
						<tr><th width="80" height="60">編號</th>
                        	<th width="130">貼文者</th>
							<th width="400">內容</th>
                            <th width="200">時間</th>
						<?php
						for($i=0;$i<$row;$i++)
						{?><TR><?php
							for($j=0;$j<$field;$j++)
							{?><td align="center" height="37"><?php
								$result = mysql_result($query,$i,$j);	
								echo $result;?></td><?php
							}?></tr><?php
						}
					}
					?></table><?php
				}
				else
				{
					echo "請點選一個類別";
				}
				?><br><br>
        <div id="footer">
        	<br />        	
            <hr size="2" color="#999999"/>
        </div>
    </div>
</center>
</body>
</html>
