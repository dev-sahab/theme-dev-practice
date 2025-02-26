<?php

/** Techub Global Panel */
new \Kirki\Panel(
    'techub_global_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__('Global', 'techub'),
        'description' => esc_html__('Global Settings and Options', 'techub'),
    ]
);


/** Global Contact Info Section */
function GlobalContactsSection()
{
    new \Kirki\Section(
        'techub_contact_section',
        [
            'title'       => esc_html__('Contact Info', 'techub'),
            'description' => esc_html__('There user can set social links.', 'techub'),
            'panel'       => 'techub_global_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'address',
            'label'    => esc_html__('Address', 'techub'),
            'section'  => 'techub_contact_section',
            'default'  => esc_html__('Manchester 21, Zurich, CH', 'techub'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'address_url',
            'label'    => esc_html__('Address URL', 'techub'),
            'section'  => 'techub_contact_section',
            'default'  => esc_html__('#', 'techub'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'email_address',
            'label'    => esc_html__('Email Address', 'techub'),
            'section'  => 'techub_contact_section',
            'default'  => esc_html__('techubinfo@mail.com', 'techub'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'phone_number',
            'label'    => esc_html__('Phone Number', 'techub'),
            'section'  => 'techub_contact_section',
            'default'  => esc_html__('(+00) 678 345 98568', 'techub'),
            'priority' => 10,
        ]
    );
}
GlobalContactsSection();
/** Global Social Section */
function GlobalSocialSection()
{

    new \Kirki\Section(
        'techub_social_section',
        [
            'title'       => esc_html__('Social Links', 'techub'),
            'description' => esc_html__('There user can set social links.', 'techub'),
            'panel'       => 'techub_global_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'facebook_url',
            'label'    => esc_html__('Facebook', 'techub'),
            'section'  => 'techub_social_section',
            'default'  => esc_html__('#', 'techub'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'instagram_url',
            'label'    => esc_html__('Instagram', 'techub'),
            'section'  => 'techub_social_section',
            'default'  => esc_html__('#', 'techub'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'x_url',
            'label'    => esc_html__('X-Twitter', 'techub'),
            'section'  => 'techub_social_section',
            'default'  => esc_html__('#', 'techub'),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'linkedin_url',
            'label'    => esc_html__('LinkedIn', 'techub'),
            'section'  => 'techub_social_section',
            'default'  => esc_html__('#', 'techub'),
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'pinterest_url',
            'label'    => esc_html__('Pinterest', 'techub'),
            'section'  => 'techub_social_section',
            'default'  => esc_html__('#', 'techub'),
            'priority' => 10,
        ]
    );
}
GlobalSocialSection();


/** Techub Header Panel */
new \Kirki\Panel(
    'techub_header_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__('Header Options', 'techub'),
        'description' => esc_html__('Set your header style', 'techub'),
    ]
);

/** Topbar Section function */
function TopHeaderSection()
{
    // Topbar section
    new \Kirki\Section(
        'techub-topbar-section',
        [
            'title'       => esc_html__('Topbar', 'techub'),
            'description' => esc_html__('There is topbar settings options.', 'techub'),
            'panel'       => 'techub_header_panel',
            'priority'    => 160,
        ]
    );

    // topbar enable/disable switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'topbar-switch',
            'label'       => esc_html__('Topbar', 'techub'),
            'description' => esc_html__('Topbar switch control', 'techub'),
            'section'     => 'techub-topbar-section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'techub'),
                'off' => esc_html__('Disable', 'techub'),
            ],
        ]
    );

    // topbar background color
    new \Kirki\Field\Color(
        [
            'settings'    => 'topbar_background_color',
            'label'       => __('Topbar Background Color', 'techub'),
            'description' => esc_html__('Color Control (hex only).', 'techub'),
            'section'     => 'techub-topbar-section',
            'default'     => '#212e44',
        ]
    );
}
TopHeaderSection();

/** Main Header Section */
function MainHeaderSection()
{
    // Main Header section
    new \Kirki\Section(
        'techub_main_header_section',
        [
            'title'       => esc_html__('Main Header', 'techub'),
            'description' => esc_html__('You can change here your website header logo', 'techub'),
            'panel'       => 'techub_header_panel',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Select(
        [
            'settings'    => 'header_type',
            'label'       => esc_html__('Select Header', 'kirki'),
            'section'     => 'techub_main_header_section',
            'default'     => 'header-1',
            'placeholder' => esc_html__('Choose a Header', 'kirki'),
            'choices'     => [
                'header-1' => esc_html__('Header 1', 'kirki'),
                'header-2' => esc_html__('Header 2', 'kirki'),
            ],
        ]
    );

    // Logo upload field
    new \Kirki\Field\Image(
        [
            'settings'    => 'header-logo',
            'label'       => esc_html__('Header Logo', 'techub'),
            'description' => esc_html__('Set your header logo', 'techub'),
            'section'     => 'techub_main_header_section',
            'default'     => get_template_directory_uri() . "/assets/img/logo/logo-black.svg",
        ]
    );

    // Logo width slider input field
    new \Kirki\Pro\Field\InputSlider(
        [
            'settings'    => 'header_logo_width',
            'label'       => esc_html__('Responsive Slider Control', 'techub'),
            'section'     => 'techub_main_header_section',
            'transport'   => 'postMessage',
            'default'     => '120px',
            'choices'     => [
                'min'  => 80,
                'max'  => 250,
                'step' => 1,
            ],
        ]
    );

    // header right section enable/disable switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'right_header_section',
            'label'       => esc_html__('Header Right Section', 'techub'),
            'description' => esc_html__('Header right section switch control', 'techub'),
            'section'     => 'techub_main_header_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'techub'),
                'off' => esc_html__('Disable', 'techub'),
            ],
        ]
    );

    // search enable/disable switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_search_switch',
            'label'       => esc_html__('Search icon', 'techub'),
            'description' => esc_html__('Search icon switch control', 'techub'),
            'section'     => 'techub_main_header_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'techub'),
                'off' => esc_html__('Disable', 'techub'),
            ],
        ]
    );

    // header button text field
    new \Kirki\Field\Text(
        [
            'settings' => 'header_button_text',
            'label'    => esc_html__('Button Text', 'techub'),
            'section'  => 'techub_main_header_section',
            'default'  => esc_html__('Get a Quete', 'techub'),
            'priority' => 10,
        ]
    );

    // header button url field
    new \Kirki\Field\Text(
        [
            'settings' => 'header_button_url',
            'label'    => esc_html__('Button URL', 'techub'),
            'section'  => 'techub_main_header_section',
            'default'  => esc_html__('#', 'techub'),
            'priority' => 10,
        ]
    );

    // breadcrumb section
    new \Kirki\Section(
        'techub_breadcrumb_section',
        [
            'title'       => esc_html__('Breadcrumb', 'techub'),
            'description' => esc_html__('You can change here your website breadcrumb options', 'techub'),
            'panel'       => 'techub_header_panel',
            'priority'    => 160,
        ]
    );
    // background upload field
    new \Kirki\Field\Image(
        [
            'settings'    => 'breadcrumb_bg_img',
            'label'       => esc_html__('Breadcrumb Background', 'techub'),
            'description' => esc_html__('Set your breadcrumb background', 'techub'),
            'section'     => 'techub_breadcrumb_section',
            'default'     => get_template_directory_uri() . "/assets/img/blog/blog-sidebar-bg.jpg",
        ]
    );
}

