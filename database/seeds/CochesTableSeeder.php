<?php

use Illuminate\Database\Seeder;

class CochesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEBB2EDBAWBVZ4832',
            'marca' => 'Honda',
            'modelo' => 'Civic Type R',
            'precio' => '19000',
            'año' => '2018',
            'detalle' => 'Honda Civic Type R
                El Honda Civic Type R desembarcó en 
                nuestro mercado en 2017 y se presenta 
                como un vehículo innovador del segmento 
                berlina con portón. ',
            'imagen' => 'hondaCivic.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEHXPUWPM3V7K6NEE',
            'marca' => 'Mini',
            'modelo' => 'COUNTRYMAN ',
            'precio' => '48700',
            'año' => '2019',
            'detalle' => 'Equipado con un diseño sólido y atractivo y con tracción integral, el MINI Countryman es el todoterreno definitivo, listo para llevarte a donde los otros no pueden. Disfruta de una conducción inigualable, ya sea por una sinuosa carretera costera o por las vibrantes calles de la ciudad. Disfruta de una nueva libertad y flexibilidad para conducir a donde quieras. Y disfruta contando tus historias a la vuelta.',
            'imagen' => 'miniCooper.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EE902E2TA9S5X5MVP',
            'marca' => 'Chevrolet',
            'modelo' => 'Camaro',
            'precio' => '40000',
            'año' => '2019',
            'detalle' => 'Con un diseño llamativo, una maniobrabilidad ágil y el nivel justo de potencia, el LS es la presentación ideal de la gama del Camaro, que ofrece un motor turbocargado de 2.0 L con 275 caballos de fuerza y 295 lb-ft de torque junto con una transmisión manual estándar de 6 velocidades.',
            'imagen' => 'chevroletCamaro.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEPXJJAXA2SF0C8JZ',
            'marca' => 'KIA',
            'modelo' => 'KIA Stinger',
            'precio' => '35400',
            'año' => '2019',
            'detalle' => 'El KIA Stinger es una berlina de corte deportivo. Tiene un diseño próximo a un coupé, en una fórmula que nos recuerda a modelos como el Mercedes CLS o los BMW Serie 4 Gran Coupé y Audi A5 Sportback, dos rivales muy directos para el KIA Stinger.',
            'imagen' => 'kiaCoupe.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEC1HVB5MZBA3AC03',
            'marca' => 'Volkswagen',
            'modelo' => 'Escarabajo',
            'precio' => '11500',
            'año' => '1936',
            'detalle' => 'El modelo más conocido de Volkswagen es el Escarabajo, que se viene fabricando en serie desde el año 1936. El Volkswagen Escarabajo se convirtió en junio del 2002 en el automóvil más vendido del mundo con 21 millones de unidades. Sin embargo, sería superado poco después por el Volkswagen Golf.',
            'imagen' => 'volkswagenEscarabajo.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEP5XR14A4S3D4UKT',
            'marca' => 'Opel',
            'modelo' => 'Insignia',
            'precio' => '10000',
            'año' => '2013',
            'detalle' => 'Diseño dinámico, conectividad superior y sistemas inteligentes de asistencia al conductor. Insignia, una irresistible invitación a viajar.',
            'imagen' => 'opelInsignia.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEEH1CM1MRV2A6XYA',
            'marca' => 'Mercedes Benz',
            'modelo' => 'AMG GT',
            'precio' => '130368',
            'año' => '2019',
            'detalle' => 'El Mercedes-AMG GT es un impresionante Gran Turismo con motor V8 biturbo AMG de 4,0 litros, que solo se deja adelantar por sus tres hermanos de la familia GT. El AMG GT S, el AMG GT C y el AMG GT R llevan la AMG Driving Performance hasta sus últimas consecuencias.',
            'imagen' => 'mercedesBenz.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEEH1CM1MPV2A6XYA',
            'marca' => 'Porsche',
            'modelo' => '911 Carrera',
            'precio' => '145000',
            'año' => '2019',
            'detalle' => 'El nuevo 911 es la suma de sus predecesores, y por tanto, supone tanto una retrospectiva como una visión de futuro. ',
            'imagen' => 'Porsche911Carrera.jpg',
        ]);
        DB::table('coches')->insert([
            'numeroBastidor' => 'EEEH1CM1MPV2A6XPA',
            'marca' => 'Nissan',
            'modelo' => 'GTR',
            'precio' => '108000',
            'año' => '2019',
            'detalle' => 'UNA LEYENDA no se basa solo en un
tiempo por vuelta, ni en una marca de 0 a 100,
ni siquiera en un precio. Una leyenda se
cimienta sobre una obsesión por el detalle.
Sobre la firme convicción de que un
superdeportivo debe ofrecer también las
mejores prestaciones en el mundo real. ',
            'imagen' => 'nissanGTR2018.jpg',
        ]);
    }
}
