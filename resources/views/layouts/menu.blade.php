@vite(['resources/css/app.css']);
<link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">
<menu class="clearfix">
    <div class=""></div>
    <ul class="main-menu clearfix">
        <li>
            <a href="{{Route('welcome-index')}}"><i class="fas fa-home"></i> Inicio</a>
        </li>
        <li>
            <a href="#"><i class="fas fa-book"></i> Editoriales</a>
            <div class="dropdown clearfix">
                <!-- Contenido del menú desplegable -->
                <ul>
                    <li><a href="#">Menu editorial</a></li>
                    <li><a href="{{Route('editorial-index')}}">Crear editorial</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                   
                </ul>
                <ul>
                    <li><a href="#">Otro submenu</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                </ul>
                <ul>
                    <li><a href="#">Otro submenu</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                   
                </ul>
            </div>
        </li>

        <li>
            <a href="#"><i class="fas fa-book-open"></i> Libros</a>
            <div class="dropdown clearfix">
                <!-- Contenido del menú desplegable -->
                <ul>
                    <li><a href="#">Menu libros</a></li>
                    <li><a href="{{ Route('libro-index') }}">Crear libros</a></li>
                    <li><a href="{{Route('listaLibros-index')}}">Lista de libros</a></li>
                    <li><a href="{{ Route('pdf-index') }}">Descargar listado</a></li>
                    <li><a href="{{ Route('buscador-index') }}">Buscar libro</a></li>
                </ul>
                <ul>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                </ul>
                <ul>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>

                </ul>
            </div>
        </li>

        <li>
            <a href="#"><i class="fas fa-user"></i> Autores</a>
            <div class="dropdown clearfix">
                <!-- Contenido del menú desplegable -->
                <ul>
                    <li><a href="#">Menu autor</a></li>
                    <li><a href="{{Route('autor-index')}}">Crear Autores</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                </ul>
                <ul>
                    <li><a href="#">Otro submenu</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
              
                </ul>
            </div>
        </li>

      
        <li>
            <a href="#"><i class="fas fa-shopping-cart"></i> Pedidos</a>
            <div class="dropdown clearfix">
                <!-- Contenido del menú desplegable -->
                <ul>
                    <li><a href="#">Consultar pedidos</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                </ul>
                <ul>
                    <li><a href="#">Submenu</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>

                </ul>
            </div>
        </li>


        <li>
            <a href="#"><i class="fas fa-chart-bar"></i> Ventas</a>
            <div class="dropdown clearfix">
                <!-- Contenido del menú desplegable -->
                <ul>
                    <li><a href="#">Consultar ventas</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>
                </ul>
                <ul>
                    <li><a href="#">Submenu</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>

                </ul>
            </div>
        </li>

        <li>
            <a href="#"><i class="fas fa-users"></i> Usuarios</a>
            <div class="dropdown clearfix">
                <!-- Contenido del menú desplegable -->
                <ul>
                    <li><a href="#">Consultar usuarios</a></li>
                    <li><a href="#">Usarios </a></li>
                    <li><a href="{{Route('profile.update')}}">Actualizar usuario</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="{{Route('profile.destroy')}}">Cerrar sesion</a></li>
                </ul>
                <ul>
                    <li><a href="#">Submenu</a></li>
                    <li><a href="#">#Pendiente</a></li>
                    <li><a href="#">#Pendiente</a></li>

                </ul>
            </div>
        </li>
  
        <li class="search fas fa-user"> {{ Auth::user()->name }}</li>

    </ul>
</menu>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
