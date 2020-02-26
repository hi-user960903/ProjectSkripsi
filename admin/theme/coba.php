<!--<link href="style.css" rel="stylesheet" type="text/css" />-->

<script type="text/javascript" src="slider_files/jquery.js"></script>
<script type="text/javascript" src="slider_files/basic-jquery-slider.js"></script>

<script>
		jQuery(document).ready(function(){			
			jQuery('#tuts-slider').bjqs({
		      'animation' : 'slide',
		      'width' : 800,
		      'height' : 200,
		      'showMarkers' :false,
		      nextText: '<i class="icon-chevron-right">next</i>',
			  prevText: '<i class="icon-chevron-left">prev</i>',
		    });
		});
	</script>
	
	
	

	<style>

/* Slider */

*{padding:0; margin:0;}

#tuts-slider{
	margin:auto;
	position: relative; 
	 
}
#tuts-slider .bjqs{ 
	position: absolute; 
	height: 200px;
	overflow: hidden;
}
#tuts-slider ul{
	list-style-type: none;
}
#tuts-slider .bjqs li{
	border-top:none;
	padding:0;
	float: left;
}
#tuts-slider .bjqs-controls {
	position:absolute;
	top:10px;
	left:-5px;
	
}
#tuts-slider .bjqs-controls:before{
	content:"";
	width:4px;
	height:4px;	
	position: absolute;
	bottom:-5px;
	left:0;
}
#tuts-slider .bjqs-controls li{
	border-top:none;
	padding:0;
}
#tuts-slider .bjqs-controls li:first-child{
	border-bottom:1px solid #ddd;
}
#tuts-slider .bjqs-controls li a{
	padding:5px;
	text-decoration:none;
	background:white;
	display: block;
	color:#000;	
	font:normal 12px arial;
}
#tuts-slider .bjqs-controls li a:hover{
	text-decoration: none;
	background:#efefef;
}
#tuts-slider img{
	height: 200px; width: 800px; float: left; position: relative; 
}   

</style>

<div id="tuts-slider">	 
	<ul class="bjqs">
		<li class="bjqs-slide clone">
			<a href="#" target="_blank"><img src="slider_files/1.jpg" alt=""></a></li>	
		<li class="bjqs-slide clone">
			<a href="#" target="_blank"><img src="slider_files/2.jpg" alt=""></a></li>			
		<li class="bjqs-slide clone">
			<a href="#" target="_blank"><img src="slider_files/3.jpg" alt=""></a></li>			
		<li class="bjqs-slide clone">
			<a href="#" target="_blank"><img src="slider_files/4.jpg" alt=""></a></li>	
	</ul>		
</div>
