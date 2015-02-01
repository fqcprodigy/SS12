<?php


/**
 * Description of ReadyController
 *
 * @author fqcprodigy
 */
class ReadyController extends BaseController{
    public function newPlayer($pname)
    {
        //$pname=Input::get('pname');
        $player=new Player();
        $player->PlayerID=$pname;
        $player->Room=0;
        $player->save();
        Session::put('player',$pname);
        return;
    }
    public function search() {
        $pname=Session::get('player');
        $player=Player::find($pname);
        if($player->ready())
        {
            return "true";
        }
        else
        {
            return "false";
        }
        
    }
    public function wait() {
        $pname=Session::get('player');
        $player=Player::find($pname);
        if($player->wait())
        {
            return "true";
        }
        else
        {   
            return "false";
        }
    }
}
