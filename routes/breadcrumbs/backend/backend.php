<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.country.index', function ($trail) {
    $trail->push('Country', route('admin.country.index'));
});
Breadcrumbs::for('admin.country.create', function ($trail) {
    $trail->push('Create', route('admin.country.create'));
});
Breadcrumbs::for('admin.country.edit', function ($trail) {
    $trail->push('Edit Country', route('admin.country.edit',1));
});

Breadcrumbs::for('admin.property.index', function ($trail) {
    $trail->push('Property List', route('admin.property.index'));
});
Breadcrumbs::for('admin.property.create', function ($trail) {
    $trail->push('Create', route('admin.property.create'));
});
Breadcrumbs::for('admin.property.edit', function ($trail) {
    $trail->push('Edit', route('admin.property.edit',1));
});

Breadcrumbs::for('admin.property_type.index', function ($trail) {
    $trail->push('Property Type', route('admin.property_type.index'));
});
Breadcrumbs::for('admin.property_type.create', function ($trail) {
    $trail->push('Create', route('admin.property_type.create'));
});
Breadcrumbs::for('admin.property_type.edit', function ($trail) {
    $trail->push('Edit', route('admin.property_type.edit',1));
});

Breadcrumbs::for('admin.agent.index', function ($trail) {
    $trail->push('Agent', route('admin.agent.index'));
});
Breadcrumbs::for('admin.agent.create', function ($trail) {
    $trail->push('Create Agent', route('admin.agent.create'));
});
Breadcrumbs::for('admin.agent.edit', function ($trail) {
    $trail->push('Edit', route('admin.agent.edit',1));
});

Breadcrumbs::for('admin.agent_request.index', function ($trail) {
    $trail->push('Agent Request', route('admin.agent_request.index'));
});
Breadcrumbs::for('admin.agent_request.edit', function ($trail) {
    $trail->push('Approval', route('admin.agent_request.edit',1));
});

Breadcrumbs::for('admin.category.index', function ($trail) {
    $trail->push('Category', route('admin.category.index'));
});
Breadcrumbs::for('admin.category.edit', function ($trail) {
    $trail->push('Edit Category', route('admin.category.edit',1));
});

Breadcrumbs::for('admin.post.index', function ($trail) {
    $trail->push('Post', route('admin.post.index'));
});
Breadcrumbs::for('admin.post.create', function ($trail) {
    $trail->push('Create Post', route('admin.post.create'));
});
Breadcrumbs::for('admin.post.edit', function ($trail) {
    $trail->push('Edit Post', route('admin.post.edit',1));
});

Breadcrumbs::for('admin.sidebar_ad.index', function ($trail) {
    $trail->push('Sidbar Advertisement', route('admin.sidebar_ad.index'));
});

Breadcrumbs::for('admin.file_manager.index', function ($trail) {
    $trail->push('File Manager', route('admin.file_manager.index'));
});

Breadcrumbs::for('admin.contact_us.index', function ($trail) {
    $trail->push('Contact Us', route('admin.contact_us.index'));
});
Breadcrumbs::for('admin.contact_us.edit', function ($trail) {
    $trail->push('Edit', route('admin.contact_us.edit',1));
});

Breadcrumbs::for('admin.settings.index', function ($trail) {
    $trail->push('General Settings', route('admin.settings.index'));
});

Breadcrumbs::for('admin.about_us', function ($trail) {
    $trail->push('About Us', route('admin.about_us'));
});

Breadcrumbs::for('admin.privacy_policy', function ($trail) {
    $trail->push('Privacy Policy', route('admin.privacy_policy'));
});

Breadcrumbs::for('admin.terms_and_conditions', function ($trail) {
    $trail->push('Terms and Conditions', route('admin.terms_and_conditions'));
});

Breadcrumbs::for('admin.contactus_thanks', function ($trail) {
    $trail->push('Contact Us Thanks Email', route('admin.contactus_thanks'));
});


