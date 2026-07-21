@extends('backend.layouts.app')

@section('title', 'Branch Settings')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Add New Branch Location</strong>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.branch.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Address (Can be multiline)</label>
                            <textarea type="text" rows="3" name="address" class="form-control" placeholder="Enter branch address..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>

                        <div class="table-responsive mt-3">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <strong>Branch Locations List</strong>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $b)
                                <tr>
                                    <td>{{ $b->id }}</td>
                                    <td>{!! nl2br(e($b->address)) !!}</td>
                                    <td>
                                        @if ($b->is_active == 1)
                                            <span class="badge badge-primary">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.setting.branch.edit', $b->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin.setting.branch.delete', $b->id) }}"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?');">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
