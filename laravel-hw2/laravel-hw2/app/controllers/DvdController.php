<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 2/25/14
 * Time: 3:05 PM
 */

class DvdController extends BaseController{

    public function search() {

        $genres = Genre::all();
        $ratings = Rating::all();


        return View::make('dvds/search', [
            'genres' => $genres,
            'ratings'=> $ratings
        ]);
    }

    public function results() {
        $title = Input::get('title');
        $genre_id = Input::get('genre_id');
        $rating_id = Input::get('rating_id');

        if ($genre_id == 0){
            $genre_id = null;
        }
        if ($rating_id == 0){
            $rating_id = null;
        }

        $tmp_dvds = Dvd::select('title', 'genre_name AS genre', 'genre_id', 'rating_name AS rating', 'label_name AS label',
            'sound_name AS sound', 'format_name AS format', 'release_date');
        if($genre_id){
            $tmp_dvds = $tmp_dvds->where('dvds.genre_id', $genre_id);
        }
        if($rating_id){
            $tmp_dvds = $tmp_dvds->where('dvds.rating_id', $rating_id);
        }
        $tmp_dvds = $tmp_dvds
            ->where('title', 'LIKE', '%'.$title.'%')
            ->join('genres', function($join){
                $join->on('dvds.genre_id','=','genres.id');
            })
            ->join('labels', function($join){
                $join->on('dvds.label_id','=','labels.id');
            })
            ->join('sounds', function($join){
                $join->on('dvds.sound_id','=','sounds.id');
            })
            ->join('ratings', function($join){
                $join->on('dvds.rating_id','=','ratings.id');
            })
            ->join('formats', function($join){
                $join->on('dvds.format_id','=','formats.id');
            });

        $dvds = $tmp_dvds->take(30)->get();

        return View::make('dvds/results',[
            'dvds' => $dvds
        ]);

    }

    public function createDvd(){
        $genres = Genre::all();
        $labels = Label::all();
        $sounds = Sound::all();
        $ratings = Rating::all();
        $formats = Format::all();

        return View::make('dvds/create', [
            'genres' => $genres,
            'labels' => $labels,
            'sounds' => $sounds,
            'ratings' => $ratings,
            'formats' => $formats
        ]);
    }

    public function insertDvd(){
        $title = Input::get('title');
        $label_id = Input::get('label');
        $sound_id = Input::get('sound_');
        $genre_id = Input::get('genre');
        $rating_id = Input::get('rating');
        $format_id = Input::get('format');

        $dvd = new Dvd;
        $dvd->title = $title;
        $dvd->label_id = $label_id;
        $dvd->sound_id = $sound_id;
        $dvd->genre_id = $genre_id;
        $dvd->rating_id = $rating_id;
        $dvd->format_id = $format_id;

        $dvd->save();

        return Redirect::to('/dvds/create')->with('success', 'Dvd created Successfully.');
    }
}