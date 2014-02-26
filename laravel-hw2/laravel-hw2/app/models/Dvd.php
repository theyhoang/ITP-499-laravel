<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 2/20/14
 * Time: 9:47 PM
 */

class Dvd extends Eloquent{

    public function format()
    {
        return $this->belongsTo('Format');
    }

    public function genre()
    {
        return $this->belongsTo('Genre');
    }

    public function label()
    {
        return $this->belongsTo('Label');
    }

    public function rating()
    {
        return $this->belongsTo('Rating');
    }

    public function sound()
    {
        return $this->belongsTo('Sound');
    }

} 