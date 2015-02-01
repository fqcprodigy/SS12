<?php


/**
 * Description of GameController
 *
 * @author fqcprodigy
 */
class GameController extends BaseController{
    public function quit()
    {
        
        $pname=Session::get('player');
        $player=Player::find($pname);
        $player->quit();
        
    }
    public function score()
    {
        $sc=Input::get('score');
        $pname=Session::get('player');
        $player=Player::find($pname);
        $player->send_score($sc);
        return;
        
    }
    public function win()
    {
        $pname=Session::get('player');
        $player=Player::find($pname);
        return $player->win();
        
    }
    public function delete()
    {
        $pname=Session::get('player');
        $player=Player::find($pname);
        $room=Room::find($player->Room);
        $player->delete();
        $room->Num-=1;
        $room->save();
        Session::forget('player');
    }
}
