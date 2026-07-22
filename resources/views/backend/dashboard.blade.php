@extends('backend.layouts.app')
@section('title', __('Imperial Engineering Operations Dashboard'))

@section('content')
<div class="container-fluid px-3 py-2">
    <!-- Welcome Header Banner -->
    <div class="card border-0 mb-4 shadow-sm" style="border-radius: 14px; background: linear-gradient(135deg, #ffffff 0%, #fcfdfd 100%); border-left: 5px solid #b92019 !important;">
        <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <span class="badge px-3 py-1 mb-2" style="background: #fdecea; color: #b92019; font-weight: 700; font-size: 0.75rem; border-radius: 20px;">
                    IMPERIAL CONSULTANCY PORTAL
                </span>
                <h2 class="h3 font-weight-bold mb-1" style="color: #0f172a; font-family: 'Outfit', sans-serif;">
                    Engineering Operations Control
                </h2>
                <p class="text-muted mb-0 font-weight-500" style="font-size: 0.9rem;">
                    Welcome back, <strong style="color: #0f172a;">{{ $logged_in_user->name }}</strong>! Manage consultancy services, project portfolios, team members, and site settings.
                </p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('frontend.index') }}" target="_blank" class="btn btn-outline-danger px-3 py-2 font-weight-600 shadow-sm" style="border-radius: 8px; border-color: #b92019; color: #b92019; font-size: 0.85rem;">
                    <i class="fas fa-external-link-alt mr-1"></i> Live Website
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Management Shortcut Grid -->
    <div class="row">
        <!-- Shortcut 1: Services -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; transition: transform 0.2s;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase font-weight-bold small mb-1" style="letter-spacing: 0.05em;">Services</div>
                        <h4 class="mb-0 font-weight-bold" style="color: #0f172a;">Service Mgmt</h4>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #fdecea; color: #b92019;">
                        <i class="fas fa-cogs fa-lg"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    <a href="{{ route('admin.setting.service') }}" class="small font-weight-600" style="color: #b92019;">
                        Manage Services <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Shortcut 2: Team Members -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase font-weight-bold small mb-1" style="letter-spacing: 0.05em;">Committee</div>
                        <h4 class="mb-0 font-weight-bold" style="color: #0f172a;">Team Officers</h4>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #eef2ff; color: #4f46e5;">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    <a href="{{ route('admin.about.committee') }}" class="small font-weight-600" style="color: #4f46e5;">
                        Manage Members <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Shortcut 3: Destination & Projects -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase font-weight-bold small mb-1" style="letter-spacing: 0.05em;">Management of</div>
                        <h4 class="mb-0 font-weight-bold" style="color: #0f172a;">Projects</h4>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #ecfdf5; color: #059669;">
                        <i class="fas fa-project-diagram fa-lg"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    <a href="{{ route('admin.setting.project') }}" class="small font-weight-600" style="color: #059669;">
                        Manage Projects <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Shortcut 4: General Settings -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted text-uppercase font-weight-bold small mb-1" style="letter-spacing: 0.05em;">Site Setup</div>
                        <h4 class="mb-0 font-weight-bold" style="color: #0f172a;">General Settings</h4>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #fff7ed; color: #ea580c;">
                        <i class="fas fa-sliders-h fa-lg"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                    <a href="{{ route('admin.setting.general') }}" class="small font-weight-600" style="color: #ea580c;">
                        System Settings <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection