@extends('errors.minimal')

@section('title', __('Bad Request'))
@section('code', '503')
@section('message', $exception->getMessage()??__('Bad Request'))
