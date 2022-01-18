@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Transaction</h1>

<!-- Pending -->
@if ($pending->isEmpty())
@else
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pending Requests</h6>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        
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
                    @foreach ($pending as $item)

                    <tr>
                        <td>{{ $no++ }} </td>
                        <td>{{ $item->name }} </td>
                        
                        <td>{{ $item->jam}} </td>
                        <td>{{ $item->date}} </td>
                        <td>{{ $item->description ? $item->description : '-' }} </td>
                        <td>{{ $item->status }}  </td>
                        <td> <center><form action="{{ route('vendor.update',$item->id) }} " method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                             <input type="hidden" name="status" value="Request Accepted"> 
                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                             <!-- need to change this to accepted -->
                             <button type="submit" class="btn btn-success">Accept</button>
                             </form> 
                                <br>
                            <form action="{{ route('vendor.update',$item->id) }} " method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                             <input type="hidden" name="status" value="Request Rejected"> 
                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                             <button type="submit" class="btn btn-danger">Reject</button>
                             </form></center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endif

@if ($ongoing->isEmpty())
@else
<!-- Ongoing -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ongoing</h6>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        
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
                    @foreach ($ongoing as $item)

                    <tr>
                        <td>{{ $no++ }} </td>
                        <td>{{ $item->name }} </td>
                        
                        <td>{{ $item->jam}} </td>
                        <td>{{ $item->date}} </td>
                        <td>{{ $item->description ? $item->description : '-' }} </td>
                        
                        <td>{{ $item->status }}  </td>
                        <td> <center><form action="{{ route('vendor.bill',$item->id) }} " method="GET">
                            @csrf
                             
                             <button type="submit" class="btn btn-primary">Bill</button>
                             </form> 
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endif


@if ($payment->isEmpty())
@else
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Payment Due</h6>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        
                        <th>Jam Booking</th>
                        <th>Tanggal Booking</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($payment as $item)

                    <tr>
                        <td>{{ $no++ }} </td>
                        <td>{{ $item->name }} </td>
                        
                        <td>{{ $item->jam}} </td>
                        <td>{{ $item->date}} </td>
                        <td>{{ $item->description ? $item->description : '-' }} </td>
                        <td>{{ $item->status }}  </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endif

@if ($completed->isEmpty())
@else
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaction Completed</h6>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        
                        <th>Jam Booking</th>
                        <th>Tanggal Booking</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                       
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
                        
                        <td>{{ $item->jam}} </td>
                        <td>{{ $item->date}} </td>
                        <td>{{ $item->description ? $item->description : '-' }} </td>
                        <td>{{ $item->status }}  </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endif

@if ($rejected->isEmpty())
@else
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rejected</h6>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        
                        <th>Jam Booking</th>
                        <th>Tanggal Booking</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($rejected as $item)

                    <tr>
                        <td>{{ $no++ }} </td>
                        <td>{{ $item->name }} </td>
                        
                        <td>{{ $item->jam}} </td>
                        <td>{{ $item->date}} </td>
                        <td>{{ $item->description ? $item->description : '-' }} </td>
                        <td>{{ $item->status }}  </td>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endif

@endsection
