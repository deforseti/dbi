<?php
$name_block_menu = '';

 
if( is_array($menuTree) )
{
	foreach ( $menuTree as $k => $v ) {
		 if( !$depth )
 		{
 			$name_block_menu = 'class="name-block-menu"';
 			$menu_html .= '<ul>';
 		}
		$menu_html .= '<li>';
		$menu_html .= '<a '.$name_block_menu.' href="/'.$arrItemMenu[$v['id']]['url'].'">'.$arrItemMenu[$v['id']]['post_name'].'</a>';
		$menu_html .= '</li>';
		if( isset($v['children']) && count($v['children']) > 0 )
		{
			$this->generateHtmlMenu($menu_html,$arrItemMenu,$v['children'],$name_menu,1);
		}
		if( !$depth )
 		{
 			$menu_html .= '</ul>';
 		}
		
	}
}
	