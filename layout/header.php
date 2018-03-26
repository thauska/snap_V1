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
 *
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
    /*background-color: rgba(255,255,255,.9);*/
}
.block_settings .block_tree .tree_item.branch{
    padding-top: 25px;
}

.mast-image #page-mast>h1, .mast-image #page-mast>h1 a, .mast-image #page-mast>h1 a:hover{
    text-align: left;
}*/

</style>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
<ul id="menu-barra-temp" style="list-style:none;">
		<li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li> 
		<li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
	</ul>
</div>

<script> /* Gio's Contribuições */
    window.onload = function(){
        var i = document.getElementById("page-content");
        var j = i.getElementsByTagName("div")[0];
        if(j.getAttribute("id")=="barra-brasil"){
            j.style.display="none";
        }
        
    }
</script>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php require(__DIR__.'/nav.php');
