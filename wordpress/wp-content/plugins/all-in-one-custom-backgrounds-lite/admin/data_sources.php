<?php

VP_Security::instance()->whitelist_function( 'is_color' );

function is_color($value)
{
	if($value === 'color')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function( 'is_gradient' );

function is_gradient($value)
{
	if($value === 'gradient')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function( 'is_image' );

function is_image($value)
{
	if($value === 'image')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function( 'is_custom' );

function is_custom($value)
{
	if($value === 'custom')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function( 'is_group' );

function is_group($value)
{
	if($value === 'group')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function( $fpbgPagePrefix.'is_video_youtube' );

function is_video_youtube($value)
{
	return $value === 'video-youtube';
}

VP_Security::instance()->whitelist_function( $fpbgPagePrefix.'is_video_type' );

function is_video_type($value)
{
	return $value === 'video-youtube';
}

VP_Security::instance()->whitelist_function( $fpbgPagePrefix.'is_not_video_type' );

function is_not_video_type($value)
{
	return !is_video_type($value);
}

VP_Security::instance()->whitelist_function('is_enabled');

function is_enabled($value)
{
	if($value === '1')
		return true;
	return false;
}


VP_Security::instance()->whitelist_function('is_disabled');

function is_disabled($value)
{
	if($value === '0')
		return true;
	return false;
}

function aiocb_get_backgroundGroups()
{
	$wp_posts = get_posts(array(
			'posts_per_page' => -1,
            'post_type' => 'backgroundgroup',
            'post_status' => 'publish'
	));

	$result = array();
	foreach ($wp_posts as $post)
	{
		$result[] = array('value' => $post->ID, 'label' => $post->post_title);
	}
	return $result;
}