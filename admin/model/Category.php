<?php
class Category
{
	public $count = 0;
	public static function getCategories($type='category',$lang='ru')
	{
		global $db;
		$data = $db->query("SELECT id,post_name,position,parent,type FROM dbi_posts WHERE type = '".$type."' AND lang = '".$lang."' ORDER BY position");
		$data =  Db::returnResults($data,true);
		return $data;
	}

	public static function saveSortableElement($json_string)
	{
		$sortable = json_decode($json_string);
		if( is_array($sortable) && count($sortable) )
		{
			$sql_string = 'UPDATE dbi_posts SET position = CASE id';
			$id_in = '';
			foreach ($sortable as $key => $sort ) {
				$and = ' ';
				if( $key ){
					$and = ', ';
				}
				$sql_string .= " WHEN '".$sort->id."' THEN '".$sort->position."'";
				$id_in .= $and . "'" .$sort->id . "'" ;
			}
			global $db;
			$sql_string .= " ELSE position END WHERE id IN(".$id_in.")";
			$error = $db->query($sql_string);
			return $error;
		}else
		{
			return false;
		}
		
	}

	public static function categoryTemplateTree($arr,$count=0)
	{
		foreach ( $arr as $key => $post ) {
			if( !$post['parent'] )
			{
				$count = 0;
			}
			?>
				<li style="margin-left: <?=$count;?>px;margin-top:10px" data-post-id="<?=$post['id']?>" data-post-position="<?=$post['position']?>" class="ui-state-default">
						<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
						<a class="name_sortable_element" href="?page=singl<?=$post['type']?>&post_id=<?=$post['id']?>"><?=$post['post_name']?></a>
						<a class="pull-right link-post-opt redact-link-color" href="?page=singl<?=$post['type']?>&post_id=<?=$post['id']?>">Редактировать</a>
						<a onclick="return confirm('Удалить елемент?')" class="pull-right link-post-opt remove-link-color" href="?page=singl<?=$post['type']?>&remove_post=<?=$post['id']?>">Удалить</a>
				</li>
				<?php 
					if( count($post['children']) > 0 ){
						$count = $count + 20;

						Category::categoryTemplateTree($post['children'],$count);

						$count = $count - 20;
					}
				?>
			<?php
		}
	}
}