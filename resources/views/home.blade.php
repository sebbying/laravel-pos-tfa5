@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <div class="hero-copy">
            <p class="eyebrow">WELCOME TO COUNTER POS</p>
            <h1>A clear view of<br>your accounts.</h1>
            <p class="hero-description">Get to know the customers you serve and the people behind your counter. Your account directories start here.</p>
            <a class="button button-primary" href="{{ route('customers.index') }}">View customer accounts <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="hero-art" aria-hidden="true">
            <div class="art-orbit"></div>
            <div class="account-illustration">
                <div class="illustration-top"><span class="illustration-logo">C</span><span class="illustration-dots">&bull; &bull; &bull;</span></div>
                <div class="illustration-heading"></div>
                <div class="illustration-row"><span class="illustration-avatar"></span><span class="illustration-lines"><i></i><i></i></span><span class="illustration-check">&#10003;</span></div>
                <div class="illustration-row"><span class="illustration-avatar pale"></span><span class="illustration-lines"><i></i><i></i></span><span class="illustration-check">&#10003;</span></div>
                <div class="illustration-row"><span class="illustration-avatar warm"></span><span class="illustration-lines"><i></i><i></i></span><span class="illustration-check">&#10003;</span></div>
                <div class="illustration-bottom"><span></span><span></span></div>
            </div>
            <span class="art-tag"><span class="small-dot"></span>Everything in its place</span>
        </div>
    </section>

    <section class="section-block" aria-labelledby="directories-title">
        <div class="section-heading"><div><p class="eyebrow">YOUR DIRECTORIES</p><h2 id="directories-title">Choose where to begin</h2></div><span class="section-note">The essentials, within reach.</span></div>
        <div class="directory-grid">
            <a class="directory-card" href="{{ route('customers.index') }}">
                <span class="card-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M16 5a3 3 0 0 1 0 6m2 4a5 5 0 0 1 3 5"/></svg></span>
                <span class="card-number">01</span>
                <h3>Customer Accounts</h3>
                <p>Browse customer names, contact details, locations, and account status in one directory.</p>
                <span class="card-action">Open customer directory <span aria-hidden="true">&rarr;</span></span>
            </a>
            <a class="directory-card" href="{{ route('users.index') }}">
                <span class="card-icon icon-blue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16a3 3 0 0 1 6 0m3-6h3m-3 4h3"/></svg></span>
                <span class="card-number">02</span>
                <h3>User Accounts</h3>
                <p>Find the sample staff accounts, assigned roles, email addresses, and current status.</p>
                <span class="card-action">Open user directory <span aria-hidden="true">&rarr;</span></span>
            </a>
        </div>
    </section>

    <div class="about-strip"><div><strong>A small application with a solid foundation.</strong><p>Learn what Counter POS includes and how its four pages work together.</p></div><a class="text-link" href="{{ route('about') }}">About this application <span aria-hidden="true">&rarr;</span></a></div>
@endsection
