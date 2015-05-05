<?php
/**
*
* @package SiteSplat Functions for the BBcore
* @author ThemeSplat info@sitesplat.com
* @version 4.1.0
* @copyright (c) 2014 http://sitesplat.com
* @license DO NOT STEAL/COPY MY WORK?
*
*/
function sitesplat_user_avatar($avatar, $avatar_type, $avatar_width, $avatar_height, $alt = 'USER_AVATAR', $ignore_config = false)
{
	global $user, $config, $phpbb_root_path, $phpEx;

	if (empty($avatar) || !$avatar_type || (!$config['allow_avatar'] && !$ignore_config))
	{
		return '';
	}

	$avatar_img = '';

	switch ($avatar_type)
	{
		case AVATAR_UPLOAD:
			if (!$config['allow_avatar_upload'] && !$ignore_config)
			{
				return '';
			}
			$avatar_img = $phpbb_root_path . "download/file.$phpEx?avatar=";
		break;

		case AVATAR_GALLERY:
			if (!$config['allow_avatar_local'] && !$ignore_config)
			{
				return '';
			}
			$avatar_img = $phpbb_root_path . $config['avatar_gallery_path'] . '/';
		break;

		case AVATAR_REMOTE:
			if (!$config['allow_avatar_remote'] && !$ignore_config)
			{
				return '';
			}
		break;
	}

	$avatar_img .= $avatar;
	return '<img src="' . (str_replace(' ', '%20', $avatar_img)) . '" width="' . $avatar_width . '" height="' . $avatar_height . '" alt="' . ((!empty($user->lang[$alt])) ? $user->lang[$alt] : $alt) . '" />';
}
?>