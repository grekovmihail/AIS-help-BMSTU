<?php

/**
 * SessionController
 *
 * Allows to authenticate users
 */
class SessionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign Up/Sign In');
    }

    public function indexAction()
    {
        if (!$this->request->isPost()) {
            $this->tag->setDefault('username', '');
            $this->tag->setDefault('password', '');
        }
    }
        /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(User $user)
    {
        $this->session->set('auth', array(
           'id' => $user->id,
            'username' => $user->username
        ));
    }

    /**
     * This action authenticate and logs an user into the application
     *
     */
    public function startAction()
    {
        if ($this->request->isPost()) {
             $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = User::findFirst(array(
                "(username = :username: ) OR password = :password:",
               'bind' => array(
               'username' => $username,
               'password' => $password)
            ));
            if ($user != false) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->username);
              //  return $this->forward('invoices/index');
            }
              else  $this->flash->error('Wrong email/password ');
        }
       // return $this->forward('session/index');
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');
      //  return $this->forward('index/index');
    }
}
