<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

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

        $our_products_page = $pages[1];
        $products = Product::orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        $partners = Partner::all();

        $portfolios = Portfolio::all();

        return view('front.index')->with('slider1', $slider1)->with('slider2', $slider2)->with('slider3', $slider3)->with('our_products_page', $our_products_page)->with('products',$products)->with('about_us', $about_us)->with('partners', $partners)->with('portfolios', $portfolios);
    }

    public function aboutus()
    {
        $about_us = Page::find(1);
        return view('front.aboutus')->with('about_us', $about_us);
    }

    public function ourProducts(){
        $our_products_page = Page::find(2);
        $products = Product::all();
        return view('front.products')->with('our_products_page', $our_products_page)->with('products',$products);
    }

    public function productDetails($id){
        $product = Product::find($id);

        $shareComponent = \Share::page(
            URL('product/details/' . $id) ,
            'hala share',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
        return view('front.product-details')->with('product', $product)->with('shareComponent', $shareComponent);
    }

    public function contactUsIndex(){
        return view('front.contact');
    }

    public function contactUsStore(Request $request){

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'message'       => 'required',
        ]);

            $contact_us = ContactUs::create($request->all());
            return response()->json(['success'=>'Successfully']);        
    }


    public function post(Request $request)
    {
        $posts = Product::paginate(8);

        dd($request->ajax());
        if ($request->ajax()) {
            $html = '';

            foreach ($posts as $post) {
                $html.='<div class="mt-5"><h1>'.$post->title.'</h1><p>'.$post->body.'</p></div>';
            }

            return $html;
        }

        $our_products_page = Page::find(2);
        $products = Product::all();

        return view('front.products')->with('our_products_page', $our_products_page)->with('products',$products);
    }

    function index_load_more(){
        $our_products_page = Page::find(2);
        return view('front.products')->with('our_products_page', $our_products_page);
    }

    function load_data(Request $request)
    {
        dd('h');
     if($request->ajax())
     {
        dd('hala');
      if($request->id > 0)
      {
       $data = DB::table('products')
          ->where('id', '<', $request->id)
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      else
      {
       $data = DB::table('products')
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)
       {
        $output .= '

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="item">
                    <div class="dealsOffer">
                        <div class="dealsimg">
                            <img src=".$row->image->getUrl()." alt="">
                            <div class="labelSale">'.$row->discount_percentage.'%</div>
                            <div class="img-overlay">
                                <a href="#" style="additive-symbols: ">
                                    <button class="myBtn_multi">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    </a>
                            </div>
                        </div>
                        <div class="dealProductInfo">

                            <h4>'.$row->title.'</h4>
                            <div class="price-box">
                                <span class="newPrice">$'.$row->discounted_price.'</span>
                                <span class="oldPrice">$'.$row->price.'</span>
                            </div>


                            <div class="watsapp-order">
                            <a href="{{$product->link}}">
                                اطلبها من خلال واتس آب
                                <i class="fab fa-whatsapp"></i>
                            </a>                                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
        $last_id = $row->id;
       }
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       ';
      }
      else
      {
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
    }




    


}
