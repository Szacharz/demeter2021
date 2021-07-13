@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500', '<a href="dementor/">Wróć na stronę logowania<a>')
@section('message', __('Server Error'))
