@extends('layouts.main.blog')

@section('page.title', __('Блог'))

@section('main.content')

    <x-blog.header />

    <x-blog.show :blog="$blog" />

@endsection
