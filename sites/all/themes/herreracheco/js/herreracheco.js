
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
            
                    return '#proyecto-slideshow-pager img:nth('+idx+')'; 
                }
    
            }
        },
        proyectoSlideshowPager:{
            selector: '#proyecto-slideshow-pager',
            options:{
                
                fx:     'fade', 
                speed:  'fast', 
                timeout: 0,                 
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
            
            alquilarResults.hide("slow",function(){venderResults.show();});                        
            
        }
        
        
    });
    
    alquilarButton.click(function(){
        
        venderButton.removeClass('selected-option');
        $(this).addClass('selected-option');
        
        if(!alquilarResults.is(":visible"))
        {
            
            venderResults.hide("slow",function(){alquilarResults.show();});                        
            
        }
        
        
    });
    
};

$(document).ready(function(){
    initializeSlideshows();
    initializeSlidersMenus();
    initilizeVenderAlquilarOptions();
   
});
