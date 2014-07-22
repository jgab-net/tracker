@extends('layout')

@section('content')

    @if(count($stories)>0)

        <div class="panel-group stories" id="stories">
        @foreach ($stories as $story)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row story">
                        <div class="col-md-6 col-sm-6">
                            @if($story->is('feature'))
                                <i class="fa fa-star"></i>
                            @endif
                            @if($story->is('chore'))
                                <i class="fa fa-cog"></i>
                            @endif
                            @if($story->is('bug'))
                                <i class="fa fa-bug"></i>
                            @endif
                            <a data-toggle="collapse" data-parent="#stories" href="#{{ $story->id }}">
                                {{ Str::limit($story->description, 40) }}
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            {{ Str::limit($story->project->name, 15) }}
                            <span class="badge pull-right">
                                {{ floor($story->time/60/60) }}:{{ floor($story->time/60) }}:{{ floor($story->time % 60) }}
                            </span>
                        </div>
                        <div class="col-md-2 col-sm-2 options-container">
                            <div class="btn-group btn-group-sm options">
                                <a class="btn btn-default" href="{{ $story->url }}" target="_blank" data-id="{{ $story->id }}"><i class="fa fa-external-link"></i></a>
                                @if($story->paused())
                                    <a class="btn btn-info" id="storyStart" data-id="{{ $story->id }}"><i class="fa fa-play"></i></a>
                                @endif
                                @if($story->started())
                                    <a class="btn btn-warning" id="storyPause" data-id="{{ $story->id }}"><i class="fa fa-pause"></i></a>
                                @endif
                                @if(!$story->closed())
                                    <a class="btn btn-success @if($story->time == 0) disabled @endif" id="storyStop" data-id="{{ $story->id }}"><i class="fa fa-check"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div id="{{ $story->id }}" class="panel-collapse collapse out">
                    <div class="panel-body">
                        {{ $story->description }} <br/>
                        PROJECT: {{ $story->project->name }} <br/>
                        PIVOTAL ID: {{ $story->pivotal_id }}
                    </div>
                </div>
            </div>

        @endforeach

        </div>

        <div class="text-center"> {{ $stories->appends(Input::only('query'))->links() }} </div>

    @else

        <div class="alert alert-info" role="alert">
            0 stories
        </div>

    @endif

@stop

@section('script')
    {{ HTML::script('js/story.js') }}
@stop
