<?php

class Song extends Eloquent {


	public function artist()
	{
		return $this->belongsTo('Artist');
	}


	public function genre()
	{
		return $this->belongsTo('Genre');
	}

	// this is for date formatting. feel free to explore this
  public function getDates()
  {
    return ['created_at', 'updated_at', 'added'];
  }

} 