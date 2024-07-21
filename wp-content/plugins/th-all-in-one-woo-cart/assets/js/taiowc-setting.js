(function ($){
    var TAIOWCsettingLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
          var $this = this;
            $this.SettingTab();
            $this.ColorPickr();
            $this.ImageAdd();
            $this.SaveSetting();
            $this.ChangeSettinghideshow();
        },
        SettingTab: function (){
          $(document).ready(function(){ 
                  $('#taiowc').on('click', '.nav-tab', function (event){
                  event.preventDefault()
                  var target = $(this).data('target')
                  $(this).addClass('nav-tab-active').siblings().removeClass('nav-tab-active')
                  $('#' + target).show().siblings().hide()
                  $('#_last_active_tab').val(target)
                  if ($("a[data-target='taiowc_style']").hasClass('nav-tab-active')){
                         $('.setting-preview-wrap').show();
                    }else{
                         $('.setting-preview-wrap').hide();
                    }
                  if ($("a[data-target='taiowc_reset']").hasClass('nav-tab-active')){
                        $('a.reset').show();
                        $('button#submit').hide();
                  }else{
                       $('a.reset').hide();
                       $('button#submit').show();

                  }

                });
             });
        },
       
        ColorPickr: function () {
            function myColorPicker() {
              let value_ = this;
              const inputElement = $(value_);
              const defaultColor = inputElement.css("background-color");
              const pickr = new Pickr({
                el: value_,
                useAsButton: true,
                default: defaultColor,
                theme: "nano", // or 'monolith', or 'nano'
                swatches: [
                  "rgba(244, 67, 54, 1)",
                  "rgba(233, 30, 99, 0.95)",
                  "rgba(156, 39, 176, 0.9)",
                  "rgba(103, 58, 183, 0.85)",
                  "rgba(63, 81, 181, 0.8)",
                  "rgba(33, 150, 243, 0.75)",
                  "rgba(255, 193, 7, 1)",
                ],
                components: {
                  preview: true,
                  opacity: true,
                  hue: true,
                  interaction: {
                    input: true,
                  },
                },
              })
                .on("change", (color, instance) => {
                  let color_ = color.toRGBA().toString(0);
                  // preview css on input editor item
                  inputElement.css("background-color", color_);
                  // apply color on selected item
                  inputElement.val(color_);
                  //_this.onColorChangeHandler(inputElement,color_);
                  //save button active
                  $("#submit").removeAttr("disabled");
                })
                .on("init", (instance) => {
                  $(instance._root.app).addClass("visible");
                })
                .on("hide", (instance) => {
                  instance._root.app.remove();
                });
            }
            $(document).on("click", "input.color_picker", myColorPicker);
          },
          
        ImageAdd:function (){
            
           $(document).on('click', '.button.taiowc_upload_image_button', function (event){

                    event.preventDefault();

                    var self = $(this);
                    // Create the media frame.
                    var file_frame = wp.media.frames.file_frame = wp.media({
                        title: self.data('uploader_title'),
                        button: {
                            text: self.data('uploader_button_text'),
                        },
                        multiple: false
                    });
                    file_frame.on('select', function () {
                        attachment = file_frame.state().get('selection').first().toJSON();

                        self.prev('.icon_url').val(attachment.url);
                    });

                    // Finally, open the modal
                    file_frame.open();

                    $('#submit').removeAttr("disabled");

          });
        },
        SaveSetting:function(){
        $(document).on('keyup change paste', '.taiowc-setting-form input, .taiowc-setting-form select, .taiowc-setting-form textarea', function () {
        
              $('#submit').removeAttr("disabled");
              
        });  
        $(document).on("click", ".taiowc-setting-form #submit", function (e) {
        e.preventDefault();
        $(this).addClass('loader');
        
        var form_settting = $(".taiowc-setting-form").serialize();
        $.ajax({
          url: TaiowcPluginObject.ajaxurl,
          type: "POST",
          data: form_settting +'&_wpnonce=' + TaiowcPluginObject.nonce +'',
          success: function (response) {
           
            $('#submit').removeClass('loader');
            $('#submit').attr("disabled","disabled");

          },
        });
      });
    },
    ChangeSettinghideshow:function(){
        
           $(document).on('click', '#taiowc-show_cart-field', function (event){

                    if($(this).is(':checked')){

                      $('#cart_style-wrapper, #taiowc-cart_open-wrapper, #taiowc_cart_styletaiowc_cart_style-section-1, .taiowc_cart_styletaiowc_cart_style-section-1').show(500);

                    }else{

                      $('#cart_style-wrapper, #taiowc-cart_open-wrapper, #taiowc_cart_styletaiowc_cart_style-section-1, .taiowc_cart_styletaiowc_cart_style-section-1').hide(500);

                   }
                   
             });

           $(document).on('click', '#cart_style', function (event){

                    if($("input[id=cart_style]:checked").val() == "style-1"){

                      if($('#taiowc-fxd_cart_position-field').find("option:selected").val() == "fxd-left"){

                          $('#taiowc-fxd_cart_frm_left-wrapper,#taiowc-fxd_cart_frm_btm-wrapper').show(500);
                          $('#taiowc-fxd_cart_frm_right-wrapper').hide(500);

                      }else{

                         $('#taiowc-fxd_cart_frm_right-wrapper,#taiowc-fxd_cart_frm_btm-wrapper').show(500);
                         $('#taiowc-fxd_cart_frm_left-wrapper').hide(500);
                      }
                      
             
                    }else{

                      $('#taiowc-fxd_cart_frm_right-wrapper,#taiowc-fxd_cart_frm_left-wrapper,#taiowc-fxd_cart_frm_btm-wrapper').hide(500);

                   }
                   
             });

           $(document).on('change', '#taiowc-fxd_cart_position-field', function (event){

                    if($(this).find("option:selected").val() == "fxd-left"){

                       if($("input[id=cart_style]:checked").val() == "style-1"){
                          $('#taiowc-fxd_cart_frm_left-wrapper').show(500);
                          $('#taiowc-fxd_cart_frm_btm-wrapper').show(500);
                          $('#taiowc-fxd_cart_frm_right-wrapper').hide(500);
                        }

                    }else{

                          if($("input[id=cart_style]:checked").val() == "style-1"){
                          $('#taiowc-fxd_cart_frm_left-wrapper').hide(500);
                          $('#taiowc-fxd_cart_frm_right-wrapper').show(500);
                          $('#taiowc-fxd_cart_frm_btm-wrapper').show(500);
                        }
                        

                   }
                   
             });

           $(document).on('click', '#taiowc-cart-icon', function (event){

                    if($("input[id=taiowc-cart-icon]:checked").val() == "icon-7"){

                      $('#icon_url-wrapper').show(500);

                    }else{

                      $('#icon_url-wrapper').hide(500);

                   }
                   
             });

       
            $(document).on('click', '#taiowc-cart_pan_icon_shw-field', function (event){

                    if($(this).is(':checked')){

                      $('#taiowc-cart_pan_icon_clr-wrapper').show(500);

                    }else{

                      $('#taiowc-cart_pan_icon_clr-wrapper').hide(500);

                   }
                   
             });

            $('input#cart_style[value="style-2"]').attr("disabled", true);
            $('#taiowc-cart_effect-field option[value="taiowc-slide-left"]').attr("disabled", true);
            $('#taiowc-cart_effect-field option[value="taiowc-click-dropdown"]').attr("disabled", true);
            $('#taiowc-cart_item_order-field option[value="prd_last"]').attr("disabled", true);
            $('#taiowc-cart_open-field option[value="fly-image-open"]').attr("disabled", true);
            $('input#taiowc-cart-icon[value="icon-2"], input#taiowc-cart-icon[value="icon-3"], input#taiowc-cart-icon[value="icon-4"], input#taiowc-cart-icon[value="icon-5"], input#taiowc-cart-icon[value="icon-6"], input#taiowc-cart-icon[value="icon-7"]').attr("disabled", true);

        },
  

}
TAIOWCsettingLib.init();
})(jQuery);