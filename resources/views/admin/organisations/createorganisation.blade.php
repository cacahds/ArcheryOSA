@section ('dashboard')
    <h1></h1>
@endsection

@include('layouts.title', ['title'=>'Organisations'])

@extends ('home')

@section ('content')
{{--{!! dd($organisation); !!}--}}
    {{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(!empty($organisation))
                        Update
                    @else
                        Create
                    @endif
                    New Organisation
                    <a href="{{route('organisations')}}">
                        <button type="submit" class="btn btn-default pull-right" id="addevent">
                            <i class="fa fa-backward" >  Back</i>
                        </button>
                    </a>
                </div>

                <div class="panel-body">

                    @if (!empty($organisation))
                        <form class="form-horizontal" method="POST" action="{{ route('updateorganisation', urlencode($organisation->first()->name)) }}">
                    @else
                        <form class="form-horizontal" method="POST" action="{{ route('createorganisation') }}">
                    @endif
                        {{ csrf_field() }}

                        @if (!empty($organisation))
                            <input type="text" name="organisationid" hidden value="{{$organisation->first()->organisationid}}">
                        @endif


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="event" class="col-md-4 control-label">Organisation Name</label>

                            <div class="col-md-6">
                                @if (!empty($organisation))
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $organisation->first()->name) }}" required autofocus>
                                @else
                                    <input type="text" class="form-control" name="name" required autofocus>
                                @endif

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                    <label class="col-md-4 control-label">Visible</label>
                                <div class="col-md-6">
                                    @if (!empty($organisation))
                                        <?php
                                            $status='';
                                            if ($organisation->first()->visible == 1) {
                                                $status = 'checked';
                                            }
                                        ?>
                                        <input type="checkbox" name="visible" {{$status}}>
                                    @else
                                        <input type="checkbox" name="visible" value="">

                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @if (!empty($organisation))
                                    Update
                                        @else
                                    Create
                                        @endif
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}

@endsection

