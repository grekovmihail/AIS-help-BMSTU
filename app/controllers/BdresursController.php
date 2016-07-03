<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class BdresursController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for bdresurs
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Bdresurs', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "text";

        $bdresurs = Bdresurs::find($parameters);
        if (count($bdresurs) == 0) {
            $this->flash->notice("The search did not find any bdresurs");

            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $bdresurs,
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
     * Edits a bdresur
     *
     * @param string $text
     */
    public function editAction($text)
    {
        if (!$this->request->isPost()) {

            $bdresur = Bdresurs::findFirstBytext($text);
            if (!$bdresur) {
                $this->flash->error("bdresur was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "bdresurs",
                    "action" => "index"
                ));
            }

            $this->view->text = $bdresur->text;

            $this->tag->setDefault("text", $bdresur->text);
            $this->tag->setDefault("id_resursa", $bdresur->id_resursa);
            $this->tag->setDefault("moderator_id_m", $bdresur->moderator_id_m);
            $this->tag->setDefault("BD_id_marshruta", $bdresur->BD_id_marshruta);
            $this->tag->setDefault("BD_id_resursa", $bdresur->BD_id_resursa);
            $this->tag->setDefault("aud", $bdresur->aud);
            $this->tag->setDefault("remont", $bdresur->remont);
            
        }
    }

    /**
     * Creates a new bdresur
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "index"
            ));
        }

        $bdresur = new Bdresurs();

        $bdresur->text = $this->request->getPost("text");
        $bdresur->id_resursa = $this->request->getPost("id_resursa");
        $bdresur->moderator_id_m = $this->request->getPost("moderator_id_m");
        $bdresur->BD_id_marshruta = $this->request->getPost("BD_id_marshruta");
        $bdresur->BD_id_resursa = $this->request->getPost("BD_id_resursa");
        $bdresur->aud = $this->request->getPost("aud");
        $bdresur->remont = $this->request->getPost("remont");
        

        if (!$bdresur->save()) {
            foreach ($bdresur->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "new"
            ));
        }

        $this->flash->success("bdresur was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bdresurs",
            "action" => "index"
        ));
    }

    /**
     * Saves a bdresur edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "index"
            ));
        }

        $text = $this->request->getPost("text");

        $bdresur = Bdresurs::findFirstBytext($text);
        if (!$bdresur) {
            $this->flash->error("bdresur does not exist " . $text);

            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "index"
            ));
        }

        $bdresur->text = $this->request->getPost("text");
        $bdresur->id_resursa = $this->request->getPost("id_resursa");
        $bdresur->moderator_id_m = $this->request->getPost("moderator_id_m");
        $bdresur->BD_id_marshruta = $this->request->getPost("BD_id_marshruta");
        $bdresur->BD_id_resursa = $this->request->getPost("BD_id_resursa");
        $bdresur->aud = $this->request->getPost("aud");
        $bdresur->remont = $this->request->getPost("remont");
        

        if (!$bdresur->save()) {

            foreach ($bdresur->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "edit",
                "params" => array($bdresur->text)
            ));
        }

        $this->flash->success("bdresur was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bdresurs",
            "action" => "index"
        ));
    }

    /**
     * Deletes a bdresur
     *
     * @param string $text
     */
    public function deleteAction($text)
    {
        $bdresur = Bdresurs::findFirstBytext($text);
        if (!$bdresur) {
            $this->flash->error("bdresur was not found");

            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "index"
            ));
        }

        if (!$bdresur->delete()) {

            foreach ($bdresur->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bdresurs",
                "action" => "search"
            ));
        }

        $this->flash->success("bdresur was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bdresurs",
            "action" => "index"
        ));
    }

}
