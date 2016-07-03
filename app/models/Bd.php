<?php

class Bd extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_marshruta;

    /**
     *
     * @var integer
     */
    public $id_resursa;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_marshruta', 'Bd resurs', 'BD_id_marshruta', array('alias' => 'Bd resurs'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bd';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bd[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bd
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
