<?php 

 // Key Value Fron Json
function kvfj($json, $key){
	if($json == null):
		return null;
	else:
		$json = $json;
		$json = json_decode($json, true);
		if(array_key_exists($key, $json)):
			return $json[$key];
		else:
			return null;
		endif;
	endif;
}



function getModulesArray(){
	$a = [
		'0' => 'Productos',
		'1' => 'Blog'
	];
	return $a;
}

function getRoleUserArray($mode, $id){
	$roles = ['0' => 'Usuario Normal', '1' => 'Administrador'];
	if(!is_null($mode)):
		return $roles;
	else:
		return $roles[$id];
	endif;

}

function getUsersStatusArray($mode, $id){
	$status = ['0' => 'Registrado', '1' => 'Vetificado', '100' => 'Baneado'];
	if(!is_null($mode)):
		return $status;
	else:
		return $status[$id];
	endif;
	

}


function user_permissions(){
    $p = [
        'dashboard' => [
            'icon' => '<i class="fa-solid fa-house"></i>', 
            'title' => 'Modulo dashboard',
            'keys' => [
                'dashboard' => 'Puede ver el dashboard.',
                'dashboard_small_stats' => 'Puede ver las estadisticas rapidas.',
                'dashboard_sell_today' => 'Puede ver lo facturado hoy.'             
            ]
        ],
        'products' => [
            'icon' => '<i class="fa-solid fa-boxes-stacked"></i>', 
            'title' => 'Modulo de Productos',
            'keys' => [ 
            	'products' => 'Puede ver el listado de productos.',
            	'product_add' => 'Puede agregar nuevos productos.',
            	'product_edit' => 'Puede editar los productos.',
            	'product_search' => 'Puede buscar los productos.',
            	'product_delete' => 'Puede eliminar los productos.',
            	'product_gallery_add' => ' Puede agregar imagenes a la galeria.',
            	'product_gallery_delete' => 'Puede eliminar las imagenes de la galeria.'           
            ]
        ],
        'categories' => [
            'icon' => '<i class="fa-regular fa-folder-open"></i>', 
            'title' => 'Modulo de Categorias',
            'keys' => [
                'categories' => 'Puede ver la lista de categorias.',
                'category_add' => 'Puede crear nuevas categorias.',
                'category_edit' => 'Puede editar categorias.' ,
                'category_delete' => 'Puede eliminar categorias.'            
            ]
        ],
        'users' => [
            'icon' => '<i class="fa-solid fa-user-group"></i>', 
            'title' => 'Modulo de Usuarios',
            'keys' => [
                'user_list' => 'Puede ver la lista de Usuarios.',
                'user_edit' => 'Puede editar la info Usuarios..',
                'user_banned' => 'Puede banear Usuarios.' ,
                'user_permissions' => 'Puede administrar permisos de Usuarios.'            
            ]
        ],

        'sliders' => [
            'icon' => '<i class="fa-regular fa-images"></i>', 
            'title' => 'Modulo de Sliders',
            'keys' => [
                'sliders_list' => 'Puede ver la lista de sliders.',
                'slider_add' => 'Puede crear Sliders',
                'slider_edit' => 'Puede editar Sliders.' ,
                'slider_delete' => 'Puede eliminar Sliders.'     
                
            ]
        ],

        'settings' => [
            'icon' => '<i class="fa-solid fa-gears"></i>', 
            'title' => 'Modulo de Configuraciones',
            'keys' => [
                'settings' => 'Puede modificar las Configuraciones.'      
            ]
        ],

        'orders' => [
            'icon' => '<i class="fa-solid fa-clipboard-list"></i>', 
            'title' => 'Modulo de Ordenes',
            'keys' => [
                'order_list' => 'Puede ver el estado de las ordenes.'      
            ]
        ]
    ];

    return $p;
}

function getUserYears(){
    $ya = date('Y');
    $ym = $ya - 15;
    $yo = $ym - 70;

    return [$ym,$yo];    
}

function getMonths($mode, $key){
    $m = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiempre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre',
    ];
    if($mode == 'list'){
        return $m;
    }else{
        return $m[$key];
    }
}