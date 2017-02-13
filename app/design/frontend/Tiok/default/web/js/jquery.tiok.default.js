/*
	Author	: I.CUBE, inc.
    main jQuery widget of Hotstart/default
*/

define([
  'jquery',
  'jquery/ui'
], function($, ui){
    'use strict';

    $.widget('tiok.tiok', {

        _create: function() {
            this.initAllPages();
            this.initHomePage();
            this.initCategoryPage();
            this.initProductPage();
            this.initSearchPage();
            this.initCategorySearchPage();
            this.initShoppingCartPage();
            this.initCheckoutPage();
            this.initRegisterPage();
            this.initCustomerAccountPage();
            this.initInvoicePage();
            this.initCmsPage();
            this.initContactPage();
        },

        initAllPages: function() {
        },

        initHomePage: function() {
            
            if ($('body.cms-index-index').length) {
            }
        },

        initCategoryPage: function() {

            if ($('body.catalog-category-view').length) {
            }
        },

        initProductPage: function() {

            if ($('body.catalog-product-view').length) {
            }
        },

        initSearchPage: function() {

            if ($('body.catalogsearch-result-index').length) {
            }
        },

        initCategorySearchPage: function() {

            if ($('body.catalog-category-view').length || $('body.catalogsearch-result-index').length) {
            }
        },

        initShoppingCartPage: function() {

            if ($('body.checkout-cart-index').length) {
            }
        },

        initCheckoutPage: function() {

            if ($('body.checkout-onepage-index').length) {  
            }
        },

        initRegisterPage: function() {

            if ($('body.customer-account-create').length) {
            }
        },

		initCustomerAccountPage: function() {
			
			if( $('body.account').length ) {
			}
		},
		
		initInvoicePage: function() {
			if ($('body.sales-order-invoice').length) {
		    }
		},

        initCmsPage: function() {

            if ($('body.cms-page-view').length) {   
            }
        },
        initContactPage: function() {
	        if ($('body.contact-index-index').length) {   
            }
        }
    });

    return $.tiok.main;

});