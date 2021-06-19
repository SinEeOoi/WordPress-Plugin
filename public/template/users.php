<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();?>

<article <?php post_class(); ?>>
    <br>
    <!--Show user details-->
    <div id="ext-usr-detail"></div><br>
    
    <!--Show user table-->
	<div class="entry-content"><br>
		<div id="ext-usr-list-wrapper"></div>
	</div><!-- .entry-content -->	
	
</article><?php

get_footer();
