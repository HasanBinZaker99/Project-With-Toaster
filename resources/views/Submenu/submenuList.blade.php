@extends('CRM.layouts.app')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="content-wrapper bg-white">
    <div class="row">
        <div class="col-lg-12 bg-white mx-auto mt-5">
            <div class="card bg-white">
            <h4 class="card-header">All Sub Menu</h4>

                <div class="card-body bg-white">
                    <h4 class="text-success">{{Session::get('message')}}</h4>
                    <div class="bg-white">
                        <form action="" method="GET">
                            <div class="form-group row">
                                <label class="col-md-6">
                                    <input type="text" class="form-control bg-white" name="searchText" value="Search"/>
                                </label>
                                <div class="col-md-6 ml-0">
                                    <span class="float-right col-md-6"><a href="{{route('addSubMenuView')}}" class="btn btn-success float-right">+Add</a></span>
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
                                <th>Menu</th>
                                <th>Submenu Name</th>
                                <th>Code</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($submenu as $submenus)
                            @foreach ($menu as $menus)
                            @if($menus->id === $submenus->menuId)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$menus->menuName}}</td>
                                    <td>{{$submenus->subMenuName}}</td>
                                    <td>{{$submenus->code}}</td>

                                    <td>
                                        <a href="/submenu-edit/{{$submenus->id}}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a class="btn btn-danger btn-sm" id="delete" href="javascript:void(0)" data-url="{{route('submenuInfo', $submenus->id)}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form method="POST" action="">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger">Menu Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" class="form-group" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <input type="hidden" id="role-id" name="id">
        <span class="text-dark">Are you sure to delete this menu?</span>

      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-danger" id="yes" value="Yes">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>

        </form>
      </div>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $(document).ready(function () {

$('body').on('click', '#delete', function () {
  var userURL = $(this).data('url');
  $.get(userURL, function (data) {
      $('#deleteModal').modal('show');
      $('#role-id').val(data.id);

  })
});



});
</script>
@endsection
