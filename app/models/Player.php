<?php

/**
 * Description of Player
 *
 * @author fqcprodigy
 */

define("LENGTH", 20);

class Player extends Eloquent{
    
    
    protected $primaryKey="PlayerID";
    public $timestamps = false;
    public $incrementing=false;
    //protected $incrementing=false;
    
    
    public function room()
    {
        return $this->belongsTo('Room');
    }
    
    public function win()
    {
        if($this->Score==LENGTH)
        {
            return 1+LENGTH; // win ahead of time
        }
        $pairs= Player::find($this->Pair);
        if($pairs->Status!=3)
        {
            return 999;
        }
        else
        {
            return $this->Score-$pairs->Score;
        }
    }
    public function quit()
    {
        $this->Pair='#';
        $this->Room=0;
        $this->save();
    }
    public function send_score($score)
    {
        $this->Score=$score;
        $this->Status=3;
        $this->save();
    }
    public function wait()
    {
        if($this->Status==2)
        {
            
            return true;
        }
        else
        {
            return false;
        }
    }
    public function ready()
    {
        $query=Room::where('Num','=',1)->first();
        if($query)
        {
            DB::beginTransaction();
            $room=$query->toArray();
            $pair=  Player::where('Room','=',$room['Roomid'])->first();
            $pair->Status=2;
            $pair->Score=0;
            $pair->Pair=$this->PlayerID;
            $pair->save();
            $this->Pair=$pair->PlayerID;
            $this->Status=2;
            $this->Score=0;
            $this->Room=$room['Roomid'];
            $this->save();
            $query->Num+=1;
            $query->save();
            DB::commit();
            return true;
        }
        else {
            DB::beginTransaction();
            $room=Room::create(array());
            $this->Status=1;
            $this->Room=$room->Roomid;
            $this->save();
            DB::commit();
            return false;
        }
    }
    
   
}