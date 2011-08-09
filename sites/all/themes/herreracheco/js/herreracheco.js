
function initializeSlidersMenus()
{
    var sliders = {
        edificiosSlider:{
            titlesSelector: '.building-title', 
            siblingsSelectorToSlide: 'table'
        } 
    };
    
    for(slider in sliders)
    {
        var sliderMenu = sliders[slider];
         
        $(sliderMenu.titlesSelector).siblings(sliderMenu.siblingsSelectorToSlide + ':nth(0)').show();
        $( sliderMenu.titlesSelector).click(function(){
           
           
           
            $(sliderMenu.siblingsSelectorToSlide).slideUp("slow");
                        
            var siblings = $(this).siblings(sliderMenu.siblingsSelectorToSlide);
            if(!siblings.is(":visible"))
                siblings.slideDown();
                
        });
       
    }
    
   
}


initializeSlideshows = function()
{
    var slideshowSelectors = {
        frontPageSlideshow: {
            selector: '#front-page-slideshow-photo',
            options:{
                fx:     'fade', 
                speed:  'fast', 
                timeout: 3000, 
                next: '#front-page-slideshow-pager-next',
                prev: '#front-page-slideshow-pager-previous',
                cleartype: true,
                cleartypeNoBg: true,
                pagerEvent:    'click'                   
            }
            
        },
        oficinasSlideshow:{
            selector: '#offices-slideshow-photos-container',
            options:{
                
                fx:     'fade', 
                speed:  'fast', 
                timeout: 0, 
                pager:  '#offices-slideshow-pager',
                cleartype: true,
                cleartypeNoBg: true,
                pagerEvent:    'click',
                prev: '#offices-slideshow-previous',
                next: '#offices-slideshow-next',
                after: hideNextorPrevious,
                activePagerClass: 'propiedad-viewer-active-selector',
                pagerAnchorBuilder: function (idx, slide){
            
                    return '<div class="offices-slideshow-photos-selector-container"><img class="offices-slideshow-photos-selector" src="'+slide.src+'"/></div>'; 
                }
    
            }
        },
        proyectoSlideshow:{
            selector: '#proyecto-slideshow',
            options:{
                
                fx:     'fade', 
                speed:  'fast', 
                timeout: 0, 
                pager:  '#proyecto-slideshow-pager',
                cleartype: true,
                cleartypeNoBg: true,
                pagerEvent:    'click',               
                activePagerClass: 'propiedad-viewer-active-selector',
                pagerAnchorBuilder: function (idx, slide){
              
                    return '.proyecto-pager-for-'+idx; 
                }
    
            }
        },
        proyectoSlideshowPager:{
            selector: '#proyecto-slideshow-pager',
            options:{
                
                fx:     'scrollVert', 
                speed:  'slow', 
                timeout: 0, 
                rev:1,                
                cleartype: true,
                cleartypeNoBg: true,
                pagerEvent:    'click',
                prev: '#proyecto-slideshow-previous',
                next: '#proyecto-slideshow-next',
                after: hideNextorPrevious
                   
                   
            }
        }
    };
    
        
    for(key in slideshowSelectors)
    {
        var slideshowData = slideshowSelectors[key];
        var slideshow = $(slideshowData.selector);
   
        if(slideshow.length < 1)
            continue;              

        slideshow.cycle(slideshowData.options);
    }

        
};

hideNextorPrevious = function (curr, next, opts){

    var index = opts.currSlide;
    $('#offices-slideshow-previous')[index == 0 ? 'hide' : 'show']();
    $('#offices-slideshow-next')[index == opts.slideCount - 1 ? 'hide' : 'show']();   
}


initilizeVenderAlquilarOptions = function(){
    
    
    var venderResults = $('.vender-results');
    var alquilarResults = $('.alquilar-results');
    var alquilarButton =  $('#alquilar-option');
    var venderButton =  $('#vender-option');
    venderButton.click(function(){
        
        alquilarButton.removeClass('selected-option');
        $(this).addClass('selected-option');
        
        if(!venderResults.is(":visible"))
        {
            
            alquilarResults.hide("slow",function(){
                venderResults.show();
            });                        
            
        }
        
        
    });
    
    alquilarButton.click(function(){
        
        venderButton.removeClass('selected-option');
        $(this).addClass('selected-option');
        
        if(!alquilarResults.is(":visible"))
        {
            
            venderResults.hide("slow",function(){
                alquilarResults.show();
            });                        
            
        }
        
        
    });
    
};

