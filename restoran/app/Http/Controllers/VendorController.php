<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        return view('backend.vendor.index',compact('vendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function transaction()
    {
        $pending = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->select('users.name','transactions.*')
                        ->where('transactions.status','=','Request Pending')
                        ->get();
        $ongoing = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->select('users.name','transactions.*')
                        ->where('transactions.status','=','Request Accepted')
                        ->get();
        $payment = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->select('users.name','transactions.*')
                        ->where('transactions.status','=','Bills Sent')
                        ->get();
        $completed = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->select('users.name','transactions.*')
                        ->where('transactions.status','=','Paid')
                        ->get();
        $rejected = DB::table('transactions')
                        ->join('users','users.id','transactions.user_id')
                        ->select('users.name','transactions.*')
                        ->where('transactions.status','=','Request Rejected')
                        ->get();
        return view('backend.vendor.transaction',compact('pending','ongoing','payment','completed','rejected'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_file="noimg";
        if ($request->file('images')){
            $file = $request->file('images');
            $nama_file= time().str_replace(" ","",$file->getClientOriginalName());
            $file->move('images', $nama_file);
        }

        $vendor = Vendor::updateOrCreate(
            ['user_id' => $request->user_id],
            [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'operational_hour' => $request->operational_hour,
                'nama_rekening' => $request->nama_rekening,
                'rekening' => $request->rekening,
                'descr'=> $request->descr,
                'image'=> $nama_file
            ]);

            
            

        Alert::success('Berhasil', 'Berhasil');

        return redirect('/home');

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
                        ->select('users.name','transactions.*','vendors.name as name_vendor')
                        ->where('transactions.id','=',$id)
                        ->first();

        return view('backend.vendor.detail',compact('transaction'));
    }

    public function bill($id)
    {
        $datas = DB::table('bills')
                        ->where('transaction_id','=',$id)
                        ->get();

        $sum = DB::table('bills')
                        ->where('transaction_id','=',$id)
                        ->sum('price');
        $transaction_id = $id;
        return view('backend.vendor.listBill',compact('datas'))->with('t_id',$transaction_id)->with('sum',$sum);
    }

    public function createBill($id)
    {

        $transaction_id = $id;
        return view('backend.vendor.addBill')->with('t_id',$transaction_id);
    }

    public function storeBill(Request $request, $id)
    {

        $transaction_id = $id;

        $bill = Bill::Create(
            ['transaction_id' => $transaction_id,
                'item' => $request->item,
                'price' => $request->price
            ]);
        $sum = DB::table('bills')
            ->where('transaction_id','=',$id)
            ->sum('price');

        Alert::success('Berhasil', 'Berhasil');


        $datas = DB::table('bills')
                        ->where('transaction_id','=',$id)
                        ->get();
        return view('backend.vendor.listBill',compact('datas'))->with('t_id',$transaction_id)->with('sum',$sum);
    }

    public function sendBill(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->update([
            'status' => $request->status
        ]);

        return $this->transaction();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


    
    public function deleteBill($id)
    {
        $model= Bill::find($id);
        $model->delete();

        Alert::success('Berhasil', 'Berhasil');
        return redirect()->back();
    }
    
}
