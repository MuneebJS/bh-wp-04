/**
 * Insynia Theme — Main JavaScript
 *
 * Handles:
 *  - Mobile navigation toggle (hamburger menu)
 *  - Keyboard-accessible dropdown menus
 *  - Sticky header shadow on scroll
 *  - Smooth anchor scrolling with offset for sticky header
 *
 * @package Insynia
 */

( function () {
	'use strict';

	/* ========================================================================
	   Mobile Navigation
	   ===================================================================== */

	var menuToggle = document.querySelector( '.menu-toggle' );
	var primaryMenu = document.getElementById( 'primary-menu' );

	if ( menuToggle && primaryMenu ) {
		menuToggle.addEventListener( 'click', function () {
			var isExpanded = menuToggle.getAttribute( 'aria-expanded' ) === 'true';
			menuToggle.setAttribute( 'aria-expanded', String( ! isExpanded ) );
			primaryMenu.classList.toggle( 'is-open', ! isExpanded );
		} );

		// Close menu on Escape key.
		document.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' && primaryMenu.classList.contains( 'is-open' ) ) {
				primaryMenu.classList.remove( 'is-open' );
				menuToggle.setAttribute( 'aria-expanded', 'false' );
				menuToggle.focus();
			}
		} );

		// Close menu when clicking outside.
		document.addEventListener( 'click', function ( event ) {
			var nav = document.getElementById( 'site-navigation' );
			if ( nav && ! nav.contains( event.target ) ) {
				primaryMenu.classList.remove( 'is-open' );
				menuToggle.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}

	/* ========================================================================
	   Keyboard-Accessible Sub-menus
	   ===================================================================== */

	var menuItems = document.querySelectorAll( '.main-navigation .menu-item-has-children' );

	menuItems.forEach( function ( item ) {
		var toggle = item.querySelector( 'a' );
		var subMenu = item.querySelector( '.sub-menu' );

		if ( ! toggle || ! subMenu ) {
			return;
		}

		// Toggle sub-menu on Enter/Space when focused.
		toggle.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Enter' || event.key === ' ' ) {
				// Only intercept if link has no real href destination.
				if ( toggle.getAttribute( 'href' ) === '#' ) {
					event.preventDefault();
					item.classList.toggle( 'is-open' );
				}
			}
			if ( event.key === 'ArrowDown' ) {
				event.preventDefault();
				item.classList.add( 'is-open' );
				var firstLink = subMenu.querySelector( 'a' );
				if ( firstLink ) firstLink.focus();
			}
		} );

		// Close sub-menu when focus leaves the item entirely.
		item.addEventListener( 'focusout', function ( event ) {
			if ( ! item.contains( event.relatedTarget ) ) {
				item.classList.remove( 'is-open' );
			}
		} );

		// Arrow key navigation within sub-menus.
		subMenu.addEventListener( 'keydown', function ( event ) {
			var links = Array.from( subMenu.querySelectorAll( 'a' ) );
			var idx   = links.indexOf( document.activeElement );

			if ( event.key === 'ArrowDown' ) {
				event.preventDefault();
				if ( idx < links.length - 1 ) links[ idx + 1 ].focus();
			}
			if ( event.key === 'ArrowUp' ) {
				event.preventDefault();
				if ( idx > 0 ) {
					links[ idx - 1 ].focus();
				} else {
					toggle.focus();
					item.classList.remove( 'is-open' );
				}
			}
			if ( event.key === 'Escape' ) {
				item.classList.remove( 'is-open' );
				toggle.focus();
			}
		} );
	} );

	/* ========================================================================
	   Sticky Header — Elevation Shadow on Scroll
	   ===================================================================== */

	var header = document.getElementById( 'masthead' );

	if ( header ) {
		var onScroll = function () {
			if ( window.scrollY > 8 ) {
				header.classList.add( 'is-scrolled' );
			} else {
				header.classList.remove( 'is-scrolled' );
			}
		};

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll(); // Run once on load.
	}

	/* ========================================================================
	   Smooth Scroll with Header Offset
	   ===================================================================== */

	document.querySelectorAll( 'a[href^="#"]' ).forEach( function ( anchor ) {
		anchor.addEventListener( 'click', function ( event ) {
			var targetId  = anchor.getAttribute( 'href' );
			var target    = document.querySelector( targetId );

			if ( ! target ) return;

			event.preventDefault();

			var headerHeight = header ? header.offsetHeight : 0;
			var targetTop    = target.getBoundingClientRect().top + window.scrollY - headerHeight - 16;

			window.scrollTo( {
				top:      targetTop,
				behavior: 'smooth',
			} );

			// Update URL without jumping.
			history.pushState( null, '', targetId );

			// Move focus to the target for accessibility.
			target.setAttribute( 'tabindex', '-1' );
			target.focus( { preventScroll: true } );
		} );
	} );

	/* ========================================================================
	   Comment Reply Link — Scroll into view
	   ===================================================================== */

	var commentForm = document.getElementById( 'respond' );

	if ( commentForm ) {
		document.querySelectorAll( '.comment-reply-link' ).forEach( function ( link ) {
			link.addEventListener( 'click', function () {
				// Small delay lets WordPress move the form first.
				setTimeout( function () {
					commentForm.scrollIntoView( { behavior: 'smooth', block: 'start' } );
				}, 50 );
			} );
		} );
	}

} )();
