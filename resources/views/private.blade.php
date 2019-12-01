@extends('layouts.appmessage')

@section('content')
       
        <private-chat :user="{{auth()->user()}}"></private-chat>
        
@endsection

