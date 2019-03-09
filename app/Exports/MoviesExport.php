<?php

namespace App\Exports;

use App\Movie;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MoviesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'title',
            'year',
            'rented',
            'synopsis',
        ];
    }
    public function collection()
    {
         $movies = Movie::table('movies')->select('title','year', 'rented', 'synopsis')->get();
         return $movies;
        
    }
}