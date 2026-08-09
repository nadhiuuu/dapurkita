@extends('layouts.home.app')
@section('title', 'Temukan inspirasi, bagikan kreasi')
@section('content')

@include('pages.home.sections.hero')
@include('pages.home.sections.recipes')
@include('pages.home.sections.tips-articles')
@include('pages.home.sections.tentang')

@endsection
