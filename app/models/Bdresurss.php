<?php

class Bdresurss extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_resursa;

    /**
     *
     * @var string
     */
    public $aud;

    /**
     *
     * @var string
     */
    public $remont;

    /**
     *
     * @var string
     */
    public $text;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bdresurss';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bdresurss[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bdresurss
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
