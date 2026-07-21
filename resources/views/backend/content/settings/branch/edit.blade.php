@extends('backend.layouts.app')

@section('title', 'Edit Branch Location')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Branch Location</strong>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.branch.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $branch->id }}">
                        
                        <div class="form-group">
                            <label>Address (Can be multiline)</label>
                            <textarea type="text" rows="3" name="address" class="form-control" required>{{ $branch->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1" {{ $branch->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $branch->is_active == 0 ? 'selected' : '' }}>Deactive</option>
                            </select>
                        </div>

                        <div class="table-responsive mt-3">
                            <button type="submit" class="btn btn-info">Update</button>
                            <a href="{{ route('admin.setting.branch') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
