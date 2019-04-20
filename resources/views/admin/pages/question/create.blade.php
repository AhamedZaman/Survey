@extends('layouts.admin')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/multiselect/css/multi-select.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icon/icofont/css/icofont.css') }}">
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/pages.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/sweetalert/css/sweetalert.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/component.css') }}">

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

@endsection

@section('content')

    <div class="page-header card">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Create Question</h5>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb breadcrumb-title float-left pl-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home')}}"><span class="feather icon-home"></span></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('question.index') }}">Question</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('question.create') }}">Create New Question</a>
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
                            <form id="main" method="post" action="{{ route('question.store') }}" novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Question</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" id="question" name="question" placeholder="Enter Question" type="text" value="{{ old('question') }}">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Is Optional</label>
                                            <div class="col-sm-8">
                                                <div class="form-radio">
                                                    <div class="radio radio-inline" id="is_optional">
                                                            <label>
                                                                <input type="radio" name="is_optional"
                                                                value="1" >
                                                                <i class="helper"></i>Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="is_optional" value="0" checked>
                                                                <i class="helper"></i>No
                                                            </label>
                                                        </div>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <div class="form-radio">
                                                    <div class="radio radio-inline" id="status">
                                                            <label>
                                                                <input type="radio" name="status" value="1" checked>
                                                                <i class="helper"></i>Active
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status" value="0">
                                                                <i class="helper"></i>Deactive
                                                            </label>
                                                        </div>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Category</label>
                                            <div class="col-sm-8">
                                                    <select class="js-example-basic-single col-sm-12" id="category" name="category">
                                                            <option value="AL">Select Category</option>
                                                            @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                                    </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Priority</label>
                                            <div class="col-sm-8">
                                                    <select class="js-example-basic-single col-sm-12" id="priority" name="priority">
                                                           <option>Select Priority</option>
                                                           <option value="1" >1</option>
                                                           <option value="2" >2</option>
                                                           <option value="3" >3</option>
                                                           <option value="4" >4</option>
                                                           <option value="5" >5</option>
                                                           <option value="6" >6</option>
                                                           <option value="7" >7</option>
                                                           <option value="8" >8</option>
                                                           <option value="9" >9</option>
                                                           <option value="1o" >10</option>
                                                    </select>
                                                <span class="messages"></span>
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


                                    <div class="col-sm-6 col-xl-4 m-b-30">
                                        <h4 class="sub-title">Select Answer</h4>
                                        <select id="answer" class="searchable" multiple='multiple' name="answer[]">
                                            @foreach($answers as $answer)
                                                <option value='{{ $answer->id }}' >{{ $answer->answer }}</option>
                                            @endforeach
                                        </select>

                                        <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-2" style="margin:5px;">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">
                                                        Add New Answer
                                                    </button>
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

                                        {{-- @dd($upazilas) --}}

                                    {{-- <div class="col-sm-12 col-xl-6">
                                        <select id='custom-headers' class="searchable" name="zone[]" multiple='multiple'>
                                            @foreach($zones as $zone)
                                            <option value='{{ $zone->id }}' >{{ $zone->name }}</option>
                                            @endforeach
                                        </select> --}}
                                    {{-- </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
                        <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Answer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <div class="card">
                                    <div class="card-block">
                                    <form id="addanswer" action="" method="post" novalidate>
                                        @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Anser</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="answer" placeholder="Enter Answer">
                                    <span class="messages popover-valid"></span>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                    <span class="messages popover-valid"></span>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <label class="col-sm-2"></label>
                                    </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="addbtn" class="btn btn-primary">Save Answer</button>
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
    <script type="text/javascript" src="{{ asset('admin/bower_components/modernizr/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/pages/advance-elements/select2-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/modal.js') }}"></script>
    <script src="{{ asset('admin/assets/js/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/modalEffects.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function(){
            $(#addbtn).on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url: "/answerstore",
                    data: $('#addanswer').serialize(),
                    success: function(response){
                        console.log(response)
                        $('#addmodal').modal('hide')
                        alert("data save");
                    },
                    error: function(error){
                        console.log(error)
                        alert("data not save");
                    }
                });
            });
        });
    </script>

//modal






    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
@endsection
