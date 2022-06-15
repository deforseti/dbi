<?php
class Breadcrumbs
{
	public $arr_b = [];
	function __construct($obj)
	{
		if( isset($obj['type']) && $obj['type'] != 'home' )
		{
			$this->testCatOrPost($obj);
			$this->addInArrBread('Главная','/');

			$this->breadcrumbsTemplate($obj);
		}
	}

	public function testCatOrPost($obj)
	{	
		if( $obj['type'] == 'category' || $obj['type'] == 'generalpage' )
		{
			$this->categoryTree($obj);
		}
		else
		{
			$this->postsTree($obj);
		}
	}

	public function categoryTree($elem)
	{
		$this->addInArrBread($elem['post_name'],$elem['url']);
		if( $elem['parent'] != 0 )
		{
			global $db;
			$data = $db->query("SELECT * FROM dbi_posts WHERE id = '".$elem['parent']."' ");
			$data = Db::returnResults($data);
			$this->categoryTree($data);
		}
	}

	public function postsTree($elem)
	{
		$this->addInArrBread($elem['post_name'],$elem['url']);
		if( strlen($elem['categories']) > 1 )
		{
			$ids_cat = json_decode($elem['categories']);
			if( count($ids_cat) )
			{
				global $db;
				$data = $db->query("SELECT * FROM dbi_posts WHERE id = '".$ids_cat[0]."' ");
				$data = Db::returnResults($data);
				$this->categoryTree($data);
			}
		}
	}

	public function addInArrBread($name,$link)
	{	
		$r = [
			'name' => $name,
			'link' => $link
		];
		array_push($this->arr_b,$r);
	}

	public function breadcrumbsTemplate($elem)
	{
		$html_start_wrapp = '';
		$html_end_wrapp = '';
		$html = '';
		$sep = '<span>></span>';
		$microdata_start = '';
		$microdata_end = '';
		$mcrd_body = '';
		$l_bp = ',';
		$count = count($this->arr_b) - 1;
		$sp_num = 1;
		for( $i = $count; $i >= 0; $i--)
		{
			include 'view/template/breadcrumbs.php';
			$sp_num++;
		}
		$br_html = $html_start_wrapp . $html . $html_end_wrapp;
		echo $br_html;
		echo $microdata_start . $mcrd_body . $microdata_end;
	}


}