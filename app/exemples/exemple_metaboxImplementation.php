<?php
// Include the Odin_Metabox class.
Load(["Metabox"]);



    $videos_metabox = new Odin_Metabox(
            'videos', // Slug/ID of the Metabox (Required)
            'Videos Configuration', // Metabox name (Required)
            'post', // Slug of Post Type (Optional)
            'normal', // Context (options: normal, advanced, or side) (Optional)
            'high' // Priority (options: high, core, default or low) (Optional)
    );

    $videos_metabox->set_fields(
            array(
                /**
                 * Default input examples.
                 */
                // Text Field.
                array(
                    'id' => 'test_text', // Required
                    'label' => __('Test Text', 'odin'), // Required
                    'type' => 'text', // Required
                    'attributes' => array(// Optional (html input elements)
                        'placeholder' => __('Some text here!')
                    ),
                    // 'default'  => 'Default text', // Optional
                    'description' => __('Text field description', 'odin') // Optional
                ),
                // Textarea Field.
                array(
                    'id' => 'test_textarea', // Required
                    'label' => __('Test Textarea', 'odin'), // Required
                    'type' => 'textarea', // Required
                    'attributes' => array(// Optional (html input elements)
                        'placeholder' => __('Some text here!')
                    ),
                    // 'default'  => 'Default text', // Optional
                    'description' => __('Textaera field description', 'odin') // Optional
                ),
                // Checkbox field.
                array(
                    'id' => 'test_checkbox', // Required
                    'label' => __('Test Checkbox', 'odin'), // Required
                    'type' => 'checkbox', // Required
                    // 'attributes' => array(), // Optional (html input elements)
                    // 'default'    => '', // Optional (1 for checked)
                    'description' => __('Checkbox field description', 'odin'), // Optional
                ),
                // Select field.
                array(
                    'id' => 'test_select', // Required
                    'label' => __('Test Select', 'odin'), // Required
                    'type' => 'select', // Required
                    // 'attributes' => array(), // Optional (html input elements)
                    // 'default'    => 'three', // Optional
                    'description' => __('Select field description', 'odin'), // Optional
                    'options' => array(// Required (id => title)
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    ),
                ),
                // Radio field.
                array(
                    'id' => 'test_radio', // Required
                    'label' => __('Test Radio', 'odin'), // Required
                    'type' => 'radio', // Required
                    // 'attributes' => array(), // Optional (html input elements)
                    // 'default'    => 'three', // Optional
                    'description' => __('Radio field description', 'odin'), // Optional
                    'options' => array(// Required (id => title)
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    ),
                ),
                // Editor field.
                array(
                    'id' => 'test_editor', // Required
                    'label' => __('Test Editor', 'odin'), // Required
                    'type' => 'editor', // Required
                    // 'default'     => 'Default text', // Optional
                    'description' => __('Editor field description', 'odin'), // Optional
                    'options' => array(// Optional
                        // Arguments of wp_editor().
                        // See more http://codex.wordpress.org/Function_Reference/wp_editor
                        'textarea_rows' => 10
                    ),
                ),
                // Image field.
                array(
                    'id' => 'test_image', // Required
                    'label' => __('Test Image', 'odin'), // Required
                    'type' => 'image', // Required
                    // 'default'     => '', // Optional (image attachment id)
                    'description' => __('Image field description', 'odin'), // Optional
                ),
                // Image Plupload field.
                array(
                    'id' => 'test_image_plupload', // Required
                    'label' => __('Test Image Plupload', 'odin'), // Required
                    'type' => 'image_plupload', // Required
                    // 'default'     => '', // Optional (image attachment ids separated with comma)
                    'description' => __('Image Plupload field description', 'odin'), // Optional
                ),
                // Upload field.
                array(
                    'id' => 'test_upload', // Required
                    'label' => __('Test Upload', 'odin'), // Required
                    'type' => 'upload', // Required
                    // 'attributes' => array(), // Optional (html input elements)
                    // 'default'    => '', // Optional (file url)
                    'description' => __('Upload field description', 'odin'), // Optional
                ),
                // Color field.
                array(
                    'id' => 'test_color', // Required
                    'label' => __('Test Color', 'odin'), // Required
                    'type' => 'color', // Required
                    // 'attributes' => array(), // Optional (html input elements)
                    'default' => '#ffffff', // Optional (color in hex)
                    'description' => __('Color field description', 'odin'), // Optional
                ),
                // Generic input field.
                array(
                    'id' => 'test_input', // Required
                    'label' => __('Test Input', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('Textaera field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                    )
                ),
                // Separator.
                array(
                    'id' => 'separator1', // Obrigatório
                    'type' => 'separator' // Obrigatório
                ),
                // Title.
                array(
                    'id' => 'test_title', // Required
                    'label' => __('Test Title', 'odin'), // Required
                    'type' => 'title', // Required
                ),
                /**
                 * HTML 5 examples
                 */
                // HTML5 color field.
                array(
                    'id' => 'test_html5_color', // Required
                    'label' => __('Test HTML5 color', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 color field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'color'
                    )
                ),
                // HTML5 date field.
                array(
                    'id' => 'test_html5_date', // Required
                    'label' => __('Test HTML5 date', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 date field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'date'
                    )
                ),
                // HTML5 datetime field.
                array(
                    'id' => 'test_html5_datetime', // Required
                    'label' => __('Test HTML5 datetime', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 datetime field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'datetime'
                    )
                ),
                // HTML5 datetime-local field.
                array(
                    'id' => 'test_html5_datetime_local', // Required
                    'label' => __('Test HTML5 datetime-local', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 datetime-local field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'datetime-local'
                    )
                ),
                // HTML5 email field.
                array(
                    'id' => 'test_html5_email', // Required
                    'label' => __('Test HTML5 email', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 email field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'email'
                    )
                ),
                // HTML5 month field.
                array(
                    'id' => 'test_html5_month', // Required
                    'label' => __('Test HTML5 month', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 month field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'month'
                    )
                ),
                // HTML5 number field.
                array(
                    'id' => 'test_html5_number', // Required
                    'label' => __('Test HTML5 number', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 number field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'number',
                        'max' => 6,
                        'min' => 1
                    )
                ),
                // HTML5 range field.
                array(
                    'id' => 'test_html5_range', // Required
                    'label' => __('Test HTML5 range', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 range field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'range',
                        'max' => 6,
                        'min' => 1
                    )
                ),
                // HTML5 search field.
                array(
                    'id' => 'test_html5_search', // Required
                    'label' => __('Test HTML5 search', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 search field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'search'
                    )
                ),
                // HTML5 tel field.
                array(
                    'id' => 'test_html5_tel', // Required
                    'label' => __('Test HTML5 tel', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 tel field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'tel'
                    )
                ),
                // HTML5 time field.
                array(
                    'id' => 'test_html5_time', // Required
                    'label' => __('Test HTML5 time', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 time field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'time'
                    )
                ),
                // HTML5 url field.
                array(
                    'id' => 'test_html5_url', // Required
                    'label' => __('Test HTML5 url', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 url field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'url'
                    )
                ),
                // HTML5 week field.
                array(
                    'id' => 'test_html5_week', // Required
                    'label' => __('Test HTML5 week', 'odin'), // Required
                    'type' => 'input', // Required
                    // 'default'  => 'Default text', // Optional
                    'description' => __('HTML5 week field description', 'odin'), // Optional
                    'attributes' => array(// Optional (html input elements)
                        'type' => 'week'
                    )
                ),
            )
    );



