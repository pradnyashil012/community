@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Question List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
              <li class="breadcrumb-item active">Question List</li>
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
                <h3 class="card-title">Question List</h3>
                <div>  
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Question</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($questions->count())
                  @foreach($questions as $question)
                  <tr>
                      <td>{{ $question->id }}</td>
                      <td>{{ $question->name }}</td>
                      <td>{{ $question->email }}</td>
                      <td>{{ $question->subject }}</td>
                      <td>{{ $question->question }}</td>
                      <td class="d-flex">
                      <a href="{{ route('ask.show', ['id' => $question->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-eye"></i></a>
                     
                       <form action="{{ route('ask.destroy', ['id' => $question->id]) }}" class="mr-1" method="post">
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
                  <h3 class="text-center">No Questions Found</h3>
                  </td>
                  </tr>
                  @endif
                    
                   
                  </tbody>
                </table>
              </div><!-- /.card-body -->
              <div class="card-footer text-center d-flex justify-content-center">
              {{ $questions->links('pagination::bootstrap-4') }}
              </div>
            </div>
            </div>
            </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
@endsection