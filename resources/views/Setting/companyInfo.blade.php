@extends('CRM.layouts.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
            @if(Session::has('Success_message'))
                    <div class="alert alert-success alert-dismissible fade show fs-2" id="errorMessage" role="alert">
                        <strong>Success:</strong>
                        {{ Session::get('Success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card bg-white">
                    <h4 class="card-header">All Company Information </h4>
                    <div class="card-body bg-white">
                        <div class="bg-white">
                            <form action="{{ route('CompanyInfoSearch') }}" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="text" class="form-control bg-white" name="query" value="Search"/>
                                    </label>
                                    <div class="col-md-6 ml-0">
                                        <span class="float-right col-md-6"><a href="{{route('add-company-info')}}" class="btn btn-success float-right">+Add</a></span>
                                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="bg-orange">
                                <tr class="text-light">
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Logo</th>
                                    <th>Fav Icon</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th colspan="2">Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Slogan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($companyInfo as $companyInfo)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$companyInfo->companyName}}</td>
                                        <td><img src="{{ asset($companyInfo->logo) }}" width= '50' height='50' class="img img-responsive" /></td>
                                        <td><img src="{{ asset($companyInfo->favicon) }}" width= '50' height='50' class="img img-responsive" /> </td>
                                        <td>{{$companyInfo->phone}}</td>
                                        <td>{{$companyInfo->email}}</td>
                                        <td colspan="2">{{$companyInfo->address}}</td>
                                        <td>{{$companyInfo->city}}</td>
                                        <td>{{$companyInfo->state}}</td>
                                        <td>{{$companyInfo->country}}</td>
                                        <td>{{$companyInfo->slogan}}</td>
                                        <td>
                                            <a href="{{route('editCompanyInfo',['id'=>$companyInfo->id])}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="deleteGroup({{$companyInfo->id}})">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('deleteCompanyInfo',['id'=> $companyInfo->id]) }}" method="POST" id="deleteCompanyInfo{{$companyInfo->id}}" >
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
