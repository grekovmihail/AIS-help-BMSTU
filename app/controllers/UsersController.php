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




class UserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for user
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'User', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "username";

        $user = User::find($parameters);
        if (count($user) == 0) {
            $this->flash->notice("The search did not find any user");

            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $user,
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

    /**
     * Edits a user
     *
     * @param string $username
     */
    public function editAction($username)
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




class Userimplementer implements IPrinter
{
    public function printHeader($textHeader) {
        echo 'This is your header (' . $textHeader. ') in the pdf file<br />';
    }

    public function printBody($textBody) {
        echo 'This is your text body (' . $textBody. ') in the pdf file<br />';
    }
}

class ExcelPrinter implements IPrinter
{
    public function printHeader($textHeader) {
        echo 'This is your header (' . $textHeader. ') in the xls file<br />';
    }

    public function printBody($textBody) {
        echo 'This is your text body (' . $textBody. ') in the xls file<br />';
    }
}

abstract class Userabstract
{
    protected $printer;

    public function __construct(IPrinter $printer) {
        $this->printer = $printer;
    }

}

class WeeklyReport extends Report
{
    public function print(array $text) {
        $this->printHeader($text['header']);
        $this->printBody($text['body']);
    }
}

$report = new WeeklyReport(new ExcelPrinter());
$report->print(['header' => 'my header for excel', 'body' => 'my body for excel']); // This is your header (my header for excel) in the xls file</ br>This is your text body (my body for excel) in the xls file<br />
$report = new WeeklyReport( new PdfPrinter());
$report->print(['header' => 'my header for pdf', 'body' => 'my body for pdf']); // This is your header (my header for pdf) in the pdf file</ br>This is your text body (my body for pdf) in the pdf file<br />






        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
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

        $this->flash->success("user was created successfully");
        $this->session->set('auth', array(
        'id' => $user->id,
        'username' => $user->username));
 $this->flash->success('Welcome ' . $user->username);



        return $this->dispatcher->forward(array(
            "controller" => "user",
            "action" => "index"
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
