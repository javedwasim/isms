
<?php

if (!function_exists('print_menu')) {

    function print_menu($root, $tree) {
        $result = '';
        if (!is_null($tree) && count($tree) > 0) {
            $result .= '<ul id="expList">';
            foreach ($tree as $child => $parent) {
                if ($parent->parent_id == $root) {
                    unset($tree[$child]);
                    $paths = json_encode(base_url() . "students");
                    $path = json_decode($paths);
                    $result .= '<li class="list_items" id="list_itmes_' . $parent->func_called . '"  data-func-call="' . $parent->func_called . '"><i class="' . $parent->class . '"></i>' . $parent->menu_name . '';
                    $result .= print_menu($parent->menu_id, $tree);
                    $result .= '</li>';
                }
            }
            $result .= '</ul>';
        }
        return $result;
    }

} 


