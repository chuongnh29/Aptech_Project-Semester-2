<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use App\ProductType;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $loai_sp_nam = ProductType::where('type', 0)->get();
        $new_product = Products::where('new', 1)->paginate(8);
        $sale_product = Products::where('promotion_price', '<>', 0)->get();
        $featured_product = Products::where('new', 1)->paginate(4);
        return view('pages.home', compact('slide', 'loai_sp_nam', 'new_product', 'sale_product', 'featured_product'));
    }

    public function getProduct()
    {
        $sp_theoloai = Products::all();
        $loai_sp = ProductType::all();
        $sp_nam = ProductType::where('type', 0)->get();
        $sp_nu = ProductType::where('type', 1)->get();
        return view('pages.product_type', compact('sp_theoloai', 'loai_sp', 'sp_nam', 'sp_nu'));
    }

    public function getProductType($type)
    {
        $sp_theoloai = Products::where('type_id', $type)->get();
        $loai_sp = ProductType::all();
        $sp_nam = ProductType::where('type', 0)->get();
        $sp_nu = ProductType::where('type', 1)->get();
        return view('pages.product_type', compact('sp_theoloai', 'loai_sp', 'sp_nam', 'sp_nu'));
    }

    public function getMenWatch()
    {
        $sp_nam = Products::where('type_gender', 0)->get();
        $loai_sp_nam = ProductType::where('type', 0)->get();
        return view('pages.men_watch', compact('sp_nam', 'loai_sp_nam'));
    }

    public function getMenWatchType($type)
    {
        $sp_nam = Products::where('type_gender', 0)->get();
        $loai_sp_nam = ProductType::where('type', 0)->get();
        return view('pages.men_watch', compact('sp_nam', 'loai_sp_nam'));
    }

    public function getWomenWatch()
    {
        $sp_nu = Products::where('type_gender', 1)->get();
        $loai_sp_nu = ProductType::where('type', 1)->get();
        return view('pages.women_watch', compact('sp_nu', 'loai_sp_nu'));
    }

    public function getProductDetail(Request $req)
    {
        $sanpham = Products::where('id', $req->id)->first();
        $sp_tuongtu = Products::where('type_id', $sanpham->type_id)->paginate(4);
        return view('pages.product_detail', compact('sanpham', 'sp_tuongtu'));
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function getLogin()
    {
        return view('pages.login');
    }

    public function postLogin(Request $req)
    {
        $this->validate($req,
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Vui lòng nhập tên tài khoản',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ]
        );
        $credentials = array('username' => $req->username, 'password' => $req->password);
//        $credentials = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Sai tên đăng nhập hoặc mật khẩu.']);
        }
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getRegister()
    {
        return view('pages.register');
    }

    public function postRegister(Request $req)
    {

        $this->validate($req,
            [
                'username' => 'required|min:5|max:20|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'fullname' => 'required',
//                'phone_number' => 'required|number',
                'password' => 'required|min:5|max:20',
                're_password' => 'required|same:password'
            ],
            [
                'username.required' => 'Vui lòng điền tên đăng nhập bạn muốn sử dụng',
                'username.min' => 'Tên đăng nhập có ít nhất 6 ký tự',
                'username.unique' => 'Tên đăng nhập đã có người sử dụng',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'fullname.required' => 'Vui lòng nhập họ tên',
                'phone_number.required' => 'Vui lòng nhập số điện thoại',
//                'phone_number.number' => 'Số điện thoại chỉ chứa kiểu số',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu bạn nhập không khớp',
                'password.min' => 'Mật khẩu tối thiểu là 6 ký tự'
            ]);
        $user = new User();
        $user->username = $req->username;
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone_number = $req->phone_number;
        $user->save();
        return redirect('login')->with('Register Success', 'Bạn đã tạo tài khoản thành công, vui lòng đăng nhập để tiếp tục.');

    }

    public function getAddToCart(Request $req, $id)
    {
        $product = Products::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getEmptyCart()
    {
        return view('pages.empty_cart');
    }

    public function getCart()
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('pages.shopping_cart', ['product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
        }
    }

    public function getCheckOut()
    {
        return view('pages.shopping_cart');
    }

    public function getSearch(Request $req)
    {
        $product = Products::where('name', 'like', '%' . $req->key_word . '%')->get();
        $loai_sp = ProductType::where('type', 0)->get();
        return view('pages.search', compact('product', 'loai_sp'));
    }
}