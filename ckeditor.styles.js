/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * The 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */
if(typeof(CKEDITOR) !== 'undefined') {
    CKEDITOR.addStylesSet( 'drupal',
    [
            /* Block Styles */

            // These styles are already available in the "Format" drop-down list, so they are
            // not needed here by default. You may enable them to avoid placing the
            // "Format" drop-down list in the toolbar, maintaining the same features.
            /*
            { name : 'Paragraph'		, element : 'p' },
            { name : 'Heading 1'		, element : 'h1' },
            { name : 'Heading 2'		, element : 'h2' },
            { name : 'Heading 3'		, element : 'h3' },
            { name : 'Heading 4'		, element : 'h4' },
            { name : 'Heading 5'		, element : 'h5' },
            { name : 'Heading 6'		, element : 'h6' },
            { name : 'Preformatted Text', element : 'pre' },
            { name : 'Address'			, element : 'address' },
            */

            /* Inline Styles */

            // These are core styles available as toolbar buttons. You may opt enabling
            // some of them in the "Styles" drop-down list, removing them from the toolbar.
            /*
            { name : 'Strong'			, element : 'strong', overrides : 'b' },
            { name : 'Emphasis'			, element : 'em'	, overrides : 'i' },
            { name : 'Underline'		, element : 'u' },
            { name : 'Strikethrough'	, element : 'strike' },
            { name : 'Subscript'		, element : 'sub' },
            { name : 'Superscript'		, element : 'sup' },
            */

            { name : 'Marker: Yellow'	, element : 'span', styles : { 'background-color' : 'Yellow' } },
            { name : 'Marker: Green'	, element : 'span', styles : { 'background-color' : 'Lime' } },

            { name : 'Big'				, element : 'big' },
            { name : 'Small'			, element : 'small' },
            { name : 'Typewriter'		, element : 'tt' },

            { name : 'Computer Code'	, element : 'code' },
            { name : 'Keyboard Phrase'	, element : 'kbd' },
            { name : 'Sample Text'		, element : 'samp' },
            { name : 'Variable'			, element : 'var' },

            { name : 'Deleted Text'		, element : 'del' },
            { name : 'Inserted Text'	, element : 'ins' },

            { name : 'Cited Work'		, element : 'cite' },
            { name : 'Inline Quotation'	, element : 'q' },

            { name : 'Language: RTL'	, element : 'span', attributes : { 'dir' : 'rtl' } },
            { name : 'Language: LTR'	, element : 'span', attributes : { 'dir' : 'ltr' } },

            /* Object Styles */

            {
                name : 'Image on Left',
                element : 'img',
                attributes :
                {
                    'style' : 'padding: 5px; margin-right: 5px',
                    'border' : '2',
                    'align' : 'left'
                }
            },
            {
                name : 'Image on Right',
                element : 'img',
                attributes :
                {
                    'style' : 'padding: 5px; margin-left: 5px',
                    'border' : '2',
                    'align' : 'right'
                }
            },

            {
                name : 'Цифра из Топ5',
                element : 'p',
                attributes :
                {
                    'class' : 'numeral'
                }
            },
            {
                name : 'Заголовок из Топ5',
                element : 'h2',
                attributes :
                {
                    'class' : 'numeral-title'
                }
            },
            {
                name : 'Вступительное слово',
                element : 'p',
                attributes :
                {
                    'class' : 'introduction'
                }
            },
            {
                name : 'Изящный разделитель',
                element : 'p',
                attributes :
                {
                    'class' : 'elegant'
                }
            },
            {
                name : 'Большая цитата',
                element : 'div',
                attributes :
                {
                    'class' : 'big-quotation'
                }
            },
            {
                name : 'Подпись к цитате',
                element : 'div',
                attributes :
                {
                    'class' : 'big-signature'
                }
            },

    ]);
}