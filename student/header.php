<div id="menu" class="box">
    <ul class="box f-right">
	            <?php     $sss = "SELECT id,main_name FROM main_menu WHERE flag='ref_home'";
				                $sst = mysql_query($sss);
							    $rst  = mysql_fetch_row($sst);
								
								$fid  = $rst[0];
								$mname = $rst[1];
				?>
                 <li><a href="../dashboard.php">
				 <span><strong><?php echo $mname;?>  &raquo;</strong></span></a></li>
	  
	  
    </ul>
    <ul class="box">
	
	<?php   
    //$menu_stat=$_GET['menu_status'];		
	if (strtolower($user_type)=='user') 	{
	   $query_head="select * from main_menu where id in (11,12,1,3,6) order by order_id";
	}else if( strtolower($user_type) == 'user' ) {
	   $query_head="select * from main_menu order by ordering";	
	}
	
	$result_head=mysql_query($query_head);	
	while ($row_head=mysql_fetch_row($result_head))	{	
	   //echo "<li id=\"$_GET['menu_status']\"><a href=\"index.php?menu_status=menu-active\"><span>".$row[1]."</span></a></li>";
	   echo "<li><a href=\"javascript:void(0);\" class=\"main_menu_link\"  id=\"$row_head[0]\"><span>";
	   echo $row_head[1];
       echo "</span></a></li>";	   	   
	}		
	?>
	
  <!--
      <li id="menu-active"><a href="http://www.free-css.com/"><span>Lorem ipsum</span></a></li>  
      <li><a href=""><span>Class Information</span></a></li>
      <li><a href=""><span>Result information</span></a></li>
      <li><a href=""><span>sss</span></a></li>
      <li><a href=""><span>Lorem ipsum</span></a></li>
      <li><a href=""><span>Lorem ipsum</span></a></li>
      <li><a href=""><span>Lorem ipsum</span></a></li>
    -->
  
  </ul>
  </div>
  
  <input type="hidden" id="main_menu_container" value=""/>
  
  <script type="text/javascript">
  $(document).ready(function(){
		$(".main_menu_link").click(function(){
			var link_id = $(this).attr("id");
			$("#main_menu_container").val(link_id);
			var main_menu_id = $("#main_menu_container").val();
			//alert(main_menu_id);
			
			$("#left_menu").load("left.php",{'menu_id':main_menu_id},function(){});		 
		});
    		
		$(".sub_menu_link").live('click',function(){
	
			var link_id  = $(this).attr("id");
			//alert(link_id);
			var my_parse = link_id.split('=');
			var url = my_parse[2];
			//alert(url);
			
			var main_menu_id = $("#main_menu_container").val();
			load_content_div(url,main_menu_id);
			
			$(".sub_menu_link").each(function(){
				if($(this).attr("id")!=link_id)
				{
					//$(this).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
					$(this).css({'background-color':'#eaeaea','color':'#000'});
				}
				else
				{
					$(this).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
					$(this).css({'background-color':'#DF0000','color':'#fff'});	
				}	
			});
		
			//var active_link = '#'+link_id;
			//$(active_link).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
			//$(active_link).css({'background-color':'#DF0000','color':'#fff'});
			
			
		});
	
		var load_content_div = function(url,main_menu_id){
			$("#ur_content").load("includes/"+url+".php",function(){});
			//alert(url+main_menu_id);
		}
		/*$('a[name="acls"]').live('click',function(){
		
			var url =$(this).attr('id');
			
			
			var main_menu_id = $("#main_menu_id").val();
			load_content_div(url,main_menu_id);
			
			$('a[name="acls"]').each(function(){
				$(this).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
					$(this).css({'background-color':'#efefef','color':'#000'});
			});
			$('#'+url).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
			$('#'+url).css({'background-color':'#DF0000','color':'#fff'});
			
			
		});
				 
		 $(".sub_menu_link").live("click",function(){
			 var link_id = $(this).attr("id");
			 var parse = link_id.split("=");
			 var main_menu_id = parse[0];
			 var sub_menu_id  = parse[1];
			 var content 	  = parse[2];		 		 
			
			 $("#ur_content").load("includes/"+content+".php",function(){});	
		 });*/
  });
  

  
  /*
  $('a[name="acls"]').live('click',function(){	
		var url =$(this).attr('id');
		var main_menu_id = $("#main_menu_id").val();
		load_content_div(url,main_menu_id);		
		$('a[name="acls"]').each(function(){
			$(this).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
				$(this).css({'background-color':'#efefef','color':'#000'});
		});
		$('#'+url).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
		$('#'+url).css({'background-color':'#DF0000','color':'#fff'});
	});
  */
  </script>
