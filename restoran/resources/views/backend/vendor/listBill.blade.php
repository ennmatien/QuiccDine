@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bill Details</h1>

@if ($datas->isEmpty())
        <center><p>No data...</p></center>

        <form action="{{ route('vendor.addBill', $t_id) }}" method="GET">
        <center><button class="btn btn-primary" type="submit" style="margin-left: auto; margin-right: auto;">Add Items</button></center>
        </form>
    @else
    <center><h4> Bill Details </h4></center>
        <form action="{{ route('vendor.addBill', $t_id) }}" method="GET">
            <button class="btn btn-primary" type="submit" style="margin-left: auto; margin-right: auto;">Add Items</button>
        </form>
    <table class="table table-bordered mt-3" >
        
                    <thead>
                        <tr>
                        <th>NO</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @php
                        $x=1;
                    @endphp
                    @foreach($datas as $key=>$value)
                    <tr>
                        <td> {{ $x }}</td>
                        <td> {{ $value->item }} </td>
                        <td> Rp. {{ $value->price }}  </td>
                        <td> 
                            <form action="{{ route('vendor.deleteBill', $value->id) }}" method="POST">
                                @csrf
                                <Input type="hidden" name="_method" value="DELETE">
                    
                                <button type="submit" class="btn btn-danger" >Delete</button> 
                                
                            </form>
                        </td>
                        @php
                        $x++;
                        @endphp
                    </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                            <td colspan="2" style="text-align:right"> <strong>Total Price </strong>
                            </td>
                            <td> <strong> Rp. {{ $sum }} </strong> </td>
                        </tr>
                    </tfoot>
                    </tbody>
    </table>
    <form action="{{ route('vendor.sendBill', $t_id) }}" method="POST">
        @csrf
        <Input type="hidden" name="status" value="Bills Sent">
        <center><button class="btn btn-success" type="submit" style="margin-left: auto; margin-right: auto;">Send Bill</button></center>
        </form>
    @endif

    



@endsection
