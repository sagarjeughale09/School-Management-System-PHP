
<div id="content" class="box">

<div class="tabs box">
        <ul>
          <li><a href="#tab01"><span>Term Exam</span></a></li>
          <li><a href="#tab02"><span>Class Test</span></a></li>
          <li><a href="#tab03"><span>Spot Test</span></a></li>
		  
        </ul>
      </div>


<?php
include("show_routine.php");


 //$day=array('sat',)
 
 
 
        $day_result_tab = mysql_query("SHOW COLUMNS FROM std_class_routine where Field like 'd%'"); 		
		
		echo "<div class=\"tabs box\"><ul>";
        
          
        
        while ($day_tab_row=mysql_fetch_array($day_result_tab))
		{
		 echo $day_tab_name=$day_tab_row['Field'];
		 /*
		if ($day_name=='day_sat')
		echo "<div class=\"tit\"><h2>SaturDay </h2></div>";
		elseif($day_name=='day_sun')
		echo "<div class=\"tit\">SunDay </div>";
		elseif($day_name=='day_mon')
		echo "<div class=\"tit\">MonDay </div>";
		elseif($day_name=='day_tue')
		echo "<div class=\"tit\">TuesDay </div>";
		elseif($day_name=='day_wed')
		echo "<div class=\"tit\">WednessDay </div>";
		elseif($day_name=='day_thus')
		echo "<div class=\"tit\">ThusDay </div>";
		else
		echo "<div class=\"tit\">Offday</div>";	
		*/
		echo "<li><a href=\"#$day_name\"><span>$day_tab_name</span></a></li>";
 
        }
 
 echo "</ul></div>";

        $day_result = mysql_query("SHOW COLUMNS FROM std_class_routine where Field like 'd%'"); 		
        while ($day_row=mysql_fetch_array($day_result))
		{
		 $day_name=$day_row['Field'];
		if ($day_name=='day_sat')
		echo "<div class=\"tit\"><h2>SaturDay </h2></div>";
		elseif($day_name=='day_sun')
		echo "<div class=\"tit\">SunDay </div>";
		elseif($day_name=='day_mon')
		echo "<div class=\"tit\">MonDay </div>";
		elseif($day_name=='day_tue')
		echo "<div class=\"tit\">TuesDay </div>";
		elseif($day_name=='day_wed')
		echo "<div class=\"tit\">WednessDay </div>";
		elseif($day_name=='day_thus')
		echo "<div class=\"tit\">ThusDay </div>";
		else
		echo "<div class=\"tit\">Offday</div>";
		
		
		
 

										$routine_result = mysql_query("select * from std_class_routine group by class_id,sec_id"); 		
										//$array['Class'][0]="<b>Time</b>";
										$i=1;
										$k=1;
										while ($routine_row=mysql_fetch_array($routine_result))
										{			
										$j=0;
										//$array['time'][$i]=$routine_row[11];
										 //echo "<br/>select period,(select class_name from std_class_config where id=class_id) as class_name,(select section_name from std_class_section_config where id=sec_id) as sec_name,class_time,$day_name as day_name from std_class_routine where  class_id=$routine_row[8] and sec_id=$routine_row[9]";
										 
											 $insql=mysql_query("select class_time,period,(select class_name from std_class_config where id=class_id) as class_name,(select section_name from std_class_section_config where id=sec_id) as sec_name,class_time,$day_name as day_name from std_class_routine where  class_id=$routine_row[8] and sec_id=$routine_row[9]"); 		
											  while ($insql_row=mysql_fetch_array($insql))
											  {	
											  $array['Class'][$j]=$insql_row['period'];
											  $array['Time'][$j]=$insql_row['class_time'];
											  $class_sec=$insql_row['class_name']."-".$insql_row['sec_name'];
											  $array[$class_sec][$j]=$insql_row['day_name'];
											  //  $array[$j][0]=$insql_row[0];	 
											  //$array[$j][$k]=$insql_row[1];	 			  
											  
											  //$k++;
											  $j++;
											  }
											  
										$i++;		
										}
										html_show_array($array);
										
		
		}






     // $array['period'] = array('1','2','3','4',' X ','5','6','7','8',);  
    /*
	$array['Time'] =array('7-8','8-9','9-10','10-11','11-12','12-13','13-14','14-15','15-16');
    $array['SAT'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
    $array['SUN'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['MON'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['TUE'] = array('s_name,t_name','5_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['WED'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['RHU'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
     */
    

		





?>
<?php // include_once("analyticstracking.php") ?>
</div>