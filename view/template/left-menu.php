<?php
 if( !$depth )
 {
 	$menu_html .= '<ul id="mega-1" class="mega-menu">';
 }
if( is_array($menuTree) )
{
	foreach ( $menuTree as $k => $v ) {
		$menu_html .= '<li>';
		$menu_html .= '<a href="/'.$arrItemMenu[$v['id']]['url'].'">'.$arrItemMenu[$v['id']]['post_name'].'</a>';

		if( isset($v['children']) && count($v['children']) > 0 )
		{
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