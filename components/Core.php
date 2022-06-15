<?php
class Core
{
	public static function ClearSearchString($str)
	{
    	$quotes = array ("\x27", "\x22", "\x60", "\t", "\n", "\r", "*", "%", "<", ">", "?", "!" );
    	$goodquotes = array ("-", "+", "#" );
    	$repquotes = array ("\-", "\+", "\#" );
    	$str = trim( strip_tags( $str ) );
    	$str = str_replace( $quotes, '', $str );
    	$str = str_replace( $goodquotes, $repquotes, $str );
    	$str = str_replace(" +", " ", $str);       
    	return $str;
	}

    public static function getACF($post_id,$field_name)
    {

        if( (int)$post_id && is_array($field_name) && count($field_name) )
        {
            global $db;
            $sql_start = "SELECT meta_value,meta_key FROM dbi_postmeta WHERE post_id = '".$post_id."' AND (";
            $sql_body = '';
            $sql_end = ')';

            $sep = '';

            foreach ( $field_name as $i => $field ) {
                if( $i )
                {
                    $sep = ' OR ';
                }
                $sql_body .= $sep . "meta_key = '".$field."'";
            }

            $sql_query = $sql_start . $sql_body . $sql_end;
            $data = $db->query($sql_query);
            $result = Db::returnResults($data,true);
            return self::createArrayFieldData($result);
        }
        
    }

    public static function createArrayFieldData($data)
    {
        $data_field_array = array();
        if(isset($data) && is_array($data))
        {
            foreach ($data as $key => $v ) {
            $data_field_array[$data[$key]['meta_key']] = self::remSleshers($data[$key]['meta_value']);
            }
            return $data_field_array;
        }else
        {
            return $data;
        }
        
    }

    public static function remSleshers($v)
    {
        if( strlen($v) )
        {
            $v = json_decode($v);
            return $v;
        } 
    }

    public static function GetFromDb($sql_str,$arr=false)
    {
        global $db;
        $data = $db->query($sql_str);
        return Db::returnResults($data,$arr);
    }
    public static function imgUrl($url_img)
    {
        $stubImgUrl = '../uploads/stub_dbi.jpg';
        if( strlen($url_img) )
        {
            return $url_img;
        }else
        {
            return $stubImgUrl;
        }
    }

    public static function logoСyclicLink($type)
    {
        if( $type == 'home' )
        {
            $html = '<img src="/uploads/images/logo_dbi_none_bg.png">';
            return $html;
        }else
        {
            $html = '<a href="/">
                    <img src="/uploads/images/logo_dbi_none_bg.png">
                </a>';
            return $html;
        }
    }

    public static function check_redirect_available($code)
    {
        $available_codes = [301,302];
        return in_array($code, $available_codes);
    }

    public static function setCanonical($post_id,$canonical)
    {
        global $db;
        return $db->query("UPDATE dbi_posts SET `canonical` = '" . $canonical. "' WHERE id = '".$post_id."' ");
    }
}