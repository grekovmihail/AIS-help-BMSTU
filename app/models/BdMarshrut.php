<?php

class BdMarshrut extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_marshruta;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $A;

    /**
     *
     * @var string
     */
    public $B;

    /**
     *
     * @var string
     */
    public $text;

    /**
     *
     * @var integer
     */
    public $id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bd_marshrut';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BdMarshrut[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BdMarshrut
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
