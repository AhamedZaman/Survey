@extends('layouts.admin')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-inbox bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Question</h5>
                </div>
            </div>
            <div class="page-header-breadcrumb" >
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Data Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Sources Initialization</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <a href="{{ route('question.create') }}"><button class="btn btn-success btn-round waves-effect waves-light"><i class="ti-pencil-alt"></i> Create Question</button></a>
            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content">

    <div class="main-body">
        <div class="page-wrapper">

            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="card">
                            <div class="card-header">
                                <h5>HTML (DOM) Sourced Data</h5>
                                <span>The foundation for DataTables is progressive enhancement,
                                    so it is very adept at reading table information directly
                                    from the DOM. This example shows how easy it is to add
                                    searching, ordering and paging to your HTML table by simply
                                    running DataTables on it.</span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="dom-table"
                                        class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Is Optional</th>
                                                <th>Status</th>
                                                <th>Priority</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($questions as $question)
                                            <tr>
                                                <td>{{ $question->question }}</td>
                                                <td>{{ $question->is_optional == 1? "Yes":"No"}}</td>
                                                <td>{{ $question->status == 1? "Active":"Inactive"}}</td>
                                                <td>{{ $question->priority }}</td>
                                                <td>{{ $question->categories->name }}</td>
                                                <td>
                                                    <a href="{{ route('question.edit', $question->id) }}"><button class="btn waves-effect waves-light btn-success btn-icon"><i class="ti-pencil"></i></button></a>
                                                    <a><button class="btn waves-effect waves-light btn-danger btn-icon"><i class="ti-trash"></i></button></a>
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

        </div>
    </div>

@endsection


@section('script')

@endsection
