<?php


/**
 * Description of Room
 *
 * @author fqcprodigy
 */
class Room extends Eloquent{
    protected $primaryKey='Roomid';
    public $timestamps = false;
    public function player()
    {
        return $this->hasMany('Player');
    }
}
