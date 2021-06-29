@extends('layouts.main')

@section('content')
<main id="page-home">
    <section id="home-main">
        <div class="container mt-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="headercontainer">
                        <h1>Messages</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <select id="user-select">
                        <option value="0" {{ $filters['userId'] == false ? 'selected' : '' }}>-- All messages --</option>
                        @if (count($users))
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $filters['userId'] == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <section id="messages">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="messages">
                        @if (count($messages))
                            @foreach ($messages as $message)
                                <li>
                                    <p class="meta">
                                        <span class="author">{{ $message->user->name }}</span>
                                        <span class="date">{{ date('d-m-Y H:m:s', strtotime($message->created_at)) }}</span>
                                    </p>
                                    <p class="content">{{ $message->content }}</p>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection




                
