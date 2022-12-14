<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    //

    public function index()
    {
        $pages = Page::all();
        $slider1 = $pages[2];
        $slider2 = $pages[3];
        $slider3 = $pages[4];

        $about_us = $pages[0];
        $about_us->description_en = Str::limit($about_us->description_en , 600);
        $about_us->description_ar = Str::limit($about_us->description_ar , 600);

        $our_products_page = $pages[1];

        $products = Product::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $partners = Partner::all();

        $portfolios = Portfolio::all();

        return view('front.index')->with('slider1', $slider1)->with('slider2', $slider2)->with('slider3', $slider3)->with('our_products_page', $our_products_page)->with('products', $products)->with('about_us', $about_us)->with('partners', $partners)->with('portfolios', $portfolios);
    }

    public function aboutus()
    {
        $about_us = Page::find(1);
        return view('front.aboutus')->with('about_us', $about_us);
    }

    public function ourProducts(Request $request)
    {
        $products = Product::orderBy('id')->paginate(3);
        $our_products_page = Page::find(2);

        if ($request->ajax()) {
            $view = view('front.data', compact('products'))->render();
            return response()->json(['html' => $view]);
        }

        return view('front.products')->with('our_products_page', $our_products_page)->with('products', $products);
    }

    public function productDetails($id)
    {
        $shareComponent = \Share::page(
            URL('product/details/' . $id),
            'hala share',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        if($id != 0){
            $product = Product::find($id);
            return view('front.product-details')->with('product', $product)->with('shareComponent', $shareComponent);
        }
        $product = null;
        return view('front.product-details')->with('product', $product)->with('shareComponent', $shareComponent);

        

        
    }

    public function contactUsIndex()
    {
        return view('front.contact');
    }

    public function contactUsStore(Request $request)
    {

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'message'       => 'required',
        ]);

        $contact_us = ContactUs::create($request->all());
        return response()->json(['success' => 'Successfully']);
    }
}
