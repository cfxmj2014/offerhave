/*
 * Author: Surprise Chen
 * Contact: 444952680@qq.com
 * Data: 
 */

/*------header js------*/
// 页面加载时判断设备宽度
$(function(){
	if ($(window).width()<768) {
		$('.min-device-header').show();
		$('.header').hide();
	} else{
		$('.min-device-header').hide();
		$('.header').show();
	}
});
//页面加载时判断用户是否登录
$(function() {
	$.ajax({
		url: IsLoginURL,
		type: 'POST',
		dataType: 'html',
		success: function(data) {
			if (0 == data) {
				$('.unlogin').show();
				$('.already-login').hide();
			} else {
				$('.already-login').show();
				$('.unlogin').hide();
				$('.username').html(eval(data));
			}
		}
	});
});
//模式窗口
$(function() {
	// 点击登录显示相应状态窗口
	$('.login-reg,.login-span').click(function() {
		$('.input').val("");
		$('.input').css('border-color', '#d0d6d9');
		$('.tip-wrap').removeClass('tip-wrap-error').html("");

		$('.login-span').addClass('active-span');
		$('.reg-span').removeClass('active-span');
		$('.login-modal-content').show();
		//表单聚焦
		/*$(':input:visible').each(function(i,e) {
			$(e).attr('tabindex',3000 + i);
		});
		$('input[tabindex="3000"]').focus();*/
		$('.reg-modal-content').hide();
	});
	// 点击注册显示相应状态窗口
	$('.reg-span').click(function() {
		$('.input').val("");
		$('.input').css('border-color', '#d0d6d9');
		$('.tip-wrap').removeClass('tip-wrap-error').html("");

		$('.reg-span').addClass('active-span');
		$('.login-span').removeClass('active-span');
		$('.reg-modal-content').show();
		$('.login-modal-content').hide();
	});
});
//正则表达式函数
function checkEmail(str) {
	var regexEmail = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
	if (!regexEmail.test(str)) {
		return false;
	} else {
		return true;
	}
}
function checkPwd(str) {
	var regexPwd = /^[A-Za-z0-9_\!\#\$\%\^\&\*\.\~\@]{6,16}$/;
	if (!regexPwd.test(str)) {
		return false;
	} else {
		return true;
	}
}
function checkNick(str) {
	var regexNick = /^[A-Za-z0-9_\u4e00-\u9fa5]{2,18}$/;
	if (!regexNick.test(str)) {
		return false;
	} else {
		return true;
	}
}
//登录注册前台验证
$(function() {
	// 邮箱验证
	$('.input-email').keyup(function() {
		var inputEmail = $(this).val();
		if (inputEmail.length == 0) {
			$('.input-email').css('border-color', '#F76160');
			$('.tip-wrap-email').addClass('tip-wrap-error').html("邮箱不能为空！");
		} else {
			if (!checkEmail(inputEmail)) {
				$('.input-email').css('border-color', '#F76160');
				$('.tip-wrap-email').addClass('tip-wrap-error').html("邮箱格式不正确！");
			} else {
				$('.input-email').css('border-color', '#d0d6d9');
				$('.tip-wrap-email').removeClass('tip-wrap-error').html("");
			}
		}
	});
	// 密码验证
	$('.input-pwd').keyup(function() {
		var inputPwd = $(this).val();
		if (inputPwd.length == 0) {
			$('.input-pwd').css('border-color', '#F76160');
			$('.tip-wrap-pwd').addClass('tip-wrap-error').html("密码不能为空！");
		} else {
			if (!checkPwd(inputPwd)) {
				$('.input-pwd').css('border-color', '#F76160');
				$('.tip-wrap-pwd').addClass('tip-wrap-error').html("密码：6-16位,区分大小写,不允许空格！");
			} else {
				$('.input-pwd').css('border-color', '#d0d6d9');
				$('.tip-wrap-pwd').removeClass('tip-wrap-error').html("");
			}
		}
	});
	// 确认密码
	$('.input-repwd').blur(function() {
		var inputPwd = $('.reg-pwd').val();
		var inputRepwd = $(this).val();
		if (inputPwd != inputRepwd) {
			$('.input-repwd').css('border-color', '#F76160');
			$('.tip-wrap-repwd').addClass('tip-wrap-error').html("两次密码不一致！");
		} else {
			$('.input-repwd').css('border-color', '#d0d6d9');
			$('.tip-wrap-repwd').removeClass('tip-wrap-error').html("");
			}
	});
	// 昵称验证
	$('.input-nick').keyup(function() {
		var inputNick = $(this).val();
		if (inputNick.length == 0) {
			$('.input-nick').css('border-color', '#F76160');
			$('.tip-wrap-nick').addClass('tip-wrap-error').html("昵称不能为空！");
		} else {
			if (!checkNick(inputNick)) {
				$('.input-nick').css('border-color', '#F76160');
				$('.tip-wrap-nick').addClass('tip-wrap-error').html("昵称：2-18位,中英文、数字或下划线！");
			} else {
				$('.input-nick').css('border-color', '#d0d6d9');
				$('.tip-wrap-nick').removeClass('tip-wrap-error').html("");
			}
		}
	});
});
//登录注册Ajax验证
$(function() {
	//注册邮箱验证
	$('.reg-email').blur(function() {
		var email = $('.reg-email').val();
		$.ajax({
			url: ParaIsOkURL,
			type: 'POST',
			data: {
				email: email
			},
			dataType: "html",
			success: function(data) {
				if (0 == data && checkEmail(email)) {
					$('.input-email').css('border-color', '#F76160');
					$('.tip-wrap-email').addClass('tip-wrap-error').html("邮箱已被注册！");
				}
			}
		});
	});
	//注册昵称验证
	$('.reg-nick').blur(function() {
		var uNick = $('.reg-nick').val();
		$.ajax({
			url: ParaIsOkURL,
			type: 'POST',
			data: {
				uNick: uNick
			},
			dataType: "html",
			success: function(data) {
				if (0 == data && checkNick(uNick)) {
					$('.input-nick').css('border-color', '#F76160');
					$('.tip-wrap-nick').addClass('tip-wrap-error').html("昵称已被注册！");
				}
			}
		});
	});
	//注册按钮验证
	$('#reg-bt').click(function() {
		var email = $('.reg-email').val();
		var pwd = $('.reg-pwd').val();
		var uNick = $('.reg-nick').val();
		var repwd = $('.reg-repwd').val();
		if(!email){
			$('.tip-wrap-email').addClass('tip-wrap-error').html("邮箱不能为空！");
		}
		if(!pwd){
			$('.tip-wrap-pwd').addClass('tip-wrap-error').html("密码不能为空！");
		}
		if(!uNick){
			$('.tip-wrap-nick').addClass('tip-wrap-error').html("昵称不能为空！");
		}
		if(!repwd){
			$('.tip-wrap-repwd').addClass('tip-wrap-error').html("验证密码不能为空！");
		}
		if ($('.tip-wrap').hasClass('tip-wrap-error') || !email || !pwd || !uNick || !repwd) {
			return;
		} else {
			$.ajax({
				url: RegisterURL,
				type: 'POST',
				data: {
					email: email,
					pwd: pwd,
					uNick: uNick
				},
				dataType: 'html',
				success: function(data) {
					// console.log(eval(data));
					$('#myModal').modal('hide')
					$('.unlogin').hide();
					$('.already-login').show();
					$('.username').html(eval(data));
					var url = window.location.href;
					window.location = url;
				}
			});
		}
	});
	//登录邮箱验证
	$('.login-email').blur(function() {
		var email = $('.login-email').val();
		$.ajax({
			url: ParaIsOkURL,
			type: 'POST',
			data: {
				email: $('.login-email').val()
			},
			dataType: "html",
			success: function(data) {
				if (1 == data && checkEmail(email)) {
					$('.login-email').css('border-color', '#F76160');
					$('.tip-wrap-email').addClass('tip-wrap-error').html("邮箱未注册！");
				}
			}
		});
	});
	//登录按钮验证
	$('#login-bt').click(function() {
		var email = $('.login-email').val();
		var pwd = $('.login-pwd').val();
		var remember = $('#auto-login').is(':checked');
		if(!email){
			$('.tip-wrap-email').addClass('tip-wrap-error').html("邮箱不能为空！");
		}
		if(!pwd){
			$('.tip-wrap-pwd').addClass('tip-wrap-error').html("密码不能为空！");
		}
		if($('.tip-wrap').hasClass('tip-wrap-error')||!email||!pwd){
			return;
		}else {
			$.ajax({
				url: LoginURL,
				type: 'POST',
				data: {
					email: email,
					pwd: pwd,
					remember: remember
				},
				dataType: 'html',
				success: function(data) {
					if (0 == data) {
						$('.login-pwd').css('border-color', '#F76160');
						$('.tip-wrap-pwd').addClass('tip-wrap-error').html("密码错误！");
					} else {
						$('#myModal').modal('hide')
						$('.unlogin').hide();
						$('.already-login').show();
						$('.username').html(eval(data));
						var url = window.location.href;
						window.location = url;
					}
				}
			});
		}
	});
})

//邮箱自动补全
jQuery.AutoComplete = function(selector) {
		var elt = $(selector);
		var autoComplete, autoLi;
		var strHtml = [];
		strHtml.push('<div class="AutoComplete" id="AutoComplete">');
		strHtml.push('	<ul class="AutoComplete_ul">');
		strHtml.push('		<li class="AutoComplete-title">请选择邮箱后缀：</li>');
		strHtml.push('		<li suffix="@163.com"></li>');
		strHtml.push('		<li suffix="@126.com"></li>');
		strHtml.push('		<li suffix="@sina.com"></li>');
		strHtml.push('		<li suffix="@qq.com"></li>');
		strHtml.push('		<li suffix="@gmail.com"></li>');
		strHtml.push('		<li suffix="@yahoo.com.cn"></li>');
		strHtml.push('	</ul>');
		strHtml.push('</div>');

		$('body').append(strHtml.join(''));

		autoComplete = $('#AutoComplete');
		autoComplete.data('elt', elt);
		autoLi = autoComplete.find('li:not(.AutoComplete-title)');
		autoLi.mouseover(function() {
			$(this).siblings().filter('.hover').removeClass('hover');
			$(this).addClass('hover');
		}).mouseout(function() {
			$(this).removeClass('hover');
		}).mousedown(function() {
			autoComplete.data('elt').val($(this).text()).change();
			autoComplete.hide();
		});
		//用户名补全+翻动
		elt.keyup(function(e) {
			if (/13|38|40|116/.test(e.keyCode) || this.value == '') {
				return false;
			}
			var username = this.value;
			if (username.indexOf('@') == -1) {
				autoComplete.hide();
				return false;
			}
			autoLi.each(function() {
				this.innerHTML = username.replace(/\@+.*/, '') + $(this).attr('suffix');
				if (this.innerHTML.indexOf(username) >= 0) {
					$(this).show();
				} else {
					$(this).hide();
				}
			}).filter('.hover').removeClass('hover');
			autoComplete.show().css({
				left: $(this).offset().left,
				top: $(this).offset().top + $(this).outerHeight(true) - 1,
				position: 'absolute',
				zIndex: '99999'
			});
			if (autoLi.filter(':visible').length == 0) {
				autoComplete.hide();
			} else {
				autoLi.filter(':visible').eq(0).addClass('hover');
			}
		}).keydown(function(e) {
			if (e.keyCode == 38) { //上
				autoLi.filter('.hover').prev().not('.AutoComplete-title').addClass('hover').next().removeClass('hover');
			} else if (e.keyCode == 40) { //下
				autoLi.filter('.hover').next().addClass('hover').prev().removeClass('hover');
			} else if (e.keyCode == 13) { //Enter
				autoLi.filter('.hover').mousedown();
				e.preventDefault(); //如有表单，阻止表单提交
			}
		}).focus(function() {
			autoComplete.data('elt', $(this));
		}).blur(function() {
			autoComplete.hide();
		});
	}
// headroom js
! function(a, b) {
	"use strict";

	function c(a) {
		this.callback = a, this.ticking = !1
	}

	function d(b) {
		return b && "undefined" != typeof a && (b === a || b.nodeType)
	}

	function e(a) {
		if (arguments.length <= 0) throw new Error("Missing arguments in extend function");
		var b, c, f = a || {};
		for (c = 1; c < arguments.length; c++) {
			var g = arguments[c] || {};
			for (b in g) f[b] = "object" != typeof f[b] || d(f[b]) ? f[b] || g[b] : e(f[b], g[b])
		}
		return f
	}

	function f(a) {
		return a === Object(a) ? a : {
			down: a,
			up: a
		}
	}

	function g(a, b) {
		b = e(b, g.options), this.lastKnownScrollY = 0, this.elem = a, this.debouncer = new c(this.update.bind(this)), this.tolerance = f(b.tolerance), this.classes = b.classes, this.offset = b.offset, this.scroller = b.scroller, this.initialised = !1, this.onPin = b.onPin, this.onUnpin = b.onUnpin, this.onTop = b.onTop, this.onNotTop = b.onNotTop
	}
	var h = {
		bind: !! function() {}.bind,
		classList: "classList" in b.documentElement,
		rAF: !!(a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame)
	};
	a.requestAnimationFrame = a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame, c.prototype = {
		constructor: c,
		update: function() {
			this.callback && this.callback(), this.ticking = !1
		},
		requestTick: function() {
			this.ticking || (requestAnimationFrame(this.rafCallback || (this.rafCallback = this.update.bind(this))), this.ticking = !0)
		},
		handleEvent: function() {
			this.requestTick()
		}
	}, g.prototype = {
		constructor: g,
		init: function() {
			return g.cutsTheMustard ? (this.elem.classList.add(this.classes.initial), setTimeout(this.attachEvent.bind(this), 100), this) : void 0
		},
		destroy: function() {
			var a = this.classes;
			this.initialised = !1, this.elem.classList.remove(a.unpinned, a.pinned, a.top, a.initial), this.scroller.removeEventListener("scroll", this.debouncer, !1)
		},
		attachEvent: function() {
			this.initialised || (this.lastKnownScrollY = this.getScrollY(), this.initialised = !0, this.scroller.addEventListener("scroll", this.debouncer, !1), this.debouncer.handleEvent())
		},
		unpin: function() {
			var a = this.elem.classList,
				b = this.classes;
			(a.contains(b.pinned) || !a.contains(b.unpinned)) && (a.add(b.unpinned), a.remove(b.pinned), this.onUnpin && this.onUnpin.call(this))
		},
		pin: function() {
			var a = this.elem.classList,
				b = this.classes;
			a.contains(b.unpinned) && (a.remove(b.unpinned), a.add(b.pinned), this.onPin && this.onPin.call(this))
		},
		top: function() {
			var a = this.elem.classList,
				b = this.classes;
			a.contains(b.top) || (a.add(b.top), a.remove(b.notTop), this.onTop && this.onTop.call(this))
		},
		notTop: function() {
			var a = this.elem.classList,
				b = this.classes;
			a.contains(b.notTop) || (a.add(b.notTop), a.remove(b.top), this.onNotTop && this.onNotTop.call(this))
		},
		getScrollY: function() {
			return void 0 !== this.scroller.pageYOffset ? this.scroller.pageYOffset : void 0 !== this.scroller.scrollTop ? this.scroller.scrollTop : (b.documentElement || b.body.parentNode || b.body).scrollTop
		},
		getViewportHeight: function() {
			return a.innerHeight || b.documentElement.clientHeight || b.body.clientHeight
		},
		getDocumentHeight: function() {
			var a = b.body,
				c = b.documentElement;
			return Math.max(a.scrollHeight, c.scrollHeight, a.offsetHeight, c.offsetHeight, a.clientHeight, c.clientHeight)
		},
		getElementHeight: function(a) {
			return Math.max(a.scrollHeight, a.offsetHeight, a.clientHeight)
		},
		getScrollerHeight: function() {
			return this.scroller === a || this.scroller === b.body ? this.getDocumentHeight() : this.getElementHeight(this.scroller)
		},
		isOutOfBounds: function(a) {
			var b = 0 > a,
				c = a + this.getViewportHeight() > this.getScrollerHeight();
			return b || c
		},
		toleranceExceeded: function(a, b) {
			return Math.abs(a - this.lastKnownScrollY) >= this.tolerance[b]
		},
		shouldUnpin: function(a, b) {
			var c = a > this.lastKnownScrollY,
				d = a >= this.offset;
			return c && d && b
		},
		shouldPin: function(a, b) {
			var c = a < this.lastKnownScrollY,
				d = a <= this.offset;
			return c && b || d
		},
		update: function() {
			var a = this.getScrollY(),
				b = a > this.lastKnownScrollY ? "down" : "up",
				c = this.toleranceExceeded(a, b);
			this.isOutOfBounds(a) || (a <= this.offset ? this.top() : this.notTop(), this.shouldUnpin(a, c) ? this.unpin() : this.shouldPin(a, c) && this.pin(), this.lastKnownScrollY = a)
		}
	}, g.options = {
		tolerance: {
			up: 0,
			down: 0
		},
		offset: 0,
		scroller: a,
		classes: {
			pinned: "headroom--pinned",
			unpinned: "headroom--unpinned",
			top: "headroom--top",
			notTop: "headroom--not-top",
			initial: "headroom"
		}
	}, g.cutsTheMustard = "undefined" != typeof h && h.rAF && h.bind && h.classList, a.Headroom = g
}(window, document);
/*------index js------*/
//预约留学顾问
$(function() {
	$('.to-school').click(function() {
		var selectSchool = $("select[name='select-school']").val();
		var selectMajor = $("select[name='select-major']").val();
		if (selectSchool != null && selectMajor != null) {
			if (selectMajor == "所有专业"){
				window.location.href = ToSchoolURL + "?school=" + selectSchool + "&major=all";
			}else{
				window.location.href = ToSchoolURL + "?school=" + selectSchool + "&major=" + selectMajor;
			}
		}
	});
});
//免费定位
$(function() {
	$('.show-school-location').click(function() {
		if ($('.school-location').css('display') == 'none') {
			$('.school-location').slideDown();
			$('.school-location-detail').hide();
		} else {
			$('.school-location').slideUp();
		}
	});
	$('.to-school-location-detail').click(function() {
		$('.school-location-detail').slideDown();
		$('.school-location').hide();
	});
	// 定位学校
	$('.s-location').click(function(){
		//测试
		//window.location.href = LocationURL;
		var abroadTime = $("select[name='abroad-time']").val();
		var gradeNow = $("select[name='grade-now']").val();
		var planItem = $("select[name='plan-item']").val();
		var schoolNow = $('.school-now').val();
		var schoolType = $("select[name='school-type']").val();
		var majorNow = $("select[name='major-now']").val();
		var averageScore = $('.average-score').val();
		var expectMajor = $("select[name='expect-major']").val();
		//console.log(majorNow);
		$.ajax({
			url:LocationURL,
			type:'POST',
			data:{
				abroadTime:abroadTime,
				gradeNow:gradeNow,
				planItem:planItem,
				schoolNow:schoolNow,
				schoolType:schoolType,
				majorNow:majorNow,
				averageScore:averageScore,
				expectMajor:expectMajor
			},
			dataType:"html",
			success:function(data){
				//console.log(data);
				window.location.href = LocationURL;
			}
		});
	});;
});

/*------application js------*/
// 自定义ajax请求
$.myAjax = function(type,count,svId,tPrice,totalPrice){
	$.ajax({
			url:ChangeNumURL,
			type:'POST',
			data:{
				type:type,
				count:count,
				svId:svId,
				},
			dataType:"json",
			success:function(data){
					tPrice.html(data.Price);
					totalPrice.html(data.TotalMoney);				
				}
		});
};
// ajax修改服务数量
$(function(){
	// 按钮增加服务数量
	var totalPrice = $('.total-price');
	$('.add').click(function(){
		var count = parseInt($(this).prev().val());
		var svId = $(this).parent().siblings('.svId').attr("id");
		var tPrice = $(this).parent().siblings('.price');
		var svIdParent = $(this).parent().parent();
		var svIdChild = svIdParent.children().children('.count');
		if(count >= 100){
			count = 1;
			svIdChild.val(count);
		}else{
			count = count + 1;
			svIdChild.val(count);
			// console.log(count);
			$.myAjax('modifyCount',count,svId,tPrice,totalPrice);
		}
	});
	// 按钮减少服务数量
	$('.min').click(function(){
		var count = parseInt($(this).next().val());
		var svId = $(this).parent().siblings('.svId').attr("id");
		var tPrice = $(this).parent().siblings('.price');
		var svIdParent = $(this).parent().parent();
		var svIdChild = svIdParent.children().children('.count');
		if(count <= 1){
			count = 1;
			svIdChild.val(count);
		}else{
			count = count - 1;
			svIdChild.val(count);
			$.myAjax('modifyCount',count,svId,tPrice,totalPrice);
		}
	});
	// 输入框自定义服务数量
	$('.count').blur(function(){
		var count = parseInt($(this).val());
		var svId = $(this).parent().siblings('.svId').attr("id");
		var tPrice = $(this).parent().siblings('.price');
		var svIdParent = $(this).parent().parent();
		var svIdChild = svIdParent.children().children('.count');
		if(count < 0||count >= 100||isNaN(count)){
			count = "1";
			svIdChild.val(count);
		}else{
			svIdChild.val(count);
			$.myAjax('modifyCount',count,svId,tPrice,totalPrice);
		}
	});
	// 删除服务
	$('.deleteItem').click(function(){
		var svId = $(this).parent().siblings('.svId').attr("id");
		var conf = confirm('确定删除此商品吗？');
		if(conf){
			$.ajax({
					url:ChangeNumURL,
					type:'POST',
					data:{
						type:'deleteServer',
						svId:svId,
						},
					dataType:"json",
					success:function(data){
						var url = window.location.href
						window.location = url;			
						}
					});
			
		}
	});
});
//提交申请的用户认证
function checkPhone(str) {
	var regexPhone = /^1[3|5|8][0-9]{9}$/;
	if (!regexPhone.test(str)) {
		return false;
	} else {
		return true;
	}
}
function checkName(str) {
	var regexName = /^[\u4e00-\u9fa5]{2,7}$/;
	var regexName2 = /^[a-zA-Z]{3,10}$/;
	if (!regexName.test(str) && !regexName2.test(str)) {
		return false;
	} else {
		return true;
	}
}
$(function() {
	$('.uName').keyup(function() {
		var uName = $(this).val();
		if (uName.length == 0) {
			$('.uName').css('border-color', '#F76160');
			$('.tip-wrap-uName').addClass('tip-wrap-error').html("姓名不能为空！");
		} else {
			if (!checkName(uName)) {
				$('.uName').css('border-color', '#F76160');
				$('.tip-wrap-uName').addClass('tip-wrap-error').html("请填写正确的姓名！");
			} else {
				$('.uName').css('border-color', '#d0d6d9');
				$('.tip-wrap-uName').removeClass('tip-wrap-error').html("");
			}
		}
	});
	$('.uPhone').keyup(function() {
		var uPhone = $(this).val();
		if (uPhone.length == 0) {
			$('.uPhone').css('border-color', '#F76160');
			$('.tip-wrap-uPhone').addClass('tip-wrap-error').html("电话不能为空！");
		} else {
			if (!checkPhone(uPhone)) {
				$('.uPhone').css('border-color', '#F76160');
				$('.tip-wrap-uPhone').addClass('tip-wrap-error').html("请填写正确的电话号码！");
			} else {
				$('.uPhone').css('border-color', '#d0d6d9');
				$('.tip-wrap-uPhone').removeClass('tip-wrap-error').html("");
			}
		}
	});
	$('.uEmail').keyup(function() {
		var uEmail = $(this).val();
		if (uEmail.length == 0) {
			$('.uEmail').css('border-color', '#F76160');
			$('.tip-wrap-uEmail').addClass('tip-wrap-error').html("邮箱不能为空！");
		} else {
			if (!checkEmail(uEmail)) {
				$('.uEmail').css('border-color', '#F76160');
				$('.tip-wrap-uEmail').addClass('tip-wrap-error').html("邮箱格式不正确！");
			} else {
				$('.uEmail').css('border-color', '#d0d6d9');
				$('.tip-wrap-uEmail').removeClass('tip-wrap-error').html("");
			}
		}

	});
	// 确认申请
	$('.confirm-btn').click(function() {
		var uName = $('.uName').val();
		var uPhone = $('.uPhone').val();
		var uEmail = $('.uEmail').val();
		var message = $('.message').val();
		var checked = $(".read-treaty").is(':checked');
		var status = "申请审核中..."
		if(!uName){
			$('.tip-wrap-uName').addClass('tip-wrap-error').html("姓名不能为空！");
		}
		if(!uPhone){
			$('.tip-wrap-uPhone').addClass('tip-wrap-error').html("电话不能为空！");
		}		
		if(!uEmail){
			$('.tip-wrap-uEmail').addClass('tip-wrap-error').html("邮箱不能为空！");
		}
		if ($('.tip-wrap').hasClass('tip-wrap-error') || !uEmail || !uPhone || !uName || checked == "false") {
			return;
		} else {
			$.ajax({
				url: ApplicationURL,
				type: 'POST',
				data: {
					uName: uName,
					uPhone: uPhone,
					message: message,
					status: status
				},
				dataType: 'html',
				success: function(data) {
					// console.log(data);
					window.location.href = ConfirmURL;
				}
			});
		}
	});
});