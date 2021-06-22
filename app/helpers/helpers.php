<?php
    function dnd($data='',$f=''){
    echo $f;
        echo '<pre>';
       var_dump($data);
        echo '</pre>';
    die('______________________________________________________________');
    }
    function dm($data ='',$f='')
    {
        echo $f;
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        echo '______________________________________________________________';
        
    }
    function show($items = [])
    {
        $html = "<style>.tgl{width:20px;height: 20px;}</style>";
        $html .= " <div id='info' style='position:fixed ;z-index:1111; top:200px;  padding: 5px; color:#ddd; background:#262626 ; box-shadow: 0 0 5px rgba(0,0,0,0.5);overflow:scroll'>";

        foreach($items as $item)
        {
            ob_start();
            var_dump($item);
            $item=ob_get_clean();
            $html.= " <pre style='color:#ddd !important;'>".$item."</pre>";
        }
        $html.= "</div>";
        $html.= "<script>
    document.querySelector('#info').onclick= function(){document.querySelector('#info').classList.toggle('tgl')}
    </script>";
        echo $html;
    }
    // function currentUser()
    // {
    //     return UsersModel::currentLoggedInUser();
    // }
    function currentPage()
    {
        
        $currentP = $_SERVER['REQUEST_URI'];
        if($currentP == PROOT || $currentP == PROOT.'home/index')
            $currentP = PROOT .'home';

        return $currentP;
    }

