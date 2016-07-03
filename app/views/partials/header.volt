<!DOCTYPE html>
<html>
    <head>
    <body>

    {%if   _SESSION['auth'] is defined %}    
        <header>
     <form action="search.php" method="post">
     <div class="navbar">
        <div class="navbar-inner">
        <a class="brand" href="{{ url("/") }}">АИС</a>
         <ul class="nav nav-tabs">
        <ul class="nav">
        <li><a href="{{ url("bd_marshrut/new") }}"> Маршруты  </a></li>
        <li><a href="{{ url("bdresurss/new") }}"> Редактирование ресурсов </a></li>
        <li><a href="{{ url("bdresurss/index") }}"> Просмотр ресурсов </a></li>
       {# <li><a href="{{ url("avto/all") }}">Подвезут  </a></li>
        <li><a href="{{ url("pass/all") }}">Подвезти  </a></li>
        <li>    <a href="{{ url("/avto/my/") }}"> Мой Профиль</a>     </li>  

 
        <form class="navbar-search pull-left">

  <input name="sea" input type="text" class="search-query" placeholder="Search">
</form>#}

        </ul>
        </div>
       </div>


            <!-- end navigation-block -->
        </header>
  {% endif %}