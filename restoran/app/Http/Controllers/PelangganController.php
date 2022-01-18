<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{

    public function welcome()
    {
        $transaction = Vendor::all();
        return view('welcome',compact('transaction'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $user = User::find(Auth::user()->id);
        return view('backend.user.index',compact('profile','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id= null)
    {
        
        if ($id != null){
            $vendor= Vendor::find($id);
            $vendorCount = 1;
            return view('backend.user.create',compact('vendor'))->with('vendorCount', $vendorCount);
        }else {
            $vendor = Vendor::all();
            $x = 1;
            $vendorCount = $x += Vendor::all()->count();
            return view('backend.user.create',compact('vendor'))->with('vendorCount', $vendorCount);
        }
    }

    public function restaurant($id)
    {
            
            $reviews = DB::table('vendors')
                        ->join('reviews','vendors.id','reviews.vendor_id')
                        ->join('users','reviews.user_id','users.id')
                        ->select('reviews.*','vendors.*','users.name as name_user')
                        ->where('vendors.id','=',$id)
                        ->get();

            $vendor = Vendor::find($id);

            // return view('backend.user.test',compact('vendor','vendor2'));
            return view('backend.user.restaurant',compact('vendor', 'reviews'));

        
    }

    public function bill($id)
    {
        $datas = DB::table('bills')
                        ->where('transaction_id','=',$id)
                        ->get();
        $transaction_id = $id;
        $sum = DB::table('bills')
                        ->where('transaction_id','=',$id)
                        ->sum('price');
        $status = Transaction::where('id', $id)->pluck('status');
        return view('backend.user.listBill',compact('datas'))->with('t_id',$transaction_id)->with('sum',$sum)->with('status',$status);
    }

    public function booking()
    {
        $transaction = Vendor::all();
        $review = DB::table('vendors')
                        ->join('reviews','vendors.id','reviews.vendor_id')
                        ->select('reviews.review','vendors.id')
                        ->get();
        return view('backend.user.booking',compact('transaction','review'));
    }

    public function transaction()
    {
        $transaction = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->join('vendors','vendors.id','transactions.vendor_id')
                        ->select('users.name','vendors.name as name_vendor','transactions.*')
                        ->where('users.id','=',Auth::user()->id)
                        ->get();
        $completed = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->select('users.name','transactions.*')
                        ->join('vendors','vendors.id','transactions.vendor_id')
                        ->select('users.name','vendors.name as name_vendor','transactions.*')
                        ->where('users.id','=',Auth::user()->id)
                        ->where('transactions.status','=','Paid')
                        ->get();
        
        return view('backend.user.transaction',compact('transaction','completed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Profile = Profile::updateOrCreate(
            ['user_id' => $request->user_id],
            [
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        $user= User::updateOrCreate(
            ['id' => $request->user_id],
            [
                'name' => $request->name,
            ]);

        Alert::success('Berhasil', 'Berhasil');

        return redirect('/home');
    }

    public function pesan(Request $request)
    {
        $transaction = Transaction::create(
            [
                'vendor_id' => $request->vendor_id,
                'user_id' => $request->user_id,
                'date' => $request->hari,
                'jam' => $request->jam,
                'description' => $request->deskripsi,
            ]);

        Alert::success('Berhasil', 'Berhasil Booking');

        return redirect('/pelanggan/transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->join('vendors','vendors.id','transactions.vendor_id')
                        ->select('users.name','transactions.*','vendors.name as name_vendor','vendors.rekening','vendors.nama_rekening')
                        ->where('transactions.id','=',$id)
                        ->first();

        return view('backend.user.detail',compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function payment($id)
    {
    
        Transaction::where('id', $id)->update(['status' => 'Paid']);
        Alert::success('Berhasil', 'Berhasil Membayar Tagihan');

        return $this->transaction();
    }




    public function review($id)
    {
        // $transaction = DB::table('transactions')
        //                 ->join('users','users.id','transactions.user_id')
        //                 ->join('vendors','vendors.id','transactions.vendor_id')
        //                 ->select('users.name','transactions.*','vendors.name as name_vendor','vendors.rekening')
        //                 ->where('transactions.id','=',$id)
        //                 ->first();

        // $review = Reviews::where('transaction_id',$id)->first();
        $vendor = Vendor::find($id);
        return view('backend.user.review',compact('vendor'));
    }

    public function reviews(Request $request)
    {
        $review = Review::create(
            [
                'vendor_id' => $request->vendor_id,
                'user_id' => $request->user_id,
                'review' => $request->review,
                'rating' => $request->rating,
            ]);

        Alert::success('Berhasil', 'Berhasil Memberikan Review');

        return $this->restaurant($request->vendor_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->update([
            'status' => $request->status
        ]);

        Alert('Berhasil','Berhasil Mengubah Status');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteT($id)
    {
        $model= Transaction::find($id);
        $model->delete();

        Alert::success('Berhasil', 'Berhasil');
        return redirect()->back();
    }
    public function destroy(Request $request, $id)
    {   

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user = User::find($id);
        $user->delete();

        
        

        Alert::success('Berhasil', 'Berhasil menghapus akun');
        return redirect('/');
    }
}
