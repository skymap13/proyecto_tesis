<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/imagenes/logo.png') }}" class="img-fluid">
        </div>
        <div class="user">
            <span class="subtitle">Hola:</span>
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
            <div class="email">
                {{ Auth::user()->email }}
                
            </div>
        </div>
    </div>
    <div class="main">
        <ul>
            @if(kvfj(Auth::user()->permissions, 'dashboard'))
            <li>
                <a href="{{ url('/admin') }}" class="lk-dashboard">
                    <i class="fa-solid fa-house"></i>Dashboard</a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'categories'))
            <li>
                <a href="{{ url('/admin/categories/0') }}" class="lk-categories lk-category_add lk-category_edit lk-category_delete">
                    <i class="fa-regular fa-folder-open"></i>Categorias</a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'products'))
            <li>
                <a href="{{ url('/admin/products/1') }}" class="lk-products lk-product_add lk-product_search lk-product_edit lk-product_gallery_add">
                    <i class="fa-solid fa-boxes-stacked"></i>Productos</a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'order_list'))
            <li>
                <a href="{{ url('/admin/order/all') }}" class="lk-order_list"><i class="fa-solid fa-clipboard-list"></i>Ordenes</a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'user_list'))
            <li>
                <a href="{{ url('/admin/users/all') }}" class="lk-user_list lk-user_edit lk-user_permissions"><i class="fa-solid fa-user-group"></i></i>Usuarios</a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'settings'))
            <li>
                <a href="{{ url('/admin/settings') }}" class="lk-settings"><i class="fa-solid fa-gears"></i>Configuraciones</a>
            </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'sliders_list'))
            <li>
                <a href="{{ url('/admin/sliders') }}" class="lk-sliders_list lk-slider_add lk-slider_edit"><i class="fa-regular fa-images"></i>Sliders</a>
            </li>
            @endif
            


        </ul>
    </div>
</div>