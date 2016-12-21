
             function texte_recherche() {
                $.extend($.expr[":"], {
                    refRecherchee : function (a){
                      test  = ((($(a).html()).toLowerCase()).replace(/^\s+/g,"").replace(/\s+$/g,"")).indexOf((($("#texte_recherche").val()).toLowerCase()).replace(/^\s+/g,"").replace(/\s+$/g,""));
                      if(test != -1) return $.trim(($(a).html()).toLowerCase());   
                    }
                });
                $("body").on("keyup","#texte_recherche",function(){                                                                                                   
                    if($.trim($("#texte_recherche").val()) !== ""){
                        $("a").css({"background":"transparent","border":"none"} );
                        $("#back").hide();
                        $("a:refRecherchee").css({"background-color": "#ffa"});
                        $("html,body").animate({scrollTop:$("a:refRecherchee").offset().top-100}, "slow");
                        $("#back").css({"display":"block","z-index":"5"})
                        .animate({top:($("a:refRecherchee").position().top)-5, left:($("a:refRecherchee").position().left)-5, width:$("a:refRecherchee").width()+10, height:$("a:refRecherchee").height()+10}, "slow").fadeOut(600);
                        $("a:refRecherchee").fadeOut(400).css({ "border":"1px dotted #000"}).fadeIn(100);
                    }else{
                        $("a").css({"background":"transparent","border":"none"} );
                        $("#back").hide();
                    }
                });
            }
      



          