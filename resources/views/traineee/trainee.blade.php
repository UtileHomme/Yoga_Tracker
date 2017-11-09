<!-- This is the trainee dashboard -->

@extends('layouts.app1')

@section('content')

    <div class="container-fluid" style="padding-top:60px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" >
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="" >
                            <h4 style="float:left"><span id="dash">Welcome!</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default" >
                    <div class="panel-body">

                        <div class="hours_logged" >
                            <h4 class="text-center"><span id="dash">Hours logged Today</span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" >
                    <div class="panel-body">

                        <div class="hours_logged" >
                            <h4 class="text-center"><span id="dash">Hours logged this Week</span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" >
                    <div class="panel-body">


                        <div class="hours_logged" >
                            <h4 class="text-center"><span id="dash">Hours logged this Month</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
