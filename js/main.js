/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery( document ).ready( function ( $ ) {
    $( '.slider' ).slick( {
        prevArrow: '.slider-controller .prev',
        nextArrow: '.slider-controller .next',
        dots: true,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrow: false,
                    dots: false,
                    autoplay: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    } );

    $( 'ul.tabs li' ).hover( function () {
        var tab_id = $( this ).attr( 'data-tab' );

        $( 'ul.tabs li' ).removeClass( 'current' );
        $( '.tab-content' ).addClass( 'hide' );

        $( this ).addClass( 'current' );
        $( "#" + tab_id ).removeClass( 'hide' );
    } )
} );
