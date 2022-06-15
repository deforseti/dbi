<?php
 if( !$depth )
 {
 	$menu_html .= '<ul class="main-top-menu">';
 	$menu_html .= '<span class="close-main-menu-mobile glyphicon glyphicon-remove" aria-hidden="true"></span>';
 }
if( is_array($menuTree) )
{
	foreach ( $menuTree as $k => $v ) {
		$menu_html .= '<li ';
		if( isset($v['children']) && count($v['children']) > 0)
		{
			$menu_html .= 'class="icon_submenu"';
		}
		$menu_html .= '><a href="/'.$arrItemMenu[$v['id']]['url'].'">'.$arrItemMenu[$v['id']]['post_name'].'</a>';

		if( isset($v['children']) && count($v['children']) > 0 )
		{
			$menu_html .= '<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>';
			$menu_html .= '<ul>';
			$this->generateHtmlMenu($menu_html,$arrItemMenu,$v['children'],$name_menu,1);
			$menu_html .= '</ul>';
		}

		$menu_html .= '</li>';
		
	}
}
 if( !$depth )
 {
 	$menu_html .= '</ul>';
 }