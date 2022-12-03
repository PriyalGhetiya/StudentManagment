@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             @include('flash_messages')
            <div class="card">
                <a href="{{ route('student.create') }}" class="btn btn-primary">Add Studnet</a>
                <a href="{{ route('export_excel') }}" class="btn btn-primary">Export Excel</a>
                <div class="card-body">
                    <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Enrollment</th>
                        <th scope="col">Name</th>
                        <th scope="col">Standard</th>
                        <th scope="col">Add Mark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($student))

                    @foreach ($student as $item)
                        <tr>
                            <th scope="row">{{ $item->enrollment_no  }}</th>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->standard }}</td>
                            <td>
                                <a href="#addmark{{ $item->id }}" data-toggle="modal" class="btn btn-basic">Add Mark<a>
                                <div class="modal fade modal-dialog-top " id="addmark{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content-wrap">
                                            <div class="modal-content">
                                                <div class="container">
                                                    <form action=" {{ route('student.add_mark',$item->id) }}" method="POST" enctype="multipart/form-data" id="addmarkform">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="english">English:</label>
                                                            <input type="number"max="100" class="form-control" id="english"  name="english">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gujrati">Gujrati:</label>
                                                            <input type="number" max="100" class="form-control" id="gujarati"  name="gujarati">
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="science">Science:</label>
                                                            <input type="number" max="100" class="form-control" id="science"  name="science">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="maths">Maths:</label>
                                                            <input type="number" max="100" class="form-control" id="maths"  name="maths">
                                                        </div>
                                                        <button type="submit" class="btn btn-danger text-white btn-xs">Add</button>
                                                        <button  data-dismiss="modal" class="btn btn-default btn-xs" type="button">Cancel</button>
                                                    </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('student.destroy',$item->id) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('student.edit',$item->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('pdf',$item->id) }}" class="btn btn-success">PDF</a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

