<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 2/17/14
 * Time: 6:34 PM
 */

class DvdController extends BaseController {

    public function search()
    {

        $genres = Dvd::getGenres();
        $ratings = Dvd::getRatings();


        return View::make('dvds/search', [
            'genres' => $genres,
            'ratings'=> $ratings
        ]);
    }

    public function results()
    {
        $title = Input::get('title'); // $_GET['song_title']
        $genre_id = Input::get('genre_id');
        $rating_id = Input::get('rating_id');

        $dvds = Dvd::search($title,$genre_id,$rating_id);

        return View::make('dvds/results', [
            'dvds' => $dvds
        ]);
    }

} 