@extends('layouts.layouts')

@section('content')

        @if(Session::has('notif'))
            <div class="alert bg-danger">
                <a class="close" data-dismiss="alert">&times;</a>
                <span> <b>{{Session::get('notif')}}  </b></span>
            </div>
        @endif

        <div class="row">
          <div class="col-md-12">

            <!-- Horizontal form -->
            <div class="card">
              <div class="card-header header-elements-inline">
                <h5 class="card-title">Home</h5>
                <div class="header-elements">
                  <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                  </div>
                </div>
              </div>

              <div class="card-body">
              Hello, {{ Auth::user()->name}}</p>
              </div>
            </div>
            <!-- /horizotal form -->

          </div>
        </div>
@endsection

                