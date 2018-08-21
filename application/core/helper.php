<?php

class Helper{
    
    static function generate_pagination($url,$numrows,$active = 1, $maxview = LIST_VIEW_PAGE_LIMIT){
        $countpage = ceil($numrows / $maxview);
        $pagination = '<ul class="pagination pull-right">';
        
        for($i=1;$i<=$countpage;$i++){
            
           $pagination .= '<li ';
           if($active == $i) $pagination .= 'class="active"';
           $pagination .= ' ><a href="'.$url.'/page/'.$i.'/">'.$i.'</a></li>';

        }
        
        $pagination .= '</ul>';
        
        return $pagination;
    }
}