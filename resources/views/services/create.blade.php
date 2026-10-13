@extends('layouts.app')

@section('title', 'Add Service — UNIQUE')

@section('content')

<section class="section">

    <div class="section-inner">

        <div class="section-heading">
            <div>
                <div class="section-label">UNIQUE services</div>

                <h1>
                    Add a new
                    <em>service.</em>
                </h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="form-errors">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

       <form action="{{ route('admin.services.store') }}" method="POST" class="service-form">

            @csrf

            <div class="form-group">
                <label for="name">Service Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Hair Styling"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Describe this service..."
                >{{ old('description') }}</textarea>
            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="price">Price (₦)</label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        min="0"
                        step="0.01"
                        placeholder="5000"
                        value="{{ old('price') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="duration">Duration (minutes)</label>

                    <input
                        type="number"
                        id="duration"
                        name="duration"
                        min="1"
                        placeholder="60"
                        value="{{ old('duration') }}"
                        required
                    >
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                Save Service
            </button>

        </form>

    </div>

</section>

@endsection