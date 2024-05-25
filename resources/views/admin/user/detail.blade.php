<p><b>{{ __('Name') }}</b>: {{ $fname }} {{ $lname }}</p>
<p><b>{{ __('Email') }}</b>: {{ $email }}</p>
<p><b>{{ __('Mobile') }}</b>: @if(isset($mobile))
    {{ $mobile }}
    @endif</p>
<p><b>{{ __('Reg. Date') }}</b>: @if(isset($created_at))
    {{ \Carbon\Carbon::parse($created_at)->format('d-M-Y') }}
    @endif
</p>