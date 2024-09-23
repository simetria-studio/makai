@extends('layouts.painel')

@section('content')
    <h1>Conteúdo do Painel</h1>
    <p>Olá, {{ Auth::user()->name }}</p>
    <p>Seja bem-vindo ao painel de controle do sistema.</p>
@endsection


@section('js')

@endsection