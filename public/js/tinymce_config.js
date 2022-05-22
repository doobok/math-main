
function tinymce_init_callback(editor) {
    editor.remove();
    editor = null;

    tinymce.init({
        menubar: false,
        selector: 'textarea.richTextBox',
        skin_url: $('meta[name="assets-path"]').attr('content')+'?path=js/skins/voyager',
        min_height: 100,
        height: 500,
        resize: 'vertical',
        inline_styles: false,
        keep_styles: false,
        plugins: 'link, image, code, table, lists',
        extended_valid_elements : 'input[id|name|value|type|class|required|placeholder|autocomplete|onclick]',

        file_browser_callback: function (field_name, url, type, win) {
            if (type == 'image') {
                $('#upload_file').trigger('click');
            }
        },
        toolbar: 'styleselect bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code',
        convert_urls: false,
        image_caption: true,
        image_title: true,
        paste_as_text: true,
        valid_elements: 'p[*],ul[*],li[*],ol[*],hr,br,img[*],-b,-i,-u,-h2,-h3,-h4,-h5,-h6',
        valid_children: '+li[p]',
        external_plugins: {
            // 'latex': '/tinymce-plugins/latex/plugin.js',
        },
    });
}
