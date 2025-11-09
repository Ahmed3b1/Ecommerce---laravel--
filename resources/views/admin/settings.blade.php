@extends('layouts.adminmaster')



@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4">Settings</h2>

    <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-coreui-toggle="tab" data-coreui-target="#general" type="button" role="tab">General</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="payment-tab" data-coreui-toggle="tab" data-coreui-target="#payment" type="button" role="tab">Payment</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="shipping-tab" data-coreui-toggle="tab" data-coreui-target="#shipping" type="button" role="tab">Shipping</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="email-tab" data-coreui-toggle="tab" data-coreui-target="#email" type="button" role="tab">Email</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="admin-tab" data-coreui-toggle="tab" data-coreui-target="#admin" type="button" role="tab">Admin</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="seo-tab" data-coreui-toggle="tab" data-coreui-target="#seo" type="button" role="tab">SEO</button>
        </li>
    </ul>

    <div class="tab-content mt-4" id="settingsTabsContent">
        <!-- General Settings -->
        <div class="tab-pane fade show active" id="general" role="tabpanel">
            <form method="POST" action="{{ route('admingeneralsettings') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Store Name</label>
                        <input type="text" name="store_name" class="form-control" value="{{ old('store_name', $settings['store_name'] ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Store Email</label>
                        <input type="email" name="store_email" class="form-control" value="{{ old('store_email', $settings['store_email'] ?? '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings['phone'] ?? '') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Currency</label>
                        <select name="currency" class="form-select">
                            <option value="USD">USD</option>
                            <option value="EGP">EGP</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Language</label>
                        <select name="language" class="form-select">
                            <option value="en">English</option>
                            <option value="ar">Arabic</option>
                            <option value="fr">French</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Store Address</label>
                    <textarea name="address" class="form-control" rows="2">{{ old('address', $settings['address'] ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Logo</label>
                    <input type="file" name="logo" class="form-control">
                </div>

                

                <button type="submit" class="btn btn-primary">Save General Settings</button>
            </form>
        </div>

        <!-- Payment Settings -->
        <div class="tab-pane fade" id="payment" role="tabpanel">
            <form method="POST" action="{{ route('adminpaymentsettings') }}">
                @csrf
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" 
                        type="checkbox" 
                        name="stripe_enabled" 
                        id="stripe_enabled"
                        {{ old('stripe_enabled', $settings->stripe_enabled ?? 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="stripe_enabled">Enable Stripe</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stripe API Key</label>
                    <input type="text" 
                        name="stripe_key" 
                        class="form-control" 
                        value="{{ old('stripe_key', $settings->stripe_key ?? '') }}">
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" 
                        type="checkbox" 
                        name="paypal_enabled" 
                        id="paypal_enabled"
                        {{ old('paypal_enabled', $settings->paypal_enabled ?? 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="paypal_enabled">Enable PayPal</label>
                </div>

                <button type="submit" class="btn btn-primary">Save Payment Settings</button>
            </form>
        </div>

        <!-- Shipping Settings -->
        <div class="tab-pane fade" id="shipping" role="tabpanel">
            <form method="POST" action="{{ route('adminshippingsettings') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Default Shipping Cost</label>
                    <input type="number" name="shipping_cost" class="form-control" step="0.01" value="{{ old('shipping_cost', $settings->shipping_cost ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Free Shipping Threshold</label>
                    <input type="number" name="free_shipping_above" class="form-control" step="0.01" value="{{ old('free_shipping_above', $settings->free_shipping_above ?? '') }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Shipping Settings</button>
            </form>
        </div>

        <!-- Email Settings -->
        <div class="tab-pane fade" id="email" role="tabpanel">
            <form method="POST" action="{{ route('adminemailsettings') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Sender Name</label>
                    <input type="text" name="sender_name" class="form-control" value="{{ old('sender_name', $settings->sender_name ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sender Email</label>
                    <input type="email" name="sender_email" class="form-control" value="{{ old('sender_email', $settings->sender_email ?? '') }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Email Settings</button>
            </form>
        </div>

        <!-- Admin Account Settings -->
        <div class="tab-pane fade" id="admin" role="tabpanel">
            <form method="POST" action="{{ route('adminaccountsettings') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Admin Email</label>
                    <input type="email" name="admin_email" class="form-control" value="{{ old('admin_email', $settings->admin_email ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Change Password</label>
                    <input type="password" name="admin_password" class="form-control" value="{{ old('admin_password', $settings->admin_password ?? '') }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Admin Info</button>
            </form>
        </div>

        <!-- SEO Settings -->
        <div class="tab-pane fade" id="seo" role="tabpanel">
            <form method="POST" action="{{ route('adminseosettings') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $settings->meta_title ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $settings->meta_description ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save SEO Settings</button>
            </form>
        </div>
    </div>
</div>
@endsection
