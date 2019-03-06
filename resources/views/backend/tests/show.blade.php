@extends ('backend.layouts.app')

@section ('title', __('labels.backend.tests.management') . ' | ' . __('labels.backend.tests.view'))

@section('breadcrumb-links')
@include('backend.tests.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.tests.management') }}
                        <small class="text-muted">{{ __('labels.backend.tests.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.tests.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.tests.content.created_at') }}:</strong> {{ $test->updated_at->timezone(get_user_timezone()) }} ({{ $test->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.tests.content.last_updated') }}:</strong> {{ $test->created_at->timezone(get_user_timezone()) }} ({{$test->updated_at->diffForHumans() }})--}}
                        @if ($test->trashed())
                            <strong>{{ __('labels.backend.tests.content.deleted_at') }}:</strong> $test->deleted_at->timezone(get_user_timezone())  ($test->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection