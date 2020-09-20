<!-- <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu1" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"> -->
<ul class="menu-nav">
    <!-- <li class="heading">
        <h3>{{__('Menu List')}}</h3>
    </li> -->
    <?php
    $user_group_id = Auth::user()->sys_group_id;
    
    $group_roles = getRolesByGroupId($user_group_id);
    
    $group_roles = $group_roles->toArray();
    $group_roles = array_column($group_roles,'uri');
    
    $menus = \App\Model\Role\SysMenu::where('status',1)->orderBy('order')->get()->toArray();
    // echo "<pre>";
    // print_r($menus);exit;
    $active_url = \App\Model\Role\SysMenu::where('status',1)->where('url',request()->route()->uri)->first();
    if(empty($active_url))
        {
            $active_ids=[];
        }
    elseif(empty($active_url->parent_id))
    {
        $active_ids =[$active_url->id];
    }else{
        $childParentArray = buildChildParent($menus);
        $active_ids = getActiveNodes($childParentArray,$active_url->id);
    }

    $tree = buildTree($menus,$group_roles);
    print_tree_menu($active_ids,$tree);
    ?>

</ul>
<?php
function print_tree_menu($active_ids,$menus,$self=false){
    foreach ($menus as $menu)
    {
         $is_active = in_array($menu['id'],$active_ids)?'active':'';
        if(!isset($menu['sub_menu']))
        {

            ?>
            <li class="menu-item {{$is_active}}" aria-haspopup="true">
                <a href="{{url($menu['url'])}}" class="menu-link {{$is_active}}">
                    <i class="{{$menu['icon']}}"></i>
                    <span class="menu-text" style="margin-left: 5px;">{{$menu['title']}} </span>
                </a>
            </li>
            
            <?php
        }
        else
        {
        ?>
        <li class="menu-item {{$is_active}}" aria-haspopup="true">
            <a href="javascript:;" class="menu-link menu-toggle">
                <i class="{{$menu['icon']}}"></i>
                <span class="menu-text" style="margin-left: 5px;">{{$menu['title']}}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                            <span class="menu-text" style="margin-left: 5px;"><?php
                    print_tree_menu($active_ids,$menu['sub_menu'],true)
                    ?></span>
                        </span>
                    </li>
                    
                </ul>
            </div>
        </li>
        <?php
        }
    }
    if($self)
    {
        return 0;
    }
}
//function buildAndPrintTree($tree,$group_roles,$parent=null){
//    if(count($tree)>0){
//        foreach ($tree as $key=>$node){
//            if($node['parent_id']==$parent&&$node['status']==1){
//                $url = $node['url'];
//                $plus_sign = '';
//                $is_active = $node['url']==request()->route()->uri?'active':'';
//                if(empty($url)){
//                    $url = 'javascript:void(0);';
//                    $plus_sign='<span class="pull-right"><i class="md md-add"></i></span>';
//                }
//                elseif(filter_var($url, FILTER_VALIDATE_URL)==false)
//                    $url = url($url);
//                unset($tree[$key]);
//                echo "<li class='$is_active'>";
//                echo '<a title="'.$node['alt_title'].'" href="'.$url.'" class="waves-effect "><i class="'.$node['icon'].'"></i><span>'.$node['title'].'</span><span class="pull-right">'.$plus_sign.'</span></a>';
//                echo '<ul>';
//                buildAndPrintTree($tree,$group_roles,$node['id']);
//                echo '</ul>';
//                echo '</li>';
//            }
//        }
//    }
//}
?>
