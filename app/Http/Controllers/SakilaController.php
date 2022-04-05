<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Film;
use App\Models\Category;
use App\Models\Actor;
use App\Models\Language;

use Illuminate\Http\Request;

class SakilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $films = Film::all();
         
        return view('film.index', compact('films'));

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Platos  $platos
     * @return \Illuminate\Http\Response
     */
    public function show(Film $films, $id)
    {
        $films=Film::findOrFail($id);

        return view('film.show', compact('films'));
    }


    public function grafico()
    {
        $consulta='SELECT count(*) AS Alquileres, MONTH(rental_date) AS Mes  FROM `rental` WHERE YEAR(rental_date) = 2005 GROUP BY MONTH(rental_date)';
        $datagrafico=[];
        $meses= DB::select($consulta);

        $i=0;

        foreach ($meses as $mes) {
            while ($i < (($mes->Mes)-1)) {
                array_push($datagrafico, 0);
                $i++;
            }
            array_push($datagrafico, $mes->Alquileres);
            $i++;
        }
         
        return view('film.grafico', compact('meses','datagrafico'));
    }


    public function formbusq()
    {
        $languages = Language::all();
        $cates = Category::all();
         
        return view('film.formbusq', compact('languages','cates'));
    }

    public function graficobusqueda()
    {
        $films = Film::all();
        $cates = Category::all();

            $cat = $_POST['category'];
            $datagrafico=[];

            $consulta1="SELECT count(rental.rental_id) AS Alquileres, category.name, MONTH(rental_date) AS mes 
            FROM `rental` 
            INNER JOIN `inventory` ON rental.inventory_id = inventory.inventory_id 
            INNER JOIN `film` ON inventory.film_id = film.film_id 
            INNER JOIN `film_category` ON film.film_id = film_category.film_id 
            INNER JOIN `category` ON category.category_id = film_category.category_id 
            WHERE YEAR(rental_date) = 2005 && category.category_id =".$cat."
            GROUP BY mes
            ORDER BY mes ASC;
            ";


            $meses= DB::select($consulta1);

            $i=0;
          
            foreach ($meses as $mes) {
            while ($i < (($mes->mes)-1)) {
                array_push($datagrafico, 0);
                $i++;
            }
            array_push($datagrafico, $mes->Alquileres);
            $i++;
        }
         
            return view('film.graficoresp', compact('datagrafico','cat','cates'));
          
    }

    public function graficobusqueda1()
    {
        $films = Film::all();
        $categories = Category::all();

     
            $datagrafico=[];

            

            $consulta1="SELECT count(rental.rental_id) AS Alquileres, category.name 
            FROM `rental` 
            INNER JOIN `inventory` ON rental.inventory_id = inventory.inventory_id 
            INNER JOIN `film` ON inventory.film_id = film.film_id 
            INNER JOIN `film_category` ON film.film_id = film_category.film_id 
            INNER JOIN `category` ON category.category_id = film_category.category_id 
            WHERE YEAR(rental_date) = 2005 
            GROUP BY category.category_id;
            ";

            $cates= DB::select($consulta1);

            $i=0;

            foreach ($cates as $cate) {
            array_push($datagrafico, $cate->Alquileres);
            $i++;
        }
         
            return view('film.graficoresp1', compact('datagrafico','categories'));
          
    }

 




}


