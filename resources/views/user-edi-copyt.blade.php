@extends('layouts.app-copy')

@section('content')
<admin-update-user-component 
    :user="{{($user)}}" 
    :gender="{{$gender}}" 
    :team-leaders="{{$team_leaders}}" 
    :address-types="{{$address_types}}" 
    :contact-types="{{$contact_types}}" 
    :roles="{{$roles}}" 
    :departments="{{$departments}}"
>
</admin-update-user-component>
@endsection