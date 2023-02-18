@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
        <div class="card card-success">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class="">Categories</h4>
                <a href=" {{route('category.create')}} " class="d-none d-sm-inline-block btn btn-outline-success shadow-sm"><i class="fas fa-plus mr-2"></i>Nouvelle Category</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="Table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Total Achat</th>
                            <th>Total Gros</th>
                            <th>Total Détails</th>
                            <th>Total Facilite</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> <a href=" {{route('category.products',$category->id)}} "> {{$category->name}} </a></td>
                                <td> {{ number_format($category->get_mony_achat_total()['total_achat'],2,'.',' ')}} </td>
                                <td> {{ number_format($category->get_mony_achat_total()['total_gros'],2,'.',' ')}} </td>
                                <td> {{ number_format($category->get_mony_achat_total()['total_details'],2,'.',' ')}} </td>
                                <td> {{ number_format($category->get_mony_achat_total()['total_facilite'],2,'.',' ')}} </td>
                                <td>
                                    <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                            <option selected disabled>Action</option>
                                            <option value=" {{url('/backoffice/category/'.$category->id.'/edit')}} ">Modifier</option>
                                            <option value="{{url('/backoffice/category/'.$category->id.'/supprime')}}">Supprime</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
