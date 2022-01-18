@extends('template.appPay')

@section('head')
    <style>
                @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif
        }

        /* body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #0C4160;
            padding: 30px 10px
        } */

        .card {
            max-width: 500px;
            margin: auto;
            color: black;
            border-radius: 20 px
        }

        p {
            margin: 0px
        }

        .container .h8 {
            font-size: 30px;
            font-weight: 800;
            text-align: center
        }

        .btn.btn-pay {
            width: 100%;
            height: 70px;
            display: flex;
            color:black;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
            border: none;
            transition: 0.5s;
            background-size: 200% auto
        }

        .btn.btn.btn-pay:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none
        }

        .btn.btn-pay:hover .fas.fa-arrow-right {
            transform: translate(10px);
            transition: transform 0.2s ease-in;
            
        }

        .form-control {
            color: white;
            background-color: #223C60;
            border: 2px solid transparent;
            height: 60px;
            padding-left: 20px;
            vertical-align: middle
        }

        .form-control:focus {
            color: white;
            background-color: #0C4160;
            border: 2px solid #2d4dda;
            box-shadow: none
        }

        .text {
            font-size: 14px;
            font-weight: 600
        }

        ::placeholder {
            font-size: 14px;
            font-weight: 600
        }
    </style>

@endsection

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bill Details</h1>

    <center><h4> Bill Details </h4></center>
    <table class="table table-bordered mt-3" >
        
                    <thead>
                        <tr>
                        <th>NO</th>
                        <th>Item</th>
                        <th>Price</th>
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
    <!-- <form action="" method="GET"> 
        @csrf
        <Input type="hidden" name="status" value="Bills Sent"> 
        <center><button class="btn btn-success" type="submit" style="margin-left: auto; margin-right: auto;">Send Payment</button></center>
        </form> -->
            <!-- Button trigger modal -->
        @if ($status == '["Paid"]')

        @else
            <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Send Payment
            </button> </center>

        @endif
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                

            
                    <div class="row gx-3">
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Person Name</p> <input class="form-control mb-3" type="text" placeholder="Name" >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Card Number</p> <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Expiry</p> <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">CVV/CVC</p> <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                            </div>
                        </div>
                        <div class="col-12">
                            <form action="{{ route('pelanggan.payment', $t_id) }}" method="GET">
                            <button class="btn btn-pay mb-3"> <span class="ps-3"> <strong>Pay Rp.{{ $sum }}</strong></span> <span class="fas fa-arrow-right"></span> </button>
                            </form>
                        </div>
                    </div>
                




            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
        </div>

@endsection
