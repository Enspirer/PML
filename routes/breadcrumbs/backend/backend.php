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

Breadcrumbs::for('admin.free_listning.index', function ($trail) {
    $trail->push('Free Listning', route('admin.free_listning.index'));
});
Breadcrumbs::for('admin.free_listning.edit', function ($trail) {
    $trail->push('Edit', route('admin.free_listning.edit',1));
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
    $trail->push('Industry', route('admin.category.index'));
});
Breadcrumbs::for('admin.category.edit', function ($trail) {
    $trail->push('Edit Industry', route('admin.category.edit',1));
});

Breadcrumbs::for('admin.post.index', function ($trail) {
    $trail->push('Articles', route('admin.post.index'));
});
Breadcrumbs::for('admin.post.create', function ($trail) {
    $trail->push('Create Articles', route('admin.post.create'));
});
Breadcrumbs::for('admin.post.edit', function ($trail) {
    $trail->push('Edit Articles', route('admin.post.edit',1));
});

Breadcrumbs::for('admin.property_news.index', function ($trail) {
    $trail->push('Prtoperty News', route('admin.property_news.index'));
});
Breadcrumbs::for('admin.property_news.create', function ($trail) {
    $trail->push('Create Prtoperty News', route('admin.property_news.create'));
});
Breadcrumbs::for('admin.property_news.edit', function ($trail) {
    $trail->push('Edit Prtoperty News', route('admin.property_news.edit',1));
});

Breadcrumbs::for('admin.sidebar_ad.index', function ($trail) {
    $trail->push('Home Page Advertisement', route('admin.sidebar_ad.index'));
});
Breadcrumbs::for('admin.property_page_ad.index', function ($trail) {
    $trail->push('Property Page Advertisement', route('admin.property_page_ad.index'));
});
Breadcrumbs::for('admin.agents_page_ad.index', function ($trail) {
    $trail->push('Agents Page Advertisement', route('admin.agents_page_ad.index'));
});
Breadcrumbs::for('admin.solo_property_ad.index', function ($trail) {
    $trail->push('Individual Property Page Advertisement', route('admin.solo_property_ad.index'));
});
Breadcrumbs::for('admin.solo_agent_ad.index', function ($trail) {
    $trail->push('Individual Agent Page Advertisement', route('admin.solo_agent_ad.index'));
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

Breadcrumbs::for('admin.search.index', function ($trail) {
    $trail->push('Search', route('admin.search.index'));
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

Breadcrumbs::for('admin.location.index', function ($trail) {
    $trail->push('Location Area', route('admin.location.index'));
});
Breadcrumbs::for('admin.location.create', function ($trail) {
    $trail->push('Create Location Area', route('admin.location.create'));
});
Breadcrumbs::for('admin.location.edit', function ($trail) {
    $trail->push('Edit Location Area', route('admin.location.edit',1));
});

Breadcrumbs::for('admin.sold_properties.index', function ($trail) {
    $trail->push('Sold Properties Request', route('admin.sold_properties.index'));
});
Breadcrumbs::for('admin.sold_properties.edit', function ($trail) {
    $trail->push('Approval', route('admin.sold_properties.edit',1));
});


Breadcrumbs::for('admin.home_page_features.create', function ($trail) {
    $trail->push('Home Page Features', route('admin.home_page_features.create'));
});
Breadcrumbs::for('admin.home_page_latest.create', function ($trail) {
    $trail->push('Home Page Latest', route('admin.home_page_latest.create'));
});

Breadcrumbs::for('admin.pro_tal_settings', function ($trail) {
    $trail->push('Home Featured', route('admin.pro_tal_settings'));
});

Breadcrumbs::for('admin.homeloan_ad.index', function ($trail) {
    $trail->push('Blog Page', route('admin.homeloan_ad.index'));
});

Breadcrumbs::for('admin.property.property_nearby_index', function ($trail) {
    $trail->push('Nearest Places', route('admin.property.property_nearby_index',1));
});

Breadcrumbs::for('admin.subscribed_emails.index', function ($trail) {
    $trail->push('Subscribed Emails', route('admin.subscribed_emails.index'));
});


Breadcrumbs::for('admin.tips_for_buyers', function ($trail) {
    $trail->push('Tips for buyers', route('admin.tips_for_buyers'));
});
Breadcrumbs::for('admin.tips_for_sellers', function ($trail) {
    $trail->push('Tips for sellers', route('admin.tips_for_sellers'));
});
Breadcrumbs::for('admin.commercial_resources', function ($trail) {
    $trail->push('Commercial Resources', route('admin.commercial_resources'));
});
Breadcrumbs::for('admin.marketing_services', function ($trail) {
    $trail->push('Marketing Services', route('admin.marketing_services'));
});

Breadcrumbs::for('admin.watermark', function ($trail) {
    $trail->push('Watermark', route('admin.watermark'));
});
