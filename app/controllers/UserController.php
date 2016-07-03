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


    static  $ts=14;

class UserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }


        public function index2Action()
    {
        $this->persistent->parameters = null;
    }

        public function index3Action()
    {       echo $_SESSION['out'];
    }




    /**
     * Searches for user
     */
   
    /**
     * Displays the creation form
     */
    public function newAction()
    {




    }





        public function searchAction()
    {
             $p=15;
include ('mpdf/mpdf.php');

 $html = "<h2> Отчет по движению </h2><table border=1> <tr>

                            <th>ТС</th>
                            <th>Тип ТС</th>
                            <th>Пробег</th>
                            <th>Время движения</th>
                            <th>Ср. скорость</th>
                            <th>Макс. скорость</th>
                            <th>Время простоя</th>
                            <th>Наличие проблем</th>
                            <th>Водитель</th>
                        </tr><tr><td>ТС</td>
                            <td> $ts</td>
                            <td>$p</td>
                            <th>Время движения</td>
                            <td>Ср. скорость</td>
                            <td>Макс. скорость</td>
                            <td>Время простоя</td>
                            <td>Наличие проблем</td>
                            <td>Водитель</td></tr></table>";
$mpdf = new mPDF('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*задаем формат, отступы и.т.д.*/
$mpdf->charset_in = 'cp1251'; /*не забываем про русский*/

$mpdf->WriteHTML($html, 2); /*формируем pdf*/

$mpdf->Output();

exit;

    }

    /**
     * Edits a user
     *
     * @param string $username
     */
    public function editAction()
    {
        if (!$this->request->isPost()) {

            $user = User::findFirstByusername($username);
            if (!$user) {
                $this->flash->error("user was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "user",
                    "action" => "index"
                ));
            }

            $this->view->username = $user->username;

            $this->tag->setDefault("username", $user->username);
            $this->tag->setDefault("email", $user->email);
            $this->tag->setDefault("password", $user->password);
            $this->tag->setDefault("id", $user->id);

        }
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "edit"
            ));
        }

        $user = new User();

        $user->username = $this->request->getPost("username");
        $user->email = $this->request->getPost("email", "email");
        $user->password = $this->request->getPost("password");


        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "new"
            ));
        }

        $this->flash->success("Пользователь был создан");
        $this->session->set('auth', array(
        'id' => $user->id,
        'username' => $user->username));
 $this->flash->success('Добро пожаловать,  ' . $user->username);



        return $this->dispatcher->forward(array(
            "controller" => "user",
            "action" => "edit"
        ));
    }

    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        $username = $this->request->getPost("username");

        $user = User::findFirstByusername($username);
        if (!$user) {
            $this->flash->error("user does not exist " . $username);

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        $user->username = $this->request->getPost("username");
        $user->email = $this->request->getPost("email", "email");
        $user->password = $this->request->getPost("password");
        

        if (!$user->save()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "edit",
                "params" => array($user->username)
            ));
        }

        $this->flash->success("user was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "user",
            "action" => "index"
        ));
    }

    /**
     * Deletes a user
     *
     * @param string $username
     */
    public function deleteAction($username)
    {
        $user = User::findFirstByusername($username);
        if (!$user) {
            $this->flash->error("user was not found");

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "search"
            ));
        }

        $this->flash->success("user was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "user",
            "action" => "index"
        ));
    }

}
