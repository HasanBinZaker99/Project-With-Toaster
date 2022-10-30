@extends('CRM.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="py-5">
            <div class="container">

                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                        <div class="card">
                            <div class="card-header">Update Model </div>
                            <div class="card-body">

                                <form action="/m-update/{{$user->id}}" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Brand Name</label>
                                        <div class="col-md-8 input-group">
{{--                                            <span class="input-group-text bg-white"><i class="fa-solid " style="color:#4666ff"></i> </span>--}}
                                            <select id="state" class="form-control select2 bg-white" name="brandId" >
                                                <option value="{{$user->brandId}}" selected>select Brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Model Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="modelName" value="{{$user->modelName}}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Description</label>
                                        <div class="col-md-8">
                                            <input type="text" style="height:4rem;" class="form-control" name="note"  value="{{$user->note}}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label"></label>
                                        <div class="col-md-8">
                                            <input type="submit" class="btn btn-success" value="Add" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
