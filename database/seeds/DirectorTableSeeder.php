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
        //
    }

    private $arrayDirectors = array(
    	array(
    		'nom_director' => 'Francis Ford Coppola',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '07/04/1939'
    	),
    	array(
    		'nom_director' => 'Steven Spielberg',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '18/12/1946'
    	),
        array(
    		'nom_director' => 'Quentin Tarantino',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '27/03/1963'
	    	),
        array(
    		'nom_director' => 'Frank Darabont',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '28/01/1959'
    		),
    	array(
    		'nom_director' => 'George Roy Hill',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '20/12/1921'
	    	),
    	array(
    		'nom_director' => 'Roberto Benigni',
    		'nacionalitat' => 'Italiana',
    		'data_naixement' => '27/08/1952'
    		),
    	array(
    		'nom_director' => 'Martin Scorsese',
    		'nacionalitat' => 'Estadounidense y Italiana',
    		'data_naixement' => '17/11/1942'
    		),
    	array(
    		'nom_director' => 'Milos Forman',
    		'nacionalitat' => 'Checo',
    		'data_naixement' => '18/02/1932'
    		),
        array(
    		'nom_director' => 'Tony Kaye',
    		'nacionalitat' => 'Británico',
    		'data_naixement' => '08/07/1952'
    		),
        array(
    		'nom_director' => 'Clint Eastwood',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '31/05/1930'
    		),
    	array(
    		'nom_director' => 'Brian De Palma',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '11/09/40'
    		),
    	array(
    		'nom_director' => 'Roman Polanski',
    		'nacionalitat' => 'Polaca y Francea',
    		'data_naixement' => '19/08/1933'
    		),
        array(
    		'nom_director' => 'David Fincher',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '28/08/1962'
    		),
        array(
    		'nom_director' => 'Jonathan Demme',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '22/04/1944'
    		),
    	array(
    		'nom_director' => 'Stanley Kubrick',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '26/07/1928'
    		),
    	array(
    		'nom_director' => 'Ridley Scott',
    		'nacionalitat' => 'Británico',
    		'data_naixement' => '30/11/1937'
    		));
}
