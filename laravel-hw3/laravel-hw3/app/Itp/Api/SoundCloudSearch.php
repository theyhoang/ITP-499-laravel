<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/4/14
 * Time: 12:14 AM
 */

namespace Itp\Api;


class SoundCloudSearch {

    public $client_id = "772b793cfeaf9b0b5a0e1ac24cc2b6b5";
    public function searchResults($query){
        $endpoint = "http://api.soundcloud.com/tracks.json?q=$query&client_id=$this->client_id";
        $json = file_get_contents($endpoint);
        return json_decode($json);
    }

} 