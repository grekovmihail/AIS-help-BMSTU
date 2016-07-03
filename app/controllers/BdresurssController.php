<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class BdresurssController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for bdresurss
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Bdresurss', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_resursa";

        $bdresurss = Bdresurss::find($parameters);
        if (count($bdresurss) == 0) {
            $this->flash->notice("The search did not find any bdresurss");

            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $bdresurss,
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
     * Edits a bdresurs
     *
     * @param string $id_resursa
     */
    public function editAction($id_resursa)
    {
        if (!$this->request->isPost()) {

            $bdresurs = Bdresurss::findFirstByid_resursa($id_resursa);
            if (!$bdresurs) {
                $this->flash->error("bdresurs was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "bdresurss",
                    "action" => "index"
                ));
            }

            $this->view->id_resursa = $bdresurs->id_resursa;

            $this->tag->setDefault("id_resursa", $bdresurs->id_resursa);
            $this->tag->setDefault("aud", $bdresurs->aud);
            $this->tag->setDefault("remont", $bdresurs->remont);
            $this->tag->setDefault("text", $bdresurs->text);

        }
    }

    /**
     * Creates a new bdresurs
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "edit"
            ));
        }

        $bdresurs = new Bdresurss();
        $bdresurs->aud = $this->request->getPost("aud");
        $bdresurs->remont = $this->request->getPost("remont");
        $bdresurs->text = $this->request->getPost("text");


        if (!$bdresurs->save()) {
            foreach ($bdresurs->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "new"
            ));
        }

        $this->flash->success("bdresurs was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bdresurss",
            "action" => "edit"
        ));
    }

    /**
     * Saves a bdresurs edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "index"
            ));
        }

        $id_resursa = $this->request->getPost("id_resursa");

        $bdresurs = Bdresurss::findFirstByid_resursa($id_resursa);
        if (!$bdresurs) {
            $this->flash->error("bdresurs does not exist " . $id_resursa);

            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "index"
            ));
        }

        $bdresurs->aud = $this->request->getPost("aud");
        $bdresurs->remont = $this->request->getPost("remont");
        $bdresurs->text = $this->request->getPost("text");


        if (!$bdresurs->save()) {

            foreach ($bdresurs->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "edit",
                "params" => array($bdresurs->id_resursa)
            ));
        }

        $this->flash->success("bdresurs was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bdresurss",
            "action" => "index"
        ));
    }

    /**
     * Deletes a bdresurs
     *
     * @param string $id_resursa
     */
    public function deleteAction($id_resursa)
    {
        $bdresurs = Bdresurss::findFirstByid_resursa($id_resursa);
        if (!$bdresurs) {
            $this->flash->error("bdresurs was not found");

            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "index"
            ));
        }

        if (!$bdresurs->delete()) {

            foreach ($bdresurs->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "bdresurss",
                "action" => "search"
            ));
        }

        $this->flash->success("bdresurs was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "bdresurss",
            "action" => "index"
        ));
    }

}
