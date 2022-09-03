@php
    $message = $type = null;
    if(session()->has('type') && session()->has('message')) {
        $message = session()->get('message');
        $type = session()->get('type');
    }
@endphp

@if($message !== null && $type !== null)
    <x-alert :type="$type" :message="$message"></x-alert>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
@endif
