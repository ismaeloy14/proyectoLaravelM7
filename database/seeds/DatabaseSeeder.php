<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;
use App\Actor;
use App\ActorMovie;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    	public function run() {
			self::seedUsers();

      Model::unguard();

      $this->call(DirectorTableSeeder::class);

      Model::reguard();

			self::seedCatalog();
      self::seedActors();
      self::seedActorMovies();
	  		$this->command->info('Tabla inicializada con datos!');
  		}


  		private function seedUsers(){
  			DB::table('users')->delete();
  			$user = new User;
  			$user->name = 'test';
  			$user->email = 'test@gmail.com';
  			$user->password = bcrypt('test');
  			$user->save();
  		}	

		private function seedCatalog(){
			DB::table('movies')->delete();
			foreach ( $this->arrayPeliculas as $pelicula ) {
			    $p = new Movie;
			    $p->title = $pelicula['title'];
			    $p->year = $pelicula['year'];
			    $p->id_director = $pelicula['id_director'];
			    $p->poster = $pelicula['poster'];
			    $p->rented = $pelicula['rented'];
			    $p->synopsis = $pelicula['synopsis'];
			    $p->save();
			}
    }
    
    private function seedActors(){
			DB::table('actors')->delete();
			foreach ( $this->actors as $actor ) {
			    $a = new Actor;
			    $a->nom_actor = $actor['nom_actor'];
			    $a->nacionalitat = $actor['nacionalitat'];
          $a->data_naixement = $actor['data_naixement'];
          $a->retrato = $actor['retrato'];
			    $a->save();
			}
    }

    private function seedActorMovies(){
			DB::table('actormovies')->delete();
			foreach ( $this->actormovies as $actormovie ) {
			    $am = new ActorMovie;
			    $am->id_actor = $actormovie['id_actor'];
			    $am->id_movie = $actormovie['id_movie'];
			    $am->save();
			}
    }
    


    

    private $arrayPeliculas = array(
    array(
      'title' => 'El padrino',
      'year' => '1972', 
      'id_director' => '1', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMjEyMjcyNDI4MF5BMl5BanBnXkFtZTcwMDA5Mzg3OA@@._V1_SX214_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.'
    ),
    array(
      'title' => 'El Padrino. Parte II',
      'year' => '1974', 
      'id_director' => '1', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BNDc2NTM3MzU1Nl5BMl5BanBnXkFtZTcwMTA5Mzg3OA@@._V1_SX214_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael Corleone como jefe de los negocios familiares y los orígenes del patriarca, el ya fallecido Don Vito, primero en Sicilia y luego en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.'
    ),
    array(
      'title' => 'La lista de Schindler',
      'year' => '1993', 
      'id_director' => '2', 
      'poster' => 'https://vignette.wikia.nocookie.net/doblaje/images/9/9a/Schindler%27s_List_poster.jpg/revision/latest?cb=20180413193657&path-prefix=es', 
      'rented' => false, 
      'synopsis' => 'Segunda Guerra Mundial (1939-1945). Oskar Schindler (Liam Neeson), un hombre de enorme astucia y talento para las relaciones públicas, organiza un ambicioso plan para ganarse la simpatía de los nazis. Después de la invasión de Polonia por los alemanes (1939), consigue, gracias a sus relaciones con los nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente. Su gerente (Ben Kingsley), también judío, es el verdadero director en la sombra, pues Schindler carece completamente de conocimientos para dirigir una empresa.'
    ),
    array(
      'title' => 'Pulp Fiction',
      'year' => '1994', 
      'id_director' => '3', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMjE0ODk2NjczOV5BMl5BanBnXkFtZTYwNDQ0NDg4._V1_SY317_CR4,0,214,317_AL_.jpg', 
      'rented' => true, 
      'synopsis' => 'Jules y Vincent, dos asesinos a sueldo con muy pocas luces, trabajan para Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse manos a la obra. Su misión: recuperar un misterioso maletín. '
    ),
    array(
      'title' => 'Cadena perpetua',
      'year' => '1994', 
      'id_director' => '4', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BODU4MjU4NjIwNl5BMl5BanBnXkFtZTgwMDU2MjEyMDE@._V1_SX214_AL_.jpg', 
      'rented' => true, 
      'synopsis' => 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.'
    ),
    array(
      'title' => 'El golpe',
      'year' => '1973', 
      'id_director' => '5', 
      'poster' => 'http://es.web.img2.acsta.net/c_215_290/pictures/14/03/27/13/16/401621.jpg', 
      'rented' => false, 
      'synopsis' => 'Chicago, años treinta. Redford y Newman son dos timadores que deciden vengar la muerte de un viejo y querido colega, asesinado por orden de un poderoso gángster (Robert Shaw). Para ello urdirán un ingenioso y complicado plan con la ayuda de todos sus amigos y conocidos.'
    ),
    array(
      'title' => 'La vida es bella',
      'year' => '1997', 
      'id_director' => '6', 
      'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4Y6lo6A6ZDPeF5QouwVFWdzWNheXnSa1PF3Rt-IGxJnqYbvnt', 
      'rented' => true, 
      'synopsis' => 'En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo (Toscana) con la intención de abrir una librería. Allí conoce a Dora y, a pesar de que es la prometida del fascista Ferruccio, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.'
    ),
    array(
      'title' => 'Uno de los nuestros',
      'year' => '1990', 
      'id_director' => '7', 
      'poster' => 'http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/67/70/14/20077949.jpg', 
      'rented' => false, 
      'synopsis' => 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevan los gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría. '
    ),
    array(
      'title' => 'Alguien voló sobre el nido del cuco',
      'year' => '1975', 
      'id_director' => '8', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMTk5OTA4NTc0NF5BMl5BanBnXkFtZTcwNzI5Mzg3OA@@._V1_SY317_CR12,0,214,317_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'Randle McMurphy (Jack Nicholson), un hombre condenado por asalto, y un espíritu libre que vive contracorriente, es recluido en un hospital psiquiátrico. La inflexible disciplina del centro acentúa su contagiosa tendencia al desorden, que acabará desencadenando una guerra entre los pacientes y el personal de la clínica con la fría y severa enfermera Ratched (Louise Fletcher) a la cabeza. La suerte de cada paciente del pabellón está en juego.'
    ),
    array(
      'title' => 'American History X',
      'year' => '1998', 
      'id_director' => '9', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMjMzNDUwNTIyMF5BMl5BanBnXkFtZTcwNjMwNDg3OA@@._V1_SY317_CR17,0,214,317_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'Derek (Edward Norton), un joven "skin head" californiano de ideología neonazi, fue encarcelado por asesinar a un negro que pretendía robarle su furgoneta. Cuando sale de prisión y regresa a su barrio dispuesto a alejarse del mundo de la violencia, se encuentra con que su hermano pequeño (Edward Furlong), para quien Derek es el modelo a seguir, sigue el mismo camino que a él lo condujo a la cárcel.'
    ),
    array(
      'title' => 'Sin perdón',
      'year' => '1992', 
      'id_director' => '10', 
      'poster' => 'https://images-na.ssl-images-amazon.com/images/I/61ELZIraHbL._SY679_.jpg', 
      'rented' => false, 
      'synopsis' => 'William Munny (Clint Eastwood) es un pistolero retirado, viudo y padre de familia, que tiene dificultades económicas para sacar adelante a su hijos. Su única salida es hacer un último trabajo. En compañía de un viejo colega (Morgan Freeman) y de un joven inexperto (Jaimz Woolvett), Munny tendrá que matar a dos hombres que cortaron la cara a una prostituta.'
    ),
    array(
      'title' => 'El precio del poder',
      'year' => '1983', 
      'id_director' => '11', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMjAzOTM4MzEwNl5BMl5BanBnXkFtZTgwMzU1OTc1MDE@._V1_SX214_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'Tony Montana es un emigrante cubano frío y sanguinario que se instala en Miami con el propósito de convertirse en un gángster importante. Con la colaboración de su amigo Manny Rivera inicia una fulgurante carrera delictiva con el objetivo de acceder a la cúpula de una organización de narcos.'
    ),
    array(
      'title' => 'El pianista',
      'year' => '2002', 
      'id_director' => '12', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMTc4OTkyOTA3OF5BMl5BanBnXkFtZTYwMDIxNjk5._V1_SX214_AL_.jpg', 
      'rented' => true, 
      'synopsis' => 'Wladyslaw Szpilman, un brillante pianista polaco de origen judío, vive con su familia en el ghetto de Varsovia. Cuando, en 1939, los alemanes invaden Polonia, consigue evitar la deportación gracias a la ayuda de algunos amigos. Pero tendrá que vivir escondido y completamente aislado durante mucho tiempo, y para sobrevivir tendrá que afrontar constantes peligros.'
    ),
    array(
      'title' => 'Seven',
      'year' => '1995', 
      'id_director' => '13', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMTQwNTU3MTE4NF5BMl5BanBnXkFtZTcwOTgxNDM2Mg@@._V1_SX214_AL_.jpg', 
      'rented' => true, 
      'synopsis' => 'El veterano teniente Somerset (Morgan Freeman), del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso e impulsivo detective David Mills (Brad Pitt). Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta.'
    ),
    array(
      'title' => 'El silencio de los corderos',
      'year' => '1991', 
      'id_director' => '14', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMTQ2NzkzMDI4OF5BMl5BanBnXkFtZTcwMDA0NzE1NA@@._V1_SX214_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'El FBI busca a "Buffalo Bill", un asesino en serie que mata a sus víctimas, todas adolescentes, después de prepararlas minuciosamente y arrancarles la piel. Para poder atraparlo recurren a Clarice Starling, una brillante licenciada universitaria, experta en conductas psicópatas, que aspira a formar parte del FBI. Siguiendo las instrucciones de su jefe, Jack Crawford, Clarice visita la cárcel de alta seguridad donde el gobierno mantiene encerrado a Hannibal Lecter, antiguo psicoanalista y asesino, dotado de una inteligencia superior a la normal. Su misión será intentar sacarle información sobre los patrones de conducta de "Buffalo Bill".'
    ),
    array(
      'title' => 'La naranja mecánica',
      'year' => '1971', 
      'id_director' => '15', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMTY3MjM1Mzc4N15BMl5BanBnXkFtZTgwODM0NzAxMDE@._V1_SY317_CR0,0,214,317_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'Gran Bretaña, en un futuro indeterminado. Alex (Malcolm McDowell) es un joven muy agresivo que tiene dos pasiones: la violencia desaforada y Beethoven. Es el jefe de la banda de los drugos, que dan rienda suelta a sus instintos más salvajes apaleando, violando y aterrorizando a la población. Cuando esa escalada de terror llega hasta el asesinato, Alex es detenido y, en prisión, se someterá voluntariamente a una innovadora experiencia de reeducación que pretende anular drásticamente cualquier atisbo de conducta antisocial.'
    ),
    array(
      'title' => 'La chaqueta metálica',
      'year' => '1987', 
      'id_director' => '15', 
      'poster' => 'https://m.media-amazon.com/images/M/MV5BNzkxODk0NjEtYjc4Mi00ZDI0LTgyYjEtYzc1NDkxY2YzYTgyXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX182_CR0,0,182,268_AL_.jpg', 
      'rented' => true, 
      'synopsis' => 'Un grupo de reclutas se prepara en Parish Island, centro de entrenamiento de la marina norteamericana. Allí está el sargento Hartman, duro e implacable, cuya única misión en la vida es endurecer el cuerpo y el alma de los novatos, para que puedan defenderse del enemigo. Pero no todos los jóvenes están preparados para soportar sus métodos. '
    ),
    array(
      'title' => 'Blade Runner',
      'year' => '1982', 
      'id_director' => '16', 
      'poster' => 'https://vignette.wikia.nocookie.net/doblaje/images/9/9c/Blade_Runner_2049_Poster_Latino_JPosters.jpg/revision/latest?cb=20170827044904&path-prefix=es', 
      'rented' => true, 
      'synopsis' => 'A principios del siglo XXI, la poderosa Tyrell Corporation creó, gracias a los avances de la ingeniería genética, un robot llamado Nexus 6, un ser virtualmente idéntico al hombre pero superior a él en fuerza y agilidad, al que se dio el nombre de Replicante. Estos robots trabajaban como esclavos en las colonias exteriores de la Tierra. Después de la sangrienta rebelión de un equipo de Nexus-6, los Replicantes fueron desterrados de la Tierra. Brigadas especiales de policía, los Blade Runners, tenían órdenes de matar a todos los que no hubieran acatado la condena. Pero a esto no se le llamaba ejecución, se le llamaba "retiro". '
    ),
    array(
      'title' => 'Taxi Driver',
      'year' => '1976', 
      'id_director' => '7', 
      'poster' => 'http://ia.media-imdb.com/images/M/MV5BMTQ1Nzg3MDQwN15BMl5BanBnXkFtZTcwNDE2NDU2MQ@@._V1_SY317_CR9,0,214,317_AL_.jpg', 
      'rented' => false, 
      'synopsis' => 'Para sobrellevar el insomnio crónico que sufre desde su regreso de Vietnam, Travis Bickle (Robert De Niro) trabaja como taxista nocturno en Nueva York. Es un hombre insociable que apenas tiene contacto con los demás, se pasa los días en el cine y vive prendado de Betsy (Cybill Shepherd), una atractiva rubia que trabaja como voluntaria en una campaña política. Pero lo que realmente obsesiona a Travis es comprobar cómo la violencia, la sordidez y la desolación dominan la ciudad. Y un día decide pasar a la acción.'
    ),
    array(
      'title' => 'El club de la lucha',
      'year' => '1999', 
      'id_director' => '13', 
      'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ623m5q0G4rumCY8ZJuOY31QyNzcpwZoZTTpo2KaTL97TTlJMT', 
      'rented' => true, 
      'synopsis' => 'Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador.'
    )
  );

		private $actors = array(
			array(
				'nom_actor' => 'Marlon Brando',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTg3MDYyMDE5OF5BMl5BanBnXkFtZTcwNjgyNTEzNA@@._V1_UY317_CR97,0,214,317_AL_.jpg%C3%A7', 
				'data_naixement' => '1924/04/03'
			),
			array(
				'nom_actor' => 'Liam Neeson',
        'nacionalitat' => 'Ingles',
        'data_naixement' => '1952/06/07',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMjA1MTQ3NzU1MV5BMl5BanBnXkFtZTgwMDE3Mjg0MzE@._V1_UY317_CR52,0,214,317_AL_.jpg'
				
      ),
			array(
				'nom_actor' => 'Al Pacino',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTQzMzg1ODAyNl5BMl5BanBnXkFtZTYwMjAxODQ1._V1_UX214_CR0,0,214,317_AL_.jpg',  
				'data_naixement' => '1940/04/25'
      ),
			array(
				'nom_actor' => 'John Travolta',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTUwNjQ0ODkxN15BMl5BanBnXkFtZTcwMDc5NjQwNw@@._V1_UY317_CR11,0,214,317_AL_.jpg',  
				'data_naixement' => '1954/02/18'
      ),
			array(
				'nom_actor' => 'Morgan Freeman',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTc0MDMyMzI2OF5BMl5BanBnXkFtZTcwMzM2OTk1MQ@@._V1_UX214_CR0,0,214,317_AL_.jpg',  
				'data_naixement' => '1937/06/01'
      ),
			array(
				'nom_actor' => 'Paul Newman',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BODUwMDYwNDg3N15BMl5BanBnXkFtZTcwODEzNTgxMw@@._V1_UY317_CR22,0,214,317_AL_.jpg',  
				'data_naixement' => '1925/01/26'
      ),
      array(
				'nom_actor' => 'Roberto Benigni',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTUwMzI1Nzg5NF5BMl5BanBnXkFtZTYwODU5NjYz._V1_UY317_CR13,0,214,317_AL_.jpg',  
				'data_naixement' => '1952/10/27'
      ),
      array(
				'nom_actor' => 'Robert De Niro',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMjAwNDU3MzcyOV5BMl5BanBnXkFtZTcwMjc0MTIxMw@@._V1_UY317_CR13,0,214,317_AL_.jpg',  
				'data_naixement' => '1943/08/17'
      ),
      array(
				'nom_actor' => 'Jack Nicholson',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTQ3OTY0ODk0M15BMl5BanBnXkFtZTYwNzE4Njc4._V1_UY317_CR7,0,214,317_AL_.jpg',  
				'data_naixement' => '1937/04/22'
      ),
      array(
				'nom_actor' => 'Edward Norton',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTYwNjQ5MTI1NF5BMl5BanBnXkFtZTcwMzU5MTI2Mw@@._V1_UY317_CR16,0,214,317_AL_.jpg',  
				'data_naixement' => '1969/08/18'
      ),
      array(
				'nom_actor' => 'Clint Eastwood',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTg3MDc0MjY0OV5BMl5BanBnXkFtZTcwNzU1MDAxOA@@._V1_UY317_CR10,0,214,317_AL_.jpg',  
				'data_naixement' => '1930/05/31'
      ),
      array(
				'nom_actor' => 'Adrien Brody',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMjI3ODkxMjU3OF5BMl5BanBnXkFtZTgwMTk2Njk3MTE@._V1_UX214_CR0,0,214,317_AL_.jpg',  
				'data_naixement' => '1973/04/14'
      ),
      array(
				'nom_actor' => 'Brad Pitt',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMjA1MjE2MTQ2MV5BMl5BanBnXkFtZTcwMjE5MDY0Nw@@._V1_UX214_CR0,0,214,317_AL_.jpg',  
				'data_naixement' => '1963/12/18'
      ),
      array(
				'nom_actor' => 'Anthony Hopkins',
				'nacionalitat' => 'Galesa',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTg5ODk1NTc5Ml5BMl5BanBnXkFtZTYwMjAwOTI4._V1_UY317_CR6,0,214,317_AL_.jpg',  
				'data_naixement' => '1937/12/31'
      ),
      array(
				'nom_actor' => 'Malcolm McDowell',
				'nacionalitat' => 'Inglesa',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTcxMjQxNzczM15BMl5BanBnXkFtZTcwMTg3MTMwNw@@._V1_UY317_CR6,0,214,317_AL_.jpg',  
				'data_naixement' => '1943/06/13'
      ),
      array(
				'nom_actor' => 'Matthew Modine',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTU3MzQyOTM5MF5BMl5BanBnXkFtZTgwNDg2Njk2OTE@._V1_UY317_CR8,0,214,317_AL_.jpg',  
				'data_naixement' => '1943/06/13'
      ),
      array(
				'nom_actor' => 'Harrison Ford',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTY4Mjg0NjIxOV5BMl5BanBnXkFtZTcwMTM2NTI3MQ@@._V1_UX214_CR0,0,214,317_AL_.jpg',  
				'data_naixement' => '1942/07/13'
      ),
      array(
				'nom_actor' => 'Cybill Shepherd',
				'nacionalitat' => 'Estadounidense',
        'retrato'=> 'https://m.media-amazon.com/images/M/MV5BMTUzNTA1Mzg5M15BMl5BanBnXkFtZTYwNjkzNDk3._V1_UX214_CR0,0,214,317_AL_.jpg',  
				'data_naixement' => '1950/02/18'
      )
			);

      private $actormovies = array(
        array(
          'id_actor' => '1', //'Marlon Brando'
          'id_movie' => '1'
        ),
        array(
          'id_actor' => '2', //'Liam Neeson',
          'id_movie' => '3'
        ),
        array(
          'id_actor' => '3', //'Al Pacino',
          'id_movie' => '2'
        ),
        array(
          'id_actor' => '4', //'John Travolta',
          'id_movie' => '4'
        ),
        array(
          'id_actor' => '5', //'Morgan Freeman',
          'id_movie' => '5'
        ),
        array(
          'id_actor' => '6', //'Paul Newman',
          'id_movie' => '6'
        ),
        array(
          'id_actor' => '7', //'Roberto Benigni',
          'id_movie' => '7'
        ),
        array(
          'id_actor' => '8', //'Robert De Niro',
          'id_movie' => '8'
        ),
        array(
          'id_actor' => '9', //'Jack Nicholson',
          'id_movie' => '9'
        ),
        array(
          'id_actor' => '10', //'Edward Norton',
          'id_movie' => '10'
        ),
        array(
          'id_actor' => '11', //'Clint Eastwood',
          'id_movie' => '11'
        ),
        array(
          'id_actor' => '12', //'Adrien Brody',
          'id_movie' => '13'
        ),
        array(
          'id_actor' => '3', //'Al Pacino',
          'id_movie' => '12'
        ),
        array(
          'id_actor' => '13', //'Brad Pitt',
          'id_movie' => '14'
        ),
        array(
          'id_actor' => '14', //'Anthony Hopkins',
          'id_movie' => '15'
        ),
        array(
          'id_actor' => '15', //'Malcolm McDowell',
          'id_movie' => '16'
        ),
        array(
          'id_actor' => '16', //'Matthew Modine',
          'id_movie' => '17'
        ),
        array(
          'id_actor' => '17', //'Harrison Ford',
          'id_movie' => '18'
        ),
        array(
          'id_actor' => '18', //'Cybill Shepherd',
          'id_movie' => '19'
        ),
        array(
          'id_actor' => '13', //'Brad Pitt',
          'id_movie' => '20'
        ),
        array(
          'id_actor' => '5', //'Morgan Freeman',
          'id_movie' => '20'
        )
        );
		
		
}
