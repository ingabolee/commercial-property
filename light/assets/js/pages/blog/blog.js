$(window).on('scroll',function() {
    $('.card .sparkline').each(function(){
    var imagePos = $(this).offset().top;

    var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+400) {
            $(this).addClass("pullUp");
        }
    });
});


$(function() {
    "use strict";

    $('.count-to').countTo();

    setTimeout(function(){
        $(document).ready(function(){
            // Popular Categories
            var chart = c3.generate({
                bindto: '#c3chart-Categories', // id of chart wrapper   
                data: {
                    columns: [
                        // each columns data
                        ['data1', 2,5,6,8,1,3,5,4,9,5,2,6],
                        ['data2', 5,4,1,2,3,6,9,8,5,2,1,5],
                        ['data3', 4,7,8,9,7,8,4,8,7,9,4,5],
                        ['data4', 2,1,5,6,3,2,6,5,1,2,3,2],
                    ],
                    type: 'line', // default type of chart
                    colors: {
                        'data1': '#e96875',
                        'data2': '#ff9e47',
                        'data3': '#62bad9',
                        'data4': '#7e6990'
                    },
                    names: {
                        // name of each serie
                        'data1': 'Web',
                        'data2': 'Mobile',
                        'data3': 'Sports',
                        'data4': 'Lifestyle',
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sept','Oct','Nov','Dec']
                    },
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
        // Browser Usage
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#c3chart-Browser-Usage', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 40],
                        ['data2', 10],
                        ['data3', 35],
                        ['data4', 15],
                    ],
                    type: 'donut', // default type of chart
                    colors: {
                        'data1': '#e96875',
                        'data2': '#ff9e47',
                        'data3': '#62bad9',
                        'data4': '#7e6990'
                    },
                    names: {
                        // name of each serie
                        'data1': 'Chrome',
                        'data2': 'Safari',
                        'data3': 'Firefox',
                        'data4': 'Edge',
                    }
                },
                axis: {
                },
                legend: {
                    show: true, //hide legend
                    position: 'bottom'
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
    }, 100);
    
    // Visitors Statistics
    $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: 'transparent',
        showTooltip: true,        

        regionStyle: {
            initial: {
                fill: 'rgba(210, 214, 222, 1)',
                "fill-opacity": 1,
                stroke: 'none',
                "stroke-width": 0,
                "stroke-opacity": 1
            },
            hover: {
                fill: 'rgba(255, 193, 7, 2)',
                cursor: 'pointer'
            },
            selected: {
                fill: 'yellow'
            },
            selectedHover: {}
        },
        markerStyle: {
            initial: {
                fill: '#fff',
                stroke: '#FFC107 '
            }
        },
        markers: [
            { latLng: [37.09,-95.71], name: 'America' },
            { latLng: [51.16,10.45], name: 'Germany' },
            { latLng: [-25.27, 133.77], name: 'Australia' },
            { latLng: [56.13,-106.34], name: 'Canada' },
            { latLng: [20.59,78.96], name: 'India' },
            { latLng: [55.37,-3.43], name: 'United Kingdom' },
        ]
    });
    $('#usa').vectorMap({
        map : 'us_aea_en',
        backgroundColor : 'transparent',
        regionStyle : {
            initial : {
                fill : '#72c2ff'
            }
        }
    });
});