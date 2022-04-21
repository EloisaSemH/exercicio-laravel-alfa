@if(!empty(session()->get('alert-message-success')))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check"></i>
        {!! session()->get('alert-message-success') !!}
        @if(session()->has('alert-message-success-listing'))
            <ul class="alert-message-listing">
                @foreach(session()->get('alert-message-success-listing') as $success)
                    <li>{{ $success }}</li>
                @endforeach
            </ul>
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(!empty(session()->get('alert-message-info')))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="mdi mdi-info-outline"></i>
        {!! session()->get('alert-message-info') !!}
        @if(session()->has('alert-message-info-listing'))
            <ul class="alert-message-listing">
                @foreach(session()->get('alert-message-info-listing') as $info)
                    <li>{{ $info }}</li>
                @endforeach
            </ul>
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(!empty(session()->get('alert-message-warning')))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="mdi mdi-alert-triangle"></i>
        {!! session()->get('alert-message-warning') !!}
        @if(session()->has('alert-message-warning-listing'))
            <ul class="alert-message-listing">
                @foreach(session()->get('alert-message-warning-listing') as $warning)
                    <li>{{ $warning }}</li>
                @endforeach
            </ul>
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(!empty(session()->get('alert-message-error')))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-close-circle-o"></i>
        {!! session()->get('alert-message-error') !!}
        @if(session()->has('alert-message-error-listing'))
            <ul class="alert-message-listing">
                @foreach(session()->get('alert-message-error-listing') as $error)
                    @if(is_array($error))
                        @foreach($error as $err)
                            @php
                                /** @var $err */
                                $err = is_array($err) ? implode('. ', $err) : (hOnlyAlphaNumbers($err) != '' && !is_numeric($err) ? $err : '');
                            @endphp
                            @if(!empty($err))
                                <li>{{ $err }}</li>
                            @endif
                        @endforeach
                    @else
                        @if(trim($error) != '')
                            <li>{{ $error }}</li>
                        @endif
                    @endif
                @endforeach
            </ul>
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
