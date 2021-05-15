@extends('layouts.profile')
@section('content')
<div class="panel-body bio-graph-info">
    <h1>Information</h1>
    <div class="row">
        <div class="bio-row">
            <p><span>Your Name </span>: {{Auth::user()->name}} </p>
        </div>
        <div class="bio-row">
            <p><span>Birthday</span>: {{Auth::user()->birthday}} </p>
        </div>

        <div class="bio-row">
            <p><span>Email </span>: {{Auth::user()->email}}</p>
        </div>
        <div class="bio-row">
            <p><span>Mobile </span>:  {{Auth::user()->phone}}</p>
        </div>
        <div class="bio-row">
            <p><span>Address </span>: {{Auth::user()->address}}</p>
        </div>
    </div>
</div>
@endsection
@section('exten')
<div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="bio-chart">
                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="edit-profile knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" ></div>
                    </div>
                    <div class="bio-desk">
                        <h4 class="red">Envato Website</h4>
                        <p>Started : 15 July</p>
                        <p>Deadline : 15 August</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="bio-chart">
                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob edit-profile" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" ></div>
                    </div>
                    <div class="bio-desk">
                        <h4 class="terques">ThemeForest CMS </h4>
                        <p>Started : 15 July</p>
                        <p>Deadline : 15 August</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="bio-chart">
                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob edit-profile" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8"></div>
                    </div>
                    <div class="bio-desk">
                        <h4 class="green">VectorLab Portfolio</h4>
                        <p>Started : 15 July</p>
                        <p>Deadline : 15 August</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="bio-chart">
                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob edit-profile" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8"></div>
                    </div>
                    <div class="bio-desk">
                        <h4 class="purple">Adobe Muse Template</h4>
                        <p>Started : 15 July</p>
                        <p>Deadline : 15 August</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
