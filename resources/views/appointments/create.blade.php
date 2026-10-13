@extends('layouts.admin')

@section('content')

<div class="appointment-page">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="header-content">
            <span class="eyebrow">APPOINTMENTS</span>
            <h1>New Appointment</h1>
            <p>Create and schedule an appointment for a customer.</p>
        </div>

        <a href="{{ route('admin.appointments.index') }}" class="back-btn">
            <span>←</span>
            Back to Appointments
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            <div class="alert-icon">✓</div>
            <div>
                <strong>Appointment Booked</strong>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-error">
            <div class="alert-icon">!</div>
            <div>
                <strong>Please check the form</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Appointment Card --}}
    <div class="appointment-card">

        <div class="card-heading">
            <div class="heading-icon">✦</div>

            <div>
                <h2>Customer Details</h2>
                <p>Enter the customer's information and appointment details below.</p>
            </div>
        </div>

        <form action="{{ route('admin.appointments.store') }}" method="POST">
            @csrf

            <div class="section-title">
                <span>01</span>
                Customer Information
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="customer_name">
                        Customer Name
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="customer_name"
                        name="customer_name"
                        value="{{ old('customer_name') }}"
                        placeholder="Enter customer's full name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="customer_email">
                        Email Address
                        <span>*</span>
                    </label>

                    <input
                        type="email"
                        id="customer_email"
                        name="customer_email"
                        value="{{ old('customer_email') }}"
                        placeholder="customer@example.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="customer_phone">
                        Phone Number
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="customer_phone"
                        name="customer_phone"
                        value="{{ old('customer_phone') }}"
                        placeholder="e.g. 08012345678"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="service_id">
                        Select Service
                        <span>*</span>
                    </label>

                    <select id="service_id" name="service_id" required>
                        <option value="">Choose a service</option>

                        @foreach($services as $service)
                            <option
                                value="{{ $service->id }}"
                                {{ old('service_id') == $service->id ? 'selected' : '' }}
                            >
                                {{ $service->name }} — ₦{{ number_format($service->price, 2) }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="section-title appointment-section">
                <span>02</span>
                Appointment Details
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="appointment_date">
                        Appointment Date
                        <span>*</span>
                    </label>

                    <input
                        type="date"
                        id="appointment_date"
                        name="appointment_date"
                        value="{{ old('appointment_date') }}"
                        min="{{ date('Y-m-d') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="appointment_time">
                        Appointment Time
                        <span>*</span>
                    </label>

                    <input
                        type="time"
                        id="appointment_time"
                        name="appointment_time"
                        value="{{ old('appointment_time') }}"
                        required
                    >
                </div>

            </div>

            <div class="form-group notes-group">
                <label for="notes">Additional Notes</label>

                <textarea
                    id="notes"
                    name="notes"
                    rows="5"
                    placeholder="Add any special request, preference or information about this appointment..."
                >{{ old('notes') }}</textarea>
            </div>

            <div class="form-footer">

                <a href="{{ route('admin.appointments.index') }}" class="cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="submit-btn">
                    <span>✓</span>
                    Book Appointment
                </button>

            </div>

        </form>

    </div>

</div>


<style>

    /* ================================
       APPOINTMENT PAGE
    ================================= */

    .appointment-page {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        padding-bottom: 40px;
    }

    /* ================================
       HEADER
    ================================= */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 25px;
        margin-bottom: 30px;
    }

    .header-content {
        min-width: 0;
    }

    .eyebrow {
        display: inline-block;
        color: #e91e63;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        margin-bottom: 8px;
    }

    .page-header h1 {
        margin: 0 0 7px;
        font-size: 32px;
        line-height: 1.2;
        color: #181818;
        font-weight: 750;
    }

    .page-header p {
        margin: 0;
        color: #777;
        font-size: 14px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: #333;
        background: #fff;
        border: 1px solid #e9e9e9;
        padding: 11px 16px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 650;
        white-space: nowrap;
        transition: all .2s ease;
    }

    .back-btn span {
        color: #e91e63;
        font-size: 17px;
    }

    .back-btn:hover {
        border-color: #e91e63;
        color: #e91e63;
        transform: translateX(-2px);
    }

    /* ================================
       ALERTS
    ================================= */

    .alert {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 15px 18px;
        border-radius: 13px;
        margin-bottom: 22px;
    }

    .alert-icon {
        width: 28px;
        height: 28px;
        min-width: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: 800;
    }

    .alert strong {
        display: block;
        margin-bottom: 3px;
        font-size: 14px;
    }

    .alert p {
        margin: 0;
        font-size: 13px;
    }

    .alert-success {
        background: #effaf3;
        color: #18743b;
        border: 1px solid #d7f1df;
    }

    .alert-success .alert-icon {
        background: #d9f4e2;
    }

    .alert-error {
        background: #fff3f3;
        color: #b42318;
        border: 1px solid #f8dada;
    }

    .alert-error .alert-icon {
        background: #fbdada;
    }

    .alert-error ul {
        margin: 7px 0 0;
        padding-left: 18px;
        font-size: 13px;
    }

    /* ================================
       MAIN CARD
    ================================= */

    .appointment-card {
        background: #fff;
        border: 1px solid #eeeeee;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, .055);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-bottom: 25px;
        margin-bottom: 28px;
        border-bottom: 1px solid #eeeeee;
    }

    .heading-icon {
        width: 46px;
        height: 46px;
        min-width: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff0f5;
        color: #e91e63;
        border-radius: 13px;
        font-size: 21px;
    }

    .card-heading h2 {
        margin: 0 0 5px;
        color: #202020;
        font-size: 18px;
    }

    .card-heading p {
        margin: 0;
        color: #888;
        font-size: 13px;
    }

    /* ================================
       SECTION TITLES
    ================================= */

    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #222;
        font-size: 13px;
        font-weight: 750;
        margin-bottom: 20px;
    }

    .section-title span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 27px;
        height: 27px;
        border-radius: 8px;
        background: #181818;
        color: #fff;
        font-size: 11px;
    }

    .appointment-section {
        margin-top: 13px;
        padding-top: 27px;
        border-top: 1px solid #eeeeee;
    }

    /* ================================
       FORM
    ================================= */

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        margin-bottom: 21px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #303030;
        font-size: 13px;
        font-weight: 650;
    }

    .form-group label span {
        color: #e91e63;
        margin-left: 2px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        box-sizing: border-box;
        padding: 13px 14px;
        border: 1px solid #dedede;
        border-radius: 11px;
        background: #fff;
        color: #222;
        font-family: inherit;
        font-size: 14px;
        outline: none;
        transition: all .2s ease;
    }

    .form-group input,
    .form-group select {
        height: 47px;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #aaa;
    }

    .form-group input:hover,
    .form-group select:hover,
    .form-group textarea:hover {
        border-color: #c8c8c8;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #e91e63;
        box-shadow: 0 0 0 3px rgba(233, 30, 99, .08);
    }

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
        line-height: 1.6;
    }

    .notes-group {
        margin-top: 2px;
    }

    /* ================================
       FOOTER BUTTONS
    ================================= */

    .form-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        padding-top: 23px;
        margin-top: 4px;
        border-top: 1px solid #eeeeee;
    }

    .cancel-btn,
    .submit-btn {
        min-height: 45px;
        padding: 0 20px;
        border-radius: 11px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s ease;
    }

    .cancel-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #555;
        background: #f6f6f6;
        border: 1px solid #e7e7e7;
    }

    .cancel-btn:hover {
        background: #eeeeee;
    }

    .submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: none;
        background: #e91e63;
        color: #fff;
        box-shadow: 0 7px 18px rgba(233, 30, 99, .22);
    }

    .submit-btn:hover {
        background: #d81759;
        transform: translateY(-1px);
        box-shadow: 0 9px 22px rgba(233, 30, 99, .28);
    }

    .submit-btn span {
        font-size: 14px;
    }

    /* ================================
       TABLET
    ================================= */

    @media (max-width: 850px) {

        .appointment-page {
            padding: 5px 0 30px;
        }

        .appointment-card {
            padding: 26px;
        }

        .page-header h1 {
            font-size: 28px;
        }
    }

    /* ================================
       MOBILE
    ================================= */

    @media (max-width: 650px) {

        .page-header {
            flex-direction: column;
            align-items: stretch;
            gap: 17px;
            margin-bottom: 22px;
        }

        .page-header h1 {
            font-size: 25px;
        }

        .page-header p {
            font-size: 13px;
            line-height: 1.5;
        }

        .back-btn {
            width: 100%;
            justify-content: center;
            box-sizing: border-box;
        }

        .appointment-card {
            padding: 20px 16px;
            border-radius: 16px;
        }

        .card-heading {
            align-items: flex-start;
            padding-bottom: 20px;
            margin-bottom: 23px;
        }

        .heading-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 11px;
            font-size: 18px;
        }

        .card-heading h2 {
            font-size: 16px;
        }

        .card-heading p {
            line-height: 1.5;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .appointment-section {
            margin-top: 5px;
            padding-top: 23px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group input,
        .form-group select {
            height: 46px;
        }

        .form-footer {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .cancel-btn,
        .submit-btn {
            width: 100%;
            box-sizing: border-box;
        }

        .alert {
            padding: 13px;
        }
    }

    /* ================================
       SMALL PHONES
    ================================= */

    @media (max-width: 380px) {

        .appointment-card {
            padding: 17px 13px;
        }

        .page-header h1 {
            font-size: 23px;
        }

        .section-title {
            font-size: 12px;
        }
    }

</style>

@endsection