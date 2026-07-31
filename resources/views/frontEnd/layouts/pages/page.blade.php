@extends('frontEnd.layouts.master')
@section('title', $page->name ?? 'Page')
@section('content')

<section class="createpage-section" style="padding: 40px 0; background: #f8fafc; min-h: 70vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                
                {{-- Breadcrumb / Header --}}
                <div style="background: #ffffff; border-radius: 16px; padding: 25px 35px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 25px;">
                    <h2 style="font-size: 24px; font-weight: 700; color: #0f172a; margin: 0; font-family: 'Hind Siliguri', sans-serif;">
                        {{ $page->title }}
                    </h2>
                </div>

                {{-- Page Main Content --}}
                <div style="background: #ffffff; border-radius: 16px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                    <div class="page-description" style="font-size: 15px; color: #334155; line-height: 1.8;">
                        {!! $page->description !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
