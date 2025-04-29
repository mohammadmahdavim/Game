@extends('errors.minimal')

@section('title', __('Bad Request'))
@section('code', '400')
@section('message', $exception->getMessage()??__('Too Many Requests'))
