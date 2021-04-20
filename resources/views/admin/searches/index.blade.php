@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Search Queries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
              <li class="breadcrumb-item active">Search Queries</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="d-flex justify-content-between aligh-items-center">
                <h3 class="card-title">Search Queries</h3>
                <div>  
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Searched Query</th>
                      <th>Searched On</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($searches->count())
                  @foreach($searches as $search)
                  <tr>
                      <td>{{ $search->id }}</td>
                      <td>{{ $search->search_query }}</td>
                      <td>{{ $search->created_at }}</td>
                      <td class="d-flex">
                      
                       <form action="{{ route('searches.destroy', ['id' => $search->id]) }}" class="mr-1" method="get">
                      @method("DELETE")
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                      
                      </form>
                      </td>
                    </tr>
                  @endforeach
                  @else
                  <tr>
                  <td colspan="6">
                  <h3 class="text-center">No Posts Found</h3>
                  </td>
                  </tr>
                  @endif
                    
                   
                  </tbody>
                </table>
              </div><!-- /.card-body -->
              <div class="card-footer text-center d-flex justify-content-center">
              {{ $searches->links('pagination::bootstrap-4') }}
              </div>
            </div>
            </div>
            </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
@endsection