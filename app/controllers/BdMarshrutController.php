<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

 use Phalcon\Session\Adapter\Files as Session;

// Сессии запустятся один раз, при первом обращении к объекту
$di->setShared('session', function () {
    $session = new Session();
    $session->start();
    return $session;
});


class BdMarshrutController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for bd_marshrut
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'BdMarshrut', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_marshruta";

        $bd_marshrut = BdMarshrut::find($parameters);
        if (count($bd_marshrut) == 0) {
            $this->flash->notice("The search did not find any bd_marshrut");

            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $bd_marshrut,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }
        public function liteAction()
    {
       $bd_marshrut->id = $id;



        $this->flash->success($text);

        $this->flash->success($text2);
        $text=$text.$text2;
            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "edit"
            ));




    }

    /**
     * Edits a bd_marshrut
     *
     * @param string $id_marshruta
     */
    public function editAction($id_marshruta)
    {
        if (!$this->request->isPost()) {

            $bd_marshrut = BdMarshrut::findFirstByid_marshruta($id_marshruta);
            if (!$bd_marshrut) {
                $this->flash->error("bd_marshrut was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "bd_marshrut",
                    "action" => "index"
                ));
            }

            $this->view->id_marshruta = $bd_marshrut->id_marshruta;

            $this->tag->setDefault("id_marshruta", $bd_marshrut->id_marshruta);
            $this->tag->setDefault("username", $bd_marshrut->username);
            $this->tag->setDefault("name", $bd_marshrut->name);
            $this->tag->setDefault("A", $bd_marshrut->A);
            $this->tag->setDefault("B", $bd_marshrut->B);
            $this->tag->setDefault("text", $bd_marshrut->text);
            $this->tag->setDefault("id", $bd_marshrut->id);

        }
    }

    /**
     * Creates a new bd_marshrut
     */
    public function createAction()
    {



        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "name"
            ));
        }

          if ($this->session->has("auth")) {
            $name = $this->session->get("auth");
            $id= $name['id'];
            $username= $name['username'];
        }

        $bd_marshrut = new BdMarshrut();

        $bd_marshrut->username = $username;

        $bd_marshrut->A = $this->request->getPost("A");
        $bd_marshrut->B = $this->request->getPost("B");
        $B=$bd_marshrut->B;
        $name=$B.$username;
        $pos = stristr($B, "ю");
        $B=($B-$B%100)/100;


        if ($bd_marshrut->B<0  || $B>11  || $B<1  ||$bd_marshrut->B=="501ю" )
            {

            if ($bd_marshrut->B=="501ю" )  {
            $text="Очень";
            $text2="Сложнооо";}
            else
{
            $text="нет";
            $text2="такой аудитории";}


            }
        else {


        $time1=$B*2;
        $time2=rand(0,20);
          $x=1;
        $tex="
        <br> Маршрут 1: $time1 минут(ы) по лестнице
        <br> Маршрут 2: $time2 минут(ы) на лифте";
                        $this->flash->success($tex);

       //   echo '<a href="?G=1">1</a>';
                 if ($B<6)
                            {
            if ($pos === false)
            $C="налево";
            else $C="направо";
          //  global $text2;
            $text2="Поднимитесь до $B этажа  и поверните $C";
         //   global $text3;
            $text3="Поднимитесь на лифте до $B этажа  и поверните $C";
                      echo '<a href="?G=1&B='.$B.'&C='.$C.'"> По лестнице </a>';

                        echo '<a href="?G=2&B='.$B.'&C='.$C.'"> На лифте </a>';
                            }
                    else{
          //  global $text2;
            $text2="Поднимитесь до 5 этажа, поверните налево, по второй лестнице поднимитесь до $B этажа";
           // global $text3;
            $text3="Поднимитесь на лифте до $B этажа";
                   echo '<a href="?G=1&B='.$B.'"> По лестнице </a>';

                     echo '<a href="?G=2&B='.$B.'"> На лифте </a>';
             }
            }





        $text="Пройдите до главной лестницы <br> <img src='/ais/bmstu_plan.jpg' width=35% height=35% alt='Лестница'' />";
         $G=0;





        $text=$text.$text2;

        $bd_marshrut->text = $text;
        $bd_marshrut->name = $name;
        $bd_marshrut->id = $id;

        if (!$bd_marshrut->save()) {
            foreach ($bd_marshrut->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "new"
            ));
        }



        return $this->dispatcher->forward(array(
            "controller" => "bd_marshrut",
            "action" => "name"
        ));

    }

    public function nameAction()
    {
      if (!empty($_GET["C"]))        $C= $_GET["C"];
     if (!empty($_GET["B"]))  { $B= $_GET["B"];

     if ($B>5)
     {$text2="Поднимитесь до 5 этажа, поверните налево, по второй лестнице поднимитесь до $B этажа";
         $text3="Поднимитесь на лифте до этажа $B";
     }

          else                          { $text2="Поднимитесь до $B этажа  и поверните $C";
                $text3="Поднимитесь на лифте до $B этажа  и поверните $C";
          }

           // global $text3;



            $text="Пройдите до главной лестницы <br> <img src='/ais/bmstu_plan.jpg' width=35% height=35% alt='Лестница'' />";

      if (!empty($_GET["G"]))  $G= $_GET["G"];
      if (empty($G)) $G=0;
  if ($G==1)  {
    $this->flash->success($text);     //быдлокол, подправить потом
       $this->flash->success($text2);
          
     echo "<a href='friend'> Отправить маршрут товарищу </a> " ;}
         if ($G==2)  {        $this->flash->success($text);
       $this->flash->success($text3);

     echo "<a href='friend'> Отправить маршрут товарищу </a> " ;}
      }



   }


        public function friendAction()
    {
             echo " <h1> У вас нет друзей </h1> " ;
                    echo "<br> <img src='/ais/alone.jpg' width=35% height=35% alt='Лестница'' />";


    }



    /**
     * Saves a bd_marshrut edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "index"
            ));
        }

        $id_marshruta = $this->request->getPost("id_marshruta");

        $bd_marshrut = BdMarshrut::findFirstByid_marshruta($id_marshruta);
        if (!$bd_marshrut) {
            $this->flash->error("bd_marshrut does not exist " . $id_marshruta);

            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "index"
            ));
        }

        $bd_marshrut->username = $this->request->getPost("username");
        $bd_marshrut->name = $this->request->getPost("name");
        $bd_marshrut->A = $this->request->getPost("A");
        $bd_marshrut->B = $this->request->getPost("B");
        $bd_marshrut->text = $this->request->getPost("text");
        $bd_marshrut->id = $this->request->getPost("id");


        if (!$bd_marshrut->save()) {

            foreach ($bd_marshrut->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "edit",
                "params" => array($bd_marshrut->id_marshruta)
            ));
        }

        $this->flash->success("bd_marshrut was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bd_marshrut",
            "action" => "index"
        ));
    }

    /**
     * Deletes a bd_marshrut
     *
     * @param string $id_marshruta
     */
    public function deleteAction($id_marshruta)
    {
        $bd_marshrut = BdMarshrut::findFirstByid_marshruta($id_marshruta);
        if (!$bd_marshrut) {
            $this->flash->error("bd_marshrut was not found");

            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "index"
            ));
        }

        if (!$bd_marshrut->delete()) {

            foreach ($bd_marshrut->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "search"
            ));
        }

        $this->flash->success("bd_marshrut was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bd_marshrut",
            "action" => "index"
        ));
    }

}
