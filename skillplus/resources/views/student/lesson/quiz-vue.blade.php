@extends('student.layout.layout-vue')


@section('page')
    <quiz-component :id="{{ request()->route('id') }}" :lid="{{ request()->route('lid') }}"></quiz-component>
@endsection
