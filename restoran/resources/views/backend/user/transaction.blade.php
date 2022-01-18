@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Transactions</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manange Bookings</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Restoran</th>
                        <th>Jam Booking</th>
                        <th>Tanggal Booking</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($transaction as $item)
                        @if ($item->status == 'Paid')

                        @else
                    <tr>
                        <td>{{ $no++ }} </td>
                        <td>{{ $item->name }} </td>
                        <td>{{ $item->name_vendor }} </td>
                        <td>{{ $item->jam }} </td>
                        <td>{{ $item->date }} </td>
                        <td>{{ $item->description ? $item->description : '-' }} </td>
                        <td>{{ $item->status }}  </td>
                        <td> 
                            
                            @if ($item->status == 'Bills Sent')
                            <a href="{{ route('pelanggan.bill',$item->id) }}" class="btn btn-primary">Pay Bills</a>
                            <a href="{{ route('pelanggan.show',$item->id) }} " class="btn btn-success">Details</a> </td>
                        
                            @elseif ($item->status == 'Request Rejected')
                            <form action="{{ route('pelanggan.deleteTransaction', $item->id) }}" method="POST">
                                @csrf
                                <Input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" >Delete</button> 
                                
                            </form>
                            @else
                            <a href="{{ route('pelanggan.show',$item->id) }} " class="btn btn-success">Details</a> </td>
                            @endif
                    </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if ($completed->isEmpty())

@else
<div class="card shadow mb-4">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Completed Transactions</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Restoran</th>
                        <th>Jam Booking</th>
                        <th>Tanggal Booking</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($completed as $item)

                    <tr>
                        <td>{{ $no++ }} </td>
                        <td>{{ $item->name }} </td>
                        <td>{{ $item->name_vendor }} </td>
                        <td>{{ $item->jam }} </td>
                        <td>{{ $item->date }} </td>
                        <td>{{ $item->description ? $item->description : '-' }} </td>
                        <td>{{ $item->status }}  </td>
                        <td>
                            <a href="{{ route('pelanggan.show',$item->id) }} " class="btn btn-success">Details</a> 
                            <a href="{{ route('pelanggan.bill',$item->id) }}" class="btn btn-primary">Bill Details</a> </td>
                            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@endsection
