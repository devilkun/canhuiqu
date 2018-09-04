! function(t, e, i) {
	function a(e, i) {
		var a = (t(window).width() - e.outerWidth()) / 2,
			r = (t(window).height() - e.outerHeight()) / 2,
			r = (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + (r > 0 ? r : 0);
		e.css({
			left: a
		}).animate({
			top: r
		}, {
			duration: i,
			queue: !1
		})
	}

	function r() {
		return 0 !== t("#Validform_msg").length ? !1 : (n = t('<div id="Validform_msg"><div class="Validform_title">' + o.tit + '<a class="Validform_close" href="javascript:void(0);">&chi;</a></div><div class="Validform_info"></div><div class="iframe"><iframe frameborder="0" scrolling="no" height="100%" width="100%"></iframe></div></div>').appendTo("body"), n.find("a.Validform_close").click(function() {
			return n.hide(), l = !0, s && s.focus().addClass("Validform_error"), !1
		}).focus(function() {
			this.blur()
		}), void t(window).bind("scroll resize", function() {
			!l && a(n, 400)
		}))
	}
	var s = null,
		n = null,
		l = !0,
		o = {
			tit: "提示信息",
			w: {
				select: "下拉框",
				"*": "不能为空！",
				"*6-16": "请填写6到16位任意字符！",
				n: "请填写数字！",
				n6: "请填写6位数字！",
				n4: "请填写4位数字！",
				"n6-16": "请填写6到16位数字！",
				s: "不能输入特殊字符！",
				"s6-18": "请填写6到18位字符！",
				p: "请填写邮政编码！",
				m: "请填写手机号码！",
				e: "邮箱地址格式不对！",
				url: "请填写网址！"
			},
			def: "请填写正确信息！",
			undef: "datatype未定义！",
			reck: "两次输入的内容不一致！",
			r: "&nbsp;",
			c: "正在检测信息…",
			s: "请{填写|选择}{0|信息}！",
			v: "所填信息没有经过验证，请稍后…",
			p: "正在提交数据…"
		};
	t.Tipmsg = o;
	var c = function(e, a, s) {
		var a = t.extend({}, c.defaults, a);
		a.datatype && t.extend(c.util.dataType, a.datatype);
		var n = this;
		return n.tipmsg = {
			w: {}
		}, n.forms = e, n.objects = [], s === !0 ? !1 : (e.each(function() {
			if ("inited" == this.validform_inited) return !0;
			this.validform_inited = "inited";
			var e = this;
			e.settings = t.extend({}, a);
			var r = t(e);
			e.validform_status = "normal", r.data("tipmsg", n.tipmsg), r.delegate("[datatype]", "blur", function() {
				var t = arguments[1],
					e = this;
				setTimeout(function() {
					c.util.check.call(e, r, t)
				}, 200)
			}), r.delegate("[datatype]", "change", function() {
				var t = arguments[1],
					e = this;
				c.util.check.call(e, r, t)
			}), r.delegate(":text", "keypress", function(t) {
				13 == t.keyCode && 0 == r.find(":submit").length && r.submit()
			}), c.util.enhance.call(r, e.settings.tiptype, e.settings.usePlugin, e.settings.tipSweep), e.settings.btnSubmit && r.find(e.settings.btnSubmit).bind("click", function() {
				return r.trigger("submit"), !1
			}), r.submit(function() {
				var t = c.util.submitForm.call(r, e.settings);
				return t === i && (t = !0), t
			}), r.find("[type='reset']").add(r.find(e.settings.btnReset)).bind("click", function() {
				c.util.resetForm.call(r)
			})
		}), void((1 == a.tiptype || (2 == a.tiptype || 3 == a.tiptype) && a.ajaxPost) && r()))
	};
	c.defaults = {
		tiptype: 1,
		tipSweep: !1,
		showAllError: !1,
		postonce: !1,
		ajaxPost: !1,
		ignoreHidden: !0
	}, c.util = {
		dataType: {
			select: /[\w\W]+/,
			"*": /[\w\W]+/,
			"*6-16": /^[\w\W]{6,16}$/,
			n: /^\d+[\.]?\d*$/,
			n6: /^\d{6}$/,
			n4: /^\d{1,4}$/,
			"n6-16": /^\d{6,16}$/,
			s: /^[\u4E00-\u9FA5\uf900-\ufa2d\w\.\s]+$/,
			"s6-18": /^[\u4E00-\u9FA5\uf900-\ufa2d\w\.\s]{6,18}$/,
			p: /^[0-9]{6}$/,
			m: /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|17[0-9]{9}|18[0-9]{9}$/,
			e: /^\w+([-+\.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
			url: /^(\w+:\/\/)?\w+(\.\w+)+.*$/
		},
		toString: Object.prototype.toString,
		isEmpty: function(e) {
			return "" === e || e === t.trim(this.attr("tip"))
		},
		getValue: function(e) {
			var a, r = this;
			return e.is(":radio") ? (a = r.find(":radio[name='" + e.attr("name") + "']:checked").val(), a = a === i ? "" : a) : e.is(":checkbox") ? (a = "", r.find(":checkbox[name='" + e.attr("name") + "']:checked").each(function() {
				a += t(this).val() + ","
			}), a = a === i ? "" : a) : a = e.val(), a = t.trim(a), c.util.isEmpty.call(e, a) ? "" : a
		},
		enhance: function(e, i, a, r) {
			var s = this;
			s.find("[datatype]").each(function() {
				2 == e ? 0 == t(this).parent().next().find(".Validform_checktip").length && (t(this).parent().next().append("<span class='Validform_checktip' />"), t(this).siblings(".Validform_checktip").remove()) : (3 == e || 4 == e) && 0 == t(this).siblings(".Validform_checktip").length && (t(this).parent().append("<span class='Validform_checktip' />"), t(this).parent().next().find(".Validform_checktip").remove())
			}), s.find("input[recheck]").each(function() {
				if ("inited" == this.validform_inited) return !0;
				this.validform_inited = "inited";
				var e = t(this),
					i = s.find("input[name='" + t(this).attr("recheck") + "']");
				i.bind("keyup", function() {
					if (i.val() == e.val() && "" != i.val()) {
						if (i.attr("tip") && i.attr("tip") == i.val()) return !1;
						e.trigger("blur")
					}
				}).bind("blur", function() {
					if (i.val() != e.val() && "" != e.val()) {
						if (e.attr("tip") && e.attr("tip") == e.val()) return !1;
						e.trigger("blur")
					}
				})
			}), s.find("[tip]").each(function() {
				if ("inited" == this.validform_inited) return !0;
				this.validform_inited = "inited";
				var e = t(this).attr("tip"),
					i = t(this).attr("altercss");
				t(this).focus(function() {
					t(this).val() == e && (t(this).val(""), i && t(this).removeClass(i))
				}).blur(function() {
					"" === t.trim(t(this).val()) && (t(this).val(e), i && t(this).addClass(i))
				})
			}), s.find(":checkbox[datatype],:radio[datatype]").each(function() {
				if ("inited" == this.validform_inited) return !0;
				this.validform_inited = "inited";
				var e = t(this),
					i = e.attr("name");
				s.find("[name='" + i + "']").filter(":checkbox,:radio").bind("click", function() {
					setTimeout(function() {
						e.trigger("blur")
					}, 0)
				})
			}), s.find("select[datatype][multiple]").bind("click", function() {
				var e = t(this);
				setTimeout(function() {
					e.trigger("blur")
				}, 0)
			}), c.util.usePlugin.call(s, i, e, a, r)
		},
		usePlugin: function(e, i, a, r) {
			var s = this,
				e = e || {};
			if (s.find("input[plugin='swfupload']").length && "undefined" != typeof swfuploadhandler) {
				var n = {
					custom_settings: {
						form: s,
						showmsg: function(t, e) {
							c.util.showmsg.call(s, t, i, {
								obj: s.find("input[plugin='swfupload']"),
								type: e,
								sweep: a
							})
						}
					}
				};
				n = t.extend(!0, {}, e.swfupload, n), s.find("input[plugin='swfupload']").each(function(e) {
					return "inited" == this.validform_inited ? !0 : (this.validform_inited = "inited", t(this).val(""), void swfuploadhandler.init(n, e))
				})
			}
			if (s.find("input[plugin='datepicker']").length && t.fn.datePicker && (e.datepicker = e.datepicker || {}, e.datepicker.format && (Date.format = e.datepicker.format, delete e.datepicker.format), e.datepicker.firstDayOfWeek && (Date.firstDayOfWeek = e.datepicker.firstDayOfWeek, delete e.datepicker.firstDayOfWeek), s.find("input[plugin='datepicker']").each(function() {
					return "inited" == this.validform_inited ? !0 : (this.validform_inited = "inited", e.datepicker.callback && t(this).bind("dateSelected", function() {
						var i = new Date(t.event._dpCache[this._dpId].getSelected()[0]).asString(Date.format);
						e.datepicker.callback(i, this)
					}), void t(this).datePicker(e.datepicker))
				})), s.find("input[plugin*='passwordStrength']").length && t.fn.passwordStrength && (e.passwordstrength = e.passwordstrength || {}, e.passwordstrength.showmsg = function(t, e, r) {
					c.util.showmsg.call(s, e, i, {
						obj: t,
						type: r,
						sweep: a
					})
				}, s.find("input[plugin='passwordStrength']").each(function() {
					return "inited" == this.validform_inited ? !0 : (this.validform_inited = "inited", void t(this).passwordStrength(e.passwordstrength))
				})), "addRule" != r && e.jqtransform && t.fn.jqTransSelect) {
				if ("true" == s[0].jqTransSelected) return;
				s[0].jqTransSelected = "true";
				var l = function(e) {
						var i = t(".jqTransformSelectWrapper ul:visible");
						i.each(function() {
							var i = t(this).parents(".jqTransformSelectWrapper:first").find("select").get(0);
							e && i.oLabel && i.oLabel.get(0) == e.get(0) || t(this).hide()
						})
					},
					o = function(e) {
						0 === t(e.target).parents(".jqTransformSelectWrapper").length && l(t(e.target))
					},
					d = function() {
						t(document).mousedown(o)
					};
				e.jqtransform.selector ? (s.find(e.jqtransform.selector).filter('input:submit, input:reset, input[type="button"]').jqTransInputButton(), s.find(e.jqtransform.selector).filter("input:text, input:password").jqTransInputText(), s.find(e.jqtransform.selector).filter("input:checkbox").jqTransCheckBox(), s.find(e.jqtransform.selector).filter("input:radio").jqTransRadio(), s.find(e.jqtransform.selector).filter("textarea").jqTransTextarea(), s.find(e.jqtransform.selector).filter("select").length > 0 && (s.find(e.jqtransform.selector).filter("select").jqTransSelect(), d())) : s.jqTransform(), s.find(".jqTransformSelectWrapper").find("li a").click(function() {
					t(this).parents(".jqTransformSelectWrapper").find("select").trigger("blur")
				})
			}
		},
		getNullmsg: function(t) {
			var e, i = this,
				a = /[\u4E00-\u9FA5\uf900-\ufa2da-zA-Z\s]+/g,
				r = t[0].settings.label || ".Validform_label";
			if (r = i.siblings(r).eq(0).text() || i.siblings().find(r).eq(0).text() || i.parent().siblings(r).eq(0).text() || i.parent().siblings().find(r).eq(0).text(), r = r.replace(/\s(?![a-zA-Z])/g, "").match(a), r = r ? r.join("") : [""], a = /\{(.+)\|(.+)\}/, e = t.data("tipmsg").s || o.s, "" != r) {
				if (e = e.replace(/\{0\|(.+)\}/, r), i.attr("recheck")) return e = e.replace(/\{(.+)\}/, ""), i.attr("nullmsg", e), e
			} else e = i.is(":checkbox,:radio,select") ? e.replace(/\{0\|(.+)\}/, "") : e.replace(/\{0\|(.+)\}/, "$1");
			return e = i.is(":checkbox,:radio,select") ? e.replace(a, "$2") : e.replace(a, "$1"), i.attr("nullmsg", e), e
		},
		getErrormsg: function(e, i, a) {
			var r, s = /^(.+?)((\d+)-(\d+))?$/,
				n = /^(.+?)(\d+)-(\d+)$/,
				l = /(.*?)\d+(.+?)\d+(.*)/,
				c = i.match(s);
			if ("recheck" == a) return r = e.data("tipmsg").reck || o.reck;
			var d = t.extend({}, o.w, e.data("tipmsg").w);
			if (c[0] in d) return e.data("tipmsg").w[c[0]] || o.w[c[0]];
			for (var u in d)
				if (-1 != u.indexOf(c[1]) && n.test(u)) return r = (e.data("tipmsg").w[u] || o.w[u]).replace(l, "$1" + c[3] + "$2" + c[4] + "$3"), e.data("tipmsg").w[c[0]] = r, r;
			return e.data("tipmsg").def || o.def
		},
		_regcheck: function(t, e, a, r) {
			var r = r,
				s = null,
				n = !1,
				l = /\/.+\//g,
				d = /^(.+?)(\d+)-(\d+)$/,
				u = 3;
			if (l.test(t)) {
				var f = t.match(l)[0].slice(1, -1),
					p = t.replace(l, ""),
					h = RegExp(f, p);
				n = h.test(e)
			} else if ("[object Function]" == c.util.toString.call(c.util.dataType[t])) n = c.util.dataType[t](e, a, r, c.util.dataType), n === !0 || n === i ? n = !0 : (s = n, n = !1);
			else {
				if (!(t in c.util.dataType)) {
					var m, g = t.match(d);
					if (g) {
						for (var v in c.util.dataType)
							if (m = v.match(d), m && g[1] === m[1]) {
								var b = c.util.dataType[v].toString(),
									p = b.match(/\/[mgi]*/g)[1].replace("/", ""),
									y = new RegExp("\\{" + m[2] + "," + m[3] + "\\}", "g");
								b = b.replace(/\/[mgi]*/g, "/").replace(y, "{" + g[2] + "," + g[3] + "}").replace(/^\//, "").replace(/\/$/, ""), c.util.dataType[t] = new RegExp(b, p);
								break
							}
					} else n = !1, s = r.data("tipmsg").undef || o.undef
				}
				"[object RegExp]" == c.util.toString.call(c.util.dataType[t]) && (n = c.util.dataType[t].test(e))
			}
			var w = a.parent().find(".Validform_checktip");
			if (w.show(), n) {
				if (u = 2, s = a.attr("sucmsg") || r.data("tipmsg").r || o.r, "0" == a.attr("display-r") && 1 == w.length && w.hide(), a.attr("recheck")) {
					var _ = r.find("input[name='" + a.attr("recheck") + "']:first");
					e != _.val() && (n = !1, u = 3, s = a.attr("errormsg") || c.util.getErrormsg.call(a, r, t, "recheck"))
				}
			} else s = s || a.attr("errormsg") || c.util.getErrormsg.call(a, r, t), c.util.isEmpty.call(a, e) && (s = a.attr("nullmsg") || c.util.getNullmsg.call(a, r));
			return {
				passed: n,
				type: u,
				info: s
			}
		},
		regcheck: function(t, e, i) {
			var a = this,
				r = null;
			if ("ignore" === i.attr("ignore") && c.util.isEmpty.call(i, e)) return i.data("cked") && (r = ""), {
				passed: !0,
				type: 4,
				info: r
			};
			i.data("cked", "cked");
			for (var s, n = c.util.parseDatatype(t), l = 0; l < n.length; l++) {
				for (var o = 0; o < n[l].length && (s = c.util._regcheck(n[l][o], e, i, a), s.passed); o++);
				if (s.passed) break
			}
			return s
		},
		parseDatatype: function(t) {
			var e = /\/.+?\/[mgi]*(?=(,|$|\||\s))|[\w\*-]+/g,
				i = t.match(e),
				a = t.replace(e, "").replace(/\s*/g, "").split(""),
				r = [],
				s = 0;
			r[0] = [], r[0].push(i[0]);
			for (var n = 0; n < a.length; n++) "|" == a[n] && (s++, r[s] = []), r[s].push(i[n + 1]);
			return r
		},
		showmsg: function(e, r, s, o) {
			if (e != i && ("bycheck" != o || !s.sweep || (!s.obj || s.obj.is(".Validform_error")) && "function" != typeof r)) {
				if (t.extend(s, {
						curform: this
					}), "function" == typeof r) return void r(e, s, c.util.cssctl);
				(1 == r || "byajax" == o && 4 != r) && n.find(".f").html(e), (1 == r && "bycheck" != o && 2 != s.type || "byajax" == o && 4 != r) && (l = !1, n.find(".iframe").css("height", n.outerHeight()), n.show(), a(n, 100)), 2 == r && s.obj && (s.obj.parent().next().find(".Validform_checktip").html(e), c.util.cssctl(s.obj.parent().next().find(".Validform_checktip"), s.type)), 3 != r && 4 != r || !s.obj || (s.obj.siblings(".Validform_checktip").html(e), c.util.cssctl(s.obj.siblings(".Validform_checktip"), s.type))
			}
		},
		cssctl: function(t, e) {
			switch (e) {
				case 1:
					t.removeClass("Validform_right Validform_wrong").addClass("Validform_checktip Validform_loading");
					break;
				case 2:
					t.removeClass("Validform_wrong Validform_loading").addClass("Validform_checktip Validform_right");
					break;
				case 4:
					t.removeClass("Validform_right Validform_wrong Validform_loading").addClass("Validform_checktip");
					break;
				default:
					t.removeClass("Validform_right Validform_loading").addClass("Validform_checktip Validform_wrong")
			}
		},
		check: function(e, i, a) {
			var r = e[0].settings,
				i = i || "",
				n = c.util.getValue.call(e, t(this));
			if (r.ignoreHidden && t(this).is(":hidden") || "dataIgnore" === t(this).data("dataIgnore")) return !0;
			if (r.dragonfly && !t(this).data("cked") && c.util.isEmpty.call(t(this), n) && "ignore" != t(this).attr("ignore")) return !1;
			var l = c.util.regcheck.call(e, t(this).attr("datatype"), n, t(this));
			if (n == this.validform_lastval && !t(this).attr("recheck") && "" == i) return l.passed ? !0 : !1;
			this.validform_lastval = n;
			var d;
			if (s = d = t(this), !l.passed) return c.util.abort.call(d[0]), a || (c.util.showmsg.call(e, l.info, r.tiptype, {
				obj: t(this),
				type: l.type,
				sweep: r.tipSweep
			}, "bycheck"), !r.tipSweep && d.addClass("Validform_error")), !1;
			var u = t(this).attr("ajaxurl");
			if (u && !c.util.isEmpty.call(t(this), n) && !a) {
				var f = t(this);
				if (f[0].validform_subpost = "postform" == i ? "postform" : "", "posting" === f[0].validform_valid && n == f[0].validform_ckvalue) return "ajax";
				f[0].validform_valid = "posting", f[0].validform_ckvalue = n, c.util.showmsg.call(e, e.data("tipmsg").c || o.c, r.tiptype, {
					obj: f,
					type: 1,
					sweep: r.tipSweep
				}, "bycheck"), c.util.abort.call(d[0]);
				var p = t.extend(!0, {}, r.ajaxurl || {}),
					h = {
						type: "GET",
						cache: !1,
						url: u,
						data: "param=" + encodeURIComponent(n) + "&name=" + encodeURIComponent(t(this).attr("name")),
						success: function(i) {
							"y" === t.trim(i.status) ? (f.trigger("val_success"), f[0].validform_valid = "true", i.info && f.attr("sucmsg", i.info), c.util.showmsg.call(e, f.attr("sucmsg") || e.data("tipmsg").r || o.r, r.tiptype, {
								obj: f,
								type: 2,
								sweep: r.tipSweep
							}, "bycheck"), d.removeClass("Validform_error"), s = null, "postform" == f[0].validform_subpost && e.trigger("submit")) : (f[0].validform_valid = i.info, c.util.showmsg.call(e, i.info, r.tiptype, {
								obj: f,
								type: 3,
								sweep: r.tipSweep
							}), d.addClass("Validform_error")), d[0].validform_ajax = null
						},
						error: function(t) {
							if ("200" == t.status) return p.success("y" == t.responseText ? {
								status: "y"
							} : {
								status: "n",
								info: t.responseText
							}), !1;
							if ("abort" !== t.statusText) {
								var i = "status: " + t.status + "; statusText: " + t.statusText;
								c.util.showmsg.call(e, i, r.tiptype, {
									obj: f,
									type: 3,
									sweep: r.tipSweep
								}), d.addClass("Validform_error")
							}
							return f[0].validform_valid = t.statusText, d[0].validform_ajax = null, !0
						}
					};
				if (p.success) {
					var m = p.success;
					p.success = function(t) {
						h.success(t), m(t, f)
					}
				}
				if (p.error) {
					var g = p.error;
					p.error = function(t) {
						h.error(t) && g(t, f)
					}
				}
				return p = t.extend({}, h, p, {
					dataType: "json"
				}), d[0].validform_ajax = t.ajax(p), "ajax"
			}
			return u && c.util.isEmpty.call(t(this), n) && (c.util.abort.call(d[0]), d[0].validform_valid = "true"), a || (c.util.showmsg.call(e, l.info, r.tiptype, {
				obj: t(this),
				type: l.type,
				sweep: r.tipSweep
			}, "bycheck"), d.removeClass("Validform_error")), s = null, !0
		},
		submitForm: function(e, i, a, r, n) {
			var l = this;
			if ("posting" === l[0].validform_status) return !1;
			if (e.postonce && "posted" === l[0].validform_status) return !1;
			var d = e.beforeCheck && e.beforeCheck(l);
			if (d === !1) return !1;
			var u, f = !0;
			if (l.find("[datatype]").each(function() {
					if (i) return !1;
					if (e.ignoreHidden && t(this).is(":hidden") || "dataIgnore" === t(this).data("dataIgnore")) return !0;
					var a, r = c.util.getValue.call(l, t(this));
					if (s = a = t(this), u = c.util.regcheck.call(l, t(this).attr("datatype"), r, t(this)), !u.passed) return c.util.showmsg.call(l, u.info, e.tiptype, {
						obj: t(this),
						type: u.type,
						sweep: e.tipSweep
					}), a.addClass("Validform_error"), e.showAllError ? (f && (f = !1), !0) : (a.focus(), f = !1, !1);
					if (t(this).attr("ajaxurl") && !c.util.isEmpty.call(t(this), r)) {
						if ("true" !== this.validform_valid) {
							var n = t(this);
							return c.util.showmsg.call(l, l.data("tipmsg").v || o.v, e.tiptype, {
								obj: n,
								type: 3,
								sweep: e.tipSweep
							}), a.addClass("Validform_error"), n.trigger("blur", ["postform"]), e.showAllError ? (f && (f = !1), !0) : (f = !1, !1)
						}
					} else t(this).attr("ajaxurl") && c.util.isEmpty.call(t(this), r) && (c.util.abort.call(this), this.validform_valid = "true");
					c.util.showmsg.call(l, u.info, e.tiptype, {
						obj: t(this),
						type: u.type,
						sweep: e.tipSweep
					}), a.removeClass("Validform_error"), s = null
				}), e.showAllError && l.find(".Validform_error:first").focus(), f) {
				var p = e.beforeSubmit && e.beforeSubmit(l);
				if (p === !1) return !1;
				if (l[0].validform_status = "posting", !e.ajaxPost && "ajaxPost" !== r) {
					e.postonce || (l[0].validform_status = "normal");
					var a = a || e.url;
					return a && l.attr("action", a), e.callback && e.callback(l)
				}
				var h = t.extend(!0, {}, e.ajaxpost || {});
				if (h.url = a || h.url || e.url || l.attr("action"), c.util.showmsg.call(l, l.data("tipmsg").p || o.p, e.tiptype, {
						obj: l,
						type: 1,
						sweep: e.tipSweep
					}, "byajax"), n ? h.async = !1 : n === !1 && (h.async = !0), h.success) {
					var m = h.success;
					h.success = function(i) {
						e.callback && e.callback(i), l[0].validform_ajax = null, l[0].validform_status = "y" === t.trim(i.status) ? "posted" : "normal", m(i, l)
					}
				}
				if (h.error) {
					var g = h.error;
					h.error = function(t) {
						e.callback && e.callback(t), l[0].validform_status = "normal", l[0].validform_ajax = null, g(t, l)
					}
				}
				var v = {
					type: "POST",
					async: !0,
					data: l.serializeArray(),
					success: function(i) {
						"y" === t.trim(i.status) ? (l[0].validform_status = "posted", c.util.showmsg.call(l, i.info, e.tiptype, {
							obj: l,
							type: 2,
							sweep: e.tipSweep
						}, "byajax")) : (l[0].validform_status = "normal", c.util.showmsg.call(l, i.info, e.tiptype, {
							obj: l,
							type: 3,
							sweep: e.tipSweep
						}, "byajax")), e.callback && e.callback(i), l[0].validform_ajax = null
					},
					error: function(t) {
						var i = "status: " + t.status + "; statusText: " + t.statusText;
						c.util.showmsg.call(l, i, e.tiptype, {
							obj: l,
							type: 3,
							sweep: e.tipSweep
						}, "byajax"), e.callback && e.callback(t), l[0].validform_status = "normal", l[0].validform_ajax = null
					}
				};
				h = t.extend({}, v, h, {
					dataType: "json"
				}), l[0].validform_ajax = t.ajax(h)
			}
			return !1
		},
		resetForm: function() {
			var t = this;
			t.each(function() {
				this.reset && this.reset(), this.validform_status = "normal"
			}), t.find(".Validform_right").text(""), t.find(".passwordStrength").children().removeClass("bgStrength"), t.find(".Validform_checktip").removeClass("Validform_wrong Validform_right Validform_loading"), t.find(".Validform_error").removeClass("Validform_error"), t.find("[datatype]").removeData("cked").removeData("dataIgnore").each(function() {
				this.validform_lastval = null
			}), t.eq(0).find("input:first").focus()
		},
		abort: function() {
			this.validform_ajax && this.validform_ajax.abort()
		}
	}, t.Datatype = c.util.dataType, c.prototype = {
		dataType: c.util.dataType,
		eq: function(e) {
			var i = this;
			return e >= i.forms.length ? null : (e in i.objects || (i.objects[e] = new c(t(i.forms[e]).get(), {}, !0)), i.objects[e])
		},
		resetStatus: function() {
			var e = this;
			return t(e.forms).each(function() {
				this.validform_status = "normal"
			}), this
		},
		setStatus: function(e) {
			var i = this;
			return t(i.forms).each(function() {
				this.validform_status = e || "posting"
			}), this
		},
		getStatus: function() {
			var e = this,
				i = t(e.forms)[0].validform_status;
			return i
		},
		ignore: function(e) {
			var i = this,
				e = e || "[datatype]";
			return t(i.forms).find(e).each(function() {
				t(this).data("dataIgnore", "dataIgnore").removeClass("Validform_error")
			}), this
		},
		unignore: function(e) {
			var i = this,
				e = e || "[datatype]";
			return t(i.forms).find(e).each(function() {
				t(this).removeData("dataIgnore")
			}), this
		},
		addRule: function(e) {
			for (var i = this, e = e || [], a = 0; a < e.length; a++) {
				var r = t(i.forms).find(e[a].ele);
				for (var s in e[a]) "ele" !== s && r.attr(s, e[a][s])
			}
			return t(i.forms).each(function() {
				var e = t(this);
				c.util.enhance.call(e, this.settings.tiptype, this.settings.usePlugin, this.settings.tipSweep, "addRule")
			}), this
		},
		ajaxPost: function(e, i, a) {
			var s = this;
			return t(s.forms).each(function() {
				(1 == this.settings.tiptype || 2 == this.settings.tiptype || 3 == this.settings.tiptype) && r(), c.util.submitForm.call(t(s.forms[0]), this.settings, e, a, "ajaxPost", i)
			}), this
		},
		submitForm: function(e, a) {
			var r = this;
			return t(r.forms).each(function() {
				var r = c.util.submitForm.call(t(this), this.settings, e, a);
				r === i && (r = !0), r === !0 && this.submit()
			}), this
		},
		resetForm: function() {
			var e = this;
			return c.util.resetForm.call(t(e.forms)), this
		},
		abort: function() {
			var e = this;
			return t(e.forms).each(function() {
				c.util.abort.call(this)
			}), this
		},
		check: function(e, i) {
			var i = i || "[datatype]",
				a = this,
				r = t(a.forms),
				s = !0;
			return r.find(i).each(function() {
				c.util.check.call(this, r, "", e) || (s = !1)
			}), s
		},
		config: function(e) {
			var i = this;
			return e = e || {}, t(i.forms).each(function() {
				var i = t(this);
				this.settings = t.extend(!0, this.settings, e), c.util.enhance.call(i, this.settings.tiptype, this.settings.usePlugin, this.settings.tipSweep)
			}), this
		}
	}, t.fn.Validform = function(t) {
		return new c(this, t)
	}, t.Showmsg = function(t) {
		r(), c.util.showmsg.call(e, t, 1, {})
	}, t.Hidemsg = function() {
		n.hide(), l = !0
	}
}(jQuery, window);