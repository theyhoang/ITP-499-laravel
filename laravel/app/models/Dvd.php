<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 2/17/14
 * Time: 6:33 PM
 */

class Dvd {

    public static function search($title,$genre_id,$rating_id){
        $query = DB::table('dvds')
            ->select('title','format_name AS format','genre_name AS genre','label_name AS label','rating_name AS rating',
                'sound_name AS sound', DB::raw("DATE_FORMAT(release_date, '%b %d %Y') AS release_date"))
            ->join('formats', 'formats.id', '=', 'dvds.format_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('ratings','ratings.id','=','dvds.rating_id')
            ->join('sounds','sounds.id','=','dvds.sound_id');

        if($title) {
            $query->where('title', 'LIKE', "%$title%");
        }

        if($genre_id != 0){
            $query->where('dvds.genre_id','=',$genre_id);
        }

        if($rating_id != 0){
            $query->where('dvds.rating_id','=',$rating_id);
        }

        $dvds = $query->get();

        return $dvds;

    }

    public static function getGenres(){
        $query = DB::table('genres')
            ->select('id','genre_name');

        $genres = $query->get();

        return $genres;

    }

    public static function getRatings(){
        $query = DB::table('ratings')
            ->select('id','rating_name');

        $ratings = $query->get();

        return $ratings;

    }

}