Slider = function(parentSelector,minValue,maxValue,minInitialPosition,maxInitialPosition,minDisplaySelector,maxDisplaySelector,step){
    
    this.parent = $(parentSelector);
    this.minValue = minValue;
    this.maxValue = maxValue;
    this.minInitialValue = minInitialPosition;
    this.maxInitialValue = maxInitialPosition;
    this.minDisplay =$(minDisplaySelector);
    this.maxDisplay = $(maxDisplaySelector);
    this.step = step;
   
    
    this.minDisplay.html("$" + this.minInitialValue);
    this.maxDisplay.html("$" + this.maxInitialValue);
    
    var sliderObject = this;
    
    
                        
    $(this.parent).slider({
        range: true,
        min: minValue,
        max: maxValue,
        step:sliderObject.step,
        values: [ sliderObject.minInitialValue , sliderObject.maxInitialValue ],
        slide: function( event, ui ) {
            sliderObject.minDisplay.html( "$" + ui.values[ 0 ]);
            sliderObject.maxDisplay .html("$" + ui.values[ 1 ]);
        }
                        
    });
    
   
    this.getRange = function()
    {
        return $(sliderObject.parent).slider("values");
      
    };
   
    
    $('.ui-slider-horizontal .ui-slider-handle').width(8); 
    $('.ui-slider-horizontal .ui-slider-range').attr('left','9.75%');
} 


initializeFilter = function(){
    
    
    var minValue =  1000000;
        var maxValue = 50000000;
        var step = 1000000;
    if($.getUrlVar('condition') && $.getUrlVar('condition') == 'alquilar')
    {
         minValue =  5000;
         maxValue = 300000;
         step = 1000;
    }

    
    var initialMin = $.getUrlVar('minprice') ? $.getUrlVar('minprice') : 1000000;
    var initialMax = $.getUrlVar('maxprice') ? $.getUrlVar('maxprice') : 50000000;
    
        
    var filter = new Filter(minValue,maxValue,initialMin,initialMax,step);
}


Filter = function (sliderMin,sliderMax,sliderMinInitial,sliderMaxInitial,step){
    
    this.sliderMin = sliderMin;
    this.sliderMax = sliderMax;
    this.sliderMinInitial = sliderMinInitial;
    this.sliderMaxInitial = sliderMaxInitial;
    this.sliderParentSelector = "#filter-slider";
    this.comprarButton =  $('#filter-comprar-option');
    this.alquilarButton =  $('#filter-alquilar-option');
    this.propertyType = $('#filter-property-type');
    this.propertyState = $('#filter-property-state');   
    this.intialStep = step;
    this.searchButton = $('#filter-search-button');
    this.slider = new Slider('#filter-slider',this.sliderMin,this.sliderMax,this.sliderMinInitial,this.sliderMaxInitial,"#filter-slider-min","#filter-slider-max",this.intialStep);
    var filter = this;


    
    this.clickFunctionality= function(button,min,max,step){
        $('.filter-alquilar-comprar-option').removeClass('filter-selected-option');
        $(button).addClass('filter-selected-option');
        $('#filter-slide').html('');
        filter.slider = new Slider('#filter-slider', min, max, min, max, "#filter-slider-min", "#filter-slider-max",step);
    }
    
 
    
    this.comprarButton.click(function(){
        filter.clickFunctionality(this,1000000,50000000,1000000);
    });
    
    this.alquilarButton.click(function(){
        filter.clickFunctionality(this,5000,300000,1000);
    });
    
    
    this.searchButton.click(function(){
        var propertyType = filter.propertyType.val();
        var minPrice = filter.slider.getRange()[0];
        var maxPrice = filter.slider.getRange()[1];
        var propertyState = filter.propertyState.val();
        var propertyCondition = filter.comprarButton.hasClass('filter-selected-option')? 'comprar' : 'alquilar';
        window.location.href = '/buscar-proyectos' + '?type='+ propertyType + '&minprice=' + minPrice + '&maxprice=' + maxPrice + '&state=' + propertyState + '&type=' + propertyType + "&condition=" + propertyCondition;
    });
    
}


extendJqueryWithGetVars = function(){
    $.extend({
        getUrlVars: function(){
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        },
        getUrlVar: function(name){
            return $.getUrlVars()[name];
        }
    });
};

drawGoogleMap = function(parentSelector, latitude, longitude, markerTitle){
    var latlng = new google.maps.LatLng(latitude, longitude);
    var myOptions = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById(parentSelector), myOptions);
    
    markerTitle = markerTitle || '';
    
    var marker = new google.maps.Marker({
        position: latlng, 
        map: map, 
        title: markerTitle
    });   
    
    
    
    
};

drawOficinasMap = function()
{
//    if($('#contactos-localizacion').length > 0)
//        drawGoogleMap('#contactos-localizacion',19.454433,-70.697630);
}


$(document).ready(function(){
    extendJqueryWithGetVars();
    initializeSlideshows();
    initializeSlidersMenus();
    initilizeVenderAlquilarOptions();
    initializeFilter();
    drawOficinasMap();
   
});
