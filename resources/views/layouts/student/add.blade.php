@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @include('flash_messages')

                <div class="card-body">
                    <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('layouts.student.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
