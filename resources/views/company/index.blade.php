@extends('layouts.app')

@section('table')
    <div class="container my-4">
        <a style="text-decoration: none; color:white; font-size:20px; font-weight: 800; cursor: pointer; background:blueviolet; padding:6px; border-radius:4px; border:2px solid lightgreen;"
            href="{{ route('company.create') }}">Add a New Company</a>
        <a href="{{ route('export.companies', ['format' => 'xlsx']) }}" class="btn btn-success ms-2">Export Excel</a>
        <a href="{{ route('export.companies', ['format' => 'csv']) }}" class="btn btn-primary ms-2">Export CSV</a>
    </div>

    <table class="table container my-4" id="myTable">
        <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Company Name</th>
                <th scope="col">Company email</th>
                <th scope="col">Company logo</th>
                <th scope="col">Company website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sno = 1;
            @endphp
            @forelse($company as $companydetails)
                <tr>
                    <td>{{ $sno++ }}</td>
                    <td>{{ $companydetails->name }}</td>
                    <td>{{ $companydetails->email }}</td>
                    <td>
                        <img style="width: 200px; height: 100px; border:1px solid lightgreen; border-radius:8px;"
                            src="{{ Storage::url('public/' . $companydetails->logo) }}">
                    </td>
                    <td>{{ $companydetails->website }}</td>
                    <td>
                        <div style="display: flex; justify-content: flex-end;">
                            <a style="text-decoration: none; color:white; font-size: 20px; padding: 6px; background: blue; border-radius: 8px; margin-right: 5px;"
                                href="{{ route('company.edit', $companydetails->id) }}">Edit</a>
                            <form action="{{ route('company.destroy', $companydetails->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    style="text-decoration: none; color:white; font-size: 20px; padding: 6px; background: red; border-radius: 8px; border:none;"
                                    type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Sorry, no details available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{ $company->links('pagination::bootstrap-5') }}
    </div>
@endsection
