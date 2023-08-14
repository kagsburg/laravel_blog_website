<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Room;
use App\Models\Category;
use App\Models\Service;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Order;
use App\Models\Testimony;
use App\Models\Homevideo;
use App\User;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App;
class FrontendController extends Controller
{
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
   
    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }

    public function home(){
        // $featured=Room::where('status','active')->where('is_featured',1)->orderBy('price','DESC')->limit(2)->get();
        $posts=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $banners=Banner::where('status','active')->limit(4)->orderBy('id','DESC')->get();
        $rooms=Room::where('status','active')->orderBy('id','DESC')->limit(6)->get();
        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
        $services=Service::where('status','active')->orderBy('title','ASC')->get();
        $testimonials=Testimony::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        $homvids=Homevideo::where('status','active')->orderBy('link','ASC')->get();
        return view('frontend.index')
                // ->with('featured',$featured)
                ->with('posts',$posts)
                ->with('banners',$banners)
                ->with('room_lists',$rooms)
                ->with('testimonials',$testimonials)
                ->with('category_lists',$category)
                ->with('services',$services)
                ->with('homvids',$homvids);
                
    }   

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function service(){
        $services=Service::query();
        return view('frontend.pages.service')
            ->with('services',$services);
    }

    public function checkout(){
        $rooms=Room::get();
        return view('frontend.pages.index')
            ->with('rooms',$rooms);
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function roomDetail($slug){
        $room_detail= Room::getRoomBySlug($slug);
        // dd($room_detail);
        $rel_room=Room::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.room_detail')
            ->with('related_rooms',$rel_room)
            ->with('room_detail',$room_detail);
    }

    public function roomlang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    public function downloadPDF(){
        $filePath = public_path('./pdf/CHATO_BEACH_MENU.pdf');
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return Response::download($filePath, 'Chato_beach_menu.pdf', $headers);
    }
    public function roomGrids(){
        $rooms=Room::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $rooms->whereIn('cat_id',$cat_ids);
            // return $products;
        }
        // if(!empty($_GET['brand'])){
        //     $slugs=explode(',',$_GET['brand']);
        //     $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
        //     return $brand_ids;
        //     $products->whereIn('brand_id',$brand_ids);
        // }
        // if(!empty($_GET['color'])){
        //     $slugs=explode(',',$_GET['color']);
        //     $color_ids=Color::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
        //     return $color_ids;
        //     $products->whereIn('color_id',$color_ids);
        // }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $rooms=$rooms->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $rooms=$rooms->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $rooms->whereBetween('price',$price);
        }

        $recent_rooms=Room::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $rooms=$rooms->where('status','active')->paginate($_GET['show']);
        }
        else{
            $rooms=$rooms->where('status','active')->paginate(9);
        }
        // Sort by name , price, category

      
        return view('frontend.pages.room-grids')->with('rooms',$rooms)->with('recent_rooms',$recent_rooms);
    }
    public function roomLists(){
        $rooms=Room::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $rooms->whereIn('cat_id',$cat_ids)->paginate;
            // return $rooms;
        }
        // if(!empty($_GET['brand'])){
        //     $slugs=explode(',',$_GET['brand']);
        //     $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
        //     return $brand_ids;
        //     $products->whereIn('brand_id',$brand_ids);
        // }
        // if(!empty($_GET['color'])){
        //     $slugs=explode(',',$_GET['color']);
        //     $color_ids=Color::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
        //     return $color_ids;
        //     $products->whereIn('color_id',$color_ids);
        // }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $rooms=$rooms->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $rooms=$rooms->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $rooms->whereBetween('price',$price);
        }

        $recent_rooms=Room::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $rooms=$rooms->where('status','active')->paginate($_GET['show']);
        }
        else{
            $rooms=$rooms->where('status','active')->paginate(6);
        }
        // Sort by name , price, category

      
        return view('frontend.pages.room-lists')->with('rooms',$rooms)->with('recent_rooms',$recent_rooms);
    }
    public function roomFilter(Request $request){
            $data= $request->all();
            // return $data;
            $showURL="";
            if(!empty($data['show'])){
                $showURL .='&show='.$data['show'];
            }

            $sortByURL='';
            if(!empty($data['sortBy'])){
                $sortByURL .='&sortBy='.$data['sortBy'];
            }

            $catURL="";
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }

            // $brandURL="";
            // if(!empty($data['brand'])){
            //     foreach($data['brand'] as $brand){
            //         if(empty($brandURL)){
            //             $brandURL .='&brand='.$brand;
            //         }
            //         else{
            //             $brandURL .=','.$brand;
            //         }
            //     }
            // }
            // return $brandURL;

            // $colorURL="";
            // if(!empty($data['color'])){
            //     foreach($data['color'] as $color){
            //         if(empty($colorURL)){
            //             $colorURL .='&color='.$color;
            //         }
            //         else{
            //             $colorURL .=','.$color;
            //         }
            //     }
            // }

            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('e-shop.loc/room-grids')){
                return redirect()->route('room-grids',$catURL.$priceRangeURL.$showURL.$sortByURL);
            }
            else{
                return redirect()->route('room-lists',$catURL.$priceRangeURL.$showURL.$sortByURL);
            }
    }
    public function roomSearch(Request $request){
        $recent_rooms=Room::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $rooms=Room::orwhere('title','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');
        return view('frontend.pages.room-grids')->with('rooms',$rooms)->with('recent_rooms',$recent_rooms);
    }

    public function roomCat(Request $request){
        $rooms=Category::getRoomByCat($request->slug);
        // return $request->slug;
        $recent_rooms=Room::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/room-grids')){
            return view('frontend.pages.room-grids')->with('rooms',$rooms->rooms)->with('recent_rooms',$recent_rooms);
        }
        else{
            return view('frontend.pages.room-lists')->with('rooms',$rooms->rooms)->with('recent_rooms',$recent_rooms);
        }

    }
    public function roomSubCat(Request $request){
        $rooms=Category::getRoomBySubCat($request->sub_slug);
        // return $rooms;
        $recent_rooms=Room::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/room-grids')){
            return view('frontend.pages.room-grids')->with('rooms',$rooms->sub_rooms)->with('recent_rooms',$recent_rooms);
        }
        else{
            return view('frontend.pages.room-lists')->with('rooms',$rooms->sub_rooms)->with('recent_rooms',$recent_rooms);
        }

    }

    public function blog(){
        $post=Post::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
            // return $post;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id',$tag_ids);
            // return $post;
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogDetail($slug){
        $post=Post::getPostBySlug($slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $post;
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post);
    }

    public function bloglang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function blogSearch(Request $request){
        // return $request->all();
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $posts=Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
            ->paginate(8);
        return view('frontend.pages.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
    }

    public function blogFilter(Request $request){
        $data=$request->all();
        // return $data;
        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $tagURL="";
        if(!empty($data['tag'])){
            foreach($data['tag'] as $tag){
                if(empty($tagURL)){
                    $tagURL .='&tag='.$tag;
                }
                else{
                    $tagURL .=','.$tag;
                }
            }
        }
        // return $tagURL;
            // return $catURL;
        return redirect()->route('blog',$catURL.$tagURL);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post->post)->with('recent_posts',$rcnt_post);
    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    // Login
    public function login(){
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register(){
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        // dd($data);
        $check=$this->create($data);
        Session::put('user',$data['email']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }

    public function subscribe(Request $request){
        if(! Newsletter::isSubscribed($request->email)){
                Newsletter::subscribePending($request->email);
                if(Newsletter::lastActionSucceeded()){
                    request()->session()->flash('success','Subscribed! Please check your email');
                    return redirect()->route('home');
                }
                else{
                    Newsletter::getLastError();
                    return back()->with('error','Something went wrong! please try again');
                }
            }
            else{
                request()->session()->flash('error','Already Subscribed');
                return back();
            }
    }

    public function show() {
        $feed = \Dymantic\InstagramFeed\InstagramFeed::for('my profile');
    
        return view('instagram-feed', ['instagram_feed' => $feed]);
    }
    
}
