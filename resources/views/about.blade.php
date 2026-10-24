@extends('layouts.app')

@section('title', 'About')

@section('content')
    <header class="page-heading"><p class="eyebrow">ABOUT COUNTER POS</p><h1>Start with the essentials.</h1><p>A simple foundation for a point-of-sale application, built around clear navigation and organized account information.</p></header>

    <section class="about-overview" aria-labelledby="project-title">
        <div><span class="label">THE PROJECT</span><h2 id="project-title">Four pages. One connected workspace.</h2><p>Counter POS is a Laravel application created for IT0049 Technical Formative Assessment 5. It rebuilds a four-page POS foundation using routes, controllers, and Blade views.</p><p>This version displays sample customer and user accounts from static PHP arrays. It supports viewing the account directories; account editing, authentication, and sales transactions are outside the activity's scope.</p></div>
        <div class="project-details"><div><span>Course</span><strong>IT0049</strong></div><div><span>Activity</span><strong>TFA5 &middot; Laravel POS Foundations</strong></div><div><span>Interface</span><strong>Blade templates and CSS</strong></div><div><span>Account data</span><strong>Static sample records</strong></div></div>
    </section>

    <section class="section-block" aria-labelledby="mvc-title">
        <div class="section-heading"><div><p class="eyebrow">HOW IT WORKS</p><h2 id="mvc-title">A familiar flow, in Laravel</h2></div></div>
        <div class="flow-grid">
            <article class="flow-card"><span class="step-number">01</span><h3>Route</h3><p>A URL in <code>routes/web.php</code> selects the controller method that handles the page.</p></article>
            <article class="flow-card"><span class="step-number">02</span><h3>Controller</h3><p>The controller prepares the page and passes the account array to its Blade view.</p></article>
            <article class="flow-card"><span class="step-number">03</span><h3>View</h3><p>Blade renders the page and loops through the account records using <code>&#64;foreach</code>.</p></article>
        </div>
        <p class="supporting-note">Models, migrations, and seeders are included for an optional database copy of the sample accounts. The account pages continue to use their controller arrays for this activity.</p>
    </section>

    <section class="section-block" aria-labelledby="pages-title">
        <div class="section-heading"><div><p class="eyebrow">EXPLORE THE APPLICATION</p><h2 id="pages-title">Find your page</h2></div></div>
        <div class="page-list">
            <a href="{{ route('home') }}"><span><strong>Home</strong><small>Your starting point and directory shortcuts.</small></span><span class="path">/ <span aria-hidden="true">&rarr;</span></span></a>
            <a href="{{ route('customers.index') }}"><span><strong>Customer Accounts</strong><small>Customer details, contact information, and status.</small></span><span class="path">/customers <span aria-hidden="true">&rarr;</span></span></a>
            <a href="{{ route('users.index') }}"><span><strong>User Accounts</strong><small>Staff accounts, roles, email addresses, and status.</small></span><span class="path">/users <span aria-hidden="true">&rarr;</span></span></a>
            <a href="{{ route('about') }}" aria-current="page"><span><strong>About</strong><small>Project background and application structure.</small></span><span class="path">/about <span aria-hidden="true">&rarr;</span></span></a>
        </div>
    </section>
@endsection
