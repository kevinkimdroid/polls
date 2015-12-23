<?php

$link = mysql_connect("localhost", "root", "");
mysql_select_db("mlab", $link);

$chairs1 = 'chagusia';

$result = mysql_query("SELECT academics FROM aspirants ", $link);
$num_row = @mysql_num_rows($result);

$results1 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs1'  ", $link);
$num_rows1 = @mysql_num_rows($results1);

$num1 = "$num_row ";
$nums1 = "$num_rows1 ";
$div1 = ($nums1/$num1)*100;
$ron1=round($div1,2);


$chairs2 = 'chumba';

$results2 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs2'  ", $link);
$num_rows2 = @mysql_num_rows($results2);

$num2 = "$num_row ";
$nums2 = "$num_rows2 ";
$div2 = ($nums2/$num1)*100;
$ron2=round($div2,2);


$chairs3 = 'geoffrey';

$results3 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs3'  ", $link);
$num_rows3 = @mysql_num_rows($results3);

$num3 = "$num_row ";
$nums3 = "$num_rows3 ";
$div3 = ($nums3/$num1)*100;
$ron3=round($div3,2);


$chairs4 = 'brian';

$results4 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs4'  ", $link);
$num_rows4 = @mysql_num_rows($results4);

$num4 = "$num_row ";
$nums4 = "$num_rows4 ";
$div4 = ($nums4/$num1)*100;
$ron4=round($div4,2);


$chairs5 = 'masaba';

$results5 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs5'  ", $link);
$num_rows5 = @mysql_num_rows($results5);

$num5 = "$num_row ";
$nums5 = "$num_rows5 ";
$div5 = ($nums5/$num1)*100;
$ron5=round($div5,2);


$chairs6 = 'sammy';

$results6 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs6'  ", $link);
$num_rows6 = @mysql_num_rows($results6);

$num6 = "$num_row ";
$nums6 = "$num_rows6 ";
$div6 = ($nums6/$num1)*100;
$ron6=round($div6,2);


$chairs7 = 'jairo';

$results7 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs7'  ", $link);
$num_rows7 = @mysql_num_rows($results7);

$num7 = "$num_row ";
$nums7 = "$num_rows7 ";
$div7 = ($nums7/$num1)*100;
$ron7=round($div7,2);


$chairs8 = 'moses';

$results8 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs8'  ", $link);
$num_rows8 = @mysql_num_rows($results8);

$num8 = "$num_row ";
$nums8 = "$num_rows8 ";
$div8 = ($nums8/$num1)*100;
$ron8=round($div8,2);


$chairs9 = 'nchwaga';

$results9 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs9'  ", $link);
$num_rows9 = @mysql_num_rows($results9);

$num9 = "$num_row ";
$nums9 = "$num_rows9 ";
$div9 = ($nums9/$num1)*100;
$ron9=round($div9,2);


$chairs10 = 'victor';

$results10 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs10'  ", $link);
$num_rows10 = @mysql_num_rows($results10);

$num10 = "$num_row ";
$nums10 = "$num_rows10 ";
$div10 = ($nums10/$num1)*100;
$ron10=round($div10,2);


$chairs11 = 'waiyaki';

$results11 = mysql_query("SELECT academics FROM aspirants WHERE academics = '$chairs11'  ", $link);
$num_rows11 = @mysql_num_rows($results11);

$num11 = "$num_row ";
$nums11 = "$num_rows11 ";
$div11 = ($nums11/$num1)*100;
$ron11=round($div11,2);




/*<?*/
	# ------- The graph values in the form of associative array
	$values=array(
		"Chagusia" => $ron1,
		"Chumba" => $ron2,
		"Geoffrey" => $ron3,
		"Brian" => $ron4,
		"Masaba" => $ron5,
		"Sammy" => $ron6,
		"Jairo" => $ron7,
		"Moses" => $ron8,
		"Nchwaga" => $ron9,
		"Victor" => $ron10,
		"Waiyaki" => $ron11
		
	);

 
	$img_width=400;
	$img_height=250; 
	$margins= 20;

 
	# ---- Find the size of graph by substracting the size of borders
	$graph_width=$img_width - $margins * 2;
	$graph_height=$img_height - $margins * 2; 
	$img=imagecreate($img_width,$img_height);

 
	$bar_width=20;
	$total_bars=count($values);
	$gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);

 
	# -------  Define Colors ----------------
	$bar_color=imagecolorallocate($img,0,64,128);
	$background_color=imagecolorallocate($img,240,240,255);
	$border_color=imagecolorallocate($img,200,200,200);
	$line_color=imagecolorallocate($img,220,220,220);
 
	# ------ Create the border around the graph ------

	imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
	imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);

 
	# ------- Max value is required to adjust the scale	-------
	$max_value=max($values);
	$ratio= $graph_height/$max_value;

 
	# -------- Create scale and draw horizontal lines  --------
	$horizontal_lines=20;
	$horizontal_gap=$graph_height/$horizontal_lines;

	for($i=1;$i<=$horizontal_lines;$i++){
		$y=$img_height - $margins - $horizontal_gap * $i ;
		imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
		$v=intval($horizontal_gap * $i /$ratio);
		imagestring($img,0,5,$y-5,$v,$bar_color);

	}
 
 
	# ----------- Draw the bars here ------
	for($i=0;$i< $total_bars; $i++){ 
		# ------ Extract key and value pair from the current pointer position
		list($key,$value)=each($values); 
		$x1= $margins + $gap + $i * ($gap+$bar_width) ;
		$x2= $x1 + $bar_width; 
		$y1=$margins +$graph_height- intval($value * $ratio) ;
		$y2=$img_height-$margins;
		imagestring($img,0,$x1+3,$y1-10,$value,$bar_color);
		imagestring($img,0,$x1+3,$img_height-15,$key,$bar_color);		
		imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
	}
	header("Content-type:image/png");
	imagepng($img);



?>
