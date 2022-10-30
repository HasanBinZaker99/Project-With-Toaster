@extends('CRM.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="py-5">
            <div class="container">

                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">

                            <div class="card-header">Update Brand </div>
                            <div class="card-body">
                                <form action="/b-update/{{$brand->id}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Brand Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="brandName" value="{{$brand->brandName}}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Description</label>
                                        <div class="col-md-8">
                                            <input type="text" style="height:4rem;" class="form-control" name="note" value="{{$brand->note}}" />
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
