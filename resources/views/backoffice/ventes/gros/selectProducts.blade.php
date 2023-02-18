@extends('layouts.adminTemplate')

@section('content')
    <div class="">

       {{-- @livewire('select-products', ['products' => $products,'bonVente'=>$bonVente], key($product->id)) --}}
       @livewire('select-products',['bonVente'=>$bonVente])
    </div>
@endsection
