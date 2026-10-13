@extends('layouts.admin')

@section('title', 'Services')

@section('content')

<div class="topbar">

    <div>
        <h2>Services</h2>
        <p>Manage everything UNIQUE offers to customers.</p>
    </div>

    <a href="{{ route('admin.services.create') }}"
       class="btn btn-primary">
        + Add Service
    </a>

</div>


@if(session('success'))

    <div class="alert">
        {{ session('success') }}
    </div>

@endif


<div class="panel">

    <div class="panel-header">

        <div>
            <h3>All Services</h3>
            <p>
                {{ $services->count() }}
                service{{ $services->count() == 1 ? '' : 's' }}
                available
            </p>
        </div>

    </div>


    @if($services->count() > 0)

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                @foreach($services as $service)

                    <tr>

                        <td>

                            <strong>
                                {{ $service->name }}
                            </strong>

                            @if($service->description)

                                <div style="
                                    color:#91868d;
                                    font-size:12px;
                                    margin-top:5px;
                                ">
                                    {{ Str::limit($service->description, 65) }}
                                </div>

                            @endif

                        </td>

                        <td>
                            ₦{{ number_format($service->price, 2) }}
                        </td>

                        <td>
                            {{ $service->duration }} mins
                        </td>

                        <td>

                            @if($service->is_active)

                                <span class="status active-status">
                                    Active
                                </span>

                            @else

                                <span class="status inactive-status">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route('admin.services.edit', $service) }}"
                                class="btn btn-light"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('admin.services.destroy', $service) }}"
                                method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Delete this service?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div style="
            text-align:center;
            padding:60px 20px;
        ">

            <h3>No services yet</h3>

            <p style="
                color:#8d8389;
                margin:10px 0 20px;
            ">
                Add your first UNIQUE service to get started.
            </p>

            <a
                href="{{ route('admin.services.create') }}"
                class="btn btn-primary"
            >
                + Add First Service
            </a>

        </div>

    @endif

</div>

@endsection

