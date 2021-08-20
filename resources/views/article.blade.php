@extends('layouts.app')

@section('content')
<div class="container">
    <article-single :article="{{ $articleId }}"/>
</div>
@endsection
