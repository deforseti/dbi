<?php
if( !$i )
{
	$html_start_wrapp .= '<div class="container-fluid"><div class="col-lg-12 breadcrumbs">';
	$html_end_wrapp .= '</div></div>';
	$sep = '';
	$l_bp = '';
	$microdata_start = '  
		<script type="application/ld+json">
        {
         "@context": "http://schema.org",
         "@type": "BreadcrumbList",
         "itemListElement":
         [
	';
	$microdata_end = '  
		 ]
        }
    </script>
	';
	$html .= '<span>'.$this->arr_b[$i]['name'].'</span>'. $sep;
}
else
{
	$html .= '<span><a href="'.$this->arr_b[$i]['link'].'">'.$this->arr_b[$i]['name'].'</span></a>'. $sep;
}
$mcrd_body .= '
	{
      "@type": "ListItem",
      "position": '.$sp_num.',
      "item":
      {
       "@id": "'.$this->arr_b[$i]['link'].'",
       "name": "'.$this->arr_b[$i]['name'].'"
       }
     }'.$l_bp;

?>
