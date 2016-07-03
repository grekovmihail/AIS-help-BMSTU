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
    $bd_marshrut = new BdMarshrut();
    $bd_marshrut->B = $this->request->getPost("B");
        $B=$bd_marshrut->B;
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




        $text="Пройдите до главной лестницы <img src='bmstu_plan.jpg' alt='Лестница'' />";
                 if ($B<6)
                            {
            if ($pos === false)
            $C="налево";
            else $C="направо";
            $text2="Поднимитесь до $B этажа  и поверните $C";
                            }
                    else
            $text2="Поднимитесь до 5 этажа, поверните налево, по второй лестнице поднимитесь до $B этажа";


            }









        $text=$text.$text2;

        $bd_marshrut->text = $text;

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

        $this->flash->success($text);

        $this->flash->success($text2);
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
                "action" => "index"
            ));
        }

          if ($this->session->has("auth")) {
            $name = $this->session->get("auth");
            $id= $name['id'];
            $username= $name['username'];
        }

        class AB{

        $AB = new AB();

        $AB->username = $username;

        $AB->A = $this->request->getPost("A");
        $AB->B = $this->request->getPost("B");
        class marshrut{
          $marshrut = new marshrut();
        $marshrut->B=$B;
        $marshrut->name=$marshrut->B.$marshrut->$username;
        $marshrut->pos = stristr($marshrut->B, "ю");
        $marshrut->B=($marshrut->B-$marshrut->B%100)/100;


        if ($marshrut->B<0  || $marshrut->B>11  || $marshrut->B<1  ||$marshrut->B=="501ю" )
            {

            if ($marshrut->B=="501ю" )  {
            $marshrut->text="Очень";
            $marshrut->text2="Сложнооо";}
            else
{
            $marshrut->text="нет";
            $marshrut->text2="такой аудитории";}


            }
        else {




        $marshrut->text="Пройдите до главной лестницы <img src='bmstu_plan.jpg' alt='Лестница'' />";
                 if ($B<6)
                            {
            if ($marshrut->pos === false)
            $marshrut->C="налево";
            else $marshrut->C="направо";
            $marshrut->text2="Поднимитесь до $B этажа  и поверните $C";
                            }
                    else
            $marshrut->text2="Поднимитесь до 5 этажа, поверните налево, по второй лестнице поднимитесь до $B этажа";


            }









        $text=$marshrut->text.$marshrut->text2;
         class BdMarshrut
{


     $BdMarshrut = new AB();
        $bd_marshrut->text = $marshrut->text.$marshrut->text2;;
        $bd_marshrut->name = $marshrut->name;
     //   $bd_marshrut->id = $id;

        if (!$bd_marshrut->save()) {
            foreach ($bd_marshrut->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bd_marshrut",
                "action" => "new"
            ));
        }

        $this->flash->success($text);

        $this->flash->success($text2);

        return $this->dispatcher->forward(array(
            "controller" => "bd_marshrut",
            "action" => "name"
        ));
    }

    public function nameAction()
    {



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
