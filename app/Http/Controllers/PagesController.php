<?php

namespace App\Http\Controllers;

use App\Data;
use App\Page;
use App\Color;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use SEO;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription($page->keywords);

        
        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first(); // section2 == sección de card
        $section3 = $sections->where('name', 'section_3')->first(); // section3 == sección de hilos libertad
        $section4 = $sections->where('name', 'section_4')->first(); // section4 == sección de solicitar presupuesto

        $section1s  = $section1->contents()->orderBy('order', 'ASC')->get();

        $section2   = $section2->contents;
        $card1      = $section2->first();
        $card2      = $section2->last();

        $section3   = $section3->contents()->first();
        
        $section4   = $section4->contents()->first();


        return view('paginas.index', compact('section1s', 'card1', 'card2', 'section3', 'section4'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        SEO::setTitle('Empresa');
        SEO::setDescription($page->keywords);
        /** Secciones de página */
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first(); // section2 == sección de ribbon
        $section3 = $sections->where('name', 'section_3')->first(); // section3 == sección de empresa 

        $sliders    =  $section1->contents()->orderBy('order', 'ASC')->get();
        $ribbon     =  $section2->contents()->first();
        $company    =  $section3->contents()->first();

        return view('paginas.empresa', compact('sliders', 'ribbon', 'company'));
    }

    public function cordon()
    {

        $page = Page::where('name', 'cordon')->first();
        /** Secciones de página */
        $hero = $page->sections()->where('name', 'section_1')->first()->contents()->first(); // section1 == sección hero
        $hero = $hero->content_1 ? $hero : null;
        $caterory = Category::where('name', 'cordon')->first();
        $products = $caterory ? $caterory->products()->orderBy('order_product', 'ASC')->get() : null;

        if ($products) {
            SEO::setTitle('Cordon');
            SEO::setDescription($page->keywords);
        }

        return view('paginas.cordon', compact('hero', 'products'));
    }

    public function cinta()
    {
        $page = Page::where('name', 'cinta')->first();
        /** Secciones de página */
        $hero = $page->sections()->where('name', 'section_1')->first()->contents()->first(); // section1 == sección hero
        $hero = $hero->content_1 ? $hero : null;
        $caterory = Category::where('name', 'cinta')->first();
        $products = $caterory ? $caterory->products()->orderBy('order_product', 'ASC')->get() : null;

        if ($products) {
            SEO::setTitle("Cinta");
            SEO::setDescription($page->keywords);
        }

        return view('paginas.cinta', compact('hero', 'products'));
    }

    public function productos(Request $request)
    {

        $products = Product::orderBy('order_product', 'ASC')->get();

        if ($products) {
            $page = Page::where('name', 'productos')->first();
            SEO::setTitle("Productos");
            SEO::setDescription($page->keywords);     
        }
        return view('paginas.productos', compact('products'));
    }

    public function producto(Product $product)
    {
        $productsCategory = Category::find($product->category_id)->products()->take(20)->get();
        $quantityOfProducts = $productsCategory->count();
        $randomProducts = ($quantityOfProducts >= 3) ? 3 : $quantityOfProducts;

        if ($product) {
            SEO::setTitle($product->name);
            SEO::setDescription($product->keywords);
        }

        return view('paginas.producto', compact('productsCategory', 'product', 'randomProducts'));
    }

    public function servicios()
    {
        $page = Page::where('name', 'servicios')->first();
        $sections = $page->sections;
        $contents = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); 
        $hasService = false;

        foreach ($contents as $content) 
            if($content->content_1) $hasService = true;
        
        $form  = $sections->where('name', 'section_2')->first()->contents()->first();

        SEO::setTitle('Servicios');
        SEO::setDescription($page->keywords);

        return view('paginas.servicios', compact('contents', 'form', 'hasService'));
    }

    public function colores()
    {
        $page = Page::where('name', 'colores')->first();
        SEO::setTitle('Colores');
        SEO::setDescription($page->keywords);
        $colors = Color::all();
        return view('paginas.colores', compact('colors'));
    }

    public function solicitudPresupuesto()
    {
        $page = Page::where('name', 'solicitud-de-presupuesto')->first();
        SEO::setTitle("Solicitud de presupuesto");
        SEO::setDescription($page->keywords);
        return view('paginas.solicitud-de-presupuesto');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto");
        SEO::setDescription($page->keywords);       
        return view('paginas.contacto');
    }
}
