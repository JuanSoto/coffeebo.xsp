var objCookies = {
    setCookie: function (cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; path=/; " + expires;
    },
    getCookie: function (cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i].trim();
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }
}

function getUrlVars() {
    var vars = [];
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        var hash = hashes[i].split('=');
		var key = hash[0].toLowerCase();
		var value = hash[1];
        vars.push(key);
        vars[key] = value;
		//console.log(key,value);
    }
    return vars;
}

var token = "none";
var strUrlToken = getUrlVars()["stoken"];
var strCookieToken = objCookies.getCookie("token");
var strSSToken = sessionStorage.getItem("token");

if (strUrlToken != '' && strUrlToken != undefined) {
    token = strUrlToken;
    objCookies.setCookie("token", strUrlToken, 1);
    sessionStorage.setItem("token", strUrlToken);
}
else if (strCookieToken != '' && strUrlToken != undefined) {
    token = strCookieToken;
    sessionStorage.setItem("token", strCookieToken);
}
else if (strSSToken != '' && strSSToken != undefined) {
    token = strSSToken;
    objCookies.setCookie("token", strSSToken, 1);
}

function whl() {
  'use strict';
  this.errorMessages = new Object();
  this.errorMessages[-1] = "Unknown error.";
  this.errorMessages[-100] = "Invalid input parameters.";
  this.errorMessages[-102] = "Username is not entered.";
  this.errorMessages[-104] = "Password is not entered";
  this.errorMessages[-205] = "Username/password is not correct.";
  this.errorMessages[-7] = "User account is locked.";
  this.siteURL = "http://15casino.com:9215";
  this.linkLogin = "";
  this.linkStatus = this.siteURL + "/status";
  this.linkLogout = "";
  this.linkReg = "";
  this.linkDeposits = "/deposits";
  this.linkWithdrawals = "/withdraws";
  this.linkChangePassword = "";
  this.linkProfile = "";
  this.DEF_PANEL_WIDTH = 800;
  this.DEF_PANEL_HEIGHT = 550;
  this.PANEL_NAME = "panel_popup";
}

whl.prototype.login = function (username, password, callback) { }

whl.prototype.status = function (callback) {
	'use strict';
	this.status_callback = callback;
	if (this.status_callback && token != "none") {
		var that = this;
		$.ajax({
			type: 'POST',
			url: this.linkStatus,
			crossDomain: true,
			dataType: "jsonp",
			jsonpCallback: 'jsoncb',
			data: {token: token},
			success: function (data) {
				var result = new Object();
				result.uid = data.uid;
				result.token = data.token;
				result.status = data.status;
				result.balance = data.balance;
				that.status_callback(result);
			},
			error: function(x,y,z){
				//alert(y);
			}
		});
	}
}

// REFRESH
whl.prototype.refreshSession = function (callback) {
  'use strict';
	'use strict';
	this.refresh_callback = callback;
	if (this.refresh_callback && token != "none") {
		var that = this;
		$.ajax({
			type: 'POST',
			url: this.linkStatus,
			crossDomain: true,
			dataType: "jsonp",
			jsonpCallback: 'jsoncb',
			data: {token: token},
			success: function (data) {
				var result = new Object();
				result.uid = data.uid;
				result.token = data.token;
				result.status = data.status;
				result.balance = data.balance;
				that.refresh_callback(result);
			},
			error: function(x,y,z){
				//alert(y);
			}
		});
	}
}

whl.prototype.logout = function (){
	var result = new Object();
	result.status = 'OK';
	this.logout(result);
}
whl.prototype.resetPassword = function () { }
whl.prototype.registrationForm = function () { }
whl.prototype.bank = function () { }
whl.prototype.formClose = function () { }

whl.setBetSlipItemsCount = function(newItemsCount) {
	window.parent.postMessage(JSON.stringify({
		eventType: 'SET_BETSLIP_ITEMS_EVENT',
		eventData: {
			newItemsCount: newItemsCount
		}
	}), '*');
}

whl.setIframeHeight = function(newHeight) {
	window.parent.postMessage(JSON.stringify({
		eventType: 'CHANGE_IFRAME_SIZE_EVENT',
		eventData: {
			newHeight: newHeight
		}
	}), '*');
}

function jsoncb(param){
}
