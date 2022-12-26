<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/osYVpHaTtFg3gsgUXqunnnUPH4OjVvBwQUuAL8qF.png',
                'content_1' => 'HILOS LIBERTAD',
                'content_2' => 'Nos especializamos en Grafica, Publicidad y Packaging.',
            ]);
        }

        /** Card */
        Content::create([
            'section_id' => 2,
            'order'     => 'AA',
            'image'     => 'images/Path_3305.svg',
            'content_1' => 'CORDÓN',
            'content_2' => 'Fabricamos cordones tubulares y trenzados en Poliester y Lurex, desde 1mm hasta 6mm.',
        ]);

        Content::create([
            'section_id' => 2,
            'order'     => 'BB',
            'image'     => 'images/Group_3307.svg',
            'content_1' => 'CINTAS',
            'content_2' => 'Fabricamos cintas de Poliester 100% de 20 - 30 - 40mm Liviana y Pesada.',
        ]);

        /** Hilos Libertad */

        Content::create([
            'section_id' => 3,
            'image'     => 'images/Mask_Group_248.png',
            'content_1' => 'HILOS LIBERTAD',
            'content_2' => 'Somos una empresa PYME familiar situada en el Gran Buenos Aires con una amplia trayectoria textil.',
        ]);


        /** Hilos Libertad */

        Content::create([
            'section_id' => 4,
            'image'     => 'images/Mask_Group_249.png',
            'content_1' => 'SOLICITAR PRESUPUESTO',
            'content_2' => 'Envíanos toda la información de tu proyecto para que podamos cotizarlo.',
        ]);

        /**
         * Fin home page
         */

        /** Empresa  */

       /** Slider */
       for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 5,
                'order'     => 'AA',
                'image'     => 'images/Mask_Group_183.png',
            ]);
        }

        /** Ribon */
        Content::create([
            'section_id' => 6,
            'content_1' => 'Somos una empresa PYME familiar situada en el Gran Buenos Aires con una amplia trayectoria textil.',
        ]);

        /** Descripción de empresa */
        Content::create([
            'section_id' => 7,
            'content_1' => '<p>Nos dedicamos a la produccion de cintas y cordones para bolsas de papel, grafica, publicidad y packaging. Contamos con un amplio stock de productos y colores, para atender la necesidad de nuestros clientes de una pronta entrega.</p><p>Despachamos a todo el pais a traves de expresos con deposito en Buenos Aires, los dias Lunes o bien se puede retirar en nuestra planta de San Martin.</p>',
            'content_2' => '<iframe class="w-100" height="289" src="https://www.youtube.com/embed/Kgujx5bHKWM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>',
        ]);
        
        /** Página cordón */

        Content::create([
            'section_id'=> 8,
            'image'     => 'images/Path_3305.svg',
            'content_1' => 'Cordones',
            'content_2' => 'Fabricamos cordones tubulares y trenzados en Poliester y Lurex, desde 1mm hasta 6mm. Nos especializamos en Grafica, Publicidad y Packaging.',
        ]);

        /** Página Cinta */

        Content::create([
            'section_id' => 9,
            'image'     => 'images/Group_3307.svg',
            'content_1' => 'Cintas',
            'content_2' => 'Fabricamos cintas de Poliester 100% de 20 - 30 - 40mm Liviana y Pesada.',
        ]);

        /** Página Servicios */

        Content::create([
            'section_id' => 10,
            'order'     => 'AA',
            'content_1' => 'corte',
            'content_2' => 'Corte con calor a medida por par desde 35cm a un máximo de 80cm.',
            'content_3' => 'Se entrega en bolsas de 500 tiras, con un pedido mínimo de 2000 tiras.',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'BB',
            'content_1' => 'Puntera',
            'content_2' => 'Colocación de puntera plástica transparente por par desde 35cm a un máximo de 56cm.',
            'content_3' => 'Se entrega en bolsas de 500 tiras, con un pedido mínimo de 2000 tiras.',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'CC',
            'content_1' => 'Encarretelado',
            'content_2' => 'Los metros por carretel varían según el articulo, debajo se muestra cada articulo con sus correspondientes metros.',
            'content_3' => '<table class="table-servicios" style="font-size: 9px; width: 100%;">
            <tbody>
                <tr>
                    <td>Metros</td>
                    <td>Yute</td>
                    <td>171</td>
                    <td>Lurex</td>
                    <td>T5</td>
                    <td>Soga <br> Pesada</td>
                    <td>Cinta <br> Liviana</td>
                    <td>Cinta <br> Pesada</td>
                </tr>
                <tr>
                    <td>300</td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="oscuro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                </tr>
                <tr>
                    <td class="">400</td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="oscuro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="oscuro"></td>
                </tr>
                <tr>
                    <td class="">500</td>
                    <td class="claro"></td>
                    <td class="oscuro"></td>
                    <td class="oscuro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="oscuro"></td>
                    <td class="claro"></td>
                </tr>
                <tr>
                    <td class="">1000</td>
                    <td class="oscuro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                    <td class="claro"></td>
                </tr>
            </tbody>
        </table>
        ']);

        Content::create([
            'section_id' => 11,
            'content_1' => 'BOLSAS',
            'content_2' => 'Complete los datos para calcular la cantidad de metros necesarios.',
        ]);        

    }
}
