<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\User;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    	public function run() {
	        self::seedUsers();
	  		$this->command->info('Tabla catálogo inicializada con datos!');
  		}


  		private function seedUsers(){
  			DB::table('users')->delete();
  			$user = new User;
  			$user->name = 'antonio';
  			$user->email = 'antonio@gmail.com';
  			$user->password = bcrypt('pisapedales');
  			$user->save();
  		}





		/*private function seedCatalog(){
			DB::table('movies')->delete();
			foreach ( $this->arrayPeliculas as $pelicula ) {
			    $p = new Movie;
			    $p->title = $pelicula['title'];
			    $p->year = $pelicula['year'];
			    $p->director = $pelicula['director'];
			    $p->poster = $pelicula['poster'];
			    $p->rented = $pelicula['rented'];
			    $p->synopsis = $pelicula['synopsis'];
			    $p->save();
			}
		}*/

  		
    
}
