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
            $d->save();
        }
        
    }

    private $arrayDirectors = array(
    	array(
    		'nom_director' => 'Francis Ford Coppola',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1939/04/07',
            'imagenDirector' => '',
    	),
    	array(
    		'nom_director' => 'Steven Spielberg',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1946/12/18',
            'imagenDirector' => '',
    	),
        array(
    		'nom_director' => 'Quentin Tarantino',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1963/03/27',
            'imagenDirector' => '',
	    	),
        array(
    		'nom_director' => 'Frank Darabont',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1959/01/28',
            'imagenDirector' => '',
    		),
    	array(
    		'nom_director' => 'George Roy Hill',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1921/12/20',
            'imagenDirector' => '',
	    	),
    	array(
    		'nom_director' => 'Roberto Benigni',
    		'nacionalitat' => 'Italiana',
    		'data_naixement' => '1952/08/27',
            'imagenDirector' => '',
    		),
    	array(
    		'nom_director' => 'Martin Scorsese',
    		'nacionalitat' => 'Estadounidense y Italiana',
    		'data_naixement' => '1942/11/17',
            'imagenDirector' => '',
    		),
    	array(
    		'nom_director' => 'Milos Forman',
    		'nacionalitat' => 'Checo',
    		'data_naixement' => '1932/02/18',
            'imagenDirector' => '',
    		),
        array(
    		'nom_director' => 'Tony Kaye',
    		'nacionalitat' => 'Británico',
    		'data_naixement' => '1952/07/08',
            'imagenDirector' => '',
    		),
        array(
    		'nom_director' => 'Clint Eastwood',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1930/05/31',
            'imagenDirector' => '',
    		),
    	array(
    		'nom_director' => 'Brian De Palma',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1940/09/11',
            'imagenDirector' => '',
    		),
    	array(
    		'nom_director' => 'Roman Polanski',
    		'nacionalitat' => 'Polaca y Francea',
    		'data_naixement' => '1933/08/19',
            'imagenDirector' => '',
    		),
        array(
    		'nom_director' => 'David Fincher',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1962/08/28',
            'imagenDirector' => '',
    		),
        array(
    		'nom_director' => 'Jonathan Demme',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1944/04/22',
            'imagenDirector' => '',
    		),
    	array(
    		'nom_director' => 'Stanley Kubrick',
    		'nacionalitat' => 'Estadounidense',
    		'data_naixement' => '1928/07/26',
            'imagenDirector' => '',
    		),
    	array(
    		'nom_director' => 'Ridley Scott',
    		'nacionalitat' => 'Británico',
    		'data_naixement' => '1937/11/30',
            'imagenDirector' => '',
    		));
}
