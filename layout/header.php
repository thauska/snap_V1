<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 
/**
 * Layout - header.
 * This layout is baed on a moodle site index.php file but has been adapted to show news items in a different
 * way.
 *<li><a title="Resetar" href="http://200.239.90.67/blocks/accessibility/database.php?redirect=<?=htmlentities("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>&op=reset&scheme=1&userid=20773">R</a></li>

 * @package   theme_snap
 * @copyright Copyright (c) 2015 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$PAGE->set_popup_notification_allowed(false);

// Require standard page js.
 \theme_snap\output\shared::page_requires_js();

echo $OUTPUT->doctype();
?>
       
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <?php
    if (stripos($PAGE->bodyclasses, 'path-blocks-reports') !== false) {
        // Fix IE charting bug (flash stuff does not work correctly in IE).
        echo ("\n".'<meta http-equiv="X-UA-Compatible" content="IE=8,9,10">'."\n");
    }
    ?>
<title><?php echo $OUTPUT->page_title(); ?></title>
<link rel="shortcut icon" href="<?php echo $OUTPUT->favicon() ?>"/>
<?php echo $OUTPUT->standard_head_html() ?>
<meta name="theme-color" content="<?php echo $PAGE->theme->settings->themecolor ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='//fonts.googleapis.com/css?family=Roboto:500,100,400,300' rel='stylesheet' type='text/css'>
<?php

// Front page carousel.
$carousel = false;
if ($PAGE->pagetype === 'site-index' && !empty($PAGE->theme->settings->cover_carousel)) {
    // Output is html from template, but can be empty if no slides.
    $carousel = $OUTPUT->cover_carousel();
}
// Cover images for the site, catagory or course.
$coverimagecss = '';
if ($PAGE->context->contextlevel === CONTEXT_COURSECAT) {
    if ($PAGE->pagelayout === 'coursecategory') {
        $coverimagecss = \theme_snap\local::course_cat_coverimage_css($PAGE->context->instanceid);
    }
} else if ($PAGE->pagelayout === 'frontpage' || $PAGE->pagelayout === 'login') {
    $coverimagecss = \theme_snap\local::site_coverimage_css();
} else {
    $coverimagecss = \theme_snap\local::course_coverimage_css($COURSE->id);
}

if (!empty($coverimagecss) && !$carousel) {
    echo "<style>$coverimagecss</style>";
}
?>

<style>



.list_acc {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.list_acc li {
    float: left;
}

.list_acc li a {
    display: block;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

.list_acc li a:hover {
    background-color: #7F7F7F;
}
</style>

</head>

<style> /*criado*/
#barra-brasil{
    z-index:70;
    position:relative;
}

#menu-barra-temp{
    display: none;
}

#mr-nav{
    position: absolute;
}
.block_settings .block_tree .tree_item.branch{
    padding-top: 25px;
}

.mast-image #page-mast>h1, .mast-image #page-mast>h1 a, .mast-image #page-mast>h1 a:hover{
    text-align: left;
}

.fundo{
background-color:#fff;
}

.fundoR{
background-color:#99CCFF;
}


.fundo1{
background-color:#FFFFCC;
}

.fundo2{
background-color:#99CCFF;
}

.fundo3{
background-color:#000;
}

</style>




<body  <?php echo $OUTPUT->body_attributes(); ?> >

<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
<ul id="menu-barra-temp" style="list-style:none;">
		<li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li> 
		<li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
	</ul>
</div>
<?php echo $this->page->bodyid; ?>

<script> 

    window.onload = function(){
        var i = document.getElementById("page-content");
        var j = i.getElementsByTagName("div")[0];
        if(j.getAttribute("id")=="barra-brasil"){
            j.style.display="none";
        }       
    }


    function trocarLR(){
    	var obj=document.getElementById('page-site-index');
    	if(obj.className==''){
    		obj.className='format-site course path-site safari dir-ltr lang-pt_br yui-skin-sam yui3-skin-sam 200-239-90-67 pagelayout-frontpage course-1 context-2 notloggedin  device-type-default snap-resource-card theme-snap';
    	}else{
    		obj.className='fundoR';
    	 }
    	}
    

    function trocarR(){
    	var obj=document.getElementById('page-course-view-topics');
    	if(obj.className==''){
    		obj.className='format-topics  path-course path-course-view safari dir-ltr lang-pt_br yui-skin-sam yui3-skin-sam 200-239-90-67 pagelayout-course course-2801 context-158833 category-365  device-type-default completion-tracking snap-resource-card theme-snap';
    	}else{
    		obj.className='fundoR';
    	 }
    	}

    

    function trocar(){
    	var obj=document.getElementById('corpo');
    	if(obj.className==''){
    		obj.className='fundo';
    	}else{
    		obj.className='fundo1';
    	 }
    	}
    function trocar2(){
    	var obj=document.getElementById('corpo');
    	if(obj.className==''){
    		obj.className='fundo';
    	}else{
    		obj.className='fundo2';
    	 }
    	}
	
    function trocar3(){
    	var obj=document.getElementById('corpo');
    	if(obj.className==''){
    		obj.className='fundo';
    	}else{
    		obj.className='fundo3';
    	 }
    	}
   
</script>


<div id="accessibility_controls" class="content">
	<ul id="block_accessibility_textresize" class="button_row">
		<li class="access-button"><a title="Diminuir o tamanho do texto"
			id="block_accessibility_dec"
			href="http://200.239.90.67/blocks/accessibility/changesize.php?redirect=http%3A%2F%2F200.239.90.67%2Fuser%2Fprofile.php&amp;op=dec">A-</a></li>
		<li class="access-button"><a id="block_accessibility_reset"
			title="Redefinir tamanho do texto (limpa definição salva)"
			href="http://200.239.90.67/blocks/accessibility/changesize.php?redirect=http%3A%2F%2F200.239.90.67%2Fuser%2Fprofile.php&amp;op=reset"
			class="disabled">A</a></li>
		<li class="access-button"><a title="Aumentar o tamanho do texto"
			id="block_accessibility_inc"
			href="http://200.239.90.67/blocks/accessibility/changesize.php?redirect=http%3A%2F%2F200.239.90.67%2Fuser%2Fprofile.php&amp;op=inc">A+</a></li>
		<li class="access-button"><a title="Salvar definição"
			id="block_accessibility_save"
			href="http://200.239.90.67/blocks/accessibility/database.php?redirect=http%3A%2F%2F200.239.90.67%2Fuser%2Fprofile.php&amp;op=save&amp;size=1&amp;scheme=1">&nbsp;</a></li>
	
	
		<li class="access-button"><a
			title="Default Colour Scheme (Clears Saved Setting)"
			id="block_accessibility_colour1"
			href="#" onclick="trocarR();trocarLR();">R</a></li>
		
		
		
		
		
		<li class="access-button"><a title="Lowered Contrast 1"
			id="block_accessibility_colour2"
			href="#" onclick="trocar();" >A</a></li>
		
		
		
		
		
		
		
		<li class="access-button"><a title="Lowered Contrast 2"
			id="block_accessibility_colour3"
			href="#" onclick="trocar2();">A</a></li>
			
			
			
			
		<li class="access-button"><a title="Alto Contraste"
			id="block_accessibility_colour4"
			href="#" onclick="trocar3();">A</a></li>
	</ul>
	<div id="block_accessibility_message" class="clearfix"></div>
	
</div>
<span id="loader-icon"></span>



     

<?php  echo $OUTPUT->standard_top_of_body_html() ?>

<?php require(__DIR__.'/nav.php');
