@extends('layouts.admin')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/multiselect/css/multi-select.css') }}" />
@endsection

@section('content')

    <div class="page-header card">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Create Category</h5>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb breadcrumb-title float-left pl-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home')}}"><span class="feather icon-home"></span></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('category.index') }}">Survey</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('category.create') }}">Create New Category</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        @if ($errors->any())
                        <div class="card-header">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="card-block">
                            <form id="main" method="post" action="{{ route('category.store') }}" novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Category Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" id="name" name="name" placeholder="Enter Category Name" type="text" value="{{ old('name') }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Slug</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" id="slug" name="slug"  type="text" value="{{ old('slug') }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Description</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" id="description" name="description" placeholder="Description" type="text" value="{{ old('description') }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <div class="form-radio">
                                                        <div class="radio radio-inline" id="status">
                                                                <label>
                                                                    <input type="radio" id="active" name="status" value="1" checked>
                                                                    <i class="helper"></i>Active
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <label>
                                                                    <input type="radio" id="deactive" name="status" value="0">
                                                                    <i class="helper"></i>Deactive
                                                                </label>
                                                            </div>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Event</label>
                                            <div class="col-sm-8">
                                                <select type="" class="form-control fill" name="event" >
                                                    <option value="0" disabled selected>Select Event</option>
                                                    @foreach ($events as $event)
                                                    <option id="{{ $event->id }}"value="{{ $event->id }}">{{ $event->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label class="col-sm-4"></label>
                                            <div class="col-sm-2" style="margin:5px;">
                                                <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                            <div class="col-sm-2" style="margin:5px;">
                                                <button type="reset" class="btn btn-warning m-b-0">Reset</button>
                                            </div>
                                            <div class="col-sm-2" style="margin:5px;">
                                                <a href="{{ route('category.index') }}"  class="btn btn-danger m-b-0">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="col-sm-12 col-xl-4 m-b-30">
                                        <h4 class="sub-title">Select Zone</h4>
                                        <select id='optgroup'class="searchable" multiple='multiple'>
                                        @foreach ($upazilas as $upazila)
                                        <optgroup label='{{ $upazila->name }}'>
                                            @if($upazila->zones)
                                            @foreach ($upazila->zones as $zone)
                                            <option value='{{ $zone->id }}'>{{ $zone->name }}</option>
                                             @endforeach
                                             @endif
                                       <optgroup>
                                        @endforeach
                                        </select>
                                        </div>  --}}
                                        </div>
                                        {{-- @dd($upazilas) --}}

                                    {{-- <div class="col-sm-12 col-xl-6">
                                        <select id='custom-headers' class="searchable" name="zone[]" multiple='multiple'>
                                            @foreach($zones as $zone)
                                            <option value='{{ $zone->id }}' >{{ $zone->name }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="styleSelector">
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('admin/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/jquery.quicksearch.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/pages/advance-elements/select2-custom.js') }}"></script>
@endsection
