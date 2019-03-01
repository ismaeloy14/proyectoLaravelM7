<?php

use Illuminate\Database\Seeder;
use App\Director;

class DirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedDirectors();
        $this->command->info('Tabla inicializada con datos!');
    }
    
    private function seedDirectors(){
        DB::table('directors')->delete();
        foreach ( $this->arrayDirectors as $director ) {
            $d = new Director;
            $d ->nom_director = $director['nom_director'];
            $d ->nacionalitat = $director['nacionalitat'];
			$d ->data_naixement = $director['data_naixement'];
			$d ->imagenDirector = $director['imagenDirector'];
            $d->save();
        }
        
    }

    private $arrayDirectors = array(
    	array(
    		'nom_director' => 'Francis Ford Coppola',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1939/04/07',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTM5NDU3OTgyNV5BMl5BanBnXkFtZTcwMzQxODA0NA@@._V1_UX214_CR0,0,214,317_AL_.jpg',
    	),
    	array(
    		'nom_director' => 'Steven Spielberg',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1946/12/18',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTY1NjAzNzE1MV5BMl5BanBnXkFtZTYwNTk0ODc0._V1_UX214_CR0,0,214,317_AL_.jpg',
    	),
        array(
    		'nom_director' => 'Quentin Tarantino',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1963/03/27',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTgyMjI3ODA3Nl5BMl5BanBnXkFtZTcwNzY2MDYxOQ@@._V1_UX214_CR0,0,214,317_AL_.jpg',
	    	),
        array(
    		'nom_director' => 'Frank Darabont',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1959/01/28',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BNjk0MTkxNzQwOF5BMl5BanBnXkFtZTcwODM5OTMwNA@@._V1_UY317_CR20,0,214,317_AL_.jpg',
    		),
    	array(
    		'nom_director' => 'George Roy Hill',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1921/12/20',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMjE1NzM2MTM1OF5BMl5BanBnXkFtZTgwNjA3Nzg4MDE@._V1_UY317_CR50,0,214,317_AL_.jpg',
	    	),
    	array(
    		'nom_director' => 'Roberto Benigni',
    		'nacionalitat' => 'Italiana',
    		'data_naixement' => '1952/08/27',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTUwMzI1Nzg5NF5BMl5BanBnXkFtZTYwODU5NjYz._V1_UY317_CR13,0,214,317_AL_.jpg',
    		),
    	array(
    		'nom_director' => 'Martin Scorsese',
    		'nacionalitat' => 'Estadounidense y Italiana',
    		'data_naixement' => '1942/11/17',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTcyNDA4Nzk3N15BMl5BanBnXkFtZTcwNDYzMjMxMw@@._V1_UX214_CR0,0,214,317_AL_.jpg',
    		),
    	array(
    		'nom_director' => 'Milos Forman',
    		'nacionalitat' => 'Checo',
    		'data_naixement' => '1932/02/18',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BNDY5NDAyODM2Nl5BMl5BanBnXkFtZTcwMzgzNzg3OA@@._V1_UY317_CR13,0,214,317_AL_.jpg',
    		),
        array(
    		'nom_director' => 'Tony Kaye',
    		'nacionalitat' => 'Británico',
    		'data_naixement' => '1952/07/08',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTY4Nzg0MTQ4Ml5BMl5BanBnXkFtZTcwMTcwMzcwNQ@@._V1_UY317_CR24,0,214,317_AL_.jpg',
    		),
        array(
    		'nom_director' => 'Clint Eastwood',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1930/05/31',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTg3MDc0MjY0OV5BMl5BanBnXkFtZTcwNzU1MDAxOA@@._V1_UY317_CR10,0,214,317_AL_.jpg',
    		),
    	array(
    		'nom_director' => 'Brian De Palma',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1940/09/11',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTI2ODQ0NDY3OV5BMl5BanBnXkFtZTYwNjAxNTM0._V1_UX214_CR0,0,214,317_AL_.jpg',
    		),
    	array(
    		'nom_director' => 'Roman Polanski',
    		'nacionalitat' => 'Polaca y Francea',
    		'data_naixement' => '1933/08/19',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTAzNzgwMzMyNDNeQTJeQWpwZ15BbWU2MDg0MDkzNA@@._V1_UX214_CR0,0,214,317_AL_.jpg',
    		),
        array(
    		'nom_director' => 'David Fincher',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1962/08/28',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTc1NDkwMTQ2MF5BMl5BanBnXkFtZTcwMzY0ODkyMg@@._V1_UX214_CR0,0,214,317_AL_.jpg',
    		),
        array(
    		'nom_director' => 'Jonathan Demme',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1944/04/22',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTY1NzY0OTQ0OF5BMl5BanBnXkFtZTcwNDY1Njk5Mg@@._V1_UY317_CR3,0,214,317_AL_.jpg',
    		),
    	array(
    		'nom_director' => 'Stanley Kubrick',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1928/07/26',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMTIwMzAwMzg1MV5BMl5BanBnXkFtZTYwMjc4ODQ2._V1_UX214_CR0,0,214,317_AL_.jpg',
    		),
    	array(
    		'nom_director' => 'Ridley Scott',
    		'nacionalitat' => 'Británico',
    		'data_naixement' => '1937/11/30',
            'imagenDirector' => 'https://m.media-amazon.com/images/M/MV5BMGJkOGM5OWEtNDYxMy00Njg4LWExNjAtY2ZlNWNlNzVhNDk4XkEyXkFqcGdeQXVyNDkzNTM2ODg@._V1_UX214_CR0,0,214,317_AL_.jpg',
    		));
}
