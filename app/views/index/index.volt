   <style>
        body {
        background: url(fon.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
}
 .hero-unit {
         background-color: 	#4F4F4F; /* Цвет текста */
         opacity: 0.8; /* Значение прозрачности */
          padding: 50px; /* Поля вокруг текста */
          color:white;

    margin: 0 auto; /* Выравниваем слой по центру */

    /*   margin-left:20%;
     margin-right:12%; */

     margin-top: 15%;
        width:60%;
font-size: 16pt;
       }

  </style>
 {{ content() }}


 <body>

<div class="hero-unit">
    <h1 align=center>Добро пожаловать</h1>

    <p align=center>в мобильную справку по ресурсам МГТУ</p>

    <p align=center>{{ link_to('user/new', 'Зарегистрироваться', 'class': 'btn btn-primary btn-large btn-success') }}
    {{ link_to('session', 'Войти', 'class': 'btn btn-primary btn-large btn-success') }}</p>
</div>


    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>

