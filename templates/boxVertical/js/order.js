var Order={initGift:function(){$(document).on("beforeGetTpl.Cart",function(a){if(a.obj.template=="cart_order"){$(genObj.orderDetails).find(preloader).show()}});$(genObj.giftButton).click(function(a){Shop.Cart.getTpl({ignoreWrap:"1",template:"cart_order",gift:$(genObj.gift).val(),deliveryMethodId:function(){if(selectDeliv){return $(genObj.dM).val()}else{return $(genObj.dM).filter(":checked").val()}}})});$(genObj.gift).keydown(function(a){if(a.keyCode==13){$(genObj.giftButton).trigger("click");a.preventDefault()}})},initOrder:function(){if(selectDeliv){cuselInit($(genObj.frameDelivery),$(genObj.dM));$(genObj.dM).on("change.methoddeliv",function(){Shop.Cart.getTpl({ignoreWrap:"1",template:"cart_order",gift:$(genObj.gift).val(),deliveryMethodId:$(this).val()});Shop.Cart.getPayment($(this).val(),"")})}else{$(genObj.frameDelivery).nStRadio({wrapper:$(".frame-radio > .frame-label"),elCheckWrap:".niceRadio",classRemove:"b_n",after:function(b,c){if(!c){var a=$(b).find("input");Shop.Cart.getTpl({ignoreWrap:"1",template:"cart_order",gift:$(genObj.gift).val(),deliveryMethodId:a.val()});Shop.Cart.getPayment(a.val(),"")}}})}if(selectPayment){cuselInit($(genObj.framePaymentMethod),$(genObj.pM))}else{$(genObj.framePaymentMethod).nStRadio({wrapper:$(".frame-radio > .frame-label"),elCheckWrap:".niceRadio",classRemove:"b_n"})}}};$(document).on("scriptDefer",function(){Order.initOrder();$(document).on("beforeGetPayment.Cart",function(a){$(genObj.submitOrder).attr("disabled","disabled");$(genObj.framePaymentMethod).next().show()});$(document).on("getPayment.Cart",function(a){$(genObj.framePaymentMethod).html(a.datas).next().hide();$(genObj.submitOrder).removeAttr("disabled");if(selectPayment){cuselInit($(genObj.framePaymentMethod),$(genObj.pM))}else{$(genObj.framePaymentMethod).nStRadio({wrapper:$(".frame-radio > .frame-label"),elCheckWrap:".niceRadio",classRemove:"b_n"})}$(document).trigger("hideActivity")});$(document).on("getTpl.Cart",function(a){if(a.obj.template=="cart_order"){$(genObj.orderDetails).empty().append(a.datas);$(genObj.orderDetails).find("[data-drop]").drop();Order.initGift();if(totalItemsBask==0){$(".pageCart").find(genObj.blockEmpty).show().end().find(genObj.blockNoEmpty).hide()}}})});function initOrderTrEv(){Order.initGift();$(".maskPhoneFrame input").mask("+99 (999) 999-99-99")};