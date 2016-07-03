<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class BdController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for bd
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Bd', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_marshruta";

        $bd = Bd::find($parameters);
        if (count($bd) == 0) {
            $this->flash->notice("The search did not find any bd");

            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $bd,
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
     * Edits a bd
     *
     * @param string $id_marshruta
     */
    public function editAction($id_marshruta)
    {
        if (!$this->request->isPost()) {

            $bd = Bd::findFirstByid_marshruta($id_marshruta);
            if (!$bd) {
                $this->flash->error("bd was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "bd",
                    "action" => "index"
                ));
            }

            $this->view->id_marshruta = $bd->id_marshruta;

            $this->tag->setDefault("id_marshruta", $bd->id_marshruta);
            $this->tag->setDefault("id_resursa", $bd->id_resursa);
            
        }
    }

    /**
     * Creates a new bd
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "index"
            ));
        }

        $bd = new Bd();

        $bd->id_marshruta = $this->request->getPost("id_marshruta");
        $bd->id_resursa = $this->request->getPost("id_resursa");
        

        if (!$bd->save()) {
            foreach ($bd->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "new"
            ));
        }

        $this->flash->success("bd was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bd",
            "action" => "index"
        ));
    }

    /**
     * Saves a bd edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "index"
            ));
        }

        $id_marshruta = $this->request->getPost("id_marshruta");

        $bd = Bd::findFirstByid_marshruta($id_marshruta);
        if (!$bd) {
            $this->flash->error("bd does not exist " . $id_marshruta);

            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "index"
            ));
        }

        $bd->id_marshruta = $this->request->getPost("id_marshruta");
        $bd->id_resursa = $this->request->getPost("id_resursa");
        

        if (!$bd->save()) {

            foreach ($bd->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "edit",
                "params" => array($bd->id_marshruta)
            ));
        }

        $this->flash->success("bd was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bd",
            "action" => "index"
        ));
    }

    /**
     * Deletes a bd
     *
     * @param string $id_marshruta
     */
    public function deleteAction($id_marshruta)
    {
        $bd = Bd::findFirstByid_marshruta($id_marshruta);
        if (!$bd) {
            $this->flash->error("bd was not found");

            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "index"
            ));
        }

        if (!$bd->delete()) {

            foreach ($bd->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bd",
                "action" => "search"
            ));
        }

        $this->flash->success("bd was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bd",
            "action" => "index"
        ));
    }

}
