@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%;">

    <div class="container rounded p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction Data
        </h2>
    </div>

    <div class="container rounded bg-white p-3" >

                     @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong> 
                            <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
        
                <div class="card-header">Transactions</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">num</th>
                            <th scope="col">transaction_id</th>
                            <th scope="col">status</th>
                            <th scope="col">job_id</th>
                            <th scope="col">ammount</th>
                            <th scope="col">due date</th>
                            <th scope="col">payment_date</th>
                            <th scope="col">bank_account</th>
                            <th scope="col">virtual_account</th>
                            <th scope="col">created_at</th>
                            <th scope="col">updated_at</th>
                            <th scope="col">actions</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                        <th scope="row">{{$transactions->firstItem()+$loop->index}}</th>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->transaction_status }}</td>
                        <td>{{ $transaction->job_id }}</td>
                        <td>{{ $transaction->transaction_ammount }}</td>
                        <td>{{ $transaction->transaction_due }}</td>
                        <td>
                            @if($transaction->payment_date==NULL)
                            <span class="text-danger">unpaid</span>
                            @else
                            {{ $transaction->payment_date }}
                            @endif
                        </td>
                        <td>{{ $transaction->bank_account }}</td>
                        <td>{{ $transaction->virtual_account }}</td>
                        <td>
                            @if($transaction->created_at==NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                            {{ $transaction->created_at }}
                            @endif
                        </td>
                        <td>
                            @if($transaction->updated_at==NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                            {{ $transaction->updated_at }}
                            @endif
                        </td>
                        <td>
                        @if($transaction->transaction_status=="pending")
                            <form action="{{ url('/admin/transactions/verify/'.$transaction->transaction_id) }}" method="POST">
                            @csrf
                            <input type="text" name="transaction_status" class="form-control invisible" style="height:1px; width:1px;" value="paid">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Verify Payment ?')">Verify Payment</button>
                            </form>
                        @else
                            <a href="#" class="btn btn-success disabled" >Payment Verified</a>
                        @endif
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$transactions->links()}}
            
    </div>
</div>



@endsection