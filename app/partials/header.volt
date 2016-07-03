<!DOCTYPE html>
<html>
    <head>
    <body>

   
        <header>
     <form action="search.php" method="post">
     <div class="navbar">
        <div class="navbar-inner">
        <a class="brand" href="{{ url("/") }}">Bro</a>
         <ul class="nav nav-tabs">
        <ul class="nav">
        <li><a href="{{ url("mail/") }}">Входящие  </a></li>
        <li><a href="{{ url("avto/all") }}">Подвезут  </a></li>
        <li><a href="{{ url("pass/all") }}">Подвезти  </a></li>
        <li>    <a href="{{ url("/avto/my/") }}"> Мой Профиль</a>     </li>

    {#  <li ><a href="logout.php" align=right>Выход</a></li>       #}
        <form class="navbar-search pull-left">

  <input name="sea" input type="text" class="search-query" placeholder="Search">
</form>

        </ul>
        </div>
       </div>


            <!-- end navigation-block -->
        </header>
 