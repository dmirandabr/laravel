@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>WELCOME TO BANKRATE</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="hp-options">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>1. What are you looking for?</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input type="radio"> Mortgage</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Refinance</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Auto Loans</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Home Equity</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Personal Loans</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input type="radio"> CD Rate</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Savings/Checking</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Credit Cards</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Insurance</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> Student Loans</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>2. Select a product</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input type="radio"> 30 yr fixed</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> 30 yr FHA mortgage</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> 5/1 ARM (interest only)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input type="radio"> 15 yr fixed</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> 5/1 ARM</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio"> 7/1 ARM</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row hp-stories">
        <div class="col-md-12">
            <h2 class="box-title">TOP STORIES</h2>
        </div>
        @if (count($stories))
            <div class="col-md-5">
                <img src="{{ $stories[0]['feature_image'] }}" class="img-responsive">
            </div>
            <div class="col-md-7">
                <ul>
                    @foreach($stories as $key => $story)
                    <li @if ($key == 0) {!! 'class="active"' !!} @endif>
                        <a href="{{ route('blog.story', $story['slug']) }}">
                            <h2>{{ $story['title'] }}</h2>
                            <p>{{ substr($story['excerpt'], 0, 120) }}... <span class="readmore">Read more</span></p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2 class="box-title">CALCULATORS</h2>
            <ul class="emphasized_list with-icons">
                <li><a href="/calculators/mortgages/mortgage-calculator.aspx">Mortgage calculator</a></li>
                <li><a href="/calculators/auto/auto-loan-calculator.aspx">Auto loan calculator</a></li>
                <li><a href="/calculators/mortgages/loan-calculator.aspx">Loan and amortization calculator</a></li>
                <li><a href="/calculators/mortgages/new-house-calculator.aspx">How much house can I afford?</a></li>
                <li><a href="/calculators/savings/simple-savings-calculator.aspx">Simple Savings Calculator</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2 class="box-title">NEWS & COMMENTARY</h2>
            <ul class="emphasized_list">
                <li><a href="http://www.bankrate.com/financing/wealth/the-19-million-tweet/?ic_id=News1">The $19-million tweet</a></li>
                <li><a href="http://www.bankrate.com/financing/cars/truck-owners-go-behind-the-scenes-with-ford/?ic_id=News2">Truck owners go behind the scenes with Ford</a></li>
                <li><a href="http://www.bankrate.com/financing/personal-loans/what-can-a-personal-loan-do-for-you/?ic_id=News3">What can a personal loan do for you?</a></li>
                <li><a href="http://www.bankrate.com/financing/retirement/ways-to-make-us-save-like-it-or-not/?ic_id=News4">Ways to make us save – like it or not</a></li>
                <li><a href="http://www.bankrate.com/financing/taxes/is-the-u-s-a-tax-haven-or-hell-both/?ic_id=News5">Is the U.S. a tax haven or hell? Both</a></li>
            </ul>
        </div>
    </div>
@stop