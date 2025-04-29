'use strict';

(function ($) {

    $(document).on('click', '.layout-builder .layout-builder-toggle', function () {
        $('.layout-builder').toggleClass('show');
    });

    $(window).on('load', function () {
        setTimeout(function () {
            $('.layout-builder').removeClass('show');
        }, 500);
    });



    var site_layout = localStorage.getItem('site_layout');
    $('body').addClass(site_layout);

    $('.layout-builder .layout-builder-body input[type="radio"][data-layout="' + $('body').attr('class') + '"]').prop('checked', true);

    $('.layout-builder .layout-builder-body input[type="radio"]').click(function () {
        var class_names = '';

        $('.layout-builder .layout-builder-body input[type="radio"]:checked').each(function () {
            class_names += ' ' + $(this).data('layout');
        });

        localStorage.setItem('site_layout', class_names);

        window.location.href = (window.location.href).replace('#', '');
    });

    $(document).on('click', '#btn-layout-builder', function () {

    });

    $(document).on('click', '#btn-layout-builder-reset', function () {
        localStorage.removeItem('site_layout');
        localStorage.removeItem('site_layout_dark');

        window.location.href = (window.location.href).replace('#', '');
    });

    $(window).on('load', function () {
        if ($('body').hasClass('horizontal-side-menu') && $(window).width() > 768) {
            if ($('body').hasClass('layout-container')) {
                $('.side-menu .side-menu-body').wrap('<div class="container"></div>');
            } else {
                $('.side-menu .side-menu-body').wrap('<div class="container-fluid"></div>');
            }
            setTimeout(function () {
                $('.side-menu .side-menu-body > ul').append('<li><a href="#"><span>سایر</span></a><ul></ul></li>');
            }, 100);
            $('.side-menu .side-menu-body > ul > li').each(function () {
                var index = $(this).index(),
                    $this = $(this);
                if (index > 7) {
                    setTimeout(function () {
                        $('.side-menu .side-menu-body > ul > li:last-child > ul').append($this.clone());
                        $this.addClass('d-none');
                    }, 100);
                }
            });
        }
    });

    $(document).on('click', '[data-attr="layout-builder-toggle"]', function () {
        $('.layout-builder').toggleClass('show');
        return false;
    });

})(jQuery);

function copy2Clipboard(text){
    navigator.clipboard.writeText(text);
    swAlert('Data copied successfully');
}


const unsecuredCopyToClipboard = (text) => { const textArea = document.createElement("textarea"); textArea.value=text; document.body.appendChild(textArea);/* textArea.focus();*/textArea.select(); try{document.execCommand('copy')}catch(err){console.error('Unable to copy to clipboard',err)}document.body.removeChild(textArea)};

/**
 * Copies the text passed as param to the system clipboard
 * Check if using HTTPS and navigator.clipboard is available
 * Then uses standard clipboard API, otherwise uses fallback
 */
const copyToClipboard = (content) => {
    if (window.isSecureContext && navigator.clipboard) {
        navigator.clipboard.writeText(content);
    } else {
        unsecuredCopyToClipboard(content);
    }
};

function convertUnixTimestampToDateInput(unixTimestamp) {

    if(unixTimestamp === null){
        return null;
    }

    // Convert Unix unixTimestamp to a Date object
    const date = new Date(unixTimestamp * 1000);

    // Extract date parts and format them
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');

    // Combine parts into the desired format
    const formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;

    // console.log(formattedDate)

    return formattedDate;
}


// ---    for ripple anim    ------
