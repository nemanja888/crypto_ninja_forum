@extends('layouts.app')

@section('content')

           @foreach($discussions as $d)

               <div class="panel panel-default">
                   <div class="panel-heading">
                       <img src="{{ $d->user->avatar }}" alt="avatar" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                       <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</b></span>
                       @if($d->hasBestAnswer())

                           <span class="btn pull-right btn-danger btn-xs">CLOSED</span>
                       @else
                           <span class="btn pull-right btn-success btn-xs">OPEN</span>

                       @endif
                       <a href="{{ route('discussion', [ 'slug' => $d->slug ]) }}" style="margin-right:8px;" class="btn btn-default btn-xs pull-right">View</a>
                   </div>

                   <div class="panel-body">
                       <h4 class="text-center">
                        <strong>
                           {{ $d->title }}
                        </strong>
                       </h4>
                       <p class="text-center">
                           {{ str_limit($d->content, 100) }}
                       </p>

                   </div>
                   <div class="panel-footer">

                       <span>{{ $d->replies->count() }} Replies</span>

                       <a href="{{ route('channel',['slug' => $d->channel->slug]) }}" class="pull-right btn btn-default btn-xs">{{ $d->channel->title }}</a>

                   </div>

               </div>

            @endforeach

    <div class="text-center">

        {{ $discussions->links() }}

    </div>
@endsection
