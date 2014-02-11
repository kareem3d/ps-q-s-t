'use strict';

/* Services */


// Demonstrate how to register services
// In this case it is a simple value service.
angular.module('qbrando.services', []).


    factory('Timer', ['$timeout', function($timeout) {

        return {

            days: 0,
            hours: 0,
            minutes: 0,
            seconds: 0,
            stopped: false,

            start: function(days, hours, minutes, seconds) {
                this.days = days;
                this.hours = hours;
                this.minutes = minutes;
                this.seconds = seconds;

                this.callTimeOut();

                console.log('asdffd');
            },

            callTimeOut: function() {

                var that = this;

                $timeout(function() {

                    that.seconds --;

                    if(that.seconds < 0) {
                        that.minutes --;
                        that.seconds = 59;
                    }

                    if(that.minutes < 0) {
                        that.hours --;
                        that.minutes = 59;
                    }

                    if(that.hours < 0) {
                        that.days --;
                        that.hours = 23;
                    }

                    if(that.days < 0) that.stopTimer();
                    else              that.callTimeOut();

                }, 1000);
            },

            stopTimer: function()
            {
                this.seconds = this.hours = this.days = this.minutes = 0;
                this.stopped = true;
            }
        }

    }]).



    factory('Sticky', function(){

        return {
            make: function(element1, element2) {
                // Check the initial Poistion of the Sticky Header
                var mainMenuTop = element1.offset().top + element1.height();

                $(window).scroll(function(){
                    if( $(window).scrollTop() > mainMenuTop ) {
                        element2.show();
                    } else {
                        element2.hide();
                    }
                });
            }
        }

    }).

    factory('Products', [function() {
    }])

    .factory('Cart', ['$resource', '$cookieStore', function( $resource, $cookieStore ) {

        return {
            add: function(product){}
        }
    }]);