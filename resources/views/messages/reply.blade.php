@extends('layouts.admin')

@section('nav-title', 'REPONDRE A UN MAIL')

@section('content')
    <x-mail.reply-to :message="$mail" />
@endsection
