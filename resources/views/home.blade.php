@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- You are logged in!. Your account is: {{auth()->user()->verified() ? 'Verified' : 'Not Verified'}} --}}
            @if(!auth()->user()->verified())

                You are logged in!. Your account is: {{'Not Verified'}} please checking your email
            @endif
                
        </div>
    </div>
</div>
@endsection

