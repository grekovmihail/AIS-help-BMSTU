<?php

class Bdresurs extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $text;

    /**
     *
     * @var integer
     */
    public $id_resursa;

    /**
     *
     * @var integer
     */
    public $moderator_id_m;

    /**
     *
     * @var integer
     */
    public $BD_id_marshruta;

    /**
     *
     * @var integer
     */
    public $BD_id_resursa;

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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('BD_id_marshruta', 'Bd', 'id_marshruta', array('alias' => 'Bd'));
        $this->belongsTo('moderator_id_m', 'Moderator', 'id_m', array('alias' => 'Moderator'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bdresurs';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bdresurs[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bdresurs
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