MainHeaderSection();

function offcanvas_header_section()
{
    // Offcanvas Header section
    new \Kirki\Section(
        'techub_offcanvas_header_section',
        [
            'title'       => esc_html__('Offcanvas Header', 'techub'),
            'description' => esc_html__('Mobile Menu Header Section', 'techub'),
            'panel'       => 'techub_header_panel',
            'priority'    => 160,
        ]
    );

    // Logo upload field
    new \Kirki\Field\Image(
        [
            'settings'    => 'offcanvas_logo',
            'label'       => esc_html__('Mobile Menu Logo', 'techub'),
            'description' => esc_html__('Set mobile menu logo', 'techub'),
            'section'     => 'techub_offcanvas_header_section',
            'default'     => get_template_directory_uri() . "/assets/img/logo/logo.png",
        ]
    );

    // Logo width slider input field
    new \Kirki\Field\Slider(
        [
            'settings'    => 'offcanvas_logo_width',
            'label'       => esc_html__('Logo Width Control', 'techub'),
            'section'     => 'techub_offcanvas_header_section',
            'default'     => '150',
            'choices'     => [
                'min'  => 80,
                'max'  => 250,
                'step' => 1,
            ],
        ]
    );

    // header button url field
    new \Kirki\Field\Textarea(
        [
            'settings' => 'offcanvas_header_content',
            'label'    => esc_html__('Text', 'techub'),
            'section'  => 'techub_offcanvas_header_section',
            'default'  => esc_html__('Techub is the partner of choice for many of the world’s leading enterprises. We help businesses development.', 'techub'),
            'priority' => 10,
        ]
    );

    // offcanvas contact info swith
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'offcanvas_contact_info_switch',
            'label'       => esc_html__('Contact Info', 'techub'),
            'description' => esc_html__('Contact info switch control', 'techub'),
            'section'     => 'techub_offcanvas_header_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'techub'),
                'off' => esc_html__('Disable', 'techub'),
            ],
        ]
    );
    // offcanvas social links swith
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'offcanvas_social_links_switch',
            'label'       => esc_html__('Social Links', 'techub'),
            'description' => esc_html__('Social links switch control', 'techub'),
            'section'     => 'techub_offcanvas_header_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__('Enable', 'techub'),
                'off' => esc_html__('Disable', 'techub'),
            ],
        ]
    );
}
offcanvas_header_section();


/** Techub Header Panel */
new \Kirki\Panel(
    'techub_footer_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__('Footer', 'techub'),
        'description' => esc_html__('Footer settings', 'techub'),
    ]
);
function footer_section()
{
    // Offcanvas Header section
    new \Kirki\Section(
        'techub_footer_section',
        [
            'title'       => esc_html__('Copyright', 'techub'),
            'description' => esc_html__('Mobile Menu Header Section', 'techub'),
            'panel'       => 'techub_footer_panel',
            'priority'    => 160,
        ]
    );

    // footer background image field
    new \Kirki\Field\Image(
        [
            'settings'    => 'footer_background_image',
            'label'       => esc_html__('Footer Background', 'techub'),
            'description' => esc_html__('Set footer background image', 'techub'),
            'section'     => 'techub_footer_section',
            'default'     => '',
        ]
    );
    // footer copyright text field
    new \Kirki\Field\Textarea(
        [
            'settings' => 'copyright_text',
            'label'    => esc_html__('Copyright', 'techub'),
            'section'  => 'techub_footer_section',
            'default'  => esc_html__('Full Copyright & Design By <a href="#">@ Theme pure</a> – 2024', 'techub'),
            'priority' => 10,
        ]
    );
}
footer_section();
